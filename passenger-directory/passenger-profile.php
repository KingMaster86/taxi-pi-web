<?php
include('../includes/connect.php');
@session_start();

$sessionPassengerUsername = $_SESSION['passengerUsername'];

$fetchAllDetailsOfPassengerUsername = mysqli_query($con, "SELECT * FROM `table_passenger` WHERE passenger_username = '$sessionPassengerUsername'");
$arrayOfPassengerDetail = mysqli_fetch_assoc($fetchAllDetailsOfPassengerUsername);

$isPassengerUsernameExist = mysqli_num_rows($fetchAllDetailsOfPassengerUsername);

if ($isPassengerUsernameExist > 0 && $isPassengerUsernameExist == 1) {
    $passengerId = $arrayOfPassengerDetail['id'];
    $passengerName = $arrayOfPassengerDetail['passenger_name'];
    $passengerEmail = $arrayOfPassengerDetail['passenger_email'];
    $passengerPhoneNo = $arrayOfPassengerDetail['passenger_phone_no'];
    $passengerUsername = $arrayOfPassengerDetail['passenger_username'];
    $passengerIdCardNo = $arrayOfPassengerDetail['passenger_id_card_number'];
    $passengerAddressLine = $arrayOfPassengerDetail['passenger_address_line'];
    $passengerCity = $arrayOfPassengerDetail['passenger_city'];
    $passengerCountry = $arrayOfPassengerDetail['passenger_country'];
}
?>

<div class="mx-auto p-2 p-md-5">
    <div class="card mx-auto" id="driver-profile-card">
        <img src="../assets/img/admin-clipart.jpg" class="card-img-top" alt="..." />
        <div class="card-body d-md-flex gap-1 align-items-start">
            <div>
                <h5 class="card-title text-center text-md-start fw-semibold "><?php echo $passengerName; ?></h5>
                <p class="card-text text-center text-md-start">
                    <!-- No. 751 East Milton Drive, Kandy, Sri Lanka -->
                    📍 No. <?php echo $passengerAddressLine; ?>, <?php echo $passengerCity; ?>, <?php echo $passengerCountry; ?>.
                </p>
            </div>
        </div>
        <ul class="list-group list-group-flush card-height overflow-y-scroll">
            <li class="list-group-item fw-bold">
                Username:
                <span class="text-decoration-none fw-normal font-black"><?php echo $passengerUsername; ?></span>
            </li>
            <li class="list-group-item d-md-flex align-items-center gap-2 pl-2 pt-0 pb-0 pe-0">
                <p class="card-text mt-3 fw-bold">Email:</p>
                <a href="mailto:<?php echo $passengerEmail; ?>" class="card-text font-black text-decoration-none hover-underline"><?php echo $passengerEmail; ?></a>
            </li>
            <li class="list-group-item fw-bold">
                Contact No:
                <a href="tel:<?php echo $passengerPhoneNo; ?>" class="text-decoration-none fw-normal font-black">0<?php echo $passengerPhoneNo; ?></a>
            </li>

            <li class="list-group-item fw-bold">
                ID Card No:
                <span class="text-decoration-none fw-normal font-black"> <?php echo $passengerIdCardNo; ?> </span>
            </li>
        </ul>
        <div class="card-body">
            <a href="profile-edit.php?passengerId=<?php echo $passengerId; ?>" class="card-link text-decoration-none">Edit
            </a>
        </div>
    </div>
</div>