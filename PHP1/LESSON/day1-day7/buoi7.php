<?php
/*
    MẢNG ĐA CHIỀU
    -  Là 1 mảng CHÚA 1 HOẶC NHIỀU MẢNG BÊN TRONG NÓ

    (*) MẢNG TUẦN TỰ 2 CHIỀU
    In ra giá trị :
    Cú pháp :
    $arr[vị trí mảng muốn truy cập][vị trí phần tử muốn lấy]

    Duyệt mảng:
    + ForEach:
    foreach ($arr as $row) {
        foreach ($row as $value) {
            echo $value . ", ";
        }
    }

    foreach ($arr as $key => $row) {
        print_r($row);
        echo "<br>";
        foreach ($row as $key2 => $value) {
            echo "[$key][$key2]:  $value";
            echo "<br>";
        }
    }

    (*) MẢNG LIÊN HỢP 2 CHIỀU
    In ra giá trị:
    + Cú pháp:
    $tenmang[vị trí mảng muốn truy cập][key]

    Duyệt mảng:
    foreach ($arr as $row) {
        foreach ($row as $value) {
            echo $value . ", ";
        }
    }    

    foreach ($student as $key => $row) {
        foreach ($row as $key2 => $value) {
            echo "[$key][$key2]:  $value";
            echo "<br>";
        }
    }
*/
$arr = [
    [1, 2, 3],
    [4, 5, 6],
    ['abc', 'xyz']
];

echo $arr[0][1];

echo "<hr> In ra các giá trị sau trong mảng : 3, 4, 6, 'abc' <br>";
echo $arr[0][2] . ", " . $arr[1][0] . ", " . $arr[1][2] . ", " . $arr[2][0];
echo "<hr>";

foreach ($arr as $row) {
    foreach ($row as $value) {
        echo $value . ", ";
    }
}

echo "<hr> In ra [vị_trí_của_mảng][vị_trí_phần_tử]: giá trị <br>";
foreach ($arr as $key => $row) {
    print_r($row);
    echo "<br>";
    foreach ($row as $key2 => $value) {
        echo "[$key][$key2]:  $value";
        echo "<br>";
    }
}

$student = [
    [
        "name" => "Nguyễn Văn A", // Các key là duy nhất không được trùng nhau
        "age" => 18,
        "diemTB" => 7
    ],
    [
        "name" => "Nguyễn Văn B",
        "age" => 15,
        "diemTB" => 8
    ],
    [
        "name" => "Nguyễn Văn C",
        "age" => 16,
        "diemTB" => 10
    ]
];

echo "<hr>" . $student[0]["name"];

echo "<hr> Lấy ra thông tin của hs thứ 3 <br>";
echo $student[2]["name"];
echo $student[2]["age"];
echo $student[2]["diemTB"];
echo "<br>";

foreach ($student as $key => $row) {
    foreach ($row as $key2 => $value) {
        echo "[$key][$key2]:  $value";
        echo "<br>";
    }
}
$count = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            text-align: center;
            width: 200px;
            padding: 3%;
        }
    </style>
</head>

<body>
    <div class="">
        <h1 style="<?php echo "color: red"; ?>"><?php echo "Hello World !" ?></h1>
        <input type="radio" <?php echo "checked"; ?>>
        <hr>
        <!-- LAB4: Hiển thị thông tin student dưới dạng bảng  
            Nếu điểm >= 8 thì sinh viên có background màu đỏ
            Tạo thêm 1 cột trạng thái . Nếu tuổi < 18 thì hiển thị "đi tù" ngược lại là "cưới" ( Tạo thêm 1 cột trạng thái sử dụng tt 3 ngôi )
        -->
        <table border="1">
            <h3><?php echo "LAB 4: Bảng thông tin sinh viên"?></h3>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Tuổi</th>
                <th>Điểm TB</th>
                <th>Trạng thái</th>
            </tr>
            <?php foreach ($student as $value) : ?>
                <tr style="<?php echo ($value["diemTB"] >= 8) ? "background-color: red; color: white;" : ""; ?>">
                    <td><?php echo $count = $count + 1; ?></td>
                    <td><?php echo $value["name"]; ?></td>
                    <td><?php echo $value["age"]; ?></td>
                    <td><?php echo $value["diemTB"]; ?></td>
                    <td><?php echo ($value["age"] < 18) ? "Bóc lịch" : "Cưới ngay thôi"; ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>