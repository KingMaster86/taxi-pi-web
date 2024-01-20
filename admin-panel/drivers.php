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
    <title>All Drivers | City-Taxi</title>

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
    <link rel="stylesheet" href="../assets/css/style2.css">
</head>

<body class="overflow-x-hidden bg-warning container-fluid">
    <div class="container">
        <h4 class="text-center container fw-bold font-black">
            Passengers' Detail
        </h4>
        <!-- <div class="container"> -->
        <table class="table">
            <thead class="text-center fw-semibold">
                <tr>
                    <td class="background-black-color font-white p-3">S.No</td>
                    <td class="background-black-color font-white p-3">
                        Passenger Name
                    </td>
                    <td class="background-black-color font-white p-3">Email</td>
                    <td class="background-black-color font-white p-3">Username</td>
                    <td class="background-black-color font-white p-3">Phone Number</td>
                    <td class="background-black-color font-white p-3">ID Card No</td>
                    <td class="background-black-color font-white p-3">Address Line</td>
                    <td class="background-black-color font-white p-3">City</td>
                    <td class="background-black-color font-white p-3">Country</td>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td class="background-black-color-secondary font-white-secondary">
                        #01
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        Mushkir
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        mushkirmohamed@gmail.com
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        mushkir
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        <a href="tel:0777195282" class="text-decoration-none font-white-secondary">0777195282</a>
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        199631401505
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        65 North Clarendon Avenue
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        Nintavur
                    </td>
                    <td class="background-black-color-secondary font-white-secondary">
                        Sri Lanka
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- </div> -->
    </div>
    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>