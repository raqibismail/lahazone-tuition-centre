<?php
    include "../../db_con.php";

$studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
$studentname = mysqli_real_escape_string($conn, $_POST['studentname']);
$fee = mysqli_real_escape_string($conn, $_POST['fee']);
$date = mysqli_real_escape_string($conn, $_POST['date']);
$newdate = str_replace('-', '', $date);
$id = substr($studentid, -4);
$random = rand(0000, 9999);
$payment_id = $newdate . $id . $random;
$status = "Not Paid";

mysqli_query($conn, "INSERT INTO payment (PAY_ID, PAY_FEE, PAY_DATE, PAY_STATUS) VALUES ('$payment_id', '$fee', '$date', '$status')");
mysqli_query($conn, "INSERT INTO invoice (STUD_ID, PAY_ID) VALUES ('$studentid', '$payment_id')");

header('location: ../studbills.php');
// Close connection
mysqli_close($conn);
?>