<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access Denied");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sentinel | IP Intelligence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <h2 class="font-cinzel text-info mb-4"><i class="fas fa-globe me-2"></i> IP Geolocator Tool</h2>

        <div class="card bg-secondary text-white border-info mb-4">
            <div class="card-body">
                <div class="input-group">
                    <input type="text" id="ipInput" class="form-control bg-dark text-white border-secondary"
                        placeholder="Enter IP Address (e.g. 192.168.1.1)">
                    <button class="btn btn-info" onclick="lookupIP()">Locate Target</button>
                </div>
            </div>
        </div>

        <div id="resultArea" class="row d-none">
            <div class="col-md-6">
                <div class="card bg-dark border-secondary p-3">
                    <h5 class="text-muted border-bottom border-secondary pb-2">Location Data</h5>
                    <p><strong>Country:</strong> <span id="resCountry" class="text-success">Unknown</span></p>
                    <p><strong>City:</strong> <span id="resCity" class="text-light">Unknown</span></p>
                    <p><strong>ISP:</strong> <span id="resISP" class="text-warning">Unknown</span></p>
                    <p><strong>Timezone:</strong> <span id="resTime" class="text-light">Unknown</span></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark border-secondary p-3">
                    <h5 class="text-muted border-bottom border-secondary pb-2">Threat Intelligence</h5>
                    <p><strong>Risk Score:</strong> <span class="badge bg-danger">High</span></p>
                    <p><strong>Known Proxy:</strong> Yes</p>
                    <p><strong>Tor Exit Node:</strong> No</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function lookupIP() {
            const ip = document.getElementById('ipInput').value;
            if (!ip) return;

            // Simulating API call for demo
            document.getElementById('resultArea').classList.remove('d-none');
            document.getElementById('resCountry').innerText = "United States (Simulated)";
            document.getElementById('resCity').innerText = "New York";
            document.getElementById('resISP').innerText = "Cloudflare Inc.";
            document.getElementById('resTime').innerText = "UTC -05:00";
        }
    </script>
</body>

</html>