<?php
//MySQL database configuration
$host = 'localhost';    // Database host
$user = 'root';     // Database user
$pass = '';     // Database password
$database_name = 'products';   // Database name

// Create connection
$connection = mysqli_connect($host, $user, $pass, $database_name);

// Check connection
if ($connection) {
    $is_connected = true;
} else {
    echo "Connection failed: " . mysqli_connect_error();
}