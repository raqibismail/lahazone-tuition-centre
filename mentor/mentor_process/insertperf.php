<?php
// Connect to the database
include '../../db_con.php';

if(isset($_POST['submit'])){
    $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
    $staffid = mysqli_real_escape_string($conn, $_POST['staffid']);
    $courseid = mysqli_real_escape_string($conn, $_POST['courseid']);
    $grade = mysqli_real_escape_string($conn, $_POST['grade']);
    $grade_desc = mysqli_real_escape_string($conn, $_POST['gradedesc']);

    $sql = mysqli_query($conn, "INSERT INTO stud_performance (STUD_ID, STAFF_ID, GRADE, GRADE_DESC) VALUES ('$studentid', '$staffid', '$grade', '$grade_desc')");

    if($sql){
        header('Location: ../studperformance.php');
    }
    else{
        echo '<script>alert("Error: '. mysqli_error($conn) .'")</script>';
        echo '<script>window.location.href="../studperformance.php"</script>';
    }
}
?>