<?php
include('../includes/connect.php');
@session_start();
// echo $_SESSION['passengerUsername'];

// * Storyline
// * 1. Need to get the username using $_SESSION.
$sessionUsername = $_SESSION['passengerUsername'];

// * 2. Check username exist or not in `table_passenger` table.
$isUsernameExist = mysqli_query($con, "SELECT * FROM `table_passenger` WHERE passenger_username = '$sessionUsername'");

// * 3. If exist, need to get the details
if (mysqli_num_rows($isUsernameExist) == 1) {
    $arrayOfPassengerDetail = mysqli_fetch_assoc($isUsernameExist);
    $passengerId = $arrayOfPassengerDetail['id'];
}
?>

<div class="table-responsive mt-3 p-5">
    <h3 class="text-center text-warning mt-5 mb-3 fw-semibold">Dear Mushkir, Here you can explore your whole trip log...</h3>
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
                <th class="bg-warning">Payment Process</th>
                <th class="bg-warning">View Payment Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $serialNumber = 1;
            $paymentProcess;
            $getAllReservationQueries = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE passenger_id = $passengerId");

            if (mysqli_num_rows($getAllReservationQueries) > 0) {

                while ($arrayOfReservationDetails = mysqli_fetch_assoc($getAllReservationQueries)) {
                    $reservationId = $arrayOfReservationDetails['reservation_id'];
                    $driverId = $arrayOfReservationDetails['driver_id'];
                    $pickupLocation = $arrayOfReservationDetails['pickup_location'];
                    $dropLocation = $arrayOfReservationDetails['drop_location'];
                    $reservationStatus = $arrayOfReservationDetails['reservation_status'];
                    $date = $arrayOfReservationDetails['ride_start_time'];



            ?>
                    <tr>
                        <td>#<?php echo $serialNumber; ?> </td>
                        <td><?php echo $reservationId; ?></td>
                        <td><?php echo $driverId; ?></td>
                        <td class='text-capitalize'><?php echo $pickupLocation; ?></td>
                        <td class='text-capitalize'><?php echo $dropLocation; ?></td>
                        <td class='text-capitalize'><?php echo $reservationStatus; ?></td>
                        <td><?php echo $date; ?></td>
                        <td>
                            <?php
                            if ($reservationStatus == "completed") {
                                $paymentProcess = "Paid";
                            } else {
                                $paymentProcess = "Unpaid ";
                            }
                            echo $paymentProcess;
                            ?>
                        </td>
                        <td>

                            <?php
                            // * This page shows passenger's previous trip summary.
                            // * Here, if the payment process is "Paid", It need to show the paid history through the reservation id.
                            // * Else if the passenger's payment process is "on process, It need to redirect to Payment page through Reservation id."

                            if ($reservationStatus == "completed") {
                                echo "<a href='payment-history.php?reservation_id=$reservationId' class='text-black'>View Payment History</a>";
                            } else {
                                echo "<a href='./payment/payment.php?reservation_id=$reservationId' class='text-black'>Tap to Pay</a>";
                            }

                            ?>
                        </td>
                    </tr>
            <?php
                    $serialNumber++;
                }
            }
            ?>
        </tbody>
    </table>
</div>