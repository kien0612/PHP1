<?php
    session_start();
    if(!isset($_SESSION['isLogin'])) {
        $_SESSION['isLogin'] = 0;
    }

    include_once 'db.php';
    $sql_newProducts = "select * from products where product_cateID=3 limit 3";
    $result_newProducts = $conn->query($sql_newProducts);

    $sql_bestProducts = "select * from products where product_cateID=4 limit 12";
    $result_bestProducts = $conn->query($sql_bestProducts);

    $sql_hotNews = "select * from news where news_cateID=1 limit 1";
    $result_hotNews = $conn->query($sql_hotNews)->fetch();

    $sql_recentUpdateNews = "select * from news where news_cateID=2 limit 3";
    $result_recentUpdateNews = $conn->query($sql_recentUpdateNews);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
            integrity="sha512-ZnR2wlLbSbr8/c9AgLg3jQPAattCUImNsae6NHYnS9KrIwRdcY9DxFotXhNAKIKbAXlRnujIqUWoXXwqyFOeIQ=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <link rel="stylesheet" href="homepage.css" type="text/css" /> -->
        <title>HOME PAGE</title>
        <style>
            <?php include 'homepage.css' ?>
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-overlay">
                <div class="form-container">
                    <i class="fa-solid fa-xmark form-close__btn"></i>
                    <form action="" method="POST">
                        <h1 class="form-name">ĐĂNG NHẬP</h1>
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
                        <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
                        <button class="login-btn" type="submit" name="btn-login">Đăng nhập</button>
                    </form>
                    <?php
                        // if (isset($_GET['btn-login'])) {
                        //     if ($_GET['username'] == 'admin' && $_GET['password'] == 'admin') {
                        //         $_SESSION['isLogin'] = 1;
                        //     } 
                        // }
                        if(isset($_POST['btn-login'])) {
                            $username=$_POST['username'];
                            $password=sha1($_POST['password']);
                            echo $_POST['username'], $_POST['password'];
                            $sql_accountInfor = "select * from account where user='$username' and pass='$password'";
                            $result_accountInfor=$conn->query($sql_accountInfor);
                            if($result_accountInfor->rowcount()==1) {
                                $_SESSION['username'] = $username;
                                $_SESSION['isLogin'] = 1;
                                header("Location:admin_productList.php");
                            } else {
                                echo "Khong dang nhap thanh cong";
                            }
                        }
                    ?>
                </div>
            </div>
            <header>
                <div class="section-container">
                    <div class="logo">
                        <a href="homepage.php">
                            <img src="asset/images/logo.png" alt="logo" width="80px" />
                        </a>
                    </div>
                    <nav class="nav">
                        <ul class="nav__list">
                             <li class="nav__item">
                                <a href="homepage.php" class="nav__link">Trang chủ</a>
                            </li>
                            <li class="nav__item">
                                <a href="products.php" class="nav__link">Sản phẩm</a>
                            </li>
                            <li class="nav__item">
                                <a href="news.php" class="nav__link">Tin tức</a>
                            </li>
                            <li class="nav__item">
                                <a href="aboutus.html" class="nav__link">Về chúng tôi</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="search-box">
                        <i class="search-box__icon fa-solid fa-magnifying-glass"></i>
                        <input class="search-box__input" type="text" placeholder="Nhập tên sản phẩm" />
                    </div>
                    <div class="user">
                        <?php
                            if (!$_SESSION['isLogin']) {
                                ?>
                                    <button class="user__login">Đăng nhập</button>
                                <?php
                            } else {
                                ?>
                                    <button class="user__admin">
                                        <a href="admin_productList.php">Trang quản trị</a>
                                    </button>
                                    <button class="user__logout">
                                        <a href="logout.php">Đăng xuất</a>
                                    </button>
                                <?php
                            }
                        ?>
                        

                        
                        <!-- <i class="user__cart fa-solid fa-cart-shopping"></i>
                        <span class="user__account-link">
                            <i class="user__account fa-solid fa-user"></i>
                        </span> -->
                    </div>
                </div>
            </header>
            <main>
                <section class="sale-events">
                    <div class="section-container">
                        <i class="prev-sale fa-solid fa-chevron-left"></i>
                        <span class="sale-infor">Sale off 30% tất cả sản phẩm - 30/5/2023</span>
                        <i class="next-sale fa-solid fa-chevron-right"></i>
                    </div>
                </section>
                <section class="banner">
                    <div class="slogan">
                        <h1 class="slogan__text">Mang đến cho bạn những sản phẩm tốt nhất</h1>
                        <button class="solgan__btn">Xem thêm</button>
                    </div>
                </section>
                <section class="new-products">
                    <h2 class="new-products__title">Sản phẩm mới</h2>
                    <div class="new-products__list">
                        <?php                           
                            foreach($result_newProducts as $row) {
                                ?>
                                    <a href="product-detail.php?pro_id=<?php echo $row['product_id']?>">
                                        <div class="new-product">
                                            <img class="new-product__img" src="asset/images/products/<?php echo $row['product_images']?>" alt="">
                                            <h2 class="new-product__name"><?php echo $row['product_name']?></h2>
                                        </div>
                                    </a>
                                <?php
                            }
                        ?>
                        <!-- <a href="product-detail.html">
                            <div class="new-product">
                                <img class="new-product__img" src="asset/images/new-product.png"></img>
                                <h2 class="new-product__name">Clay thomson</h2>
                            </div>
                        </a>
                        <a href="product-detail.html">
                            <div class="new-product">
                                <img class="new-product__img" src="asset/images/new-product.png"></img>
                                <h2 class="new-product__name">Clay thomson</h2>
                            </div>
                        </a>
                        <a href="product-detail.html">
                            <div class="new-product">
                                <img class="new-product__img" src="asset/images/new-product.png"></img>
                                <h2 class="new-product__name">Clay thomson</h2>
                            </div>
                        </a> -->
                    </div>
                </section>
                 <section class="products">
                    <h2 class="products__header">Sản phẩm bán chạy</h2>
                    <div class="product-list">
                        <div class="section-container">
                            <?php
                                foreach($result_bestProducts as $row) {
                                    ?>
                                        <a href="product-detail.php?pro_id=<?php echo $row['product_id']?>">
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="asset/images/products/<?php echo $row['product_images']?>" alt="" />
                                                    <div class="product-img__tag">
                                                        <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                                        <i class="product-img__like-icon fa-solid fa-heart"></i>
                                                    </div>
                                                </div>
                                                <div class="product-infor">
                                                    <h3 class="product-infor__name"><?php echo $row['product_name']?></h3>
                                                    <span class="product-infor__price"><?php echo $row['product_price']?></span>
                                                </div>
                                            </div>
                                        </a>
                                    <?php
                                }
                            ?>

                            <!-- <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a>

                            <a href="product-detail.html">
                                <div class="product">
                                    <div class="product-img">
                                        <img src="asset/images/product.png" alt="" />
                                        <div class="product-img__tag">
                                            <i class="product-img__cart-icon fa-solid fa-cart-shopping"></i>
                                            <i class="product-img__like-icon fa-solid fa-heart"></i>
                                        </div>
                                    </div>

                                    <div class="product-infor">
                                        <h3 class="product-infor__name">URBAS IRRELEVANT NE - LOW TOP</h3>
                                        <span class="product-infor__price">500.000đ</span>
                                    </div>
                                </div>
                            </a> -->
                        </div>
                    </div>

                    <div class="more-product">
                        <button class="more-product__btn">Xem thêm</button>
                    </div>
                    <div class="news">
                        <h2 class="news__title">Tin tức</h2>
                        <div class="news__main">
                            <div class="news__left-col">
                                <a href="post-detail.php?news_id=<?php echo $result_hotNews['news_id']?>">
                                    <article>
                                        <img src="asset/images/news/<?php echo $result_hotNews['news_images']?>" alt="">
                                        <h2><?php echo $result_hotNews['news_title']?></h2>
                                    </article>
                                </a>  
                                <!-- <a href="post-detail.html">
                                    <article>
                                        <img src="asset/images/post-thumbnail3.jpg" alt="">
                                        <h2>"GIẢI PHẪU" GIÀY VULCANIZED</h2>
                                    </article>
                                </a> -->
                            </div>
                            <div class="news__right-col">
                                <?php
                                    foreach($result_recentUpdateNews as $row) {
                                        ?>
                                            <a href="post-detail.php?news_id=<?php echo $row['news_id']?>">
                                                <article>
                                                    <img src="asset/images/news/<?php echo $row['news_images']?>" alt="">
                                                    <h2><?php echo $row['news_title']?></h2>
                                                </article>
                                            </a>
                                        <?php
                                    }
                                ?>
                                <!-- <a href="post-detail.html">
                                    <article>
                                        <img src="asset/images/post-thumbnail-4.jpg" alt="">
                                        <h2>URBAS CORLURAY PACK</h2>
                                    </article>
                                </a>
                                <a href="post-detail.html">
                                    <article>
                                        <img src="asset/images/post-thumbnail5.jpg" alt="">
                                        <h2>SNEAKER FEST VIETNAM VÀ SỰ KẾT HỢP</h2>
                                    </article>
                                </a> -->
                            </div>
                        </div>
                        <div class="news__more ">
                            <button class="news__more-btn">Xem tất cả</button>
                        </div>
                    </div>
                </section> 
            </main>
            <footer>
                <div class="section-container">
                    <div class="col certification">
                        <img src="asset/images/certification.png" alt="" />
                    </div>
                    <div class="col">
                        <div class="row">
                            <h3>THE NEW STYLE</h3>
                            <span>Mang đến cho bạn những sản phẩm tốt nhất</span>
                        </div>
                        <div class="row">
                            <h3>Theo dõi chúng tôi</h3>
                            <ul id="follow-us">
                                <li><img src="asset/images/follow-us/follow_us_facebook.png" alt="" /></li>
                                <li><img src="asset/images/follow-us/follow_us_zalo.png" alt="" /></li>
                                <li><img src="asset/images/follow-us/follow_us_instargam.png" alt="" /></li>
                                <li><img src="asset/images/follow-us/follow_us_tiktok.png" alt="" /></li>
                                <li><img src="asset/images/follow-us/follow_us_youtube.png" alt="" /></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <h3>Tổng đài hỗ trợ miễn phí</h3>
                            <ul>
                                <li>Gọi mua hàng 1800.2097 (7h30 - 22h00)</li>
                                <li>Gọi khiếu nại 1800.2063 (8h00 - 21h30)</li>
                                <li>Gọi bảo hành 1800.2064 (8h00 - 21h00)</li>
                            </ul>
                        </div>
                        <div class="row">
                            <h3>Thanh toán</h3>
                            <ul id="payment">
                                <li><img class="payment-img" src="asset/images/payment/payment_vnpay2.png" alt="" /></li>
                                <li><img class="payment-img" src="asset/images/payment/payment_zalo2.png" alt="" /></li>
                                <li><img class="payment-img" src="asset/images/payment/payment_momo2.png" alt="" /></li>
                                <li><img class="payment-img" src="asset/images/payment/payment_moca2.png" alt="" /></li>
                                <li><img class="payment-img" src="asset/images/payment/payment_visa2.png" alt="" /></li>
                                <li><img class="payment-img" src="asset/images/payment/payment_mastercard2.png" alt="" /></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <h3>Thông tin và chính sách</h3>
                            <ul>
                                <li>
                                    <a href="#">Mua hàng và thanh toán online</a>
                                </li>
                                <li>
                                    <a href="#">Mua hàng trả góp online</a>
                                </li>
                                <li>
                                    <a href="#">Tra thông tin đơn hàng</a>
                                </li>
                                <li>
                                    <a href="#">Tra điểm Member</a>
                                </li>
                                <li>
                                    <a href="#">Xem ưu đãi Member</a>
                                </li>
                                <li>
                                    <a href="#">Dịch vụ bảo hành điện thoại</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col">
                        <div class="row">
                            <h3>Dịch vụ khác</h3>
                            <ul>
                                <li>
                                    <a href="#">Tuyển dụng</a>
                                </li>
                                <li>
                                    <a href="#">Hợp tác kinh doanh</a>
                                </li>
                                <li>
                                    <a href="#">Khách hàng doanh nghiệp</a>
                                </li>
                                <li>
                                    <a href="#">Ưu đãi thanh toán</a>
                                </li>
                                <li>
                                    <a href="#">Chính sách bảo hành</a>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </footer>
        </div>
        <script>
            <?php include 'homepage.js'?>
        </script>
    </body>
</html>
