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

    <div class="student-profile py-4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                        <?php
                                $img = $user['STUD_IMG'];
                        ?>
                            <?php 
                                if(isset($img)){
                                    echo "<img src='../img/".$img."' class='profile_img' alt='profile image'>";
                                }
                                else
                                    echo "No image";
                                  
                            ?>
                            <form action="student_process/pfpupload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" class="file-control-file" id="file" name="file">
                                    <input type="submit" class="btn btn-primary" value="Upload">
                            </form>     
                        </div>
                        <div class="card-body text-center">
                            <h3><?php echo substr($user['STUD_NAME'], 0, stripos($user['STUD_NAME'], 'BIN')-1)  ?></h3>
                        </div>
                        </div>
                    <br>
                    </div>
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Information</h3>
                        </div>
                        <div class="card-body pt-0">
                            <form method="POST" action="student_process/updateprofile.php">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Name</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="name" value="<?php echo ucfirst($user['STUD_NAME']) ?>"></td>
                                        <input type="hidden" name="studentid" value="<?php echo $user['STUD_ID'] ?>">
                                    </tr>
                                    <tr>
                                        <th width="30%">Phone Number</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="phone" value="<?php echo ucfirst($user['STUD_PHONE']) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Address</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="address" value="<?php echo ucfirst($user['STUD_ADDRESS']) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Place of Education</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="edu" value="<?php echo ucfirst($user['STUD_EDU_NAME']) ?>"></td>
                                    </tr>
                                </table>
                                <br>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Name</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="fname" value="<?php echo ucfirst($father['PAR_NAME']) ?>"></td>
                                        <input type="hidden" name="fid" value="<?php echo $father['PAR_ID'] ?>">
                                    </tr>
                                    <tr>
                                        <th width="30%">Phone Number</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="fphone" value="<?php echo ucfirst($father['PAR_PHONE']) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Email</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="femail" value="<?php echo ucfirst($father['PAR_EMAIL']) ?>"></td>
                                    </tr>
                                </table>
                                <br>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Name</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="mname" value="<?php echo ucfirst($mother['PAR_NAME']) ?>"></td>
                                        <input type="hidden" name="mid" value="<?php echo $mother['PAR_ID'] ?>">
                                    </tr>
                                    <tr>
                                        <th width="30%">Phone Number</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="mphone" value="<?php echo ucfirst($mother['PAR_PHONE']) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Email</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="memail" value="<?php echo ucfirst($mother['PAR_EMAIL']) ?>"></td>
                                    </tr>
                                </table>     
                                <br>
                                <div class="d-flex justify-content-center" >
                                    <input type="submit" class="btn btn-primary mx-auto" value="Confirm">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
        </div>

    <!-- Footer Start -->
    <div class="container-fluid position-relative bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
                    </a>
                    <p class="m-0">Accusam nonumy clita sed rebum kasd eirmod elitr. Ipsum ea lorem at et diam est, tempor rebum ipsum sit ea tempor stet et consetetur dolores. Justo stet diam ipsum lorem vero clita diam</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Newsletter</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;" placeholder="Your Email Address">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h3 class="text-white mb-4">Get In Touch</h3>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                    <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                    <div class="d-flex justify-content-start mt-4">
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
                        <a class="text-white mr-4" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                        <a class="text-white" href="#"><i class="fab fa-2x fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">Your Site Name</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Designed by <a class="text-white" href="https://htmlcodex.com">HTML Codex</a>
                    </p>
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
