<?php
@include('../includes/connect.php');
include('../includes/function.php');
@session_start();

$operatorName = $_SESSION['operatorUsername'];
$getOperatorName = mysqli_query($con, "SELECT * FROM `table_operator` WHERE operator_name = '$operatorName'");
$isNameExist = mysqli_num_rows($getOperatorName);

if ($isNameExist > 0 && $isNameExist == 1) {
    $arrayOfOperatorDetail = mysqli_fetch_assoc($getOperatorName);
    $operatorId = $arrayOfOperatorDetail['operator_id'];
}
?>

<h3 class="text-center fw-semibold mb-0 mt-5 p-3 rounded-3 text-warning ">
    Taxi Reservation Form
</h3>
<p class="text-center text-light">
    Please fill out the form below to reserve the Trip. 👇
</p>

<div class="p-2">
    <!-- Sign Up Form -->
    <div class="form-width mb-5 mt-md-2">
        <form method="post" class="background-grey p-2 p-sm-3 p-md-5 rounded-2" id="passenger-reservation-form">
            <!-- Passenger Name -->
            <div class="mb-3 w-100">
                <label for="passenger-name" class="form-label">Passenger Name<span class="text-danger">*</span></label>
                <div>
                    <input type="text" class="form-control shadow-none text-capitalize" id="passenger-name" name="passenger-name" placeholder="Enter the passenger name" required="required" />
                </div>
            </div>

            <!-- Passenger Contact Number -->
            <div class="mb-3 w-100">
                <label for="passenger-contact-number" class="form-label">Passenger Contact Number<span class="text-danger">*</span></label>
                <div>
                    <input type="text" value="7418529632587" class="form-control shadow-none text-capitalize" id="passenger-contact-number" name="passenger-contact-number" placeholder="Enter the passenger contact number" required="required" />
                </div>
            </div>

            <!-- Pickup Location -->
            <div class="mb-3 w-100">
                <label for="passenger-pickup-location" class="form-label">Pickup Location<span class="text-danger">*</span></label>
                <div>
                    <input type="text" class="form-control shadow-none text-capitalize" id="passenger-pickup-location" name="passenger-pickup-location" placeholder="Enter your Pickup Location" required="required" />
                </div>
            </div>

            <!-- Drop Location -->
            <div class="mb-3 w-100">
                <label for="passenger-drop-location" class="form-label">Drop Location<span class="text-danger">*</span></label>
                <div>
                    <input type="text" class="form-control shadow-none text-capitalize" id="passenger-drop-location" name="passenger-drop-location" placeholder="Enter your Drop Location" required="required" />
                </div>
            </div>

            <!-- Available Driver Detail
                <div class="d-flex flex-column  mb-3 w-100">
                    <div>
                        <label for="available-drivers-list" class="form-label">Available Drivers<span class="text-danger">*</span></label>
                        <input type="button" name="find-driver" class="font-size-small btn hover-effect" value="Click to find">
                    </div>

                    <div>
                        <select name="available-drivers-list" class="form-select" id="available-drivers-list">
                            <option value="">--Tap to select available driver--</option>
                            <option value="">Mushkir</option>
                            <option value="">Mushkir</option>
                            <option value="">Mushkir</option>
                        </select>
                    </div> -->
            <!-- <div>
                        <input type="text" class="form-control shadow-none text-capitalize" id="passenger-drop-location" name="passenger-drop-location" placeholder="Enter your Drop Location" required="required" />
                    </div> -->
            <!-- </div> -->

            <!-- Date and Time of Reservation -->
            <div class="mb-3 w-100">
                <label for="date-and-time-of-reservation" class="form-label">Date<span class="text-danger">*</span></label>
                <div>
                    <input type="datetime-local" class="form-control shadow-none" id="date-and-time-of-reservation" name="date-and-time-of-reservation" required="required" />
                </div>
            </div>
            <!-- Create Account Button -->
            <input type="submit" class="btn bg-warning border-black mt-3 mb-3 w-100" value="Click to find the driver" />
        </form>
    </div>
</div>

<!-- PHP Code to Process Reservation -->
<?php

// * Storyline
// * 1. Get all the datas in the form.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passengerNameEl = $_POST['passenger-name'];
    $passengerContactNumberEl = $_POST['passenger-contact-number'];
    $passengerPickupLocationEl = $_POST['passenger-pickup-location'];
    $passengerDropLocationEl = $_POST['passenger-drop-location'];
    $dateAndTimeOfReservationEl = $_POST['date-and-time-of-reservation'];

    // * 2. Get the Latitude & Longitude of Pickup & Drop Location
    $pickupLocationLatitude = getLocationLatitude($passengerPickupLocationEl);
    $pickupLocationLongitude = getLocationLongitude($passengerPickupLocationEl);

    $dropLocationLatitude = getLocationLatitude($passengerDropLocationEl);
    $dropLocationLongitude = getLocationLatitude($passengerDropLocationEl);

    $status = "on process";
    $passenger_id = 0; // !It means, Unregistered Passengers.
    $driver_id = 0; // !It will update when the reservation confirmed.

    // * 3. Insert all the values in `table_reservation` table
    $temporaryReserve = "INSERT INTO `table_reservation` 
    (
        passenger_name,
        passenger_contact_no,
        pickup_location, 
        pickup_location_latitude_value, 
        pickup_location_longitude_value,
        drop_location,
        drop_location_latitude_value,
        drop_location_longitude_value,
        reservation_status,
        driver_id,
        passenger_id,
        ride_start_time,
        operator_id
    ) VALUES 
    (
        '$passengerNameEl',
        '$passengerContactNumberEl',
        '$passengerPickupLocationEl',
        '$pickupLocationLatitude',
        '$pickupLocationLongitude',
        '$passengerDropLocationEl',
        '$dropLocationLatitude',
        '$dropLocationLongitude',
        '$status',
        $driver_id,
        $passenger_id,
        '$dateAndTimeOfReservationEl',
        $operatorId
    )";

    $executeQuery = mysqli_query($con, $temporaryReserve);
    if ($executeQuery) {
        echo "<script>window.open('operator-homepage.php?filter&operator_id=$operatorId','_self')</script>";
    }
}
?>