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
    <div class="container">
        <div class="text-center pt-4">
            <h1>PAYMENT PAGE</h1>
        </div>
        <?php
        $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM payment WHERE PAY_ID = '" . $_GET['id'] . "'"));
        $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM invoice WHERE PAY_ID = '" . $_GET['id'] . "'"));

        ?>
            <div class="form p-5 text-dark" style=" background-color: whitesmoke;">
                <form action="student_process/paymentprocess.php" method="POST">
                    <div class="form-group">
                        <label for="paymentId">Payment Id:</label>
                        <input type="text" class="form-control" id="paymentId" name="paymentId" readonly value="<?php echo $sql['PAY_ID'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="paymentFee">Payment Fee:</label>
                        <input type="text" class="form-control" id="paymentFee" name="paymentFee" readonly value="<?php echo "RM".$sql['PAY_FEE'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="paymentDate">Payment Date:</label>
                        <input type="text" class="form-control" id="paymentDate" name="paymentDate" readonly value="<?php echo (new DateTime())->format('d.m.Y')?>">
                    </div>
                    <div class="form-group">
                        <label for="paymentStatus">Payment Status:</label>
                        <input type="text" class="form-control" id="paymentStatus" name="paymentStatus" readonly value="<?php echo $sql['PAY_STATUS'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="paymentType">Payment Type:</label>
                        <select class="form-control" id="paymentType" name="paymentType" onchange="showHideFields()">
                            <option>--Select a Payment Option--</option>
                            <option>Debit/Credit Card</option>
                            <option>Online Banking</option>
                        </select>
                    </div>
                    <div class="form-group card-fields" style="display: none;">
                        <label for="cardNumber">Card Number:</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                    </div>
                    <div class="form-group row card-fields" style="display: none;">
                        <div class="col-6">
                            <label for="expirationDate">Expiration Date:</label>
                            <input type="month" class="form-control" id="expirationDate" name="expirationDate">
                        </div>
                        <div class="col-6">
                            <label for="cvv">CVV:</label>
                            <input type="text" class="form-control " id="cvv" name="cvv">
                        </div>
                    </div>
                    <div class="form-group online-banking-fields" style="display: none;">
                        <label for="onlineBankingInfo">Online Banking Information:</label>
                        <input type="text" class="form-control" id="onlineBankingInfo" name="onlineBankingInfo">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit Payment</button>    
                    </div>
                </form>
            </div>            
                
    </div>

    <script>
    function showHideFields() {
        var paymentType = document.getElementById("paymentType").value;
        var cardFields = document.getElementsByClassName("card-fields");
        var onlineBankingFields = document.getElementsByClassName("online-banking-fields");
        if (paymentType === "Debit/Credit Card") {
            for (var i = 0; i < cardFields.length; i++) {
                cardFields[i].style.display = "block";
            }
            for (var i = 0; i < onlineBankingFields.length; i++) {
                onlineBankingFields[i].style.display = "none";
            }
        } else if (paymentType === "Online Banking") {
            for (var i = 0; i < cardFields.length; i++) {
                cardFields[i].style.display = "none";
            }
            for (var i = 0; i < onlineBankingFields.length; i++) {
                onlineBankingFields[i].style.display = "block";
            }
        } else {
            for (var i = 0; i < cardFields.length; i++) {
                cardFields[i].style.display = "none";
            }
            for (var i = 0; i < onlineBankingFields.length; i++) {
                onlineBankingFields[i].style.display = "none";
            }
            }
        }
    </script>

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
