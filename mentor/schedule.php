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
        $query = "SELECT * FROM schedule WHERE STAFF_ID= '" . $user['STAFF_ID'] . "'";
        $result = mysqli_query($conn, $query);

    ?>
    <div class="container-fluid"  style="width: 75%;">
        <div class="text-center p-3 mt-2">
            <h1>SCHEDULE</h1>
        </div> 
        <div class="table-responsive">    
            <table class="table table-bordered text-center text-dark text-nowrap">
                <tr>
                    <th>Staff ID</th>
                    <th>Course ID</th>
                    <th>Class ID</th>
                    <th>Class Attendance</th>
                    <th>Class Date</th>
                    <th>Class Time</th>
                    <th>Action</th>
                </tr>
                <!-- Output the data for each row -->
                <?php while ($row = mysqli_fetch_assoc($result)) { 
                    $query2 = "SELECT * FROM class WHERE CLASS_ID = '" . $row['CLASS_ID'] . "'";
                    $result2 = mysqli_query($conn, $query2);
                    $row2 = mysqli_fetch_assoc($result2); 
                ?>
                <tr>
                    <td style="word-wrap: break-word"><?php echo $user['STAFF_ID'] ?></td>
                    <td style="word-wrap: break-word"><?php echo $row['COURSE_ID'] ?></td>
                    <td style="word-wrap: break-word"><?php echo $row['CLASS_ID'] . " - " . $row2['CLASS_NAME']?></td>
                    <td style="word-wrap: break-word"><a href="<?php echo $row['CLASS_ATTAND'] ?>"><?php echo $row['CLASS_ATTAND'] ?></a></td>
                    <td style="word-wrap: break-word"><?php echo $row['CLASS_DATE'] ?></td>
                    <td style="word-wrap: break-word"><?php echo $row['CLASS_TIME'] ?></td>
                    <td style="word-wrap: break-word">
                        <a href='admin_process/scheduledelete.php?id=<?php echo $row['CLASS_DATE']?>&&id2=<?php echo $row['CLASS_TIME']?>&&id3=<?php echo $row['CLASS_ID']?>'>Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <!-- Output an empty row for inserting new data -->
                <tr>
                    <form action='mentor_process/scheduleinsert.php' method='post'>
                    <td>
                        <input class="form-control" type='text' name='staff_id' readonly value=<?php echo $user['STAFF_ID'] ?>>
                    </td>
                    <td>
                        <input class="form-control" type='text' name='course_id' readonly value=<?php echo $user['COURSE_ID'] ?>>
                    </td>
                    <td>
                        <select class="form-control" name="class_id" required>
                            <option disabled>Select an option</option>
                            <option value="A001">A001 - Al-Fatih</option>
                            <option value="B001">B001 - Al-Biruni</option>
                        </select>
                    </td>
                    <td>
                        <input class="form-control" type='text' name='class_attand'>
                    </td>
                    <td>
                        <input class="form-control" type='date' name='class_date'>
                    </td>
                    <td>
                        <select class="form-control" name="class_time" required>
                                <option disabled selected>Select Time</option>
                                <option value="8:00am-10:00am">8:00am-10:00am</option>
                                <option value="10:00am-12:00pm">10:00am-12:00pm</option>
                                <option value="2:00pm-4:00pm">2:00pm-4:00pm</option>
                                <option value="4:00pm-6:00pm">4:00pm-6:00pm</option>
                                <option value="8:00pm-10:00pm">8:00pm-10:00pm</option>
                            </select>
                    </td>
                    <td>
                        <input type='submit' class="form-control btn-primary" value='Insert'>
                    </td>
                    </form>
                </tr>
            </table>
        </div>
    </div>

    <?php

        // Close the connection
        mysqli_close($conn);
    ?>
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
