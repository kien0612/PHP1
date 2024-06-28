<?php
    session_start();

    if (isset($_GET['delete'])){
        $id_delete = $_GET['delete'];
        echo 'delete';
    }

    if (isset($_GET['edit'])){
        $id_edit = $_GET['edit'];
        echo 'edit';
    }

    if (isset($_GET['add'])){
        $id_add = $_GET['add'];
        echo 'add';
    }
    // unset($_COOKIE['success']);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if ($user == 'longlhph31572' && $pass == 'longlhph31572'){
            setcookie('success', $user, time() + 20);
            if (isset($id_delete)){
                $_SESSION['login']['delete'] = $id_delete;
                header("Location: delete.php");
            }
            else if (isset($id_edit)){
                $_SESSION['login']['edit'] = $id_edit;
                header("Location: edit.php");
            }
            else if (isset($id_add)){
                header("Location: add.php");
            }
            else {
                unset($_SESSION['login']);
                header("Location: index.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
</head>
<body>
    <?php if (isset($_COOKIE['outtime'])){ ?>
        <script>
            alert("Phiên đăng nhập của bạn đã hết !")
        </script>
    <?php } ?>
    <h2>Quản trị</h2>
    <form action="" method="POST">
        <div class="input">
            <label for="">User :</label>
            <input type="text" name="user">
        </div>
        <div class="input">
            <label for="">Password :</label>
            <input type="text" name="pass">
        </div>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>