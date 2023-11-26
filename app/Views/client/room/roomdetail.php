<?php
foreach ($data as $item) {
    extract($item);
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
                                <span class="amout"><?= number_format($data[0]['gia']) ?></span> /days
                            </p>
                        </div>
                        <form method="post" action="<?= BASE_URL ?>cartController/checkOut">
                            <div class="product-detail_form">

                                <div class="sidebar">
                                    <!-- WIDGET CHECK AVAILABILITY -->
                                    <div class="widget widget_check_availability">
                                        <div class="check_availability">


                                            <div class="check_availability-field">
                                                <label>Số lượng phòng cần đặt : </label>
                                                <input class="form-control" name="so_luong_order" type="number"
                                                       value="1" min="1" max="<?= $data[0]['so_luong'] ?>">

                                                <label>Arrive</label>
                                                <div class="input-group date" data-date-format="dd-mm-yyyy"
                                                     id="datepicker1">
                                                    <input class="form-control wrap-box" type="text"
                                                           placeholder="Arrival Date"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_dat_phong'] : $_SESSION['dateDefault']['ngay_dat_phong'] ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                                                       aria-hidden="true"></i></span>
                                                    <input type="hidden" name="ngay_dat_phong"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_dat_phong'] : $_SESSION['dateDefault']['ngay_dat_phong'] ?>">
                                                </div>
                                            </div>
                                            <div class="check_availability-field">
                                                <label>Depature</label>
                                                <div id="datepicker2" class="input-group date"
                                                     data-date-format="dd-mm-yyyy">
                                                    <input type="hidden" name="id_loaiphong"
                                                           value="<?= $data[0]['id_loaiphong'] ?>">
                                                    <input class="form-control wrap-box" type="text"
                                                           placeholder="Departure Date"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_tra_phong'] : $_SESSION['dateDefault']['ngay_tra_phong'] ?>">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"
                                                                                       aria-hidden="true"></i></span>
                                                    <input type="hidden" name="ngay_tra_phong"
                                                           value="<?= isset($_SESSION['dataSearch']) ? $_SESSION['dataSearch']['ngay_tra_phong'] : $_SESSION['dateDefault']['ngay_tra_phong'] ?>">

                                                </div>
                                            </div>
                                            <label class="check_availability" style="margin-top: 10px;">Số lượng còn lại
                                                : <?= $data[0]['so_luong'] ?></label>
                                        </div>
                                    </div>
                                    <!-- END / WIDGET CHECK AVAILABILITY -->
                                </div>
                                <button type="submit" class="btn btn-room btn-product" name="bookNow">Book Now</button>
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
                        <li><a href="#overview" data-toggle="tab">TỔNG QUAN</a></li>
                        <li class="active"><a href="#amenities" data-toggle="tab">TIỆN ÍCH</a></li>
                        <li><a href="#package" data-toggle="tab">GÓI DỊCH VỤ</a></li>
                        <li><a href="#rates" data-toggle="tab">GIÁ CẢ</a></li>
                        <li><a href="#calendar" data-toggle="tab">Lịch</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="product-detail_tab-content tab-content">
                        <!-- TỔNG QUAN -->
                        <div class="tab-pane fade" id="overview">
                            <div class="product-detail_overview">

                                <div class="row">
                                    <div class="col-xs-6 col-md-4">
                                        <h6><?= $data['roomData'][0]['ten'] ?></h6>
                                        <ul>

                                            <li>Diện Tích: 35 m2 / 376 ft2</li>
                                            <li>Quang Cảnh: Biển</li>
                                            <li>Giường: Loại King hoặc giường đôi</li>
                                        </ul>
                                    </div>
                                    <div class="col-xs-6 col-md-4">
                                        <h6>PHÒNG DỊCH VỤ</h6>
                                        <ul>
                                            <li>Bàn làm việc cỡ lớn</li>
                                            <li>Máy sấy tóc</li>
                                            <li>Bàn ủi/Ủi đứng khi yêu cầu</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- KẾT THÚC / TỔNG QUAN -->
                    <!-- TIỆN ÍCH -->
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
                                <!-- ... (tiếp tục phần còn lại) -->
                            </div>
                        </div>
                    </div>
                    <!-- KẾT THÚC / TIỆN ÍCH -->
                    <!-- GÓI DỊCH VỤ -->
                    <div class="tab-pane fade" id="package">
                        <div class="product-detail_package">
                            <!-- MỤC gói dịch vụ -->
                            <!-- ... (tiếp tục phần còn lại) -->
                        </div>
                    </div>
                    <!-- KẾT THÚC / GÓI DỊCH VỤ -->
                    <!-- GIÁ CẢ -->
                    <div class="tab-pane fade" id="rates">
                        <div class="product-detail_rates">
                            <table>
                                <!-- ... (tiếp tục phần còn lại) -->
                            </table>
                        </div>
                    </div>
                    <!-- KẾT THÚC / GIÁ CẢ -->
                    <!-- LỊCH -->
                    <div class="tab-pane fade" id="calendar">
                        <div class="product-detail_calendar-wrap row">
                            <div class="col-sm-6">
                                <!-- CALENDAR ITEM -->
                                <div class="calendar_custom">
                                    <div class="calendar_title">
                                        <span class="calendar_month">JUNE</span>
                                        <span class="calendar_year">2017</span>
                                        <a href="#" class="calendar_prev calendar_corner"><i
                                                    class="ion-ios-arrow-thin-left"></i></a>
                                    </div>
                                    <table class="calendar_tabel">
                                        <thead>
                                        <tr>
                                            <th>Su</th>
                                            <th>Mo</th>
                                            <th>Tu</th>
                                            <th>We</th>
                                            <th>Th</th>
                                            <th>Fr</th>
                                            <th>Sa</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td></td>
                                            <td class="apb-calendar_current-date">
                                                <a href="#"><small>1</small></a>
                                            </td>
                                            <td><a href="#"><small>2</small></a></td>
                                            <td><a href="#"><small>3</small></a></td>
                                            <td><a href="#"><small>4</small></a></td>
                                            <td><a href="#"><small>5</small></a></td>
                                            <td><a href="#"><small>6</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>7</small></a></td>
                                            <td><a href="#"><small>8</small></a></td>
                                            <td><a href="#"><small>9</small></a></td>
                                            <td><a href="#"><small>10</small></a></td>
                                            <td class="apb-calendar_current-select"><a href="#"><small>11</small></a>
                                            </td>
                                            <td class="apb-calendar_current-select"><a href="#"><small>12</small></a>
                                            </td>
                                            <td><a href="#"><small>13</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>14</small></a></td>
                                            <td><a href="#"><small>15</small></a></td>
                                            <td class="not-available"><a href="#"><small>16</small></a></td>
                                            <td class="not-available"><a href="#"><small>17</small></a></td>
                                            <td><a href="#"><small>18</small></a></td>
                                            <td><a href="#"><small>19</small></a></td>
                                            <td><a href="#"><small>20</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>21</small></a></td>
                                            <td><a href="#"><small>22</small></a></td>
                                            <td><a href="#"><small>23</small></a></td>
                                            <td><a href="#"><small>24</small></a></td>
                                            <td><a href="#"><small>25</small></a></td>
                                            <td><a href="#"><small>26</small></a></td>
                                            <td><a href="#"><small>27</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>28</small></a></td>
                                            <td><a href="#"><small>29</small></a></td>
                                            <td><a href="#"><small>30</small></a></td>
                                            <td><a href="#"><small>31</small></a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- END CALENDAR ITEM -->
                            </div>
                            <div class="col-sm-6">
                                <!-- CALENDAR ITEM -->
                                <div class="calendar_custom">
                                    <div class="calendar_title">
                                        <span class="calendar_month">JUNE</span>
                                        <span class="calendar_year">2017</span>
                                        <a href="#" class="calendar_next calendar_corner"><i
                                                    class="ion-ios-arrow-thin-right"></i></a>
                                    </div>
                                    <table class="calendar_tabel">
                                        <thead>
                                        <tr>
                                            <th>Su</th>
                                            <th>Mo</th>
                                            <th>Tu</th>
                                            <th>We</th>
                                            <th>Th</th>
                                            <th>Fr</th>
                                            <th>Sa</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                            <td></td>
                                            <td class="apb-calendar_current-date">
                                                <a href="#"><small>1</small></a>
                                            </td>
                                            <td><a href="#"><small>2</small></a></td>
                                            <td><a href="#"><small>3</small></a></td>
                                            <td><a href="#"><small>4</small></a></td>
                                            <td><a href="#"><small>5</small></a></td>
                                            <td><a href="#"><small>6</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>7</small></a></td>
                                            <td><a href="#"><small>8</small></a></td>
                                            <td><a href="#"><small>9</small></a></td>
                                            <td><a href="#"><small>10</small></a></td>
                                            <td class="apb-calendar_current-select"><a href="#"><small>11</small></a>
                                            </td>
                                            <td class="apb-calendar_current-select"><a href="#"><small>12</small></a>
                                            </td>
                                            <td><a href="#"><small>13</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>14</small></a></td>
                                            <td><a href="#"><small>15</small></a></td>
                                            <td class="not-available"><a href="#"><small>16</small></a></td>
                                            <td class="not-available"><a href="#"><small>17</small></a></td>
                                            <td><a href="#"><small>18</small></a></td>
                                            <td><a href="#"><small>19</small></a></td>
                                            <td><a href="#"><small>20</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>21</small></a></td>
                                            <td><a href="#"><small>22</small></a></td>
                                            <td><a href="#"><small>23</small></a></td>
                                            <td><a href="#"><small>24</small></a></td>
                                            <td><a href="#"><small>25</small></a></td>
                                            <td><a href="#"><small>26</small></a></td>
                                            <td><a href="#"><small>27</small></a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#"><small>28</small></a></td>
                                            <td><a href="#"><small>29</small></a></td>
                                            <td><a href="#"><small>30</small></a></td>
                                            <td><a href="#"><small>31</small></a></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- END CALENDAR ITEM -->
                            </div>
                            <div class="calendar_status text-center col-sm-12">
                                <span>Available</span>
                                <span class="not-available">Not Available</span>
                            </div>
                        </div>
                    </div>
                    <!-- KẾT THÚC / LỊCH -->
                </div>
            </div>
        </div>
    </div>

    <!--    <div class="product-detail">-->
    <!--        <h2 class="product-detail_title">Các Chỗ Ở Khác</h2>-->
    <!--        <div class="product-detail_content">-->
    <!--            <div class="row">-->
    <!--                --><?php //foreach ($data['list_roomother'] as $list): extract($list) ?>
    <!--                    <div class="col-sm-6 col-md-3 col-lg-3">-->
    <!--                        <div class="product-detail_item">-->
    <!--                            --><?php //foreach ($data['images'] as $image): ?>
    <!--                                --><?php //if ($image['id_phong'] == $id_phong): ?>
    <!--                                    <img style="height: 255px; width: 370px"-->
    <!--                                         src="--><?php //= BASE_URL ?><!----><?php //= $image['path'] ?><!--"-->
    <!--                                         class="img-responsive" alt="PLuxury Room" title="Luxury Room">-->
    <!--                                    --><?php //break; ?>
    <!---->
    <!--                                --><?php //endif; ?>
    <!--                            --><?php //endforeach; ?>
    <!--                            <div class="text">-->
    <!--                                <h2><a href="#">--><?php //= $ten_phong ?><!--</a></h2>-->
    <!--                                <ul>-->
    <!--                                    <li><i class="fa fa-child" aria-hidden="true"></i> Tối Đa: -->
    <?php //= $suc_chua ?><!-- Người-->
    <!--                                    </li>-->
    <!--                                    <li><i class="fa fa-bed" aria-hidden="true"></i> Giường: Loại King hoặc đôi</li>-->
    <!--                                    <li><i class="fa fa-eye" aria-hidden="true"></i> Quang Cảnh: Biển</li>-->
    <!--                                </ul>-->
    <!--                                <a href="--><?php //= BASE_URL ?><!--clientController/roomdetail/-->
    <?php //= $id_phong ?><!--"-->
    <!--                                   class="btn btn-room">XEM CHI TIẾT</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                --><?php //endforeach; ?>
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->

    <!-- END / ANOTHER ACCOMMODATION -->
    </div>
</section>
<!-- END / SHOP DETAIL -->

