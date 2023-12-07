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
                            <input disabled name="user" type="text" required class="form-control"
                                   value="<?= empty($user) ? '' : $user ?>"
                                   placeholder='Họ và tên ..'>
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ <span>*</span></label>
                            <input disabled type="text" name="Address" class="form-control"
                                   value="<?= empty($dia_chi) ? '' : $dia_chi ?>"
                                   title="" placeholder="Địa chỉ của bạn">
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Địa chỉ Email &nbsp; <span>*</span></label>
                                    <input disabled type="email" name="Email" class="form-control"
                                           value="<?= empty($email) ? '' : $email ?>" required="required"
                                           title="" placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Điện thoại &nbsp;<span>*</span></label>
                                    <input  disabled type="text" name="sdt" class="form-control" required
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
                                    <p>Từ <?= $data['data_checkout']['ngay_dat_phong'] ?>
                                        đến <?= $data['data_checkout']['ngay_tra_phong'] ?></p>
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
                                        Nếu bạn thanh toán trực tiếp bạn cần cọc <strong style="color: red">10%</strong>
                                        .Và thanh toán phần còn lại khi nhận phòng của chúng tôi.</span>
                                </label>
                            </div>
                            <div class="radio margin-bottom">
                                <label>
                                    <input required type="radio" name="thanhtoan" value="vnpay"><img width="50px" src="data:image/png;base64,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"
                                     alt=""> Thanh toán VN
                                    pay</label>

                            </div>
                            <div class="radio margin-bottom">
                                <label>
                                    <input required type="radio" name="thanhtoan" value="momo"><img width="50px" src="data:image/png;base64,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"
                                     alt=""> Thanh toán bằng
                                    MOMO</label>

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
