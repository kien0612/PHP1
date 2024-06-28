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

    $sql = "SELECT * FROM phongBan";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $phongBan = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $err = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];
        $hometown = $_POST['hometown'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $id_phongBan = $_POST['id_phongBan'];

        $image = $_FILES['image'];
        $image_name = $image['name'];
        move_uploaded_file($image['tmp_name'], 'img/' . $image_name);

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
            $_SESSION['login']['add'] = 'success';
            $sql = "INSERT INTO nhanVien VALUES (null,'$name','$birth','$gender','$image_name','$hometown','$email','$phone','$id_phongBan')";
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
    <h2>Thêm thông tin nhân viên</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input_box">
            <label for="">Tên nhân viên</label>
            <input type="text" name="name">
        </div>
        <div class="input_box">
            <label for="">Năm Sinh</label>
            <input type="date" value="2023-08-08" name="birth">
        </div>
        <span style="color: red;"><?= isset($err['age']) ? $err['age'] : '' ?></span>
        <div class="input_box">
            <label for="">Giới Tính</label>
            <input type="text" name="gender">
        </div>
        <div class="input_box">
            <label for="">Ảnh</label>
            <input type="file" name="image">
        </div>
        <div class="input_box">
            <label for="">Quê quán</label>
            <input type="text" name="hometown">
        </div>
        <div class="input_box">
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <span style="color: red;"><?= isset($err['email']) ? $err['email'] : '' ?></span>
        <div class="input_box">
            <label for="">SĐT</label>
            <input type="text" name="phone">
        </div>
        <span style="color: red;"><?= isset($err['phone']) ? $err['phone'] : '' ?></span>
        <label for="">Phòng ban</label>
        <select name="id_phongBan" id="">
            <?php foreach ($phongBan as $pb) { ?>
                <option value="<?= $pb['id_phongBan'] ?>"><?= $pb['ten_phongBan'] ?></option>
            <?php } ?>
        </select>
        <button type="submit" name="submit">Thêm</button>
    </form>
</body>
</html>