<!-- BANNER -->
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
                <?php foreach ($data['room'] as $item): extract($item) ?>


                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="room-item-1">
                                <h2><a href="#"><?= $ten ?></a></h2>
                            <a href="<?= BASE_URL.'clientController/roomDetail/'.$id_phong ?>" >
                                <?php foreach ($data['images'] as $image): ?>

                                    <?php if ($image['id_phong'] == $id_phong): ?>
                                        <img style="height: 300px; width: 100%;object-fit: cover"
                                             src="<?= BASE_URL ?><?= $image['path'] ?>"
                                             class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                                        <?php break; ?>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </a>

                                <div class="content">
                                    <p><?= $mo_ta ?></p>
                                    <ul>
                                        <li>Tối đa: <?= $suc_chua ?> Người</li>
                                        <li>Quang cảnh: Biển</li>
                                        <li>Kích thước: 35 m2 / 376 ft2</li>
                                        <li>Giường: Giường King-size hoặc giường đôi</li>
                                    </ul>
                                </div>
                            <div class="bottom">
                                <span class="price">Bắt đầu từ <span class="amout">$<?= $gia ?></span> /ngày</span>
                                <a href="<?= BASE_URL ?>clientController/roomDetail/<?= $id_phong ?>" class="btn">XEM
                                    CHI TIẾT</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- KẾT THÚC / BODY-PHÒNG-1-->
