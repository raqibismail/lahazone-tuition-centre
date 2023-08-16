<?php
// Start the session
session_start();

// Unset all the session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the login page
header("Location: index.php");
exit;
?>