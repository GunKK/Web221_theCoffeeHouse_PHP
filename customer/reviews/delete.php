<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb/customer';
    require_once '../../db/DB.php';
  
    if (isset($_GET['id'])) {
        settype($_GET['id'], 'int');
        if ($_GET['id'] == 0) header('location: /AssignmentWeb/404.php');
        $reviewId = $_GET['id'];
        $sqlDelete = "DELETE FROM review WHERE review_id = '$reviewId'";
        $conn->query($sqlDelete);
        $conn->close();
        setcookie('thongBao', 'Đã xóa thành công', time()+5);
        header("location: /AssignmentWeb/product.php");
    } else {
        $conn->close();
        header('location: /AssignmentWeb/404.php');
    }
?>