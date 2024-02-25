<?php

if (isset($_GET['driver_id'])) {
    $passedDriverId = $_GET['driver_id'];

    $getDriverDetails = mysqli_query($con, "SELECT * FROM `table_driver` WHERE driver_id = $passedDriverId");

    if (mysqli_num_rows($getDriverDetails) > 0 && mysqli_num_rows($getDriverDetails) == 1) {

        $arrayOfDriverDetails = mysqli_fetch_assoc($getDriverDetails);

        $driverName = $arrayOfDriverDetails['driver_name'];
        $driverEmail = $arrayOfDriverDetails['driver_email'];
        $driverPhoneNo = $arrayOfDriverDetails['driver_phone_no'];
        $driverAddressLine = $arrayOfDriverDetails['driver_address_line'];
        $driverCity = $arrayOfDriverDetails['driver_city'];
        $driverCountry = $arrayOfDriverDetails['driver_country'];
        $startTime = $arrayOfDriverDetails['start_time'];
        $endTime = $arrayOfDriverDetails['end_time'];
    }
}
?>


<form method="post" class="p-5">
    <!-- Email -->
    <div class="mb-5 w-100">
        <label for="driver-email" class="form-label fw-semibold ">Email</label>
        <div>
            <input type="email" class="form-control shadow-none" id="driver-email" name="driver-email" placeholder="Enter your Email" required="required" autocomplete="off" value="<?php echo $driverEmail; ?>" />
        </div>
    </div>


    <!-- Phone Number -->
    <div class="mb-5 w-100">
        <label for="driver-phone-no" class="form-label fw-semibold">Phone Number</label>
        <div>
            <input type="text" class="form-control shadow-none" id="driver-phone-no" name="driver-phone-no" placeholder="Ex: +94777195282" required="required" autocomplete="off" value="<?php echo $driverPhoneNo; ?>" />
        </div>
    </div>

    <!-- Address -->
    <div class="d-md-flex align-items-center mt-3 gap-5">
        <!-- Address Line 1 -->
        <div class="mb-3 w-100">
            <label for="driver-address-line-1" class="form-label fw-semibold">Address Line 1</label>
            <div>
                <input type="text" class="form-control shadow-none text-capitalize" id="driver-address-line-1" name="driver-address-line-1" placeholder="Ex: No.246/A, Meera Nagar Road" required="required" autocomplete="off" value="<?php echo $driverAddressLine; ?>" />
            </div>
        </div>

        <!-- City -->
        <div class="mb-3 w-100">
            <label for="driver-city-name" class="form-label">City<span class="text-danger">*</span></label>
            <div>
                <input type="text" class="form-control shadow-none text-capitalize" id="driver-city-name" name="driver-city-name" placeholder="Ex: Nintavur" required="required" autocomplete="off" value="<?php echo $driverCity; ?>" />
            </div>
        </div>

        <!-- Country -->
        <div class="mb-3 w-100">
            <label for="driver-country-name" class="form-label">Country<span class="text-danger">*</span></label>
            <div>
                <input type="text" class="form-control shadow-none text-capitalize" id="driver-country-name" name="driver-country-name" placeholder="Ex: Sri Lanka" required="required" autocomplete="off" value="<?php echo $driverCountry; ?>" />
            </div>
        </div>

        <!-- Available Time Period -->
        <div class="mb-3 w-100">
            <label for="work-start-time" class="form-label font-bold-weight">Available Time Period<span class="text-danger">*</span></label>

            <!-- From & To -->
            <div class="d-md-flex align-items-center gap-2">
                <div class="d-md-flex gap-2 w-100">
                    <label for="work-starting-time" class="form-label">From: </label>
                    <div class="w-100">
                        <input type="time" name="work-start-time" class="form-control shadow-none" id="work-start-time" required="required" value="<?php echo $startTime; ?>" />
                    </div>
                </div>

                <div class="d-md-flex gap-2 w-100">
                    <label for="work-ending-time" class="form-label">To: </label>
                    <div class="w-100">
                        <input type="time" name="work-ending-time" class="form-control shadow-none" id="work-ending-time" required="required" value="<?php echo $endTime; ?>" />
                    </div>
                </div>
            </div>

        </div>
    </div>

    <input type="submit" class="btn background-black-color text-light mt-4" value="Update" name="update-btn">
</form>


<!-- PHP code to update -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $driverEmailEl = $_POST['driver-email'];
    $driverPhoneNoEl = $_POST['driver-phone-no'];
    $driverAddressLineEl = $_POST['driver-address-line-1'];
    $driverCityNameEl = $_POST['driver-city-name'];
    $driverCountryNameEl = $_POST['driver-country-name'];
    $startTimeEl = $_POST['work-start-time'];
    $endTimeEl = $_POST['work-ending-time'];



    $updateDriverDetails = mysqli_query($con, "UPDATE `table_driver` SET driver_email = '$driverEmailEl', driver_phone_no = '$driverPhoneNoEl', driver_address_line = '$driverAddressLineEl', driver_city = '$driverCityNameEl', driver_country = '$driverCountryNameEl', start_time = '$startTimeEl', end_time = '$endTimeEl' WHERE driver_id = $passedDriverId");
    if ($updateDriverDetails) {
        echo "<script>alert('Dear Admin! $driverName\'s details has been successfully updated...')</script>";
        echo "<script>window.open('admin-panel.php?drivers','_self')</script>";
    } else {
        echo "<script>alert('Dear Admin! $driverName\'s details can\'t be updated at this moment. Please try again later...')</script>";
        echo "<script>window.open('admin-panel.php?drivers','_self')</script>";
    }
}


?>