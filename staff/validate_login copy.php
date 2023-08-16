<?php
    include '../db_con.php';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	// Get the username and password from the form

    if (isset($_POST["username"]))
        {
			$username = $_POST['username'];
			$password = $_POST['password'];
        } 
        else 
        {
            $user = null;
            echo "no username supplied";
        }

	// Escape the username and password to prevent SQL injection attacks
	$username = mysqli_real_escape_string($conn, $username);
	$password = mysqli_real_escape_string($conn, $password);
	
	// Query the database for a user with the specified username and password
	$result = mysqli_query($conn, "SELECT * FROM staff WHERE STAFF_ID='$username' AND STAFF_PASS='$password'");
	$row = mysqli_fetch_assoc($result);

	
	// Check if a matching user was found
	if (strcasecmp($row['STAFF_TYPE'], 'Mentor') ) {
		// A matching user was found, so log the user in
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['mentorname'] = $row['STAFF_NAME'];
		$_SESSION['mentorid'] = $row['STAFF_ID'];
		$_SESSION['mentorphone'] = $row['STAFF_PHONE'];
		$_SESSION['mentoraddress'] = $row['STAFF_ADDRESS'];
		$_SESSION['mentoremail'] = $row['STAFF_EMAIL'];
		$_SESSION['mentortype'] = $row['STAFF_TYPE'];
		$_SESSION['mentortcourse'] = $row['COURSE_ID'];
		header('Location: ../../mentor/mentorpage.php');
	} 
	else if (strcasecmp($row['STAFF_TYPE'], 'Admin')){
		$_SESSION['logged_in'] = true;
		$_SESSION['adminname'] = $row['STAFF_NAME'];
		$_SESSION['adminid'] = $row['STAFF_ID'];
		$_SESSION['adminphone'] = $row['STAFF_PHONE'];
		$_SESSION['adminaddress'] = $row['STAFF_ADDRESS'];
		$_SESSION['adminemail'] = $row['STAFF_EMAIL'];
		$_SESSION['admintype'] = $row['STAFF_TYPE'];
		$_SESSION['admintcourse'] = $row['COURSE_ID'];
		header('Location: ../../admin/adminpage.php');
	}
	else {
		// No matching user was found, so display an error message
		echo "Invalid username or password";
	}
	
	// Close the database connection
	mysqli_close($conn);
	
}

?>