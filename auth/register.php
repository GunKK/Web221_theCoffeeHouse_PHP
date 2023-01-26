<?php
    ob_start();
    session_start();
    $rootPath = '/AssignmentWeb';
    
    require_once '../db/DB.php';
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
    } else {
        header('location: ../404.php');
    }

    if (isset($_POST['verify'])) {
        if (isset($_POST['verifyCode']) && !empty($_POST['verifyCode'])) {

            $verifyCode = mysqli_escape_string($conn, $_POST['verifyCode']);
            $sqlFindCode = "SELECT verify_code FROM user WHERE email = '$email'";
            $result = $conn->query($sqlFindCode)->fetch_array();
            $code = $result['verify_code'];
            if ($code == $verifyCode) {
                // setcookie('success', 'Đăng kí thành công, vui lòng đăng nhập lại', time()+5);    
                // echo $_COOKIE['success'];
                $sqlUpdate = "UPDATE user SET active = 1 WHERE email = '$email'";
                $conn->query($sqlUpdate);
                $_SESSION['success'] = 'Đăng kí thành công, vui lòng đăng nhập lại';        
                header('location: ../customer/login.php');
            } else {
                $error = 'Mã xác thực không trùng khớp, vui lòng nhập lại !';
            }
        } else {
            $error = 'Vui lòng nhập các trường còn thiếu';
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
                <form action="<?=$_SERVER['PHP_SELF']?>?email=<?=$email?>" method="POST">
                    <div class="mb-2">
                        <label for="verify-code" class="form-label"><b>Mã xác thực</b></label>
                        <input type="number" id="verify-code" class="form-control" name="verifyCode">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="Xác nhận" name="verify">
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="alert alert-success text-center">Mã xác thực đã được gửi về email</div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>