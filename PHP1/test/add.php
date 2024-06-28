<?php
    session_start();
    require_once 'conn.php';
//     - phongBan(id_phongBan, ten_phongBan) – Phòng Ban
// - nhanVien(id_nhanVien, ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan) – Nhân Viên

    // $sql = 'SELECT nv.* , pb.ten_phongBan FROM nhanVien nv INNER JOIN phongBan pb ON nv.id_phongBan = pb.id_phongBan';
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $nhanVien = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // if (isset($_COOKIE['login'])) {
    //     // Lấy giá trị từ trên cookie xuống
    //     $user = $_COOKIE['login'];
    //     echo "Xin chào, $user";
    //     header('Refresh: 20');
    // } else {
    //     setcookie('outtime', 'hết th gian', time() + 1);
    //     header('Location: login.php');
    // }

    $sql = "SELECT * FROM phongBan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $phongBan = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $err = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ten_nhanVien = $_POST['ten_nhanVien'];
        $namSinh = $_POST['namSinh'];
        $gioiTinh = $_POST['gioiTinh'];

        $image = $_FILES['image'];
        $image_name = $image['name'];
        move_uploaded_file($image['tmp_name'], 'img/' . $image_name);

        $queQuan = $_POST['queQuan'];
        $email = $_POST['email'];
        $soDienThoai = $_POST['soDienThoai'];
        $id_phongBan = $_POST['id_phongBan'];

        $birth = strtotime($namSinh);
        $timestamp = date('Y', $birth);
        $current_age = date('Y') - $timestamp;

        if ($current_age <= 18){
            $err['namSinh'] = 'Nhân viên phải trên 18 tuổi';
        }
        if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)){
            $err['email'] = 'Email phải nhập đúng định dạng (regex: /^\\S+@\\S+\\.\\S+$/)';
        }
        if (!preg_match('/^0\d{9}$/', $soDienThoai)){
            $err['soDienThoai'] = 'Số điện thoại phải bắt đầu từ số 0 và gồm 10 chữ số (regex: /^0\d{9}$/)';
        }
        
        if (!$err) {
            $sql_add = "INSERT INTO nhanvien (id_nhanVien, ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan) VALUES (NULL, '$ten_nhanVien', '$namSinh', '$gioiTinh', '$image_name', '$queQuan', '$email', '$soDienThoai', '$id_phongBan')";
            $stmt_add = $conn->prepare($sql_add);
            $stmt_add->execute();
            header('Location: index.php');
        }
    }

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
        <div class="inbox">
            <label for="">ten_nhanVien</label>
            <input type="text" name="ten_nhanVien">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">namSinh</label>
            <input type="date" name="namSinh" value="2023-08-10">
        </div>
        <span style="color: red;"><?= isset($err['namSinh']) ? $err['namSinh'] : '' ?></span>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">gioiTinh</label>
            <input type="text" name="gioiTinh">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">image</label>
            <input type="file" name="image">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">queQuan</label>
            <input type="text" name="queQuan">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">email</label>
            <input type="text" name="email">
        </div>
        <span style="color: red;"><?= isset($err['email']) ? $err['email'] : '' ?></span>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">soDienThoai</label>
            <input type="text" name="soDienThoai">
        </div>
        <span style="color: red;"><?= isset($err['soDienThoai']) ? $err['soDienThoai'] : '' ?></span>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">id_phongBan</label>
            <select name="id_phongBan">
                <?php foreach ($phongBan as $pb) { ?>
                    <option value="<?= $pb['id_phongBan'] ?>"><?= $pb['ten_phongBan'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- -------------------------------------------------- -->
        <button type="submit" name="submit">Thêm</button>
    </form>
</body>
</html>