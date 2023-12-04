<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from landing.engotheme.com/html/skyline/demo/room_detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2023 16:10:25 GMT -->
<head>
    <meta charset="UTF-8">
    <title>Book room</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon"
          href="<?= BASE_URL ?>public/client/images/favicon.png"
          type="image/x-icon">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900"
          rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/client/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/client/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/client/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/client/css/gallery.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/client/css/vit-gallery.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/client/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?= BASE_URL ?>public/client/cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css"/>
    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="<?= BASE_URL ?>public/client/css/styles.css">
</head>

<body>
<!-- HEADER -->
<header class="header-sky">
    <div class="container">
        <!--HEADER-TOP-->
        <div class="header-top no-border">
            <div class="header-top-left">
                <span><i class="ion-ios-location-outline"></i>Hà Nội, Việt Nam</span>
                <span><i class="fa fa-phone" aria-hidden="true"></i>0123456789</span>
            </div>
            <div class="header-top-right">
<!--                --><?php
//                echo "<pre>";
//                print_r($_SESSION);
//                echo "</pre>";
//
//                ?>
                <?php if (isset($_SESSION['login']) && $_SESSION['login']): ?>
                    <img src="<?= BASE_URL . $_SESSION['dataUser']['avatar'] ?>"
                         alt="" width="40px" height="40px" style="object-fit: cover;border-radius: 999px">
                    <br>
                    <div style="display: flex">
                        <span style="color: whitesmoke"><?= $_SESSION['dataUser']['user'] ?></span>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               style="color: white;margin-left: 5px;"> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="<?= BASE_URL . 'AccountController/logout' ?>">Đăng xuất</a>
                                </li>
                                <li class=""><a href="<?= BASE_URL . 'AccountController/changeInfo' ?>">Thay đổi thông tin</a>
                                </li>
                                <li class=""><a href="<?= BASE_URL . 'CartController/historyBook' ?>">Lịch sử book phòng của bạn</a>
                                </li>
                                <?php if ($_SESSION['dataUser']['role'] == 1): ?>
                                    <li class=""><a href="<?= BASE_URL . 'ThongKeController/homePage' ?>">Đến
                                            trang quản trị</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <ul>
                        <li class="dropdown"><a href="<?= BASE_URL . 'AccountController/loginPage' ?>" title="Login"
                                                class="dropdown-toggle">Đăng Nhập</a></li>
                        <li class="dropdown"><a href="<?= BASE_URL . 'AccountController/registerPage' ?>"
                                                title="Register" class="dropdown-toggle">Đăng kí</a>
                        </li>

                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <!-- END/HEADER-TOP -->
    </div>
    <!-- MENU-HEADER -->
    <div class="menu-header ">
        <nav class="navbar navbar-fixed-top bg-menu">
            <div class="container">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                        <span class="icon-bar "></span>
                    </button>
                    <a class="navbar-brand" href="<?= BASE_URL ?>HomeController" title="Skyline"><img
                                src="<?= BASE_URL ?>public/client/images/Home-1/sky-logo-header.png" alt="#"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown ">
                            <a href="<?= BASE_URL ?>homeController/index" title="Home">Trang chủ</a>
                        </li>
                        <li class="dropdown ">
                            <a href="<?= BASE_URL ?>homeController/commingSoon" title="Room & Rate">Phòng và giá</a>
                        </li>
                        <li class="dropdown ">
                            <a href="<?= BASE_URL ?>homeController/commingSoon">Trang</a>
                        </li>
                        <li class="dropdown ">
                            <a href="<?= BASE_URL ?>homeController/commingSoon" title="Reservation" class="dropdown-toggle"
                               data-toggle="dropdown">Đặt chỗ</a>
                        </li>
                        <li class="dropdown ">
                            <a href="<?= BASE_URL ?>homeController/gallery" title="Gallery">Phòng Trưng Bày</a>
                        </li>
                        <li><a href="<?= BASE_URL ?>homeController/about" title="About">Về </a></li>
                        <li><a href="<?= BASE_URL ?>homeController/contact" title="Contact">Liên hệ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- END / MENU-HEADER -->
</header>
<!-- END-HEADER -->