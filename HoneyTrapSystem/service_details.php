<?php
// service_details.php
$pageTitle = "Service Details";
include 'frontend/includes/header.php';

$serviceId = $_GET['id'] ?? 'cloud';

$services = [
    'cloud' => [
        'title' => 'Encrypted Cloud Storage',
        'icon' => 'fas fa-cloud-lock',
        'image' => 'frontend/images/encrypted_cloud.png', // Cyber cloud
        'description' => 'Our military-grade cloud storage solutions employ AES-256 encryption with zero-knowledge architecture. Your data is fragmented across multiple secure nodes to ensure redundancy and impossibility of unauthorized reconstruction.',
        'features' => [
            'End-to-end Encryption',
            'Zero-Knowledge Proofs',
            'Multi-Region Redundancy',
            'Biometric Access Controls'
        ]
    ],
    'network' => [
        'title' => 'Enterprise Network Security',
        'icon' => 'fas fa-shield-virus',
        'image' => 'frontend/images/network_defense.png', // Network map
        'description' => 'Defend your infrastructure against APTs, DDoS, and zero-day exploits with our AI-driven network defense matrix. We monitor traffic patterns in real-time to neutralize threats before they breach your perimeter.',
        'features' => [
            'Deep Packet Inspection',
            'AI Anomaly Detection',
            'Real-time Threat Intelligence',
            'Automated Incident Response'
        ]
    ],
    'audit' => [
        'title' => 'Source Code Auditing',
        'icon' => 'fas fa-file-code',
        'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1000&auto=format&fit=crop', // Coding
        'description' => 'Our manual and automated code review processes identify vulnerabilities defined in CWE/SANS Top 25. We provide detailed remediation paths to harden your application logic against SQLi, XSS, and RCE.',
        'features' => [
            'Static & Dynamic Analysis',
            'Dependency Scanning',
            'Logic Flaw Detection',
            'Compliance Verification'
        ]
    ]
];

$service = $services[$serviceId] ?? $services['cloud'];
?>

<div class="row align-items-center mb-5">
    <div class="col-lg-6">
        <span class="badge bg-primary mb-2">PREMIUM SERVICE</span>
        <h1 class="display-4 fw-bold mb-4 text-white text-glow">
            <?php echo $service['title']; ?>
        </h1>
        <p class="lead text-dim mb-4">
            <?php echo $service['description']; ?>
        </p>

        <h5 class="text-info mb-3"><i class="fas fa-check-circle me-2"></i>Key Capabilities</h5>
        <ul class="list-unstyled">
            <?php foreach ($service['features'] as $feature): ?>
                <li class="mb-2"><i class="fas fa-angle-right text-primary me-2"></i>
                    <span class="text-white"><?php echo $feature; ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="mt-5">
            <a href="contact.php?subject=<?php echo urlencode($service['title']); ?>"
                class="btn btn-primary btn-lg me-3">Request Consultation</a>
            <a href="services.php" class="btn btn-outline-light btn-lg">Back to Services</a>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="position-relative">
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-10 rounded-3 blur-effect"
                style="filter: blur(40px); z-index: -1;"></div>
            <img src="<?php echo $service['image']; ?>" class="img-fluid rounded-3 shadow-lg border border-secondary"
                alt="<?php echo $service['title']; ?>">
        </div>
    </div>
</div>

<!-- Tech Stack Section -->
<div class="row mt-5">
    <div class="col-12">
        <div class="card p-4">
            <div class="card-body">
                <h3 class="text-center mb-4">Technology Stack</h3>
                <div class="d-flex justify-content-around flex-wrap text-center fa-3x text-secondary">
                    <div class="p-3"><i class="fab fa-aws text-white"></i>
                        <p class="fs-6 mt-2 text-dim">Cloud</p>
                    </div>
                    <div class="p-3"><i class="fab fa-docker text-white"></i>
                        <p class="fs-6 mt-2 text-dim">Container</p>
                    </div>
                    <div class="p-3"><i class="fas fa-fingerprint text-white"></i>
                        <p class="fs-6 mt-2 text-dim">Auth</p>
                    </div>
                    <div class="p-3"><i class="fas fa-database text-white"></i>
                        <p class="fs-6 mt-2 text-dim">Data</p>
                    </div>
                    <div class="p-3"><i class="fas fa-network-wired text-white"></i>
                        <p class="fs-6 mt-2 text-dim">Net</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'frontend/includes/footer.php'; ?>