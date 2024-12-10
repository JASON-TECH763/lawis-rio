<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rio Management System - Responsive Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Sidebar Styles */
        body {
            overflow-x: hidden;
        }
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #14165b;
        }
        .sidebar .nav-link {
            font-weight: 500;
            color: #FEA116;
            padding: 0.75rem 1.5rem;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(254, 161, 22, 0.1);
            color: #fff;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        /* Mobile Responsiveness */
        @media (max-width: 992px) {
            .sidebar {
                width: 250px;
                transform: translateX(-100%);
                transition: transform 0.3s ease-in-out;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .content {
                margin-left: 0;
            }
            .content-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
                z-index: 99;
                display: none;
            }
            .content-overlay.show {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Toggle Button -->
    <button class="btn btn-primary d-lg-none position-fixed top-0 start-0 m-2 z-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Sidebar -->
    <div class="sidebar col-md-3 col-lg-2 d-md-block bg-dark" id="sidebar">
        <div class="position-sticky pt-3">
            <a href="#" class="d-flex align-items-center justify-content-center pb-3 mb-3 text-decoration-none">
                <h2 class="text-primary text-uppercase">Rio Management</h2>
            </a>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-home me-2"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-info-circle me-2"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cogs me-2"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-bed me-2"></i> Rooms
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-envelope me-2"></i> Contact
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Content Area -->
    <div class="content">
        <h1>Welcome to Rio Management System</h1>
        <p>This is a sample content area with a fixed sidebar.</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Optional: Additional custom JavaScript for sidebar behavior
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.querySelector('[data-bs-toggle="offcanvas"]');

            // Close sidebar when a nav link is clicked on mobile
            sidebar.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        const bsOffcanvas = bootstrap.Offcanvas.getInstance(sidebar);
                        if (bsOffcanvas) {
                            bsOffcanvas.hide();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>