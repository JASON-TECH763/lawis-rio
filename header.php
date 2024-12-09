<style>
/* Adjust the size and alignment of the navbar toggler */
.navbar-toggler {
    padding: 0.1rem;
    font-size: 1rem;
    border: none; /* Optional: Remove border */
    background-color: transparent; /* Match the background */
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute; /* Allow precise positioning */
    top: 50%; /* Vertically center the toggle button */
    right: 1rem; /* Place on the right side */
    transform: translateY(-50%); /* Adjust for vertical centering */
    z-index: 1000; /* Ensure it stays above other elements */
}

/* Resize the toggle icon */
.navbar-toggler-icon {
    width: 1rem; /* Adjust the size */
    height: 1.5rem; /* Adjust the size */
    background-size: cover; /* Ensure proper scaling */
}

/* Change the color of the navbar toggle lines to white */
.navbar-toggler-icon {
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
        <div class="col-12 bg-dark d-flex align-items-center position-relative">
            <!-- Brand -->
            <a href="index.php" class="navbar-brand w-100 text-center">
                <h1 class="m-0 text-primary text-uppercase">Rio Management System</h1>
            </a>
            <!-- Toggle button visible only on mobile -->
            <button type="button" class="navbar-toggler d-lg-none" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12">
            <!-- Navbar -->
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