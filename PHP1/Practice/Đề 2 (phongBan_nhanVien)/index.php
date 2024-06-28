<?php
    session_start();
    require_once 'connection.php';

    $sql = "SELECT nv.* , ten_phongBan FROM nhanVien nv INNER JOIN phongBan pb on nv.id_phongBan = pb.id_phongBan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nhanVien = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>

<body>
    <?php if (isset($_SESSION['login']['add'])) { ?>
        <script>
            alert('Thêm thành công !')
        </script>
    <?php } ?>
    <?php if (isset($_SESSION['login']['edit'])) { ?>
        <?php unset($_SESSION['login']); ?>
        <script>
            alert('Sửa thành công !')
        </script>
    <?php } ?>
    <?php if (isset($_SESSION['login']['delete'])) { ?>
        <?php unset($_SESSION['login']); ?>
        <script>
            alert('Xóa thành công !')
        </script>
    <?php } ?>

    <h2>Danh sách nhân viên</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Năm sinh</th>
            <th>Gioi tinh</th>
            <th>Ảnh</th>
            <th>Quê quán</th>
            <th>Email</th>
            <th>SDT</th>
            <th>id_phongBan</th>
            <th>
                <a onclick="return confirm('Bạn cần đăng nhập quản trị để thực hiện thao tác này !')" href="login.php?add"><button>Thêm</button></a>
            </th>
        </tr>
        <?php foreach ($nhanVien as $key => $nv) { ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $nv['ten_nhanVien'] ?></td>
                <td><?= $nv['namSinh'] ?></td>
                <td><?= $nv['gioiTinh'] ?></td>
                <td>
                    <img src="img/<?= $nv['image'] ?>" width="100px" alt="">
                </td>
                <td><?= $nv['queQuan'] ?></td>
                <td><?= $nv['email'] ?></td>
                <td><?= $nv['soDienThoai'] ?></td>
                <td><?= $nv['id_phongBan'] ?></td>
                <td>
                    <a onclick="return confirm('Bạn cần đăng nhập quản trị để thực hiện thao tác này !')" href="login.php?edit=<?= $nv['id_nhanVien'] ?>"><button>Sửa</button></a>
                    <a onclick="return confirm('Bạn cần đăng nhập quản trị để thực hiện thao tác này !')" href="login.php?delete=<?= $nv['id_nhanVien'] ?>"><button>Xóa</button></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>