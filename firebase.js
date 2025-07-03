// firebase.js
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getDatabase } from "firebase/database";
import { getStorage } from "firebase/storage";
import { getAnalytics } from "firebase/analytics";

const firebaseConfig = {
  apiKey: "AIzaSyAlKOlAxaXuGEL0nN0zH6TaKIjskS-ZyOw",
  authDomain: "taxi-pi-network.firebaseapp.com",
  databaseURL: "https://taxi-pi-network-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "taxi-pi-network",
  storageBucket: "taxi-pi-network.appspot.com",
  messagingSenderId: "424683034285",
  appId: "1:424683034285:web:78d616a9dd98a78a0cd824",
  measurementId: "G-62J9SRR509"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const database = getDatabase(app);
const storage = getStorage(app);
const analytics = getAnalytics(app);

export { auth, database, storage, analytics };
