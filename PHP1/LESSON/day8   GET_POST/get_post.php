<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các phương thức HTTP</title>
</head>

<body>
    <!-- action : nơi dữ liệu được gửi đến khi ấn submit
    Nếu bỏ trống thì dữ liệu sẽ xử lí ở ngay trang hiện tại -->

    <!-- method: xác định phương thức HTTP gửi dữ liệu -->
    <form action="#">
        <input type="text" name="test">
        <!-- name là tên của các trường input , nó sẽ xác định tên
        của trường dữ liệu khi gửi dữ liệu lên máy chủ -->
    </form>

    <h1>Phương thức GET</h1>
    <!-- 
        GET
        - Dữ liệu dược truyền lên URL và sẽ hiển thị trực tiếp trong URL
        - Truyền dữ liệu đi nhanh hơn post
        - Thường được sử dụng ở các tác vụ nhỏ không cần đến độ bảo mật cao 
        (Search , truyền dữ liệu qua lại giữa các trang )

        POST
        - Gửi dữ liệu ngầm k cần thông qua URL
        - Dữ liệu sẽ được gửi ngầm lên phía server, không thể nhìn thấy
        - Không giới hạn độ dài dữ liệu
        - Thường được sử dụng cho các tác vụ lớn cần đén độ bảo mật cao
        ( đăng nhập, quản lí thông tin, ..)
     -->
    <form action="test.php" method="GET">
        <label for="">Họ tên</label>
        <input type="text" name="name" placeholder="Enter your name">
        <label for="">Mã SV</label>
        <input type="text" name="ma_sv" placeholder="Enter Student Code">
        <button type="submit">Gửi</button>
    </form>

    <?php
    // Trường hợp GET
    // Dữ liệu sẽ được truyền lên thanh URL , trả về mảng liên hợp
    // var_dump($_GET); // dùng để lấy ra toàn bộ dữ liệu đẩy lên thanh URL

    // Cách để lại ra giá trị $tenphuongthuc["ten key"];
    // echo "<br>" . $_GET["name"

    // Trước khi sử dụng dữ liệu chúng ta càn phải kiểm tra nó đã tồn tại hay chưa
    if (isset($_GET["name"]) && isset($_GET["ma_sv"])) {
        $name = $_GET["name"];
        $ma_sv = $_GET["ma_sv"];
        echo $name . $ma_sv;
    }
    ?>

    <h1>Phương thức POST</h1>
    <form action="test.php" method="POST">
        <label for="">Họ tên</label>
        <input type="text" name="name" placeholder="Enter your name">
        <label for="">Mã SV</label>
        <input type="text" name="ma_sv" placeholder="Enter Student Code">
        <button type="submit">Gửi</button>
    </form>
    <?php
    var_dump($_POST);

    if (isset($_POST["name"]) && isset($_POST["ma_sv"])) {
        $name = $_POST["name"];
        $ma_sv = $_POST["ma_sv"];
        echo $name . $ma_sv;
    }

    // Cách lấy ra thông tin
    echo "<br>" . $_POST["name"];
    ?>
 
    <!-- Sử dụng phương thức post nhập vào 2 số . tính phương trình bậc 1 ( ax + b = 0)
    Hiển thị két quả ra 1 trang khác như sau. Phương trình bậc 1 là ?x+ ? = 0 Có nghiệm là ...
    -->
    <h1>PT bậc 1: ax + b = 0</h1>
    <form action="test2.php" method="POST">
        <input type="number" name="a" placeholder="Enter variable a">
        <input type="number" name="b" placeholder="Enter variable b">
        <button type="submit">Calculating</button>
    </form>
    
    <?php
    
    ?>
</body>

</html>