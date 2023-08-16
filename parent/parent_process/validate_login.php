<?php
    include '../../db_con.php';

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
	$match = mysqli_query($conn, "SELECT * FROM stud_par WHERE PAR_ID = '$username' AND STUD_ID = '$password'");
	$row = mysqli_fetch_assoc($match);

	
	// Check if a matching user was found
	if (mysqli_num_rows($match) == 1 ) {
		// A matching user was found, so log the user in
		session_start();
		$_SESSION['par_id'] = $row['PAR_ID'];

		header('Location: ../parentpage.php');
	} else {
		// No matching user was found, so display an error message
		echo "<script>alert('Invalid username or password');</script>";
		echo "<script>window.location.href = '../parentlogin.php';</script>";
	}
	
	// Close the database connection
	mysqli_close($conn);
	
}

?>