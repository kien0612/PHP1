<?php
/*
        COOKIE
        - Được sử dụng để lưu trữ dữ liệu tạm thời ( phía client )
        - Chỉ lưu trữ dữ liệu trong 1 khoảng thời gian được xác định
        - set thời gian : th gian hiện tại + khoảng thời gian tồn tại
        - Cookie sẽ tự động xóa khi hết hạn
    */
$name = 'dinhtv7';
$class = 'WD18322';

// Đăng kí cookie
// Cú pháp: setcookie(ten_cookie , giá trị, thời gian tồn tại của cookie);
setcookie('ngoctrinh', $name, time() + 5); // Cookie này sẽ tồn tại trong 5s
setcookie('ngoctrinh2', $class, time() + 5); // Cookie này sẽ tồn tại trong 5s

/*
    Cho một mảng dữ liệu users
    Tạo 1 form đăng nhập (username và password)
    Kiểm tra người dùng có nhập đúng tài khoản hay không
    - Đưa toàn bộ thông tin đăng nhập vào COOKIE
    - Nếu đúng Thì hiển thị "Xin chào, $username" sang 1 trang mới
    - Nếu sai thì hiển thị "Sai thông tin đăng nhập" sang 1 trang mới
    - Sau 1 khoảng thời gian bằng với thời gian tồn tại của cookie 
    thì reload lại trang
    Nếu cookie không còn thì hiển thị "Phiên đăng nhập của bạn đã hết"

    ** Gợi ý:
    header("Location: test_cookie.php")     // Chuyển sang trang mới
    header("Refresh: thời gian (s)")        // Reload lại sang sau bảo nhiêu giây
*/

    $data_users = [
        [
            'user_name' => 'thaydinhdz',
            'password' => '12345678'
        ],
        [
            'user_name' => 'dinhtv7',
            'password' => '12345678'
        ]
    ];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter username">
        <input type="password" name="password" placeholder="Enter password">
        <button type="submit">Sign in</button>
    </form>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = $_POST['username'];
            $password = $_POST['password'];
            foreach ($data_users as $key) {
                if ($username === $key['user_name'] && $password === $key['password']){
                    // Lưu dữ liệu vào cookie
                    setcookie('username', $username, time() + 10);
                    setcookie('password', $password, time() + 10);
                    break;
                }else {
                    $mess_err = "Thông tin đang nhập không chính xác !";
                    setcookie('mess_err', $mess_err, time() + 10);
                }
            }
            header('Location: test_cookie.php');
        }
    ?>
</body>

</html>