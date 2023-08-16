<?php

// Connect to the database
include '../../db_con.php';

// Check the connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the staff ID of the row to delete
$stud_id = $_GET['id'];

// Delete the row from the "staff" table
$sql = mysqli_query($conn,"DELETE FROM student WHERE STUD_ID = '$stud_id'");
$sql = mysqli_query($conn,"DELETE FROM stud_par WHERE STUD_ID = '$stud_id'");
$sql = mysqli_query($conn,"DELETE FROM stud_course WHERE STUD_ID = '$stud_id'");
$sql = mysqli_query($conn,"DELETE FROM stud_mentor WHERE STUD_ID = '$stud_id'");
$sql = mysqli_query($conn,"DELETE FROM stud_performance WHERE STUD_ID = '$stud_id'");

header("Location: ../studentlist.php");


// Close the connection
mysqli_close($conn);

?>