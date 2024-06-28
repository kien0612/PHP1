<?php
    require 'connection.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $sql = "DELETE FROM flights WHERE flight_id = '$id'";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    setcookie('success', 'Thành công', time() + 1);
    header('Location: index.php');