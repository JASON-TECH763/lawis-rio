<?php
$request = $_SERVER['REQUEST_URI'];
if (substr($request, -4) == '.php') {
    $new_url = substr($request, 0, -4);
    header("Location: $new_url", true, 301);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media (max-width: 576px) {
            .navbar-brand h1 {
                font-size: 1.30rem;
                padding: 1rem;
            }
        }
        .dropdown-menu {
            background-color: #14165b;
        }
        .dropdown-item {
            color: #FEA116;
        }
        .dropdown-item:hover {
            background-color: #FEA116;
            color: #fff;
        }
        .profile-pic {
            color: #fff;
        }
    </style>
</head>
<body>
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
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
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
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle profile-pic" href="#" id="loginTrigger" role="button">
                                    <span class="fw-bold">Login</span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn" id="loginDropdown">
                                    <div class="dropdown-user-scroll scrollbar-outer">
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
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginTrigger = document.getElementById('loginTrigger');
            const loginDropdown = document.getElementById('loginDropdown');

            // Toggle the dropdown on click
            loginTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                loginDropdown.classList.toggle('show');
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function (e) {
                if (!loginTrigger.contains(e.target) && !loginDropdown.contains(e.target)) {
                    loginDropdown.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>