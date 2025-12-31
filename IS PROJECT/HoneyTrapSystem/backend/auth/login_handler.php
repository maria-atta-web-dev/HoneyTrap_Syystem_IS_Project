<?php
// backend/auth/login_handler.php

session_start();
require_once '../config/db.php';
require_once '../config/config.php';
require_once '../detection/risk_scoring.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $behaviorJson = $_POST['behavior_data'] ?? '{}';
    $behaviorData = json_decode($behaviorJson, true);

    $ip = $_SERVER['REMOTE_ADDR'];
    $riskEngine = new RiskScoringEngine($pdo);

    // 1. Calculate Risk Score
    $riskResult = $riskEngine->calculateRiskScore($username, $ip, $behaviorData);
    $riskScore = $riskResult['score'];

    // 2. Authenticate User (Check DB)
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // SPECIAL DEMO CASE: 'attacker' user always exists for demo
    if (!$user && $username === 'attacker') {
        $user = [
            'id' => 999,
            'username' => 'attacker',
            'password_hash' => password_hash('12345', PASSWORD_DEFAULT),
            'role' => 'user'
        ];
    }

    $passwordValid = false;
    if ($user && password_verify($password, $user['password_hash'])) {
        $passwordValid = true;
    }

    // DEMO BACKDOOR (Delete in production)
    if (!$passwordValid && $user && ($password === 'Admin@123' || $password === 'User@123')) {
        $newHash = password_hash($password, PASSWORD_DEFAULT);
        $pdo->prepare("UPDATE users SET password_hash = ? WHERE id = ?")->execute([$newHash, $user['id']]);
        $passwordValid = true;
    }

    // 3. Logic:
    // If Password VALID -> LOG IN (Bypass IP Block to allow authentic user access)
    // If Password INVALID -> Check IP Block. If Blocked -> Show Block Message.

    if ($passwordValid) {
        // SUCCESSFUL LOGIN

        // HONEYTRAP TRIGGER (Demo or Risk Based)
        // If username is 'attacker' or Risk > 90, send to Honeytrap
        if ($username === 'attacker' || $riskScore > 90) {
            $decision = 'honeytrap';
            logAttempt($pdo, $username, $ip, $riskScore, $decision, $behaviorData);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username']; // Should be 'attacker' or similar
            $_SESSION['role'] = 'user';
            $_SESSION['is_honeytrap'] = true;

            // Log initial honeytrap entry
            try {
                $stmtH = $pdo->prepare("INSERT INTO honeytrap_logs (username, ip_address, action_performed, timestamp) VALUES (?, ?, 'Honeytrap Login Triggered', NOW())");
                $stmtH->execute([$username, $ip]);
            } catch (Exception $e) {
            }

            header("Location: ../honeytrap/fake_dashboard.php");
            exit;
        }

        // Normal Legit User
        $decision = 'legit';
        logAttempt($pdo, $username, $ip, $riskScore, $decision, $behaviorData);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['is_honeytrap'] = false;

        if ($user['role'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: ../../home.php");
        }
        exit;

    } else {
        // FAILED LOGIN

        // 1. Check if ALREADY Blocked (Critical IP)
        $checkBlock = $pdo->prepare("SELECT risk_level FROM ip_intelligence WHERE ip_address = ?");
        $checkBlock->execute([$ip]);
        $blockStatus = $checkBlock->fetchColumn();

        if ($blockStatus === 'critical') {
            // Already blocked, and failed again.
            $_SESSION['blocked_message'] = "Your are block ti the website no entering allow";
            header("Location: ../../login.php");
            exit;
        }

        // 2. Count failures to see if we SHOULD block now
        $failStmt = $pdo->prepare("SELECT COUNT(*) FROM login_attempts WHERE ip_address = ? AND decision != 'legit' AND login_time > DATE_SUB(NOW(), INTERVAL 15 MINUTE)");
        $failStmt->execute([$ip]);
        $failCount = $failStmt->fetchColumn();

        if ($failCount >= 4) { // 5th failure
            // BLOCK ACTION
            $updIp = $pdo->prepare("INSERT INTO ip_intelligence (ip_address, risk_level, flagged_as_attacker, first_seen) VALUES (?, 'critical', 1, NOW()) ON DUPLICATE KEY UPDATE risk_level = 'critical', flagged_as_attacker = 1");
            $updIp->execute([$ip]);

            logAttempt($pdo, $username, $ip, 100, 'blocked', $behaviorData);

            $_SESSION['blocked_message'] = "Your are block ti the website no entering allow";
            header("Location: ../../login.php");
            exit;
        }

        // Just a normal failure
        $_SESSION['error'] = "Invalid credentials. Attempt " . ($failCount + 1) . "/5";
        logAttempt($pdo, $username, $ip, $riskScore, 'suspicious', $behaviorData);
        header("Location: ../../login.php");
        exit;
    }

}

function logAttempt($pdo, $username, $ip, $score, $decision, $behavior)
{
    try {
        $stmt = $pdo->prepare("INSERT INTO login_attempts (username, ip_address, risk_score, decision, user_agent, form_completion_time) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $username,
            $ip,
            $score,
            $decision,
            $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown',
            $behavior['form_time'] ?? 0
        ]);

        // Also update IP intelligence if risk is high
        if ($score > 50) {
            // Create or update IP record
            $check = $pdo->prepare("SELECT ip_id FROM ip_intelligence WHERE ip_address = ?");
            $check->execute([$ip]);
            if (!$check->fetch()) {
                $ins = $pdo->prepare("INSERT INTO ip_intelligence (ip_address, risk_level, first_seen) VALUES (?, 'medium', NOW())");
                $ins->execute([$ip]);
            }
        }
    } catch (Exception $e) {
        // Silent fail on log
    }
}
?>