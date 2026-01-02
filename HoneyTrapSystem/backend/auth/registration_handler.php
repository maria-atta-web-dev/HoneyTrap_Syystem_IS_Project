<?php
// backend/auth/registration_handler.php

session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $fullName = $_POST['full_name'] ?? '';

    // Basic Validation
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = "All fields are required.";
        header("Location: ../../register.php");
        exit;
    }

    try {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "Username or Email already exists.";
            header("Location: ../../register.php");
            exit;
        }

        // Create User
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = $pdo->prepare("INSERT INTO users (username, email, password_hash, full_name, role, status) VALUES (?, ?, ?, ?, 'user', 'active')");
        $insert->execute([$username, $email, $hash, $fullName]);

        $_SESSION['success'] = "Registration successful! Please login.";
        header("Location: ../../login.php");
        exit;

    } catch (PDOException $e) {
        $_SESSION['error'] = "System Error: " . $e->getMessage();
        header("Location: ../../register.php");
        exit;
    }
}
?>