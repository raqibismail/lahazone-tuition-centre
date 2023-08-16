
<?php 
    if(isset($_SESSION))
    {
    session_start();
    }
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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="holistic.php" class="nav-item nav-link">Holistic Mentoring</a>
                    <a href="workshop.php" class="nav-item nav-link">Workshop</a>
                    <a href="cambridge.php" class="nav-item nav-link">Cambridge</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="navbar-nav">
                        <a href="userlogintype.php" class="btn btn-primary py-2 px-4">Login</a>
                </div>    
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid position-relative">
        <div class="container text-center">
            <h1 class="text-white mt-4 mb-4">Welcome to Lahazone Education</h1>
            <h1 class="text-white display-1 mb-5">Program Mentoring Holistik</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Workshop</h6>
                        <h1 class="display-4">Our Workshop</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="Services-list-item position-relative d-block overflow-hidden mb-2" href="https://lahazone.onpay.my/">
                        <img class="img" src="img/workshop/JADUAL-SPM-SINGLE-BI-KHAMIS.png" style="width: 400px; height: 400px; object-fit: fill;">
                        <div class="Services-text mt-3">
                            <h4 class="text-center text-black px-3">Final Battle Final Lap </h4>
                            <h6 class="text-center text-black px-3">Perbincangan Soalan Ramalan Bahasa Inggeris SPM</h6>
                            <div class="border-top w-100 mt-3">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="Services-list-item position-relative d-block overflow-hidden mb-2" href="https://lahazone.onpay.my/">
                        <img class="img" src="img/workshop/JADUAL-SPM-SINGLE-BM-ISNIN.png" style="width: 400px; height: 400px; object-fit: fill;">
                        <div class="Services-text mt-3">
                        <h4 class="text-center text-black px-3">Final Battle Final Lap </h4>
                            <h6 class="text-center text-black px-3">Perbincangan Soalan Ramalan Bahasa Melayu SPM</h6>
                            <div class="border-top w-100 mt-3">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 pb-4">
                    <a class="Services-list-item position-relative d-block overflow-hidden mb-2" href="https://lahazone.onpay.my/">
                        <img class="img-fluid" src="img/workshop/JADUAL-SPM-SINGLE-MATHS-RABU.png" style="width: 400px; height: 400px; object-fit: fill;">
                        <div class="Services-text mt-3">
                            <h4 class="text-center text-black px-3">Final Battle Final Lap </h4>
                            <h6 class="text-center text-black px-3">Perbincangan Soalan Ramalan Mathematics SPM</h6>
                            <div class="border-top w-100 mt-3">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="https://lahazone.onpay.my/" class="btn btn-primary">See More</a>
    </div>
    <!-- Services End -->

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