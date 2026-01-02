<?php
// backend/config/config.php

// Application Settings
define('APP_NAME', 'HoneyTrap Auth System');
define('APP_URL', 'http://localhost/IS%20PROJECT/HoneyTrapSystem/');
define('BASE_PATH', dirname(__DIR__, 2)); // Points to HoneyTrapSystem root

// Risk Scoring Thresholds
define('RISK_THRESHOLD_SUSPICIOUS', 40);
define('RISK_THRESHOLD_HONEYTRAP', 70);

// Session Settings
define('SESSION_LIFETIME', 3600); // 1 hour

// Timezone
date_default_timezone_set('Asia/Kolkata'); // Adjust as needed

// Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', 1); // Turn off in production

?>