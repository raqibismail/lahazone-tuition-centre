<?php
    include "../db_con.php";
    session_start();
    $sessionId = $_SESSION['par_id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM parent WHERE PAR_ID = '$sessionId' "));
    $par_type = mysqli_query($conn, "SELECT * FROM stud_par WHERE PAR_ID = '$sessionId' ");
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
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="background-color: #FAF9F6">
                    <div class="card-header text-center text-dark font-weight-bold">
                        Payment Information
                    </div>
                    <?php
                    
                    ?>
                    <div class="card-body">
                        <form action="student_process/paymentprocess.php" method="post">
                            <?php
                                $query = "SELECT * FROM stud_course WHERE STUD_ID = '".$user['STUD_ID']."'";
                                $result = mysqli_query($conn, $query);
                                $totalfee = 0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $sql = "SELECT COURSE_FEE FROM course WHERE COURSE_ID='".$row['COURSE_ID']."'";
                                    $fee = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                    $totalfee = $fee['COURSE_FEE'] + $totalfee; 
                                }
                            ?>
                            <div class="form-group">
                                <label class="text-dark font-weight-bold" for="courseName">Student Name</label>
                                <div class="form-control text-black"><?php echo $user['STUD_NAME'] ?></div>
                                <input type="hidden" class="form-control" id="studName" name="studName" readonly value="<?php echo $user['STUD_NAME'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-dark font-weight-bold" for="courseID">Student ID</label>
                                <div class="form-control text-black" id="studName"> <?php echo $user['STUD_ID'] ?> </div>
                                <input type="hidden" class="form-control" id="studID" name="studID" readonly value="<?php echo $user['STUD_ID'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-dark font-weight-bold" for="courseFee">Course Fee</label>
                                <div class="form-control text-black"> <?php echo "RM".$totalfee ?> </div>
                                <input type="hidden" class="form-control" name="courseFee" id="courseFee" readonly value="<?php echo $totalfee ?>">
                            </div>
                            <div class="form-group">
                                <label class="text-dark font-weight-bold" for="paymentDate">Date</label>
                                <div class="form-control text-black"> <?php echo date('Y-m-d'); ?> </div>
                                <input type="hidden" class="form-control" name="paymentDate" id="paymentDate" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="form-group text-black">
                                <label class="text-dark font-weight-bold">Payment Type</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentType" id="VISA" value="VISA" checked>
                                    <label class="form-check-label" for="VISA">VISA</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentType" id="Mastercard" value="Mastercard">
                                    <label class="form-check-label" for="Mastercard">Mastercard</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentType" id="Online banking" value="Online banking">
                                    <label class="form-check-label" for="Online banking">Online banking</label>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Submit Payment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
