<?php
session_start();
require 'sql.php';
// Truy vấn dữ liệu bảng
$sql_student = 'SELECT * FROM students';

// Lấy toàn bộ dữ liệu bảng
$students = $connect->query($sql_student)->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: 0.3s ease;
        }

        table {
            border: 1px solid rgba(85, 85, 85, 0.5);
        }

        tr td:first-child,
        tr th:first-child {
            width: 80px;
        }

        tr td:nth-child(3),
        tr th:nth-child(3) {
            width: 80px;
        }

        th,
        td {
            width: 200px;
            height: 50px;
            text-align: center;
            border: 1px solid rgba(85, 85, 85, 0.2);
        }

        tr:nth-child(2n-1) {
            background-color: rgba(85, 85, 85, 0.15);
        }

        th {
            color: white;
            background-color: #353535;
        }

        button {
            width: 50px;
            height: 50px;
            margin: 3%;
            border: none;
            color: white;
            background-color: #ff9c00;
            font-size: 15px;
        }

        .remove {
            background-color: #353539;
        }

        .remove:hover {
            background-color: red;
        }

        button:hover {
            background-color: rgba(85, 85, 85, 0.9);
        }

        .add ,
        .delete_all {
            width: 120px;
            height: 50px;
            margin: 0;
        }

        .delete_all {
            background-color: red;
        }

        .add {
            background-color: green;
        }
    </style>
</head>

<body style="padding: 3% 15%; height: 100vh; width: 100%; display: flex; justify-content: start; align-items: center; flex-direction: column; text-align: center;">
    <h1>Danh sách sinh viên</h1><br><br>
    <div style="width: 100%; text-align: left; margin-bottom: 1%">

        <?php if (isset($_SESSION['success']['add'])) { ?>
            <?php unset ($_SESSION['success']['add']) ?>
            <script>
                alert('Thêm thành công')
            </script>
        <?php } ?>

        <?php if (isset($_SESSION['success']['edit'])) { ?>
            <?php unset ($_SESSION['success']['edit']) ?>
            <script>
                alert('Sửa thành công')
            </script>
        <?php } ?>

        <h3 style="text-align: left"><?php echo '<i class="fa-solid fa-user"></i>  '. count($students); ?></h3>
    </div>
    <table border="0" style="width: 100%;">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Mô tả sinh viên</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
        <?php
        if (empty($students)) {
            echo "<tr><td colspan='7'>Không có dữ liệu sinh viên nào !</tr></td>";
        }
        ?>
        <?php foreach ($students as $value) { ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['age']; ?></td>
                <td>
                    <img style="width: 100px;" src="img/<?php echo $value['avatar']; ?>" alt=""><br>
                    <!-- <p>_file_   :  <?php // echo $value['avatar'] ?></p> -->
                </td>
                <td><?php echo $value['description']; ?></td>
                <td><?php echo $value['created_at']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $value['id']; ?>"><button><i class="fa-solid fa-pencil"></i></button></a>
                    <button class="remove" onclick="delete_student(<?php echo $value['id'] ?>)"><i class="fa-solid fa-xmark"></i></button>
                </td>
            </tr>
        <?php } ?>
    </table>
    <div style="width: 100%; margin-top: 2%; display: flex; align-items: end; justify-content: space-between;">
        <a href="create.php">
                <button class="add"><i class="fa-solid fa-user-plus"></i>Thêm mới</button>
            </a>
        
        <button class="delete_all" onclick="delete_all()"><i class="fa-solid fa-users-slash"></i> Xóa tất cả</button>
    </div>
    <script>
        function delete_student(id) {
            if (confirm('Bạn có muốn xóa student này không ?')) {
                document.location = 'delete.php?id=' + id;
                alert('Xóa thành công !')
            }
        }

        function delete_all() {
            if (confirm('Bạn có muốn xóa tất cả không ?')) {
                document.location = 'delete_all.php';
            }
        }
    </script>
</body>

</html>