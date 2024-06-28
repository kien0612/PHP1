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

    $image_name = $image['name'];
    move_uploaded_file($image['tmp_name'], 'img/' . $image_name);

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
        $sql_add = "INSERT INTO nhanvien (id_nhanVien, ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan)
         VALUES 
        (NULL, '$ten_nhanVien', '$namSinh', '$gioiTinh', '$image_name', '$queQuan', '$email', '$soDienThoai', '$id_phongBan')";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
</head>

<body>
    <h2>Thêm nhân viên</h2>
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
                    <input type="text" name="ten_nhanVien">
                </td>
                <td>
                    <span style="color: red;"><?= isset($err['namSinh']) ? $err['namSinh'] : '' ?></span>
                    <input type="date" name="namSinh" value="2023-08-13">
                </td>
                <td>
                    <input type="text" name="gioiTinh">
                </td>
                <td>
                    <input type="file" name="image">
                </td>
                <td>
                    <input type="text" name="queQuan">
                </td>
                <td>
                    <span style="color: red;"><?= isset($err['email']) ? $err['email'] : '' ?></span>
                    <input type="text" name="email">
                </td>
                <td>
                    <span style="color: red;"><?= isset($err['soDienThoai']) ? $err['soDienThoai'] : '' ?></span>
                    <input type="text" name="soDienThoai">
                </td>
                <td>
                    <select type="text" name="id_phongBan">
                        <?php foreach ($phongBan as $pb) { ?>
                            <option value="<?= $pb['id_phongBan'] ?>"><?= $pb['ten_phongBan']?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Thêm</button>
    </form>
</body>

</html>