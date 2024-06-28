<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $date = $_POST['date'];
        echo $date. "<hr>";

        // chuyển đổi dạng date sang dạng Unix timestamp / strtotime()
        $timestamp = strtotime($date);
        echo 'unix timestamp' . $timestamp . "<hr>";

        // lấy năm của ngày sinh từ unix timestamp / date('Y',parameter)
        $birth_year = date('Y', $timestamp);
        echo $birth_year;

        // Lấy năm hiện tại
        $calc_age = date('Y'); 
        echo "<hr>".  $calc_age. "<hr>";

        // tính toán tuổi hiện tại
        echo 'Tuổi hiện tại: ' . $calc_age - $birth_year;
        if ($calc_age - $birth_year <= 18){
            echo "<hr>". "Chưa đủ tuổi";
        }else {
            echo "<hr>". " đủ tuổi";
        }
    }
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
        Date : <input type="date" name="date" value="2023-08-10">
        <button type="submit">Check</button>
    </form>
</body>
</html>