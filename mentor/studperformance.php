<?php
    include "../db_con.php";
    session_start();
    $sessionId = $_SESSION['mentorid'];
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
    <link href="../css/style.css" rel="stylesheet">
    
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="mentorpage.php" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="mentorpage.php" class="nav-item nav-link active">Profile</a>
                    <a href="schedule.php" class="nav-item nav-link">Schedule</a>
                    <div class="nav-item dropdown m-0">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Student</a>
                        <div class="dropdown-menu m-0">
                            <a href="studentlist.php" class="dropdown-item">Performance</a>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                <div class="nav-item dropdown">
                    <a href="#" class="btn btn-primary dropdown-toggle py-2 d-block" data-toggle="dropdown"><?php echo substr($user['STAFF_NAME'], 0, stripos($user['STAFF_NAME'], 'BIN') ? stripos($user['STAFF_NAME'], 'BIN') - 1 : strlen($user['STAFF_NAME']))  ?></a>
                    <div class="dropdown-menu m-0">
                        <a href="mentorpageupdate.php" class="dropdown-item">Edit Profile</a>
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
            <!-- <div class="mx-auto mb-5" style="width: 100%; max-width: 600px;">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-light bg-white text-body px-4 dropdown-toggle" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Services</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Services 1</a>
                            <a class="dropdown-item" href="#">Services 2</a>
                            <a class="dropdown-item" href="#">Services 3</a>
                        </div>
                    </div>
                    <input type="text" class="form-control border-light" style="padding: 30px 25px;" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="btn btn-secondary px-4 px-lg-5">Search</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- Header End -->

    <!-- Body Start -->
    <?php
        // Connect to the database
        include '../db_con.php';
        // Select all rows from the schedule table
        $stud_id = $_GET['id'];
        $query = "SELECT * FROM stud_performance WHERE STUD_ID = '$stud_id' AND STAFF_ID='".$user['STAFF_ID']."'";
        $result = mysqli_query($conn, $query);
    ?>
    <div class=" p-4">
        <div class="text-center mb-3">
            <h1>STUDENT'S GRADE</h1>
        </div>
        <div class="table-responsive mt-1">    
            <table class="table table-bordered text-center text-dark" style="table-layout: fixed;">
                <tr>
                    <th>STUDENT ID</th>
                    <th>COURSE</th>
                    <th>GRADE</th>
                    <th>DESCRIPTION</th>
                </tr>
                <!-- Output the data for each row -->
                <?php 
                    while($row = mysqli_fetch_assoc($result)){
                        $query2 = "SELECT * FROM student WHERE STUD_ID = '".$row['STUD_ID']."'";
                        $result2 = mysqli_query($conn, $query2);
                        $row2 = mysqli_fetch_assoc($result2);

                ?>
                <tr>
                    <td style="word-wrap: break-word"><?php echo $row2['STUD_ID'] ?></td>
                    <td style="word-wrap: break-word"><?php echo $user['COURSE_ID'] ?></td>
                    <td style="word-wrap: break-word"><?php echo $row['GRADE'] ?></td>
                    <td style="word-wrap: break-word"><?php echo $row['GRADE_DESC']?></td>
                </tr>
                <?php } ?>
                <!-- Output an empty row for inserting new data -->
                <tr>
                    <form action="mentor_process/insertperf.php" method="post">
                        <?php
                            $stud_course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM stud_course WHERE STUD_ID ='$stud_id' AND COURSE_ID = '".$user['COURSE_ID']."'"));

                        ?>
                        <td><input type="text" class="form-control" name="studentid" readonly value="<?php echo $stud_course['STUD_ID'] ?>"></td>
                        <input type="hidden" class="form-control" name="staffid" readonly value="<?php echo $user['STAFF_ID'] ?>">
                        <td><input type="text" class="form-control" name="courseid" readonly value="<?php echo $stud_course['COURSE_ID'] ?>"></td>
                        <td><input type="text" class="form-control" name="grade" placeholder="Enter Grade" required></td>
                        <td><input type="text" class="form-control" name="gradedesc" placeholder="Enter Description" required></td>
                    
                    </td>
                </tr>
            </table>
                <div class="text-center">
                    <input type="submit" class="btn btn-primary" name=submit>
                </div>
            </form>
        </div>
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
