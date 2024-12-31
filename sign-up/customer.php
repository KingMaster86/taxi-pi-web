<?php
// DB Connection
include('../includes/connect.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Fav Icon -->
  <link rel="shortcut icon" href="../assets/img/taxi-img.png" type="image/x-icon" class="object-fit-cover" />
  <title>Passenger's Sign-Up Page | CityTaxi</title>

  <!-- Google Font (Sen) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Just Validate Dev CDN -->
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

  <!-- Boxicons Script -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Bootsrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />

  <!-- External CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" />
</head>

<body class="overflow-x-hidden bg-external-white">
  <!-- Header Area -->
  <header class="container-fluid background-black-color">

    <nav class="navbar navbar-expand-lg container py-3">
      <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand text-white fs-1 fw-bold" title="Go to Homepage" href="../index.php">City<span class="text-warning">Taxi</span></a>

        <!-- Toggle Button (Responsvie) -->
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" href="../about-us.php">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white fs-5 rounded hover-effect me-4 px-3 fw-semibold" href="../contact-us.php">Contact Us</a>
            </li>
          </ul>

          <!-- Login Button -->
          <div class="btn-group me-4">
            <button type="button" class="btn btn-warning dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </button>
            <ul class="dropdown-menu background-black-color mt-2 p-2">
              <li>
                <a class="dropdown-item text-light hover-effect" href="../driver-directory/login.php">Driver</a>
              </li>
              <li>
                <a class="dropdown-item text-light hover-effect" href="../passenger-directory/passenger-login.php">Passenger</a>
              </li>
            </ul>
          </div>

          <!-- Sign-Up Button -->
          <div class="btn-group">
            <button type="button" class="btn border-warning text-light hover-effect dropdown-toggle fw-bold" data-bs-toggle="dropdown" aria-expanded="false">
              Sign Up
            </button>
            <ul class="dropdown-menu background-black-color mt-2 p-2">
              <li>
                <a class="dropdown-item text-light hover-effect" href="./driver.php">Driver</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <!-- End -->

  <!-- Body -->
  <main class="px-2 px-sm-3 px-md-5 pb-5">
    <h3 class="text-center fw-semibold mt-5 font-black p-3 rounded-3">
      Ride with us
      <span class="text-warning background-black-color py-1 px-3 rounded-3">for a top-notch taxi experience!
        <box-icon name="taxi" type="solid" animation="flashing" color="#FFC107"></box-icon>✨</span>
    </h3>

    <!-- Sign Up Form -->
    <div class="mt-md-5">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="background-grey p-2 p-sm-3 p-md-5 rounded-2" id="passenger-signup-form" enctype="multipart/form-data">
        <div class="d-md-flex align-items-center gap-5">
          <!-- Name -->
          <div class="mb-3 w-100">
            <label for="passenger-name" class="form-label">Name<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control shadow-none text-capitalize" id="passenger-name" name="passenger-name" placeholder="Enter your name" required="required" autocomplete="off" />
            </div>
          </div>

          <!-- Email -->
          <div class="mb-3 w-100">
            <label for="passenger-email" class="form-label">Email<span class="text-danger">*</span></label>
            <div>
              <input type="email" class="form-control shadow-none" id="passenger-email" name="passenger-email" placeholder="Enter your Email" required="required" autocomplete="off" />
            </div>
          </div>

          <!-- Phone Number -->
          <div class="mb-3 w-100">
            <label for="passenger-phone-no" class="form-label">Phone Number<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control shadow-none" id="passenger-phone-no" name="passenger-phone-no" placeholder="Enter your Phone Number" required="required" autocomplete="off" />
            </div>
          </div>
        </div>

        <!-- Username, Password, Confirm Password -->
        <div class="d-md-flex align-items-center mt-3 gap-5">
          <!-- Username -->
          <div class="mb-3 w-100">
            <label for="passenger-username" class="form-label">Username<span class="text-danger">*</span></label>
            <input type="text" class="form-control shadow-none" id="passenger-username" name="passenger-username" placeholder="Enter your Username" required="required" autocomplete="off" />
          </div>

          <!-- Password -->
          <div class="mb-3 w-100">
            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
            <div>
              <input type="password" class="form-control shadow-none" id="password" name="password" placeholder="Enter your Password" required="required" />
            </div>
          </div>

          <!-- Confirm Password -->
          <div class="mb-3 w-100">
            <label for="confirm-password" class="form-label">Confirm Password<span class="text-danger">*</span></label>
            <div>
              <input type="password" class="form-control shadow-none" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required="required" />
            </div>
          </div>
        </div>

        <!-- Address -->
        <div class="d-md-flex align-items-center mt-3 gap-5">
          <!-- Address Line 1 -->
          <div class="mb-3 w-100">
            <label for="passenger-address-line-1" class="form-label">Address Line 1<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control shadow-none text-capitalize" id="passenger-address-line-1" name="passenger-address-line-1" placeholder="Ex: No.246/A, Meera Nagar Road" required="required" autocomplete="off" />
            </div>
          </div>

          <!-- City -->
          <div class="mb-3 w-100">
            <label for="passenger-city-name" class="form-label">City<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control shadow-none text-capitalize" id="passenger-city-name" name="passenger-city-name" placeholder="Ex: Nintavur" required="required" autocomplete="off" />
            </div>
          </div>

          <!-- Country -->
          <div class="mb-3 w-100">
            <label for="passenger-country-name" class="form-label">Country<span class="text-danger">*</span></label>
            <div>
              <input type="text" class="form-control shadow-none text-capitalize" id="passenger-country-name" name="passenger-country-name" placeholder="Ex: Sri Lanka" required="required" autocomplete="off" />
            </div>
          </div>
        </div>

        <!-- ID Card, Current Location -->
        <div class="d-md-flex mt-3 gap-5">
          <!-- ID Card -->
          <div class="mb-3 w-100">
            <label for="passenger-id-card-no" class="form-label">ID Card No.<span class="text-danger">*</span></label>
            <input type="text" class="form-control shadow-none" id="passenger-id-card-no" name="passenger-id-card-no" placeholder="Enter your ID Card Number" required="required" autocapitalize="off" />
          </div>

          <!-- Passenger Image -->
          <div class="mb-3 w-100 ">
            <label for="passenger-profile-image" class="form-label">Profile Image<span class="text-danger">*</span></label>
            <div>
              <input class="form-control" type="file" id="passenger-profile-image" name="passenger-profile-image">
            </div>
          </div>
        </div>

        <!-- Create Account Button -->
        <div class="form-outline">
          <input type="submit" name="create_account" value="Create Account" class="btn bg-warning border-black mt-3 mb-3 mt-md-5 w-100">
        </div>
      </form>
    </div>
  </main>

  <!-- Boostrap JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

  <!-- End -->

  <!-- JavaScript Validation for Inputs -->
  <script>
    const passengerSignupFormEl = document.querySelector(
      "#passenger-signup-form"
    );
    const validator = new window.JustValidate(passengerSignupFormEl, validateBeforeSubmitting = true);

    // console.log("hi");
    // console.log(validator.addField);

    validator.addField(
      "#passenger-name",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 3,
        },
        {
          rule: "maxLength",
          value: 20,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-email",
      [{
          rule: "required",
        },
        {
          rule: "email",
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-phone-no",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 12,
        },
        {
          rule: "maxLength",
          value: 15,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-username",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 3,
        },
        {
          rule: "maxLength",
          value: 10,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#password",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 8,
        },
        {
          rule: "maxLength",
          value: 12,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#confirm-password",
      [{
          rule: "required",
        },
        {
          validator: (value, fields) => {
            if (fields["#password"] && fields["#password"].elem) {
              const repeatPasswordValue = fields["#password"].elem.value;

              return value === repeatPasswordValue;
            }

            return true;
          },
          errorMessage: "Passwords should be the same",
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-address-line-1",
      [{
        rule: "required",
      }, ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-city-name",
      [{
        rule: "required",
      }, ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-country-name",
      [{
        rule: "required",
      }, ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.addField(
      "#passenger-id-card-no",
      [{
          rule: "required",
        },
        {
          rule: "minLength",
          value: 12,
        },
        {
          rule: "maxLength",
          value: 12,
        },
      ], {
        errorLabelCssClass: ["error-msg-margin"],
      }
    );

    validator.onSuccess(() => {
      // If validation is successful, submit the form
      const form = document.getElementById("passenger-signup-form");
      form.submit();
    });
  </script>


</body>

</html>


<!-- PHP Code to Insert Customer data into Database -->
<?php
// PHPMailer Config
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Process the form submission
  $passengerNameEl = $_POST['passenger-name'];
  $passengerEmailEl = $_POST['passenger-email'];
  $passengerPhoneNoEl = $_POST['passenger-phone-no'];
  $passengerProfileImgEl = $_FILES['passenger-profile-image']['name'];
  $tempPassenferImage = $_FILES['passenger-profile-image']['tmp_name'];


  $passengerUsernameEl = $_POST['passenger-username'];
  $passengerPasswordEl = $_POST['password'];

  //! Converting Password into Non-readable format
  $encryptedPassword = password_hash($passengerPasswordEl, PASSWORD_DEFAULT);

  $confirmPasswordEl = $_POST['confirm-password'];
  $passengerAddressLine1El = $_POST['passenger-address-line-1'];
  $passengerCityNameEl = $_POST['passenger-city-name'];
  $passengerCountryNameEl = $_POST['passenger-country-name'];
  $passengerIdCardNoEl = $_POST['passenger-id-card-no'];

  $filterByPhoneNumber = mysqli_query($con, "SELECT * FROM `table_passenger` WHERE passenger_phone_no = $passengerPhoneNoEl");
  $numberOfRowsPhoneNo = mysqli_num_rows($filterByPhoneNumber);
  // echo var_dump($numberOfRowsPhoneNo);


  if ($numberOfRowsPhoneNo > 0) {
    echo "<script>alert('The contact number you entered already exist!')</script>";
  } else {

    move_uploaded_file($tempPassenferImage, "./passenger-profile-picture/$passengerProfileImgEl");

    $query = "INSERT INTO `table_passenger` 
    (passenger_name, 
    passenger_email, 
    passenger_phone_no, 
    passenger_username,
    passenger_password, 
    passenger_id_card_number, 
    passenger_address_line, 
    passenger_city,
    passenger_country,
    passenger_image
    ) 

    VALUES 
    ('$passengerNameEl', 
    '$passengerEmailEl', 
    $passengerPhoneNoEl, 
    '$passengerUsernameEl', 
    '$encryptedPassword', 
    '$passengerIdCardNoEl', 
    '$passengerAddressLine1El', 
    '$passengerCityNameEl', 
    '$passengerCountryNameEl',
    '$passengerProfileImgEl'
    )";

    $executeInsertQuery = mysqli_query($con, $query);

    if ($executeInsertQuery) {
      echo "<script>alert('Account Created Successfully.')</script>";



      $mail = new PHPMailer(true);

      $userMail = "YOUR_EMAIL_ID";           // * Admin mail id
      $passKey = "YOUR_GMAIL_PASS_KEY";


      //$mail->SMTPDebug = 3;                               // * Enable verbose debug output

      $mail->isSMTP();                                      // * Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';                       // * Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // * Enable SMTP authentication
      $mail->Username = $userMail;                          // * SMTP username
      $mail->Password = $passKey;                           // * SMTP password
      $mail->SMTPSecure = 'ssl';                            // * Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // * TCP port to connect to
      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );

      $mail->setFrom($userMail);
      $mail->addAddress($passengerEmailEl, $passengerNameEl); // * Add a recipient

      $mail->isHTML(true);                                    // * Set email format to HTML

      $mail->Subject = "Credintials of {$passengerNameEl}";
      $mail->Body    = "Username: {$passengerUsernameEl} <br> Password: {$passengerPasswordEl}";

      $mail->send();
      echo "<script>alert('Please check your mail...')</script>";
      echo "<script>window.open('../passenger-directory/passenger-login.php','_self')</script>";
    }
  }
}
?>