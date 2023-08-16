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
    $staffname = mysqli_real_escape_string($conn, $_POST['staffname']);
    $staffid = mysqli_real_escape_string($conn, $_POST['staffid']);
    $stafftype = mysqli_real_escape_string($conn, $_POST['stafftype']);
    $staffphone = mysqli_real_escape_string($conn, $_POST['staffphone']);
    $staffaddress = mysqli_real_escape_string($conn, $_POST['staffaddress']);
    $staffemail = mysqli_real_escape_string($conn, $_POST['staffemail']);

    if($_POST['stafftcourse'] == null){
        session_start();
        $stafftcourse = $_SESSION['stafftcourse'];
    }
    else{
        $stafftcourse = mysqli_real_escape_string($conn, $_POST['stafftcourse']);
    }


    // Update the information in the database
    $sqls = "UPDATE staff SET STAFF_NAME='$staffname', STAFF_ID='$staffid', STAFF_PHONE='$staffphone', STAFF_ADDRESS='$staffaddress', STAFF_EMAIL='$staffemail', STAFF_TYPE='$stafftype', COURSE_ID='$stafftcourse' WHERE STAFF_ID='$staffid'";
    mysqli_query($conn, $sqls);
    
    session_start();
	$_SESSION['logged_in'] = true;
    $_SESSION['staffname'] = $staffname;
    $_SESSION['staffid'] = $staffid;
    $_SESSION['staffphone'] = $staffphone;
    $_SESSION['staffaddress'] = $staffaddress;
    $_SESSION['staffemail'] = $staffemail;
    $_SESSION['stafftype'] = $stafftype;
    $_SESSION['stafftcourse'] = $stafftcourse;

    

    // Redirect to the profile page
    header('Location: ../staffpage.php');
}

?>
