<?php
$request = $_SERVER['REQUEST_URI'];
if (substr($request, -4) == '.php') {
    $new_url = substr($request, 0, -4);
    header("Location: $new_url", true, 301);
    exit();
}
?>

<style>
.navbar-brand h1 {
    margin: 0;
    text-transform: uppercase;
    color: #FEA116;
}

/* Mobile-specific styles */
@media (max-width: 576px) {
    .navbar-brand h1 {
        font-size: 1.3rem;
        padding: 0;
    }

    .navbar-collapse {
        flex-grow: 0;
    }

    .navbar-nav {
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .navbar-toggler {
        margin-left: auto;
    }
}
</style>

<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                <a href="index.php" class="navbar-brand">
                    <h1>Rio Management System</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a href="https://rio-lawis.com/" class="nav-link active">Home</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="service.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="room.php" class="nav-link">Rooms</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                        <li class="nav-item"><a href="check_status.php" class="nav-link">Status</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="loginTrigger" role="button" data-bs-toggle="dropdown">
                                Login
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn" id="loginDropdown">
                                <li><a class="dropdown-item" href="admin"><i class="fas fa-user-shield"></i> Admin</a></li>
                                <li><a class="dropdown-item" href="staff"><i class="fas fa-user-tie"></i> Staff</a></li>
                                <li><a class="dropdown-item" href="customer"><i class="fas fa-users"></i> Customer</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

<!-- JavaScript to toggle the dropdown -->
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
                        </div>
                           
                        </div>
                    </nav>
                </div>
            </div>
        </div>