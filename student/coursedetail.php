<?php
    include "../db_con.php";
    session_start();
    $sessionId = $_SESSION['studentid'];
    $fatherId = $_SESSION['fatherid'];
    $motherId = $_SESSION['motherid'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID = '$sessionId' "));
    $father = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM parent WHERE  PAR_ID = '$fatherId'"));
    $mother = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM parent WHERE PAR_ID = '$motherId'"));
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
    <link href="../css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-lg-0">
            <a href="studentpage.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="studentpage.php" class="nav-item nav-link active">Profile</a>
                    <a href="schedule.php" class="nav-item nav-link">Schedule</a>
                    <div class="nav-item dropdown m-0">
                        <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Course</a>
                        <div class="dropdown-menu m-0">
                            <a href="coursedetail.php" class="dropdown-item ">Course Detail</a>
                        </div>
                    </div>
                    <a href="transaction.php" class="nav-item nav-link">Payment</a>
                </div>
                <div class="navbar">
                <div class="nav-item dropdown">
                    <a href="#" class="btn btn-primary dropdown-toggle py-2 px-4" data-toggle="dropdown"><?php echo substr($user['STUD_NAME'], 0, stripos($user['STUD_NAME'], 'BIN') ? stripos($user['STUD_NAME'], 'BIN') - 1 : strlen($user['STUD_NAME']))  ?></a>
                        <div class="dropdown-menu m-0">
                        <a href="studentpageupdate.php" class="dropdown-item">Edit Profile</a>
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
            <h1>REGISTERED COURSES</h1>
        </div>
        <table class="table table-bordered border-dark text-center text-dark"> 
            <thead class="font-weight-bold">
            <th>Course ID</th>
            <th>Course Name</th>
            </thead>
            <?php
            // Connect to the database
            include '../db_con.php';

            // Select all rows from the schedule table       
            $query2 = "SELECT COURSE_ID FROM stud_course WHERE STUD_ID =  '".$user['STUD_ID']."' ";
            $result2 = mysqli_query($conn, $query2);

            while ($row2 = mysqli_fetch_assoc($result2)) {
                $query = "SELECT * FROM course WHERE COURSE_ID = '" . $row2['COURSE_ID'] . "' ";
                $result = mysqli_query($conn, $query);

                // Output the data for each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['COURSE_ID'] . "</td>";
                    echo "<td>" . ucwords($row['COURSE_NAME']) . "</td>";
                    // echo "<td>";
                    // echo "<a href='schedule_process/delete.php?id=" . $row['SCH_ID'] . "'>Delete</a>";
                    // echo "</td>";
                    echo "</tr>";
                }
            }
        ?>
        </table>
        <div>
            <a href=""></a>
        </div>
    </div>
    <?php

        // Close the connection
        mysqli_close($conn);
    ?>
    <!-- Body End -->
    
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
