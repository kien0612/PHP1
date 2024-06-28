<?php
    // echo 'File xóa';

    require 'connection.php';



    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql_delete = "DELETE FROM user where id = '$id'";
        $stmt_delete = $connect->prepare($sql_delete);
        $stmt_delete->execute();
        
        header('Location: index.php');
    }
?>