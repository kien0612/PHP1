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
                    <h1 class="text-center my-3">Thêm sản phẩm</h1>
                    <form class="border p-4 rounded" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="pro_name" placeholder="Nhập tên">
                        </div>
                        <div class="form-group">
                            <label for="file">Hình ảnh</label>
                            <input type="file" id="file" name="pro_img" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá</label>
                            <input class="form-control" type="number"name="pro_price" placeholder="Nhập giá">
                        </div>
                        <div class="form-group">
                            <label for="name">Số lượng</label>
                            <input class="form-control" type="number"name="pro_quantity" placeholder="Nhập số lượng">
                        </div>
                        <div class="form-group">
                            <label for="name">Thông tin</label>
                            <!-- <input class="form-control" type="text" name="pro_description" placeholder="Nhập miêu tả"> -->
                            <textarea name="pro_description" id="editor" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Danh mục</label>
                            <select class="form-control" id="brand_id" name="pro_cate">
                                <?php
                                    foreach($result as $row) {
                                    ?>
                                        <option value="<?php echo $row['product_cateID']?>"><?php echo $row['product_cateName']?></option>
                                    <?php        
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input class=" btn btn-success" type="submit" value="Thêm" name="btn_insert">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btn_insert'])) {
                            echo "Da submit";
                            $name_pro=$_POST['pro_name'];
                            $price_pro=$_POST['pro_price'];
                            $quantity_pro=$_POST['pro_quantity'];
                            $description_pro=$_POST['pro_description'];
                            $cate_pro=$_POST['pro_cate'];


                            $img_pro=$_FILES['pro_img']['name'];
                            $tmp_img=$_FILES['pro_img']['tmp_name'];
                            $size_img=$_FILES['pro_img']['size'];
                            $type_img=$_FILES['pro_img']['type'];
                            
                            $allowed_filetypes = array('image/jpeg','image/jpg', 'image/png',);
                        
                        if ($size_img <= 1000000 && (in_array($type_img, $allowed_filetypes))) {
                            // Đẩy ảnh client->server
                            move_uploaded_file($tmp_img, "asset/images/products/".$img_pro);
                            
                            
                            $sql_insert="insert into products value(null, '$name_pro', '$img_pro', '$price_pro', $quantity_pro, '$description_pro', $cate_pro)";
                            $result=$conn->prepare($sql_insert);
                            if($result->execute()) {
                                // echo "Thêm dữ liệu thành công";
                                header("Location:admin_productList.php");
                            } else {
                                echo "Không thêm được sản phẩm";
                            }
                        } else {
                            echo "Ảnh không hợp lệ";
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
