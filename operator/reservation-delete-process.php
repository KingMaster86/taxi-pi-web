<?php
include('../includes/connect.php');
session_start();

if (isset($_GET['operator_id'])) {
    $parsedOperatorId = $_GET['operator_id'];

    $deletePendingReservation = mysqli_query($con, "DELETE FROM `table_reservation` WHERE operator_id = $parsedOperatorId");
    if ($deletePendingReservation) {
        echo "<script>alert('Dear Operator! The reservation has been canceled.')</script>";
        echo "<script>window.open('operator-homepage.php?check_queries','_self')</script>";
    }
}
