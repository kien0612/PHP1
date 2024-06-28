<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try {
        $connect = new PDO("mysql:host=$servername;dbname=test2", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>