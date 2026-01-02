<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Access Denied");
}

require_once '../config/db.php';

$ip = $_GET['ip'] ?? 'Unknown';
$user = $_GET['user'] ?? 'Unknown';
$reportId = 'RPT-' . rand(10000, 99999);
$date = date('Y-m-d H:i:s');

// Fetch detected info (Simulated if not in DB for this specific IP yet)
$geo = "Unknown";
$risk = "Critical";

// In a real app, we would query the DB for this IP's full history here.
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forensic Incident Report #
        <?php echo $reportId; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #fff !important;
            color: #000 !important;
            font-family: 'Times New Roman', serif;
        }

        .report-header {
            border-bottom: 2px solid #000;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 10rem;
            opacity: 0.05;
            color: red;
            z-index: -1;
        }

        .confidential {
            color: red;
            border: 1px solid red;
            padding: 5px 10px;
            display: inline-block;
            font-weight: bold;
        }

        .kb-table th {
            background-color: #f0f0f0;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="p-5">

    <div class="watermark">CONFIDENTIAL</div>

    <div class="row mb-4 no-print">
        <div class="col-12 text-end">
            <button onclick="window.print()" class="btn btn-dark"><i class="fas fa-print me-2"></i>Print / Save as
                PDF</button>
            <button onclick="window.close()" class="btn btn-outline-secondary">Close</button>
        </div>
    </div>

    <div class="containerA4 mx-auto" style="max-width: 210mm;">

        <div class="report-header d-flex justify-content-between align-items-end">
            <div>
                <h1 class="font-cinzel fw-bold mb-0 text-dark">SENTINE<span class="text-primary">L</span> SECURE</h1>
                <small class="text-uppercase tracking-wide">Cyber Defense Operations Center</small>
            </div>
            <div class="text-end">
                <div class="confidential mb-2">TOP SECRET / NOFORN</div>
                <h4 class="mb-0">INCIDENT REPORT</h4>
                <div class="font-monospace">
                    <?php echo $reportId; ?>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-6">
                <h5 class="fw-bold border-bottom pb-1">SUBJECT DETAILS</h5>
                <table class="table table-sm table-borderless">
                    <tr>
                        <td class="text-muted w-25">IP Address:</td>
                        <td class="fw-bold font-monospace">
                            <?php echo htmlspecialchars($ip); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Username:</td>
                        <td>
                            <?php echo htmlspecialchars($user); ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Detected:</td>
                        <td>
                            <?php echo $date; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-muted">Classification:</td>
                        <td class="text-danger fw-bold">HONEYTRAP CAPTURE</td>
                    </tr>
                </table>
            </div>
            <div class="col-6">
                <h5 class="fw-bold border-bottom pb-1">THREAT ASSESSMENT</h5>
                <table class="table table-sm table-borderless">
                    <tr>
                        <td class="text-muted w-50">Risk Score:</td>
                        <td><span class="badge bg-danger text-white">98/100</span></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Attack Type:</td>
                        <td>Credential Stuffing / Unauthorized Access</td>
                    </tr>
                    <tr>
                        <td class="text-muted">Status:</td>
                        <td>CONTAINED</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="mb-5">
            <h5 class="fw-bold bg-light p-2 border-start border-5 border-danger">FORENSIC EVIDENCE (HONEYTRAP LOGS)</h5>
            <p class="small text-muted mb-3">The following actions were recorded within the containment environment
                (Fake Dashboard). The subject believed they had administrative access.</p>

            <table class="table table-bordered kb-table">
                <thead>
                    <tr>
                        <th>Timestamp</th>
                        <th>Action Performed</th>
                        <th>Payload / Input</th>
                        <th>Mouse Events</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <?php echo date('H:i:s', strtotime('-2 minutes')); ?>
                        </td>
                        <td>Accessed Fake Database</td>
                        <td>`SELECT * FROM users`</td>
                        <td>12 clicks</td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo date('H:i:s', strtotime('-1 minute')); ?>
                        </td>
                        <td>Attempted File Upload</td>
                        <td>`shell.php.jpg`</td>
                        <td>4 clicks</td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo date('H:i:s', strtotime('-30 seconds')); ?>
                        </td>
                        <td>Clicked "Export Revenue"</td>
                        <td>[Button Click]</td>
                        <td>2 clicks</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-5">
            <h5 class="fw-bold bg-light p-2 border-start border-5 border-dark">TECHNICAL ANALYSIS</h5>
            <div class="border p-3 bg-light font-monospace small">
                Fingerprint hash:
                <?php echo md5($ip . $user); ?><br>
                User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko)
                Chrome/120.0.0.0 Safari/537.36<br>
                TLS Fingerprint: 2a3b4c5d6e7f8g9h0i<br>
                Referer: None (Direct Access)
            </div>
        </div>

        <div class="row mt-5 pt-5 border-top">
            <div class="col-6">
                <p class="mb-5">Generated By: <br><strong>Automated Sentinel System</strong></p>
                <div class="border-bottom w-75"></div>
                <small class="text-muted">Signature</small>
            </div>
            <div class="col-6 text-end">
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=SentinelReport-<?php echo $reportId; ?>"
                    class="opacity-50">
            </div>
        </div>

    </div>
</body>

</html>