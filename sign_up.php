<?php
$rootPath = '/AssignmentWeb';
$conn = @new mysqli("localhost", "root", "", "assignmentWeb");
$conn->error;
if ($conn->error) {
    die('Kết nối thất bại'.$conn->error);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng kí tài khoản</p>
          <form class="mx-1 mx-md-4" action="" accept-charset="UTF-8" method="post"><input type="hidden" name="authenticity_token" value="8Fbe9hfBpqPx_ZXk5jR5LonDJ4lV50D91z39EZ8jJnh7iC7OsaO3pW-TdTF4w0Wo26rlq0fKTCbtgw8ETwu1NQ" autocomplete="off" />
            
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username">
              </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                <input type="text" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-phone"></i></span>
                <input type="text" class="form-control" placeholder="Phone">
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-house"></i></span>
                <input type="text" class="form-control" placeholder="Address">
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                <input type="text" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                <input type="text" class="form-control" placeholder="Re-Password">
              </div>
            </div>
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" name="register" value="Register" class="btn btn-primary btn-lg" data-disable-with="Create account" />
            </div>
</form>        </div>
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