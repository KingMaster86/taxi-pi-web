<?php
include('./includes/connect.php');
session_start();

// echo $_SESSION['passengerUsername'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Fav Icon -->
  <link rel="shortcut icon" href="./assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
  <title>Available Drivers | City - Taxi</title>

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
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

  <!-- External CSS -->
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/style2.css" />
  <link rel="stylesheet" href="./assets/css/style3.css" />
</head>

<body class="overflow-x-hidden bg-external-white">
  <!-- Header Area -->
  <header class="container-fluid background-black-color">
    <nav class="navbar navbar-expand-lg container py-3">
      <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand text-white fs-1 fw-bold" title="Go to Homepage" href="./index.php">City<span class="text-warning">Taxi</span></a>

        <!-- Toggle Button (Responsvie) -->
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse d-md-flex justify-content-end" id="navbarSupportedContent">
          <!-- Login Button -->
          <div class="btn-group me-4">
            <button type="button" class="btn btn-warning dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </button>
            <ul class="dropdown-menu bg-black py-2">
              <li>
                <a class="dropdown-item text-light hover-effect" href="#">Admin</a>
              </li>
              <li>
                <a class="dropdown-item text-light hover-effect" href="#">Customer</a>
              </li>
              <li>
                <a class="dropdown-item text-light hover-effect" href="#">Passenger</a>
              </li>
            </ul>
          </div>

          <!-- Sign-Up Button -->
          <div class="btn-group">
            <button type="button" class="btn border-warning text-light hover-effect dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
              Sign Up
            </button>
            <ul class="dropdown-menu bg-black py-2">
              <li>
                <a class="dropdown-item text-light hover-effect" href="./sign-up/customer.php">Passenger</a>
              </li>
              <li>
                <a class="dropdown-item text-light hover-effect" href="./sign-up/driver.php">Driver</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- End -->

  <!-- Body -->
  <main class="container-fluid px-2 px-sm-3 px-md-5 pb-5">
    <h3 class="text-center mt-5">Here you can explore our all currently available Drivers. 👇</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
      <?php

      // Storyline:
      // 1. Get the all data from DB
      $fetchAvailableDriversData = mysqli_query($con, "SELECT * FROM `table_driver` WHERE availability_status = 'available'");
      $isAvailableDriversExist = mysqli_num_rows($fetchAvailableDriversData);

      // 2. Fetch the data with appropriate places
      if ($isAvailableDriversExist > 0) {

        while ($arrayOfAvailableDrivers = mysqli_fetch_assoc($fetchAvailableDriversData)) {
          $driverId = $arrayOfAvailableDrivers['driver_id'];
          $driverName = $arrayOfAvailableDrivers['driver_name'];
          $availableState = $arrayOfAvailableDrivers['availability_status'];
          $driverAddressLine = $arrayOfAvailableDrivers['driver_address_line'];
          $driverCity = $arrayOfAvailableDrivers['driver_city'];
          $driverCountry = $arrayOfAvailableDrivers['driver_country'];
          $driver_image = $arrayOfAvailableDrivers['driver_image'];
          $driverPhoneNo = $arrayOfAvailableDrivers['driver_phone_no'];
          $locationLatitude = $arrayOfAvailableDrivers['location_latitude'];
          $locationLongitude = $arrayOfAvailableDrivers['location_longitude'];
          $startTime = $arrayOfAvailableDrivers['start_time'];
          $endTime = $arrayOfAvailableDrivers['end_time'];

          $driverCurrentLocation = $locationLatitude . "," . $locationLongitude;

          // 2. Fetch the appropiate data to the appropriate place

      ?>
          <div class="col">
            <div class="card pt-4 hover-yellow-effect h-100 ">
              <div class="mx-auto bg-success rounded-circle p-1 h-100 ">
                <img src="./sign-up/driver-profile-picture/<?php echo $driver_image; ?>" class="mx-auto profile-width" alt="Driver Profile Picture" />
              </div>
              <div class="card-body d-md-flex gap-1 align-items-start">
                <!-- Name & Address Div -->
                <div>
                  <h5 class="card-title fw-semibold text-capitalize text-center text-md-start">
                    <?php echo $driverName; ?>
                  </h5>
                  <p class="card-text text-center text-capitalize text-md-start">
                    📍 No. <?php echo $driverAddressLine . ", " . $driverCity . ", " . $driverCountry ?>
                  </p>
                </div>
                <!-- <a href="" class=""></a> -->
                <!-- Available Status Div -->
                <div class="bg-success px-3 py-1 rounded-5 text-light mt-2 mt-md-0 text-center">
                  Available
                </div>
              </div>

              <!-- Contact Number Div -->
              <div class="card-body pb-0 pt-0">
                <p class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-3">
                  Contact Number:
                  <a href="tel:<?php $driverPhoneNo; ?>" class="text-decoration-none hover-color-black text-secondary">0<?php echo $driverPhoneNo; ?></a>
                </p>
              </div>

              <!-- Start Time -->
              <div class="card-body d-md-flex justify-content-between pb-0 pt-0">
                <p class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-2">
                  Start Time:
                  <span class=fw-normal><?php echo $startTime; ?></span>
                </p>

                <p class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-2">
                  End Time:
                  <span class=fw-normal><?php echo $endTime; ?></span>
                </p>
              </div>



              <!-- Locate & Reserve Button Div -->
              <div class="d-md-flex justify-content-between gap-2 align-items-center pb-3 p-2">
                <div class="w-100 mb-3">
                  <?php
                  if (!isset($_SESSION['passengerUsername'])) {
                    echo "<a href='./passenger-directory/passenger-login.php' class='btn bg-warning hover-white-effect w-100'><i class='fa-solid fa-taxi'></i> Reserve for Ride</a>";
                  } else {
                    $sessionPassengerUsername = $_SESSION['passengerUsername'];

                    // Storyline
                    // 1. Get all the passenger details from DB.
                    $fetchPassengersAllDetailFromDB = mysqli_query($con, "SELECT * FROM `table_passenger` WHERE passenger_username = '$sessionPassengerUsername'");
                    $arrayOfSessionPassenger = mysqli_fetch_assoc($fetchPassengersAllDetailFromDB);
                    $isSessionPassengerExist = mysqli_num_rows($fetchPassengersAllDetailFromDB);

                    // 2. Check that if any record exists with $_SESSION['passengerName'] in DB.
                    if ($isSessionPassengerExist > 0) {

                      // 3. If that exists, Need to get that passenger's id from DB.
                      $passengerId = $arrayOfSessionPassenger['id'];

                      // 4. Send that passengerId with driverId to reservation.php file.
                      echo "<a href='./reservation.php?driverId=$driverId&passengerId=$passengerId' class='btn bg-warning hover-white-effect w-100'><i class='fa-solid fa-taxi'></i> Reserve for Ride</a>";
                    }
                  }
                  ?>
                  <!-- <a href="" class="btn bg-warning hover-white-effect w-100"><i class="fa-solid fa-taxi"></i> Reserve for Ride</a> -->
                </div>
                <div class="w-100 mb-3">
                  <a href="<?php echo "https://www.google.com/maps?q= " . $driverCurrentLocation; ?>" target="_blank" class="text-decoration-none btn hover-black-effect background-black-color text-light w-100"><i class="fa-solid fa-location-arrow"></i> Show Location </a>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo "<h4 class='text-center mx-auto  text-danger mt-5'>Sorry! We can't find any available drivers at this moment... <box-icon name='sad' color='#dc3545' animation='flashing' ></box-icon></h4>";
      }
      ?>


    </div>
  </main>

  <!-- Boostrap JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <!-- End -->
</body>

</html>