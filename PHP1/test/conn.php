<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$servername; dbname=test1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conn Successs !';
    } catch (PDOException $e) {
        echo 'Conn Failed !' . $e->getMessage();
    }
//     - phongBan(id_phongBan, ten_phongBan) – Phòng Ban
// - nhanVien(id_nhanVien, ten_nhanVien, namSinh, gioiTinh, image, queQuan, email, soDienThoai, id_phongBan) – Nhân Viên

?>