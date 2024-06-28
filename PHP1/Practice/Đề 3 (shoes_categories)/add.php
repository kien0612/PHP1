<?php
    require_once 'conn.php';

//     - categories (category_id, category_name)
// - shoes (shoe_id, shoe_name, image, price, category_id)

    // $sql = "SELECT s.* , c.category_name FROM shoes s INNER JOIN categories c ON s.category_id = c.category_id";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $shoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $sql = "SELECT * FROM categories";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $shoe_name = $_POST['shoe_name'];
        $image = $_FILES['image'];
        $price = $_POST['price'];
        $category_id = $_POST['category_id'];

        $image_name = $image['name'];
        move_uploaded_file($image['tmp_name'], 'img/' . $image_name);

        $sql_upload = "INSERT INTO shoes VALUES 
        (NULL, '$shoe_name', '$image_name', '$price', '$category_id')";
        $stmt_upload = $conn->prepare($sql_upload);
        $stmt_upload->execute();
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
            <input type="text" name="shoe_name">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="input">
            <label for="">image</label>
            <input type="file" name="image">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="input">
            <label for="">price</label>
            <input type="text" name="price">
        </div>
        <!-- ---------------------------------------------- -->
        <div class="input">
            <label for="">category_id</label>
            <select type="text" name="category_id">
                <?php foreach ($categories as $c) { ?>
                    <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- ---------------------------------------------- -->
        <button type="submit">Add</button>
    </form>
</body>
</html>