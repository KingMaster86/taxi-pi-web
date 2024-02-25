<?php
include('../includes/connect.php');

@session_start();
// $_SESSION['operatorUsername']
?>

<div class="table-responsive mt-3 p-5">
    <h3 class="text-center text-warning mt-5 mb-3 fw-semibold">Dear Operator! Here you can explore the orders which are done by you!</h3>
    <table class="table text-center">
        <thead>
            <tr>
                <th class="bg-warning">S.No</th>
                <th class="bg-warning">Reservation ID</th>
                <th class="bg-warning">Driver ID</th>
                <th class="bg-warning">Pickup Location</th>
                <th class="bg-warning">Drop Location</th>
                <th class="bg-warning">Status</th>
                <th class="bg-warning">Date</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $serialNo = 1;
            $readableStatus;
            $sessionUserName = $_SESSION['operatorUsername'];
            $getOperatorId = mysqli_query($con, "SELECT * FROM `table_operator` WHERE operator_name = '$sessionUserName'");

            if (mysqli_num_rows($getOperatorId) > 0 && mysqli_num_rows($getOperatorId) == 1) {
                $arrayOfOperatorDet = mysqli_fetch_assoc($getOperatorId);
                $operatorId = $arrayOfOperatorDet['operator_id'];

                $getDetailsFromReservation = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE operator_id = $operatorId");

                if (mysqli_num_rows($getDetailsFromReservation) > 0) {

                    while ($arrayOfReservationDet = mysqli_fetch_assoc($getDetailsFromReservation)) {
                        $reservationId = $arrayOfReservationDet['reservation_id'];
                        $driverID = $arrayOfReservationDet['driver_id'];
                        $pickupLocation = $arrayOfReservationDet['pickup_location'];
                        $dropLocation = $arrayOfReservationDet['drop_location'];
                        $status = $arrayOfReservationDet['reservation_status'];
                        $date = $arrayOfReservationDet['ride_start_time'];
                    }

            ?>
                    <tr>
                        <td class="bg-light">#<?php echo $serialNo; ?></td>
                        <td class="bg-light"><?php echo $reservationId; ?></td>
                        <td class="bg-light"><?php echo $driverID; ?></td>
                        <td class="bg-light text-capitalize "><?php echo $pickupLocation; ?></td>
                        <td class="bg-light text-capitalize "><?php echo $dropLocation; ?></td>
                        <td class="bg-light text-capitalize "><?php echo $status; ?></td>
                        <td class="bg-light"><?php echo $date; ?></td>
                    </tr>
            <?php

                }
                $serialNo++;
            }
            ?>
        </tbody>
    </table>
</div>