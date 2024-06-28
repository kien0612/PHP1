<?php
    session_start();
    require_once 'conn.php';

    $_SESSION['login'] = [];

    if (isset($_GET['add'])){
        echo "add";
        $id_add = $_GET['add'];
    }
    if (isset($_GET['edit'])){
        echo "edit";
        $id_edit = $_GET['edit'];
    }
    if (isset($_GET['delete'])){
        echo "delete";
        $id_delete = $_GET['delete'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        if ($user == 'ph31572' && $pass == 'ph31572'){
            setcookie('login', $user, time() + 20);

            if (isset($id_add)){
                header("Location: add.php");
            }
            else if (isset($id_edit)){
                $_SESSION['login']['edit'] = $id_edit;
                header("Location: edit.php");
            }
            else if (isset($id_delete)){
                $_SESSION['login']['delete'] = $id_delete;
                header("Location: delete.php");
            }else {
                header("Location: index.php");
            }
        }else {
            echo 'Tk hoặc mk không đúng !';
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <?php if (isset($_COOKIE['timeout'])) { ?>
        <script>
            alert('Đăng nhập hết hạn')
        </script>
    <?php } ?>
    <h2>Đăng nhập</h2>
    <form action="" method="POST">
        user : <input type="text" name="user"> <br>
        pass : <input type="text" name="pass"> <br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>