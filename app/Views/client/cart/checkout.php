<?php
if (!empty($data)) {
    extract($data['user']);
    extract($data['data_checkout']);
    $noithat_array = explode(",", $noithat);
    $images_array = explode(",", $images);
    $images = array_unique($images_array);
    $noithat = array_unique($noithat_array);
}
?>

<section class="banner-tems text-center">
    <div class="container">
        <div class="banner-content">
            <h2>Thanh toán</h2>
            <p>Lorem Ipsum chỉ là văn bản giả mạo của in ấn</p>
        </div>
    </div>
</section>
<!-- BODY-ROOM-5 -->
<form action="<?= BASE_URL ?>CartController/thanhToan" method="post" target="_blank"
      enctype="application/x-www-form-urlencoded">
    <section class="check-out">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="check-left ">
                        <h2 class="mb-2">VUI LÒNG ĐIỀN THÔNG TIN CỦA BẠN</h2>
                        <div class="form-group">
                            <label>Họ và tên<span>*</span></label>
                            <input name="user" type="text" required class="form-control"
                                   value="<?= empty($user) ? '' : $user ?>"
                                   placeholder='Họ và tên ..'>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ <span>*</span></label>
                            <input type="text" name="Address" class="form-control"
                                   value="<?= empty($dia_chi) ? '' : $dia_chi ?>"
                                   title="" placeholder="Địa chỉ của bạn">
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Địa chỉ Email &nbsp; <span>*</span></label>
                                    <input type="email" name="Email" class="form-control"
                                           value="<?= empty($email) ? '' : $email ?>" required="required"
                                           title="" placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Điện thoại &nbsp;<span>*</span></label>
                                    <input type="text" name="sdt" class="form-control" required
                                           placeholder="Số điện thoại"
                                           value="<?= empty($sdt) ? '' : $sdt ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ghi chú đơn hàng</label>
                            <textarea name="ghi_chu" class="form-control" rows="3" required
                                      placeholder="Ghi chú về đơn hàng của bạn, ví dụ: ghi chú đặc biệt cho giao hàng"></textarea>
                        </div>
                        <!--                    <div class="click form-control">Bạn có mã giảm giá? <a href="#" title="">Nhấn vào đây để nhập mã của-->
                        <!--                            bạn</a>-->
                        <!--                    </div>-->
                    </div>
                    <!-- item-right -->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5 col-lg-offset-1">
                    <div class="check-right ">
                        <h2 class="text-uppercase">Thông tin thanh toán của bạn</h2>
                        <div class="checkout_cart">
                            <!-- SẢN PHẨM -->
                            <div class="cart-item">
                                <div class="img">
                                    <a href="#"><img src="<?= BASE_URL ?><?= $images[0] ?>" alt="#"></a>
                                </div>
                                <div class="text">
                                    <a href="#"><?= $ten ?></a>
                                    <p>Nội thất:
                                        <?php
                                        $noithatView = implode(' , ', $noithat);
                                        echo $noithatView;
                                        ?>
                                    </p>
                                    <p><span><?= $so_ngay_chenh_lech ?> ngày - <?= $so_luong_order ?> phòng</span>
                                        <p>Từ  <?= $data['data_checkout']['ngay_dat_phong']  ?> đến <?= $data['data_checkout']['ngay_tra_phong']  ?></p>
                                        <b><?= number_format($gia) ?> VNĐ</b></p>
                                </div>
                            </div>

                        </div>
                        <div class="checkout-cartinfo">
                            <p><span>Tổng đơn hàng:</span><strong><?= number_format($tong_tien) ?> VNĐ</strong></p>
                            <input type="hidden" name="tong_tien" value="<?= $tong_tien ?>">
                            <input type="hidden" name="id_loaiphong" value="<?= $id_loaiphong ?>">
                            <input type="hidden" name="id_phong" value="<?= $id_phong ?>">
                        </div>
                        <div class="checkout-option">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="thanhtoan" value="tructiep"> Thanh toán khi nhận phòng
                                    <span><strong style="color: red">*</strong>
                                        Nếu bạn thanh toán trực tiếp bạn cần cọc <strong style="color: red">5%</strong>
                                        .Và thanh toán phần còn lại khi nhận phòng của chúng tôi.</span>
                                </label>
                            </div>
                            <div class="radio margin-bottom">
                                <label>
                                    <input required type="radio" name="thanhtoan" value="vnpay"> Thanh toán VN
                                    pay</label>
                            </div>
                        </div>
                        <input type="submit" name="payment" class="checkout-btn btn" value="ĐẶT HÀNG"></input>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
    </section>
</form>
