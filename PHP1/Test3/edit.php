<?php
session_start();
require_once 'conn.php';

if (isset($_COOKIE['login'])){
    $user = $_COOKIE['login'];
    echo "Xin chào " . $user;
    header("Refresh: 20");
}else {
    setcookie('timeout', 'out', time() +1);
    header("Location: login.php");
}

if (isset($_SESSION['login']['edit'])){
    $id = $_SESSION['login']['edit'];
    $sql_get = "SELECT nv.*, pb.ten_phongBan FROM nhanVien nv INNER JOIN phongBan pb ON
    nv.id_phongBan = pb.id_phongBan WHERE id_nhanVien = '$id'";
    $stmt_get = $conn->prepare($sql_get);
    $stmt_get->execute();
    $nhanVien = $stmt_get->fetch();
}

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ten_nhanVien = $_POST['ten_nhanVien'];
    $namSinh = $_POST['namSinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $image = $_FILES['image'];
    $queQuan = $_POST['queQuan'];
    $email = $_POST['email'];
    $soDienThoai = $_POST['soDienThoai'];
    $id_phongBan = $_POST['id_phongBan'];

    $image_name = $_POST['image'];

    if ($image['size'] > 0){
        $image_name = $image['name'];
        move_uploaded_file($image['tmp_name'], 'img/' . $image_name);
    }

    if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)){
        $err['email'] = 'Email phải nhập đúng định dạng (regex: /^\\S+@\\S+\\.\\S+$/)';
    }
    if (!preg_match('/^0\d{9}$/', $soDienThoai)){
        $err['soDienThoai'] = '+ Số điện thoại phải bắt đầu từ số 0 và gồm 10 chữ số (regex: /^0\d{9}$/)';
    }

    $timestamp = strtotime($namSinh);
    $get_year = date('Y', $timestamp);
    $get_age = date('Y') - $get_year;

    if ($get_age <= 18){
        $err['namSinh'] = 'Nhân viên phải trên 18 tuổi';
    }

    if (!$err) {
        $sql_add = "UPDATE nhanvien SET
        ten_nhanVien = '$ten_nhanVien',
        namSinh = '$namSinh', 
        gioiTinh = '$gioiTinh', 
        image = '$image_name', 
        queQuan = '$queQuan', 
        email = '$email', 
        soDienThoai = '$soDienThoai', 
        id_phongBan = '$id_phongBan' WHERE id_nhanVien = '$id'";

        $stm_add = $conn->prepare($sql_add);
        $stm_add->execute();
        header("Location: index.php");
    }
    
}

$sql = "SELECT * FROM phongBan";
$stmt = $conn->prepare($sql);
$stmt->execute();
$phongBan = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <title>Sửa nhân viên</title>
</head>

<body>
    <h2>Sửa nhân viên</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <table border="1">
            <tr>
                <th>ten_nhanVien</th>
                <th>namSinh</th>
                <th>gioiTinh</th>
                <th>image</th>
                <th>queQuan</th>
                <th>email</th>
                <th>soDienThoai</th>
                <th>id_phongBan</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="ten_nhanVien" value="<?= $nhanVien['ten_nhanVien'] ?>">
                </td>
                <td>
                    <span style="color: red;"><?= isset($err['namSinh']) ? $err['namSinh'] : '' ?></span>
                    <input type="date" name="namSinh" value="<?= $nhanVien['namSinh'] ?>">
                </td>
                <td>
                    <input type="text" name="gioiTinh">
                </td>
                <td>
                    <input type="hidden" name="image" value="<?= $nhanVien['image'] ?>">
                    <input type="file" name="image">
                    <img width="100px" src="img/<?= $nhanVien['image'] ?>" alt="">
                </td>
                <td>
                    <input type="text" name="queQuan" value="<?= $nhanVien['queQuan'] ?>">
                </td>
                <td>
                    <span style="color: red;"><?= isset($err['email']) ? $err['email'] : '' ?></span>
                    <input type="text" name="email" value="<?= $nhanVien['email'] ?>">
                </td>
                <td>
                    <span style="color: red;"><?= isset($err['soDienThoai']) ? $err['soDienThoai'] : '' ?></span>
                    <input type="text" name="soDienThoai" value="<?= $nhanVien['soDienThoai'] ?>">
                </td>
                <td>
                    <select type="text" name="id_phongBan">
                        <?php foreach ($phongBan as $pb) { ?>
                            <option value="<?= $pb['id_phongBan'] ?>" <?= $nhanVien['id_phongBan'] == $pb['id_phongBan'] ? 'selectd' : '' ?>>
                            <?= $pb['ten_phongBan']?>
                        </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Sửa</button>
    </form>
</body>

</html>