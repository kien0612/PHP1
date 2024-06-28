<?php
    require_once 'conn.php';

//     - categories (category_id, category_name)
// - shoes (shoe_id, shoe_name, image, price, category_id)

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM shoes WHERE shoe_id = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header("Location: index.php");
    }
?>