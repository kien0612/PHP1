<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO("mysql:host=$servername; dbname=test3", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'Conn Successs !';
    } catch (PDOException $e) {
        echo 'Conn Failed !' . $e->getMessage();
    }

?>