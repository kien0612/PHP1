<?php
    require_once 'conn.php';
//     - phongBan(id_phongBan, ten_phongBan) – Phòng Ban
// - nhanVien(id_nhanVien, ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan) – Nhân Viên

    $sql = 'SELECT nv.* , pb.ten_phongBan FROM nhanVien nv INNER JOIN phongBan pb ON nv.id_phongBan = pb.id_phongBan';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $nhanVien = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($nhanVien);

    unset($_SESSION['login']);

    // if (isset($_COOKIE['login'])){
    //     $user = $_COOKIE['login'];
    //     echo 'xin chào' . $user;
    //     header('Refresh: 10');
    // }else {
    //     header('Location: login.php');
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
</head>
<body>
    <h2>Danh sách nhân viên</h2>
    <table border="1">
        <tr>
            <th>id_nhanVien</th>
            <th>ten_nhanVien</th>
            <th>namSinh</th>
            <th>gioiTinh</th>
            <th>image</th>
            <th>queQuan</th>
            <th>email</th>
            <th>soDienThoai</th>
            <th>id_phongBan</th>
            <th>
                <a href="add.php"><button>Thêm</button></a>
                <!-- <a onclick="return confirm('Bạn cần đăng nhập để thực hiện thao tác này')" href="login.php?add"><button>Thêm</button></a> -->
            </th>
        </tr>
        <?php foreach ($nhanVien as $key => $nv) { ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $nv['ten_nhanVien'] ?></td>
                <td><?= $nv['namSinh'] ?></td>
                <td><?= $nv['gioiTinh'] ?></td>
                <td>
                    <img src="img/<?= $nv['image'] ?>" alt="">
                </td>
                <td><?= $nv['queQuan'] ?></td>
                <td><?= $nv['email'] ?></td>
                <td><?= $nv['soDienThoai'] ?></td>
                <td><?= $nv['id_phongBan'] ?></td>
                <td>
                    <!-- <a onclick="return confirm('Bạn cần đăng nhập để thực hiện thao tác này')" href="login.php?edit=<?= $nv['id_nhanVien'] ?>"><button>Sửa</button></a>
                    <a onclick="return confirm('Bạn cần đăng nhập để thực hiện thao tác này')" href="login.php?delete=<?= $nv['id_nhanVien'] ?>"><button>Xóa</button></a> -->
                    <a href="edit.php?id=<?= $nv['id_nhanVien'] ?>"><button>Sửa</button></a>
                    <a href="delete.php?id=<? $nv['id_nhanVien'] ?>"><button>Xóa</button></a>
                </td>
            </tr>
        <?php }?>
    </table>
</body>
</html>