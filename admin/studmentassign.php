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

<body>
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
    <div class="jumbotron jumbotron-fluid jumbotron-sm position-relative" style="margin-bottom: 0px ">
        <div class="container text-center">
            <h1 class="text-white display-1 mb-5">Pusat Latihan Lahazone</h1>
        </div>
    </div>
    <!-- Header End -->

    <!-- Body Start -->
    <br>
    <div class="container">
        <div class="text-center">
                <h1>STUDENT LIST</h1>
        </div>

        <form>
            <div class="form-group">
                <input type="text" class="form-control" id="search" onkeyup="searchStudent()" placeholder="Search Student by IC Number">
            </div>
        </form>

        <div id="student-table">
        <?php
            // Connect to the database
            include '../db_con.php';

            // Check the connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Select all rows from the "students" table
            $sql = "SELECT * FROM stud_mentor";
            $result = mysqli_query($conn, $sql);

            echo '<table class="table table-bordered text-center ">';
            echo '<tr>';
            echo '<th>STUDENT ID</th>';
            echo '<th>MENTOR ID</th>';
            echo '<th>ACTION</th>';
            echo '</tr>';

            // Fetch the rows one by one
            while ($row = mysqli_fetch_assoc($result)) {
                $student = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM student WHERE STUD_ID='" . $row['STUD_ID'] . "'"));
                $mentor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM staff WHERE STAFF_ID='" . $row['STAFF_ID'] . "'"));
                echo '<tr>';
                echo '<td>' . $student['STUD_ID'] . '</td>';
                echo '<td>' . $mentor['STAFF_ID'] . '</td>';
                echo '<td><a href="admin_process/studassigndelete.php?id='. $student['STUD_ID'] .'&&id2='. $mentor['STAFF_ID'].'">Delete</a></td>';
                echo '</tr>';
            }
            ?>
            <tr>
                <form action="admin_process/assignprocess.php" method="post">
                    <td>
                        <select class="form-control text-center" name="studentid">
                        <?php 
                            $student = (mysqli_query($conn, "SELECT * FROM stud_course"));
                            while($row=mysqli_fetch_assoc($student)){
                                echo "<option value='".$row['STUD_ID']."'>".$row['STUD_ID']." - ".$row['COURSE_ID']."</option>";
                            } 
                        ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control text-center" name="mentorid">
                        <?php 
                            $mentor = (mysqli_query($conn, "SELECT * FROM staff"));
                            while($row=mysqli_fetch_assoc($mentor)){
                                echo "<option value='".$row['STAFF_ID']."'>".$row['STAFF_ID']." - ".$row['COURSE_ID']."</option>";
                            } 
                        ?>
                        </select>
                    </td>
                    <td><input type="submit" class="form-control btn-primary" value="Submit"></td>
                </form>
            </tr>
            </table>
        </div>


        <script>
            function searchStudent() {
                // Get the input value
                var input, filter, studentTable, tr, td, i, txtValue;
                input = document.getElementById("search");
                filter = input.value.toUpperCase();
                studentTable = document.getElementById("student-table");
                tr = studentTable.getElementsByTagName("tr");

                // Loop through all table rows, and hide those who don't match the search query
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                        tr[i].style.display = "none";
                        }
                    }
                }
            }
            </script>
            <?php
            // Close the connection
                mysqli_close($conn);
            ?>
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
