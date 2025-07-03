<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Passenger Profile | TAXI PI</title>

  <link rel="manifest" href="/manifest.json" />
  <meta name="theme-color" content="#5E2B97" />
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/service-worker.js');
    }
  </script>

  <!-- Firebase -->
  <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.12.0/firebase-firestore.js"></script>

  <!-- Bootstrap & Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/style2.css" />
  <link rel="stylesheet" href="../assets/css/style3.css">

  <!-- Google Font (Sen) -->
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <script>
    const firebaseConfig = {
      apiKey: "AIzaSyBLjFhBTzZFLYbXuFSiEjSc3s7fpOHggd8",
      authDomain: "taxipi-auth.firebaseapp.com",
      projectId: "taxipi-auth",
      storageBucket: "taxipi-auth.appspot.com",
      messagingSenderId: "1037485761311",
      appId: "1:1037485761311:web:a22fa2400f3bbf239b11a3"
    };
    firebase.initializeApp(firebaseConfig);
  </script>
</head>

<body class="overflow-x-hidden background-black-color">
  <header class="container-fluid bg-light">
    <nav class="navbar navbar-expand-lg container py-3">
      <div class="container-fluid">
        <a class="navbar-brand background-black-color px-3 text-white rounded-2 fs-1 fw-bold" href="../index.html">City<span class="text-warning">Taxi</span></a>
        <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navLinks"></ul>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div class="row">
      <div class="col-md-12 text-center text-white py-4">
        <h3 id="passengerTitle">Welcome, Passenger</h3>
        <p id="passengerEmail"></p>
        <button onclick="logout()" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
      </div>
    </div>
  </main>

  <script>
    const auth = firebase.auth();

    auth.onAuthStateChanged(user => {
      if (user) {
        document.getElementById('passengerEmail').innerText = `Email: ${user.email}`;
        document.getElementById('passengerTitle').innerText = `Welcome, ${user.displayName || 'Passenger'}`;

        document.getElementById("navLinks").innerHTML = `
          <li class='nav-item'><a class='nav-link font-black fs-6 rounded effect-black me-2 px-3 fw-semibold' href="passenger-homepage.html?profile"><i class='fa-solid fa-user'></i> Profile</a></li>
          <li class='nav-item'><a class='nav-link font-black fs-6 rounded effect-black me-2 px-3 fw-semibold' href="#"><i class='fa-solid fa-pen-to-square'></i> Edit Profile</a></li>
          <li class='nav-item'><a class='nav-link font-black fs-6 rounded effect-black me-2 px-3 fw-semibold' href="../select-driver.html"><i class='fa-solid fa-taxi'></i> Reserve a Taxi</a></li>
          <li class='nav-item'><a class='nav-link font-black fs-6 rounded effect-black me-2 px-3 fw-semibold' href="passenger-homepage.html?history"><i class='fa-solid fa-clock-rotate-left'></i> Trip Log</a></li>
        `;
      } else {
        window.location.href = "../passenger-directory/passenger-login.html";
      }
    });

    function logout() {
      auth.signOut().then(() => {
        alert("You are logged out.");
        window.location.href = "../index.html";
      });
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
