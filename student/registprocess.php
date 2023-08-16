<?php
    include '../db_con.php';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get the username and password from the form
        if (isset($_POST["icnumber"])) {
            $name = $_POST['name'];
            $studentid = $_POST['icnumber'];
            $email = $_POST['email'];
            $password = $_POST['psw'];
            $phone = $_POST['phone'];
            $edu = $_POST['edu'];
            $address = $_POST['address'];
            $course = $_POST['course'];
            $fname = $_POST['fname'];
            $fphone = $_POST['fphone'];
            $mname = $_POST['mname'];
            $mphone = $_POST['mphone'];
            $paridm = $_POST['mic'];
            $paridf = $_POST['fic'];
        } else {
            echo "No Information Entered";
        }
    }


    // Prepare a SQL statement for inserting data
    $sql = "INSERT INTO student (STUD_ID, STUD_PASS, STUD_NAME, STUD_PHONE, STUD_EMAIL, STUD_EDU_NAME, STUD_ADDRESS)
                            VALUES ('$studentid','$password','$name','$phone', '$email', '$edu', '$address')";
    $result = mysqli_query($conn, $sql);
    $sql = "INSERT INTO stud_course (STUD_ID, COURSE_ID)
                            VALUES ('$studentid','$course')";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST['fic'])){
        $sql = mysqli_query($conn, "SELECT PAR_ID FROM parent");
        $par_ids = array();
        while($row = mysqli_fetch_assoc($sql)){
        $par_ids[] = $row['PAR_ID'];
        }
    
        if(!in_array(strtoupper($paridf), $par_ids)){
        $sql = "INSERT INTO parent (PAR_ID, PAR_NAME, PAR_PHONE)
        VALUES ('$paridf','$fname','$fphone')";
        $result = mysqli_query($conn, $sql);
        }
    }
    
    $sql = mysqli_query($conn, "SELECT PAR_ID FROM parent");
    $par_ids = array();
    while($row = mysqli_fetch_assoc($sql)){
    $par_ids[] = $row['PAR_ID'];
    }

    if(!in_array(strtoupper($paridf), $par_ids)){
    $sql = "INSERT INTO parent (PAR_ID, PAR_NAME, PAR_PHONE)
    VALUES ('$paridf','$fname','$fphone')";
    $result = mysqli_query($conn, $sql);
    }

    if(!in_array(strtoupper($paridm), $par_ids)){
    $sql = "INSERT INTO parent (PAR_ID, PAR_NAME, PAR_PHONE)
    VALUES ('$paridm','$mname','$mphone')";
    $result = mysqli_query($conn, $sql);
    }

    $sqlf = "INSERT INTO stud_par (STUD_ID, PAR_ID, PAR_TYPE)
    VALUES ('$studentid','$paridf','Father')";
    $resultf = mysqli_query($conn, $sqlf);

    $sqlm = "INSERT INTO stud_par (STUD_ID, PAR_ID, PAR_TYPE)
    VALUES ('$studentid','$paridm','Mother')";
    $resultm = mysqli_query($conn, $sqlm);

    // Check for errors
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    else
    {
        session_start();
        $_SESSION['studentid'] = $studentid;
		$_SESSION['fatherid'] = $paridf;
		$_SESSION['motherid'] = $paridm;
        header('Location: studentpage.php');
    }

    

    // Close the connection
    mysqli_close($conn);
?>