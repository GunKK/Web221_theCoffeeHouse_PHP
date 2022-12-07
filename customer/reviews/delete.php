<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb/customer';
    $conn = @new mysqli("localhost", "root", "", "assignmentWeb");
    if ($conn->connect_error) {
        die("có lôi xảy ra".$conn->connect_error);
    } 
  
    if (isset($_POST['delete'])) {
        $sqlDelete = "DELETE FROM review ";
        $conn->query($sqlInsert);
        $conn->close();
        header("location: /AssignmentWeb/product.php");
    } else {
        $conn->close();
        header('location: /AssignmentWeb/404.php');
    }
?>