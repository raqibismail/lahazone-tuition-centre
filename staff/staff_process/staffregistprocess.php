<?php
    include '../../db_con.php';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get the username and password from the form
        if (isset($_POST["name"])) {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $icnumber = $_POST['icnumber'];
            $email = $_POST['email'];
            $password = $_POST['psw'];
            $phone = $_POST['phone'];
            $tcourse = $_POST['tcourse'];
            $address = $_POST['address'];
            $stafftype = 'Mentor';

        } else {
            echo "no username supplied";
        }
    }

    $sqls = "SELECT * FROM staff";
    $results = mysqli_query($conn, $sqls);
    while($row = mysqli_fetch_assoc($results)){
    $staffusername = $row['STAFF_ID'];
        if (strcasecmp($username, $staffusername) == 0 ){
            echo '<script>window.alert("Sorry, that username is already taken. Please choose a different one.")</script>'; 
            echo '<script>window.location = "../mentorregist.php";</script>'; 
        }
    }
    // Prepare a SQL statement for inserting data
    $sql = "INSERT INTO staff (STAFF_ID, STAFF_PASS, STAFF_NAME, STAFF_IC, STAFF_PHONE, STAFF_ADDRESS, STAFF_EMAIL, STAFF_TYPE, COURSE_ID)
    VALUES ('$username','$password','$name','$icnumber','$phone','$address', '$email', '$stafftype', '$tcourse')";
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    else
    {
        session_start();
        $_SESSION['logged_in'] = true;
		$_SESSION['mentorid'] = $username;
		echo '<script>window.alert("Mentor Registration Successful.")</script>'; 
        echo '<script>window.location = "../../mentor/mentorpage.php";</script>';
    }

    // Close the connection
    mysqli_close($conn);
        

?>

