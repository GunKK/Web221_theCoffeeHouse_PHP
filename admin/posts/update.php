<?php
$server = 'localhost';
$dbname = 'assignmentWeb';
$user = 'root';
$pass = '';
$conn = new mysqli($server, $user, $pass, $dbname);
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$image = $_POST['image'];

$query = "UPDATE `post` SET title = '" . $title . "', image = '".$image."', content = '" . $content . "' WHERE post_id=" . $id . ";";
if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: index.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
