<?php
session_start();
$rootPath = '/AssignmentWeb/admin';
if (!isset($_SESSION["email_ad"])) {
    header('location: login.php');
}
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
    <link rel="stylesheet" href="./includes/css/base.css">
    <link rel="stylesheet" href="./includes/css/home.css">
</head>
<body>
<?php
    require './includes/header.php';
    require './includes/navbar.php';
?>

#index admin
<?php
  require './includes/footer.php';
?>
<!-- modal change password -->
<!-- <div class="modal fade" id="change_pwd_ad" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-duotone fa-key-skeleton"></i> Thay đổi mật khẩu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="./change_password.php" method="post" enctype="multipart/form-data">
                <div class="h4 text-dark">Mời nhập mật khẩu mới</div>
                <div class="d-flex flex-row align-items-around mb-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                        <input type="password" class="form-control" name="pwd_ad" placeholder="Enter new password">
                    </div>
                </div>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-success" name="update_pwd_ad">Thay đổi</button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>