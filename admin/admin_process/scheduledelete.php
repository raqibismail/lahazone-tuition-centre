<?php
// Connect to the database
include '../../db_con.php';

// Escape user inputs for security
$class_date = mysqli_real_escape_string($conn, $_GET['id']);
$class_time = mysqli_real_escape_string($conn, $_GET['id2']);
$class_id = mysqli_real_escape_string($conn, $_GET['id3']);

// Attempt delete query execution
$sql = "DELETE FROM schedule WHERE CLASS_ID = '$class_id' AND CLASS_DATE = '$class_date' AND CLASS_TIME = '$class_time'";
if(mysqli_query($conn, $sql)){
    header('Location: ../schedule.php');
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>