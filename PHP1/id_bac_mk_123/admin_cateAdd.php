<?php
    ob_start(); 
    session_start();
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);

    include_once 'db.php';
    $sql = "select * from product_cate";
    // $sql = "select * from products join brands on products.product_id=brands.brand_id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="admin.css" />
        <title>Admin</title>
        <style>
            <?php 
                include 'admin.css';
            ?>
        </style>
        <script src="ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <a class="back-home" href="homepage.php">
                    <i class="fa-solid fa-chevron-left"></i>
                    <span>Trở về trang chủ</span>
                </a>
                <div class="logo">
                    <img class="logo__img" src="asset/images/logo.png" alt="" />
                </div>
                <ul class="menu">
                    <li class="menu__item <?php echo (strpos($page, 'cate') ? 'active__menu-item' : '') ?>" >
                        <a href="admin_cateList.php" class="menu__link" >Danh mục</a>
                    </li>
                    <li class="menu__item <?php echo (strpos($page, 'product') ? 'active__menu-item' : '') ?>" >
                        <a href="admin_productList.php" class="menu__link" >Sản phẩm</a>
                    </li>
                    <li class="menu__item <?php echo (strpos($page, 'news') ? 'active__menu-item' : '') ?>">
                        <a href="admin_newsList.php" class="menu__link">Tin tức</a>
                    </li>
                </ul>
            </div>
            <div class="main">
                <div class="main-header">
                    <h1 class="main-header__name">Trang quản trị</h1>
                    <div class="main-header__user">
                        <span class="user__name">Xin chào <?php echo strtoupper($_SESSION['username']);?></span>

                        <button class="user__log-out">
                            <a href="logout.php">Đăng xuất</a>
                        </button>
                    </div>
                </div>
                <div class="main-body">
                    <h1 class="text-center my-3">Thêm danh mục</h1>
                    <form class="border p-4 rounded" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tên danh mục</label>
                            <input class="form-control" type="text" name="product_cateName" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input class=" btn btn-success" type="submit" value="Thêm" name="btn_insert">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btn_insert'])) {
                            $cateInsert = $_POST['product_cateName'];
                            $sql_checkCateInsert = "select * from product_cate where product_cateName='$cateInsert'";
                            $result_checkCateInsert = $conn->query($sql_checkCateInsert);
                            if($result_checkCateInsert->rowCount()==0) {
                                $sql_addCate = "insert into product_cate value(null, '$cateInsert')";
                                $result_addCate = $conn->prepare($sql_addCate);

                                if($result_addCate->execute()) {
                                    header("Location:admin_cateList.php");
                                } else {
                                    echo "Không thêm được tin tức";
                                }
                            } else {
                                echo "Danh mục đã tồn tại";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    <script>
        CKEDITOR.replace('editor');
    </script>
    </body>
</html>
<?php 
    ob_end_flush();
?>
