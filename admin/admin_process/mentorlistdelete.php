<?php

// Connect to the database
include '../../db_con.php';

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the staff ID of the row to delete
$staff_id = $_GET['id'];

// Delete the row from the "staff" table
$sql = "DELETE FROM staff WHERE STAFF_ID = '$staff_id'";
if (mysqli_query($conn, $sql)) {
  // If the delete was successful, redirect to the mentor list page
  header("Location: ../mentorlist.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

?>