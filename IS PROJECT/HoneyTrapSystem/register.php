<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SentinelSecure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="login-container p-4 p-md-5 rounded-4 position-relative overflow-hidden">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold text-white">Join Sentinel<span class="text-primary">Secure</span></h3>
                        <p class="text-dim small">Create your encrypted identity.</p>
                    </div>

                    <?php session_start();
                    if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger" role="alert">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <form action="backend/auth/registration_handler.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label text-dim small ms-1">FULL IDENTITY</label>
                            <input type="text" class="form-control" name="full_name" placeholder="John Doe" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dim small ms-1">USERNAME</label>
                            <input type="text" class="form-control" name="username" placeholder="jdoe" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dim small ms-1">SECURE EMAIL</label>
                            <input type="email" class="form-control" name="email" placeholder="john@example.com"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-dim small ms-1">PASSPHRASE</label>
                            <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                        </div>

                        <div class="d-grid gap-2 mb-3">
                            <button type="submit" class="btn btn-primary py-3 fw-bold">
                                INITIALIZE ACCOUNT
                            </button>
                        </div>
                        <div class="text-center">
                            <a href="login.php" class="text-decoration-none text-dim small hover-text-primary">Already
                                have an ID? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>