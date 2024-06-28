<?php include "test.php" ?>

<!DOCTYPE html>
<html lang="en">

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

<body>
    <div class="">
        <p><strong>Bài 3: </strong>
            Khi ấn nút tìm kiếm từ form sẽ gửi thông tin người dùng nhập lên PHP và xử lý
            các yêu cầu sau: <br>
            - Kiểm tra xem số hiệu chuyến bay, thời gian đi, thời gian đến của người dùng nhập
            vào nằm trong khoảng nào trong danh sách những chuyến bay có sẵn trong mảng. <br>
            TH1: Nếu thời gian đến và thời gian đi người dùng nhập vào nhỏ hơn thời gian đi
            của chuyến bay trong mảng (Hiển thị danh sách các chuyến bay ra mảng và ở trang
            thái : <u>Chưa bay- tô màu xanh)</u><br>
            TH2: Nếu thời gian đến và thời gian đi người dùng nhập vào lớn hơn thời gian đến
            của chuyến bay trong mảng (Hiển thị danh sách các chuyến bay ra mảng và ở trang
            thái : <u>Đã bay- tô màu đỏ)</u><br>
            TH3: Nếu thời gian đi hoặc thời gian đến người dùng nhập vào nằm trong thời
            gian bay của chuyến bay trong mảng (Hiển thị danh sách các chuyến bay ra mảng
            và ở trang thái : <u>Đã đang bay- tô màu vàng)</u>
        </p>
        <table border="1">
            <tr style="background-color:rgba(85, 85, 85, 0.95); color: white;">
                <th style="border: 1px solid white">Order Num</th>
                <th style="border: 1px solid white">Plane Number</th>
                <th style="border: 1px solid white">Departure</th>
                <th style="border: 1px solid white">Destination</th>
                <th style="border: 1px solid white">Passenger</th>
                <th style="border: 1px solid white">Depart-Time</th>
                <th style="border: 1px solid white">Arrival-Time</th>
                <th style="border: 1px solid white">Status</th>
            </tr>
            <?php
            if (
                // isset check the variables in "Search Form" are Null or don't exist !
                (isset($_POST['flight_number_input'])) &&
                (isset($_POST['depart_time_input'])) &&
                (isset($_POST['arrival_time_input']))
            ) {
                echo "<br> Searching for : <br>Plane Number: " . $_POST['flight_number_input'] .
                    " - Depart-Time: " . $_POST['depart_time_input'] . " - Arrive-Time: " . $_POST['arrival_time_input'];

                // strtotime() : convert datetime to unix time (timestamp) / a interger value
                $flight_number_input = $_POST["flight_number_input"];
                $depart_input = strtotime($_POST["depart_time_input"]);
                $arrive_input = strtotime($_POST["arrival_time_input"]);

                echo "<p class='fs-4 mt-3'>Result Below</p>";

                // declare a count variable for counting in foreach loop
                $count = 0;

                foreach ($flight_array as $key) {
                    if ($flight_number_input == $key['flight_number']) {
                        $count = $count + 1;
                        $depart = strtotime($key['depart_time']);
                        $arrive = strtotime($key['arrival_time']);
                        $check_status = "";
                        $change_background_status = "";
                        if ($depart_input < $depart && $arrive_input < $arrive) {
                            $check_status = "Haven't fly yet";
                            $change_background_status = "background-color: green; color: white";
                        } else if ($depart_input > $arrive && $arrive_input > $arrive) {
                            $check_status = "Flew";
                            $change_background_status = "background-color: red; color: white";
                        } else if (
                            ($depart_input >= $depart && $depart_input <= $arrive) ||
                            ($arrive_input >= $depart && $arrive_input <= $arrive)
                        ) {
                            $check_status = "Flying";
                            $change_background_status = "background-color: yellow";
                        }
                        echo "<tr style=" . "'$change_background_status'" . ">";
                        echo "<td style='border: 1px solid white'>" . $count . "</td>";
                        echo "<td style='border: 1px solid white'>" . $key['flight_number'] . "</td>";
                        echo "<td style='border: 1px solid white'>" . $key['departure'] . "</td>";
                        echo "<td style='border: 1px solid white'>" . $key['destination'] . "</td>";
                        echo "<td style='border: 1px solid white'>" . $key['total_passenger'] . "</td>";
                        echo "<td style='border: 1px solid white'>" . $key['depart_time'] . "</td>";
                        echo "<td style='border: 1px solid white'>" . $key['arrival_time'] . "</td>";
                        echo "<td style='border: 1px solid white'>" . $check_status . "</td>";
                        echo "</tr>";
                    }   
                }
            }

            ?>
        </table>
    </div>
</body>

</html>