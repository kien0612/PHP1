<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigment 1 _ Longlhph31572</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        th,
        td {
            text-align: center;
            padding: 1% 3%;
            height: 5%;
            width: 200px;
        }
        
        button {
            background-color: rgba(85, 85, 85, 0.95);
            color: white;
        }

        button:hover,
        button:active {
            background-color: #ff5f17;
            transition: 0.5s ease-in-out;
        }
    </style>
</head>

<body class="p-5">
    <p class="fs-5 mb-5 text-uppercase">Name: Lương Hoàng long <br> Std code: PH31572</p>
    <?php
    // Tạo danh sách thông tin các chuyến bay
    $flight_array = [
        [
            "flight_number" => "VN123",
            "departure" => "Hanoi",
            "destination" => "Ho Chi Minh City",
            "total_passenger" => 150,
            "depart_time" => "2023-07-06 08:00:00",
            "arrival_time" => "2023-07-06 10:30:00"
        ],
        [
            "flight_number" => "VN123",
            "departure" => "Ho Chi Minh City",
            "destination" => "Hanoi",
            "total_passenger" => 150,
            "depart_time" => "2023-07-06 18:00:00",
            "arrival_time" => "2023-07-06 22:30:00"
        ],
        [
            "flight_number" => "SQ456",
            "departure" => "Singapore",
            "destination" => "Tokyo",
            "total_passenger" => 200,
            "depart_time" => "2023-07-07 14:30:00",
            "arrival_time" => "2023-07-07 19:00:00"
        ],
        [
            "flight_number" => "SQ456",
            "departure" => "Tokyo",
            "destination" => "Singapore",
            "total_passenger" => 200,
            "depart_time" => "2023-07-07 22:30:00",
            "arrival_time" => "2023-07-08 03:00:00"
        ],
        [
            "flight_number" => "UA789",
            "departure" => "New York",
            "destination" => "Los Angeles",
            "total_passenger" => 180,
            "depart_time" => "2023-07-08 10:00:00",
            "arrival_time" => "2023-07-08 12:00:00"
        ],
        [
            "flight_number" => "UA789",
            "departure" => "Los Angeles",
            "destination" => "New York",
            "total_passenger" => 180,
            "depart_time" => "2023-07-08 16:00:00",
            "arrival_time" => "2023-07-08 18:00:00"
        ],
        [
            "flight_number" => "QF321",
            "departure" => "Sydney",
            "destination" => "Melbourne",
            "total_passenger" => 120,
            "depart_time" => "2023-07-09 09:00:00",
            "arrival_time" => "2023-07-09 10:30:00"
        ],
        [
            "flight_number" => "QF321",
            "departure" => "Melbourne",
            "destination" => "Sydney",
            "total_passenger" => 120,
            "depart_time" => "2023-07-09 14:00:00",
            "arrival_time" => "2023-07-09 15:30:00"
        ]
    ];

    $count = 0;
    ?>
    <div class="mt-3">
        <p><strong>Bài 1: </strong> Tạo 1 mảng liên hợp 2 chiều giả lập thông tin danh sách các chuyến bay gồm các
            thông tin sau: (3điểm) <br>
            (so_hieu_chuyen_bay, noi_di, noi_den, tong_hanh_khach, thoi_gian_di, thoi_gian_den)
             Lưu ý: (thoi_gian_di,thoi_gian_den) để định dạng YYYY-mm-dd HH:mm:ss (Ví
            dụ 2022-12-06 12:00:00);
        </p>
        <table border="1">
            <tr style="background-color : rgba(85,85,85,0.9); color: white;">
                <th style="border: 1px solid #353535;">Flight Order</th>
                <th style="border: 1px solid #353535;">Plane Number</th>
                <th style="border: 1px solid #353535;"> Departure</th>
                <th style="border: 1px solid #353535;"> Destination</th>
                <th style="border: 1px solid #353535;">Passenger</th>
                <th style="border: 1px solid #353535;"> Depart Time</th>
                <th style="border: 1px solid #353535;"> Arrival Time</th>
            </tr>
            <?php foreach ($flight_array as $flight) : ?>
                <tr>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $count = $count+1; ?></td>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $flight["flight_number"]; ?></td>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $flight["departure"]; ?></td>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $flight["destination"]; ?></td>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $flight["total_passenger"]; ?></td>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $flight["depart_time"]; ?></td>
                    <td style="border: 1px solid rgba(85,85,85,0.85)"><?php echo $flight["arrival_time"]; ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <div class="mt-3">
        <p class="m-0"><strong>Bài 2: </strong>Tạo 1 form cho người dùng nhập các thông tin sau: (2 điểm)
            (Số hiệu chuyến bay, Thời gian đi, Thời gian đến, Nút tìm kiếm).</p>

        <form action="checktest.php" class="d-flex flex-column w-25 mt-3 p-3 border border-secondary rounded-3 mb-5" method="POST">
            <p class="fs-3 m-0 mb-3">Search Flight Form</p>
            <div class="inbox w-100 d-flex flex-column align-items-start">
                <label for="flight_number">Flight Number :</label>
                <input class="w-100 p-2" type="text" id="flight_number" name="flight_number_input" placeholder="Enter Flight Number"><br>
            </div>
            <div class="inbox w-100 d-flex flex-column align-items-start">
                <label for="depart_time">Depart Time :</label>
                <input class="w-100 p-2" type="datetime-local" id="depart_time" name="depart_time_input"><br>
            </div>
            <div class="inbox w-100 d-flex flex-column align-items-start">
                <label for="arrival_time">Arrival Time :</label>
                <input class="w-100 p-2" type="datetime-local" id="arrival_time" name="arrival_time_input"><br>
            </div>
            <button class="p-2 ps-3 pe-3 border-0" type="submit">Search</button>
        </form>
    </div>
</body>

</html>