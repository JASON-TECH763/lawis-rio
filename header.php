<style>
/* Change the color of the navbar toggle lines to white */
.navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.dropdown-menu {
    background-color: #14165b; /* Change background color */
}

.dropdown-item {
    color: #FEA116; /* Change text color to white for visibility */
}

.dropdown-item:hover {
    background-color: #FEA116; /* Optional: Lighter shade on hover */
    color: #fff; /* Ensure text stays white */
}

.profile-pic {
    color: #fff; /* Change login text to white */
}

.navbar-brand {
    position: relative; /* Make this the reference container */
}

.navbar-toggler {
    position: absolute; /* Position the button relative to the brand */
    top: 50%; /* Align vertically in the middle */
    right: 10px; /* Adjust spacing from the right edge of the brand */
    transform: translateY(-50%); /* Center the toggle vertically */
}

    /* Existing styles remain the same */
    
    /* Add these new styles */
    @media (max-width: 991px) {
        .navbar-collapse {
            background-color: #14165b;
            padding: 1rem;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .dropdown-menu {
            position: static !important;
            width: 100%;
            margin-top: 0.5rem;
        }

        .nav-item.dropdown {
            width: 100%;
        }

        .profile-pic {
            padding-left: 0.5rem;
        }
    }

</style>

<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-6 bg-dark d-flex align-items-center">
            <a href="index.php" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase display-6 display-md-4">Rio Management System</h1>
                <button type="button" class="navbar-toggler ms-3 d-lg-none" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </a>
        </div>
        <div class="col-lg-6">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav w-100">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="about.php" class="nav-item nav-link">About</a>
                        <a href="service.php" class="nav-item nav-link">Services</a>
                        <a href="room.php" class="nav-item nav-link">Rooms</a>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                        <a href="check_status.php" class="nav-item nav-link">Status</a>
                        
                        <!-- Login Dropdown -->
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle profile-pic" href="#" id="loginTrigger" role="button">
                                <span class="fw-bold">Login</span>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn" id="loginDropdown">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="staff">
                                        <i class="fas fa-user-tie"></i> Staff
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="customer">
                                        <i class="fas fa-users"></i> Customer
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="admin">
                                        <i class="fas fa-user-shield"></i> Admin
                                    </a>
                                </div>
                            </ul>
                        </div>
                    </div>
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
        e.stopPropagation();
        
        // Check if we're in mobile view
        if (window.innerWidth <= 991) {
            // Use slideToggle-like effect
            if (loginDropdown.style.display === 'block') {
                loginDropdown.style.display = 'none';
            } else {
                loginDropdown.style.display = 'block';
            }
        } else {
            // Desktop behavior
            loginDropdown.style.display = loginDropdown.style.display === 'none' ? 'block' : 'none';
        }
    });

    // Close dropdown if clicked outside
    document.addEventListener('click', function (e) {
        if (!loginTrigger.contains(e.target) && !loginDropdown.contains(e.target)) {
            loginDropdown.style.display = 'none';
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
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