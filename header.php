<style>
.navbar-toggler {
    padding: 0.1rem;
    font-size: 1rem;
    border: none;
    background-color: transparent;
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed; /* Keep it fixed in place */
    top: 15px; /* Adjust positioning */
    right: 15px; /* Adjust positioning */
    z-index: 1050; /* Higher z-index to ensure it stays on top */
}

.navbar-toggler-icon {
    width: 1.5rem;
    height: 1.5rem;
    background-size: contain;
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}


.dropdown-menu {
    background-color: #14165b; /* Change background color */
}

.dropdown-item {
    color: #FEA116; /* Change text color to orange */
}

.dropdown-item:hover {
    background-color: #FEA116; /* Optional: Lighter shade on hover */
    color: #fff; /* Ensure text stays white */
}

.profile-pic {
    color: #fff; /* Change login text to white */
}

@media (max-width: 576px) {
    .navbar-brand h1 {
        font-size: 1.25rem;
        padding: 1rem;
    }
}
</style>

<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <!-- Brand and Toggle Button -->
        <div class="col-12 d-flex align-items-center bg-dark position-relative">
            <a href="index.php" class="navbar-brand w-100 text-center">
                <h1 class="m-0 text-primary text-uppercase">Rio Management System</h1>
            </a>
            <!-- Navbar toggler -->
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <!-- Navbar -->
        <div class="col-12">
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-3 p-lg-0">
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
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
                                    <a class="dropdown-item" href="staff"><i class="fas fa-user-tie"></i> Staff</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="customer"><i class="fas fa-users"></i> Customer</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="admin"><i class="fas fa-user-shield"></i> Admin</a>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>

<!-- JavaScript to toggle the dropdown -->
<script>
 document.addEventListener('DOMContentLoaded', function () {
    const loginTrigger = document.getElementById('loginTrigger');
    const loginDropdown = document.getElementById('loginDropdown');
    const navbarCollapse = document.getElementById('navbarCollapse');

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

    // Ensure the toggle button stays functional
    navbarCollapse.addEventListener('click', function (e) {
        e.stopPropagation();
    });
});

</script>



</div>                          
</div>
</nav>
</div>
</div>
</div>