<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kế thừa</title>
</head>

<body>
    <?php
    /*
        Sự khác nhau
        (*) include : chèn nội dung từ tệp vào trang web, nếu tệp k tồn tại hoặc có lỗi
        nó sẽ chỉ hiện thị cảnh báo nhưng vẫn tiếp tục thực thi câu lệnh php

        (*) require : yêu cầu tệp phải tồn tại và chèn nội dung vào trang web
        Nếu tệp k tồn tại hoặc có lỗi sẽ ngừng thực thi toàn bộ doạn mã php và hiển thị lỗi

        (*) include_once : Chèn nội dung từ tệp vào trang web 1 lần duy nhất
        Nếu tệp đã được chèn trước đó , nó sẽ k chèn lại

        (*) require_once : yêu cầu tệp tồn tại và chèn nội dung vào trang web một lần duy nhât
        Nếu tệp đã được chèn trước đó , nó sẽ k chèn lại
    */


    // include : 
    // include 'header.php';
    // include 'header1.php';
    // echo "Đây là nội dung trang";
    // include 'footer.php';

    // require : 
    // require 'header.php';
    // require 'header1.php';
    // echo "Đây là nội dung trang";
    // require 'footer.php';

    // include_once : 
    include_once 'header.php';
    include_once 'header.php';
    include_once 'header.php';
    include_once 'header.php';
    include_once 'header1.php';
    echo "Đây là nội dung trang";
    include_once 'footer.php';

    // require_once : 
    require_once 'header.php';
    require_once 'header.php';
    require_once 'header.php';
    require_once 'header.php';
    require_once 'header1.php';
    echo "Đây là nội dung trang";
    require_once 'footer.php';
    ?>

</body>

</html>