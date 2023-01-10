<?php
    session_start();
    ob_start();
    $rootPath = '/AssignmentWeb';
    require_once '../db/DB.php';

    if (isset($_POST['key'])) {
        $key = mysqli_real_escape_string($conn, $_POST['key']);
        $sqlSearch = "SELECT * FROM product WHERE product.name LIKE '%$key%' or product.description LIKE '%$key%' lIMIT 4";
        $result = $conn->query($sqlSearch);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div>name:'.$row['name'].'-id:'.$row['product_id'];
            }
        } else {
            echo "No found";
        }

        // echo json_encode(array(
        //     'status' => 'success',
        // ));
    }
?>