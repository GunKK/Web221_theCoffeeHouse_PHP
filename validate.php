<?php
function validateEmail($email) {
    $error = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ."; 
    }
    return $error;
}

function validatePhone($phone) {
    $error = "";
    if (!preg_match("/^[0-9]{10}/", $phone)) {
        $error = "Số điện thoại phải bao gồm 10 chữ số.";
    }
    return $error;
}

function validatePassword($password) {
    $error = "";
    if (!preg_match("/#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#/", $password)) {
        $error = "Mật khẩu phải gồm ít nhất 8 kí kự và phải chứa ít nhất 1 chữ số, 1 chữ viết hoa, 1 chữ viết thường, 1 kí tự đặc biệt.";
    } 
    return $error;
}

function validateURL($url) {
    $error = "";
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)) {
        $error = "URL không hợp lệ.";
    }
    return $error;
}

function checkPassword($password1, $password2)
{
    $error = "";
    if ($password1 != $password2) {
        $error = "Mật khẩu không khớp.";
    }
    return $error;
}
?>