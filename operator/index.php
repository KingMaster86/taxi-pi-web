<?php
include('../includes/connect.php');

session_start();
// $_SESSION['operatorUsername']
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="container" id="operator-login-form">
            <div class="w-25 mx-auto d-flex justify-content-center align-items-center">
                <img src="../assets/img/operator-clipart.jpeg" class="img-height-width img-fluid" alt="Admin Clip Art" />
            </div>

            <div>
                <!-- Driver Username -->
                <div class="mb-3 w-100">
                    <label for="operator-username" class="form-label font-white">Username<span class="text-danger">*</span></label>
                    <div>
                        <input type="text" class="form-control shadow-none bg-external-white" id="operator-username" name="operator-username" placeholder="Enter your Username" required="required" autocomplete="off" />
                    </div>
                </div>

                <!-- Driver Password -->
                <div class="mb-3 w-100">
                    <label for="operator-password" class="form-label font-white">Password<span class="text-danger">*</span></label>
                    <div>
                        <input type="password" class="form-control shadow-none bg-external-white" id="operator-password" name="operator-password" placeholder="Enter your Password" required="required" />
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
        const operatorLoginFormEl = document.querySelector("#operator-login-form");
        const validator = new window.JustValidate(operatorLoginFormEl);

        validator.addField(
            "#operator-username",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["error-msg-secondary-red-variant"],
            }
        );

        validator.addField(
            "#operator-password",
            [{
                rule: "required",
            }, ], {
                errorLabelCssClass: ["error-msg-secondary-red-variant"],
            }
        );

        validator.onSuccess(() => {
            operatorLoginFormEl.submit();
            operatorLoginFormEl.reset();
        })
    </script>
    <a href="../index.php"></a>
</body>

</html>

<!-- PHP Code for Driver Login -->
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $operatorUsernameEl = $_POST['operator-username'];
    $operatorPasswordEl = $_POST['operator-password'];

    $fetchOperatorDetails = mysqli_query($con, "SELECT * FROM `table_operator` WHERE operator_name = '$operatorUsernameEl'");
    $arrayOfOperatorDetail = mysqli_fetch_assoc($fetchOperatorDetails);

    $isOperatorDetailExist = mysqli_num_rows($fetchOperatorDetails);

    if ($isOperatorDetailExist > 0) {
        $_SESSION['operatorUsername'] = $operatorUsernameEl;

        // (password_verify($operatorPasswordEl, $arrayOfOperatorDetail['operator_password']))
        if ($arrayOfOperatorDetail['operator_password'] == $operatorPasswordEl) {

            if ($isOperatorDetailExist == 1) {
                $_SESSION['operatorUsername'] = $operatorUsernameEl;
                // echo "<script>alert('Welcome " . $arrayOfOperatorDetail['operator_name'] . "! You have loggedin successfully.')</script>";
                echo "<script>window.open('operator-homepage.php?reserve', '_self')</script>";
            }
        } else {
            echo "<script>alert('Please reverify your password!.')</script>";
        }
    } else {
        echo "<script>alert('Please reverify your username!.')</script>";
    }
}
?>