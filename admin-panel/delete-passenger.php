<?php

include('../includes/connect.php');
include('../includes/function.php');

if (isset($_GET['passenger_id'])) {
    $parsedPassengerId = $_GET['passenger_id'];
    $isPassengerDetailExist = mysqli_query($con, "SELECT * FROM `table_passenger` WHERE id = $parsedPassengerId");

    if (mysqli_num_rows($isPassengerDetailExist) == 1) {
        $arrayOfPassengerDetail = mysqli_fetch_assoc($isPassengerDetailExist);
        $passengerName = $arrayOfPassengerDetail['passenger_name'];

        deleteRecord($con, "DELETE FROM `table_passenger` WHERE id = $parsedPassengerId");

        echo "<script>window.open('admin-panel.php?passengers','_self')</script>";
    }
}
