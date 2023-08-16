<?php
    include '../db_con.php';

    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get the username and password from the form
        $counter = 0;
        if (isset($_POST["name"])) {
            $name = $_POST['name'];
            $icnumber = $_POST['icnumber'];
            $email = $_POST['email'];
            $password = $_POST['psw'];
            $phone = $_POST['phone'];
            $edu = $_POST['edu'];
            $address = $_POST['address'];
            $counter = $counter + 1;
            $studentid = substr($name, 0, 2) . substr($icnumber, 0, 4) . substr($icnumber, 10, 12);
        } else {
            echo "no username supplied";
        }
    }


    // Prepare a SQL statement for inserting data
    $sql = "INSERT INTO student (STUD_ID, STUD_PASS, STUD_NAME, STUD_IC, STUD_PHONE, STUD_EDU_NAME, STUD_ADDRESS)
                            VALUES ('$studentid','$password','$name','$icnumber','$phone','$edu','$address')";
    $result = mysqli_query($conn, $sql);

    // Check for errors
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }
    else
    {
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['studentid'] = $studentid;
        $_SESSION['phone'] = $phone;
		$_SESSION['address'] = $address;
		$_SESSION['edu'] = $edu;
        header('Location: studentpage.php');
    }

    

    // Close the connection
    mysqli_close($conn);
?>