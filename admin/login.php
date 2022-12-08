<?php
session_start();
ob_start();
$rootPath = '/AssignmentWeb/admin';
$conn = @new mysqli("localhost", "root", "", "assignmentWeb");
if ($conn->connect_error) {
    die("có lôi xảy ra".$conn->connect_error);
} 

$sql = "SELECT email, password FROM admin";
$ketqua = $conn->query($sql);
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
  </head>
<body>
<?php
    require './includes/header.php';
    // require $rootPath.'/includes/navbar.php';
?>

<?php
$tb = '';
$email ='';
$password ='';
if (isset($_POST['login_ad'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = md5($password);
    while ($row = $ketqua->fetch_assoc()) {
        if($row["email"] == $email && $row["password"] == $hash_password) {
            $_SESSION["email_ad"] = $email;
            header('location: index.php');
            break;
        }
        else $tb = 'Sai email hoặc mật khẩu'; 
    }
}
?>
<div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col-lg-12 col-xl-11">
    <div class="card-body p-md-5">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

          <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login Admin</p>
          <form class="mx-1 mx-md-4" action="<?php echo $_SERVER['PHP_SELF']?>" accept-charset="UTF-8" method="post">
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-envelope"></i></span>
                <input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email">
              </div>
            </div>
            <div class="d-flex flex-row align-items-center mb-4">
              <div class="input-group flex-nowrap">
                <span class="input-group-text"><i class="fa-light fa-key"></i></span>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Password">
              </div>
            </div>
                <?php 
                    if(!empty($tb)) {
                        echo '<div class="alert alert-danger">'.$tb. '</div>';
                    }
                ?>
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" name="login_ad" value="Login" class="btn btn-primary" data-disable-with="Create account" />
            </div>
        </form>        
    </div>
        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-content-center order-1 order-lg-2">
          <img class="img-fluid rounded w-75" alt="Login image" src="./assets/img/logo.jpg" />
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