<?php
// Connect to the database
include '../../db_con.php';

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Check for POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the updated information from the form
    $parname = mysqli_real_escape_string($conn, $_POST['parname']);
    $parid = mysqli_real_escape_string($conn, $_POST['parid']);
    $parphone = mysqli_real_escape_string($conn, $_POST['parphone']);
    $paremail = mysqli_real_escape_string($conn, $_POST['paremail']);
    $parjob = mysqli_real_escape_string($conn, $_POST['parjob']);
   

    // Update the information in the database
    $sqls = "UPDATE parent SET PAR_NAME='$parname', PAR_ID='$parid', PAR_PHONE='$parphone', PAR_EMAIL='$paremail', PAR_JOB='$parjob' WHERE PAR_ID='$parid'";
    mysqli_query($conn, $sqls);
    $sqls = "UPDATE stud_par SET PAR_ID='$parid' WHERE PAR_ID='$parid'";
    mysqli_query($conn, $sqls);
   
    session_start();
	$_SESSION['logged_in'] = true;
    $_SESSION['par_id'] = $parid;

    // Redirect to the profile page
    header('Location: ../parentpage.php');
}

?>
