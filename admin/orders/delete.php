<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb/admin';
    require_once '../../db/DB.php';
  
    if (isset($_GET['id'])) {
        settype($_GET['id'], 'int');
        if ($_GET['id'] == 0) header('location: ../../404.php');
        $orderId = $_GET['id'];
        $sqlDelete = "DELETE FROM `assignmentweb`.`order` WHERE order_id = '$orderId'";
        $conn->query($sqlDelete);
        $conn->close();
        setcookie('thongBao', 'Đã xóa thành công', time()+5);
        header("location: index.php");
    } else {
        $conn->close();
        header('location: ../../404.php');
    }
?>