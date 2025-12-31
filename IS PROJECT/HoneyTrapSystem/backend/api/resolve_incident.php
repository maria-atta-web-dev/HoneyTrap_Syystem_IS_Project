<?php
// backend/api/resolve_incident.php
require_once '../config/db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (isset($data['ip'])) {
        $ip = $data['ip'];
        
        try {
            // Update the status of the incident(s) from this IP
            $stmt = $pdo->prepare("UPDATE login_attempts SET decision = 'resolved' WHERE ip_address = ? AND decision = 'suspicious'");
            $stmt->execute([$ip]);
            
            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Incident resolved']);
            } else {
                // It might already be resolved or not exist
                echo json_encode(['success' => false, 'message' => 'No suspicious incidents found for this IP or already resolved']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Database error']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
    }
}
?>
