<?php
include('./includes/connect.php');
session_start();

// Getting Passenger Name from Passenger Table
// echo $_SESSION['passengerUsername'];
$sessionPassengerUsername = $_SESSION['passengerUsername'];

$getUsernameFromDB = mysqli_query($con, "SELECT passenger_name FROM `table_passenger` WHERE passenger_username = '$sessionPassengerUsername'");
$arrayOfPassengerUsername = mysqli_fetch_assoc($getUsernameFromDB);

$isUsernameExist = mysqli_num_rows($getUsernameFromDB);
if ($isUsernameExist == 1) {
  $passengerName = $arrayOfPassengerUsername['passenger_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Fav Icon -->
  <link rel="shortcut icon" href="./assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
  <title>All Drivers | City - Taxi</title>

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
</head>

<body class="overflow-x-hidden bg-light">
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
        <div class="collapse navbar-collapse fs-5 d-md-flex justify-content-end" id="navbarSupportedContent">
          <div class="bg-warning px-3 fw-semibold py-1 rounded-2">
            For More Enquiry: &nbsp;
            <i class="fa-solid fa-phone"></i>
            <a href="tel:0754946927" class="fw-normal font-black-secondary text-decoration-none font-grey">0754946927</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- End -->

  <!-- Taxi Reserving Form -->
  <main class="px-2 px-sm-3 px-md-5 pb-5">
    <h3 class="text-center fw-semibold mt-5 font-black p-3 rounded-3">
      <span class="text-warning background-black-color py-1 px-3 rounded-3">Taxi</span>
      Reservation Form
    </h3>
    <p class="text-center">
      Please fill out the form below to reserve your Taxi. 👇
    </p>

    <!-- Sign Up Form -->
    <div class="form-width mt-md-2">
      <form method="post" class="background-grey p-2 p-sm-3 p-md-5 rounded-2" id="passenger-reservation-form">
        <!-- Pickup Location -->
        <div class="mb-3 w-100">
          <label for="passenger-pickup-location" class="form-label">Pickup Location<span class="text-danger">*</span></label>
          <div>
            <input type="text" class="form-control shadow-none" id="passenger-pickup-location" name="passenger-pickup-location" placeholder="Enter your Pickup Location" required="required" />
          </div>
        </div>

        <!-- Drop Location -->
        <div class="mb-3 w-100">
          <label for="passenger-drop-location" class="form-label">Drop Location<span class="text-danger">*</span></label>
          <div>
            <input type="text" class="form-control shadow-none" id="passenger-drop-location" name="passenger-drop-location" placeholder="Enter your Drop Location" required="required" />
          </div>
        </div>

        <!-- Date and Time of Reservation -->
        <div class="mb-3 w-100">
          <label for="date-and-time-of-reservation" class="form-label">Date<span class="text-danger">*</span></label>
          <div>
            <input type="datetime-local" class="form-control shadow-none" id="date-and-time-of-reservation" name="date-and-time-of-reservation" required="required" />
          </div>
        </div>
        <!-- Create Account Button -->
        <input type="submit" class="btn bg-warning border-black mt-3 mb-3 w-100" value="Confirm Reservation" />
      </form>
    </div>
  </main>

  <!-- Boostrap JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <!-- End -->

  <!-- JavaScript Validation for Inputs -->
  <script>
    const passengerReservationFormEl = document.querySelector(
      "#passenger-reservation-form"
    );
    const validator = new window.JustValidate(passengerReservationFormEl);

    // console.log("hi");
    // console.log(validator.addField);

    validator.addField(
      "#passenger-pickup-location",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 3,
        },
        {
          rule: "maxLength",
          value: 20,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-drop-location",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 3,
        },
        {
          rule: "maxLength",
          value: 20,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );
    validator.addField(
      "#date-and-time-of-reservation",
      [{
        rule: "required",
      }, ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.onSuccess(() => {
      passengerReservationFormEl.submit();
      passengerReservationFormEl.reset();
    })
  </script>
</body>

</html>

<!-- PHP Code to Process Reservation -->
<?php
// Storyline
// 1. Get the driverId & passengerId from using $_GET;
if (isset($_GET['driverId'])) {
  if (isset($_GET['passengerId'])) {

    $parsedDriverId = $_GET['driverId'];
    $parsedPassengerId = $_GET['passengerId'];
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // 2. Get the details of Reservation process from Form.
  $passengerPickupLocationEl = $_POST['passenger-pickup-location'];
  $passengerDropLocationEl = $_POST['passenger-drop-location'];
  $dateAndTimeOfReservationEl = $_POST['date-and-time-of-reservation'];


  $reservationStatus = "on process";

  // 3. Store in those datas in DB.
  $makeReserveTaxi = mysqli_query(
    $con,
    "INSERT INTO `table_reservation` 
    (
      pickup_location, 
      drop_location, 
      reservation_status,
      driver_id,
      passenger_id,
      ride_start_time,
      ride_end_time
    ) 
    VALUES 
    (
      '$passengerPickupLocationEl',
      '$passengerDropLocationEl',
      '$reservationStatus',
      $parsedDriverId,
      $parsedPassengerId,
      '$dateAndTimeOfReservationEl',
      NOW()
    )"
  );

  // $isReserved = mysqli_affected_rows($con);
  if ($makeReserveTaxi) {
    // echo "<script>alert('Hi ' . $passengerName . '! Thank you for choosing us. Your Reservation is confirmed. Hope you will enjoy!🤝')</script>";
    echo "<script>alert('Hi $passengerName! Thank you for choosing us. Your Reservation is confirmed. Hope you will enjoy!🤝')</script>";
    echo "<script>window.open('./passenger-directory/passenger-homepage.php','_self')</script>";
  }
}
?>