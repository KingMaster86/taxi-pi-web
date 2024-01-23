<?php
include('../includes/connect.php');

// Todo: Need to change the status from On Process to Complete.
// * Storyline
// * 1. Get the passenger id using $_GET[];
if (isset($_GET['passenger_id'])) {
    $parsedPassengerId = $_GET['passenger_id'];

    $getNameOfPassenger = mysqli_query($con, "SELECT passenger_name FROM `table_passenger` WHERE id = $parsedPassengerId");
    $isPassengerNameExist = mysqli_num_rows($getNameOfPassenger);

    if ($isPassengerNameExist > 0 && $isPassengerNameExist == 1) {
        $arrayOfPassengerName = mysqli_fetch_assoc($getNameOfPassenger);
        $passengerName = $arrayOfPassengerName['passenger_name'];
    }
}

// * 2. Access the `table_reservation` table using recieved Passenger id in Step 1.
$fetchDataFromDB = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE passenger_id = $parsedPassengerId");
$arrayOfReservationDetail = mysqli_fetch_assoc($fetchDataFromDB);

// * 3. If the record exist, get the reservation status from DB.
$isReservationDataExist = mysqli_num_rows($fetchDataFromDB);
if ($isReservationDataExist > 0) {
    $reservationStatus = $arrayOfReservationDetail['reservation_status'];

    // * 4. Update as status as 'Completed.' and end_time as NOW().
    // * Because, It could be consider as time of ride end.
    if ($reservationStatus == "on process") {
        $updateStatusAndTime = mysqli_query(
            $con,
            "UPDATE 
            `table_reservation` 
            SET 
            reservation_status = 'completed', 
            ride_end_time = NOW() 
            WHERE 
            passenger_id = $parsedPassengerId"
        );

        $isRowsAffected = mysqli_affected_rows($con);
        if ($isRowsAffected == 1) {
            echo "<script>alert('Dear ' . $passengerName . '! Your ride has been completed. Thank you for choosing us. 🤝')</script>";
            echo "<script>window.open('passenger-homepage.php','_self')</script>";
        } else {
        }
    }
}
