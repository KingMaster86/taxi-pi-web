<div class="mt-5">
    <a href="admin-panel.php?dashboard" class="d-block pb-3 text-black ">Back to Summary</a>
    <table class="table text-center">
        <thead>
            <tr>
                <th class="background-black-color text-light">S.No</th>
                <th class="background-black-color text-light">Reservation ID</th>
                <th class="background-black-color text-light">Driver ID</th>
                <th class="background-black-color text-light">Passenger ID</th>
                <th class="background-black-color text-light">Pickup Location</th>
                <th class="background-black-color text-light">Drop Location</th>
                <th class="background-black-color text-light">Operator ID</th>
                <th class="background-black-color text-light">Date</th>
                <th class="background-black-color text-light">Payment Process</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $serialNumber = 1;
            $operatorDetail;
            $paymentProcess;
            $getSuccessReservationList = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE reservation_status = 'completed'");

            if (mysqli_num_rows($getSuccessReservationList) > 0) {

                while ($arrayOfReservationDetails = mysqli_fetch_assoc($getSuccessReservationList)) {
                    $reservationId = $arrayOfReservationDetails['reservation_id'];
                    $driverId = $arrayOfReservationDetails['driver_id'];
                    $passengerId = $arrayOfReservationDetails['passenger_id'];
                    $pickupLocation = $arrayOfReservationDetails['pickup_location'];
                    $dropLocation = $arrayOfReservationDetails['drop_location'];
                    $operatorId = $arrayOfReservationDetails['operator_id'];
                    $date = $arrayOfReservationDetails['ride_start_time'];

                    // if ($operatorId == "0") {
                    //     $operatorDetail = "";
                    // }
            ?>
                    <tr>
                        <td class="bg-light text-black">#<?php echo $serialNumber; ?></th>
                        <td class="bg-light text-black"><?php echo $reservationId; ?></th>
                        <td class="bg-light text-black"><?php echo $driverId; ?></th>
                        <td class="bg-light text-black"><?php echo $passengerId; ?></th>
                        <td class="bg-light text-black text-capitalize"><?php echo $pickupLocation; ?></th>
                        <td class="bg-light text-black text-capitalize"><?php echo $dropLocation; ?></th>
                        <td class="bg-light text-black"><?php echo $operatorId; ?></th>
                        <td class="bg-light text-black"><?php echo $date; ?></th>
                        <td class="bg-light text-black">Paid</th>
                    </tr>
            <?php
                    $serialNumber++;
                }
            }
            ?>
        </tbody>
    </table>
</div>