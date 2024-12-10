<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rio Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
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

        /* Ensure navbar items are inline on larger screens */
        @media (min-width: 992px) {
            .navbar-brand {
                margin-right: 1rem;
            }
            
            .navbar-nav {
                flex-direction: row;
                align-items: center;
            }
            
            .navbar-nav .nav-item {
                margin-right: 1rem;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .navbar-brand h1 {
                font-size: 1.25rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Brand and Toggle Button -->
            <div class="d-flex align-items-center">
                <a href="index.php" class="navbar-brand me-3">
                    <h1 class="m-0 text-primary text-uppercase display-6">Rio Management System</h1>
                </a>
                
                <!-- Toggle button visible only on mobile -->
                <button type="button" class="navbar-toggler ms-auto" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                    <a href="room.php" class="nav-item nav-link">Rooms</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <a href="check_status.php" class="nav-item nav-link">Status</a>
                </div>

                <!-- Login Dropdown -->
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle profile-pic" href="#" id="loginTrigger" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fw-bold">Login</span>
                        </a>
                        <ul class="dropdown-menu dropdown-user" aria-labelledby="loginTrigger">
                            <li><a class="dropdown-item" href="staff">
                                <i class="fas fa-user-tie"></i> Staff
                            </a></li>
                            <li><a class="dropdown-item" href="customer">
                                <i class="fas fa-users"></i> Customer
                            </a></li>
                            <li><a class="dropdown-item" href="admin">
                                <i class="fas fa-user-shield"></i> Admin
                            </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>