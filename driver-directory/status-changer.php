<!-- 
    Storyline
    1. Get the driver_id from table_driver using $_GET[]
    2. Send that id as GET variable to 'status-changer.php'
    3. Using that variable need to access `table_driver`
    4. Fetch the 'availability_status' from `table_driver` based on recieved driver_id.
    5. Write the UPDATE Query to update the 'availability_status'.
 -->

<?php
include('../includes/connect.php');

if (isset($_GET['driverId'])) {
    $parsedDriverId = $_GET['driverId'];

    $fetchParsedDriverIdData = mysqli_query($con, "SELECT * FROM `table_driver` WHERE driver_id = $parsedDriverId");
    $isParsedDriverIdExist = mysqli_num_rows($fetchParsedDriverIdData);

    if ($isParsedDriverIdExist > 0) {
        $arrayOfParsedDriverIdData = mysqli_fetch_assoc($fetchParsedDriverIdData);

        $driverAvailabilityStatus = $arrayOfParsedDriverIdData['availability_status'];

        if ($driverAvailabilityStatus == "available") {

            $updateStatusAsBusy = mysqli_query($con, "UPDATE `table_driver` SET availability_status = 'busy' WHERE driver_id = $parsedDriverId");
            $isRowsAffected = mysqli_affected_rows($con);

            if ($isRowsAffected == 1) {
                $driverName = $arrayOfParsedDriverIdData['driver_name'];

                echo "<script>alert('Hello " . $driverName . "! Your Status Changed as Busy State.')</script>";
                echo "<script>window.open('homepage.php','_self')</script>";
            }
        } else {

            $updateAvailabilityStatusAsAvailable = mysqli_query($con, "UPDATE `table_driver` SET availability_status = 'available' WHERE driver_id = $parsedDriverId");
            $isRowsAffected = mysqli_affected_rows($con);

            if ($isRowsAffected == 1) {
                $driverName = $arrayOfParsedDriverIdData['driver_name'];

                echo "<script>alert('Hello " . $driverName . "! Your Status Changed as Available State.')</script>";
                echo "<script>window.open('homepage.php','_self')</script>";
            }
        }
    }
}
