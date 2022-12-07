<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb/customer';
    $conn = @new mysqli("localhost", "root", "", "assignmentWeb");
    if ($conn->connect_error) {
        die("có lôi xảy ra".$conn->connect_error);
    } 
  
    if (isset($_GET['delete']) && isset($_GET['id'])) {
        settype($_GET['id'], 'int');
        if ($_GET['id'] == 0) header('location: /AssignmentWeb/404.php');
        $reviewId = $_GET['id'];
        $sqlDelete = "DELETE FROM review WHERE review_id = '$reviewId'";
        $conn->query($sqlInsert);
        $conn->close();
        header("location: /AssignmentWeb/product.php");
    } else {
        $conn->close();
        header('location: /AssignmentWeb/404.php');
    }
?>