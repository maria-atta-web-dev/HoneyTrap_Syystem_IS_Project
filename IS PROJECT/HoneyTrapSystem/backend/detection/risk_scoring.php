<?php
// backend/detection/risk_scoring.php

require_once __DIR__ . '/../config/db.php';

class RiskScoringEngine
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function calculateRiskScore($username, $ip, $behaviorData)
    {
        $score = 0;
        $reasons = [];

        // 1. Check IP Intelligence (Known malicious IP)
        $ipRisk = $this->checkIPReputation($ip);
        if ($ipRisk > 0) {
            $score += $ipRisk;
            $reasons[] = "High Risk IP (+$ipRisk)";
        }

        // 2. Login Frequency (Multiple failed attempts)
        $freqRisk = $this->checkLoginFrequency($ip);
        if ($freqRisk > 0) {
            $score += $freqRisk;
            $reasons[] = "Frequent Login Attempts (+$freqRisk)";
        }

        // 3. Different Usernames from same IP
        $usernameRisk = $this->checkMultipleUsernames($ip, $username);
        if ($usernameRisk > 0) {
            $score += $usernameRisk;
            $reasons[] = "Multiple Usernames Attempted (+$usernameRisk)";
        }

        // 4. Time Analysis (Unusual hours 2AM-5AM)
        $timeRisk = $this->checkLoginTime();
        if ($timeRisk > 0) {
            $score += $timeRisk;
            $reasons[] = "Unusual Login Time (+$timeRisk)";
        }

        // 5. Behavior Analysis
        $behaviorRisk = $this->analyzeBehavior($behaviorData);
        if ($behaviorRisk > 0) {
            $score += $behaviorRisk;
            $reasons[] = "Suspicious Behavior (+$behaviorRisk)";
        }

        // 6. Rapid Form Submission
        if (isset($behaviorData['form_time']) && $behaviorData['form_time'] < 2000) {
            $score += 20;
            $reasons[] = "Rapid Form Submission (+20)";
        }

        return [
            'score' => min(100, $score),
            'reasons' => $reasons
        ];
    }

    private function checkIPReputation($ip)
    {
        $stmt = $this->pdo->prepare("SELECT risk_level, flagged_as_attacker FROM ip_intelligence WHERE ip_address = ?");
        $stmt->execute([$ip]);
        $row = $stmt->fetch();

        if ($row) {
            if ($row['flagged_as_attacker'])
                return 40;
            if ($row['risk_level'] == 'critical')
                return 30;
            if ($row['risk_level'] == 'high')
                return 20;
            if ($row['risk_level'] == 'medium')
                return 10;
        }
        return 0; // Unknown or low risk
    }

    private function checkLoginFrequency($ip)
    {
        // Count failed attempts in last 15 minutes
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as attempts FROM login_attempts WHERE ip_address = ? AND login_time > DATE_SUB(NOW(), INTERVAL 15 MINUTE) AND decision != 'legit'");
        $stmt->execute([$ip]);
        $result = $stmt->fetch();
        $attempts = $result['attempts'];

        if ($attempts > 10)
            return 30;
        if ($attempts > 5)
            return 20;
        if ($attempts > 2)
            return 10;
        return 0;
    }

    private function checkMultipleUsernames($ip, $currentUsername)
    {
        // Count distinct usernames attempted by this IP in last hour
        $stmt = $this->pdo->prepare("SELECT COUNT(DISTINCT username) as user_count FROM login_attempts WHERE ip_address = ? AND login_time > DATE_SUB(NOW(), INTERVAL 1 HOUR)");
        $stmt->execute([$ip]);
        $result = $stmt->fetch();
        $count = $result['user_count'];

        if ($count > 3)
            return 25;
        return 0;
    }

    private function checkLoginTime()
    {
        $hour = (int) date('H');
        // Assume 2AM to 5AM is suspicious for this context
        if ($hour >= 2 && $hour <= 5) {
            return 20;
        }
        return 0;
    }

    private function analyzeBehavior($data)
    {
        $risk = 0;
        // Check for lack of mouse movement if it's a desktop
        if (isset($data['mouse_moves']) && $data['mouse_moves'] < 5) {
            // Low mouse movement might indicate a bot script
            $risk += 15;
        }

        // Check keystroke dynamics (if available) - simplify for now
        // if (isset($data['typing_speed']) && $data['typing_speed'] > 1000) { $risk += 10; } // Super fast typing

        return $risk;
    }
}
?>