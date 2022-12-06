<?php
session_start();
$rootPath = '/AssignmentWeb/admin/';
if (!isset($_SESSION["email_ad"])) {
    header('location: login.php');
}

$conn = @new mysqli("localhost", "root", "", "assignmentWeb");
if ($conn->connect_error) {
    die("Có lỗi xảy ra". $conn->connect_error);
}

$sqlShowPro = "SELECT * FROM product, category WHERE product.category_id = category.category_id";
$products = $conn->query($sqlShowPro);
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
    require '../includes/header.php';
    require '../includes/navbar.php';
    require '../includes/modal_login.php';
?>

#index quản lý sản phẩm

<div class="container-fluid mt-5 mb-3">
  <div class="row">
    <div class="col-2">
      <a href="./add.php" class="btn btn-primary">Thêm sản phẩm</a>
    </div>
  </div>
</div>
<div class="container-fluid">
    <table class="table table-striped">
      <thead>
        <tr class="table-primary text-center">
          <th scope="col">#ID</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Loại</th>
          <th scope="col">Mô tả sản phẩm</th>
          <th scope="col">Hình sản phẩm</th>
          <th scope="col">Số lượng tồn</th>
          <th scope="col">Giá bán</th>
          <th scope="col">Giá khuyến mãi</th>
          <th scope="col">Timestamp</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <?php
        if ($products->num_rows>0) {
          while ($row = $products->fetch_assoc()) {
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $row["product_id"]?></th>
          <td><?php echo $row["name"]?></td>
          <td><?php echo $row["category_name"]?></td>
          <td><?php echo $row["description"]?></td>
          <td>
            <img src="../../../public/img/products/<?php echo $row["images"]?>" class="img-fluid rounded" alt="">
          </td>
          <td><?php echo $row["quantity"]?></td>
          <td><?php echo $row["price"]?></td>
          <td><?php echo $row["price_sale"]?></td>
          <td><?php echo $row["timestamp"]?></td>
          <td>    
            <a class="text-decoration-none btn btn-success text-light" href="./update.php"><i class="fa-light fa-pen-to-square"></i></a>
            <a class="text-decoration-none btn btn-danger text-light mt-3" href="./delete.php"><i class="fa-light fa-trash-can"></i></a>
          </td>
        </tr>
      </tbody>
      <?php
          };
        }
      ?>
    </table>
</div>

<?php
    require '../includes/footer.php';
?>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>