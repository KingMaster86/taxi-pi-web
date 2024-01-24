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
        echo $passengerName;

        // echo $currentDateTime;
    }
}

date_default_timezone_set('Asia/Kolkata');

// * 2. Access the `table_reservation` table using recieved Passenger id in Step 1.
$fetchDataFromDB = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE passenger_id = $parsedPassengerId");
while ($arrayOfReservationDetail = mysqli_fetch_assoc($fetchDataFromDB)) {
    // * 4. If the record exists, get the reservation status from DB.
    $reservationStatus = $arrayOfReservationDetail['reservation_status'];

    // * 5. Update the status as 'Completed' and end_time as NOW().
    // * Because, It could be considered as the time of the ride end. - [NEED TO FIX THIS ISSUE IN DB]
    if ($reservationStatus == "on process") {
        $currentDateTime = date('Y-m-d - h:i:sa');
        $updateStatusAndTime = mysqli_query(
            $con,
            "UPDATE 
            `table_reservation` 
            SET 
            reservation_status = 'completed', 
            ride_end_time = '$currentDateTime' 
            WHERE 
            passenger_id = $parsedPassengerId"
        );

        if ($updateStatusAndTime) {
            echo "<script>alert('Dear $passengerName! Your ride has been completed. Thank you for choosing us. 🤝')</script>";
            echo "<script>window.open('passenger-homepage.php','_self')</script>";
        } else {
            echo "Error!";
        }
    }
}
