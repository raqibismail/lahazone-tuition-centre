<?php
// Connect to the database
include '../../db_con.php';

// Escape user inputs for security
$sch_id = mysqli_real_escape_string($conn, $_POST['sch_id']);
$course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
$class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
$class_attand = mysqli_real_escape_string($conn, $_POST['class_attand']);
$class_date = mysqli_real_escape_string($conn, $_POST['class_date']);


// Attempt insert query execution
$sql = "INSERT INTO schedule (SCH_ID, COURSE_ID, CLASS_ID, CLASS_ATTAND, CLASS_DATE) VALUES ('$sch_id', '$course_id', '$class_id', '$class_attand', '$class_date')";
if(mysqli_query($conn, $sql)){
    header('Location: ../schedule.php');
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>