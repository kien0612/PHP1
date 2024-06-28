<?php
    require('connection.php');

    echo 'File sửa';

    $sql_role = "SELECT * FROM role";
    $role = $connect->query($sql_role)->fetchAll();

    if (isset($_GET['id'])){
        $id =  $_GET['id'];

        // Cau truy vấn lấy ra thong tin của 1 người 
        $sql_detail = "SELECT * FROM user WHERE id = '$id'";
        
        // Cách 1: 
        // $user = $connect->query($sql_detail)->fetch();

        // Cách 2:
        // prepare là 1 cơ chế bảo mặt giúp chúng ta thưc hiện truy vấn an toàn hơn
        $stmt_detail = $connect->prepare($sql_detail); // Chuản bị câu truy ván
        $stmt_detail->execute();  // Thực hiện câu truy vân

        // Láy dữ liệu
        $user = $stmt_detail->fetch(PDO::FETCH_ASSOC);
        // Trả ra 1 mảng đa chiều và loại bỏ cá key thừa

        // print_r($user);

        if (!$user){
            echo 'Người dùng không tồn tại !';
            exit();
        }
    }

    // Mảng chứa lỗi
    $error = [];

    if (isset($_POST['btn-submit'])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $role_id = $_POST["role"];
        $status = $_POST["status"];
        $hinh_anh = $_FILES['image'];

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

        if (!$error){
            // Câu truy vấn update
            $sql_update = "UPDATE user SET 
                name = '$name', 
                email = '$email', 
                phone = '$phone', 
                image = '$image', 
                role_id = '$role_id', 
                status = '$status' 
            WHERE id = '$id'";

            $stmt_update = $connect->prepare($sql_update); // Chuẩn bị cau truy vấn
            $stmt_update->execute();    // Thực hiện câu truy vấn
            header('Locaiton: index.php');
        }
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
        <input type="text" name="name" value="<?php echo $user['name'];?>">
        <span style="color: red;"><?php echo isset($error["name"]) ? $error["name"] : '' ?></span>
        <br>

        <label for="">Email</label>
        <input type="email" name="email"  value="<?php echo $user['email'];?>">
        <span style="color: red;"><?php echo isset($error["email"]) ? $error["email"] : '' ?></span>
        <br>

        <label for="">Phone</label>
        <input type="text" name="phone" value="<?php echo $user['phone'];?>">
        <span style="color: red;"><?php echo isset($error["phone"]) ? $error["phone"] : '' ?></span>
        <br>

        <label for="">Image</label>
        <input type="file" id="image" name="image" accept="image/">
        <br>

        <label for="">Role</label>
        <select name="role">
            <?php foreach ($role as $value) : ?>
                <option value="<?php echo $value["id"] ?>" <?php echo ($user["role_id"] == $value['id'] ? 'selected' : '') ?>> 
                    <?php echo $value["name_role"] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="">Status</label>
        <select name="status">
            <option value="0" <?php echo $user['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
            <option value="1" <?php echo $user['status'] == 0 ? 'selected' : '' ?>>Ngừng hoạt động</option>
        </select>
        <br>

        <button type="submit" name="btn-submit">Thêm mới</button>
        <br>
    </form>
</body>
</html>