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
    <title>Cửa hàng Coffee</title>
    <link rel="stylesheet"  href="https://site-assets.fontawesome.com/releases/v6.1.2/css/all.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/base.css">
    <!-- <link rel="stylesheet" href="./public/css/home.css"> -->
</head>
<body>
<?php
    require './includes/header.php';
    require './includes/navbar.php';
?>

<div id="template-mo-zay-hero-carousel" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 d-flex align-items-center">
                        <a href="#"><img class="img-fluid rounded" src="./public/img/carousels/carousel1.jpeg" style="height: 390px;"/></a>
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center" style="height: 300px;">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-warning"><strong>TheCoffee-shop</strong> eCommerce</h1>
                            <div class="h2">Chất lượng - giá cả hợp lý</div>
                            <p>
                                Giá tốt - giao hàng - bảo hành toàn quốc 
                                Trải rộng khắp cả nước với khoảng hơn <strong>100</strong> cửa hàng bán lẻ trên toàn quốc.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 d-flex align-items-center">
                        <a href="#"><img class="img-fluid rounded" src="./public/img/carousels/carousel2.jpeg" style="height: 390px;"/></a>
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center" style="height: 300px";>
                        <div class="text-align-left">
                            <h1 class="h1 text-warning">Tự tin với chất lượng</h1>
                            <h3 class="h2">Nâng cao chất lượng Cafe ngang tầm quốc tế</h3>
                            <p>
                                <strong>TheCoffee-shop</strong> công bố sở hữu vùng nguyên liệu nguyên liệu có chất lượng quốc tế.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 d-flex align-items-center">
                        <a href="#"><img class="img-fluid rounded" src="./public/img/carousels/carousel3.jpeg" style="height: 390px;" /></a>
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center" style="height: 300px;">
                        <div class="text-align-left">
                            <h1 class="h1 text-warning">Đa dạng hóa sản phẩm</h1>
                            <h3 class="h2">Phương châm "vì sức khỏe cộng đồng"</h3>
                            <p>
                                Hội thảo chuyên đề về ngành sữa Việt Nam với chủ đề: “Phát triển và đa dạng hóa sản phẩm”
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-warning bg-opacity-10 pt-5 pb-5">
    <!-- team member -->
    <div class="container mb-5">
        <div class="row text-center mb-2">
            <div class="h2 text-warning">MEMBER</div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="text-center">
                    <a href="#"><img alt="AVT" width="200" height="200" src="<?php echo $rootPath?>/public/img/profile1.jpg" class="rounded-circle mb-3 mt-3" /></a>
                    <p class="text-dark">Nguyễn Đức Hậu</p>
                    <!-- <a class="btn btn-primary text-light" href="#">Contact</a> -->
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="text-center">
                    <a href="#"><img alt="AVT" width="200" height="200" src="<?php echo $rootPath?>/public/img/profile2.jpeg" class="rounded-circle mb-3 mt-3" /></a>
                    <p class="text-dark">Trần Thế Quang</p>
                    <!-- <a class="btn btn-primary text-light" href="#">Contact</a> -->
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="text-center">
                    <a href="#"><img alt="AVT" width="200" height="200" src="<?php echo $rootPath?>/public/img/profile2.jpeg"" class="rounded-circle mb-3 mt-3" /></a>
                    <p class="text-dark">Võ Trịnh Xuân Nguyên</p>
                    <!-- <a class="btn btn-primary text-light" href="#">Contact</a> -->
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="text-center">
                    <a href="#"><img alt="AVT" width="200" height="200" src="<?php echo $rootPath?>/public/img/profile4.jpg" class="rounded-circle mb-3 mt-3" /></a>
                    <p class="text-dark">Lý Gia Huy</p>
                    <!-- <a class="btn btn-primary text-light" href="#">Contact</a> -->
                </div>
            </div>
        </div>
    </div>

    <!-- best seller -->
    <div class="container mb-5">
        <div class="row text-center">
            <div class="h3 text-warning mb-2">BEST SELLER OF THE MONTH</div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="text-center">
                    <a href="#"><img alt="topProduct" width="200" src="./public/img/products/banhKimQuat.jpg" class="rounded-circle mb-3 mt-3 border border-2" /></a>
                    <p class="h4 text-dark">Bánh mì Kim Quất</p>
                    <a class="btn btn-success btn-lg" href="#">Buy Now</a>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="text-center">
                    <a href="#"><img alt="topProduct" width="200" src="./public/img/products/banhMiVN.jpg" class="rounded-circle mb-3 mt-3 border border-2" /></a>
                    <p class="h4 text-dark">Bánh mì VN</p>
                    <a class="btn btn-success btn-lg" href="#">Buy Now</a>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="text-center">
                    <a href="#"><img alt="topProduct" width="200" src="./public/img/products/coffeeBacSiu.jpg" class="rounded-circle mb-3 mt-3 border border-2" /></a>
                    <p class="h4 text-dark">Bạc sỉu</p>
                    <a class="btn btn-success btn-lg" href="#">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    $sqlShowProducts = "SELECT product_id, name, quantity, images, price, price_sale FROM product";
    $categoryId = '';
    if (isset($_POST['search_btn'])) {
        $categoryId = $_POST['categoryId'];
        $sqlShowProducts = "SELECT product_id, name, quantity, images, price, price_sale FROM product WHERE category_id = '$categoryId'";
    }
    $products = $conn->query($sqlShowProducts); 
    $totalProducts = $products->num_rows;
    $currentPage = 1;
    if (isset($_GET['page'])) {
        settype($_GET['page'], 'int'); // tránh injection, trang tự về 0
        $currentPage = $_GET['page'];
    }
    $limit = 8;
    $totalPage = ceil($totalProducts/$limit);

    // giới hạn phân trang trong 1-totalPage
    if($currentPage > $totalPage) {
        $currentPage = $totalPage;
    } elseif ($currentPage < 1) { 
        $currentPage = 1;
    }

    $start = ($currentPage - 1)*$limit;
    // $sqlShowProducts = "SELECT product_id, name, quantity, images, price, price_sale FROM product LIMIT $start, $limit";
    $sqlShowProducts = $sqlShowProducts." LIMIT $start, $limit";
    $products = $conn->query($sqlShowProducts); 
?>

<?php
    require './includes/footer.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="./public/javascripts/loadCartHeader.js"></script>

<script>
    $(document).ready(function() {
        loadCartAjax();

        $(window).scroll(function(){
            if($(this).scrollTop()>114){
            $("#navbar-top").addClass('fix-nav')
            }else{
                $("#navbar-top").removeClass('fix-nav')
            }}
        )
    });
</script>
<script src="./public/javascripts/liveSearch.js"></script>

</body>
</html>