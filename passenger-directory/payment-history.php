<?php
include('../includes/connect.php');

if (isset($_GET['reservation_id'])) {
    $passedReservationId = $_GET['reservation_id'];

    $getReservationDetails = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE reservation_id = $passedReservationId");
    $getPaymentDetails = mysqli_query($con, "SELECT * FROM `table_payment` WHERE reservation_id = $passedReservationId");

    if (mysqli_num_rows($getReservationDetails) > 0 && mysqli_num_rows($getReservationDetails) == 1) {
        $arrayOfReservationDet = mysqli_fetch_assoc($getReservationDetails);

        $driverId = $arrayOfReservationDet['driver_id'];
        $pickupLocation = $arrayOfReservationDet['pickup_location'];
        $dropLocation = $arrayOfReservationDet['drop_location'];
    }

    if (mysqli_num_rows($getPaymentDetails) > 0 && mysqli_num_rows($getPaymentDetails) == 1) {
        $arrayOfPaymentDet = mysqli_fetch_assoc($getPaymentDetails);

        $paidAmount = $arrayOfPaymentDet['amount'];
        $tripDistance = $arrayOfPaymentDet['distance'];
    }
}

?>

<!-- HTML Blocks -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>Payment Summary | City - Taxi</title>

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
    <!-- <link rel="stylesheet" href="./assets/css/style3.css" /> -->
</head>

<body class="overflow-x-hidden bg-external-white">
    <!-- Body -->
    <main class="px-2 px-sm-3 px-md-5 pb-5">
        <h3 class="text-center fw-semibold mt-5 font-black p-3 rounded-3">
            <span class="text-warning background-black-color py-1 px-3 rounded-3">Summary</span>
            of your Payment
        </h3>

        <!-- Summary Form -->
        <div class="form-width mt-md-2">
            <form method="post" class="background-grey p-2 p-sm-3 p-md-5 rounded-2" id="passenger-reservation-form">
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

                <!--  -->
                <div class="mb-3 w-100">
                    <label for="distance" class="form-label fw-semibold">Distance
                    </label>
                    <div>
                        <label for="distance" class="form-control"><?php echo $tripDistance; ?> KM
                        </label>
                    </div>
                </div>

                <!-- Amount -->
                <div class="mb-3 w-100">
                    <label for="passenger-pickup-location" class="form-label fw-semibold">Your total payment:
                    </label>
                    <div>
                        <label for="passenger-pickup-location" class="form-control">Rs. <?php echo $paidAmount; ?>
                        </label>
                    </div>
                </div>

                <div class="mb-2 w-100">
                    <a href="./passenger-homepage.php?history" class="btn bg-warning border-1 border-black w-100 mt-3"> Back to Summary Table </a>
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