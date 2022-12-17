<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb/customer';
    require_once '../../db/DB.php'; 

    if (isset($_POST['review'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);
        $productId = mysqli_real_escape_string($conn, $_POST['productId']);
        $sqlInsert = "INSERT INTO review (title, content, user_id, product_id) VALUES ('$title', '$content', '$userId', '$productId')";
        $conn->query($sqlInsert);
        $conn->close();
        header("location: /AssignmentWeb/product.php");
    } else {
        $conn->close();
        header('location: /AssignmentWeb/404.php');
    }
?>