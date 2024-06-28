<?php
    require 'sql.php';

    // Truy vấn dữ liệu bảng
    $sql_student = "SELECT * FROM students";

    // Lấy toàn bộ dữ liệu bảng
    $students = $connect->query($sql_student)->fetchAll();

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_delete = "DELETE FROM students WHERE id = '$id'";
        $delete_student = $connect->prepare($sql_delete);
        $delete_student->execute();
        header('Location: index.php');
    }
?>
