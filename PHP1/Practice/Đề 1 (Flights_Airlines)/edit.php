<?php
    require 'connection.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $get_airlines = "SELECT * FROM airlines";
    $airline = $connect->query($get_airlines)->fetchAll();

    $sql = "SELECT f.*, a.airline_name FROM flights f INNER JOIN airlines a ON f.airline_id = a.airline_id WHERE flight_id = '$id'";
    // $sql = "SELECT * FROM flights";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    $flights = $stmt->fetch(PDO::FETCH_ASSOC);
    echo  "<hr>";
    print_r($flights);

    $err = [];

    // if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['submit'])){
        $flight_number = $_POST['flight_number'];
        $total_passengers = $_POST['total_passengers'];
        $description = $_POST['description'];
        $airline_id = $_POST['airline_id'];

        $file_name = $_POST['file'];
        $file = $_FILES['file'];
        
        echo $file_name;

        if (empty($flight_number)) {
            $err['flight_number'] = 'Số hiệu chuyến bay bắt buộc nhập';
        }

        if (empty($total_passengers) || $total_passengers < 0) {
            $err['total_passengers'] = 'Thực hiện validate total_passengers là số dương';
        }

        if ($file['size'] > 0){
            $file_name = $file['name'];
            move_uploaded_file($file['tmp_name'], "img/" . $file_name);
        }

        if (!$err) {
            $sql = "UPDATE flights SET flight_number = '$flight_number', image = '$file_name', total_passengers ='$total_passengers', description = '$description', airline_id = '$airline_id' WHERE flight_id = '$id'";
            $stmt = $connect->prepare($sql);
            $stmt->execute();
            setcookie('success', 'Thành Công', time() + 1);
            header('Location: index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h2>Thêm chuyến bay</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="inbox">
            <label for="">Số hiệu chuyến bay</label>
            <input type="text" name="flight_number" value="<?php echo $flights['flight_number'];?>">
        </div>
        <span style="color: red;"><?= isset($err['flight_number']) ? $err['flight_number'] : '' ?></span>
        <!------------------------------------------------------>
        <div class="inbox">
            <label for="">hình ảnh</label>
            <input type="hidden" name="file" value="<?php echo $flights['image'];?>">
            <input type="file" name="file" accept="image/">
        </div>
        <!------------------------------------------------------>
        <div class="inbox">
            <label for="">Hành khách</label>
            <input type="number" name="total_passengers" value="<?php echo $flights['total_passengers'];?>">
        </div>
        <span style="color: red;"><?= isset($err['total_passengers']) ? $err['total_passengers'] : '' ?></span>
        <!------------------------------------------------------>
        <div class="inbox">
            <label for="">Mô tả</label>
            <textarea name="description" id="" cols="30" rows="5"><?php echo $flights['description'];?></textarea>
        </div>
        <!------------------------------------------------------>
        <div class="inbox">
            <label for="">Mã hãng hàng không</label>
            <select name="airline_id" id="">
                <?php foreach ($airline as $value) { ?>
                    <option value="<?php echo $value['airline_id'] ?>"
                        <?= ($value['airline_id'] == $flights['airline_id']) ? 'selected' : '' ?>>
                        <?php echo $value['airline_name'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <!------------------------------------------------------>
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>