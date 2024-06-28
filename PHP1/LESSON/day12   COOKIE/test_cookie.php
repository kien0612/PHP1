<?php

// Kiểm tra đã có Cookie ngoctrinh hay chưa 
// if (isset($_COOKIE['ngoctrinh']) && isset($_COOKIE['ngoctrinh2'])){
//     echo $_COOKIE['ngoctrinh'] . "Lớp: " . $_COOKIE['ngoctrinh2'];
// }else {
//     echo "Cookie đã hết hạn hoạc k tồn tại !";
// }

if (isset($_COOKIE['username'])) {
    // Lấy giá trị từ trên cookie xuống
    $user = $_COOKIE['username'];
    echo "Xin chào, $user";
    header('Refresh: 10');
} else if (isset($_COOKIE['mess_err'])) {
    $err = $_COOKIE['mess_err'];
    echo $err;
} else {
    echo "Phiên đăng nhập của bạn đã hết !";
}
?>