<?php
    require_once 'conn.php';
    $sql = "SELECT *FROM image";
    $stmt = $connect->query($sql);
    $img = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ảnh</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>STT</td>
            <td>Ảnh</td>
            <td>
                <a href="add.php">
                    <button>Thêm</button>
                </a>
            </td>
        </tr>
        <?php foreach ($img as $key => $value) { ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td>
                    <img width="100px" src="img/<?= $value['image_name'] ?>" alt="">
                </td>
                <td>
                    <a href="edit.php?id=<?= $value['id_image'] ?>"><button>Sửa</button></a>
                    <a href="delete.php?id=<?= $value['id_image'] ?>"><button>Xóa</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>