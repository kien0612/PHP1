<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST["name"]) && isset($_POST["ma_sv"])) {
        $name = $_POST["name"];
        $ma_sv = $_POST["ma_sv"];
    }
    ?>
    <h1 style="color: red;"><?php echo $name ?></h1>
    <h2><?php echo $ma_sv ?></h2>
</body>

</html>