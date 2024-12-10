<?php
$request = $_SERVER['REQUEST_URI'];
if (substr($request, -4) == '.php') {
    $new_url = substr($request, 0, -4);
    header("Location: $new_url", true, 301);
    exit();
}
?>
<style>
 @media (max-width: 576px) {
    .navbar-brand h1 {
        font-size: 1.30rem;
        padding: 1rem;
    }
}

/* New styles for right margin and dropdown */
.navbar-nav.mr-auto {
    margin-right: 2rem !important; /* Adds margin to the right side */
}

.dropdown-menu {
    background-color: #14165b;
    right: 0; /* Align dropdown to the right */
    left: auto !important;
}

.navbar-collapse {
    max-height: 80vh; /* Prevent overflow on smaller screens */
    overflow-y: auto;
}
</style>

<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-6 bg-dark d-none d-lg-block">
            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase display-6 display-md-4">Rio Management System</h1>
            </a>
        </div>
        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <a href="index.php" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase display-6 display-md-4">Rio Management System</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="https://rio-lawis.com/" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="room.php" class="nav-item nav-link">Rooms</a>         
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="check_status.php" class="nav-item nav-link">Status</a>
                    </div>
                    
                    <div class="container">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle profile-pic" href="#" id="loginTrigger" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="fw-bold">Login</span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn" aria-labelledby="loginTrigger">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="admin">
                                        <i class="fas fa-user-shield"></i> Admin
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="staff">
                                        <i class="fas fa-user-tie"></i> Staff
                                    </a> 
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="customer">
                                        <i class="fas fa-users"></i> Customer
                                    </a>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- Updated JavaScript for Bootstrap 5 dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Optional: Additional custom dropdown behavior can be added here if needed
});
</script>