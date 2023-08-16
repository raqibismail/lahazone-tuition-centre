<?php
    include '../../db_con.php';

    $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
    $mentorid = mysqli_real_escape_string($conn, $_POST['mentorid']);

    // Retrieve the course of the student
    $student_course = mysqli_query($conn, "SELECT COURSE_ID FROM stud_course WHERE STUD_ID='$studentid'");

    // Retrieve the course of the mentor
    $mentor_course = mysqli_query($conn, "SELECT COURSE_ID FROM staff WHERE STAFF_ID='$mentorid'");

    $valid = false;
    // Check if there is a match
    while($row = mysqli_fetch_assoc($student_course)){
        if(mysqli_num_rows(mysqli_query($conn, "SELECT COURSE_ID FROM staff WHERE COURSE_ID='".$row['COURSE_ID']."' AND STAFF_ID='$mentorid'"))>0){
            $valid = true;
            break;
        }
    }

    if($valid){
        $stmt = $conn->prepare("INSERT INTO stud_mentor (STUD_ID, STAFF_ID) VALUE (?,?)");
        $stmt->bind_param("ss", $studentid, $mentorid);
        $stmt->execute();
        header('Location: ../studmentassign.php');
    }else{
        echo "<script>alert('This assignation is invalid, different course detected')</script>";
        echo "<script>window.location.href = '../studmentassign.php'</script>";
    }

    // Close the connection
    mysqli_close($conn);

?>
