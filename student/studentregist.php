<?php
include '../db_con.php';
$course = mysqli_query($conn, "SELECT * FROM course");
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

<body style="background: whitesmoke;">
    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-2">
            <a href="index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>Lahazone</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="../index.php" class="nav-item nav-link active">Home</a>
                    <a href="../contact.php" class="nav-item nav-link">Contact</a>
                    <!-- <div class="nav-item dropdown m-0">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Course</a>
                        <div class="dropdown-menu m-0">
                            <a href="coursedetail.php" class="dropdown-item">Course Detail</a>
                            <a href="detail.html" class="dropdown-item">Payment</a>
                        </div>
                    </div> -->
                </div>
            </div>
                <div class="navbar">
                    <div class="nav">
                        <a href="../userlogintype.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Login</a>
                        <a href="../userregisttype.php" class="btn btn-primary py-2 px-4 d-none d-lg-block ">Register</a>
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

    <!-- Register From Start -->
    <div class="container-fluid bg-primary-300 p-5">
        <div class="container border-dark" style="color: black">
            <form action="registprocess.php" method="POST">
                <div class="main-form-label text-center">
                    <h1 class="main-text-label">STUDENT FORM</h1>
                </div>
                <center><p class="p-3">Please fill in this form to create an account.</p></center>
                <hr>
                <div class="form-group">
                    <h3>Student Information</h3>
                </div>
                <div class="form-group">
                    <label for="Name"><b>Full Name:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Fullname" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="IC"><b>IC Number:</b></label>
                    <input type="text" class="form-control" placeholder="Enter IC Number" name="icnumber" id="icnumber" required>
                </div>
                <div class="form-group">
                    <label for="email"><b>Email:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="psw"><b>Password:</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
                </div>
                <div class="form-group">
                    <label for="phone"><b>Phone Number:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" id="phone" required>
                </div>
                <div class="form-group">
                    <label for="education"><b>Place of Education:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Place of Education" name="edu" id="edu" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Address:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="tcourse"><b>Course</b></label>
                    <select class="form-control" name="course" required>
                        <?php
                            echo "<option disabled selected>-- Select an option --</option>";
                            while($row=mysqli_fetch_assoc($course)){
                                echo "<option value='".$row['COURSE_ID']."'>".$row['COURSE_NAME']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <br>
                <hr>
                <br>
                <div class="form-group">
                    <h3>Father Information</h3>
                </div>
                <div class="form-group">
                    <label for="address"><b>Father's Name:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Father Name" name="fname" id="fname" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Father's IC:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Father IC" name="fic" id="fic" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Father's Phone:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Father Phone" name="fphone" id="fphone" required>
                </div>
                <br>
                <hr>
                <br>
                <div class="form-group">
                    <h3>Mother Information</h3>
                </div>
                <div class="form-group">
                    <label for="address"><b>Mother's Name:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Mother Name" name="mname" id="mname" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Mother's IC:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Mother IC" name="mic" id="mic" required>
                </div>
                <div class="form-group">
                    <label for="address"><b>Mother's Phone:</b></label>
                    <input type="text" class="form-control" placeholder="Enter Mother Phone" name="mphone" id="mphone" required>
                </div>

                
                <hr>
                <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary mx-auto">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Register From End -->




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


































