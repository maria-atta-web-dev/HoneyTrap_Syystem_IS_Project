<?php $pageTitle = "Intelligence Feed - Sentinel";
include 'frontend/includes/header.php'; ?>

<div class="row mb-5">
    <div class="col-12">
        <h5 class="text-primary tracking-wide">THREAT INTELLIGENCE</h5>
        <h1 class="display-4 font-cinzel text-white">Global Security Briefings</h1>
    </div>
</div>

<div class="row g-4">
    <!-- Featured Article -->
    <div class="col-lg-8">
        <div class="card h-100 border-0 shadow-lg overflow-hidden position-relative">
            <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?q=80&w=1000"
                class="card-img-top opacity-50" style="height: 400px; object-fit: cover;">
            <div class="position-absolute bottom-0 start-0 p-4 bg-gradient-to-t w-100"
                style="background: linear-gradient(to top, rgba(0,0,0,1), transparent);">
                <span class="badge bg-danger mb-2">CRITICAL ALERT</span>
                <h2 class="text-white fw-bold">Zero-Day Vulnerability Discovered in Core Banking Protocol</h2>
                <div class="d-flex text-dim small gap-3">
                    <span><i class="far fa-calendar me-2"></i>Oct 24, 2025</span>
                    <span><i class="far fa-user me-2"></i>Ops Team</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Feed -->
    <div class="col-lg-4">
        <div class="d-flex flex-column gap-3 h-100">
            <a href="news_details.php?id=ai_phishing" class="text-decoration-none text-reset">
                <div class="card border-secondary p-3 hover-scale">
                    <small class="text-primary fw-bold">ANALYSIS</small>
                    <h5 class="mt-1 text-white">The Rise of AI-Driven Phishing</h5>
                    <p class="text-dim small mb-0">How LLMs are generating undetectable spear-phishing campaigns...
                    </p>
                </div>
            </a>

            <a href="news_details.php?id=quantum_decay" class="text-decoration-none text-reset">
                <div class="card border-secondary p-3 hover-scale">
                    <small class="text-warning fw-bold">WHITEPAPER</small>
                    <h5 class="mt-1 text-white">Quantum Decay: Preparing for Y2Q</h5>
                    <p class="text-dim small mb-0">Strategies for post-quantum cryptography migration...</p>
                </div>
            </a>

            <a href="news_details.php?id=red_baron" class="text-decoration-none text-reset">
                <div class="card border-secondary p-3 hover-scale">
                    <small class="text-success fw-bold">CASE STUDY</small>
                    <h5 class="mt-1 text-white">Neutralizing the 'Red Baron' Botnet</h5>
                    <p class="text-dim small mb-0">A deep dive into our takedown operation last quarter...</p>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Grid -->
<div class="row mt-5 g-4">
    <div class="col-md-4">
        <div class="card h-100 bg-dark border-secondary">
            <div class="card-body">
                <img src="frontend/images/supply_chain.png" class="rounded mb-3 img-fluid w-100"
                    style="height: 200px; object-fit: cover;">
                <h4 class="text-white">Supply Chain Attacks</h4>
                <p class="text-dim">Why your vendor's security is now your security.</p>
                <a href="news_details.php?id=supply_chain" class="btn btn-sm btn-outline-primary">Read Report</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 bg-dark border-secondary">
            <div class="card-body">
                <img src="frontend/images/iot_botnet.png" class="rounded mb-3 img-fluid w-100"
                    style="height: 200px; object-fit: cover;">
                <h4 class="text-white">IoT Botnets</h4>
                <p class="text-dim">The growing threat of unsecured smart devices.</p>
                <a href="news_details.php?id=iot_botnet" class="btn btn-sm btn-outline-primary">Read Report</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100 bg-dark border-secondary">
            <div class="card-body">
                <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=300"
                    class="rounded mb-3 img-fluid w-100" style="height: 200px; object-fit: cover;">
                <h4 class="text-white">Ransomware Evolution</h4>
                <p class="text-dim">From encryption to double-extortion tactics.</p>
                <a href="news_details.php?id=ransomware" class="btn btn-sm btn-outline-primary">Read Report</a>
            </div>
        </div>
    </div>
</div>

<?php include 'frontend/includes/footer.php'; ?>