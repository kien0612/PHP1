<?php
    include_once 'db.php';

    if ($_GET['product_cateID']) {
        $product_cateID = $_GET['product_cateID'];

        // Delete product in cate
        $sql_deleteProductInCate = "DELETE FROM products WHERE product_cateID=$product_cateID";
        $result_deleteProductInCate = $conn->prepare($sql_deleteProductInCate);
        if($result_deleteProductInCate->execute()) {
            echo "Đã xóa sản phẩm trong danh mục";
        }

        // Delete cate
        $sql_deleteCate = "DELETE FROM product_cate WHERE product_cateID=$product_cateID";
        $result_deleteCate = $conn->prepare($sql_deleteCate);
        if($result_deleteCate->execute()) {
            header("Location:admin_cateList.php");
        } else {
            echo "Không xóa được danh mục";
        }
    }else {
        echo "Không tìm thấy danh mục";
    }
?>