<?php
    session_start();
    
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/')+1);
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
                    <div class="d-flex justify-content-between align-items-center m-2">
                        <h1>Danh sách tin tức</h1>
                        <button class="btn btn-success justify-content-end btn__add-item" type="button">
                            <a href="admin_newsAdd.php">Thêm tin tức</a>
                        </button>
                    </div>
                        <?php
                            include_once 'db.php';
                            $sql = "select * from news join news_cate on news.news_cateID=news_cate.news_cateID order by news_id desc";
                            $result = $conn->query($sql);
                            if ($result->rowCount() == 0) {
                                echo "<p>Không có tin tức nào trong danh sách</p>";
                            } else {
                            ?>
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Hình ảnh</th>
                                            <th>Giới thiệu</th>
                                            <th>Nội dung</th>
                                            <th>Tác giả</th>
                                            <th>Thời gian đăng</th>
                                            <th>Danh mục</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php
                                foreach($result as $row) {
                                ?>
                                        <tr>
                                            <td><?php echo $row['news_id']?></td>
                                            <td><?php echo $row['news_title']?></td>
                                            <td><img style="width: 100px;" src="asset/images/news/<?php echo $row['news_images']?>" alt=""></td>
                                            <td>
                                                <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                                    <?php echo $row['news_intro']?>
                                                </span>
                                                <?php echo $row['news_intro']?></td>
                                            <td>
                                                <span class="d-inline-block text-truncate" style="max-width: 200px;">
                                                    <?php echo $row['news_content']?>
                                                </span>
                                            </td>
                                            <td><?php echo $row['news_author']?></td>
                                            <td><?php echo $row['news_time']?></td>
                                            <td><?php echo $row['news_cateName']?></td>
                                            <td class="text-right">
                                                <button class="btn btn-warning btn__modify-item" type="submit">
                                                    <a href="admin_newsUpdate.php?news_id=<?php echo $row['news_id']?>">Sửa</a>
                                                </button>
                                                <button class="btn btn-danger btn__delete-item" type="submit">
                                                    <a href="admin_newsDelete.php?news_id=<?php echo $row['news_id']?>">Xóa</a>
                                                </button>
                                            </td>
                                        </tr>
                                    
                                <?php
                                }
                            }
                                
                        ?>
                                    </tbody>
                                </table>
                </div>
            </div>
        </div>
    </body>
</html>
