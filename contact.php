<?php
session_start();
ob_start();
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
    <link rel="stylesheet" href="./public/css/contact.css">
</head>
<body>
<?php
    require './includes/header.php';
    require './includes/navbar.php';
?>
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contact Us</h1>
        <p>
            Should you have any inquiries into our business, drop a message, here.
        </p>
    </div>
</div>
<!-- start contact page -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" action="" method="post" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="contactName">Name</label>
                    <input type="text" class="form-control mt-1" id="contactName" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="contactEmail">Email</label>
                    <input type="email" class="form-control mt-1" id="contactEmail" name="email" placeholder=" Enter your email">
                </div>
            </div>
            <div class="mb-3">
                <label for="contactMessage">Message</label>
                <textarea class="form-control mt-1" id="contactMessage" name="message" placeholder="Message" rows="8"></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3 contact-btn">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- end contact page -->

<?php
    require './includes/modal_login.php'
?>

<?php
    require './includes/footer.php';
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>