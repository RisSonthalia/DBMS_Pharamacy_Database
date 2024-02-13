<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "pharmacy";
$con = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if ($con === false) {
    die("Error: Connection failed. " . mysqli_connect_error());
} else {
    // echo "Connection established successfully";
}

