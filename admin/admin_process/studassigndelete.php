<?php

// Connect to the database
include '../../db_con.php';

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the staff ID of the row to delete
$stud_id = $_GET['id'];
$mentor_id = $_GET['id2'];

// Delete the row from the "staff" table

$sql = mysqli_query($conn,"DELETE FROM stud_mentor WHERE STUD_ID = '$stud_id' AND STAFF_ID = '$mentor_id'");

header("Location: ../studmentassign.php");


// Close the connection
mysqli_close($conn);

?>