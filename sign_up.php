<?php
$rootPath = '/AssignmentWeb';
$conn = @new mysqli("localhost", "root", "", "assignmentWeb");
$conn->error;
if ($conn->error) {
    die('Kết nối thất bại'.$conn->error);
}
?>

<?php
    require("./validate.php");
    $status = "";
    if (isset($_POST['register'])) {
        $is_validated = true;
        $errorEmail = $errorPhone = $errorPassword = $errorRePassword = "";
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $re_password = mysqli_real_escape_string($conn, $_POST['re_password']);
        
        if (checkEmailExist($email) != ""){
          $is_validated = false;
          $errorEmail = checkEmailExist($email);
        }
        if (validateEmail($email) != "") {
          $is_validated = false;
          $errorEmail = validateEmail($email);
        }
        if (validatePhone($phone) != "") {
          $is_validated = false;
          $errorPhone = validatePhone($phone);
        }
        if (validatePassword($password) != "") {
          $is_validated = false;
          $errorPassword = validatePassword($password);
        }
        if (checkPassword($password, $re_password) != "") {
          $is_validated = false;
          $errorRePassword = "Nhập mật khẩu lần 2 không khớp.";
        }
        if ($is_validated) {
          $password = md5($password);
          $sql = "INSERT INTO user (name, email, phone, address, password) VALUES ('$name', '$email', '$phone', '$address', '$password')";
          
          if ($conn->query($sql) === TRUE) {
              // echo "Resgiter user successfully";
              // header("Location: ./customer/login.php");
              $status = "Đăng kí tài khoản thành công.";
          } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }   
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet"  href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/base.css">
    <link rel="stylesheet" href="./public/css/home.css">
  </head>
<body>
<?php
    require './includes/header.php';
    require './includes/navbar.php';
?>

<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col-lg-12 col-xl-11">
    <div class="card-body p-md-5">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

          <p class="text-center h1 fw-bold mx-1 mx-md-4 mt-4">Đăng kí tài khoản</p>
          <?php
            if ($status != "") {
              echo '<div class="alert alert-success" role="alert">
                '.$status.'<a href="./customer/login.php">Đăng nhập ngay</a>
              </div>';
            }
          ?>
          
          <form class="mx-1 mx-md-4" action="" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="8Fbe9hfBpqPx_ZXk5jR5LonDJ4lV50D91z39EZ8jJnh7iC7OsaO3pW-TdTF4w0Wo26rlq0fKTCbtgw8ETwu1NQ" autocomplete="off" />
            
            <div class="d-flex flex-row align-items-center mb-2">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-user"></i></span>
                <input type="text" name="name"  class="form-control" placeholder="Username" value='<?php echo $name?>'>
              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-1">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                <input type="text" name="email" class="form-control" placeholder="Email" value='<?php echo $email?>'>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
              <div id="emailHelpBlock" class="form-text text-danger">
                <?php echo $errorEmail ?>
              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-1">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
                <input type="text" name="phone" class="form-control" placeholder="Phone" value='<?php echo $phone?>'>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
                <div id="phoneHelpBlock" class="form-text text-danger">
                  <?php echo $errorPhone ?>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-house"></i></span>
                <input type="text" name="address" class="form-control" placeholder="Address" value='<?php echo $address?>'>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-2">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Password" value='<?php echo $password?>'>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
                <div id="passwordHelpBlock" class="form-text text-danger">
                  <?php echo $errorPassword ?>
                </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                <input type="password" name="re_password" class="form-control" placeholder="Re-Password" value='<?php echo $re_password?>'>
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-1">
                <div id="rePasswordHelpBlock" class="form-text text-danger">
                  <?php echo $errorRePassword ?>
                </div>
            </div>
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg" data-disable-with="Create account" />
            </div>

          </form>        
        </div>
        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-center order-1 order-lg-2">
          <img class="img-fluid rounded w-75" alt="Signup image" src="<?php echo $rootPath;?>/public/img/signup_img.png" />
        </div>
      </div>
    </div>
  </div>
</div>
<?php
    require './includes/footer.php';
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>