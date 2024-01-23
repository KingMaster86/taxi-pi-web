<?php
include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>Dashboard | CityTaxi</title>

    <!-- Google Font (Sen) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <!-- External CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/style3.css">
</head>

<body class="overflow-x-hidden container-fluid bg-warning">
    <div>
        <div class="row">
            <!-- Side Bar -->
            <div class="col-md-12 container background-black-color px-3 py-4">
                <!-- Admin Profile Pic -->
                <div class="d-md-flex justify-content-center align-items-center gap-2">
                    <div>
                        <img src="../assets/img/406880331_369106048863056_7316214919984039805_n.jpg" class="img-fluid width-of-admin-prof" alt="Admin Profile Picture" />
                    </div>
                    <div>
                        <h3 class="text-warning fw-semibold">Mushkir</h3>
                    </div>
                </div>

                <!-- Admin Dashboard Menu -->
                <div class="d-flex justify-content-center align-items-center gap-5 ">
                    <!-- Overview -->
                    <a href="admin-panel.php?dashboard" class="d-md-flex align-items-center hover-effect text-light  gap-3 btn mt-4">
                        <!-- Icon -->
                        <div>
                            <i class="fa-solid fa-gauge fs-5"></i>
                        </div>

                        <!-- Menu Name -->
                        <p class="fs-5 mb-1">Overview</p>
                    </a>

                    <!-- Passengers -->
                    <a href="admin-panel.php?passengers" class="d-md-flex align-items-center hover-effect text-light gap-3 btn mt-4">
                        <!-- Icon -->
                        <div>
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <!-- Menu Name -->
                        <p class="fs-5 mb-1">Passengers</p>
                    </a>

                    <!-- Drivers -->
                    <a href="admin-panel.php?drivers" class="d-md-flex align-items-center hover-effect text-light gap-3 btn mt-4">
                        <!-- Icon -->
                        <div>
                            <i class="fa-solid fa-id-card"></i>
                        </div>

                        <!-- Menu Name -->
                        <p class="fs-5 mb-1">Drivers</p>
                    </a>

                    <!-- Logout -->
                    <a href="../index.php" class="d-md-flex align-items-center hover-effect text-light gap-3 btn mt-4">
                        <!-- Icon -->
                        <div>
                            <i class="fa-solid fa-home"></i>
                        </div>

                        <!-- Menu Name -->
                        <p class="fs-5 mb-1">Home</p>
                    </a>
                    <!-- Home -->
                    <a href="logout.php" class="d-md-flex align-items-center hover-effect text-light gap-3 btn mt-4">
                        <!-- Icon -->
                        <div>
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </div>

                        <!-- Menu Name -->
                        <p class="fs-5 mb-1">Logout</p>
                    </a>
                </div>
            </div>


        </div>

        <!-- Dashboard Contents -->
        <div class="col-md-12 bg-warning ">
            <!-- PHP Code Dynamcially Changing Layouts -->
            <?php
            if (isset($_GET['dashboard'])) {
                include('dashboard.php');
            }
            if (isset($_GET['passengers'])) {
                include('total-passenger.php');
            }

            if (isset($_GET['drivers'])) {
                include('drivers.php');
            }
            ?>
        </div>
    </div>

    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- End -->
</body>

</html>