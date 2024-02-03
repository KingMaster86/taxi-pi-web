<?php
include('../includes/connect.php');
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>Driver Login Page | CityTaxi</title>

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
</head>

<body class="overflow-x-hidden container bg-warning">
    <div class="gradient-taxi-backgorund container margin-top-of-admin-card p-4 rounded-4" id="driver-login-card">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container" id="driver-login-form">
            <div class="w-25 mx-auto d-flex justify-content-center align-items-center">
                <img src="../assets/img/hero-img.webp" class="img-height-width img-fluid" alt="Admin Clip Art" />
            </div>

            <div>
                <!-- Driver Username -->
                <div class="mb-3 w-100">
                    <label for="driver-username" class="form-label font-white">Username<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control shadow-none bg-external-white" id="driver-username" name="driver-username" placeholder="Enter your Username" required="required" />
                    </div>
                </div>

                <!-- Driver Password -->
                <div class="mb-3 w-100">
                    <label for="driver-password" class="form-label font-white">Password<span class="text-danger">*</span></label>
                    <div>
                        <input type="password" class="form-control shadow-none bg-external-white" id="driver-password" name="driver-password" placeholder="Enter your Password" required="required" />
                    </div>
                </div>

                <div class="mb-3 mt-4 w-100">
                    <input type="submit" class="btn bg-warning w-100 fw-semibold" value="Login" name="driver-login">
                </div>

                <div class="d-md-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none font-white-secondary font-size-small fw-normal">Forgot Password?</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <!-- End -->

    <!-- JavaScript Validation for Inputs -->
    <script>
        const driverLoginFormEl = document.querySelector("#driver-login-form");
        const validator = new window.JustValidate(driverLoginFormEl);

        validator.addField(
            "#driver-username",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["error-msg-secondary-red-variant"],
            }
        );

        validator.addField(
            "#driver-password",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["error-msg-secondary-red-variant"],
            }
        );

        validator.onSuccess(() => {
            driverLoginFormEl.submit();
            driverLoginFormEl.reset();
        })
    </script>
</body>

</html>

<!-- PHP Code for Driver Login -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $driverUsernameEl = $_POST['driver-username'];
    $driverPasswordEl = $_POST['driver-password'];

    $fetchDriverDetails = mysqli_query($con, "SELECT * FROM `table_driver` WHERE driver_username = '$driverUsernameEl'");
    $arrayOfDriverDetail = mysqli_fetch_assoc($fetchDriverDetails);

    $isDriverDetailExist = mysqli_num_rows($fetchDriverDetails);

    if ($isDriverDetailExist > 0) {
        $_SESSION['username'] = $driverUsernameEl;

        if (password_verify($driverPasswordEl, $arrayOfDriverDetail['driver_password'])) {

            if ($isDriverDetailExist == 1) {
                $_SESSION['username'] = $driverUsernameEl;
                echo "<script>alert('Welcome " . $arrayOfDriverDetail['driver_name'] . "! You have loggedin successfully.')</script>";
                echo "<script>window.open('homepage.php?profile', '_self')</script>";
            }
        } else {
            echo "<script>alert('Please reverify your password!.')</script>";
        }
    } else {
        echo "<script>alert('Please reverify your username!.')</script>";
    }
}
?>