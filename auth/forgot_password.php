<?php
    ob_start();
    session_start();
    $rootPath = '/AssignmentWeb';
    
    require_once '../db/DB.php';
    require_once '../PHPMailer/src/Exception.php';
    require_once '../PHPMailer/src/PHPMailer.php';
    require_once '../PHPMailer/src/SMTP.php';
    include_once '../helper/sendMail.php';

    if (isset($_POST['send'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if ($email !='') {
            $sqlFind = "SELECT * FROM user WHERE email = '$email'";
            $result = $conn->query($sqlFind);
            if ($result->num_rows > 0) {
                $name = $result->fetch_array()['name']; 
                $password = uniqid();
                $hashPassword = md5($password);
                $updatePassword = "UPDATE user SET password = '$hashPassword' WHERE email = '$email'";
                $conn->query($updatePassword);
                // send mail
                $receiver = [
                    'email'=> $email,
                    'name'=> $name,
                    'password'=> $password  
                ];
                resetPassword($mail, $receiver);
                $_SESSION['success'] = 'Mật khẩu mới đã gửi về email, vui lòng đăng nhập lại';        
                header('location: ../customer/login.php');
            } else {
                $error = 'Email vừa nhập chưa đăng kí tài khoản';
            }
        } else {
            $error = 'Vui lòng nhập email';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <?php
            if(isset($error)) {
        ?>
        <div class="row mt-5 mb-5">
            <div class="col">
                <div class="alert alert-danger">
                    <?=$error?>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
                    <div class="mb-2">
                        <label for="email" class="form-label"><b>Mời nhập email</b></label>
                        <input type="text" id="email" class="form-control" name="email">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Gửi" name="send">
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>