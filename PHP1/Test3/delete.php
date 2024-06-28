<?php
session_start();
require_once 'conn.php';

    if (isset($_SESSION['login']['delete'])){
        $id = $_SESSION['login']['delete'];
        $sql_delete = "DELETE FROM nhanVien WHERE id_nhanVien = '$id'";
        $stmt_delete = $conn->prepare($sql_delete);
        $stmt_delete->execute();
        header("location: index.php");
    }
?>