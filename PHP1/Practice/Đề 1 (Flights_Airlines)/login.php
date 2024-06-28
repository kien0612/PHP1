<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'longlhph31572' && $password == 'longlhph31572'){
            setcookie('Login', 'Thành công', time() + 3600);
            header('Location: index.php');
        }else {
            $err = 'Tài khoản hoặc mật khẩu không đúng !';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="POST">
        Username : <input type="text" name="username">
        Password : <input type="password" name="password">
        <button type="submit">Login</button>
    </form>
    <span style="color: red;"><?= isset($err) ? $err : ''?></span>
</body>
</html>