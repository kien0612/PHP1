<?php
    // session_start();
//     require_once 'conn.php';

//     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//         $user = $_POST['user'];
//         $pass = $_POST['pass'];
//         if ($user == 'longlhph31572' && $pass == 123){
//             setcookie('login', $user, time() + 10);
//             header('Location: index.php');
//         }else {
//             $err = "Tài khoản hoặc mật khẩu không đúng !";
//         }
//     }
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <span style="color: red"><?= isset($err) ? $err : '' ?></span>
    <form action="" method="POST">
        User : <input type="text" name="user"> <br>
        Pass : <input type="text" name="pass"> <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>