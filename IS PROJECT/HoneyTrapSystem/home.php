<?php $pageTitle = "Home - SentinelSecure";
include 'frontend/includes/header.php'; ?>

<!-- Hero Section -->
<div class="row align-items-center mb-5 py-5">
    <div class="col-lg-7">
        <h4 class="text-neon-green text-uppercase letter-spacing-2 mb-3">Next-Gen Cyber Defense</h4>
        <h1 class="display-3 fw-bold mb-4 text-glow font-cinzel">Protecting Your <br><span class="text-primary">Digital Frontier</span></h1>
        <p class="lead text-dim mb-4">SentinelSecure deploys adaptive deception technology to misdirect adversaries
            while safeguarding your critical assets. Experience the future of active defense.</p>
        <div class="d-flex gap-3">
            <a href="services.php" class="btn btn-primary btn-lg shadow-lg">Our Solutions</a>
            <a href="about.php" class="btn btn-outline-light btn-lg">Why Sentinel?</a>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="position-relative hero-glow">
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1000&auto=format&fit=crop"
                class="img-fluid rounded-4 shadow-lg border border-secondary" alt="Cyber Security Hub">
            <div class="position-absolute bottom-0 end-0 bg-dark p-3 rounded-3 shadow-lg m-4 border border-info">
                <div class="d-flex align-items-center">
                    <div class="spinner-grow text-success me-2" role="status" style="width: 10px; height: 10px;"></div>
                    <small class="text-success fw-bold">SYSTEM SECURE</small>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Stats Banner -->
<div class="row mb-5">
    <div class="col-12">
        <div class="card bg-dark border-secondary">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3 border-end border-secondary">
                        <h2 class="stat-number">99.9%</h2>
                        <small class="text-dim text-uppercase letter-spacing-2">Uptime Guaranteed</small>
                    </div>
                    <div class="col-md-3 border-end border-secondary">
                        <h2 class="stat-number">24/7</h2>
                        <small class="text-dim text-uppercase letter-spacing-2">Threat Monitoring</small>
                    </div>
                    <div class="col-md-3 border-end border-secondary">
                        <h2 class="stat-number">Zero</h2>
                        <small class="text-dim text-uppercase letter-spacing-2">Data Breaches</small>
                    </div>
                    <div class="col-md-3">
                        <h2 class="stat-number">500+</h2>
                        <small class="text-dim text-uppercase letter-spacing-2">Enterprise Clients</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<!-- Core Features -->
<div class="row g-4 mb-5">
    <div class="col-md-4">
        <div class="card h-100 p-3 card-hover-glow">
            <div class="card-body">
                <div class="mb-4">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x text-primary opacity-25"></i>
                        <i class="fas fa-lock fa-stack-1x text-primary text-glow"></i>
                    </span>
                </div>
                <h4 class="text-white">Quantum Encryption</h4>
                <p class="text-dim">Future-proof data protection compliant with FIPS 140-3 standards.</p>
                <a href="service_details.php?id=cloud" class="text-decoration-none text-info fw-bold stretched-link">Learn More <i
                        class="fas fa-arrow-right list-inline-item"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 p-3 card-hover-glow">
            <div class="card-body">
                <div class="mb-4">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x text-danger opacity-25"></i>
                        <i class="fas fa-bug fa-stack-1x text-danger text-glow"></i>
                    </span>
                </div>
                <h4 class="text-white">Threat Hunting</h4>
                <p class="text-dim">Proactive identification of latent threats within your network infrastructure.</p>
                <a href="service_details.php?id=network" class="text-decoration-none text-danger fw-bold stretched-link">Learn More <i
                        class="fas fa-arrow-right list-inline-item"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 p-3 card-hover-glow">
            <div class="card-body">
                <div class="mb-4">
                    <span class="fa-stack fa-2x">
                        <i class="fas fa-circle fa-stack-2x text-success opacity-25"></i>
                        <i class="fas fa-code-branch fa-stack-1x text-success text-glow"></i>
                    </span>
                </div>
                <h4 class="text-white">Secure DevOps</h4>
                <p class="text-dim">Integrate security into your CI/CD pipeline from day one.</p>
                <a href="service_details.php?id=audit" class="text-decoration-none text-success fw-bold stretched-link">Learn More <i
                        class="fas fa-arrow-right list-inline-item"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Latest Intelligence (News) -->
<div class="row mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="font-cinzel">Latest Intelligence</h3>
        <a href="news.php" class="btn btn-sm btn-outline-secondary">View All Report</a>
    </div>
    <div class="col-md-6 mb-4 mb-md-0">
        <div class="card h-100 border-0 bg-transparent">
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=600"
                class="rounded mb-3 opacity-75">
            <h4 class="text-white">Zero-Day Vulnerability in Banking Core</h4>
            <p class="text-muted">Our dedicated research team has identified a critical flaw in legacy financial
                systems.</p>
            <a href="news.php" class="text-primary text-decoration-none">Read Briefing <i
                    class="fas fa-angle-right"></i></a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="d-flex flex-column gap-4">
            <div class="d-flex gap-3 cursor-pointer hover-glow-item p-2" onclick="simulateAiScan()">
                <div class="bg-dark p-3 rounded d-flex align-items-center justify-content-center"
                    style="width:80px; height:80px;">
                    <i class="fas fa-robot fa-2x text-info"></i>
                </div>
                <div>
                    <h5 class="mb-1 text-white">AI Phishing Defense</h5>
                    <p class="small text-dim mb-0">New algorithms deployed to detect LLM-generated social engineering
                        attacks. <br><span class="text-info small fw-bold mt-1">Click to Analyze</span></p>
                </div>
            </div>
            <div class="d-flex gap-3 cursor-pointer hover-glow-item p-2" onclick="showThreatMap()">
                <div class="bg-dark p-3 rounded d-flex align-items-center justify-content-center"
                    style="width:80px; height:80px;">
                    <i class="fas fa-globe fa-2x text-warning"></i>
                </div>
                <div>
                    <h5 class="mb-1 text-white">Global Threat Index</h5>
                    <p class="small text-dim mb-0">Ransomware activity has increased by 40% in the APAC region.
                        <br><span class="text-warning small fw-bold mt-1">Click to View Map</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trusted Partners / Careers CTA -->
<div class="row bg-gradient-dark p-5 rounded-4 mb-5 align-items-center border border-secondary"
    style="background: linear-gradient(45deg, rgba(5,7,10,1), rgba(22,33,62,0.8));">
    <div class="col-lg-7">
        <span class="text-primary tracking-wide small">JOIN THE MISSION</span>
        <h2 class="display-5 font-cinzel text-white mt-2 mb-3">Defend the Future</h2>
        <p class="lead text-dim mb-4">We are looking for elite security researchers and engineers to join our global
            task force.</p>
        <div class="d-flex gap-3">
            <a href="careers.php" class="btn btn-primary px-4 py-2">View Open Positions</a>
            <a href="partners.php" class="btn btn-outline-light px-4 py-2">Our Partners</a>
        </div>
    </div>
    <div class="col-lg-5 text-center opacity-50">
        <i class="fas fa-users-cog fa-6x text-secondary"></i>
    </div>
</div>


<!-- Scripts for Interactivity -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function simulateAiScan() {
        let timerInterval;
        Swal.fire({
            title: 'Initiating AI Scan...',
            html: 'Analyzing phish-kits and LLM signatures... <b></b>%',
            timer: 2000,
            timerProgressBar: true,
            background: '#05070a',
            color: '#00f2ff',
            didOpen: () => {
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector('b');
                let progress = 0;
                timerInterval = setInterval(() => {
                    progress += 5;
                    if(progress > 100) progress = 100;
                    b.textContent = progress;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                Swal.fire({
                    icon: 'success',
                    title: 'Analysis Complete',
                    text: 'No active AI-generated threats detected in your sector.',
                    background: '#05070a',
                    color: '#fff',
                    confirmButtonColor: '#00f2ff'
                });
            }
        });
    }

    function showThreatMap() {
        Swal.fire({
            title: '<span class="text-white text-glow">LIVE SATELLITE FEED</span>',
            html: `
                <div class="ratio ratio-16x9 mb-3 border border-neon-blue overflow-hidden rounded position-relative">
                    <iframe width="100%" height="400" src="https://www.openstreetmap.org/export/embed.html?bbox=-74.0227,40.7029,-73.9678,40.7306&layer=mapnik&marker=40.7167,-73.9952" style="border:none; filter: invert(90%) hue-rotate(180deg);"></iframe>
                    <div class="position-absolute top-0 start-0 w-100 h-100" style="pointer-events:none; background: repeating-linear-gradient(0deg, rgba(0, 242, 255, 0.1) 0px, rgba(0, 242, 255, 0.1) 1px, transparent 1px, transparent 2px); opacity: 0.3;"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center px-2">
                    <span class="text-neon-blue small"><i class="fas fa-satellite-dish me-2 blink"></i>UPLINK ESTABLISHED</span>
                    <span class="text-danger small fw-bold">LAT: 40.7128° N | LON: 74.0060° W</span>
                </div>
            `,
            width: 800,
            background: '#05070a',
            showConfirmButton: false,
            showCloseButton: true,
            customClass: {
                popup: 'border border-neon-blue shadow-lg bg-black-90'
            }
        });
    }
</script>

<?php include 'frontend/includes/footer.php'; ?>