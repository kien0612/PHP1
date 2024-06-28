<?php
/*
    <!-- Web tĩnh: Trang web tĩnh hay trang cố định là trang web được gửi đến trình duyệt web của người dùng chính xác như nó được lưu trữ,[1]
     trái ngược với trang web động được tạo bởi ứng dụng web.[2]

    Wed động : Web động hay còn được biết đến với cái tên Dynamic web được hiểu đơn giản là một dạng website có thể thay đổi nội dung
     thường xuyên, cập nhật thông tin liên tục và tự động. Khác với web tĩnh, web động giúp nhà doanh nghiệp cũng như khách hàng có thể 
     chủ động hơn trong việc lựa chọn và cập nhật thông tin mỗi ngày. -->
    
     <!-- PHP : dùng để xây dựng lên 1 ứng dụng web -->
*/

    // CÁCH KHAI BÁO BIẾN
    // Tât cả các biến của php đều khai bắt băt đầu = $
    // kết thúc 1 câu lệnh phải có ;
    // khai báo biến : $tenbien = giá trị;
    $a = 5;

    // HIỂN THỊ ĐẦU RA
    // Cách 1: sử dụng echo
    echo $a;

    // Cách 2: sử dụng print
    print $a;

    // sử dụng tương tự như echo nhưng trong quá trình in ra print sẽ chậm hơn
    // => Nên sử dụng echo

    // Cách chạy 1 dự án php
    // localhost:cổng/tên thư mục trong htdocs/tên file muốn chạy

    // Gán chuỗi sử dụng dấu .
    $a = 5;

    // Xuống dòng sử dụng in thẻ <br>: echo "<br>"
    echo "<br>";
    echo "Số ". $a . " là số lẻ ";
    $b = 6;
    echo "<br>";
    // Hiển thị một lúc nhiều giá trị
    echo $a, $b;

    // Các kiểu dữ liệu
    // PHP sẽ tự động hiểu kiểu dữ liệu của giá trị theo từng tình huống , trường hợp sử dụng

    // Kiểu số nguyên
    $myNumber = 2004;

    // Kiểu số thực
    $myFloat = 5.5;

    // Kiểu chuỗi (string)
    $myString = "Hello World !";

    // Kiểu Boolean (true/false)
    $myTrue = true;  // hoặc false

    // Kiểu null
    $myNull = null;

    // Kiểu array (mảng)

    // BT: Khai báo thông tin của 3 nyc gồm (họ tên, năm sinh, sdt).
    //  Mỗi thuộc tính khai báo 1 biến. Mỗi thông tin in ra 1 dòng riêng biệt. Các thuộc tính được ngăn cách bởi dấu gạch ngang\
    echo "<br>";
    echo "<br>";
    echo "Bài tập nho nhỏ :D";
    echo "<br>";
    echo "<br>";
    $tennyc1 = "Dung";
    $namsinhnyc1 = 2002;
    $sdtnyc1 = "0346540479";

    $tennyc2 = "Lan";
    $namsinhnyc2 = 2004;
    $sdtnyc2= "03465404798";
    
    $tennyc3 = "Phuong";
    $namsinhnyc3 = 2002;
    $sdtnyc3 = "0346540479";

    echo "Thông tin nyc 1";
    echo"<br>";
    echo "Tên: " . $tennyc1 . " - Năm sinh:  " . $namsinhnyc1 . " - SDT:  " . $sdtnyc1;
    echo "<br>";    
    echo "----------------------------------------------------------------------------";
    echo "<br>";

    echo "Thông tin nyc 2";
    echo"<br>";
    echo "Tên: " . $tennyc2 . " - Năm sinh:  " . $namsinhnyc2 . " - SDT:  " . $sdtnyc2;
    echo "<br>";
    echo "----------------------------------------------------------------------------";
    echo "<br>";

    echo "Thông tin nyc 3";
    echo"<br>";
    echo "Tên: " . $tennyc3 . " - Năm sinh:  " . $namsinhnyc3 . " - SDT:  " . $sdtnyc3;

    /* TOÁN TỬ
    1. Toán tử số học:
        + : Cộng
        - : Trừ
        * : Nhân
        / : Chia
        % : Chia lấy dư
        ** : Bình phương

    2. Toán tử so sánh:
         > : lớn hơn
         < : Nhỏ hơn
         >= : Lớn hơn hoặc bằng
         <= : Nhỏ hơn hoặc bằng
         == : Bằng
         <> : Khác
         <=> : x <=> y ( trả về 0 : x = y )
                       ( trả về -1: x < y )
                       ( trả về 1: x > y )
         != : Không bằng
         !== : So sánh không bằng tuyệt đối đến kiểu dữ liệu hoặc giá trị
         ===: So sánh bằng tuyệt đối đến kiểu dữ liệu và giá trị

    3. Toán tử Logic:
        && : xảy ra đồng thời ( và )
        || :  xảy ra 1 trong 2 ( hoặc )

    4. Toán tử gán:
        x = y : gán giá trị y cho x
        x += y : x = x + y  cộng thêm giá trị y cho x
        x -= y : x = x - y  trừ đi giá trị y của x
        x *= y : x = x * y  nhân thêm y lần cho x
        x /= y : x = x / y  chia y lần giá trị cho x
        x %= y : x = x % y  chia lấy phần dư giá trị x
    
    5. Toán tử tăng giảm
        ++a : giá trị + thêm 1 ngay lập tức
        a++ : trả về giá trị ban đầu
        --a : giá trị - đi 1 ngay lập tức
        a-- : trả về giá trị ban đầu
    */
?>