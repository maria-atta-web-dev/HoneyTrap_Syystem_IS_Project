<?php
// backend/honeytrap/fake_dashboard.php
session_start();
if (!isset($_SESSION['is_honeytrap']) || !$_SESSION['is_honeytrap']) {
    // If a legit user stumbles here, redirect them back or to real dash??
    // No, keep them here if they found it, or redirect to login.
    // For safety, redirect to login if not logged in.
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../login.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - System Administration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f4f6f9;
        }

        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
        }

        .nav-link {
            color: #c2c7d0;
        }

        .nav-link:hover {
            color: white;
            background: #495057;
        }

        .nav-link.active {
            background: #007bff;
            color: white;
        }

        .card-header {
            background: white;
            font-weight: bold;
            border-top: 3px solid #007bff;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar p-0">
                <div class="p-3 text-center border-bottom border-secondary">
                    <h4><i class="fas fa-cogs"></i> AdminPanel</h4>
                    <small>System v2.4.1</small>
                </div>
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" onclick="logAction('View Dashboard')">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="showFakeContent('users'); logAction('View Users')">
                                <i class="fas fa-users me-2"></i> User Management
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                onclick="showFakeContent('settings'); logAction('View Settings')">
                                <i class="fas fa-cog me-2"></i> System Settings
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"
                                onclick="showFakeContent('database'); logAction('View Database')">
                                <i class="fas fa-database me-2"></i> Database
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="#" onclick="logAction('Attempt Shutdown')">
                                <i class="fas fa-power-off me-2"></i> Shutdown Server
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                onclick="logAction('Export Data')">Export</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary"
                                onclick="logAction('Print')">Print</button>
                        </div>
                    </div>
                </div>

                <!-- Fake Stats -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text display-6">1,245</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Server Load</h5>
                                <p class="card-text display-6">12%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Warnings</h5>
                                <p class="card-text display-6">3</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div id="main-area">
                    <div class="card">
                        <div class="card-header">
                            Recent Activity
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Action</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1024</td>
                                        <td>root</td>
                                        <td>System Backup</td>
                                        <td>2 mins ago</td>
                                    </tr>
                                    <tr>
                                        <td>1023</td>
                                        <td>admin</td>
                                        <td>User Created</td>
                                        <td>15 mins ago</td>
                                    </tr>
                                    <tr>
                                        <td>1022</td>
                                        <td>system</td>
                                        <td>Cron Job</td>
                                        <td>1 hour ago</td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-danger mt-3" onclick="triggerFakeDownload()">Download Full Log
                                (Sensitive)</button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Fake Modal for "Sensitive" actions -->
    <div class="modal fade" id="fakeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Access Denied</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Processing request... Please wait.</p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function logAction(action) {
            console.log("Logging action: " + action);
            fetch('action_logger.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=' + encodeURIComponent(action) + '&details=' + encodeURIComponent(window.location.href)
            });
        }

        function triggerFakeDownload() {
            logAction('Attempted Sensitive Log Download');
            alert("Downloading secure_logs_2024.zip...");
            // Simulate download delay
            setTimeout(() => {
                alert("Network Error: Connection interrupted. Please try again.");
            }, 2000);
        }

        function showFakeContent(type) {
            let content = '';
            if (type === 'database') {
                content = `
                    <div class="card border-danger">
                        <div class="card-header bg-danger text-white">Production Database</div>
                        <div class="card-body">
                            <p class="text-danger">WARNING: You are viewing production data.</p>
                            <table class="table table-bordered">
                                <thead><tr><th>DB Name</th><th>User</th><th>Password Hash</th></tr></thead>
                                <tbody>
                                    <tr><td>honeytrap_prod</td><td>root</td><td>*84920491...</td></tr>
                                    <tr><td>finance_db</td><td>admin</td><td>*992834...</td></tr>
                                </tbody>
                            </table>
                            <button class="btn btn-warning" onclick="logAction('Clicked Dump Database')">Dump SQL</button>
                        </div>
                    </div>
                `;
            } else if (type === 'users') {
                content = `
                    <div class="card">
                        <div class="card-header">User Accounts</div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    admin (SuperUser)
                                    <span class="badge bg-primary rounded-pill">Active</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    finance_lead
                                    <span class="badge bg-primary rounded-pill">Active</span>
                                </li>
                            </ul>
                             <button class="btn btn-primary mt-3" onclick="logAction('Tried to Add User')">Add New User</button>
                        </div>
                    </div>
                `;
            } else {
                content = '<h3>Settings</h3><p>System configuration loaded.</p>';
            }
            document.getElementById('main-area').innerHTML = content;
        }

        // Track regular fake pings
        setInterval(() => {
            logAction('Heartbeat - Still on page');
        }, 10000);
    </script>
</body>

</html>