<?php
if (isset($_GET['driver_id'])) {
    $passedDriverId = $_GET['driver_id'];

    $getDriverDetail = mysqli_query($con, "SELECT * FROM `table_driver` WHERE driver_id = $passedDriverId");
    if (mysqli_num_rows($getDriverDetail) == 1) {
        $arrayOfDriverDetail = mysqli_fetch_assoc($getDriverDetail);

        $driverName = $arrayOfDriverDetail['driver_name'];
    }
}
?>

<div class="table-responsive mt-3 p-5">
    <h3 class="text-center text-warning mt-5 mb-3 fw-semibold">Dear <?php echo $driverName; ?>, Here you can explore your whole Service log details...</h3>
    <table class="table text-center">
        <thead>
            <tr>
                <th class="bg-warning">S.No</th>
                <th class="bg-warning">Reservation ID</th>
                <th class="bg-warning">Passenger ID</th>
                <th class="bg-warning">Pickup Location</th>
                <th class="bg-warning">Drop Location</th>
                <th class="bg-warning">Status</th>
                <th class="bg-warning">Date</th>
                <th class="bg-warning">Feedback</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $serialNo = 1;
            $status;
            // * Storyline:
            // * 1. Get the data from `table_reservation` based on driver id.
            $getServiceLogDetails = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE driver_id = $passedDriverId");

            if (mysqli_num_rows($getServiceLogDetails) > 0) {
                while ($arrayOfServiceDetails = mysqli_fetch_assoc($getServiceLogDetails)) {
                    $reservationId = $arrayOfServiceDetails['reservation_id'];
                    $passengerId = $arrayOfServiceDetails['passenger_id'];
                    $pickupLocation = $arrayOfServiceDetails['pickup_location'];
                    $dropLocation = $arrayOfServiceDetails['drop_location'];
                    $reservationStatus = $arrayOfServiceDetails['reservation_status'];
                    $rideStartTime = $arrayOfServiceDetails['ride_start_time'];

                    if ($reservationStatus == "completed") {
                        $status = "Completed";
                    } else {
                        $status = "On Process";
                    }
                    // * 2. Show in UI

            ?>

                    <tr>
                        <td>#<?php echo $serialNo; ?></td>
                        <td><?php echo $reservationId; ?></td>
                        <td><?php echo $passengerId; ?></td>
                        <td class="text-capitalize"><?php echo $pickupLocation; ?></td>
                        <td class="text-capitalize"><?php echo $dropLocation; ?></td>
                        <td><?php echo $status; ?></td>
                        <td><?php echo $rideStartTime; ?></td>
                        <td>
                            <?php

                            $isFeedbackExist = mysqli_query($con, "SELECT * FROM `table_driver_feedback` WHERE reservation_id = $reservationId");

                            if (mysqli_num_rows($isFeedbackExist) > 0 && mysqli_num_rows($isFeedbackExist) == 1) {
                                echo "<strong><box-icon type='solid' name='badge-check'></box-icon> </strong>";
                                // echo "<a href='./driver-feedback/feedback.php?reservation_id=$reservationId'>Your feedback recorded.</a>";
                            } else {
                                echo "<a href='./driver-feedback/feedback.php?reservation_id=$reservationId'>Tap and Say</a>";
                            }
                            ?>
                        </td>
                    </tr>
            <?php
                    $serialNo++;
                }
            }
            ?>
        </tbody>
    </table>
</div>