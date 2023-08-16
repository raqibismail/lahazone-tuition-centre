<?php
    include "../../db_con.php";

$courseid = mysqli_real_escape_string($conn, $_POST['courseid']);
$coursename = mysqli_real_escape_string($conn, $_POST['coursename']);

mysqli_query($conn, "INSERT INTO course (COURSE_ID, COURSE_NAME) VALUES ('$courseid', '$coursename')");

header('location: ../course.php');
// Close connection
mysqli_close($conn);
?>