<?php

foreach ($data['search'] as $item) {
    extract($item);
//    echo "<pre>";
//    print_r($data);
//    die();
    $noithat_array = explode(",", $noithat);
    $images_array = explode(",", $images);
    $images = array_unique($images_array);
    $noithat = array_unique($noithat_array);

}

?>

<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2><?= $ten ?></h2>
        </div>
    </div>
</section>
<!-- ROOM DETAIL -->
<section class="section-product-detail">
    <div class="container">
        <!-- DETAIL -->
        <div class="product-detail margin">
            <div class="row">
                <div class="col-lg-9">
                    <!-- ẢNH LỚN -->
                    <div class="wrapper">
                        <div class="gallery3">
                            <?php foreach ($images as $value): ?>
                                <div class="gallery__img-block  ">

                                    <img width="800px" height="400px" src="<?= BASE_URL ?><?= $value ?>"
                                         alt="images/Product/img-1.jpg" class="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <!-- FORM ĐẶT PHÒNG -->
                    <div class="product-detail_book">
                        <div class="product-detail_total">
                            <img src="<?= BASE_URL ?>public/client/images/Product/icon.png" alt="#" class="icon-logo">
                            <h6>STARTING ROOM FROM</h6>
                            <p class="price">
                                <span class="amout"><?= number_format($gia) ?></span> /days
                            </p>
                        </div>
                        <form method="post" action="<?= BASE_URL ?>CartController/checkOut">
                            <div class="product-detail_form">

                                <div class="sidebar">
                                    <!-- WIDGET CHECK AVAILABILITY -->
                                    <div class="widget widget_check_availability">
                                        <div class="check_availability">


                                            <div class="check_availability-field">
                                                <label>Số lượng phòng cần đặt : </label>

                                                <input class="form-control" name="so_luong_order" type="number"
                                                       value="1" min="1" max="<?= $so_luong ?>">


                                                <label>Arrive</label>
                                                <div class="input-group date" data-date-format="dd-mm-yyyy"
                                                     id="datepicker1">
                                                    <input disabled class="form-control wrap-box" type="text"
                                                           placeholder="Arrival Date"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_dat_phong'] : $_SESSION['dateDefault']['ngay_dat_phong'] ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                                                       aria-hidden="true"></i></span>
                                                    <input  type="hidden" name="ngay_dat_phong"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_dat_phong'] : $_SESSION['dateDefault']['ngay_dat_phong'] ?>">
                                                </div>
                                            </div>
                                            <div class="check_availability-field">
                                                <label>Depature</label>
                                                <div id="datepicker2" class="input-group date"
                                                     data-date-format="dd-mm-yyyy">

                                                    <input type="hidden" name="id_loaiphong"
                                                           value="<?= $id_loaiphong ?>">

                                                    <input disabled class="form-control wrap-box" type="text"
                                                           placeholder="Departure Date"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_tra_phong'] : $_SESSION['dateDefault']['ngay_tra_phong'] ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                                                       aria-hidden="true"></i></span>
                                                    <input type="hidden" name="ngay_tra_phong"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_tra_phong'] : $_SESSION['dateDefault']['ngay_tra_phong'] ?>">

                                                </div>
                                            </div>

                                            <label class="check_availability" style="margin-top: 10px;">Số lượng còn lại
                                                : <?= $so_luong ?></label>
                                        </div>
                                    </div>
                                    <!-- END / WIDGET CHECK AVAILABILITY -->
                                </div>
                                <button class="btn btn-room btn-product" name="bookNow">Book Now</button>
                            </div>
                        </form>

                    </div>
                    <!-- KẾT THÚC / FORM ĐẶT PHÒNG -->
                </div>
            </div>
        </div>

        <div class="product-detail_tab">
            <div class="row">
                <div class="col-md-3">
                    <ul class="product-detail_tab-header">
                        <li class="active"><a href="#amenities" data-toggle="tab">Tổng quan và đánh giá</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="tab-pane fade active in" id="amenities">
                        <div class="product-detail_amenities">
                            <p>Nằm ở trung tâm của Aspen với sự kết hợp độc đáo giữa sự xa hoa hiện đại và di sản
                                lịch sử, chỗ ở sang trọng, tiện nghi tuyệt vời, sự hiếu khách chân thành và dịch vụ
                                tận tâm để mang lại trải nghiệm tăng cường trong dãy núi Rocky.</p>
                            <div class="row">
                                <div class="col-xs-6 col-lg-4">
                                    <h6>PHÒNG KHÁCH</h6>
                                    <ul>
                                        <li>Bàn làm việc cỡ lớn</li>
                                        <li>Máy sấy tóc</li>
                                        <li>Bàn ủi/Ủi đứng khi yêu cầu</li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-lg-4">
                                    <h6>PHÒNG BẾP</h6>
                                    <ul>
                                        <li>Đồng hồ báo thức AM/FM</li>
                                        <li>Hộp thoại thoại</li>
                                        <li>Truy cập Internet tốc độ cao</li>
                                    </ul>
                                </div>
                                <div class="col-xs-6 col-lg-4">
                                    <h6>BAN CÔNG</h6>
                                    <ul>
                                        <li>Đồng hồ báo thức AM/FM</li>
                                        <li>Hộp thoại thoại</li>
                                        <li>Truy cập Internet tốc độ cao</li>
                                    </ul>
                                </div>
                                <style>
                                    body {
                                        font-family: Arial, sans-serif;
                                        background-color: #f9f9f9;
                                        margin: 0;
                                        padding: 0;
                                    }

                                    .container2 {
                                        max-width: 1200px; /* Tăng kích thước của container */
                                        margin: 200px auto 0; /* Tăng khoảng cách từ trên xuống và từ trái qua phải */
                                        padding: 30px; /* Tăng khoảng cách bên trong container */
                                        background-color: #ffffff;
                                        border-radius: 8px;
                                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2); /* Tăng độ đậm của đổ bóng */
                                    }

                                    h1 {
                                        font-size: 28px; /* Tăng kích thước của tiêu đề */
                                        color: #e74c3c;
                                        margin-bottom: 30px; /* Tăng khoảng cách dưới tiêu đề */
                                    }

                                    .comment {
                                        border: 1px solid #ddd;
                                        border-radius: 8px;
                                        padding: 15px;
                                        margin-bottom: 20px;
                                        background-color: #f9f9f9;
                                    }

                                    p {
                                        margin: 2px 0;
                                    }

                                    strong {
                                        color: #3498db;
                                    }

                                    .timestamp {
                                        font-size: 0.8em;
                                        color: #888;
                                    }


                                    .review {
                                        margin-top: 30px; /* Tăng khoảng cách giữa phần đánh giá và bình luận */
                                    }

                                    .user-info input {
                                        width: 100%; /* Chuyển input về chiều rộng đầy đủ */
                                        margin-bottom: 15px; /* Tăng khoảng cách giữa các input */
                                    }

                                    textarea {
                                        width: 100%;
                                        padding: 15px; /* Tăng padding của textarea */
                                        margin-bottom: 20px; /* Tăng khoảng cách giữa textarea và button */
                                        border: 1px solid #ddd;
                                        border-radius: 5px;
                                    }

                                    input[type="submit"] {
                                        background-color: #e74c3c;
                                        color: #fff;
                                        border: none;
                                        padding: 15px 25px; /* Tăng padding của button */
                                        border-radius: 5px;
                                        cursor: pointer;
                                    }

                                    /* Hiệu ứng hover cho button */
                                    input[type="submit"]:hover {
                                        background-color: #c0392b;
                                    }

                                    /* Thêm box-sizing cho elements để tính cả padding và border vào kích thước */
                                    * {
                                        box-sizing: border-box;
                                    }

                                </style>

                                <div class="container2">
                                    <h1>Nhận xét về phòng và các dịch vụ của khách sạn !</h1>
                                    <?php foreach ($data['cmt'] as $value): extract($value) ?>
                                        <div class="comment">
                                            <div style="display:flex; ">
                                                <p><strong><?= $user ?></strong></p>

                                            </div>
                                            <p> <?= $noi_dung ?></p>
                                            <p> <?= $thoi_gian ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                    <?php if (!empty($data['check_buy'])): ?>
                                        <form action="<?= BASE_URL ?>clientController/roomTypeDetail/<?= $id_loaiphong ?>"
                                              method="post">
                                            <div class="review">
                                                <label for="review">Nhận xét của bạn</label>
                                                <input type="hidden" name="id_loaiphong" value="<?= $id_loaiphong ?>">
                                                <input type="hidden" name="id_khachhang"
                                                       value="<?= $_SESSION['dataUser']['id_khachhang'] ?>">
                                                <textarea id="review" name="review" rows="4"></textarea>
                                            </div>
                                            <input type="submit" name="binhluan" value="BÌNH LUẬN">
                                        </form>
                                    <?php else: ?>
                                        <h5 style="color: red; text-align: center; margin-top: 50px">Chỉ đánh giá được
                                            khi bạn đã từng đặt phòng của khách sạn chúng tôi !</h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>
<!-- END / SHOP DETAIL -->

