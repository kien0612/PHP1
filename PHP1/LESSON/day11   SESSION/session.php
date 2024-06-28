<?php
/*
    SESSION & COOKIE
    - Session và cookie được dùng dể cùng lưu trữ dữ liệu tạm thời

    (*) Session :
    - Nó dùng để lưu trữ thông tin và trạng thái của người dùng ( lên server ) trong suốt quá trình làm việc
    - Sẽ bị xóa khi đóng trình duyệt ( kết thúc 1 phiên làm việc ), hoặc thực hiện công việc xóa session
    
    session_start() : khai báo 1 phiên làm việc và " bắt buộc phải có khi sư dụng session "
*/

$mat_dien = "Hom nay md";
// session_start();

// khởi tạo biến session 
$_SESSION['matdien'] = $mat_dien;

// Hiển thị thông tin session
echo $_SESSION["matdien"];

/*
    (*) Cookie :
*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- <form action="" method="POST">
        <input type="text" name="name">
        <button type="submit">Send</button>
    </form> -->

    <form action="" method="POST">
        <input type="text" name="username" placeholder="Enter user name">
        <input type="password" name="password" placeholder="Enter password">
        <button type="submit">Send</button>
    </form>

    <?php
    // session_start();
    // if (isset($_POST['name'])){
    //     $_SESSION['name'] = $_POST['name'];
    //     echo $_SESSION['name'];
    // }

    // if (isset($_SESSION['name'])){
    //     echo $_SESSION['name'];
    // }

    // <!-- LAB 5: Cho 1 mảng users có sẵn.
    // $data_users = [
    //     [
    //         'user_name' => 'thaydinhdz',
    //         'password' => '12345678'
    //     ],
    //     [
    //         'user_name' => 'dinhtv7',
    //         'password' => '12345678'    
    //     ]
    // ];

    // Tạo 1 form đăng nhập có user name và password
    // Kiểm tra người dùng có nhập đúng tài khoản mk hay không
    // - Nếu đúng thì in ra "Xin chào username"
    // - Nếu sai tài khoản hoặc mk thì in ra thông báo sai thông tin dăng nhập
    // ( Toàn bộ thông báo được in ra 1 trang mới )
    // -->
    session_start();

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

    if (isset($_POST['username']) && isset($_POST['password'])) {
        echo "Input information : <br>";
        echo "user name: " .  $_POST['username'] . "<br>";
        echo "password :" . $_POST['password'] . "<br>";
        echo "<br>";

        $username = $_POST['username'];
        $password = $_POST['password'];

        foreach ($data_users as $key) {
            if ($username === $key['user_name'] &&  $password === $key['password']) {
                // thu thập dữ liệu nhập vào và đẩy lên session
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                break;
            } else {
                $_SESSION['err'] = "Thông tin đang nhập không chính xác !";
            }
            header('Location: test_session.php');
        }
    }
    ?>
</body>

</html>