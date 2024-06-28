<?php
    ob_start(); 
    session_start();

    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
    
    include_once 'db.php';
    if ($_GET['pro_id']) {
        $productID = $_GET['pro_id'];
        $sql_getProductInfor = "select * from products join product_cate on products.product_cateID=product_cate.product_cateID where product_id=$productID";
        $result_getProductInfor = $conn->query($sql_getProductInfor)->fetch();
        
         $sql_showBrands = "select * from product_cate";
        $result_showBrands = $conn->query($sql_showBrands);
    }else {
        echo "Không tìm thấy sản phẩm";
    }  
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
                    <h1 class="text-center my-3">Cập nhập sản phẩm</h1>
                    <form class="border p-4 rounded" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tên sản phẩm</label>
                            <input class="form-control" type="text" name="pro_name" value="<?php echo $result_getProductInfor['product_name']?>" >
                        </div>
                        <div class="form-group">
                            <label for="file">Hình ảnh</label><br>
                            <img src="asset/images/products/<?php echo $result_getProductInfor['product_images']?>" style="width: 200px; margin-bottom: 10px;" alt=""><br>
                            <input type="file" id="file" name="pro_img" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Giá</label>
                            <input class="form-control" type="number"name="pro_price" value="<?php echo $result_getProductInfor['product_price']?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Số lượng</label>
                            <input class="form-control" type="number"name="pro_quantity" value="<?php echo $result_getProductInfor['product_quantity']?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Miêu tả</label>
                            <textarea name="pro_infor" id="editor" cols="30" rows="10" value="Hello"><?php echo $result_getProductInfor['product_infor']?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Thương hiệu</label>
                            <select class="form-control" id="pro_cateID" name="pro_cateID" >
                                <?php
                                    foreach($result_showBrands as $row) {
                                    ?>
                                        <option value="<?php echo $row['product_cateID']?>" <?php if($result_getProductInfor['product_cateID'] == $row['product_cateID']) echo "selected";?> >
                                            <?php echo $row['product_cateName']?>
                                        </option>
                                    <?php        
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <input class=" btn btn-success" type="submit" value="Cập nhập" name="btn_modify">
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btn_modify'])) {
                            echo "Da submit";
                            $name_pro=$_POST['pro_name'];
                            $price_pro=$_POST['pro_price'];
                            $quantity_pro=$_POST['pro_quantity'];
                            $infor_pro=$_POST['pro_infor'];
                            $cateID_pro=$_POST['pro_cateID'];
                            
                            // !isset($_FILES['pro_img'])
                            if($_FILES['pro_img']['name'] == "") {
                                $sql_update = "UPDATE products SET product_name='$name_pro', product_price='$price_pro', product_quantity='$quantity_pro', product_infor='$infor_pro', product_cateID='$cateID_pro' WHERE product_id= $productID";
                                $result=$conn->prepare($sql_update);
                                if($result->execute()) {
                                    echo "Thêm dữ liệu thành công";
                                    header("Location:admin_productList.php");
                                } else {
                                    echo "Không thêm được sản phẩm";
                                }
                            } else {
                                $img_pro=$_FILES['pro_img']['name'];
                                $tmp_img=$_FILES['pro_img']['tmp_name'];
                                $size_img=$_FILES['pro_img']['size'];
                                $type_img=$_FILES['pro_img']['type'];
                                
                                $allowed_filetypes = array('image/jpeg','image/jpg', 'image/png',);

                                $sql_update = "UPDATE products SET product_name='$name_pro', product_images='$img_pro',product_price='$price_pro', product_quantity='$quantity_pro', product_infor='$infor_pro', product_cateID='$cateID_pro' WHERE product_id= $productID";

                                if ($size_img <= 1000000 && (in_array($type_img, $allowed_filetypes))) {
                                    // Đẩy ảnh client->server
                                    move_uploaded_file($tmp_img, "asset/images/products/".$img_pro);
                                    
                                    $result=$conn->prepare($sql_update);
                                    if($result->execute()) {
                                        echo "Thêm dữ liệu thành công";
                                        header("Location:admin_productList.php");
                                    } else {
                                        echo "Không thêm được sản phẩm";
                                    }
                                } else {
                                    echo "Ảnh không hợp lệ";
                                }   
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