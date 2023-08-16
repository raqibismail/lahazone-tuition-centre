<?php

// Connect to the database
include '../../db_con.php';

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the staff ID of the row to delete
$pay_id = $_GET['id'];

// Delete the row from the "staff" table
$sql = mysqli_query($conn,"DELETE FROM payment WHERE PAY_ID = '$pay_id'");
$sql = mysqli_query($conn,"DELETE FROM invoice WHERE PAY_ID = '$pay_id'");

header("Location: ../studbills.php");


// Close the connection
mysqli_close($conn);

?>