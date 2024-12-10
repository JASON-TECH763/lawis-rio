<?php
$request = $_SERVER['REQUEST_URI'];
if (substr($request, -4) == '.php') {
    $new_url = substr($request, 0, -4);
    header("Location: $new_url", true, 301);
    exit();
}
?>
  <style>
        #sidebar {
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100; /* Behind the navbar */
            padding: 48px 0 0; /* Height of navbar */
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            background-color: #14165b;
        }

        .sidebar .nav-link {
            color: #FEA116;
        }

        .sidebar .nav-link.active {
            color: #fff;
            background-color: #FEA116;
        }

        @media (max-width: 768px) {
            #sidebar {
                position: relative;
                min-height: auto;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="https://rio-lawis.com/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.php">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="room.php">Rooms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="check_status.php">Status</a>
                        </li>
                    </ul>
                </div>
            </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.querySelector('[data-bs-toggle="collapse"]');
            const sidebar = document.getElementById('sidebar');

            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function () {
                    sidebar.classList.toggle('collapse');
                });
            }
        });
    </script>