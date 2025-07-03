<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Driver ID Viewer | TAXI PI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f5f0ff;
      color: #5E2B97;
      font-family: 'Segoe UI', sans-serif;
    }
    .box {
      margin-top: 100px;
      background-color: white;
      border: 2px solid #5E2B97;
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="box text-center">
    <h3 class="fw-bold">Driver ID</h3>
    <p id="driverIdOutput" class="fs-4 mt-3 text-break text-dark"></p>
  </div>

  <script>
    // Ambil driver_id dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const driverId = urlParams.get('driver_id');

    // Tampilkan di halaman
    document.getElementById("driverIdOutput").innerText = driverId ? driverId : "No driver_id provided.";
  </script>
</body>
</html>
