<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Delete Passenger | TAXI PI</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Firebase SDK -->
  <script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
    import { getDatabase, ref, remove, get, child } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

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

    // Fungsi Hapus Penumpang
    async function deletePassenger() {
      const urlParams = new URLSearchParams(window.location.search);
      const passengerId = urlParams.get('passenger_id');
      if (!passengerId) {
        alert("Passenger ID not found.");
        return;
      }

      const passengerRef = ref(db, 'table_passenger/' + passengerId);
      try {
        const snapshot = await get(passengerRef);
        if (snapshot.exists()) {
          const data = snapshot.val();
          const confirmDelete = confirm(`Are you sure to delete passenger "${data.passenger_name}"?`);
          if (confirmDelete) {
            await remove(passengerRef);
            alert("Passenger deleted successfully.");
            window.location.href = "admin.html#passengers";
          }
        } else {
          alert("Passenger not found.");
        }
      } catch (error) {
        console.error("Error deleting passenger:", error);
        alert("Failed to delete passenger.");
      }
    }

    window.onload = deletePassenger;
  </script>

  <style>
    body {
      background-color: #f5f5f5;
      font-family: 'Segoe UI', sans-serif;
      color: #5E2B97;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .spinner-border {
      width: 4rem;
      height: 4rem;
      color: #5E2B97;
    }
  </style>
</head>
<body>
  <div class="text-center">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Processing...</span>
    </div>
    <p class="mt-3">Deleting passenger, please wait...</p>
  </div>
</body>
</html>
