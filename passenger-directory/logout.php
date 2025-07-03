<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Logging Out | TAXI PI</title>
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

  <script>
    // Firebase Config
    const firebaseConfig = {
      apiKey: "AIzaSyBLjFhBTzZFLYbXuFSiEjSc3s7fpOHggd8",
      authDomain: "taxipi-auth.firebaseapp.com",
      projectId: "taxipi-auth",
      storageBucket: "taxipi-auth.appspot.com",
      messagingSenderId: "1037485761311",
      appId: "1:1037485761311:web:a22fa2400f3bbf239b11a3"
    };

    // Init Firebase
    firebase.initializeApp(firebaseConfig);
    const auth = firebase.auth();

    // Logout on page load
    window.onload = () => {
      auth.signOut().then(() => {
        alert("You are logged out of your account.");
        window.location.href = "/index.html";
      }).catch((error) => {
        alert("Logout failed: " + error.message);
        window.location.href = "/index.html";
      });
    };
  </script>
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh; font-family: sans-serif;">
  <h3>Logging you out...</h3>
</body>
</html>
