<?php
include('../includes/connect.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>All Passengers | City-Taxi</title>

    <!-- Google Font (Sen) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

    <!-- External CSS -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/style2.css" />
    <link rel="stylesheet" href="../assets/css/style3.css">
</head>

<body class="overflow-x-hidden bg-warning container-fluid">
    <div class="container-fluid">
        <h4 class="text-center container fw-bold mt-5 font-black">
            Passengers' Overview
        </h4>
        <!-- <div class="container"> -->
        <div class="overflow-x-scroll">
            <table class="table mt-3">
                <thead class="text-center fw-semibold">
                    <tr>
                        <td class="background-black-color font-white p-3">S.No</td>
                        <td class="background-black-color font-white p-3">
                            Passenger Name
                        </td>
                        <td class="background-black-color font-white p-3">Email</td>
                        <td class="background-black-color font-white p-3">Username</td>
                        <td class="background-black-color font-white p-3">Passenger Image</td>
                        <td class="background-black-color font-white p-3">Phone Number</td>
                        <td class="background-black-color font-white p-3">ID Card No</td>
                        <td class="background-black-color font-white p-3">Address Line</td>
                        <td class="background-black-color font-white p-3">City</td>
                        <td class="background-black-color font-white p-3">Country</td>
                        <td class="background-black-color font-white p-3">Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $serialNo = 1;
                    $fetchAllPassengersList = mysqli_query($con, "SELECT * FROM `table_passenger`");

                    if (mysqli_num_rows($fetchAllPassengersList) > 0) {
                        while ($arrayOfTotalPassengers = mysqli_fetch_assoc($fetchAllPassengersList)) {
                            // echo var_dump($arrayOfTotalPassengers);
                            $passengerId = $arrayOfTotalPassengers['id'];
                            $passengerName = $arrayOfTotalPassengers['passenger_name'];
                            $passengerEmail = $arrayOfTotalPassengers['passenger_email'];
                            $passengerUsername = $arrayOfTotalPassengers['passenger_username'];
                            $passengerPhoneNo = $arrayOfTotalPassengers['passenger_phone_no'];
                            $passengerIdCardNumber = $arrayOfTotalPassengers['passenger_id_card_number'];
                            $passengerAddressLine = $arrayOfTotalPassengers['passenger_address_line'];
                            $passengerCity = $arrayOfTotalPassengers['passenger_city'];
                            $passengerCountry = $arrayOfTotalPassengers['passenger_country'];
                            $passengerImage = $arrayOfTotalPassengers['passenger_image'];

                            echo "<tr class='text-center'>
                        <td class='background-black-color-secondary font-white-secondary'>
                            #$serialNo
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            $passengerName
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            <a href='mailto:$passengerEmail' class='text-decoration-none font-white-secondary'>$passengerEmail</a>    
                        
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            $passengerUsername
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                        <img src='../sign-up/passenger-profile-picture/$passengerImage' class=' w-50' alt='$passengerName'>
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            <a href='tel:$passengerPhoneNo' class='text-decoration-none font-white-secondary'>$passengerPhoneNo</a>
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            $passengerIdCardNumber
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            $passengerAddressLine
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            $passengerCity
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            $passengerCountry
                        </td>

                        <td class='background-black-color-secondary font-white-secondary'>
                            <a href='admin-panel.php?edit_passenger&passenger_id={$passengerId}' class='text-decoration-none text-white me-2'><i class='fa-solid fa-pen-to-square'></i></a>
                            <a href='delete-passenger.php?passenger_id={$passengerId}' class='text-decoration-none font-white-secondary '><i class='fa-solid fa-trash-can'></i></a>
                        </td>
                    </tr>";

                            $serialNo++;
                        }
                    } else {
                        // echo "<h3>Sorry! Currently there is no passenger registerd...</h3>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- </div> -->
    </div>
    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>