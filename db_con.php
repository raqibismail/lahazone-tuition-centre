<?php

// Set the server hostname, username, password, and database name
$server = "root";
$username = " ";
$password = " ";
$database = "lahazone";

// Connect to the database
$conn = mysqli_connect($server, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>