<?php
// include('../includes/connect.php');


session_start();
session_unset();
session_destroy();

// Navigate to City Taxi Landing Page
echo "<script>window.open('../index.php','_self')</script>";
