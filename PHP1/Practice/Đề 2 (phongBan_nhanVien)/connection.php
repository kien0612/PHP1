<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    try {
        $conn = new PDO("mysql:host=$servername; dbname=longlhph31572_quanlynhansu;", $username,  $password );
        // echo "Connection successfully";
    } catch (PDOException $e){
        echo "Connection Failed !" . $e->getMessage();
    }
?>