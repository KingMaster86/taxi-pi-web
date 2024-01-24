<!-- Need to implement Passenger Dashboard Stuffs using session -->
<?php
include('../includes/connect.php');
session_start();

// echo $_SESSION['passengerUsername'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
    <title>Passenger Login Page | CityTaxi</title>

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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container" id="passenger-login-form">
            <div class="w-25 mx-auto d-flex justify-content-center align-items-center">
                <img src="../assets/img/Passenger-clipart.jpg" class="img-height-width" alt="Passenger Clip Art" />
            </div>

            <div>
                <!-- Passenger Username -->
                <div class="mb-3 w-100">
                    <label for="passenger-username" class="form-label font-white">Username<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control shadow-none bg-external-white" id="passenger-username" name="passenger-username" placeholder="Enter your Username" required="required" />
                    </div>
                </div>

                <!-- Passenger Password -->
                <div class="mb-3 w-100">
                    <label for="passenger-password" class="form-label font-white">Password<span class="text-danger">*</span></label>
                    <div>
                        <input type="password" class="form-control shadow-none bg-external-white" id="passenger-password" name="passenger-password" placeholder="Enter your Password" required="required" />
                    </div>
                </div>

                <div class="mb-3 mt-4 w-100">
                    <input type="submit" class="btn bg-warning w-100 fw-semibold" value="Login as Passenger" />
                </div>

                <div class="d-md-flex justify-content-center align-items-center">
                    <a href="#" class="text-decoration-none font-white-secondary font-size-small fw-normal d-flex justify-content-center align-items-center">Forgot Password?</a>
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
        const passengerLoginFormEl = document.querySelector("#passenger-login-form");
        const validator = new window.JustValidate(passengerLoginFormEl);

        validator.addField(
            "#passenger-username",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["error-msg-secondary-red-variant"],
            }
        );

        validator.addField(
            "#passenger-password",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["error-msg-secondary-red-variant"],
            }
        );

        validator.onSuccess(() => {
            passengerLoginFormEl.submit();
            console.log("Success");
            passengerLoginFormEl.reset();
        })
    </script>
</body>

</html>



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $passengerUsernameEl = $_POST['passenger-username'];
    $passengerPasswordEl = $_POST['passenger-password'];

    $fetchAllDataFromPassengerTbl = mysqli_query($con, "SELECT * FROM `table_passenger` WHERE passenger_username = '$passengerUsernameEl'");
    $arrayOfPassengerData = mysqli_fetch_assoc($fetchAllDataFromPassengerTbl);
    $isPassengerDataExist = mysqli_num_rows($fetchAllDataFromPassengerTbl);

    if ($isPassengerDataExist > 0 && $isPassengerDataExist == 1) {
        $_SESSION['passengerUsername'] = $passengerUsernameEl;
        if (password_verify($passengerPasswordEl, $arrayOfPassengerData['passenger_password'])) {
            $_SESSION['passengerUsername'] = $passengerUsernameEl;

            $passengerName = $arrayOfPassengerData['passenger_name'];
            echo "<script>alert('Welcome, $passengerName! Your login process was successful.')</script>";
            echo "<script>window.open('passenger-homepage.php','_self')</script>";
        } else {
            echo "<script>alert('Please reverify your password!.')</script>";
        }
    } else {
        echo "<script>alert('Please reverify your username!.')</script>";
    }
}
?>