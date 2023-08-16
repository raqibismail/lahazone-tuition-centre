<?php
    include "../../db_con.php";
    session_start();
    $sessionId = $_SESSION['staffid'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM staff WHERE STAFF_ID = '$sessionId' "));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lahazone</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0 px-lg-2">
            <a href="adminpage.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="adminpage.php" class="nav-item nav-link active">Profile</a>
                    <a href="schedule.php" class="nav-item nav-link">Schedule</a>
                    <div class="nav-item dropdown m-0">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                        <div class="dropdown-menu m-0">
                            <a href="studentlist.php" class="dropdown-item">Student List</a>
                            <a href="mentorlist.php" class="dropdown-item">Mentor List</a>
                            <a href="studbills.php" class="dropdown-item">Student Bills</a>
                            <a href="studmentassign.php" class="dropdown-item">Assign Student-Mentor</a>
                            <a href="studentregist.php" class="dropdown-item">Register Student</a>
                            <a href="mentorregist.php" class="dropdown-item">Register Mentor</a>
                            <a href="courses.php" class="dropdown-item">Course</a> <?php //add course ?>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                    <div class="nav-item dropdown">
                        <a href="#" class="btn btn-primary dropdown-toggle py-2 px-4" data-toggle="dropdown"><?php echo substr($user['STAFF_NAME'], 0, stripos($user['STAFF_NAME'], 'BIN')-1) ?></a>
                        <div class="dropdown-menu m-0">
                            <a href="adminpageupdate.php" class="dropdown-item">Edit Profile</a>
                            <a href="../logoutprocess.php" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid jumbotron-sm position-relative" style="margin-bottom: 0px ">
        <div class="container text-center">
            <h1 class="text-white display-1 mb-5">Pusat Latihan Lahazone</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Body Start -->
    <br>
    <div class="container">
        <div class="text-center">
            <h1>SCHEDULE</h1>
        </div>
    <?php
        // Connect to the database
        include '../../db_con.php';

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Select all rows from the "staff" table
        $staff_id = $_GET['id'];
        $sql = "SELECT * FROM staff where STAFF_ID = '$staff_id' ";
        $result = mysqli_query($conn, $sql);
        echo '<form action="mentorupdateprocess.php" method="post">';
        echo '<table class="table table-bordered text-center ">';
        echo '<tr>';
        echo '<th>STAFF NAME</th>';
        echo '<th>STAFF IC</th>';
        echo '<th>STAFF PHONE</th>';
        echo '<th>STAFF ADDRESS</th>';
        echo '<th>STAFF EMAIL</th>';
        echo '<th>STAFF SALARY</th>';
        echo '<th>STAFF TYPE</th>';
        echo '<th>COURSE ID</th>';
        echo '</tr>';

        // Fetch the rows one by one
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['STAFF_NAME'] . '</td>';
            echo '<td>' . $row['STAFF_IC'] . '</td>';
            echo '<td>' . $row['STAFF_PHONE'] . '</td>';
            echo '<td>' . $row['STAFF_ADDRESS'] . '</td>';
            echo '<td>' . $row['STAFF_EMAIL'] . '</td>';
            echo '<td>' . '<input class="form-control" type="text" name="staff_salary" value="' . $row['STAFF_SALARY'] . '">' . '</td>';
            echo '<td>';
            echo '<select class="form-control" name="staff_type" required>';
                echo '<option value="'. $row['STAFF_TYPE'] .'" disabled selected>-- Select --</option>';
                echo '<option value="Admin">Admin</option>';
                echo '<option value="Mentor">Mentor</option>';
            echo '</select>';
            echo '</td>';
            echo '<input type="hidden" name="staff_id" value="'.$staff_id.'">';
            echo '<td>' . $row['COURSE_ID'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '<div class="d-flex justify-content-center" >';
        echo '<input type="submit" class="btn btn-primary mx-auto" value="Update" name="edit">';
        echo '</div>';
        echo '</form>';

        // Close the connection
        mysqli_close($conn);

        ?>
    
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
