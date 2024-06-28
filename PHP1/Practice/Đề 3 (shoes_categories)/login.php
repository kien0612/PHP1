<?php
    session_start();

    unset($_SESSION['login']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if ($user == 'ph31572' && $pass == 'ph31572'){
            $_SESSION['login'] = $user;
            header("Location: index.php");
        }else {
            echo "Tài khoản hoặc mật khẩu không đúng !";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="POST">
        user : <input type="text" name="user"> <br>
        pass : <input type="text" name="pass"> <br>
        <button type="submit">Login</button>
    </form> 
</body>
</html>