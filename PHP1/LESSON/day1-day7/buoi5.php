<?php
/*
    MẢNG - ARRAY LIST
    $arr = [1, 2, 3, "abc", ...];
    - Mảng là 1 tập hợp các phần tử dùng để lưu trữ dữ liệu, nhiều dữ liệu trong 1 biến
    - Mảng trong PHP các phần tử có thể cùng hoặc k cùng kiểu dữ liệu ( giống JS )

    (*) Mảng có 2 thành phần :
    + Vị trí : Bắt đầu từ 0 đến n-1 ( n là tổng số phần tử trong mảng )
    + Giá trị :

    (*) Cách khai báo mảng
    + Cách 1: $tenmang = array(1,2,3,4,5);
    Sử dụng với các phiên bản PHP 5.4 trở về trước

    + Cách 2: $tenmang = [1,2,3,4,5];
    Sử dụng sau phiên bản 5.4

    (*) Hiển thị ra thông tin cấu trúc của mảng
    + Cách 1: print_r(tenmang);
    Chỉ hiện thị vị trí và giá trị của phần tử

    + Cách 2: var_dump($tenmang);
    Hiển thị thông tin chi tiết cấu trúc của mảng: số lượng phần tử, kiểu dữ liệu, độ dài phẩn tử nếu kiểu dữ liệu là string
    Thường sử dụng để debug

    (*) CÁC LOẠI MẢNG TRONG PHP
    1. Mảng rỗng:
    $array_rong = [];

    2. Mảng tuần tự
    - Là mảng các phẩn tử được xác định vị trí bắt đâu từ 0 đến n-1
    $phone = ["apple", "samsung", "xiaomi", "oppo"];

    3. Mảng liên hợp

    4. Mảng đa chiều

    (*) In ra các phần tử trong mảng
    Cú pháp:
    $tenmang[vị trí];
    echo $phone[1];

    + In ra bằng vòng lặp FOR
    // count($phone): dém tổng số phần tử có trong mảng = độ dài mảng
    for ($i = 0; $i < count($tenmang); $i++){
        echo $tenmang[$i];
    }

    + In ra bằng vòng lặp ForEach
    foreach($tenmang as $giá_trị){
        echo $giá_trị;
    }

    (*) Các hàm thao tác mảng
    + array_sum($tenmang): Tính tổng các giá trị trong mảng
    + count($tenmang): đếm số lượng các phần tử trong mảng = độ dài của mảng
    + max($tenmang): giá trị lớn nhất trong mảng
    + min($tenmang): giá trị nhỏ nhất trong mảng
*/
    $newArr = array(1,2,3,4,5);
    print_r($newArr);
    echo "<br>";

    $newArr2 = [1,2,3,"cục cưng",4];
    var_dump($newArr2);
    echo "<br>";

    $phone = ["apple", "samsung", "xiaomi", "oppo"];
    for ($i = 0; $i < count($phone); $i++){
        echo $phone[$i] . ", ";
    }
    echo "<br>";

    foreach($phone as $phone_name){
        echo $phone_name . ", ";
    }
/*
    BT:
    Bài 1: Khai báo 1 mảng gồm 10 phần tử là số nguyên. Hiển thị giá trị của các phần tử. Phần tử có giá trị là số lẻ
    Bài 2: Đếm và tính tổng các phàn tử có giá trị là số chẵn trong mảng
*/
    echo "<hr> Bài 1: <br>";
    $arr_10_number = [rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100),rand(0,100)];
    echo "Các phẩn tự có giá trị là số lẻ trong mảng : <br>";
    for ($i = 0; $i < count($arr_10_number); $i++){
        if ($arr_10_number[$i] % 2 != 0){
            echo $arr_10_number[$i] . ", ";
        }
    }

    echo "<hr> Bài 2: <br>";
    $count = 0;
    $sum = 0;
    echo "Các phẩn tự có giá trị số chẵn trong mảng : <br>";
    foreach ($arr_10_number as $key) {
        if ($key % 2 == 0){
            $sum += $key;
            echo $key . ", ";
            $count++;
        }
    }
    echo "<br>Số lượng phần tử là số chẵn có trong mảng : " . $count . "<br>";
    echo "Tổng giá trị các phần tử só chẵn có trong mảng : " . $sum;
/*
    Tìm giá trị lớn nhất trong mảng
*/
    echo "<hr> Bài tập : Tìm giá trị lớn nhất trong mảng <br>";
    $numArr = [
        rand(0,100),
        rand(0,100),
        rand(0,100),
        rand(0,100),
        rand(0,100),
        rand(0,100),
        rand(0,100),
    ];

    $max = 0;
    for ($i = 0; $i < count($numArr); $i++) {
        echo $numArr[$i] . ", ";
        if ($numArr[$i] > $max){
            $max = $numArr[$i];
        }
    }

    echo "<br> Số lớn nhất trong mảng: " .$max;
    echo "<br>". max($numArr);
    echo "<hr>";
?>