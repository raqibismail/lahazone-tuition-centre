<?php
// Connect to the database
include '../../db_con.php';

// Escape user inputs for security
$sch_id = mysqli_real_escape_string($conn, $_GET['id']);

// Attempt delete query execution
$sql = "DELETE FROM schedule WHERE sch_id = '$sch_id'";
if(mysqli_query($conn, $sql)){
    header('Location: ../schedule.php');
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>