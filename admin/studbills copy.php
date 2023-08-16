<?php
    include "../db_con.php";
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
    <link href="../css/style.css" rel="stylesheet">
    
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
                            <a href="studentregist.php" class="dropdown-item">Register Student</a>
                            <a href="mentorregist.php" class="dropdown-item">Register Mentor</a>
                        </div>
                    </div>
                </div>
                <div class="navbar">
                    <div class="nav-item dropdown">
                        <a href="#" class="btn btn-primary dropdown-toggle py-2 px-4" data-toggle="dropdown"><?php echo substr($user['STAFF_NAME'], 0, stripos($user['STAFF_NAME'], 'BIN')-1) ?></a>
                        <div class="dropdown-menu m-0">
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
    $query = "SELECT * FROM invoice";
    $result = mysqli_query($conn, $query);

    
    ?>
    <br>
    <div class="container">
        <div class="text-center">
            <h1>STUDENT BILLS</h1>
        </div>
        <div class="form-group">
            <select onchange="document.location.href='studbills.php?id=' + this.value" class="form-control" name="stud_id">
                <?php
                    echo "<option disabled selected active>--";
                    if(isset($_GET['id'])){
                        $query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID = '".$_GET['id']."'"));
                        echo $query['STUD_NAME'];
                    }
                    else{
                    echo "--Select a student--";
                    }
                    echo "--</option>";
                    $query = mysqli_query($conn, "SELECT * FROM student");
                    while($row = mysqli_fetch_assoc($query)){
                    echo "<option  value='".$row['STUD_ID']."'>".$row['STUD_NAME']."</option>";
                    
                    }
                ?>
            </select>
        </div>
        <table class="table table-bordered text-center">
            <tr>
                <th>STUDENT ID</th>
                <th>STUDENT NAME</th>
                <th>COURSE</th>
                <th>FEE</th>
                <th>DATE</th>
                <th>STATUS</th>
            </tr>
            
            <?php 
                while($row = mysqli_fetch_assoc($result)){

                    $payment = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM payment WHERE PAY_ID = '".$row['PAY_ID']."'"));
                    $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID = '".$row['STUD_ID']."'"));
                    $course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM course WHERE STUD_ID = '".$student['COURSE_ID']."'"));
                    echo "<tr>";
                    echo "<td>".$student['STUD_ID']."</td>";
                    echo "<td>".$student['STUD_NAME']."</td>";
                    echo "<td>".$student['COURSE_ID']."</td>";
                    echo "<td>RM".$course['COURSE_FEE']."</td>";
                    echo "<td>".$payment['PAY_DATE']."</td>";
                    echo "<td>".$payment['PAY_STATUS']."</td>";
                    echo "</tr>";
                }
            ?>
            
            
            
            
                <tr>
                    <form action="studentbillsprocess.php">
                    <?php
                        $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID ='" . $_GET['id'] . "'"));
                        ?>
                    <td><input type="text" class="form-control" name="studentid" readonly value="<?php echo $student['STUD_ID'] ?>"></td>
                    <td><input type="text" class="form-control" name="studentname" readonly value="<?php echo $student['STUD_NAME'] ?>"></td>
                    <td>
                        <select class="form-control">
                            <?php
                            $courseq = (mysqli_query($conn, "SELECT * FROM stud_course WHERE STUD_ID ='" . $_GET['id'] . "'"));
                            while ($row = mysqli_fetch_assoc($courseq)) {
                                $course = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM course WHERE COURSE_ID ='" . $row['COURSE_ID'] . "'"));
                                echo "<option value='" . $course['COURSE_ID'] . "'>" . $course['COURSE_ID'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" name="course_fee" readonly value="<?php echo "RM" . $course['COURSE_FEE'] ?>"></td>
                    <td><input type="date" class="form-control" name="pay_date"></td>
                    <td>
                        <select class="form-control">
                            <option value="Unpaid">Unpaid</option>
                            <option value="Paid">Paid</option>
                        </select>
                    </td>
                </tr>
                
        </table>
            <div class="text-center">
                <input type="submit" class="btn btn-primary text-center">
            </div>
            
            <?php
            ?>
                
            </form>
    </div>

    <?php

        // Close the connection
        mysqli_close($conn);
    ?>
    <!-- Body End -->
    

    <!-- Footer Start -->
    <div class="container-fluid position-relative bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
                    </a>
                    <p class="m-0">An education centre focused on services which enable people to break free from their self-limiting beliefs so that they know how to achieve more while loving themselves and others.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>No. 73 Jalan Budiman 26/17a Taman Mulia, Bandar Tun Razak, 56000 Cheras, Wilayah Persekutuan Kuala Lumpur</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+60 16-223 6859</p>
                    <p><i class="fa fa-envelope mr-2"></i>lahazonehq@gmail.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="https://www.facebook.com/LahazoneEducation/"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="https://my.linkedin.com/company/lahazone"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="https://www.instagram.com/lahazone_edu_services/"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


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
