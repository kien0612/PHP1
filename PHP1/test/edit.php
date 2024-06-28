<?php
    session_start();
    require_once 'conn.php';
//     - phongBan(id_phongBan, ten_phongBan) – Phòng Ban
// - nhanVien(id_nhanVien, ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan) – Nhân Viên

    // if (isset($_GET['id'])){
    //     $id = $_GET['id'];

    // if (isset($_COOKIE['login'])) {
    //     // Lấy giá trị từ trên cookie xuống
    //     $user = $_COOKIE['login'];
    //     echo "Xin chào, $user";
    //     header('Refresh: 20');
    // } else {
    //     setcookie('outtime', 'hết th gian', time() + 1);
    //     header('Location: login.php');
    // }

    $sql2 = "SELECT * FROM phongBan";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $phongBan = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_SESSION['login']['edit'])){
        $id = $_SESSION['login']['edit'];
        echo $id;
        $sql = "SELECT nv.* , pb.ten_phongBan FROM nhanVien nv INNER JOIN phongBan pb ON nv.id_phongBan = pb.id_phongBan WHERE id_nhanVien = '$id'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $nhanVien = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($nhanVien);
    }

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
            $sql_edit = "UPDATE nhanVien SET 
            ten_nhanVien = '$ten_nhanVien' , 
            namSinh = '$namSinh' , 
            gioiTinh = '$gioiTinh' , 
            image = '$image_name' , 
            queQuan = '$queQuan' , 
            email = '$email' , 
            soDienThoai = '$soDienThoai' , 
            id_phongBan = '$id_phongBan' ";
            $stmt_edit = $conn->prepare($sql_edit);
            $stmt_edit->execute();
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
            <input type="text" name="ten_nhanVien" value="<?= $nhanVien['ten_nhanVien'] ?>">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">namSinh</label>
            <input type="date" name="namSinh" value="<?= $nhanVien['namSinh'] ?>">
        </div>
        <span style="color: red;"><?= isset($err['namSinh']) ? $err['namSinh'] : '' ?></span>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">gioiTinh</label>
            <input type="text" name="gioiTinh" value="<?= $nhanVien['gioiTinh'] ?>">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">image</label>
            <input type="file" name="image">
            <img src="img/<?= $nhanVien['image'] ?>" alt="">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">queQuan</label>
            <input type="text" name="queQuan" value="<?= $nhanVien['queQuan'] ?>">
        </div>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">email</label>
            <input type="text" name="email" value="<?= $nhanVien['email'] ?>">
        </div>
        <span style="color: red;"><?= isset($err['email']) ? $err['email'] : '' ?></span>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">soDienThoai</label>
            <input type="text" name="soDienThoai" value="<?= $nhanVien['soDienThoai'] ?>">
        </div>
        <span style="color: red;"><?= isset($err['soDienThoai']) ? $err['soDienThoai'] : '' ?></span>
        <!-- -------------------------------------------------- -->
        <div class="inbox">
            <label for="">id_phongBan</label>
            <select name="id_phongBan">
                <?php foreach ($phongBan as $pb) { ?>
                    <option value="<?= $pb['id_phongBan'] ?>" <?= ($pb['id_phongBan'] == $nhanVien['id_phongBan']) ? 'selected' : '' ?>>
                    <?= $pb['ten_phongBan'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- -------------------------------------------------- -->
        <button type="submit" name="submit">Thêm</button>
    </form>
</body>
</html>