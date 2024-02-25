<?php
include('../includes/connect.php');
include('../includes/function.php');
@session_start();
// $number;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="row justify-content-center  gap-5 p-4">
        <!-- Total Passengers Card -->
        <div class="card dashboard-card" style="width: 18rem">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold font-black">
                        Total Passengers
                    </h5>
                    <i class="fa-solid fa-users bg-secondary text-light p-2 rounded-5"></i>
                </div>

                <!-- PHP Code to Count the Total Passengers -->
                <?php
                // $number;
                $countTotalPassengers = mysqli_query($con, "SELECT COUNT(id) AS total_passengers FROM `table_passenger`");

                // * Fetch the result row as an associative array
                $row = mysqli_fetch_assoc($countTotalPassengers);

                // * Get the total count of passengers from the result
                $totalPassengers = $row['total_passengers'];

                $number = convertStringIntoInt($totalPassengers);
                ?>
                <h1 class="font-black"><?php echo $number; ?></h1>
                <a href="./admin-panel.php?passengers" class="card-link text-decoration-none">View All Passengers</a>
            </div>
        </div>

        <!-- Total Drivers Card -->
        <div class="card dashboard-card" style="width: 18rem">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold font-black">Total Drivers</h5>
                    <i class="fa-solid fa-id-card bg-secondary text-light p-2 rounded-5"></i>
                </div>

                <!-- PHP Code to Count the Total Passengers -->
                <?php
                $driverNumber;
                $countTotalDrivers = mysqli_query($con, "SELECT COUNT(driver_id) AS total_drivers FROM `table_driver`");

                // * Fetch the result row as an associative array
                $row = mysqli_fetch_assoc($countTotalDrivers);

                // * Get the total count of passengers from the result
                $totalDrivers = $row['total_drivers'];

                if ($totalDrivers <= 9) {
                    $driverNumber = "0" . $totalDrivers;
                } else {
                    $driverNumber = $totalDrivers;
                }
                ?>


                <h1 class="font-black"><?php echo $driverNumber; ?></h1>
                <a href="./admin-panel.php?drivers" class="card-link text-decoration-none">View All Drivers</a>
            </div>
        </div>

        <!-- On Process reservations -->
        <div class="card dashboard-card" style="width: 18rem">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold font-black">Total On Process Reservations</h5>
                    <i class="fa-solid fa-spinner bg-secondary text-light p-2 rounded-5"></i>
                </div>

                <!-- PHP Code to Count the Total On Process Reservations -->
                <?php

                $countTotalOnProcessState = mysqli_query($con, "SELECT COUNT(reservation_id) AS total_on_process FROM `table_reservation` WHERE reservation_status = 'on process'");

                // * Fetch the result row as an associative array
                $row = mysqli_fetch_assoc($countTotalOnProcessState);

                // * Get the total count of passengers from the result
                $totalOnProcess = $row['total_on_process'];

                $number = convertStringIntoInt($totalOnProcess);
                ?>

                <h1 class="font-black"><?php echo $number; ?></h1>
                <a href="./admin-panel.php?drivers" class="card-link text-decoration-none">View Details</a>
            </div>
        </div>

        <!-- Completed reservations -->
        <div class="card dashboard-card" style="width: 18rem">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold font-black">Total Completed Reservations</h5>
                    <i class="fa-solid fa-check bg-secondary text-light p-2 rounded-5"></i>
                </div>

                <!-- PHP Code to Count the Total Passengers -->
                <?php

                $countTotalCompletedState = mysqli_query($con, "SELECT COUNT(reservation_id) AS total_completed FROM `table_reservation` WHERE reservation_status = 'completed'");

                // * Fetch the result row as an associative array
                $row = mysqli_fetch_assoc($countTotalCompletedState);

                // * Get the total count of passengers from the result
                $totalCompleted = $row['total_completed'];

                $number = convertStringIntoInt($totalCompleted);
                ?>


                <h1 class="font-black"><?php echo $number; ?></h1>
                <a href="./admin-panel.php?completed_reservations" class="card-link text-decoration-none">View Details</a>
            </div>
        </div>

        <!-- Paid reservations -->
        <div class="card dashboard-card" style="width: 18rem">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="card-title fw-bold font-black">Payment Received Reservations</h5>
                    <i class="fa-solid fa-receipt bg-secondary text-light p-2 rounded-5"></i>
                </div>

                <!-- PHP Code to Count the Total Passengers -->
                <?php

                $countTotalPaidReservations = mysqli_query($con, "SELECT COUNT(payment_id) AS total_paid FROM `table_payment` WHERE status = 'paid'");

                // * Fetch the result row as an associative array
                $row = mysqli_fetch_assoc($countTotalPaidReservations);

                // * Get the total count of passengers from the result
                $totalPaid = $row['total_paid'];

                $number = convertStringIntoInt($totalPaid);
                ?>


                <h1 class="font-black"><?php echo $number; ?></h1>
                <a href="./admin-panel.php?drivers" class="card-link text-decoration-none">View Details</a>
            </div>
        </div>
    </div>
</body>

</html>