<?php
// backend/auth/auth_check.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// 2. Check if user is flagged as Honeytrap
if (isset($_SESSION['is_honeytrap']) && $_SESSION['is_honeytrap'] === true) {
    // Redirect to fake dashboard immediately
    header("Location: backend/honeytrap/fake_dashboard.php");
    exit;
}

// 3. Optional: Re-verify session validity from DB for extra security
// (Skipped for performance in this demo, but good for industry level)
?>