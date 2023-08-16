<?php
   include "../../db_con.php";
   session_start();
   $sessionId = $_SESSION['staffid'];
   $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM staff WHERE STAFF_ID = '$sessionId' "));



    // Check if a file was uploaded
    if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Get the file details
    $file_name = $user['STAFF_ID'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    $sql = "UPDATE staff SET STAFF_IMG = '".$file_name.'.jpg'."' WHERE STAFF_ID = '".$user['STAFF_ID']."'";
    mysqli_query($conn, $sql);

    $file_destination = '../../img/' . $file_name . ".jpg";
    if (file_exists($file_destination)) {
        // Delete existing file
        unlink($file_destination);
    }

   // Work with the file
    if ($file_error === 0) {
        $file_destination = '../../img/' . $file_name . ".jpg";
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($file_tmp, $file_destination)) {
        // File was successfully uploaded
        header('Location: ../adminpageupdate.php');
    } else {
        // There was an error uploading the file
        echo 'There was an error uploading the file.';
    }
}

?>