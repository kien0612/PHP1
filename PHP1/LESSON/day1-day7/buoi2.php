<?php
/*      CẤU TRÚC CÂU ĐIỀU KIỆN
    1. IF - ELSE ( Nếu - Ngược lại)
    if (điều kiện) {
        thực hiện công việc
    }else {
        thực hiện công việc
    }

    2. IF - ELSE - IF
    if (điều kiện) {
        thực hiện công việc
    }else if (điều kiện){
        thực hiện công việc
    }else if ( condition n )...{
        thực hiện công việc
    }else {
        thực hiện công việc
    }

    3. SWITCH - CASE

    BT1: Kiểm tra 1 số cho trước là số chẵn hay só lẻ
        In ra "Số là số chẵn hoặc lẻ"
*/
    $checkNumber = 5;
    if ($checkNumber % 2 == 0){
        echo "Số " . $checkNumber . " là số chẵn";
    }else {
        echo "Số " . $checkNumber . " là số lẻ";
    }
    echo "<hr>";

    // Bài 1: Giải PT bậc 1: ax + b = 0
    $a = 0;
    $b = 1;
    $x;

    if ($a == 0){
        if ($b == 0){
            echo "Pt vô số nghiệm !";
        }else {
            echo "Pt vô nghiệm !";
        }
    }else {
        if ($b == 0){
            $x = 0;
            echo "Pt có  nghiệm x = " . $x;
        }else {
            $x = -$b/$a;
            echo "Pt có  nghiệm x = " . $x;
        }
    }

/*
    TOÁN TỬ 3 NGÔI
    Điều kiện ? Giá trị true : Giá trị False ;

    BTVN:
    Bài 2: Cho họ tên,năm sinh và giới tính (nam 0 / nữ 1) của nyc
    Kiểm tra xem nyc đã đủ tuổi đi nghĩa vụ quân sự hay chưa ?
    "Ông/Bà có/không đủ tuổi đi nghĩa vụ quân sự"
    Ông/Bà lấy từ giới tính là 0/1
    Tuổi = năm hiện tại - năm sinh
    gợi ý :get current year in PHP
    Tuổi >= 18 & <= 27 thì đủ tuổi đi NVQS
*/
    echo "<hr>";

    $hoten = "Ngo Thi Dung";
    $namsinh = 2002;
    $gioitinh = 1;
    // get current year in PHP : date("Y");
    $tuoi = date("Y") - $namsinh;
    echo ($tuoi >= 18 && $tuoi <= 27) ? (($gioitinh == 1) ? "Bà " : "Ông ") . $hoten . " đủ tuổi đi NVQS !" : (($gioitinh == 0) ? "Ông " : "Bà ") . $hoten . " không đủ tuổi đi NVQS !";

    $checkGioiTinh = $gioitinh == 0 ? "Ông" : "Bà";
    $checkTuoi = $tuoi >= 18 && $tuoi <= 27 ? "Đủ" : "Không đủ";
    echo "$checkGioiTinh $checkTuoi tuổi đi nvqs !";

    // if ($tuoi >= 18 || $tuoi <= 27){
    //     if ($gioitinh == 1){
    //         echo "Bà " . $hoten . " đủ tuổi đi NVQS !"; 
    //     }else {
    //         echo "Ông " . $hoten . " không đủ điều kiện đi NVQS !";
    //     }
?>