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

<body >
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
    <div class="jumbotron jumbotron-fluid jumbotron-sm position-relative mb-0">
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

    <!-- Register From Start -->
    <div class="container-fluid bg-primary-300 px-5">
        <div class="container border-dark" style="color: black">
            <form action="admin_process/mentorregistprocess.php" method="POST">
                <div class="main-form-label text-center pt-5">
                    <h1 class="main-text-label">STUDENT FORM</h1>
                </div>
                <center><p class="p-3">Please fill in this form to create an account.</p></center>
                <hr>
                <div class="form-group">
                    <label for="Name"><b>Full Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter Fullname" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="Username"><b>Username</b></label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="username" id="username" required>
                </div>
                <div class="form-group">
                    <label for="IC"><b>IC Number</b></label>
                    <input type="text" class="form-control" placeholder="Enter Username" name="icnumber" id="icnumber" required>
                </div>
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
                </div>
                <div class="form-group">
                    <label for="phone"><b>Phone Number</b></label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Address</b></label>
                    <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="tcourse"><b>Teaching Course</b></label>
                    <select class="form-control" name="tcourse" required>
                        <option disabled selected>-- Select an option --</option>
                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM course");
                        {
                            while($row = mysqli_fetch_assoc($sql)){
                                echo '<option value="' . $row['COURSE_ID'] . '">' . $row['COURSE_ID'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                
                <hr>
                <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
                <div class="d-flex align-items-center pb-5">
                    <button type="submit" class="btn btn-primary mx-auto">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register From End -->

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