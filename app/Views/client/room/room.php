<?php

//echo "<pre>";
//print_r($_SESSION)
//?>
<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>PHÒNG VÀ GIÁ</h2>
            <p>Lorem Ipsum là đoạn văn bản giả mạo đơn giản của in ấn</p>
        </div>
    </div>
</section>
<!-- KẾT THÚC BANNER -->
<!-- BODY-PHÒNG-1 -->
<section class="body-room-1 ">
    <div class="container">
        <div class="room-wrap-1">
            <div class="row">
                <?php if (!empty($data['roomData']) and $data != null): ?>
                <?php foreach ($data['roomData'] as $item): extract($item) ?>

                    <?php
                    $noithat_array = explode(",", $noithat);
                    $images_array = explode(",", $images);
                    $images = array_unique($images_array);
                    $noithat = array_unique($noithat_array);

                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="room-item-1">
                            <h2><a href="#"><?= $ten ?></a></h2>
                            <a href="<?= BASE_URL . 'clientController/roomTypeDetail/' . $id_loaiphong ?>">
                                <img style="height: 300px; width: 100%;object-fit: cover"
                                     src="<?= BASE_URL ?><?= $images[0] ?>"
                                     class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                            </a>
                            <div class="content">
                                <ul>
                                    <li>Tối đa: <?= $suc_chua ?> Người</li>
                                    <li>Quang cảnh: Biển</li>
                                    <li>Ngày đặt phòng : <?= date('d-m-Y', strtotime($data['ngay_dat_phong'])) ?></li>
                                    <li>Ngày trả phòng phòng
                                        : <?= date('d-m-Y', strtotime($data['ngay_tra_phong'])) ?></li>
                                    <li>Kích thước: 35 m2 / 376 ft2</li>
                                    <li>Giường: Giường King-size hoặc giường đôi</li>
                                </ul>
                            </div>
                            <div class="bottom">
                                <span class="price">Giá<span class="amout">$<?= number_format($gia) ?></span> /ngày</span>
                                <a href="<?= BASE_URL ?>clientController/roomTypeDetail/<?= $id_loaiphong ?>" class="btn">XEM
                                    CHI TIẾT</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                        <h2>Tiếc quá không có phòng nào phù hợp rồi!!</h2>
                <img src="<?= BASE_URL.'public/assets/images/loadding.gif' ?>" width="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- KẾT THÚC / BODY-PHÒNG-1-->
