<?php

// Attempt to connect to the database
$con = mysqli_connect('localhost', 'root', '', 'db_city_taxi');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
