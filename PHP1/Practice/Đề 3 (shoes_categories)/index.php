<?php
    session_start();
    require_once 'conn.php';

//     - categories (category_id, category_name)
// - shoes (shoe_id, shoe_name, image, price, category_id)

    $sql = "SELECT s.* , c.category_name FROM shoes s INNER JOIN categories c ON s.category_id = c.category_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $shoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_SESSION['login'])){
        $user = $_SESSION['login'];
        echo 'Xin chào' . $user;
    }else {
        header("Location: login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <table border="1">
        <tr>
            <th>shoe_id</th>
            <th>shoe_name</th>
            <th>image</th>
            <th>price</th>
            <th>category_id</th>
            <th>
                <a href="add.php"><button>Add</button></a>
            </th>
        </tr>
        <?php foreach ($shoes as $key => $s) { ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $s['shoe_name'] ?></td>
                <td>
                    <img width="100px" src="img/<?= $s['image'] ?>" alt="">
                </td>
                <td><?= $s['price'] ?></td>
                <td><?= $s['category_id'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $s['shoe_id'] ?>"><button>Edit</button></a>
                    <a onclick="return confirm('Xóa dòng này ?')" href="delete.php?id=<?= $s['shoe_id'] ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="login.php"><button>Sign out</button></a>
</body>
</html>