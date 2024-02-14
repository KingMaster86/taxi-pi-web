<?php
include('../../includes/connect.php');
session_start();

// echo $_SESSION['passengerUsername'];
// !Here Assume that Rs. 100 will charge per KM in taxi trip.
// Todo: When the page loads, It need to show all the details in this form to Payment Process.
// * Storyline:
// * 1. Need to get Reservation id from 'table_reservation' and get Driver & Passenger Name.
if (isset($_GET['reservation_id'])) {
    $parsedReservationId = $_GET['reservation_id'];

    // Construct a SQL query using JOIN with aliases for table names
    $query = "SELECT tr.*, tp.passenger_name, td.driver_name FROM `table_reservation` AS tr 
    LEFT JOIN `table_passenger` AS tp ON tr.passenger_id = tp.id
    LEFT JOIN `table_driver` AS td ON tr.driver_id = td.driver_id
    WHERE tr.reservation_id = $parsedReservationId
    ";

    $getReservationData = mysqli_query($con, $query);
    $arrayOfReservationData = mysqli_fetch_assoc($getReservationData);


    $isDataExist = mysqli_num_rows($getReservationData);
    if ($isDataExist == 1) {
        $pickupLocation = $arrayOfReservationData['pickup_location'];
        $dropLocation = $arrayOfReservationData['drop_location'];
        $tripStartTime = $arrayOfReservationData['ride_start_time'];
        $passengerName = $arrayOfReservationData['passenger_name'];
        $driverName = $arrayOfReservationData['driver_name'];
        $driverId = $arrayOfReservationData['driver_id'];
    }
}

// * 2. Get the Pickup Location & Drop Location Details and KM.
"https://maps.googleapis.com/maps/api/distancematrix/json?departure_time=now&destinations=Lexington%2CMA%7CConcord%2CMA
&origins=Boston%2CMA%7CCharlestown%2CMA&key=YOUR_API_KEY";

$API_URL = "https://maps.googleapis.com/maps/api/distancematrix/json?departure_time=now";
$apiKey = "AIzaSyBLjFhBTzZFLYbXuFSiEjSc3s7fpOHggd8";

$requestURL = $API_URL . "&destinations=" . urlencode($dropLocation) . "&origins=" . urlencode($pickupLocation) . "&key=" . $apiKey;
$responseOfAPI = file_get_contents($requestURL);

if ($responseOfAPI === false) {
    echo "<script>alert('Unable to get the data.')</script>";
} else {
    $distanceObj = json_decode($responseOfAPI);
    if ($distanceObj->status == "OK") {
        $tripDistanceInMeter = $distanceObj->rows[0]->elements[0]->distance->value;
        $tripDistanceInKM = $tripDistanceInMeter / 1000;
        // echo $tripDistanceInKM;

        // * 4. Calculate the Amount. 
        $totalAmoutOfTrip = $tripDistanceInKM * 100;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script>window.open('checkout.php?reservation_id={$parsedReservationId}&distance={$tripDistanceInKM}&amount={$totalAmoutOfTrip}','_self')</script>";
}
?>
<!-- HTML Blocks -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>Payment Page - Make your payments | City - Taxi</title>

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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />

    <!-- External CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/style2.css" />
    <!-- <link rel="stylesheet" href="./assets/css/style3.css" /> -->
</head>

<body class="overflow-x-hidden bg-external-white">
    <!-- Header Area -->
    <header class="container-fluid background-black-color">
        <nav class="navbar navbar-expand-lg container py-3">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand text-white fs-1 fw-bold" title="Go to Homepage" href="../../index.php">City<span class="text-warning">Taxi</span></a>

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
                                <a class="dropdown-item text-light hover-effect" href="./driver-directory/login.php">Driver</a>
                            </li>
                            <li>
                                <a class="dropdown-item text-light hover-effect" href="./passenger-directory/passenger-login.php">Passenger</a>
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
    <main class="px-2 px-sm-3 px-md-5 pb-5">
        <h3 class="text-center fw-semibold mt-5 font-black p-3 rounded-3">
            <span class="text-warning background-black-color py-1 px-3 rounded-3">Enjoy your Trip</span>
            & Make your payments
        </h3>
        <p class="text-center">Dear <?php echo $passengerName; ?>! Here the summary of your trip.</p>

        <!-- Sign Up Form -->
        <div class="form-width mt-md-2">
            <form method="post" class="background-grey p-2 p-sm-3 p-md-5 rounded-2" id="passenger-reservation-form">
                <!-- Driver Name-->
                <div class="mb-3 w-100">
                    <label for="driver-name" class="form-label fw-semibold">Driver Name:
                    </label>
                    <div>
                        <label for="driver-name" class="form-control"><?php echo $driverName; ?> </label>
                    </div>
                </div>

                <div class="mb-3 w-100">
                    <label for="driver-id" class="form-label fw-semibold">Driver ID:
                    </label>
                    <div>
                        <label for="driver-id" class="form-control"> <?php echo $driverId; ?></label>
                    </div>
                </div>

                <div class="mb-3 w-100">
                    <label for="passenger-pickup-location" class="form-label fw-semibold">Pickup Location:
                    </label>
                    <div>
                        <label for="passenger-pickup-location" class="form-control text-capitalize"><?php echo $pickupLocation; ?>
                        </label>
                    </div>
                </div>

                <!-- Drop Location -->
                <div class="mb-3 w-100">
                    <label for="passenger-pickup-location" class="form-label fw-semibold">Drop Location:
                    </label>
                    <div>
                        <label for="passenger-pickup-location" class="form-control text-capitalize "><?php echo $dropLocation; ?>
                        </label>
                    </div>
                </div>

                <!-- Date and Time of Reservation -->
                <div class="mb-3 w-100">
                    <label for="passenger-pickup-location" class="form-label fw-semibold">Date:
                    </label>
                    <div>
                        <label for="passenger-pickup-location" class="form-control"><?php echo $tripStartTime; ?>
                        </label>
                    </div>
                </div>

                <!-- Amount -->
                <div class="mb-3 w-100">
                    <label for="passenger-pickup-location" class="form-label fw-semibold">Your total payment:
                    </label>
                    <div>
                        <label for="passenger-pickup-location" class="form-control">Rs. <?php echo $totalAmoutOfTrip; ?>.00
                        </label>
                    </div>
                </div>

                <div class="mb-2 w-100">
                    <input type="submit" value="Confirm Payment" class="btn bg-warning border-1 border-black w-100 mt-3" />
                </div>
            </form>
        </div>
    </main>

    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <!-- End -->
</body>

</html>