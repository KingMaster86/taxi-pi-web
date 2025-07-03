<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TAXI PI - Sign In</title>
  <link rel="manifest" href="/manifest.json" />
  <meta name="theme-color" content="#5E2B97" />
  <link rel="shortcut icon" href="/assets/img/taxi-img.png" type="image/x-icon" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700&display=swap" rel="stylesheet" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <!-- Custom Style -->
  <style>
    body {
      background: #5E2B97;
      color: #fff;
      font-family: 'Sen', sans-serif;
    }

    .card {
      background-color: #6B33A1;
      border: none;
      border-radius: 1rem;
    }

    .form-control,
    .btn {
      border-radius: 0.5rem;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    }

    .btn-primary {
      background-color: #fff;
      color: #5E2B97;
      font-weight: bold;
      border: none;
    }

    .btn-primary:hover {
      background-color: #ddd;
    }

    .text-small {
      font-size: 0.875rem;
    }

    .logo {
      width: 80px;
    }
  </style>

  <!-- Firebase -->
  <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-auth-compat.js"></script>
</head>

<body>
  <div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card p-4 shadow-lg w-100" style="max-width: 400px;">
      <div class="text-center mb-4">
        <img src="/assets/img/taxi-img.png" alt="Taxi PI Logo" class="logo" />
        <h4 class="mt-2 fw-bold">Sign In to TAXI PI</h4>
      </div>
      <form id="login-form">
        <div class="mb-3">
          <label for="email" class="form-label text-white">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email" required />
        </div>
        <div class="mb-3">
          <label for="password" class="form-label text-white">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Enter your password" required />
        </div>
        <button type="submit" class="btn btn-primary w-100 mt-2">Sign In</button>
        <p class="text-center text-small mt-3">Don't have an account? <a href="signup.html" class="text-white">Register</a></p>
      </form>
      <div id="login-message" class="text-center text-small mt-3"></div>
    </div>
  </div>

  <!-- Firebase Config & Login Logic -->
  <script>
    const firebaseConfig = {
      apiKey: "AIzaSyAlKOlAxaXuGEL0nN0zH6TaKIjskS-ZyOw",
      authDomain: "taxi-pi-network.firebaseapp.com",
      databaseURL: "https://taxi-pi-network-default-rtdb.asia-southeast1.firebasedatabase.app",
      projectId: "taxi-pi-network",
      storageBucket: "taxi-pi-network.firebasestorage.app",
      messagingSenderId: "424683034285",
      appId: "1:424683034285:web:78d616a9dd98a78a0cd824",
      measurementId: "G-62J9SRR509"
    };

    firebase.initializeApp(firebaseConfig);
    const auth = firebase.auth();

    const loginForm = document.getElementById("login-form");
    const messageEl = document.getElementById("login-message");

    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const email = document.getElementById("email").value.trim();
      const password = document.getElementById("password").value;

      auth.signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
          messageEl.innerHTML = `<span class="text-success">Login successful! Redirecting...</span>`;
          setTimeout(() => {
            window.location.href = "dashboard.html";
          }, 1500);
        })
        .catch((error) => {
          messageEl.innerHTML = `<span class="text-danger">${error.message}</span>`;
        });
    });
  </script>

  <!-- Service Worker for PWA -->
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('/service-worker.js');
    }
  </script>
</body>

</html>
