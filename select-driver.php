<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fav Icon -->
    <link
      rel="shortcut icon"
      href="../assets/img/taxi-img.png"
      type="image/x-icon"
      class="object-fit-cover"
    />
    <title>All Drivers | City - Taxi</title>

    <!-- Google Font (Sen) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Just Validate Dev CDN -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <!-- Boxicons Script -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <!-- Font Awesome CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <!-- Bootsrap CSS -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" />

    <!-- External CSS -->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="./assets/css/style2.css" />
  </head>

  <body class="overflow-x-hidden bg-external-white">
    <!-- Header Area -->
    <header class="container-fluid background-black-color">
      <nav class="navbar navbar-expand-lg container py-3">
        <div class="container-fluid">
          <!-- Logo -->
          <a
            class="navbar-brand text-white fs-1 fw-bold"
            title="Go to Homepage"
            href="../index.html"
            >City<span class="text-warning">Taxi</span></a
          >

          <!-- Toggle Button (Responsvie) -->
          <button
            class="navbar-toggler bg-warning"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Menu -->
          <div
            class="collapse navbar-collapse d-md-flex justify-content-end"
            id="navbarSupportedContent"
          >
            <!-- Login Button -->
            <div class="btn-group me-4">
              <button
                type="button"
                class="btn btn-warning dropdown-toggle fw-bold"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Login
              </button>
              <ul class="dropdown-menu bg-black py-2">
                <li>
                  <a class="dropdown-item text-light hover-effect" href="#"
                    >Admin</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-light hover-effect" href="#"
                    >Customer</a
                  >
                </li>
                <li>
                  <a class="dropdown-item text-light hover-effect" href="#"
                    >passenger</a
                  >
                </li>
              </ul>
            </div>

            <!-- Sign-Up Button -->
            <div class="btn-group">
              <button
                type="button"
                class="btn border-warning text-light hover-effect dropdown-toggle fw-bold"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Sign Up
              </button>
              <ul class="dropdown-menu bg-black py-2">
                <li>
                  <a
                    class="dropdown-item text-light hover-effect"
                    href="./customer.html"
                    >Customer</a
                  >
                </li>
                <li>
                  <a
                    class="dropdown-item text-light hover-effect"
                    href="./driver.html"
                    >Driver</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <!-- End -->

    <!-- Body -->
    <main class="container-fluid px-2 px-sm-3 px-md-5 pb-5">
      <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
        <div class="col">
          <div class="card pt-4 hover-yellow-effect">
            <div class="mx-auto bg-success rounded-circle p-1">
              <img
                src="./assets/img/IMG_0160.JPG"
                class="mx-auto profile-width"
                alt="Driver Profile Picture"
              />
            </div>
            <div class="card-body d-md-flex gap-1 align-items-start">
              <!-- Name & Address Div -->
              <div>
                <h5 class="card-title fw-semibold text-center text-md-start">
                  Mushkir
                </h5>
                <p class="card-text text-center text-md-start">
                  📍 No. 751 East Milton Drive, Kandy, Sri Lanka
                </p>
              </div>

              <!-- Available Status Div -->
              <div
                class="bg-success px-3 py-1 rounded-5 text-light mt-2 mt-md-0 text-center"
              >
                Available
              </div>
            </div>

            <!-- Contact Number Div -->
            <div class="card-body pb-0 pt-0">
              <p
                class="fw-semibold text-center text-md-left d-md-flex align-items-center gap-3"
              >
                Contact Number:
                <a
                  href="tel:0777195282"
                  class="text-decoration-none text-secondary"
                  >0777195282</a
                >
              </p>
            </div>

            <!-- Locate & Reserve Button Div -->
            <div
              class="d-md-flex justify-content-between gap-2 align-items-center pb-4 p-2"
            >
              <div class="w-100 mb-3">
                <a href="#" class="btn bg-warning hover-white-effect w-100"
                  ><i class="fa-solid fa-taxi"></i> Reserve for Ride</a
                >
              </div>
              <div class="w-100 mb-3">
                <a
                  href="#"
                  class="text-decoration-none btn hover-black-effect background-black-color text-light w-100"
                  ><i class="fa-solid fa-location-arrow"></i> Find Current
                  Loc</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Boostrap JS Files -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
      integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
      crossorigin="anonymous"
    ></script>
    <!-- End -->
  </body>
</html>