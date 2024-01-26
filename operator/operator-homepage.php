<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>Profile | City - Taxi</title>

    <!-- Google Font (Sen) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- Boxicons Script -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- External CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/style2.css" />
</head>
<!-- bg-external-white -->

<body class="overflow-x-hidden ">
    <!-- Header Area -->
    <header class="container-fluid bg-warning">
        <nav class="navbar navbar-expand-lg container py-3">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand background-black-color px-3 text-white rounded-2  fs-1 fw-bold " href="../index.php">City<span class="text-warning">Taxi</span></a>

                <!-- Toggle Button (Responsvie) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link font-black fs-5 rounded effect-black me-4 px-3 fw-semibold" href="operator-homepage.php?reserve"><i class="fa-solid fa-taxi"></i> Reserve a Taxi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-black fs-5 rounded effect-black me-4 px-3 fw-semibold" href="homepage.php?edit-profile"><i class="fa-solid fa-pen-to-square"></i> Check Queries</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-black fs-5 rounded effect-black me-4 px-3 fw-semibold" href="homepage.php?logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End -->
    <!-- background-black-color -->
    <main class="">
        <div class="row">
            <div class="col-md-12">
                <?php

                if (isset($_GET['reserve'])) {
                    include('./reserve-taxi.php');
                }
                if (isset($_GET['filter'])) {
                    include('./filter-drivers.php');
                }
                ?>
            </div>
        </div>
    </main>

    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- End -->
</body>

</html>