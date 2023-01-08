<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb';
    require_once '../db/DB.php';

    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
        $totalBill = 0;
?>

<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <div class="col-xl-9 col-md-8 col-sm-12">
            <table class="table">
                <thead>
                    <tr class="table-warning">
                        <th scope="col">Sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($_SESSION['cart'] as $key => $value) {
                    ?>
                    <tr>
                        <td scope="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-3 d-none d-xl-block d-xxl-none">
                                        <img src="<?php echo $rootPath?>/public/img/products/<?php echo $value['img']?>" alt="abc" class="img-fluid rounded">
                                    </div>
                                    <div class="col-xl-9">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p><?php echo $value['name']?></p>
                                            <p>Mã sản phẩm: <strong>#<?php echo $value['id']?></strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td> &emsp; &emsp; &emsp; <?php echo number_format($value['price'])?> <sup>đ</sup></td>
                        <td class="align-middle">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-secondary btn-sm ms-1" onclick="subCartQty(<?=$value['id']?>)">-</button>
                                <button class="btn btn-light disabled"><?=$value['quantity']?></button>
                                <button class="btn btn-secondary btn-sm me-1" onclick="addCartQty(<?=$value['id']?>)">+</button>
                            </div>
                        </td>
                        <td class="text-danger">&emsp; &emsp; &emsp; <strong><?php echo number_format($value['price']*$value['quantity'])?> <sup>đ</sup></strong></td>
                        <td>
                            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                            <!-- <a href="<?php echo $rootPath?>/process_cart.php?action=delete&id=<?php echo $value['id']?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a> -->
                            <button class="btn btn-danger" onclick="deleteCartItem(<?=$value['id']?>)"><i class="fa-solid fa-trash-can"></i></button>
                        </td>
                    </tr>
                    <?php
                        $totalBill += $value['price']*$value['quantity'];
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-12">
            <div class="container shadow-sm p-3 mb-5 bg-body rounded">
                <div class="row">
                    <table class="table">
                        <tr>
                            <td>Tổng tiền</td>
                            <td class="d-flex justify-content-end"><strong><?php echo number_format($totalBill)?> <sup>đ</sup></strong></td>
                        </tr>
                        <tr>
                            <td>Giảm giá</td>
                            <td class="d-flex justify-content-end"><strong>0 <sup>đ</sup></strong></td>
                        </tr>
                        <tr>
                            <td>Thành tiền</td>
                            <td class="text-danger d-flex justify-content-end"><strong> <?php echo number_format($totalBill)?> <sup>đ</sup></strong></td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <a href="<?php echo $rootPath?>/customer/check_out.php" class="btn btn-primary"><strong>Đặt hàng</strong></a>
                    <a href="<?php echo $rootPath?>/product.php" class="btn btn-outline-warning mt-2">Tiếp tục mua hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    } else {
?>
    <div class="container pt-5 pb-5">
        <div class="row mb-2">
            <div class="alert alert-warning">
                <span class="h4"> <i class="fa-light fa-face-smile"></i> Giỏ hàng trống! Vui lòng thêm sản phẩm</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-3 col-sm-6 mx-auto">
                <a href="<?php echo $rootPath?>/product.php" class="btn btn-primary">Trở về trang sản phẩm</a>
            </div>
        </div>
    </div>

<?php
    }
?>