<?php
session_start();
session_unset();
session_destroy();

echo "<script>alert('You are logged-out your account.')</script>";
echo "<script>window.open('../index.php','_self')</script>";
