<?php
session_start();
ob_start();
$rootPath = '/AssignmentWeb';
require_once './db/DB.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức</title>
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

<?php
    $id = $_GET['postId'];
    $sqlShowPost = "SELECT * FROM post WHERE post_id=$id";
    
    $post= $conn->query($sqlShowPost);
    $row = $post->fetch_assoc();
?>

<div class="container-fluid bg-light p-xxl-5 p-md-3">
    <div class="col-lg-8 col-md-10 m-auto text-center py-5 px-3" style="box-shadow: 0 10px 20px rgb(0 0 0 / 10%);">
        <h1 class="h1"><?php echo $row['title'];?></h1>
        <img src="<?php echo $row['image']?>" alt="" style="width: 90%;">
        <p class="text-start mt-5 px-3">
            <?php echo $row['content'];?>
        </p>
    </div>
</div>


<?php
    require './includes/footer.php';
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>