<?php
// news_details.php
$pageTitle = "Report Details";
include 'frontend/includes/header.php';

$reportId = $_GET['id'] ?? 'supply_chain';

$reports = [
    'supply_chain' => [
        'title' => 'Supply Chain Attacks',
        'subtitle' => 'Vendor Risk Management',
        'date' => 'Oct 28, 2025',
        'author' => 'Threat Intel Team',
        'image' => 'frontend/images/supply_chain.png',
        'content' => '
            <p class="lead">In the modern interconnected digital economy, your security perimeter effectively extends to your third-party vendors. Supply chain attacks have surged by 400% in the last year, targeting smaller software providers to infiltrate major enterprises.</p>
            <h3 class="mt-4 text-primary">The Mechanism of Attack</h3>
            <p>Attackers inject malicious code into a trusted dependency or update mechanism. When the target organization updates their software, they inadvertently install the backdoor.</p>
            <h3 class="mt-4 text-primary">Key Defense Strategies</h3>
            <ul>
                <li>Implement Software Bill of Materials (SBOM) for all critical applications.</li>
                <li>Enforce Zero Trust Network Access (ZTNA) for all vendor connections.</li>
                <li>Regularly audit third-party code and monitor for unauthorized changes.</li>
            </ul>
            <div class="alert alert-danger mt-4 bg-opacity-25 bg-danger text-white border-danger">
                <i class="fas fa-exclamation-triangle me-2"></i> <strong>Critical Warning:</strong> Recent intelligence suggests a new campaign targeting healthcare API providers.
            </div>
        '
    ],
    'iot_botnet' => [
        'title' => 'IoT Botnets',
        'subtitle' => 'The Zombie Device Army',
        'date' => 'Oct 15, 2025',
        'author' => 'Network Defense Unit',
        'image' => 'frontend/images/iot_botnet.png',
        'content' => '
            <p class="lead">The proliferation of unsecured smart devices has created a massive attack surface. Attackers are weaponizing these devices into massive botnets capable of launching terabit-scale DDoS attacks.</p>
            <h3 class="mt-4 text-primary">Mirai and Beyond</h3>
            <p>Modern variants of the Mirai botnet are now exploiting zero-day vulnerabilities in common consumer routers and IP cameras. Once infected, these devices scan the internet for other vulnerable hosts, expanding the botnet autonomously.</p>
            <h3 class="mt-4 text-primary">Mitigation</h3>
            <p>Organizations must segment IoT devices onto isolated VLANs and enforce strict egress filtering to prevent them from participating in attacks. Changing default credentials is no longer sufficient; firmware updates must be managed centrally.</p>
        '
    ],
    'ransomware' => [
        'title' => 'Ransomware Evolution',
        'subtitle' => 'Double Extortion Tactics',
        'date' => 'Nov 01, 2025',
        'author' => 'Crypto Analysis Cell',
        'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=1000', // Keeping unsplash for now as requested only 2 images
        'content' => '
            <p class="lead">Ransomware gangs have evolved from simple encryption to "double extortion." They now exfiltrate sensitive data before locking systems, threatening to leak the data publicly if the ransom is not paid.</p>
            <h3 class="mt-4 text-primary">The Human Element</h3>
            <p>Phishing remains the primary vector. However, attackers are also recruiting disgruntled insiders to manually deploy payloads.</p>
            <h3 class="mt-4 text-primary">Defense in Depth</h3>
            <p>Offline backups are critical. However, to stop extortion, data loss prevention (DLP) strategies must be robust to detect large outbound file transfers.</p>
        '
    ],
    'ai_phishing' => [
        'title' => 'The Rise of AI-Driven Phishing',
        'subtitle' => 'Analysis',
        'date' => 'Oct 30, 2025',
        'author' => 'Social Engineering Unit',
        'image' => 'frontend/images/ai_phishing.png',
        'content' => '
            <p class="lead">Large Language Models (LLMs) are being weaponized to create hyper-personalized spear-phishing campaigns at scale. These AI-generated emails are grammatically perfect, contextually aware, and bypass traditional spam filters.</p>
            <h3 class="mt-4 text-primary">The Deepfake Threat</h3>
            <p>Beyond text, attackers are using voice cloning and deepfake video to impersonate executives in real-time "vishing" (voice phishing) attacks to authorize fraudulent wire transfers.</p>
            <h3 class="mt-4 text-primary">Detection Strategies</h3>
            <p>Security awareness training must evolve. Users should verify urgent requests via out-of-band communication channels. Technical controls include verifying DMARC/SPF/DKIM records rigorously.</p>
        '
    ],
    'quantum_decay' => [
        'title' => 'Quantum Decay: Preparing for Y2Q',
        'subtitle' => 'Whitepaper',
        'date' => 'Nov 02, 2025',
        'author' => 'Research Division',
        'image' => 'frontend/images/quantum_decay.png',
        'content' => '
            <p class="lead">"Y2Q" refers to the day quantum computers become powerful enough to break current asymmetric encryption standards (RSA, ECC). While years away, "Harvest Now, Decrypt Later" attacks are happening today.</p>
            <h3 class="mt-4 text-primary">Post-Quantum Cryptography (PQC)</h3>
            <p>NIST has standardized new algorithms (crystals-kyber) resistant to quantum attacks. Organizations must begin inventorying their cryptographic assets now.</p>
            <h3 class="mt-4 text-primary">Migration Path</h3>
            <p>The transition will take a decade. Start by upgrading critical infrastructure key exchange mechanisms to hybrid models supporting both classical and PQC algorithms.</p>
        '
    ],
    'red_baron' => [
        'title' => 'Neutralizing the Red Baron Botnet',
        'subtitle' => 'Case Study',
        'date' => 'Sep 15, 2025',
        'author' => 'Incident Response Team',
        'image' => 'frontend/images/iot_botnet.png', // Reusing IoT image as fallback
        'content' => '
            <p class="lead">In a coordinated operation with international law enforcement, Sentinel Cyber Defense helped dismantle the "Red Baron" botnet command and control infrastructure. This botnet was responsible for record-breaking DDoS attacks on financial institutions.</p>
            <h3 class="mt-4 text-primary">Takedown Mechanics</h3>
            <p>Our analysts identified a flaw in the C2 communication protocol, allowing us to issue a "kill command" that effectively severed the connection between the bot herder and the 500,000+ infected nodes.</p>
            <h3 class="mt-4 text-primary">Impact</h3>
            <p>The operation prevented an estimated $50M in potential damages. It highlights the importance of public-private partnerships in combating global cybercrime.</p>
        '
    ]
];

$report = $reports[$reportId] ?? $reports['supply_chain'];
?>

<div class="row mb-5">
    <div class="col-lg-8 mx-auto">
        <span class="badge bg-primary mb-3">
            <?php echo $report['subtitle']; ?>
        </span>
        <h1 class="display-4 font-cinzel text-white mb-3">
            <?php echo $report['title']; ?>
        </h1>
        <div class="d-flex text-muted mb-4">
            <span class="me-4"><i class="far fa-calendar me-2"></i>
                <?php echo $report['date']; ?>
            </span>
            <span><i class="far fa-user me-2"></i>
                <?php echo $report['author']; ?>
            </span>
        </div>

        <img src="<?php echo $report['image']; ?>"
            class="img-fluid rounded-3 shadow-lg border border-secondary mb-5 w-100">

        <div class="article-content text-light">
            <?php echo $report['content']; ?>
        </div>

        <div class="mt-5 border-top border-secondary pt-4">
            <a href="news.php" class="btn btn-outline-light"><i class="fas fa-arrow-left me-2"></i>Back to Intelligence
                Feed</a>
        </div>
    </div>
</div>

<?php include 'frontend/includes/footer.php'; ?>