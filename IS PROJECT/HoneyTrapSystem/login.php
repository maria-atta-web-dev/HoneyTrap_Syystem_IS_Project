<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SentinelSecure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="login-container p-4 p-md-5 rounded-4 text-center position-relative overflow-hidden">
                    <!-- Decor -->
                    <div class="position-absolute top-0 start-50 translate-middle bg-primary opacity-25 rounded-circle"
                        style="width: 150px; height: 150px; filter: blur(50px);"></div>

                    <div class="mb-4 position-relative">
                        <i class="fas fa-shield-virus fa-3x text-primary mb-3"></i>
                        <h3 class="fw-bold text-glow">Sentinel<span class="text-primary">Secure</span></h3>
                        <p class="text-dim small">Enter your credentials to access the secure portal.</p>
                    </div>

                    <?php session_start();
                    if (isset($_SESSION['blocked_message'])): ?>
                        <div class="alert alert-danger border-0 bg-danger text-white fw-bold py-4" role="alert">
                            <i class="fas fa-ban fa-2x mb-2"></i><br>
                            <?php echo $_SESSION['blocked_message']; ?>
                        </div>
                        <?php session_unset();
                        session_destroy();
                        die(); // Stop page execution ?>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger" role="alert">
                            <i
                                class="fas fa-exclamation-circle me-2"></i><?php echo $_SESSION['error'];
                                unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success border-0 bg-success bg-opacity-10 text-success" role="alert">
                            <i
                                class="fas fa-check-circle me-2"></i><?php echo $_SESSION['success'];
                                unset($_SESSION['success']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="backend/auth/login_handler.php" method="POST" id="loginForm">
                        <div class="mb-3 text-start">
                            <label for="username" class="form-label text-dim ps-1 small">USERNAME</label>
                            <input type="text" class="form-control p-3" id="username" name="username" placeholder="Enter your username"
                                required>
                        </div>

                        <div class="mb-4 text-start">
                            <label for="password" class="form-label text-dim ps-1 small">PASSWORD</label>
                            <input type="password" class="form-control p-3" id="password" name="password"
                                placeholder="Enter your password" required>
                        </div>

                        <div class="d-grid gap-2 mb-4">
                            <button type="submit" class="btn btn-primary py-3 fw-bold shadow-lg">
                                ACCESS PORTAL <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>

                    <div class="d-flex justify-content-between text-dim small">
                        <a href="register.php" class="text-decoration-none text-info">Create Account</a>
                        <span>v2.4.0 Secure</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="frontend/js/behavior_tracker.js"></script>
</body>

</html>