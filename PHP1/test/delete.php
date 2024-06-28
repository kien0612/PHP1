<?php
    session_start();
    require_once 'conn.php';

    // if (isset($_GET['id'])){
    //     $id = $_GET['id'];
    if (isset($_SESSION['login']['delete'])){
        $id = $_SESSION['login']['delete'];
        $sql = "DELETE FROM nhanVien WHERE id_nhanVien = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header('Location: index.php');
    }
?>