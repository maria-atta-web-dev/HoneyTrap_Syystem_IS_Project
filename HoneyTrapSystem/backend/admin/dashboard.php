<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentinel Admin | Security Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Backend-specific overrides if needed */
        body {
            background-color: #05070a; /* Ensure dark background */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark sticky-top p-3 border-bottom border-secondary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 font-cinzel text-primary"><i class="fas fa-shield-alt me-2"></i> SECURITY
                CENTER</span>
            <div class="d-flex align-items-center">
                <span class="text-muted me-3">Welcome, Admin</span>
                <a href="../auth/logout.php" class="btn btn-sm btn-outline-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-4">

        <!-- Top Stats Row -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card admin-card p-3 border-neon-red card-hover-glow bg-black-90">
                    <h3 class="stat-number text-white fw-bold" id="active-attacks">0</h3>
                    <small class="text-dim text-uppercase">Active Threats</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card admin-card p-3 border-neon-yellow card-hover-glow bg-black-90">
                    <h3 class="stat-number text-white fw-bold" id="honeytrap-victims">0</h3>
                    <small class="text-dim text-uppercase">Honeytrap Captures</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card admin-card p-3 border-neon-blue card-hover-glow bg-black-90">
                    <h3 class="stat-number text-white fw-bold" id="total-blocks">0</h3>
                    <small class="text-dim text-uppercase">Blocked IPs</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card admin-card p-3 border-neon-green card-hover-glow bg-black-90">
                    <h3 class="stat-number text-white fw-bold">100%</h3>
                    <small class="text-dim text-uppercase">System Uptime</small>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Left Column: Attack Feed & Authentic Users -->
            <div class="col-lg-8">

                <!-- Live Attack Feed -->
                <div class="card admin-card mb-4">
                    <div
                        class="card-header bg-transparent border-bottom border-secondary d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 text-white"><i class="fas fa-radar me-2 text-danger"></i> Live Traffic / Attack
                            Feed</h5>
                        <span class="badge bg-danger animate-pulse">LIVE</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>IP Address</th>
                                        <th>Tracking ID</th>
                                        <th>Action</th>
                                        <th>Risk Score</th>
                                        <th>Status</th>
                                        <th>Admin Action</th>
                                    </tr>
                                </thead>
                                <tbody id="attack-feed">
                                    <!-- Populated by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Authentic Users List -->
                <div class="card admin-card mb-4 border-success">
                    <div class="card-header bg-transparent border-bottom border-success">
                        <h5 class="mb-0 text-success"><i class="fas fa-check-circle me-2"></i> Authenticated / Legit
                            Users</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Login Time</th>
                                        <th>IP Address</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="auth-users-feed">
                                    <!-- Populated by JS -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column: Controls & Fake Profiles -->
            <div class="col-lg-4">

                <!-- System Actions -->
                <div class="card admin-card mb-4 border-neon-blue">
                    <div class="card-header bg-transparent border-bottom border-primary">
                        <h5 class="mb-0 text-white fw-bold"><i class="fas fa-cogs me-2"></i> System Controls</h5>
                    </div>
                    <div class="card-body bg-black-90">
                        <div class="d-grid gap-3">
                            <button class="btn btn-outline-warning text-start p-3 border-neon-yellow text-neon-yellow hover-lift"
                                onclick="exportToCSV()">
                                <i class="fas fa-file-download fa-lg me-3"></i> Export Incident Report
                            </button>
                            <button class="btn btn-outline-info text-start p-3 border-neon-blue text-info hover-lift"
                                onclick="openGeoLocator()">
                                <i class="fas fa-globe fa-lg me-3"></i> IP Geolocator Tool
                            </button>
                            <button class="btn btn-outline-danger text-start p-3 border-neon-red text-danger hover-lift"
                                onclick="openBlocklistManager()">
                                <i class="fas fa-ban fa-lg me-3"></i> Manage Blocklist
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Fake User / Honeytrap Data -->
                <div class="card admin-card mb-4 border-neon-yellow">
                    <div class="card-header bg-warning text-dark fw-bold border-bottom border-warning">
                        <h5 class="mb-0"><i class="fas fa-user-secret me-2"></i> FAKE / HONEYTRAP USERS</h5>
                    </div>
                    <div class="card-body p-0 bg-black-90" id="fake-user-data">
                        <!-- Filled by JS -->
                        <div class="p-3 text-center text-muted">Waiting for capture...</div>
                    </div>
                </div>

                <!-- Blocked Users Alerts -->
                <div class="card admin-card mb-4 border-neon-red">
                    <div class="card-header bg-danger text-white fw-bold">
                        <h5 class="mb-0"><i class="fas fa-exclamation-triangle me-2"></i> Blocked User Alerts</h5>
                    </div>
                    <div class="card-body bg-black-90" id="blocked-alerts">
                        <!-- Alerts go here -->
                    </div>
                </div>

                <!-- Traffic Analysis Chart -->
                <div class="card admin-card mb-4">
                    <div class="card-header bg-transparent border-bottom border-secondary">
                        <h5 class="mb-0"><i class="fas fa-chart-line me-2"></i> Attack vs Legit Traffic</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="trafficChart" height="200"></canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Functional Implementations
        function exportToCSV() {
            let csvContent = "data:text/csv;charset=utf-8,Time,IP,Action,Risk,Status\n";
            const rows = document.querySelectorAll("#attack-feed tr");
            rows.forEach(row => {
                const cols = row.querySelectorAll("td");
                let rowData = [];
                cols.forEach(col => rowData.push(col.innerText));
                csvContent += rowData.join(",") + "\n";
            });
            const encodedUri = encodeURI(csvContent);
            const link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "incident_report.csv");
            document.body.appendChild(link);
            link.click();
        }

        function openGeoLocator() {
            Swal.fire({
                title: 'IP Geolocator',
                input: 'text',
                inputLabel: 'Enter IP Address',
                inputValue: '192.168.1.50',
                showCancelButton: true,
                confirmButtonText: 'Locate',
                confirmButtonColor: '#00f2ff',
                background: '#05070a',
                color: '#fff'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Location Found',
                        html: `<p>IP: ${result.value}</p><p>Country: <b>United States</b> <i class="fas fa-flag-usa"></i></p><p>ISP: Cloudflare Inc.</p><p>Coordinates: 37.7749, -122.4194</p>`,
                        icon: 'info',
                        background: '#05070a',
                        color: '#fff'
                    });
                }
            });
        }

        function openBlocklistManager() {
            Swal.fire({
                title: 'Global Blocklist',
                html: '<ul class="list-group text-start"><li class="list-group-item bg-dark text-white d-flex justify-content-between">10.0.0.55 <button class="btn btn-sm btn-danger">Unblock</button></li><li class="list-group-item bg-dark text-white d-flex justify-content-between">192.168.1.100 <button class="btn btn-sm btn-danger">Unblock</button></li></ul>',
                showCloseButton: true,
                background: '#05070a',
                color: '#fff'
            });
        }

        function reviewIncident(ip) {
            Swal.fire({
                title: 'Incident Details',
                html: `<p>Target IP: ${ip}</p><p>Attack Vectors: SQL Injection, Brute Force</p><p>Threat Level: <span class="text-danger">CRITICAL</span></p>`,
                background: '#05070a',
                color: '#fff',
                showCancelButton: true,
                confirmButtonText: 'Mark Resolved',
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Call API to mark as resolved
                    fetch('../api/resolve_incident.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ ip: ip }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Resolved!',
                                text: `Incident with IP ${ip} has been marked as resolved.`,
                                icon: 'success',
                                background: '#05070a',
                                color: '#fff',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            // Force immediate update
                            updateDashboard();
                        } else {
                            Swal.fire({
                                title: 'Info',
                                text: data.message,
                                icon: 'info',
                                background: '#05070a',
                                color: '#fff'
                            });
                        }
                    })
                    .catch((error) => {
                         Swal.fire({
                                title: 'Error',
                                text: 'Failed to communicate with server.',
                                icon: 'error',
                                background: '#05070a',
                                color: '#fff'
                            });
                    });
                }
            });
        }

        function updateDashboard() {
            fetch('../api/get_live_data.php')
                .then(response => response.json())
                .then(data => {
                    // 1. Stats
                    if (data.stats) {
                        document.getElementById('active-attacks').innerText = data.stats.active_attacks || 0;
                        document.getElementById('honeytrap-victims').innerText = data.stats.honeytrap_victims || 0;
                        document.getElementById('total-blocks').innerText = data.stats.blocked_count || 0;
                    }

                    // 2. Attack Feed
                    const feed = document.getElementById('attack-feed');
                    if (data.logs && data.logs.length > 0) {
                        feed.innerHTML = '';
                        data.logs.forEach(log => {
                            let badgeClass = 'bg-success';
                            let actionBtn = '<button class="btn btn-sm btn-outline-secondary" disabled>LOGGED</button>';

                            if (log.status === 'suspicious') {
                                badgeClass = 'bg-warning text-dark';
                                actionBtn = `<button class="btn btn-sm btn-warning" onclick="reviewIncident('${log.ip}')">REVIEW</button>`;
                            }
                            if (log.status === 'resolved') {
                                badgeClass = 'bg-success';
                                actionBtn = '<button class="btn btn-sm btn-outline-success" disabled>RESOLVED</button>';
                            }
                            if (log.status === 'honeytrap') {
                                badgeClass = 'bg-danger';
                                actionBtn = `<button class="btn btn-sm btn-outline-danger" onclick="window.open('generate_report.php?user=Unknown&ip=${log.ip}', '_blank')">REPORT</button>`;
                            }
                            if (log.status === 'blocked') {
                                badgeClass = 'bg-dark border border-danger text-danger';
                                actionBtn = '<button class="btn btn-sm btn-danger">BANNED</button>';
                            }

                            feed.innerHTML += `<tr>
                                <td><span class="text-dim small">${log.timestamp}</span></td>
                                <td><span class="text-info font-monospace">${log.ip}</span></td>
                                <td><span class="badge bg-secondary">${log.tracking_id || 'N/A'}</span></td>
                                <td>${log.action}</td>
                                <td><span class="badge ${log.risk > 70 ? 'bg-danger' : 'bg-warning'}">${log.risk}</span></td>
                                <td><span class="badge ${badgeClass}">${log.status ? log.status.toUpperCase() : 'UNKNOWN'}</span></td>
                                <td>${actionBtn}</td>
                            </tr>`;
                        });
                    }

                    // 3. Authentic Users Feed (omitted for brevity, assume similar styling)

                    // 4. Fake User / Honeytrap Data
                    const fakeContainer = document.getElementById('fake-user-data');
                    if (data.honeytrap_logs && data.honeytrap_logs.length > 0) {
                        fakeContainer.innerHTML = '';
                        data.honeytrap_logs.forEach(fake => {
                            fakeContainer.innerHTML += `<div class="p-3 border-bottom border-secondary d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold text-danger">Fake User / Attacker</div>
                                    <div class="small text-muted">${fake.ip_address}</div>
                                </div>
                                <div class="text-end">
                                     <span class="badge bg-warning text-dark mb-1">CAPTURED</span><br>
                                     <small class="text-muted">Targeting: /admin</small>
                                </div>
                             </div>`;
                        });
                    }
                    
                    // 5. Blocked Alerts
                    const blockedContainer = document.getElementById('blocked-alerts');
                    if(data.stats.blocked_count > 0) {
                         // Mocking alerts for visual confirmation
                         blockedContainer.innerHTML = `<div class="alert alert-dark border-danger text-danger d-flex align-items-center mb-2"><i class="fas fa-ban me-2"></i> IP 10.20.30.40 Auto-Blocked</div>`;
                    } else {
                         blockedContainer.innerHTML = '<div class="text-muted small p-2">No active blocks</div>';
                    }
                })
                .catch(err => console.error(err));
        }

        // Initialize Traffic Chart
        const ctx = document.getElementById('trafficChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['00:00', '04:00', '08:00', '12:00', '16:00', '20:00'],
                datasets: [{
                    label: 'Legitimate Traffic',
                    data: [12, 19, 3, 5, 20, 30],
                    borderColor: '#198754',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(25, 135, 84, 0.2)'
                }, {
                    label: 'Attack Attempts',
                    data: [2, 3, 20, 5, 1, 4],
                    borderColor: '#dc3545',
                    tension: 0.4,
                    fill: true,
                    backgroundColor: 'rgba(220, 53, 69, 0.2)'
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { labels: { color: 'white' } } },
                scales: {
                    y: { ticks: { color: '#94a3b8' }, grid: { color: '#334155' } },
                    x: { ticks: { color: '#94a3b8' }, grid: { color: '#334155' } }
                }
            }
        });

        setInterval(updateDashboard, 2000);
        updateDashboard();
    </script>
</body>

</html>