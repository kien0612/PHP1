<?php
    session_start();
    include_once 'db.php';

    if ($_GET['news_id']) {
        $news_id = $_GET['news_id'];
        $sql_newsInfor = "select * from news join news_cate on news.news_cateID=news_cate.news_cateID where news_id=$news_id";
        $result_newsInfor = $conn->query($sql_newsInfor)->fetch();
    } else {
        echo "Không tìm thấy tin tức";
    }    
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
        <!-- <link rel="stylesheet" href="post-detail.css" /> -->
        <title>Post detail</title>
        <style>
            <?php include 'post-detail.css' ?>
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-overlay">
                <div class="form-container">
                    <i class="fa-solid fa-xmark form-close__btn"></i>
                    <form action="">
                        <h1 class="form-name">ĐĂNG NHẬP</h1>
                        <input type="text" id="username" name="username" placeholder="Tên đăng nhập" required>
                        <input type="password" id="password" name="password" placeholder="Mật khẩu" required>
                        <button class="login-btn" type="submit" name="btn-login">Đăng nhập</button>
                    </form>
                    <?php
                        if (isset($_GET['btn-login'])) {
                            if ($_GET['username'] == 'admin' && $_GET['password']) {
                                $_SESSION['isLogin'] = 1;
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
                <section class="banner-event"></section>
                <section class="breadcrumb">
                    <div class="section-container">
                        <ul class="breadcrumb__list">
                            <li class="breadcrumb__item"><a href="#">Tin tức</a></li>
                            <li class="breadcrumb__item active"><a href="#"><?php echo $result_newsInfor['news_cateName']?></a></li>
                        </ul>
                    </div>
                </section>
                <section class="post-detail">
                    <h2 class="post-title"><?php echo $result_newsInfor['news_title']?></h2>
                    <img style="width: 100%;" class="post-img" src="asset/images/news/<?php echo $result_newsInfor['news_images']?>" alt="">
                    <p class="post-content">
                        <?php echo $result_newsInfor['news_content']?>
                    </p>
                    <span class="post-author"><?php echo $result_newsInfor['news_author']?></span>
                </section>

                <section class="relevant-post">
                    <h2 class="relevant-post__title">Tin liên quan</h2>
                    <div class="relevant-post__list">
                        <a href="post-detail.html">
                            <article class="post-relevant">
                                <img src="asset/images/news/news_1.jpg" alt="" class="post-relevant__img" />
                                <h3 class="post-relevant__title">"GIẢI PHẪU" GIÀY VULCANIZED</h3>
                            </article>
                        </a>
                        <a href="post-detail.html">
                            <article class="post-relevant">
                                <img src="asset/images/news/news_1.jpg" alt="" class="post-relevant__img" />
                                <h3 class="post-relevant__title">"GIẢI PHẪU" GIÀY VULCANIZED</h3>
                            </article>
                        </a>
                        <a href="post-detail.html">
                            <article class="post-relevant">
                                <img src="asset/images/news/news_1.jpg" alt="" class="post-relevant__img" />
                                <h3 class="post-relevant__title">"GIẢI PHẪU" GIÀY VULCANIZED</h3>
                            </article>
                        </a>
                        <a href="post-detail.html">
                            <article class="post-relevant">
                                <img src="asset/images/news/news_1.jpg" alt="" class="post-relevant__img" />
                                <h3 class="post-relevant__title">"GIẢI PHẪU" GIÀY VULCANIZED</h3>
                            </article>
                        </a>
                        <a href="post-detail.html">
                            <article class="post-relevant">
                                <img src="asset/images/news/news_1.jpg" alt="" class="post-relevant__img" />
                                <h3 class="post-relevant__title">"GIẢI PHẪU" GIÀY VULCANIZED</h3>
                            </article>
                        </a>
                        <a href="post-detail.html">
                            <article class="post-relevant">
                                <img src="asset/images/news/news_1.jpg" alt="" class="post-relevant__img" />
                                <h3 class="post-relevant__title">"GIẢI PHẪU" GIÀY VULCANIZED</h3>
                            </article>
                        </a>
                    </div>
                    <div class="more-post">
                        <button class="more-post__btn">Xem thêm >></button>
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
            <?php include_once 'homepage.js'?>
        </script>
    </body>
</html>
