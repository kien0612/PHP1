<?php
    ob_start();
    session_start();

    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);

    include_once 'db.php';
    $sql = "select * from news_cate";
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
                    <h1 class="text-center my-3">Thêm tin tức</h1>
                    <form class="border p-4 rounded" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Tiêu đề</label>
                            <input class="form-control" type="text" name="news_title" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="form-group">
                            <label for="file">Hình ảnh</label>
                            <input type="file" id="file" name="news_img" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="name">Giới thiệu</label>
                            <input class="form-control" type="text" name="news_intro" placeholder="Nhập giới thiệu">
                        </div>
                        <div class="form-group">
                            <label for="name">Nội dung</label>
                            <textarea name="news_content" id="editor" cols="30" rows="10"></textarea>
                            <!-- <input class="form-control" type="number" name="news_content" placeholder="Nhập nội dung"> -->
                        </div>
                        <div class="form-group">
                            <label for="name">Tác giả</label>
                            <input class="form-control" type="text"name="news_author" placeholder="Nhập tác giả">
                        </div>
                        <div class="form-group">
                            <label for="name">Thời gian</label>
                            <input class="form-control" type="date" name="news_time" placeholder="Nhập thời gian">
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Danh mục</label>
                            <select class="form-control" id="news_cateID" name="news_cateID">
                                <?php
                                    foreach($result as $row) {
                                    ?>
                                        <option value="<?php echo $row['news_cateID']?>"><?php echo $row['news_cateName']?></option>
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
                            $title_news=$_POST['news_title'];
                            $intro_news=$_POST['news_intro'];
                            $content_news=$_POST['news_content'];
                            $author_news=$_POST['news_author'];
                            $time_news=$_POST['news_time'];
                            $cateID_news=$_POST['news_cateID'];


                            $img_news=$_FILES['news_img']['name'];
                            $tmp_img=$_FILES['news_img']['tmp_name'];
                            $size_img=$_FILES['news_img']['size'];
                            $type_img=$_FILES['news_img']['type'];
                            
                            $allowed_filetypes = array('image/jpeg','image/jpg', 'image/png',);
                        
                        if ($size_img <= 1000000 && (in_array($type_img, $allowed_filetypes))) {
                            // Đẩy ảnh client->server
                            move_uploaded_file($tmp_img, "asset/images/news/".$img_news);
                            
                            $sql_insert="insert into news value(null, '$title_news', '$img_news', '$intro_news', '$content_news', '$author_news', '$time_news', $cateID_news)";
                            $result=$conn->prepare($sql_insert);
                            if($result->execute()) {
                                header("Location:admin_newsList.php");
                            } else {
                                echo "Không thêm được tin tức";
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