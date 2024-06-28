<?php
/*
    ÔN TẬP VÒNG LẶP
    Mục đích sử dụng: Muốn thực thi 1 khối lệnh lặp lại nhiều lần

    1. FOR
    - Sử dụng khi biết trước số lần lặp
    Cú pháp: 
    for ( giá trị khởi tạo ; điểm kết thúc ; bước nhảy ) {
        các khối lệnh thực thi;
    }

    BT: in ra màn hình lần lượt các số từ 0 - 10;
*/
    echo "Vòng lặp FOR <br>";
    for ($i = 0 ; $i <= 10 ; $i++){
        echo $i . "<br>";
    }
    echo "<hr>";
/*
    2. WHILE
    - Không cần biết số lần lặp mà khối lệnh sẽ chạy khi điều kiện vẫn còn là true
    */
    echo "Vòng lặp WHILE <br>";
    $a = 0 ;
    while ($a <= 10){
        echo $a . "<br>";
        $a++;   
    }
    echo "<hr>";
/*
    2. DO - WHILE
    - Thục thi khối lệnh trước sau đó mới kiểm tra đk
    - Nếu đk vẫn là true thì lại thực hiện tiếp khối lệnh
*/
    echo "Vòng lặp DO WHILE <br>";
    $b = 0;
    do {
        echo $b . "<br>";
        $b++;
    }while ($b <= 10);

/*
    LAB 2
    BT1: Tính tổng các số chẵn từ 1 - 100
    BT2: In ra màn hình bảng cửu chương 9
    BT3: Tìm các số nguyên tố < 100
*/
    echo "<hr>";

    echo "Bài Tập 1 <br>";
    $evenNumber = 0;
    $sumEvenNumber = 0;
    for ($i = 1; $i <= 100; $i++){
        if ($i % 2 ==0 ){
            echo $i . "<br>";
            $sumEvenNumber += $i;
        }
    }
    echo "Tổng các số chẵn từ 1 - 100 là " . $sumEvenNumber;

    echo "<hr>";
    echo "Bài Tập 2 <br>";
    $mutipleNumber = 9;
    for ($i = 1; $i <= 10; $i++){
        echo $mutipleNumber . " x " . $i . " = " . $mutipleNumber*$i . "<br>";
    }

    echo "<hr>";
    echo "Bài Tập 3 <br>";
    echo "Các số nguyên tố từ 0 - 100 là : <br>";
    for ($i = 2 ; $i <= 100; $i++){
        $count = 0;
        for ($j = 2; $j < $i; $j++){
            if ($i % $j == 0){
                $count++;
                break;
            }
        }
        if ($count == 0){
            echo $i . ", ";
        }
    }
?>