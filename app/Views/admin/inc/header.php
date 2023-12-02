<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <!-- Favicon icon -->
    <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="<?= BASE_URL ?>public/assets/images/favicon.png"
    />
    <title>Quản lí khách sạn - Admin</title>
    <!-- Thêm đường link tới CSS của thư viện Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Thêm đường link tới jQuery (Select2 yêu cầu jQuery) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Thêm đường link tới JS của thư viện Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <!-- Custom CSS -->
    <link href="<?= BASE_URL ?>public/assets/libs/flot/css/float-chart.css" rel="stylesheet"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/assets/extra-libs/multicheck/multicheck.css">

    <link href="<?= BASE_URL ?>public/dist/css/style.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css"
          href="<?= BASE_URL ?>public/assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css"
          href="<?= BASE_URL ?>public/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/assets/libs/quill/dist/quill.snow.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css.css">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>public/assets/extra-libs/multicheck/multicheck.css">

    <link href="<?= BASE_URL ?>public/dist/css/style.min.css" rel="stylesheet"/>
    <link href="<?= BASE_URL ?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../../../assets/css/main.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/css/main.css' ?>">
    <link rel="stylesheet" href="<?= BASE_URL . 'assets/js/' ?>">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a
                        class="nav-toggler waves-effect waves-light d-block d-md-none"
                        href="javascript:void(0)"
                ><i class="ti-menu ti-close"></i
                    ></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="index.html">
                    <span class="logo-text">
                <!-- dark Logo text -->
                <img style="margin-top:20px "

                     src="<?= BASE_URL ?>public/client/images/Home-1/sky-logo-header.png"
                     alt="homepage"
                     class="light-logo"
                />
              </span>
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="<?= BASE_URL ?>public/assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a
                        class="topbartoggler d-block d-md-none waves-effect waves-light"
                        href="javascript:void(0)"
                        data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                ><i class="ti-more"></i
                    ></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div
                    class="navbar-collapse collapse"
                    id="navbarSupportedContent"
                    data-navbarbg="skin5"
            >
                <ul class="navbar-nav float-right" style="margin-left: auto">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a
                                class="nav-link dropdown-toggle waves-effect waves-dark"
                                href=""
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                        >
                            <i class="mdi mdi-bell font-24"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a
                                class="nav-link dropdown-toggle waves-effect waves-dark"
                                href=""
                                id="2"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                        >
                            <i class="font-24 mdi mdi-comment-processing"></i>
                        </a>
                        <div
                                class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                                aria-labelledby="2"
                        >
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                            <span class="btn btn-success btn-circle"
                            ><i class="ti-calendar"></i
                                ></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Event today</h5>
                                                    <span class="mail-desc"
                                                    >Just a reminder that event</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                            <span class="btn btn-info btn-circle"
                            ><i class="ti-settings"></i
                                ></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Settings</h5>
                                                    <span class="mail-desc"
                                                    >You can customize this template</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                            <span class="btn btn-primary btn-circle"
                            ><i class="ti-user"></i
                                ></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Pavan kumar</h5>
                                                    <span class="mail-desc"
                                                    >Just see the my admin!</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                            <span class="btn btn-danger btn-circle"
                            ><i class="fa fa-link"></i
                                ></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Luanch Admin</h5>
                                                    <span class="mail-desc"
                                                    >Just see the my new admin!</span
                                                    >
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a
                                class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                                href=""
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                        ><img
                                    src="<?= BASE_URL ?>public/assets/images/users/1.jpg"
                                    alt="user"
                                    class="rounded-circle"
                                    width="31"
                            /></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="<?= BASE_URL . 'HomeController' ?>"
                            ><i class="ti-wallet m-r-5 m-l-5"></i>Trở về trang người dùng</a
                            >

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= BASE_URL . 'AccountController/logout' ?>"
                            ><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a
                            >

                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
            </div>
        </nav>
    </div>