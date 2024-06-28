<?php
    require_once 'conn.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $image = $_FILES['image'];
        print_r($image);

        $image_name = $image['name'];
        move_uploaded_file($image['tmp_name'], 'img/' . $image_name);
        
        $sql = "INSERT INTO image VALUES (null,'$image_name')";
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm ảnh</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">image</label>
        <input type="file" name="image" accept="image/">
        <button type="submit">Thêm</button>
    </form>
</body>
</html>