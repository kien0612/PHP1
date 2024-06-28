<?php
    require('connection.php');

    // Lấy ra dữ liệu từ bảng roles
    $sql_role = "SELECT * FROM role";
    $role = $connect->query($sql_role)->fetchAll();
?>
    <?php
            // Tạo 1 mảng trống để chứa lỗi
        $error = [];

        if (isset($_POST["btn-submit"])) {
            // Lấy ra toàn bộ thông tin người dùng nhập từ form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $role_id = $_POST["role"];
            $status = $_POST["status"];

            // Cách dể lấy thông tin của ảnh được dảy lên từ form
            $hinh_anh = $_FILES['image'];
            print_r($hinh_anh);
            
            // Kiểm tra dữ liệu
            // Kiểm tra dữ liệu để trống
            if (empty($name)) { // Nếu bỏ trống thì trả ra true
                // Thêm dữ liệu vào mảng error và quy định key cho nó
                $error["name"] = "Bạn cần nhập đầy đủ họ tên";
            }
            // kiểm tra email và phone
            if (empty($email)) { // Nếu bỏ trống thì trả ra true
                $error["email"] = "Bạn cần nhập email";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { // Sử dụng validate có sẵn của PHP
                // filter_var chỉ sử dụng với hàm có sẵn của PHP
                $error["email"] = "Email không hợp lệ";
            }

            $regex_phone = '/^0\d{9}$/';
            if (empty($phone)) { // Nếu bỏ trống thì trả ra true
                $error["phone"] = "Bạn cần nhập số điện thoại";
            } else if (!preg_match($regex_phone, $phone)) { // Sử dụng validate với regex
                $error["phone"] = "Số điện thoại không hợp lệ";
            }

            if (isset($hinh_anh)){
                // Thư mục sẽ lưu trữ ảnh
                $target_dir = 'img/';

                // Láy tên của ảnh
                $image = $hinh_anh['name'];

                // Tạo đường dẫn tới ảnh
                $target_file = $target_dir . $image;

                // Tạo ảnh
                move_uploaded_file($hinh_anh['tmp_name'], $target_file);
            }
        }

        // Nếu không còn lỗi thì thêm dữ liệu vào CSDL
        if (!$error) {
            $sql_add = "INSERT INTO user VALUES (NULL,'$name', '$email', '$phone', '$image','$role_id', '$status')";
            $connect->query($sql_add);
            header('Location: index.php');
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>
<body>
    <h2>Thêm người dùng</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" bắt buộc phải có dể thực hiện upload ảnh -->

        <!-- ID ko cần nhập mà mặc định sẽ tự tăng khi thêm dữ liệu -->
        <label for="">Name</label>
        <input type="text" name="name">
        <span style="color: red;"><?php echo isset($error["name"]) ? $error["name"] : '' ?></span>
        <br>

        <label for="">Email</label>
        <input type="email" name="email">
        <span style="color: red;"><?php echo isset($error["email"]) ? $error["email"] : '' ?></span>
        <br>

        <label for="">Phone</label>
        <input type="text" name="phone">
        <span style="color: red;"><?php echo isset($error["phone"]) ? $error["phone"] : '' ?></span>
        <br>

        <label for="">Image</label>
        <input type="file" id="image" name="image" accept="image/">
        <br>

        <label for="">Role</label>
        <select name="role">
            <?php foreach ($role as $value) : ?>
                <option value="<?php echo $value["id"] ?>"><?php echo $value["name_role"] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="">Status</label>
        <select name="status">
            <option value="0">Hoạt động</option>
            <option value="1">Ngừng hoạt động</option>
        </select>
        <br>

        <button type="submit" name="btn-submit">Thêm mới</button>
        <br>
    </form>
</body>
</html>