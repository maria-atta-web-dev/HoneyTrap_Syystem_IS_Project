<?php $pageTitle = "Careers - Sentinel";
include 'frontend/includes/header.php'; ?>

<div class="row mb-5 text-center">
    <div class="col-lg-8 mx-auto">
        <h5 class="text-primary tracking-wide">JOIN THE ELITE</h5>
        <h1 class="display-3 font-cinzel text-white mb-3">Careers at Sentinel</h1>
        <p class="lead text-dim">We don't just hire employees; we recruit guardians. Join the team defining the future
            of active cyber defense.</p>
    </div>
</div>

<div class="row g-4">
    <!-- Filters -->
    <div class="col-lg-3">
        <div class="card p-3 border-secondary">
            <h5 class="mb-3">Departments</h5>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Threat Intelligence (3)</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" checked>
                <label class="form-check-label">Engineering (5)</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">Sales & Marketing (2)</label>
            </div>
        </div>
    </div>

    <!-- Listings -->
    <div class="col-lg-9">

        <!-- Job 1 -->
        <div class="card mb-3 hover-lift border-0 bg-gradient-dark">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="text-white mb-1">Senior Penetration Tester</h4>
                    <div class="text-dim small mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>Remote / Washington DC &nbsp;|&nbsp;
                        <i class="fas fa-clock me-2"></i>Full-time &nbsp;|&nbsp;
                        <i class="fas fa-dollar-sign me-2"></i>$140k - $180k
                    </div>
                    <p class="mb-0 text-white-50">Lead Red Team operations simulating advanced persistent threats
                        (APTs) against Fortune 500 clients.</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill px-4">Apply Now</button>
                </div>
            </div>
        </div>

        <!-- Job 2 -->
        <div class="card mb-3 hover-lift border-0 bg-gradient-dark">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="text-white mb-1">Malware Analyst II</h4>
                    <div class="text-dim small mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>New York, NY &nbsp;|&nbsp;
                        <i class="fas fa-clock me-2"></i>Full-time &nbsp;|&nbsp;
                        <i class="fas fa-dollar-sign me-2"></i>$120k - $150k
                    </div>
                    <p class="mb-0 text-white-50">Reverse engineer zero-day exploits and update the Sentinel threat
                        signature database.</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill px-4">Apply Now</button>
                </div>
            </div>
        </div>

        <!-- Job 3 -->
        <div class="card mb-3 hover-lift border-0 bg-gradient-dark">
            <div class="card-body p-4 d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="text-white mb-1">Deception Architect (Honeytrap Specialist)</h4>
                    <div class="text-dim small mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>London, UK &nbsp;|&nbsp;
                        <i class="fas fa-clock me-2"></i>Contract &nbsp;|&nbsp;
                        <i class="fas fa-dollar-sign me-2"></i>Competitive
                    </div>
                    <p class="mb-0 text-white-50">Design high-fidelity decoy environments to entrap and study
                        adversarial behavior.</p>
                </div>
                <div>
                    <button class="btn btn-outline-primary rounded-pill px-4">Apply Now</button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row mt-5 text-center px-5">
    <div class="col-12 bg-primary bg-opacity-10 p-5 rounded-4">
        <h3>Don't see a fit?</h3>
        <p class="text-dim">We are always looking for exceptional talent. Encrypt your resume and send it to our
            secure drop.</p>
        <button class="btn btn-primary" onclick="window.location.href='contact.php?subject=Encrypted Resume Submission'">Connect & Upload PGP Key</button>
    </div>
</div>

<!-- Application Modal -->
<div class="modal fade" id="applicationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-secondary text-white">
            <div class="modal-header border-secondary">
                <h5 class="modal-title">Apply for <span id="modalJobTitle" class="text-primary">Position</span></h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="applicationForm">
                    <input type="hidden" id="jobTitleInput" name="job_title">
                    <div class="mb-3">
                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control bg-dark text-white border-secondary" name="full_name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control bg-dark text-white border-secondary" name="email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control bg-dark text-white border-secondary" name="linkedin"
                            placeholder="https://linkedin.com/in/...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Portfolio / GitHub</label>
                        <input type="url" class="form-control bg-dark text-white border-secondary" name="portfolio"
                            placeholder="https://github.com/...">
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary hover-lift">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const applyButtons = document.querySelectorAll('.btn-outline-primary');
        const modal = new bootstrap.Modal(document.getElementById('applicationModal'));
        const modalTitle = document.getElementById('modalJobTitle');
        const jobInput = document.getElementById('jobTitleInput');
        const form = document.getElementById('applicationForm');

        applyButtons.forEach(btn => {
            if (btn.innerText.includes('Apply Now')) {
                btn.onclick = function () {
                    // Get job title from the card
                    const card = this.closest('.card-body');
                    const title = card.querySelector('h4').innerText;

                    modalTitle.innerText = title;
                    jobInput.value = title;
                    modal.show();
                };
            }
        });

        form.onsubmit = function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerText;

            submitBtn.disabled = true;
            submitBtn.innerText = 'Sending...';

            fetch('backend/careers/apply_handler.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Application successfully sent! We will contact you soon.');
                        modal.hide();
                        form.reset();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An unexpected error occurred.');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = originalText;
                });
        };
    });
</script>

<?php include 'frontend/includes/footer.php'; ?>