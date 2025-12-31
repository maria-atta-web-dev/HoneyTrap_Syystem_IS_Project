<?php
// backend/honeytrap/action_logger.php

session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'Unknown Action';
    $details = $_POST['details'] ?? '';
    $ip = $_SERVER['REMOTE_ADDR'];
    $sessionId = session_id();

    // Log to DB
    try {
        $stmt = $pdo->prepare("INSERT INTO honeytrap_logs (session_id, ip_address, action_performed, action_details, timestamp) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$sessionId, $ip, $action, $details]);

        // Also update Attacker Profile
        // Check if profile exists for IP, if not create
        $check = $pdo->prepare("SELECT profile_id FROM attacker_profiles WHERE ip_address = ?");
        $check->execute([$ip]);
        $profile = $check->fetch();

        if ($profile) {
            // Update
            $upd = $pdo->prepare("UPDATE attacker_profiles SET updated_at = NOW(), total_time_spent = total_time_spent + 10 WHERE profile_id = ?");
            $upd->execute([$profile['profile_id']]);
        } else {
            // Create
            $ins = $pdo->prepare("INSERT INTO attacker_profiles (ip_address, created_at) VALUES (?, NOW())");
            $ins->execute([$ip]);
        }

    } catch (Exception $e) {
        // Silent failure in honeytrap to avoid alerting attacker
    }
}
?>