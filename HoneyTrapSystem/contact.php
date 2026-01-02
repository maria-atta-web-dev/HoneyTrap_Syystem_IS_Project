<?php $pageTitle = "Contact SOC - SentinelSecure";
include 'frontend/includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-5 mb-5 mb-lg-0">
        <h2 class="fw-bold mb-4 text-white">Security Operations Center</h2>
        <p class="text-dim mb-4">Our SOC is operational 24/7/365. For immediate breaches, please call the emergency
            hotline.</p>

        <div class="d-flex align-items-center mb-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                <i class="fas fa-map-marker-alt fa-2x"></i>
            </div>
            <div>
                <h6 class="mb-0 text-white">Headquarters</h6>
                <small class="text-dim">128 Secure Drive, Cyber Valley, CA 90210</small>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                <i class="fas fa-phone-alt fa-2x"></i>
            </div>
            <div>
                <h6 class="mb-0 text-white">Emergency Hotline</h6>
                <small class="text-dim">+1 (800) SECURE-NOW</small>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary me-3">
                <i class="fas fa-envelope fa-2x"></i>
            </div>
            <div>
                <h6 class="mb-0 text-white">Encrypted Email</h6>
                <small class="text-dim">secure-comms@sentinelsecure.io</small>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card border-0 shadow-lg">
            <div class="card-body p-4 p-md-5">
                <h3 class="fw-bold mb-4">Secure Dispatch</h3>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-dim small">USER ID</label>
                            <input type="text" class="form-control"
                                value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-dim small">PRIORITY</label>
                            <select class="form-select">
                                <option>Low - Inquiry</option>
                                <option>Medium - Support</option>
                                <option>High - Incident</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-dim small">SUBJECT</label>
                        <input type="text" class="form-control"
                            value="<?php echo isset($_GET['subject']) ? htmlspecialchars($_GET['subject']) : ''; ?>"
                            placeholder="Topic of inquiry">
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-dim small">MESSAGE ENCRYPTED</label>
                        <textarea class="form-control" rows="5" placeholder="Enter your secure message..."></textarea>
                    </div>
                    <button type="button" class="btn btn-primary w-100 py-3"
                        onclick="alert('Message encrypted and sent to SOC.')">INITIALIZE TRANSMISSION</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'frontend/includes/footer.php'; ?>