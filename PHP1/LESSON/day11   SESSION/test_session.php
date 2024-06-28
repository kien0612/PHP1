<?php
    session_start();
    if (isset($_SESSION['username'])){
        // Lấy giá trị từ trên session xuống
        $user = $_SESSION['username'];
        echo "Xin chào, $user";
    }else if (isset($_SESSION['err'])){
        $err = $_SESSION['err'];
        echo $err;
    }
?>

