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

<body class="bg-warning container-fluid">
    <h4 class="text-center container fw-bold font-black mt-5 pb-2">
        Drivers' Overview
    </h4>
    <div class="table-responsive mt-3">
        <table class="table align-middle table-bordered">
            <thead class="text-center fw-semibold">
                <tr>
                    <th class="background-black-color font-white">S.No</th>
                    <th class="background-black-color font-white">
                        Driver's Name
                    </th>
                    <th class="background-black-color font-white">Email</th>
                    <th class="background-black-color font-white">Username</th>
                    <th class="background-black-color font-white">Phone Number</th>
                    <th class="background-black-color font-white">Status</th>
                    <th class="background-black-color font-white">Driver's Location</th>
                    <th class="background-black-color font-white">Starting Time</th>
                    <th class="background-black-color font-white">Ending Time</th>
                    <th class="background-black-color font-white">ID Card No</th>
                    <th class="background-black-color font-white">Address Line</th>
                    <th class="background-black-color font-white">City</th>
                    <th class="background-black-color font-white">Country</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $serialNumber = 1;
                $statusReadableFormat;
                $fetchDriverDetails = mysqli_query($con, "SELECT * FROM `table_driver`");

                while ($arrayOfDriverDetails = mysqli_fetch_assoc($fetchDriverDetails)) {
                    $driverName = $arrayOfDriverDetails['driver_name'];
                    $driverEmail = $arrayOfDriverDetails['driver_email'];
                    $driverPhoneNo = $arrayOfDriverDetails['driver_phone_no'];
                    $driverIdCardNo = $arrayOfDriverDetails['driver_id_card_no'];
                    $driverUsername = $arrayOfDriverDetails['driver_username'];
                    $availabilityStatus = $arrayOfDriverDetails['availability_status'];
                    $locationLatitude = $arrayOfDriverDetails['location_latitude'];
                    $locationLongitude = $arrayOfDriverDetails['location_longitude'];
                    $startTime = $arrayOfDriverDetails['start_time'];
                    $endTime = $arrayOfDriverDetails['end_time'];
                    $driverAddressLine = $arrayOfDriverDetails['driver_address_line'];
                    $driverCity = $arrayOfDriverDetails['driver_city'];
                    $driverCountry = $arrayOfDriverDetails['driver_country'];


                    $driverLocation = $locationLatitude . "," . $locationLongitude; // *Merging Latitude & Longitude values into $driverLocation Variable.

                    if ($availabilityStatus == "available") {
                        $statusReadableFormat = "Available";
                    } else {
                        $statusReadableFormat = "Busy";
                    }
                    // echo var_dump($driverLocation);


                ?>
                    <tr class="text-center">
                        <td class="background-black-color-secondary font-white-secondary">
                            #<?php echo $serialNumber; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $driverName; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $driverEmail; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $driverUsername; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <a href="tel:<?php echo $driverPhoneNo; ?>" class="text-decoration-none font-white-secondary"><?php echo $driverPhoneNo; ?></a>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $statusReadableFormat; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <button class="btn font-grey-color" onclick="showLocationOnMap('<?php echo $driverLocation; ?>')"><i class="fa-solid fa-location-crosshairs"></i> Locate</button>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $startTime; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $endTime; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $driverIdCardNo; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            No. <?php echo $driverAddressLine; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $driverCity; ?>
                        </td>
                        <td class="background-black-color-secondary font-white-secondary">
                            <?php echo $driverCountry; ?>
                        </td>
                    </tr>
                <?php
                    $serialNumber++;
                }

                ?>
            </tbody>
        </table>
    </div>
    <!-- Boostrap JavaScript Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- JavaScript function to open Google Maps -->
    <script>
        function showLocationOnMap(location) {
            // Open Google Maps with the specified location
            window.open('https://www.google.com/maps?q=' + location, '_blank');
        }
    </script>
</body>

</html>