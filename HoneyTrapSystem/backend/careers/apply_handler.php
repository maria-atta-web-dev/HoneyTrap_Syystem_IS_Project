<?php
// backend/careers/apply_handler.php
require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

try {
    $jobTitle = $_POST['job_title'] ?? '';
    $fullName = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';
    $portfolio = $_POST['portfolio'] ?? '';

    // Basic Validation
    if (empty($jobTitle) || empty($fullName) || empty($email)) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all required fields.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email address.']);
        exit;
    }

    // Insert into Database
    $stmt = $pdo->prepare("INSERT INTO job_applications (job_title, full_name, email, linkedin_url, portfolio_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$jobTitle, $fullName, $email, $linkedin, $portfolio]);

    echo json_encode(['success' => true, 'message' => 'Application received successfully! Our team will review your profile.']);

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Server Error: ' . $e->getMessage()]);
}
?>