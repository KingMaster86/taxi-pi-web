<?php
include('../includes/connect.php');
include('../includes/function.php');
@session_start();




// * 4. Show those drivers detail in the UI with their id
?>

<div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2 px-4">
        <?php
        // * Storyline
        // * 1. Get the parsed operator Id
        if (isset($_GET['operator_id'])) {
            $parsedOperatorId = $_GET['operator_id'];


            // * 2. Access the `table_reservation` table through operator id and get the Pickup, and Drop location details.
            $getOperatorReservedTrip = mysqli_query($con, "SELECT * FROM `table_reservation` WHERE operator_id = $parsedOperatorId AND driver_id = 0");
            $isDetailExist = mysqli_num_rows($getOperatorReservedTrip);

            if ($isDetailExist == 1) {
                $getReserveDetail = mysqli_fetch_assoc($getOperatorReservedTrip);
                $pickupLocation = $getReserveDetail['pickup_location'];
                $reservationId = $getReserveDetail['reservation_id'];
            }


            // * 3. Access the `table_driver` table and filter those drivers with the condition of whose profile match with pickup location and status = available. 
            $getDriverListBasedOnLocation = mysqli_query($con, "SELECT * FROM `table_driver` WHERE driver_city = '$pickupLocation' AND availability_status = 'available'");
            $isDriverExist = mysqli_num_rows($getDriverListBasedOnLocation);

            if ($isDriverExist > 0) {
                while ($arrayOfDriversList = mysqli_fetch_assoc($getDriverListBasedOnLocation)) {
                    $driverId = $arrayOfDriversList['driver_id'];
                    $driverName = $arrayOfDriversList['driver_name'];
                    $driverAddressLine = $arrayOfDriversList['driver_address_line'];
                    $driverCity = $arrayOfDriversList['driver_city'];
                    $driverCountry = $arrayOfDriversList['driver_country'];
                    $driverImage = $arrayOfDriversList['driver_image'];
                    $driverPhoneNo = $arrayOfDriversList['driver_phone_no'];
                    $startTime = $arrayOfDriversList['start_time'];
                    $endTime = $arrayOfDriversList['end_time'];
        ?>
                    <div class="col">
                        <div class="card pt-4 hover-yellow-effect h-100 ">
                            <div class="mx-auto bg-success rounded-circle p-1 h-100 ">
                                <img src="../sign-up/driver-profile-picture/<?php echo $driverImage; ?>" class="mx-auto profile-width" alt="Driver Profile Picture" />
                            </div>
                            <div class="card-body d-md-flex gap-1 align-items-start">
                                <!-- Name & Address Div -->
                                <div>
                                    <h5 class="card-title fw-semibold text-capitalize text-center text-md-start">
                                        <?php echo $driverName; ?>
                                    </h5>
                                    <p class="card-text text-center text-capitalize text-md-start">
                                        📍 No. <?php echo $driverAddressLine; ?>, <?php echo $driverCity; ?>, <?php echo $driverCountry; ?>
                                    </p>
                                </div>
                                <!-- <a href="" class=""></a> -->
                                <!-- Available Status Div -->
                                <div class="bg-success px-3 py-1 rounded-5 text-light mt-2 mt-md-0 text-center">
                                    Available
                                </div>
                            </div>

                            <!-- Contact Number Div -->
                            <div class="card-body pb-0 pt-0">
                                <p class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-3">
                                    Contact Number:
                                    <a href="tel:<?php echo $driverPhoneNo; ?>" class="text-decoration-none hover-color-black text-secondary"><?php echo $driverPhoneNo; ?></a>
                                </p>
                            </div>

                            <!-- Start Time -->
                            <div class="card-body d-md-flex justify-content-between pb-0 pt-0">
                                <p class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-2">
                                    Start Time:
                                    <span class=fw-normal><?php echo $startTime; ?></span>
                                </p>

                                <p class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-2">
                                    End Time:
                                    <span class=fw-normal><?php echo $endTime; ?></span>
                                </p>
                            </div>

                            <!-- Locate & Reserve Button Div -->
                            <div class="d-md-flex justify-content-between gap-2 align-items-center pb-3 p-2">
                                <div class="w-100 mb-3">
                                    <a href="confirmation-page.php?driver_id=<?php echo $driverId; ?>&reservation_id=<?php echo $reservationId; ?>" target="_blank" class="text-decoration-none btn hover-black-effect background-black-color text-light w-100">Click to Confirm the driver</a>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        }
        ?>
    </div>
    <div class="background-black-color w-50 mx-auto text-light d-md-flex justify-content-center align-items-center gap-5 p-4 mt-5 rounded-2">
        <!-- Find the amount based on KM -->
        <?php
        $distance = getDistance($pickupLocation, $driverCountry);
        $totalAmount = $distance * 100;

        ?>
        <div class="text-center">
            <p class="my-0">Taxi Fare:</p>
            <p class="fs-1 text-warning fw-semibold ">Rs. <?php echo $totalAmount; ?></p>
        </div>
        <div class="">
            <a href="reservation-delete-process.php?operator_id=<?php echo $parsedOperatorId; ?>" class="btn bg-light">Cancel the Reservation</a>
        </div>
    </div>
</div>