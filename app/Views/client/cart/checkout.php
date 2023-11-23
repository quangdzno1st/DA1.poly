<!-- END-HEADER -->
<?php
extract($data['user']);
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
<form action="<?= BASE_URL ?>CartController/paymentVnPay" method="post" target="_blank" enctype="application/x-www-form-urlencoded">
<section class="check-out">
    <div class="container">
        <p class="check-p">Khách hàng quay lại? <a href="#" title="">Nhấn vào đây để đăng nhập</a></p>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="check-left ">
                    <h2 class="mb-2">VUI LÒNG ĐIỀN THÔNG TIN CỦA BẠN</h2>
                    <div class="form-group">
                        <label>Họ và tên<span>*</span></label>
                        <input name="user" type="text" class="form-control" value="<?= empty($user) ? '' : $user ?>" placeholder='Họ và tên ..'>
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
                                <input type="text" name="sdt" class="form-control" placeholder="Số điện thoại" value="<?= empty($sdt) ? '' : $sdt ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Ghi chú đơn hàng</label>
                        <textarea name="ghi_chu" class="form-control" rows="3"
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
                                <a href="#"><img src="images/Checkout/checkout.jpg" alt="#"></a>
                            </div>
                            <div class="text">
                                <a href="#">Phòng sang trọng</a>
                                <p><span>2 ngày - 3 phòng</span> <b>$240</b></p>
                            </div>
                            <a href="#" class="remove"> <i class="ion-close-round" aria-hidden="true"></i></a>
                        </div>
                        <!-- KẾT THÚC / SẢN PHẨM -->
                        <!-- SẢN PHẨM -->
                        <div class="cart-item">
                            <div class="img">
                                <a href="#"><img src="images/Checkout/checkou-1t.jpg" alt="#"></a>
                            </div>
                            <div class="text">
                                <a href="#">Phòng tiêu chuẩn</a>
                                <p><span>2 ngày - 2 phòng</span> <b>$360</b></p>
                            </div>
                            <a href="#" class="remove"> <i class="ion-close-round" aria-hidden="true"></i></a>
                        </div>
                        <!-- KẾT THÚC / SẢN PHẨM -->
                        <!-- SẢN PHẨM -->
                        <div class="cart-item">
                            <div class="img">
                                <a href="#"><img src="images/Checkout/checkou-3t.jpg" alt="#"></a>
                            </div>
                            <div class="text">
                                <a href="#">Phòng đôi</a>
                                <p><span>4 ngày - 1 phòng</span> <b>$480</b></p>
                            </div>
                            <a href="#" class="remove"><i class="ion-close-round" aria-hidden="true"></i></a>
                        </div>
                        <!-- KẾT THÚC / SẢN PHẨM -->
                    </div>
                    <div class="checkout-cartinfo">
<!--                        <p><span>Tổng giá trị đơn hàng:</span>$1080</p>-->
<!--                        <p><span>Vận chuyển:</span>Miễn phí vận chuyển</p>-->
                        <p><span>Tổng đơn hàng:</span><strong>$1080</strong></p>
                        <input type="hidden" name="tong_tien" value="1080">
                    </div>
                    <div class="checkout-option">
                        <div class="radio">
                            <label>
                                <input type="radio" name="optradio"> Chuyển khoản ngân hàng trực tiếp
                                <span>Hãy thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn làm tham chiếu thanh toán. Đơn hàng của bạn sẽ không được gửi cho đến khi số tiền đã được chuyển vào tài khoản của chúng tôi.</span>
                            </label>
                        </div>
                        <div class="radio margin-bottom">
                            <label>
                                <input type="radio" name="vnpay"> Thanh toán VN pay</label>
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
