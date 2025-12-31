<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - SentinelSecure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #05070a, #16213e);
            color: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero {
            text-align: center;
            position: relative;
            z-index: 10;
        }

        .bg-grid {
            position: absolute;
            top: 0;
            left: 0;
            w-100;
            h-100;
            background-image: radial-gradient(rgba(0, 242, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="bg-grid"></div>
    <div class="hero container">
        <div class="mb-4">
            <i
                class="fas fa-shield-virus fa-5x text-primary shadow-lg rounded-circle p-3 border border-primary bg-dark"></i>
        </div>
        <h1 class="display-2 fw-bold mb-3 text-glow">Sentinel<span class="text-primary">Secure</span></h1>
        <p class="lead text-dim mb-5 w-75 mx-auto">The world's most advanced deception-based active defense system.
            <br>Secure your infrastructure with intelligence.</p>

        <div class="d-flex gap-3 justify-content-center">
            <a href="login.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow-lg">SECURE LOGIN</a>
            <a href="register.php" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold">REGISTER ID</a>
        </div>

        <div class="mt-5 text-dim small opacity-50">
            <p>Protected by Sentinel HoneyTrap Architecture v2.4</p>
        </div>
    </div>
</body>

</html>