<?php

session_start();
session_unset();
session_destroy();


echo "<script>alert('Logout has been proceeded successfully!')</script>";
echo "<script>window.open('index.php','_self')</script>";
