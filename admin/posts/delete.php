<?php
session_start();
$id = $_POST['id'];

$server = 'localhost';
$dbname = 'assignmentWeb';
$user = 'root';
$pass = '';
$conn = new mysqli($server, $user, $pass, $dbname);
$query = "DELETE FROM `post` WHERE post_id='" . $id . "'";


if ($conn->query($query) === TRUE) {
    echo "Successfully";
    header('Location: index.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
