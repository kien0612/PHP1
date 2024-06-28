<?php
    session_start();

    include_once 'db.php';
   
    $sql_saleProducts = "select * from products where product_cateID=5 limit 4";
    $result_saleProducts = $conn->query($sql_saleProducts);

    $sql_products = "select * from products limit 12";
    $result_products = $conn->query($sql_products);
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
        <link rel="stylesheet" href="products.css" />
        <title>HOME PAGE</title>
        <style>
            <?php include 'products.css' ?>
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
                <section class="sale-events">
                    <div class="section-container">
                        <i class="prev-sale fa-solid fa-chevron-left"></i>
                        <span class="sale-infor">Sale off 30% tất cả sản phẩm - 30/5/2023</span>
                        <i class="next-sale fa-solid fa-chevron-right"></i>
                    </div>
                </section>
                <section class="banner-event">
                </section>
                <section class="flash-sale">
                    <div class="section-container">
                        <div class="flash-sale__header">
                            <div class="flash-sale__title">
                                <i class="flash-sale__icon fa-solid fa-bolt-lightning"></i>
                                <h2>FLASH SALE</h2>
                            </div>
                            <div class="flash-sale__count-down">
                                <span class="flash-sale__time-number">0</span>
                                <span class="flash-sale__time-number">0</span>
                                <span class="flash-sale__colon">:</span>
                                <span class="flash-sale__time-number">0</span>
                                <span class="flash-sale__time-number">0</span>
                                <span class="flash-sale__colon">:</span>
                                <span class="flash-sale__time-number">0</span>
                                <span class="flash-sale__time-number">0</span>
                            </div>
                        </div>

                        <div class="flash-sale__product-list">
                            <button class="btn__prev-sale-product"><i class="bi bi-chevron-left"></i></button>
                            <div class="flash-sale__product-list-main">
                                <?php                           
                                    foreach($result_saleProducts as $row) {
                                        ?>
                                            <a href="product-detail.php?pro_id=<?php echo $row['product_id']?>">
                                                <div class="sale-product">
                                                    <div class="sale-product__img">
                                                        <div class="sale-product__tag">sale</div>
                                                        <img src="asset/images/products/<?php echo $row['product_images']?>" alt="sale-product" />
                                                    </div>
                                                    <div class="sale-product__infor">
                                                        <span class="sale-product__name"><?php echo $row['product_name']?></span>
                                                        <span class="sale-product__original-price"><?php echo $row['product_price']?></span>
                                                        <span class="sale-product__sale-price"><?php echo ((float)$row['product_price']*0.7)?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php
                                    }
                                ?>
                                <!-- <a href="product-detail.html">
                                    <div class="sale-product">
                                        <div class="sale-product__img">
                                            <div class="sale-product__tag">sale</div>
                                            <img src="asset/images/sale-product.png" alt="sale-product" />
                                        </div>
                                        <div class="sale-product__infor">
                                            <span class="sale-product__name">BASAS WORKADAY - LOW TOP</span>
                                            <span class="sale-product__original-price">700.000đ</span>
                                            <span class="sale-product__sale-price">500.000đ</span>
                                        </div>
                                    </div>
                                </a> -->

                            </div>
                            <button class="btn__next-sale-product"><i class="bi bi-chevron-right"></i></button>
                        </div>
                    </div>
                </section>

                <section class="products">
                    <div class="products__header">
                        <div class="section-container">
                            <div class="products__category">
                                <span class="products__category-male">Nam</span>
                                <span class="products__category-female">Nữ</span>
                                <span class="products__category-accessory">Phụ kiện</span>
                            </div>

                            <div class="products__sort-and-filter">
                                <div class="product__sort">
                                    <button class="sort__by-name">Sắp xếp theo tên</button>
                                    <button class="sort__by-price">Sắp xếp theo giá</button>
                                </div>
                                <div class="product__filter">
                                    <button class="filter__icon"><i class="fa-solid fa-filter"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-list">
                        <div class="section-container">
                            <?php                           
                                foreach($result_products as $row) {
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
                            </a> -->
                        </div>
                    </div>

                    <div class="page">
                        <div class="section-container">
                            <div class="page__list">
                                <button class="page__prev-btn"><i class="fa-solid fa-chevron-left"></i></button>
                                <button class="page__number">1</button>
                                <button class="page__number">2</button>
                                <button class="page__number">3</button>
                                <button class="page__number">4</button>
                                <button class="page__more">...</button>
                                <button class="page__next-btn"><i class="fa-solid fa-chevron-right"></i></button>
                            </div>
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
