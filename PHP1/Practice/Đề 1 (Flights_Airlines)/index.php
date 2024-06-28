<?php
    require 'connection.php';

    $sql = "SELECT f.*, a.airline_name FROM flights f INNER JOIN airlines a ON f.airline_id = a.airline_id";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // print_r($flights);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách chuyến bay</title>
</head>
<body>
    <h2>Danh sách chuyến bay</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Số hiệu</th>
            <th>Hình ảnh</th>
            <th>Hành khách</th>
            <th>Mô tả</th>
            <th>Mã hàng không</th>
            <th>
                <a href="add.php"><button>Thêm</button></a>
            </th>
        </tr>
        <?php foreach ($flights as $flight) { ?>
            <tr>
                <td><?= $flight['flight_id'] ?></td>
                <td><?= $flight['flight_number'] ?></td>
                <td>
                    <img width="100px" src="img/<?= $flight['image'] ?>" alt="">
                </td>
                <td><?= $flight['total_passengers'] ?></td>
                <td><?= $flight['description'] ?></td>
                <td><?= $flight['airline_id'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $flight['flight_id'] ?>"><button>Sửa</button></a>
                    <a onclick="return confirm('Xóa ?')" href="delete.php?id=<?= $flight['flight_id'] ?>"><button>Xóa</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>