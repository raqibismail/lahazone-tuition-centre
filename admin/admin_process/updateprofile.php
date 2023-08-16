<?php
    // Connect to the database
    include '../../db_con.php';
    session_start();
    $sessionId = $_SESSION['mentorid'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM staff WHERE STAFF_ID = '$sessionId' "));

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
        $staffpass = mysqli_real_escape_string($conn, $_POST['staffpass']);

        if(!isset($_POST['stafftcourse']) || empty($_POST['stafftcourse'])){
            $stafftcourse = $user['COURSE_ID'];
        }
        else{
            $stafftcourse = mysqli_real_escape_string($conn, $_POST['stafftcourse']);
        }


        // Update the information in the database
        $sqls = "   UPDATE staff 
                    SET STAFF_NAME='$staffname', STAFF_ID='$staffid', STAFF_PASS='$staffpass', STAFF_PHONE='$staffphone', STAFF_ADDRESS='$staffaddress', STAFF_EMAIL='$staffemail', STAFF_TYPE='$stafftype', COURSE_ID='$stafftcourse' 
                    WHERE STAFF_ID='" . $user['STAFF_ID'] . "'";
        mysqli_query($conn, $sqls);
        
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['staffid'] = $staffid;


        // Redirect to the profile page
        header('Location: ../adminpage.php');
    }

?>
