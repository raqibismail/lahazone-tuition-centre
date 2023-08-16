
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

<body style="padding-bottom: 0;">
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

    <!-- Feature Start -->
    <div class="container-fluid bg-image">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 my-5 pt-5 pb-lg-5">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Why Choose Us?</h6>
                        <h1 class="display-4">Who Are We?</h1>
                    </div>
                    <p class="mb-4 pb-2">An education centre focused on services which enable people to break free from their self-limiting beliefs so that they know how to achieve more while loving themselves and others.</p>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-primary mr-4">
                            <i class="fa fa-2x fa-graduation-cap text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Mentoring</h4>
                            <p>Mentoring in a small group setting can be a powerful tool for learning as they can foster a sense of community and collaboration among the mentees.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-secondary mr-4">
                            <i class="fa fa-2x fa-certificate text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Holistic Approach</h4>
                            <p>Guiding students in various aspect of life to secure students future achievements for themself and others.</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-book-reader text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Hybrid Learning</h4>
                            <p class="m-0">Students can attend class in-person while others also can join virtually from home. We teach remote and in-person students at the same time using tools like zoom and google classroom.​</p>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="btn-icon bg-warning mr-4">
                            <i class="fa fa-2x fa-hard-hat text-white"></i>
                        </div>
                        <div class="mt-n1">
                            <h4>Periodic Workshop</h4>
                            <p class="m-0">Students join our weekly workshop with a limited number of student only.​</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/feature.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature Start -->

    <!-- Testimonial Start -->
    <div class="container-fluid bg-image py-5" style="margin: 90px 0;">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Testimonial</h6>
                        <h1 class="display-4">What Say Our Cutomers</h1>
                    </div>
                    <p class="m-0">Our customers have had great things to say about their experience with our tuition centre. Here are just a few of the testimonials we've received</p>
                </div>
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Hantarlah anak tuan puan untuk mengikuti kelas PT3 yang dikendalikan oleh Lahazone Education kerana guru-gurunya berkualiti dan sentiasa mendapat maklumat terkini daripada saya.</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <div>
                                    <h5>Cikgu Ghalib Yunus</h5>
                                    <span>Mantan Munsyi Dewan Bahasa dan Pustaka</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Saya dapati gaya pengajaran guru-guru yang mengajar di Lahazone ini lebih dekat dengan pelajar sebab kadang-kadang saya tengok anak saya gembira , kadang gelak, maksudnya tidak stress.</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <div>
                                    <h5>Cikgu Nurhaiza​</h5>
                                    <span>Kaunselor SMK Cheras</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-5">
                            <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                            <p>Saya syukur kenal Coach Neez yang banyak pengalaman. Saya google cari pusat tuition, alhamdulillah jumpa Lahazone yang saya dengar guru-gurunya bersemangat. Kalau ginilah cara mengajar memang tak mengantuk dan lebih minat.</p>
                            <div class="d-flex flex-shrink-0 align-items-center mt-4">
                                <div>
                                    <h5>Dr Noraini​</h5>
                                    <span>Ibu kapada Afif</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-primary mr-4">
                                <i class="fa fa-2x fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">No. 73 Jalan Budiman 26/17a Taman Mulia, Bandar Tun Razak, 56000 Cheras, Wilayah Persekutuan Kuala Lumpur</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                <i class="fa fa-2x fa-phone-alt text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Call Us</h4>
                                <p class="m-0">+60 16-223 6859</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                <i class="fa fa-2x fa-envelope text-white"></i>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <p class="m-0">lahazonehq@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title position-relative mb-4">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>
                        <h1 class="display-4">Send Us A Message</h1>
                    </div>
                    <div class="contact-form">
                        <form action='index.php'>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" required="required">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


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