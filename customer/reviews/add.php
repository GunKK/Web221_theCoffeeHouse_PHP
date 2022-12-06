<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb/customer';
    $conn = @new mysqli("localhost", "root", "", "assignmentWeb");
    if ($conn->connect_error) {
        die("có lôi xảy ra".$conn->connect_error);
    } 

    if (isset($_POST['review'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $userId = mysqli_real_escape_string($conn, $_POST['userId']);
        $productId = mysqli_real_escape_string($conn, $_POST['productId']);
        $sqlInsert = "INSERT INTO review (title, content, user_id, product_id) VALUES ('$title', '$content', '$userId', '$productId')";
        $conn->query($sqlInsert);
        header("location: /AssignmentWeb/product.php");
    } else {
        header('location: /AssignmentWeb/404.php');
    }
?>