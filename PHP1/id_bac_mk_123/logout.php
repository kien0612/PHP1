<?php
    session_start();
    $_SESSION['isLogin'] = 0;

    header('Location:homepage.php');
?>