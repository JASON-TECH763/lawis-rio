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
        /* Fixed navigation styles */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1030;
        }

        .content-wrapper {
            margin-top: 80px; /* Adjust based on navbar height */
            padding-top: 20px;
        }

        @media (max-width: 991px) {
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1030;
            }
            
            .navbar-collapse {
                position: fixed;
                top: 60px; /* Height of navbar */
                left: 0;
                width: 100%;
                max-height: calc(100vh - 60px);
                overflow-y: auto;
                background-color: #212529; /* Dark background to match navbar */
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
    <!-- Navigation Start -->
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
                            
                            <div class="container">
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
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navigation End -->

    <!-- Main Content Start -->
    <div class="container-fluid content-wrapper">
        <div class="row">
            <div class="col-12">
                <h1>Welcome to Rio Management System</h1>
                <p>This is the main content of your page. Add your specific content here.</p>
                
                <!-- Add more content as needed -->
            </div>
        </div>
    </div>
    <!-- Main Content End -->

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginTrigger = document.getElementById('loginTrigger');
            const loginDropdown = document.getElementById('loginDropdown');

            // Toggle the dropdown on click
            loginTrigger.addEventListener('click', function (e) {
                e.preventDefault();
                loginDropdown.style.display = loginDropdown.style.display === 'none' ? 'block' : 'none';
            });

            // Close dropdown if clicked outside
            document.addEventListener('click', function (e) {
                if (!loginTrigger.contains(e.target) && !loginDropdown.contains(e.target)) {
                    loginDropdown.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>