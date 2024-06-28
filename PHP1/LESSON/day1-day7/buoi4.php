<?php
/*
    ÔN TẬP HÀM
    - Hàm là một khối lệnh có thể tái sử dụng nhiều lần
    - hàm chỉ được thực thi khi gọi đến nó

    - Cách tạo hàm:
    function ten_ham () {
        khối lệnh thực thi
    }

    1. Hàm có tham số :
    - Hàm trả về ( trả về 1 kết quả cụ thể , có lệnh return )
    - Hàm không trả về
    
    BT: Viết 1 hàm trả về có tham só thực hiện công việc cộng 2 số
*/
    function sum ($a,$b) {
        return $a+$b;
    }
    // Gọi hàm 
    echo sum(5,5);
    echo "<br>";

/*
    2. Hàm không trả về có tham số ( không có return )
*/
    function xinchao ($name) {
        echo "Xin chào, ". $name;
    }
    echo xinchao("Dung");

/*
    3. Hàm trả về không có tham số
    BT: Viết 1 hàm trả về 1 số ngẫu nhiên không có tham số truyền vào
    rand(giá trị bắt đâu, giá tri kết thúc);
*/
    echo "<br>";    
    function randNumber () {
        $randomNumber = rand(0,100);
        return $randomNumber;
    }
    echo randNumber();
/*
    4. Hàm không trả về không có tham số
*/
    function sayHello() {
        echo "Chào mừng đến với bình nguyên vô tận !";
    }
    echo sayHello();
/*
    LAB3:
    BT1: Sử dụng hàm không trả về có tham số tính giải phương trình bậc 1
    BT2: Sử dụng hàm trả về có tham só . Tính diện tính hình thang
    BT3: Kiểm tra số truyền vào có phải là số nguyên tố hay không. Làm bằng hai cách trả về và không trả về
*/

    echo "<hr>";
    $randomNumber = rand(0,100);
    echo "LAB 3 . Bài 1: ( Hàm k trả về có tham số ) Giải phương trình bậc 1: ax + b = 0 <br>";
    function equation1($a , $b){
        echo "";
        if ($a == 0){
            if ($b == 0){
                echo "Phương trình vô số nghiệm !";
            }else {
                echo "Phương trình vô nghiệm !";
            }
        }else {
            if ($b == 0){
                $x = 0;
                echo "Phương trình có nghiệm x = " . $x;
            }else {
                echo "Phương trình có nghiệm x = " . -$b/$a;
            }
        }
    }
    echo equation1(0,0);
    
    echo "<hr>";
    echo "LAB 3 . Bài 2: ( Hàm trả về có tham số ) Tính diện tích hình thang S = ((a+b)/2) * h <br>";
    function trapezoidalArea($a , $b, $h) {
        return "Diện tích hình thang = " . (($a + $b)/2) * $h . " cm^2";
    }
    echo trapezoidalArea(0,1,2);

    echo "<hr>";
    echo "LAB 3 . Bài 3: ( 2 cách ) Kiểm tra số truyền vào có phải số ng tố ? <br>";
    function checkPrimeNumber_Return($n){
        if ($n < 2){
            return "Số " . $n . " k phải là số ng tố !";
        }
        for ($i = 2; $i <= sqrt($n); $i++){
            if ($n % $i == 0){
                return "Số " . $n . " k phải là số ng tố !";
            }
        }
        return "Số " . $n . " là số ng tố !";
    }
    echo "Cách 1: Trả về <br>";
    echo checkPrimeNumber_Return(rand(0,100));
    echo "<br>";

    function check_No_Return($n){
        $count = 0;
        if ($n < 2){
            echo "Số " . $n . " k phải là số ng tố !";
        }
        
        for ($i = 2; $i <= sqrt($n); $i++){
            if ($n % $i == 0){
                $count++;
                break;
            }
        }

        if ($count==1){
            echo "Số " . $n . " không phải là số ng tố";
        }else {
            echo "Số " . $n . " là số ng tố !";
        }
     }
    echo "Cách 2: Không Trả về <br>";
    echo check_No_Return(rand(0,50));
    echo "<hr>";
?>