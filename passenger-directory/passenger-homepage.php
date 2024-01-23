<?php
// include('../includes/connect.php');
// session_start();


// echo $_SESSION['passengerUsername'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Fav Icon -->
  <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
  <title>Passenger Profile | CityTaxi</title>

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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

  <!-- External CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/style2.css" />
</head>

<body class="overflow-x-hidden bg-external-white">
  <!-- Header Area -->
  <header class="container-fluid background-black-color">
    <nav class="navbar navbar-expand-lg container py-3">
      <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand text-white fs-1 fw-bold" href="../index.php">City<span class="text-warning">Taxi</span></a>

        <!-- Toggle Button (Responsvie) -->
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" href="../about-us.html">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" href="../about-us.html">Edit Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" href="../select-driver.php">Reserve a Taxi</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" href="../contact-us.html">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- End -->

  <main>
    <div class="mx-auto p-2 p-md-5 bg-danger">
      <div class="card mx-auto" id="driver-profile-card">
        <img src="../assets/img/admin-clipart.jpg" class="card-img-top" alt="..." />
        <div class="card-body d-md-flex gap-1 align-items-start">
          <div>
            <h5 class="card-title">Mushkir</h5>
            <p class="card-text">
              No. 751 East Milton Drive, Kandy, Sri Lanka
            </p>
          </div>
          <div class="bg-success px-3 py-1 rounded-5 text-light mt-2 mt-md-0 text-center">
            Available
          </div>
        </div>
        <ul class="list-group list-group-flush card-height overflow-y-scroll">
          <li class="list-group-item fw-bold">
            Username:
            <span class="text-decoration-none fw-normal font-black">mushkir_96</span>
          </li>
          <li class="list-group-item d-md-flex align-items-center gap-2 pl-2 pt-0 pb-0 pe-0">
            <p class="card-text mt-3 fw-bold">Email:</p>
            <p class="card-text">bycylacoh@example.com</p>
          </li>
          <li class="list-group-item fw-bold">
            Contact No:
            <a href="tel:0000" class="text-decoration-none fw-normal font-black">0777195282</a>
          </li>

          <li class="list-group-item fw-bold">
            ID Card No:
            <span class="text-decoration-none fw-normal font-black">199631404505</span>
          </li>
        </ul>
        <div class="card-body">
          <a href="./edit-profile.html" class="card-link text-decoration-none">Edit
          </a>
        </div>
      </div>
    </div>
  </main>

  <!-- Boostrap JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <!-- End -->
</body>

</html>