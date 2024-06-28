<?php
    require_once 'conn.php';

    if (isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT *FROM image WHERE id_image = '$id'";
        $stmt = $connect->query($sql);
        $img = $stmt->fetch();  
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $image = $_FILES['image'];
        $image_name = $_POST['image'];
        print_r($image);

        // nếu thêm 1 file mới 
        if ($image['size'] > 0){
            $image_name = $image['name'];
            move_uploaded_file($image['tmp_name'], 'img/' . $image_name);
        }
        
        $sql_edit = "UPDATE image SET image_name = '$image_name' WHERE id_image = '$id'";
        $stmt_edit = $connect->prepare($sql_edit);
        $stmt_edit->execute();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa ảnh</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="">image</label>

        <input type="hidden" name="image" value="<?= $img['image_name'] ?>">
        <input type="file" name="image" accept="image/"> <br>

        <label for="">Ảnh cũ</label>
        <img width="100px" src="img/<?= $img['image_name'] ?>" alt="">
        <button type="submit">Sửa</button>
    </form>
</body>
</html>