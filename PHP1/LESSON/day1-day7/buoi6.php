<?php
/*
    MẢNG LIÊN HỢP
    - Là mảng mà các phần tử được xác định bởi các key ( các key này là duy nhất )

    (*) Cách khai báo :
    + Cú pháp : 
    $tenmang = [
        "key" => "giá trị"
    ];

    VD:
    $arr = [
        "toi" => "I",
        "yeu" => "love",
        "em" => "you"
        2023 => "Very Much",
        "2" => "Gì gì đó"   ( mặc dù key này khai báo kiểu string nhưng php sẽ tự động định nghĩa sang kiểu số nguyên)
    ];

    (*) Cách in mảng liên hợp
    $tenmang[key_name]

    + ForEach :
    foreach ($arr as $key) {
        echo $key . " ";
    }

    foreach ($arr as $key => $value) {
        echo "Key: $key - Value: $value" . "<br>";
    }

    + For :
    array_values($tenmang): trả ra mảng có các phần tử là giá trị của key trong mảng liên hợp
    array_keys($tenmang): trả ra mảng có các phần tử là key trong mảng liên hợp
    Có thể sử dụng 1 trong 2 cách trên

    for ($i=0; $i < count(array_keys($arr)); $i++) { 
        echo array_values($arr)[$i] . " ";
    }

    (*) Một cơ số cách làm việc với mảng
*/

    $arr = [
        "toi" => "I",
        "yeu" => "love",
        "em" => "you",
        2023 => "Very Much",
        "2" => "Gì gì đó"   // ( mặc dù key này khai báo kiểu string nhưng php sẽ tự động định nghĩa sang kiểu số nguyên)
    ];
    var_dump($arr);

    echo "<br>" . $arr["toi"];

    echo "<hr> In ra 1 câu hoàn chỉnh: I love you Very Much <br>";
    echo $arr["toi"] . " " . $arr["yeu"] . " " . $arr["em"] . " " . $arr[2023];

    echo "<hr>";
    foreach ($arr as $key) {
        echo $key . " ";
    }

    echo "<hr>";
    foreach ($arr as $key => $value) {
        echo "Key: $key - Value: $value" . "<br>";
    }

    echo "<hr>";
    for ($i=0; $i < count(array_values($arr)); $i++) {
        echo array_keys($arr)[$i] . " ";
    }

    echo "<hr>";

    // Một cơ số cách làm việc với mảng
    // In ra các giá trị trong mảng
    $numArr = [1,2,3,4,5,6,7,8,9,10];
    echo implode(" - ", $numArr) . "<br>"; // convert array to string
    
    
    // Thay thế giá trị của 1 phần tử trong mảng
    echo "<hr>";
    $numArr[4] = "abc";
    print_r($numArr);
    
    // Thêm phần tử vào cuối mảng
    echo "<hr>";
    $numArr[] = 22;
    array_push($numArr, "numnum");
    print_r($numArr);

    // Tính tổng các phần tử trong mảng
    echo "<hr>";
    $sum = array_sum($numArr);
    echo $sum;

    // Tìm giá trị lớn nhất / nhỏ nhất trong mảng
    echo "<hr> Giá trị lớn nhất trong mảng là " . max($numArr);
    echo "<hr> Giá trị nhỏ nhất trong mảng là " . min($numArr);

    // Sắp xếp theo thứ tự tăng dần
    sort($numArr);

    // Sắp xếp theo thứ tự giảm dần
    arsort($numArr);

    // Chỉnh sửa mảng
    // array_splice($numArr, 3); // cắt mảng bắt đầu từ vị trí 3
    // array_splice($numArr, 3 , 2); // cắt mảng bắt đầu từ vị trí 3 di 2 phần tử
    array_splice($numArr, 0 , 1, "Abc"); // cắt mảng bắt đầu từ vị trí 0 đi 1 phần tử và thay thế phần tử mới có giá trị Abc
?>