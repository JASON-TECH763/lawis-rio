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
    <title>Rio Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fixed sidebar styles */
        @media (min-width: 992px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                z-index: 100;
                padding: 48px 0 0;
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            }

            .sidebar .nav-link {
                font-weight: 500;
                color: #333;
            }

            .main-content {
                margin-left: 250px; /* Width of the sidebar */
            }
        }

        /* Mobile responsiveness */
        @media (max-width: 991px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -250px;
                width: 250px;
                z-index: 1050;
                transition: left 0.3s ease;
                background-color: #f8f9fa;
            }

            .sidebar.show {
                left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
            }

            .overlay.show {
                display: block;
            }

            .navbar-brand h1 {
                font-size: 1.30rem;
                padding: 1rem;
            }
        }

        /* Dropdown menu styles */
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
    <!-- Mobile Toggle Button -->
    <button class="btn btn-primary d-lg-none sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Overlay for mobile menu -->
    <div class="overlay"></div>

    <!-- Sidebar Navigation -->
    <div class="sidebar bg-light">
        <div class="position-sticky">
            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase display-6">Rio Management System</h1>
            </a>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="https://rio-lawis.com/" class="nav-link active">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="service.php" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="room.php" class="nav-link">Rooms</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="check_status.php" class="nav-link">Status</a>
                </li>
                
                <!-- Login Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle profile-pic" href="#" id="loginTrigger" role="button">
                        <span class="fw-bold">Login</span>
                    </a>
                    <ul class="dropdown-menu dropdown-user" id="loginDropdown">
                        <li><a class="dropdown-item" href="admin">
                            <i class="fas fa-user-shield"></i> Admin
                        </a></li>
                        <li><a class="dropdown-item" href="staff">
                            <i class="fas fa-user-tie"></i> Staff
                        </a></li>
                        <li><a class="dropdown-item" href="customer">
                            <i class="fas fa-users"></i> Customer
                        </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Your page content goes here -->
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.querySelector('.sidebar');
            const sidebarToggle = document.querySelector('.sidebar-toggle');
            const overlay = document.querySelector('.overlay');

            // Mobile menu toggle
            sidebarToggle.addEventListener('click', function () {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
            });

            // Close sidebar when clicking overlay
            overlay.addEventListener('click', function () {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });

            // Login dropdown toggle
            const loginTrigger = document.getElementById('loginTrigger');
            const loginDropdown = document.getElementById('loginDropdown');

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