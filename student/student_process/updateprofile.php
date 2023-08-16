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
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $edu = mysqli_real_escape_string($conn, $_POST['edu']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $fphone = mysqli_real_escape_string($conn, $_POST['fphone']);
    $femail = mysqli_real_escape_string($conn, $_POST['femail']);
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $mphone = mysqli_real_escape_string($conn, $_POST['mphone']);
    $memail = mysqli_real_escape_string($conn, $_POST['memail']);
    $fid = mysqli_real_escape_string($conn, $_POST['fid']);
    $mid = mysqli_real_escape_string($conn, $_POST['mid']);

    // Update the information in the database
    $sqls = "UPDATE student SET STUD_NAME='$name', STUD_ID='$studentid', STUD_PHONE='$phone', STUD_ADDRESS='$address', STUD_EDU_NAME='$edu' WHERE STUD_ID='$studentid'";
    mysqli_query($conn, $sqls);

    // $sqlf1 = "SELECT PAR_ID FROM stud_par WHERE STUD_ID = '$studentid' AND PAR_TYPE = 'Father' ";
    // $fid = mysqli_query($conn, $sqlf1);

    $sql3 = "SELECT * FROM parent";
    $result3 = mysqli_query($conn, $sql3);
    while(mysqli_fetch_assoc($result3)){
        
    }
    $sqlf2 = "  UPDATE parent SET PAR_NAME = '$fname', PAR_PHONE = '$fphone', PAR_EMAIL = '$femail'
                WHERE PAR_ID = '$fid'";
    mysqli_query($conn, $sqlf2);
    $sqlf1 = "  UPDATE parent SET PAR_NAME = '$mname', PAR_PHONE = '$mphone', PAR_EMAIL = '$memail'
                WHERE PAR_ID = '$mid'";
    mysqli_query($conn, $sqlf1);
    
    session_start();
	$_SESSION['logged_in'] = true;
    $_SESSION['studentid'] = $studentid;
    $_SESSION['motherid'] = $mid;
    $_SESSION['fatherid'] = $fid;
    

    // Redirect to the profile page
    header('Location: ../studentpage.php');
}

?>
