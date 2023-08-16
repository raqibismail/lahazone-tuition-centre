<?php
    include "../db_con.php";
    session_start();
    $sessionId = $_SESSION['par_id'];
    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM parent WHERE PAR_ID = '$sessionId' "));
    $par_type = mysqli_fetch_assoc(mysqli_query($conn, "SELECT PAR_TYPE FROM stud_par WHERE PAR_ID = '$sessionId' "));
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
                            <form action="parent_process/pfpupload.php" method="post" enctype="multipart/form-data">
                                    <input type="file" class="file-control-file" id="file" name="file">
                                    <input type="submit" class="btn btn-primary" value="Upload">
                            </form>     
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
                            <form method="POST" action="parent_process/updateprofile.php">
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="30%">Parent Name</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="parname" value="<?php echo ucwords(strtolower($user['PAR_NAME'])) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Parent ID</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="parid" value="<?php echo ucwords(strtolower($user['PAR_ID'])) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Parent Phone Number</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="parphone" value="<?php echo strtoupper($user['PAR_PHONE']) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Parent Email</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="paremail" value="<?php echo ucwords($user['PAR_EMAIL']) ?>"></td>
                                    </tr>
                                    <tr>
                                        <th width="30%">Parent Job</th>
                                        <td width="2%">:</td>
                                        <td><input type="text" class="form-control" name="parjob" value="<?php echo ucwords($user['PAR_JOB']) ?>"></td>
                                    </tr>
                                </table>
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
