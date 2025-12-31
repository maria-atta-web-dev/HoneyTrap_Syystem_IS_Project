<?php $pageTitle = "Solutions - SentinelSecure";
include 'frontend/includes/header.php'; ?>

<div class="text-center mb-5">
    <h5 class="text-primary text-uppercase">Our Expertise</h5>
    <h2 class="display-4 fw-bold">Cyber Defense Solutions</h2>
    <p class="text-dim w-50 mx-auto">Comprehensive security architectures designed for the modern threat landscape.
    </p>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <!-- Cloud Storage -->
    <div class="col">
        <div class="card h-100">
            <img src="frontend/images/encrypted_cloud.png" class="card-img-top" alt="Cloud"
                style="height: 200px; object-fit: cover; opacity: 0.8;">
            <div class="card-body">
                <h4 class="card-title text-white">Encrypted Cloud</h4>
                <p class="card-text text-dim">Secure encryption for all your cloud-stored documents and files.</p>
                <ul class="list-unstyled mb-4 text-small text-dim">
                    <li><i class="fas fa-check text-success me-2"></i>AES-256 Auth</li>
                    <li><i class="fas fa-check text-success me-2"></i>Global Availability</li>
                </ul>
                <a href="service_details.php?id=cloud" class="btn btn-outline-light w-100">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Network Security -->
    <div class="col">
        <div class="card h-100">
            <img src="frontend/images/network_defense.png" class="card-img-top" alt="Network"
                style="height: 200px; object-fit: cover; opacity: 0.8;">
            <div class="card-body">
                <h4 class="card-title text-white">Network Defense</h4>
                <p class="card-text text-dim">Advanced firewall and intrusion detection systems for enterprise.</p>
                <ul class="list-unstyled mb-4 text-small text-dim">
                    <li><i class="fas fa-check text-success me-2"></i>Real-time Monitoring</li>
                    <li><i class="fas fa-check text-success me-2"></i>DDoS Mitigation</li>
                </ul>
                <a href="service_details.php?id=network" class="btn btn-outline-light w-100">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Code Auditing -->
    <div class="col">
        <div class="card h-100">
            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=600&auto=format&fit=crop"
                class="card-img-top" alt="Code" style="height: 200px; object-fit: cover; opacity: 0.8;">
            <div class="card-body">
                <h4 class="card-title text-white">Code Auditing</h4>
                <p class="card-text text-dim">Comprehensive review of your codebase to identify vulnerabilities.</p>
                <ul class="list-unstyled mb-4 text-small text-dim">
                    <li><i class="fas fa-check text-success me-2"></i>Static Analysis</li>
                    <li><i class="fas fa-check text-success me-2"></i>Penetration Testing</li>
                </ul>
                <a href="service_details.php?id=audit" class="btn btn-outline-light w-100">Learn More</a>
            </div>
        </div>
    </div>
</div>

<!-- CTA -->
<div class="row mt-5">
    <div class="col-12">
        <div class="card bg-gradient-primary border-0 p-5 text-center"
            style="background: linear-gradient(45deg, rgba(0, 242, 255, 0.1), rgba(0, 119, 255, 0.1));">
            <h3 class="fw-bold mb-3">Ready to secure your infrastructure?</h3>
            <p class="mb-4">Contact our security operations center for a free consultation.</p>
            <div>
                <a href="contact.php" class="btn btn-primary btn-lg">Contact SOC</a>
            </div>
        </div>
    </div>
</div>

<?php include 'frontend/includes/footer.php'; ?>