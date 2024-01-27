<?php
include('../includes/connect.php');
session_start();

echo $_SESSION['operatorUsername'];
if (isset($_GET['reservation_id'])) {
    $parsedReservationId = $_GET['reservation_id'];

    $getReservationDetail = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE reservation_id = $parsedReservationId");
    $isDataExist = mysqli_num_rows($getReservationDetail);

    if ($isDataExist == 1) {
        $driverId = $_GET['driver_id'];

        $assignDriver = mysqli_query($con, "UPDATE `table_reservation` SET driver_id = $driverId WHERE reservation_id = $parsedReservationId");
        if ($assignDriver) {
            echo "<script>alert('The reservation has been confirmed successfully.')</script>";
            echo "<script>window.open('operator-homepage.php?check_queries','_self')</script>";
        }
    }
}
