<?php
$server = 'localhost';
$dbname = 'assignmentWeb';
$user = 'root';
$pass = '';
$conn = new mysqli($server, $user, $pass, $dbname);

$title = $_POST['title'];
$content = $_POST['content'];
$image = $_POST['image'];
$query = "INSERT INTO `post` (title, content, image) VALUES ('" . $title . "', '" . $content . "', '".$image."')";

if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    header('Location: index.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
