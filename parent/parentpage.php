<?php
    include "../db_con.php";
    session_start();
    $sessionId = $_SESSION['par_id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM parent WHERE PAR_ID = '$sessionId' "));
    $par_type = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM stud_par WHERE PAR_ID = '$sessionId' "));
    $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID = '".$par_type['STUD_ID']. "' "));
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
            <a href="studentpage.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="parentpage.php" class="nav-item nav-link">Profile</a>
                    <div class="nav-item dropdown m-0">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Student</a>
                        <div class="dropdown-menu m-0">
                            <a href="studperformance.php" class="dropdown-item">Performance</a>
                            <a href="schedule.php" class="dropdown-item">Schedule</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown m-0">
                        <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">Course</a>
                        <div class="dropdown-menu m-0">
                            <a href="coursedetail.php" class="dropdown-item active">Course Detail</a>
                        </div>
                    </div>
                    <a href="transaction.php" class="nav-item nav-link">Payment</a>
                </div>
                <div class="navbar">
                    <div class="nav-item dropdown">
                    <a href="#" class="btn btn-primary dropdown-toggle py-2 px-4" data-toggle="dropdown"><?php echo ucfirst(strtolower(substr($user['PAR_NAME'], 0, stripos($user['PAR_NAME'], 'BIN')-1)))  ?></a>
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
    <div class="container-fluid bg-primary-300 p-5" style="opacity: 1">
        <div class="student-profile py-4">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                        <div class="card-header bg-transparent text-center">
                        <?php
                                $img = $user['PAR_IMG'];
                        ?>
                            <?php 
                                if(isset($img)){
                                    echo "<img src='../img/parent/".$img."' class='profile_img' alt='profile image'>";
                                }
                                else
                                    echo "No image";
                                  
                            ?>    
                        </div>
                        <div class="card-body text-center">
                            <h3><?php echo ucwords(strtolower($user['PAR_NAME']))  ?></h3>
                        </div>
                        </div>
                    <br>
                    </div>
                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Parent Information</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Parent Name</th>
                                    <td width="2%">:</td>
                                    <td><?php echo ucwords(strtolower($user['PAR_NAME'])) ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Parent Id</th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($user['PAR_ID']) ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Phone Number</th>
                                    <td width="2%">:</td>
                                    <td><?php echo strtoupper($user['PAR_PHONE']) ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Parent Email</th>
                                    <td width="2%">:</td>
                                    <td><?php echo ucwords($user['PAR_EMAIL']) ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Parent Job</th>
                                    <td width="2%">:</td>
                                    <td><?php echo ucwords($user['PAR_JOB']) ?></td>
                                </tr>
                                </table>
                                <br>
                            </div>
                        </div>
                        <br>
                        <?php
                            $sql = mysqli_query($conn, "SELECT * FROM stud_par WHERE PAR_ID = '".$user['PAR_ID']."'");
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $stud = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID = '".$row['STUD_ID']."'"));
                            ?>
                        <div class="card shadow-sm">
                            <div class="card-header bg-transparent border-0">
                                <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Student Information</h3>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table table-bordered">
                                <tr>
                                    <th width="30%">Student Name</th>
                                    <td width="2%">:</td>
                                    <td><?php echo ucwords(strtolower($stud['STUD_NAME'])) ?></td> 
                                    <!-- echo isset($father['PAR_NAME']) ? ucfirst($father['PAR_NAME']) : ""; -->
                                </tr>
                                <tr>
                                    <th width="30%">Student ID</th>
                                    <td width="2%">:</td>
                                    <td><?php echo ucwords($stud['STUD_ID']) ?></td>
                                </tr>
                                <tr>
                                    <th width="30%">Student Place of Education</th>
                                    <td width="2%">:</td>
                                    <td><?php echo ucwords(($stud['STUD_EDU_NAME'])) ?></td>
                                </tr>
                                </table>
                            </div>
                        </div>
                        <br>
                        <?php
                        }
                        ?>

                        <div class="d-flex justify-content-center" >
                            <a href="parentpageupdate.php" class="btn btn-primary mx-auto" style="color: white; font-weight: 500;">Update</a>
                        </div>
                    </div>
                    
                    </div>
                </div>
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
