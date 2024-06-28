<?php
$servername = 'localhost';
$username = 'root';
$password = '';

try {

    // Kết nối PHPmyAdmin
    // $connect = new PDO("mysql:host=$servername;", $username, $password);
    // $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $create_db = "CREATE DATABASE longlhph3172_examphp1";
    // $connect->query($create_db);

    $connect = new PDO("mysql:host=$servername;dbname=longlhph3172_examphp1;", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $airlines = "CREATE TABLE airlines(
    //     airline_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    //     airline_name VARCHAR(255)
    // )";
    // $connect->query($airlines);

    // $flights = "CREATE TABLE flights(
    //             flight_id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    //             flight_number INT(10),
    //             image VARCHAR (255),
    //             total_passengers INT(10),
    //             description TEXT(255),
    //             airline_id INT(10)
    //         )";
    // $connect->query($flights);

    // $add_airlines = "INSERT INTO airlines VALUES(null, 'Vietnam Airline'), (null, 'Bamboo Airway'), (null, 'Vietjet Air')";
    // $connect->query($add_airlines);

    echo 'Connect Successfully';
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
