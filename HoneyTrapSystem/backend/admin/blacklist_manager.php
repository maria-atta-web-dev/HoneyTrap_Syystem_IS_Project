<?php
session_start();
require_once '../config/db.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access Denied");
}

// Handle Unblock
if (isset($_POST['unblock_ip'])) {
    $ipToUnblock = $_POST['unblock_ip'];
    $stmt = $pdo->prepare("UPDATE ip_intelligence SET risk_level = 'low' WHERE ip_address = ?");
    $stmt->execute([$ipToUnblock]);
    $msg = "IP $ipToUnblock has been unblocked.";
}

// Fetch Blocked IPs
$stmt = $pdo->query("SELECT * FROM ip_intelligence WHERE risk_level = 'critical' ORDER BY last_seen DESC");
$blockedIPs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sentinel | Blacklist Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="font-cinzel text-danger mb-4"><i class="fas fa-ban me-2"></i> Blacklist Manager</h2>
        
        <?php if(isset($msg)): ?>
            <div class="alert alert-success"><?php echo $msg; ?></div>
        <?php endif; ?>

        <div class="card bg-secondary border-danger">
            <div class="card-body p-0">
                <table class="table table-dark table-striped mb-0">
                    <thead>
                        <tr>
                            <th>IP Address</th>
                            <th>Date Blocked</th>
                            <th>Total Attempts</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($blockedIPs) > 0): ?>
                            <?php foreach ($blockedIPs as $row): ?>
                            <tr>
                                <td class="font-monospace text-info"><?php echo htmlspecialchars($row['ip_address']); ?></td>
                                <td><?php echo $row['last_seen']; ?></td>
                                <td><?php echo $row['total_attempts']; ?></td>
                                <td>
                                    <form method="POST" class="d-inline">
                                        <input type="hidden" name="unblock_ip" value="<?php echo htmlspecialchars($row['ip_address']); ?>">
                                        <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-unlock me-1"></i> Unblock</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="4" class="text-center p-3 text-muted">No IPs currently in the blocklist.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
