<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Auth Check Middleware integration
require_once __DIR__ . '/../../backend/auth/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'SentinelSecure'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="frontend/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts for Elegance -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="home.php">
                <i class="fas fa-shield-virus text-primary me-2 fa-lg"></i>
                <div class="d-flex flex-column">
                    <span style="font-family: 'Cinzel', serif; letter-spacing: 2px; font-size: 1.2rem;">SENTINEL</span>
                    <span class="text-xs text-dim"
                        style="font-size: 0.6rem; letter-spacing: 4px; margin-top: -5px;">CYBER DEFENSE</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Company</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="about.php">About Us</a></li>
                            <li><a class="dropdown-item" href="careers.php">Careers</a></li>
                            <li><a class="dropdown-item" href="partners.php">Partners</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">Solutions</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="services.php">All Services</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="service_details.php?id=cloud">Cloud Security</a></li>
                            <li><a class="dropdown-item" href="service_details.php?id=network">Network Defense</a></li>
                            <li><a class="dropdown-item" href="service_details.php?id=audit">Code Auditing</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="news.php">Intelligence</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact SOC</a></li>

                    <li class="nav-item ms-lg-3">
                        <span class="navbar-text me-3 small text-dim"><i class="fas fa-user-circle me-1"></i>
                            <?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
                        <a href="backend/auth/logout.php" class="btn btn-sm btn-outline-danger">SIGNOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container py-5">