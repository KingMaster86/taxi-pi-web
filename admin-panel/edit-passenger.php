<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Passenger | TAXI PI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #f5f0ff;
      color: #5E2B97;
      font-family: 'Segoe UI', sans-serif;
    }
    .btn-purple {
      background-color: #5E2B97;
      color: white;
    }
    label {
      font-weight: 600;
    }
  </style>
</head>
<body class="container py-5">
  <h3 class="text-center mb-4 fw-bold">Edit Passenger Profile</h3>
  <form id="editPassengerForm" class="p-4 border rounded shadow bg-white">
    <div class="mb-3">
      <label for="passenger-email" class="form-label">Email</label>
      <input type="email" class="form-control" id="passenger-email" required />
    </div>
    <div class="mb-3">
      <label for="passenger-phone" class="form-label">Phone Number</label>
      <input type="text" class="form-control" id="passenger-phone" required />
    </div>
    <div class="mb-3">
      <label for="passenger-address" class="form-label">Address Line</label>
      <input type="text" class="form-control" id="passenger-address" required />
    </div>
    <div class="mb-3">
      <label for="passenger-city" class="form-label">City</label>
      <input type="text" class="form-control" id="passenger-city" required />
    </div>
    <div class="mb-3">
      <label for="passenger-country" class="form-label">Country</label>
      <input type="text" class="form-control" id="passenger-country" required />
    </div>
    <button type="submit" class="btn btn-purple mt-3 w-100">Update Passenger</button>
  </form>

  <!-- Firebase SDK -->
  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
    import { getDatabase, ref, get, update } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

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

    const app = initializeApp(firebaseConfig);
    const db = getDatabase(app);

    const passengerId = new URLSearchParams(window.location.search).get("passenger_id");

    if (passengerId) {
      const passengerRef = ref(db, "table_passenger/" + passengerId);
      get(passengerRef).then((snapshot) => {
        if (snapshot.exists()) {
          const data = snapshot.val();
          document.getElementById("passenger-email").value = data.passenger_email || "";
          document.getElementById("passenger-phone").value = data.passenger_phone_no || "";
          document.getElementById("passenger-address").value = data.passenger_address_line || "";
          document.getElementById("passenger-city").value = data.passenger_city || "";
          document.getElementById("passenger-country").value = data.passenger_country || "";
        } else {
          Swal.fire("Error", "Passenger not found", "error");
        }
      });
    }

    document.getElementById("editPassengerForm").addEventListener("submit", function (e) {
      e.preventDefault();

      const updatedData = {
        passenger_email: document.getElementById("passenger-email").value,
        passenger_phone_no: document.getElementById("passenger-phone").value,
        passenger_address_line: document.getElementById("passenger-address").value,
        passenger_city: document.getElementById("passenger-city").value,
        passenger_country: document.getElementById("passenger-country").value
      };

      update(ref(db, "table_passenger/" + passengerId), updatedData)
        .then(() => {
          Swal.fire("Success", "Passenger updated successfully!", "success").then(() => {
            window.location.href = "admin-passenger-list.html";
          });
        })
        .catch(() => {
          Swal.fire("Error", "Failed to update passenger", "error");
        });
    });
  </script>
</body>
</html>
