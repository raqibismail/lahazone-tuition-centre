<?php

// Connect to the database
include '../../db_con.php';

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST['edit'])) {
    // Get the form data
    $staff_salary = $_POST['staff_salary'];
    $staff_type = $_POST['staff_type'];
    $staff_id = $_POST['staff_id'];

    // Update the staff record in the database
    $update_query = "UPDATE staff SET STAFF_SALARY='$staff_salary', STAFF_TYPE='$staff_type' WHERE STAFF_ID='$staff_id'";
    mysqli_query($conn, $update_query);

    if (mysqli_query($conn, $update_query) && mysqli_affected_rows($conn) > 0) {
        // The query was successful and one or more rows were affected
        // Start a new session for updated variables
        session_start();
        $_SESSION['staffname'] = $staffname;
        $_SESSION['stafftype'] = $staffname;
        // ...
    } else {
        // The query was unsuccessful or no rows were affected
        // Handle the error or display a message to the user
        echo "Error: " . mysqli_error($conn);
    }
    // Redirect to the staff list page
    header('Location: ../mentorlist.php');
    exit;
}
?>