<?php
    session_start();
    require_once 'connection.php';

    if (isset($_COOKIE['success'])) {
        // Lấy giá trị từ trên cookie xuống
        $user = $_COOKIE['success'];
        echo "Xin chào, $user";
        header('Refresh: 20');
    } else {
        setcookie('outtime', 'hết th gian', time() + 1);
        header('Location: login.php');
    }
    
    $sql2 = "SELECT * FROM phongBan";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();
    $phongBan = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $err = [];

    if (isset($_SESSION['login']['edit'])){
        $id = $_SESSION['login']['edit'];
        $sql3 = "SELECT nv.*, pb.* FROM phongBan pb INNER JOIN n    hanVien nv ON pb.id_phongBan = nv.id_phongBan  WHERE id_nhanVien = '$id'";
        $stmt3 = $conn->prepare($sql3);
        $stmt3->execute();
        $nhanVien = $stmt3->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $birth = $_POST['birth']; // năm sinh => ngày tháng năm (date) yyyy-mm-dd | VD: 2023-08-10
        $gender = $_POST['gender'];
        $hometown = $_POST['hometown'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id_phongBan = $_POST['id_phongaBan'];

        $image = $_FILES['image'];

        // check nếu có update lại file ảnh mới
        if ($image['size'] > 0){
            $image_name = $image['name'];
            move_uploaded_file($image['tmp_name'], 'img/' . $image_name);
        }else {
            $image_name = $_POST['image'];
        }

        // chuyển đổi dạng date sang dạng Unix timestamp / strtotime()
        $timestamp = strtotime($birth);
        // lấy năm của ngày sinh từ unix timestamp / date('Y',parameter)
        $birth_year = date('Y',$timestamp);
        echo $birth_year;
        // Lấy năm hiện tại
        $calc_age = date('Y');

        if ( $calc_age - $birth_year <= 18){
            $err['age'] = 'Nhân viên phải trên 18 tuổi';
        }
        if (!preg_match('/^\\S+@\\S+\\.\\S+$/', $email)){
            $err['email'] = 'Email phải nhập đúng định dạng /^\\S+@\\S+\\.\\S+$/';
        }
        if (!preg_match('/^0\d{9}$/', $phone)){
            $err['phone'] = 'Số điện thoại phải bắt đầu từ số 0 và gồm 10 chữ số';
        }

        if (!$err) {
            $sql = "UPDATE nhanVien SET ten_nhanVien = '$name', namSinh = '$birth',
            gioiTinh = '$gender', image = '$image_name' , queQuan = '$hometown', email = '$email',
            soDienThoai = '$phone', id_phongBan = '$id_phongBan' WHERE id_nhanVien = '$id'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
</head>
<body>
    <h2>Sửa thông tin nhân viên</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input_box">
            <label for="">Tên nhân viên</label>
            <input type="text" name="name" value="<?= $nhanVien['ten_nhanVien'] ?>">
        </div>
        <div class="input_box">
            <label for="">Năm Sinh</label>
            <input type="date" name="birth" value="<?= $nhanVien['namSinh'] ?>">
        </div>
        <span style="color: red;"><?= isset($err['age']) ? $err['age'] : '' ?></span>
        <div class="input_box">
            <label for="">Giới Tính</label>
            <input type="text" name="gender" value="<?= $nhanVien['gioiTinh'] ?>">
        </div>
        <div class="input_box">
            <label for="">Ảnh</label>
            <input type="file" name="image">
            <!--  -->
            <input type="hidden" name="image" value="<?= $nhanVien['image'] ?>">
            <!--  -->
            <img src="img/<?= $nhanVien['image'] ?>" alt="">
        </div>
        <div class="input_box">
            <label for="">Quê quán</label>
            <input type="text" name="hometown" value="<?= $nhanVien['queQuan'] ?>">
        </div>
        <div class="input_box">
            <label for="">Email</label>
            <input type="text" name="email" value="<?= $nhanVien['email'] ?>">
        </div>
        <span style="color: red;"><?= isset($err['email']) ? $err['email'] : '' ?></span>
        <div class="input_box">
            <label for="">SĐT</label>
            <input type="text" name="phone" value="<?= $nhanVien['soDienThoai'] ?>">
        </div>
        <span style="color: red;"><?= isset($err['phone']) ? $err['phone'] : '' ?></span>
        <label for="">Phòng ban</label>
        <select name="id_phongBan" id="">
            <?php foreach ($phongBan as $pb) { ?> 
                <option value="<?= $pb['id_phongBan'] ?>" <?= $pb['id_phongBan'] == $nhanVien['id_phongBan'] ? 'selected' : '' ?>>
                <?= $pb['ten_phongBan'] ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="submit">Sửa</button>
    </form>
</body>
</html>