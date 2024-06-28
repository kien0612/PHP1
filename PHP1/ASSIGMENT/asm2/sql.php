<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {

        // Kết nối PHPmyAdmin
        // $connect = new PDO("mysql:host=$servername;", $username, $password);
        // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Tạo CSDL
        // $db = 'CREATE DATABASE quanlysinhvien';
        // $connect->query($db);

        // Kết nối CSDL
        $connect = new PDO("mysql:host=$servername;dbname=quanlysinhvien", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // // Tạo table
        // $std = "CREATE TABLE students(
        //     id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        //     name VARCHAR(255) NOT NULL,
        //     age int(11),
        //     avatar varchar(255),
        //     description text,
        //     created_at timestamp
        // )";
        // $connect->query($std);

        // echo "Connected successfully";

        // Xóa bảng
        // $delete_table = "DROP TABLE students";
        // $connect->query($delete_table);
    
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>