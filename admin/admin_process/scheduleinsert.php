<?php
// Connect to the database
include '../../db_con.php';

// Escape user inputs for security
$staff_id = mysqli_real_escape_string($conn, $_POST['staff_id']);
$course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
$class_id = mysqli_real_escape_string($conn, $_POST['class_id']);
$class_attand = mysqli_real_escape_string($conn, $_POST['class_attand']);
$class_date = mysqli_real_escape_string($conn, $_POST['class_date']);
$class_time = mysqli_real_escape_string($conn, $_POST['class_time']);


// Attempt insert query execution
$stmt = $conn->prepare("SELECT * FROM schedule WHERE CLASS_ID = ? AND CLASS_DATE = ? AND CLASS_TIME = ?");
$stmt->bind_param("sss", $class_id, $class_date, $class_time);
$stmt->execute();
$result = $stmt->get_result();
var_dump($result->num_rows); // Add this line to check the result

if ($result->num_rows > 0) {
    echo "<script>alert('There is a class in that time already')</script>";
    echo "<script>window.location.href = '../schedule.php'</script>";
} else {
    $stmt = $conn->prepare("INSERT INTO schedule (STAFF_ID, COURSE_ID, CLASS_ID, CLASS_ATTAND, CLASS_DATE, CLASS_TIME) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $staff_id, $course_id, $class_id, $class_attand, $class_date, $class_time);
    $stmt->execute();
    echo "<script>window.location.href = '../schedule.php'</script>";
    
}

// Close connection
mysqli_close($conn);
?>