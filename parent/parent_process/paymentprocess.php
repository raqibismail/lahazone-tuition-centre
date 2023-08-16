<?php
    include "../../db_con.php";

    // Check if form is submitted
    if(isset($_POST['submit'])){

        // Retrieve form values
        $paymentId = $_POST['paymentId'];
        $paymentFee = $_POST['paymentFee'];
        $paymentDate = $_POST['paymentDate'];
        $paymentStatus = $_POST['paymentStatus'];
        $paymentType = $_POST['paymentType'];
        $cardNumber = $_POST['cardNumber'];
        $expirationDate = $_POST['expirationDate'];
        $cvv = $_POST['cvv'];
        $onlineBankingInfo = $_POST['onlineBankingInfo'];
        $date = DateTime::createFromFormat("d.m.Y", $paymentDate);
        $formattedDate = $date->format("Y-m-d");


        // Perform form validation
        if(empty($paymentId) || empty($paymentFee) || empty($paymentDate) || empty($paymentStatus) || empty($paymentType)){
            echo "<script>alert('Please fill in all required fields.')</script>";
            echo "<script>window.location.href='../paymentpage.php?id=".$paymentId."'</script>";
        }
        else{
            // Check if payment type is debit/credit card
            if($paymentType == "Debit/Credit Card"){
                if(empty($cardNumber) || empty($expirationDate) || empty($cvv)){
                    echo "<script>alert('Please fill in cards information fields.')</script>";
                    echo "<script>window.location.href='../paymentpage.php?id=".$paymentId."'</script>";
                }
                else{   
                    // Insert debit/credit card payment information into database
                    $paymentStatus = "Paid";
                    $date = DateTime::createFromFormat("d.m.Y", $paymentDate);
                    $formattedDate = $date->format("Y-m-d");
                    $sql = mysqli_query($conn, "UPDATE payment SET PAY_STATUS = '$paymentStatus', PAY_DATE = '$formattedDate' WHERE PAY_ID = '$paymentId'");
                    echo "<script>setTimeout(function(){alert('Debit/credit card payment information is being processed.');}, 4000);</script>";
                    echo "<script>alert('Debit/credit card payment information has been processed.');</script>";
                    echo "<script>window.location.href='../transaction.php'</script>";
                }
            }
            // Check if payment type is online banking
            else if($paymentType == "Online Banking"){
                if(empty($onlineBankingInfo)){
                    echo "<script>alert('Please fill in online banking information fields.')</script>";
                    echo "<script>window.location.href='../paymentpage.php?id=".$paymentId."'</script>";
                }
                else{
                    $paymentStatus = "Paid";
                    $date = DateTime::createFromFormat("d.m.Y", $paymentDate);
                    $formattedDate = $date->format("Y-m-d");
                    $sql = mysqli_query($conn, "UPDATE payment SET PAY_STATUS = '$paymentStatus', PAY_DATE = '$formattedDate' WHERE PAY_ID = '$paymentId'");
                    echo "<script>setTimeout(function(){alert('Online banking information is being processed.');}, 4000);</script>";
                    echo "<script>alert('Online banking information has been processed.');</script>";
                    echo "<script>window.location.href='../transaction.php'</script>";
                }
            }
        }
    }
else
    {
        echo "<script>alert('Error: Form not submitted.');</script>";
        echo "<script>window.location.href='../paymentpage.php?id=". $paymentId . "'</script>";
    }

?>