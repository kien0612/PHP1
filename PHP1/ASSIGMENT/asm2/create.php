<?php
require 'sql.php';
session_start();

// Tạo mảng báo lỗi
$err = [];

if (isset($_POST['submit'])) {
    // Lấy thông tin nhập vào từ form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $desc = $_POST['description'];

    // Lấy thông tin file ảnh
    $file = $_FILES['image'];
    // print_r($file);

    // Validate thông tin trong form
    if (empty($name)) {
        $err['name'] = 'Họ tên và tuổi không được để trống !';
    }
    /* -------------------------------------------------------------------- */
    if (empty($age)) {
        $err['age'] = 'Họ tên và tuổi không được để trống !';
    }
    /* -------------------------------------------------------------------- */

    if (isset($file)) {
        // tên file
        $file_name = $file['name'];

        // tên folder
        $folder = 'img/';

        // Tạo đường dẫn file
        $target_file = $folder . $file_name;
    }

    // Tạo mảng định dạng file cho phép
    $allowTypeFile = ['jpg', 'png', 'jpeg', 'gif', 'jfif'];

    // Tạo hàm lấy phần mở rộng / đuôi của file để so sánh định dạng cho phép
    $pathFile = pathinfo($file['full_path'], PATHINFO_EXTENSION);

    // check xem có nằm trong mảng định dạng cho phép
    if (!in_array($pathFile, $allowTypeFile) && $file['full_path'] != '') {
        $err['file'] = 'Chỉ cho phép upload file có định dạng ảnh là png, jpg, jpeg, gif !';
    } else {
        // Tạo file vào folder
        move_uploaded_file($file['tmp_name'], $target_file);
    }
    /* -------------------------------------------------------------------- */
    // Check nếu k lỗi sẽ tiến hành thêm dữ liệu vào DB
    if (!$err) {
        // set thời gian hiện tại của khu vực
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        // get thời gian hiện tại
        $getCurrentTime = date('Y/m/d h:i:s a', time());

        $add_student_data = "INSERT INTO students VALUES(null, '$name', '$age' , '$file_name', '$desc', '$getCurrentTime')";
        $add_db = $connect->query($add_student_data, PDO::FETCH_ASSOC);

        $_SESSION['success']['add'] = 'Thêm mới thành công !';

        header('Location: index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            transition: 0.3s ease;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #353535;
        }

        body {
            background: url('https://reviewedu.net/wp-content/uploads/2021/09/Cao-dang-fpt.jpeg') no-repeat;
            background-size: cover;
            backdrop-filter: blur(9px);
        }

        form {
            background: #fff;
            width: 500px;
            border: none;
            padding: 10% 8%;
            box-shadow: 0 0 15px rgba(85, 85, 85, 0.5);

        }

        input,
        textarea {
            width: 65%;
            padding: 1.5%;
            margin: 2% 0;
        }

        .inbox {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .inbox:last-child {
            margin-top: 10px;
            justify-content: center;
        }

        button {
            padding: 1.5% 3%;
            border: none;
            background-color: #ff9c00;
            color: white;
            margin: 0 1.5%;
        }

        button:last-child {
            background-color: rgba(85, 85, 85, 0.95);
        }

        button:hover {
            background-color: rgba(85, 85, 85, 0.5);
        }

        a,
        a i {
            text-decoration: none;
            color: #ff9c00;
        }

        a {
            color: #353535;
        }

        input[type='file']{
            padding-left:  0;
        }
    </style>
</head>

<body style="display: flex; justify-content:center; align-items: center; height: 100vh">
    <div id="" class="">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>
                Thêm sinh viên mới
            </h2>
            <a href="index.php"><i class="fa-solid fa-right-to-bracket"></i></i> Về trang danh sách</a>
            <!------------------------------------------->
            <div class="inbox mt-4">
                <label for="">Họ tên</label>
                <input type="text" name="name">
            </div>
            <span style="color: red;"><?php echo isset($err['name']) ? $err['name'] : ''; ?></span>
            <!------------------------------------------->
            <div class="inbox">
                <label for="">Tuổi</label>
                <input type="number" min="18" max="35" name="age">
            </div>
            <span style="color: red;"><?php echo isset($err['age']) ? $err['age'] : ''; ?></span>
            <!------------------------------------------->
            <div class="inbox">
                <label for="">Ảnh đại diện</label>
                <input type="file" name="image" accept="image/" placeholder="Choose file">
            </div>
            <span style="color: red;"><?php echo isset($err['file']) ? $err['file'] : ''; ?></span>
            <!------------------------------------------->
            <div class="inbox">
                <label for="">Mô tả sinh viên</label>
                <textarea name="description" id="" cols="30" rows="5"></textarea>
            </div>
            <div class="inbox">
                <button type="submit" name="submit" onclick="">Save</button>
                <button type="reset" name="reset">Reset</button>
            </div>
        </form>
    </div>
</body>

</html>