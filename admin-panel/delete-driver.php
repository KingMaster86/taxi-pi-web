<?php
include('../includes/connect.php');
include('../includes/function.php');


if (isset($_GET['driver_id'])) {
    $parsedDriverId = $_GET['driver_id'];

    $getDriverDetails = mysqli_query($con, "SELECT * FROM `table_driver` WHERE driver_id = $parsedDriverId");

    if (mysqli_num_rows($getDriverDetails) == 1) {

        deleteRecord($con, "DELETE FROM `table_driver` WHERE driver_id = $parsedDriverId");

        echo "<script>window.open('admin-panel.php?drivers','_self')</script>";
    }
}
