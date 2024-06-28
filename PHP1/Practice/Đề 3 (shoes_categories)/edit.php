<?php
    require_once 'conn.php';

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM shoes WHERE shoe_id = '$id'";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->execute();
        $shoes = $stmt2->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $shoe_name = $_POST['shoe_name'];
        $image = $_FILES['image'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];

        $image_name = $_POST['image'];
        if ($image['size'] > 0){
            $image_name = $image['name'];
            move_uploaded_file($image['tmp_name'], 'img/' . $image_name);
        }

        $sql_update = "UPDATE shoes SET 
        -- shoe_id='$shoe_name',
        shoe_name='$shoe_name',
        image='$image_name',
        price='$price',
        category_id='$category_id' WHERE shoe_id = '$id'";

        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->execute();
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <h2>Add</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input">
            <label for="">shoe_name</label>
            <input type="text" name="shoe_name" value="<?= $shoes['shoe_name'] ?>">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="input">
            <label for="">image</label>
            <input type="file" name="image">
            <input type="hidden" name="image" value="<?= $shoes['image'] ?>">
            <img width="100px" src="img/<?= $shoes['image'] ?>" alt="">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="input">
            <label for="">price</label>
            <input type="text" name="price" value="<?= $shoes['price'] ?>">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="input">
            <label for="">category_id</label>
            <select type="text" name="category_id">
                <?php foreach ($categories as $c) { ?>
                    <option value="<?= $c['category_id'] ?>" <?= $shoes['category_id'] == $c['category_id'] ? 'selected' : '' ?>>
                    <?= $c['category_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- ---------------------------------------------- -->
        <button type="submit">Add</button>
    </form>
</body>
</html>