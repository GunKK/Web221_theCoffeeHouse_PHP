<?php
session_start();
ob_start();
unset($_SESSION["email_ad"]);
unset($_SESSION["pwd_ad"]);
header('location: login.php');
?>