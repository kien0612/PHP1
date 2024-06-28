<?php
    include_once 'db.php';

    if ($_GET['pro_id']) {
        $productID = $_GET['pro_id'];
        $sql_deleteProduct = "DELETE FROM products WHERE product_id= $productID";

        $result_deleteProduct = $conn->prepare($sql_deleteProduct);
        if($result_deleteProduct->execute()) {
            header("Location:admin_productList.php");
        } else {
            echo "Không xóa được sản phẩm";
        }
    }else {
        echo "Không tìm thấy sản phẩm";
    }
?>