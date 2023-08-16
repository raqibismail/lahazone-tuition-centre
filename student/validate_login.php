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
	$result = mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID='$username' AND STUD_PASS='$password'");
	$result3 = mysqli_query($conn, "SELECT * FROM stud_par WHERE STUD_ID='$username'");
	$row = mysqli_fetch_assoc($result);

	while ($row3 = mysqli_fetch_assoc($result3))
	{
		if($row3['PAR_TYPE'] == "Mother")
		{
			$mother = $row3['PAR_ID'];
			$motherinfo = mysqli_query($conn, "SELECT * FROM parent WHERE PAR_ID='$mother'");
			$mrow = mysqli_fetch_assoc($motherinfo);
		}
		else if($row3['PAR_TYPE'] == "Father")
		{
			$father = $row3['PAR_ID'];
			$fatherinfo = mysqli_query($conn, "SELECT * FROM parent WHERE PAR_ID='$father'");
			$frow = mysqli_fetch_assoc($fatherinfo);
			
		}
	}
	
	// Check if a matching user was found
	if (mysqli_num_rows($result) == 1 ) {
		// A matching user was found, so log the user in
		session_start();
		$_SESSION['logged_in'] = true;
		$_SESSION['name'] = $row['STUD_NAME'];
		$_SESSION['studentid'] = $row['STUD_ID'];
		$_SESSION['phone'] = $row['STUD_PHONE'];
		$_SESSION['address'] = $row['STUD_ADDRESS'];
		$_SESSION['edu'] = $row['STUD_EDU_NAME'];
		$_SESSION['image'] = $row['STUD_IMG'];
		$_SESSION['fname'] = $frow['PAR_NAME'];
		$_SESSION['fphone'] = $frow['PAR_PHONE'];
		$_SESSION['femail'] = $frow['PAR_EMAIL'];
		$_SESSION['mname'] = $mrow['PAR_NAME'];
		$_SESSION['mphone'] = $mrow['PAR_PHONE'];
		$_SESSION['memail'] = $mrow['PAR_EMAIL'];
		$_SESSION['fatherid'] = $frow['PAR_ID'];
		$_SESSION['motherid'] = $mrow['PAR_ID'];

		header('Location: studentpage.php');
	} else {
		// No matching user was found, so display an error message
		echo "Invalid username or password";
	}
	
	// Close the database connection
	mysqli_close($conn);
	
}

?>