<?php
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM image WHERE id_image = '$id'";
        $stmt = $connect->query($sql);
        header("index.php");
    }
?>