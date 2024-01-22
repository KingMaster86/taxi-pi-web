<?php
include('./includes/connect.php');
session_start();
// echo $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
  <title>Home | City - Taxi</title>

  <!-- Google Font (Sen) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Bootsrap CSS -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />



  <!-- External CSS -->
  <link rel="stylesheet" href="./assets/css/style.css" />

</head>

<body class="overflow-x-hidden">
  <div class="container-fluid background-gradient-image vh-100">
    <!-- Header -->
    <nav class="navbar navbar-expand-lg container py-3">
      <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand text-white fs-1 fw-bold" href="./index.php">City<span class="text-warning">Taxi</span></a>

        <!-- Toggle Button (Responsvie) -->
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- Home -->
            <li class="nav-item">
              <a class="nav-link active text-white fs-5 rounded hover-effect me-2 px-3" aria-current="page" href="./index.php">Home</a>
            </li>

            <!-- Pick a Driver -->
            <li class="nav-item">
              <a class="nav-link active text-white fs-5 rounded hover-effect me-2 px-3" aria-current="page" href="./select-driver.php">Pick a Driver</a>
            </li>

            <!-- About -->
            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-2 px-3" href="./about-us.php">About</a>
            </li>

            <!-- Contact Us -->
            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-2 px-3" href="./contact-us.php">Contact Us</a>
            </li>
          </ul>

          <!-- Login Button -->
          <div class="btn-group me-4">
            <button type="button" class="btn btn-warning dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </button>
            <ul class="dropdown-menu bg-black py-2">
              <li><a class="dropdown-item text-light hover-effect" href="./admin-panel/index.php">Admin</a></li>
              <li><a class="dropdown-item text-light hover-effect" href="./driver-directory/login.php">Driver</a></li>
              <li><a class="dropdown-item text-light hover-effect" href="#">Passenger</a></li>
            </ul>
          </div>

          <!-- Sign-Up Button -->
          <div class="btn-group">
            <button type="button" class="btn border-warning text-light hover-effect dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
              Sign Up
            </button>
            <ul class="dropdown-menu bg-black py-2">
              <li><a class="dropdown-item text-light hover-effect" href="./sign-up/driver.php">Driver</a></li>

              <li><a class="dropdown-item text-light hover-effect" href="./sign-up/customer.php">Passenger</a></li>
            </ul>
            <!-- <a href=""></a> -->
          </div>
        </div>
      </div>
    </nav>
    <!-- End -->

    <div class="text-center mt-sm-1 height d-flex flex-column justify-content-center align-items-center">
      <h3 class="text-warning fw-semibold text-uppercase">
        Book your Taxi Now
      </h3>
      <a href="tel:+12345678900" class="text-white text-decoration-none fs-1 fw-bold"><i class="fa-solid fa-mobile-screen"></i> +123 4567 8900</a>
    </div>
  </div>

  <!-- Best in City Division -->
  <div>
    <div class="bg-warning container-fluid mx-auto row p-sm-2 p-md-5">
      <div class="col-12 col-md-6 p-5">
        <p class="fw-bold m-1 mx-0">Best in City</p>
        <h3 class="fw-bolder">Trusted Taxi Services in UK 🇬🇧</h3>
        <p>
          "Step into a world of convenience and comfort! Greetings from your
          go-to City Taxi service. Ready to embark on a hassle-free journey
          through the heart of the city? Buckle up for a ride that blends
          style, efficiency, and local expertise. Your destination awaits –
          let's make every mile memorable together!"
        </p>
      </div>

      <div class="col-md-6 p-5">
        <img src="./assets/img/taxi-img.png" class="img-fluid mx-auto" alt="Responsive image" />
      </div>
    </div>
  </div>

  <!-- Our Services Division -->
  <div class="container-fluid bg-light mt-5 mb-5 p-5">
    <div>
      <h3 class="text-center mb-5 fw-bold">We do best than you wish</h3>

      <div class="row justify-content-center gap-5 mb-5">
        <div class="col-12 col-md-4 border d-flex justify-content-between align-items-start gap-3 p-4 white-variant rounded-1">
          <i class="fa-solid fa-taxi bg-warning p-3 rounded-5"></i>
          <div>
            <p class="mb-2 fw-bold">Quick Pickup</p>
            <p class="">
              Fast, reliable, and just a tap away! Conveniently located
              around the city, we're ready to get you where you need to be,
              pronto. Tap, ride, and go with us!
            </p>
          </div>
        </div>

        <div class="col-12 col-md-4 border d-flex justify-content-between align-items-start gap-3 p-4 white-variant rounded-1">
          <i class="fa-solid fa-trophy bg-warning p-3 rounded-5"></i>
          <div>
            <p class="mb-2 fw-bold">Fast Booking</p>
            <p class="">
              "Swift bookings, seamless rides! With our taxi service,
              booking a ride is as quick as a tap. Experience instant
              reservations, hassle-free scheduling, and prompt pickups. Your
              journey starts with a click – book fast, ride faster
            </p>
          </div>
        </div>
      </div>

      <div class="row justify-content-center gap-5">
        <div class="col-12 col-md-4 border d-flex justify-content-between align-items-start gap-3 p-4 white-variant rounded-1">
          <i class="fa-solid fa-taxi bg-warning p-3 rounded-5"></i>
          <div>
            <p class="mb-2 fw-bold">Quick Pickup</p>
            <p class="">
              Fast, reliable, and just a tap away! Conveniently located
              around the city, we're ready to get you where you need to be,
              pronto. Tap, ride, and go with us!
            </p>
          </div>
        </div>

        <div class="col-12 col-md-4 border d-flex justify-content-between align-items-start gap-3 p-4 white-variant rounded-1">
          <i class="fa-solid fa-trophy bg-warning p-3 rounded-5"></i>
          <div>
            <p class="mb-2 fw-bold">Fast Booking</p>
            <p class="">
              "Swift bookings, seamless rides! With our taxi service,
              booking a ride is as quick as a tap. Experience instant
              reservations, hassle-free scheduling, and prompt pickups. Your
              journey starts with a click – book fast, ride faster
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- We are ready to take your call 24 hours, 07 days! -->
  <div class="bg-warning text-center p-5">
    <p class="fw-semibold fs-4 m-0">
      We are ready to take your call 24 hours, 07 days!
    </p>
    <a href="tel:+123 4567 8900" class="text-decoration-none text-black fs-1 fw-bolder"><i class="fa-solid fa-mobile-screen"></i> +123 4567 8900</a>
  </div>

  <!-- For Drivers -->
  <div>
    <div class="bg-light container-fluid mx-auto row p-sm-2 p-md-5">
      <div class="col-12 col-md-6 p-5">
        <p class="fw-bold m-1">For Drivers</p>
        <h1 class="fw-bolder">Do you want to Earn with Us?</h3>
          <a href="./sign-up/driver.php" target="_blank" class="btn btn-warning fw-bold mt-2">Become a Driver</a>
      </div>

      <div class="col-md-6 p-5">
        <img src="./assets/img/taxi-top-view.png" class="img-fluid mx-auto" alt="Responsive image" />
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="bg-black">
    <div class="row gap-2 p-5">
      <div class="col-12 col-md-4">
        <div class="text-light">
          <h4 class="fw-bold">About the Hub</h4>
        </div>
        <p class="text-color">
          Meet City<span class="text-warning">Taxi</span> – your go-to for
          swift, safe rides! With a commitment to excellence, we offer
          seamless travel with a reliable fleet and professional drivers. Your
          journey, our priority. Choose us for a ride that exceeds
          expectations!
        </p>
        <div class="text-warning">
          <a href="#" target="_blank" class="text-decoration-none text-warning mx-3"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="text-decoration-none text-warning mx-3"><i class="fa-brands fa-whatsapp"></i></a>
          <a href="#" target="_blank" class="text-decoration-none text-warning mx-3"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" target="_blank" class="text-decoration-none text-warning mx-3"><i class="fa-brands fa-x-twitter"></i></a>
        </div>
      </div>

      <div class="col-12 col-md-4"></div>
    </div>
  </div>


  <!-- Boostrap JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>