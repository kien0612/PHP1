<?php
require('connection.php');
// Thực hiện viết câu truy vấn dữ liệu
$sql_users = "SELECT user.* , role.name_role FROM user INNER JOIN role ON user.role_id = role.id";
// Lấy dữ liệu từ Database
$users = $connect->query($sql_users)->fetchAll();

// print_r($users);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
</head>

<body>
    <?php echo "Họ và tên - Mã Sinh viên" ?>

    <!-- Chụp ảnh Bảng dữ liệu, Bảng database, code -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Role</th>
            <th>Status</th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user["id"] ?></td>
                <td><?php echo $user["name"] ?></td>
                <td><?php echo $user["email"] ?></td>
                <td><?php echo $user["phone"] ?></td>
                <td>
                    <img style="width: 100px;" src="img/<?php echo $user['image']; ?>" alt="">
                </td>
                <td><?php echo $user["name_role"] ?></td>
                <td><?php echo $user["status"] == 0 ? 'Hoạt động' : 'Ngừng hoạt động' ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $user['id'];?>">
                        <button>Sửa</button>
                    </a>
                    <button onclick="confirmDelete(<?php echo $user['id'];?>)">Xóa</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
<script>
    function confirmDelete (id) {
        // confirm('Bạn có muốn xóa user không ?');
        if (confirm('Bạn có muốn xóa user không ?')) {
            console.log(id);
            document.location = 'delete_user.php?id=' + id;
        }
    }
</script>
</html>