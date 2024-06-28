<?php
    session_start();
    include_once 'db.php';

    $sql_hotNews = "select * from news where news_cateID=1 limit 1";
    $result_hotNews = $conn->query($sql_hotNews)->fetch();

    $sql_recentUpdateNews = "select * from news where news_cateID=2 limit 3";
    $result_recentUpdateNews = $conn->query($sql_recentUpdateNews);

    $sql_tipsNews = "select * from news where news_cateID=3 limit 5";
    $result_tipsNews = $conn->query($sql_tipsNews);
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
        <title>News</title>
        <style>
            <?php include 'news.css' ?>
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
                <section class="banner-event">
                </section>
                <section class="news">
                    <h2 class="news-title">Tin tức</h2>
                    <section class="news-main">
                        <div class="col left-col">
                            <a href="post-detail.php?news_id=<?php echo $result_hotNews['news_id']?>">
                                <article class="post">
                                    <img src="./asset/images/news/<?php echo $result_hotNews['news_images']?>" alt="" class="post-img">
                                    <h3 class="post-title"><?php echo $result_hotNews['news_title']?></h3>
                                </article>
                            </a>
                        </div>
                        <div class="col right-col">
                            <h2 class="happening-title">Tin mới cập nhật</h2>
                            <div class="happening-post__list">
                                <?php
                                    foreach($result_recentUpdateNews as $row) {
                                        ?>
                                            <a href="post-detail.php?news_id=<?php echo $row['news_id']?>">
                                                <article class="happening-post">
                                                    <img class="happening-post__img" src="./asset/images/news/<?php echo $row['news_images']?>"></img>
                                                    <h4 class="happening-post__title"><?php echo $row['news_title']?></h4>
                                                </article>
                                            </a>
                                        <?php
                                    }
                                ?>
                                <!-- <a href="post-detail.php?news_id=<?php echo $result_hotNews['news_id']?>">
                                    <article class="happening-post">
                                        <img class="happening-post__img" src="./asset/images/banner.png"></img>
                                        <h4 class="happening-post__title">Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h4>
                                    </article>
                                </a>
                                <a href="post-detail.html">
                                    <article class="happening-post">
                                        <img class="happening-post__img" src="./asset/images/banner.png"></img>
                                        <h4 class="happening-post__title">Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h4>
                                    </article>
                                </a>
                                <a href="post-detail.html">
                                    <article class="happening-post">
                                        <img class="happening-post__img" src="./asset/images/banner.png"></img>
                                        <h4 class="happening-post__title">Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h4>
                                    </article>
                                </a>
                                <a href="post-detail.html">
                                    <article class="happening-post">
                                        <img class="happening-post__img" src="./asset/images/banner.png"></img>
                                        <h4 class="happening-post__title">Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h4>
                                    </article>
                                </a> -->
                            </div>
                        </div>
                    </section>

                    <hr>

                    <section class="tips">
                        <h3 class="tips__title">Mẹo hữu ích</h3>
                        <div class="tips__list">
                            <?php
                                    foreach($result_tipsNews as $row) {
                                        ?>
                                            <a href="post-detail.php?news_id=<?php echo $row['news_id']?>">
                                                <article class="tip-post">
                                                    <img style="width: 250px;" src="asset/images/news/<?php echo $row['news_images']?>" alt="" class="tip-post__img">
                                                    <div class="tip-post__infor">
                                                        <h3><?php echo $row['news_title']?></h3>
                                                        <p>Ananas – cái tên được lấy cảm hứng từ hình ảnh “Trái Dứa” (Ananas trong tiếng Anh nghĩa là “Trái Dứa”). Với logo đặc trưng, trái dứa xuất hiện từ một loại quả ngọt lành, kiên cường vươn mình sinh trưởng trong môi trường đất khô cằn và khắc nghiệt...</p>
                                                    </div>
                                                </article>
                                            </a>
                                        <?php
                                    }
                                ?>
                            <!-- <a href="post-detail.html">
                                <article class="tip-post">
                                    <img src="asset/images/banner.png" alt="" class="tip-post__img">
                                    <div class="tip-post__infor">
                                        <h3>Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h3>
                                        <p>Ananas – cái tên được lấy cảm hứng từ hình ảnh “Trái Dứa” (Ananas trong tiếng Anh nghĩa là “Trái Dứa”). Với logo đặc trưng, trái dứa xuất hiện từ một loại quả ngọt lành, kiên cường vươn mình sinh trưởng trong môi trường đất khô cằn và khắc nghiệt...</p>
                                    </div>
                                </article>
                            </a>
                            <a href="post-detail.html">
                                <article class="tip-post">
                                    <img src="asset/images/banner.png" alt="" class="tip-post__img">
                                    <div class="tip-post__infor">
                                        <h3>Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h3>
                                        <p>Ananas – cái tên được lấy cảm hứng từ hình ảnh “Trái Dứa” (Ananas trong tiếng Anh nghĩa là “Trái Dứa”). Với logo đặc trưng, trái dứa xuất hiện từ một loại quả ngọt lành, kiên cường vươn mình sinh trưởng trong môi trường đất khô cằn và khắc nghiệt...</p>
                                    </div>
                                </article>
                            </a>
                            <a href="post-detail.html">
                                <article class="tip-post">
                                    <img src="asset/images/banner.png" alt="" class="tip-post__img">
                                    <div class="tip-post__infor">
                                        <h3>Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h3>
                                        <p>Ananas – cái tên được lấy cảm hứng từ hình ảnh “Trái Dứa” (Ananas trong tiếng Anh nghĩa là “Trái Dứa”). Với logo đặc trưng, trái dứa xuất hiện từ một loại quả ngọt lành, kiên cường vươn mình sinh trưởng trong môi trường đất khô cằn và khắc nghiệt...</p>
                                    </div>
                                </article>
                            </a>
                            <a href="post-detail.html">
                                <article class="tip-post">
                                    <img src="asset/images/banner.png" alt="" class="tip-post__img">
                                    <div class="tip-post__infor">
                                        <h3>Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h3>
                                        <p>Ananas – cái tên được lấy cảm hứng từ hình ảnh “Trái Dứa” (Ananas trong tiếng Anh nghĩa là “Trái Dứa”). Với logo đặc trưng, trái dứa xuất hiện từ một loại quả ngọt lành, kiên cường vươn mình sinh trưởng trong môi trường đất khô cằn và khắc nghiệt...</p>
                                    </div>
                                </article>
                            </a>
                            <a href="post-detail.html">
                                <article class="tip-post">
                                    <img src="asset/images/banner.png" alt="" class="tip-post__img">
                                    <div class="tip-post__infor">
                                        <h3>Giới thiệu về Ananas: Ananas là gì? Giày Ananas của nước nào?</h3>
                                        <p>Ananas – cái tên được lấy cảm hứng từ hình ảnh “Trái Dứa” (Ananas trong tiếng Anh nghĩa là “Trái Dứa”). Với logo đặc trưng, trái dứa xuất hiện từ một loại quả ngọt lành, kiên cường vươn mình sinh trưởng trong môi trường đất khô cằn và khắc nghiệt...</p>
                                    </div>
                                </article>
                            </a> -->
                        </div>
                        <div class="tips__more">
                            <button>Xem thêm >></button>
                        </div>
                    </section>
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
