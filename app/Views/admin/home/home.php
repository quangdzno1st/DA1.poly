<section class="section-slider height-v">
    <div id="index12" class="owl-carousel  owl-theme">
        <div class="item">
            <img alt="Third slide" src="<?= BASE_URL ?>public/client/images/Home-1/Slider-v1.jpg"
                 class="img-responsive">
            <div class="carousel-caption">
                <h1>Welcome to Skyline</h1>
                <p><span class="line-t"></span>Hotels & Resorts <span class="line-b"></span></p>
            </div>
        </div>
        <div class="item">
            <img alt="Third slide" src="<?= BASE_URL ?>public/client/images/Home-2/Slider-v2.jpg"
                 class="img-responsive">
            <div class="container">
                <div class="carousel-caption ">
                    <h1 class="v2">Enjoy a Luxury Experience</h1>
                    <p class="p-v2"><span class="line-t"></span>Hotels & Resorts <span class="line-b"></span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="check-avail">
        <div class="container">
            <div class="arrival date-title ">
                <label>Arrival Date </label>
                <div id="datepicker" class="input-group date">
                    <input class="form-control" type="text">
                    <span class="input-group-addon"><img src="<?= BASE_URL ?>public/client/images/Home-1/date-icon.png"
                                                         alt="#"></span>
                </div>
            </div>
            <div class="departure date-title ">
                <label>Departure Date </label>
                <div id="datepickeri" class="input-group date" data-date-format="dd-mm-yyyy">
                    <input class="form-control" type="text">
                    <span class="input-group-addon"><img src="<?= BASE_URL ?>public/client/images/Home-1/date-icon.png"
                                                         alt="#"></span>
                </div>
            </div>
            <div style="width: 20%;" class="adults date-title ">
                <label>Loại phòng</label>
                <form>
                    <div style="display: flex; justify-content: center" class="carousel-search">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" style="font-size: 20px; margin-top: 30px;color: #ccc;"
                               data-toggle="dropdown" href="#">Chọn loại phòng</a>
                            <ul class="dropdown-menu">
                                <?php foreach ($data['loai'] as $item): extract($item) ?>
                                    <li>
                                        <a><strong><?= $ten ?> </strong>(<?= $suc_chua ?>)</a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>

            <div class="find_btn date-title">
                <div class="text-find">
                    Check
                    <br>Availability
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / SLIDER -->
<!-- OUR-ROOMS-->
<section class="rooms">
    <div class="container">
        <h2 class="title-room">Những căn phòng của chúng ta</h2>
        <div class="outline"></div>
        <p class="rooms-p">Khi bạn tổ chức một bữa tiệc hoặc đoàn tụ gia đình, những lễ kỷ niệm đặc biệt sẽ giúp bạn
            củng cố mối quan hệ với</p>
        <div class="wrap-rooms">
            <div class="row">
                <div id="rooms" class="owl-carousel owl-theme">
                    <div class="item ">
                        <?php foreach ($data['all_phong'] as $item): extract($item) ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <a href="<?= BASE_URL ?>clientController/roomdetail/<?= $id_phong ?>">
                                            <?php foreach ($data['images'] as $image): ?>
                                                <?php if ($image['id_phong'] == $id_phong): ?>
                                                    <img style="height: 255px; width: 370px"
                                                         src="<?= BASE_URL ?>assets/<?= $image[0]['path'] ?>"
                                                         class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                                                <?php endif; ?>
                                                <?php break; ?>
                                            <?php endforeach; ?>
                                        </a>
                                    </div>
                                    <div class="rooms-content">
                                        <h4 class="sky-h4"><?= $ten_phong ?></h4>
                                        <p class="price">$<?= $gia ?> / Một đêm</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="item ">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="wrap-box">
                                <div class="box-img">
                                    <img src="
                    <?= BASE_URL ?>public/client/images/Home-1/our-1.jpg"
                                         class="img-responsive" alt="PLuxury Room" title="Luxury Room">
                                </div>
                                <div class="rooms-content">
                                    <h4 class="sky-h4">Luxury Room</h4>
                                    <p class="price">$320 / Per Night</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="wrap-box">
                                <div class="box-img">
                                    <img src="
                    <?= BASE_URL ?>public/client/images/Home-1/our-2.jpg"
                                         class="img-responsive" alt="Double Room" title="Double Room">
                                </div>
                                <div class="rooms-content">
                                    <h4 class="sky-h4">Double Room</h4>
                                    <p class="price">$320 / Per Night</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="wrap-box">
                                <div class="box-img">
                                    <img src="
                    <?= BASE_URL ?>public/client/images/Home-1/our-3.jpg"
                                         class="img-responsive" alt="Family Room" title="Family Room">
                                </div>
                                <div class="rooms-content">
                                    <h4 class="sky-h4">Family Room</h4>
                                    <p class="price">$320 / Per Night</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="wrap-box">
                                <div class="box-img">
                                    <img src="
                    <?= BASE_URL ?>public/client/images/Home-1/our-4.jpg"
                                         class="img-responsive" alt="Deluxe Room" title="Deluxe Room">
                                </div>
                                <div class="rooms-content">
                                    <h4 class="sky-h4">Deluxe Room</h4>
                                    <p class="price">$320 / Per Night</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="wrap-box">
                                <div class="box-img">
                                    <img src="
                    <?= BASE_URL ?>public/client/images/Home-1/our-5.jpg"
                                         class="img-responsive" alt="Single Room" title="Single Room">
                                </div>
                                <div class="rooms-content">
                                    <h4 class="sky-h4">Single Room</h4>
                                    <p class="price">$320 / Per Night</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
                            <div class="wrap-box">
                                <div class="box-img">
                                    <img src="
                    <?= BASE_URL ?>public/client/images/Home-1/our-6.jpg"
                                         class="img-responsive" alt="Presidential Room" title="Presidential Room">
                                </div>
                                <div class="rooms-content">
                                    <h4 class="sky-h4">Presidential Room</h4>
                                    <p class="price">$320 / Per Night</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /container -->
</section>
<!-- END / ROOMS -->
<!-- ABOUT-US-->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                <div class="about-centent">
                    <h2 class="about-title">About Us</h2>
                    <div class="line"></div>
                    <p class="about-p">Contrary to popular belief, Lorem isn’t simply random text. It has roots in a of
                        classical Latin literature from 45 BC, making it over 2000 years old. Avalon’s leading hotels
                        with gracious island hospitality, thoughtful amenities and distinctive</p>
                    <p class="about-p1">Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,
                        looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage ...</p>
                    <a href="#" class="read-more">READ MORE </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 ">
                <div class="about-img">
                    <div class="img-1">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-3.jpg" class="img-responsive"
                             alt="Image">
                        <div class="img-2">
                            <img src="<?= BASE_URL ?>public/client/images/Home-1/about-1.jpg" class="img-responsive"
                                 alt="Image">
                        </div>
                        <div class="img-3">
                            <img src="<?= BASE_URL ?>public/client/images/Home-1/about-2.jpg" class="img-responsive"
                                 alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END/ ABOUT-US-->
<!-- BEST -->
<section class="best">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-1.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">Master Bedrooms</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-2.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">Sea View Balcony</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-3.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">Pool & Spa</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-4.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">Wifi Coverage</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-5.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">AwESOME pACKAGES</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-6.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">cLEANING eVERDAY</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-7.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">bUTFFET Breakfast</h6>
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                <div class="wrap-best">
                    <div class="icon-best">
                        <img src="<?= BASE_URL ?>public/client/images/Home-1/about-icon-8.png" class="img-responsive"
                             alt="Image">
                    </div>
                    <h6 class="sky-h6">Airport Taxi</h6>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / BEST -->
<!-- TESTIMONOALS -->
<section class="testimonials">
    <div class="testimonials-h">
        <div class="testimonials-content">
            <div class="container">
                <div id="testimonials" class="owl-carousel owl-theme">
                    <div class="item ">
                        <div class="img-testimonials"><img
                                    src="<?= BASE_URL ?>public/client/images/Home-1/about-testimonials-img.png" alt="#">
                        </div>
                        <p class="testimonials-p"><span>“</span>​‌ This is the only place to stay in Catalina! I have
                            stayed in the cheaper hotels and they were fine, but this is just the icing on the cake!
                            After spending the day bike riding and hiking to come back and enjoy a glass of wine while
                            looking out your <span>​‌​‌”</span> ocean view window and then to top it all off...</p>
                        <h5 class="sky-h5">JULIA ROSE</h5>
                        <p class="testimonials-p1">From Los Angeles, California</p>
                    </div>
                    <div class="item">
                        <div class="img-testimonials"><img
                                    src="<?= BASE_URL ?>public/client/images/Home-1/about-testimonials-img.png" alt="#">
                        </div>
                        <p class="testimonials-p"><span>“</span>​‌ Thisis the only place to stay in Catalina! I have
                            stayed in the cheaper hotels and they were fine, but this is just the icing onthe cake!
                            After spending the day bike riding and hiking to come back and enjoy a glass of wine while
                            looking out your <span>​‌​‌”</span> ocean view window and then to top it all off...</p>
                        <h5 class="sky-h5">JULIA ROSE</h5>
                        <p class="testimonials-p1">From Los Angeles, California</p>
                    </div>
                    <div class="item">
                        <div class="img-testimonials"><img
                                    src="<?= BASE_URL ?>public/client/images/Home-1/about-testimonials-img.png" alt="#">
                        </div>
                        <p class="testimonials-p"><span>“</span>​‌ This is the only place to stay in Catalina! I have
                            stayed in the cheaper hotels and they were fine, but this is just the icing on the cake!
                            After spending the day bike riding and hiking to come back and enjoy a glass of wine while
                            looking out your <span>​‌​‌”</span> ocean view window and then to top it all off...</p>
                        <h5 class="sky-h5">JULIA ROSE</h5>
                        <p class="testimonials-p1">From Los Angeles, California</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / TESTIMONOALS -->
<!--OUR-EVENTS-->
<section class="events">
    <div class="container">
        <h2 class="events-title">Our Events</h2>
        <div class="line"></div>
        <div id="events-v2" class="owl-carousel owl-theme">
            <div class="item ">
                <div class="events-item">
                    <div class="events-img"><img src="<?= BASE_URL ?>public/client/images/Home-1/Our-Events-1.jpg"
                                                 class="img-responsive" alt="Image"></div>
                    <div class="events-content">
                        <a href="#" title="">
                            <p class="sky-p">EVENTS</p>
                            <h3 class="sky-h3">Wedding Day</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="events-item">
                    <div class="events-img"><img src="<?= BASE_URL ?>public/client/images/Home-1/Our-Events-2.jpg"
                                                 class="img-responsive" alt="Image"></div>
                    <div class="events-content">
                        <a href="#" title="">
                            <p class="sky-p">EVENTS</p>
                            <h3 class="sky-h3">Golf Cup 2017</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="events-item">
                    <div class="events-img"><img src="<?= BASE_URL ?>public/client/images/Home-1/Our-Events-3.jpg"
                                                 class="img-responsive" alt="Image"></div>
                    <div class="events-content">
                        <a href="#" title="">
                            <p class="sky-p">EVENTS</p>
                            <h3 class="sky-h3"> Beach Sports</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / OUR EVENTS -->
<!--OUR-NEWS-->
<section class="news">
    <div class="container">
        <h2 class="new-title">News</h2>
        <div class="line"></div>
        <div class="row">
            <div class="news-content">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="substance">
                        <div class="date">
                            <div class="day">25</div>
                            <div class="year"> AUGUST
                                <br>2017
                            </div>
                        </div>
                        <div class="text">
                            <a href="#">Update menu food in Skyline Hotel</a>
                        </div>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="substance">
                        <div class="date">
                            <div class="day">22</div>
                            <div class="year"> AUGUST
                                <br>2017
                            </div>
                        </div>
                        <div class="text">
                            <a href="#">Las Maquinas on Tragamonedas</a>
                        </div>
                        <a href="#" class="read-more">Read More </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="substance">
                        <div class="date">
                            <div class="day">06</div>
                            <div class="year"> AUGUST
                                <br>2017
                            </div>
                        </div>
                        <div class="text">
                            <a href="#">Mother Earth Hosts Our Travels</a>
                        </div>
                        <a href="#" class="read-more">Read More </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / OUR NEWS -->
<!-- OUR-GALLERY-->
<section class="gallery-our">
    <div class="container-fluid">
        <div class="gallery">
            <h2 class="title-gallery">Our Gallery</h2>
            <div class="outline"></div>
            <ul class="nav nav-tabs text-uppercase">
                <li class="active"><a data-toggle="tab" href="#Hotel">Hotel & Ground</a></li>
                <li><a data-toggle="tab" href="#menu1">Room/Suite </a></li>
                <li><a data-toggle="tab" href="#menu2">Bathroom</a></li>
                <li><a data-toggle="tab" href="#menu3">Dining</a></li>
            </ul>
            <br/>
            <div class="tab-content">
                <div id="Hotel" class="tab-pane fade in active">
                    <div class="product ">
                        <div class="row">
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-1.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main " title>
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-1-1.jpg"
                                               data-littlelightbox-group="gallery" title="Luxury Room view all"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-2.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="HIHI"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-3.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-3-3.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-4.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-4-4.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-5.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-5-5.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-6.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-6-6.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-7.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-7-7.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-8.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-8-8.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <div class="product ">
                        <div class="row">
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-6.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-7.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-3-3.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-8.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-4-4.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="product ">
                        <div class="row">
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-7.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-8.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-6-6.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="product ">
                        <div class="row">
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-3.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-4.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-5.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-6.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-7.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery_product col-lg-3 col-md-3 col-sm-4 col-xs-6 ">
                                <div class="wrap-box">
                                    <div class="box-img">
                                        <img src="<?= BASE_URL ?>public/client/images/Home-1/gallery-8.jpg"
                                             class="img-responsive" alt="Product" title="images products">
                                    </div>
                                    <div class="gallery-box-main">
                                        <div class="gallery-icon">
                                            <a class="lightbox " href="images/Home-1/gallery-2-2.jpg"
                                               data-littlelightbox-group="gallery" title="Flying is life"><i
                                                        class="ion-ios-plus-empty" aria-hidden="true"></i> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end-tab-content -->
            <div class="text-center">
                <button type="button" class="btn btn-default btn-our">VIEW MORE</button>
            </div>
        </div>
        <!-- /gallery -->
    </div>
    <!-- /container -->
</section>
<!-- END / OUR GALLERY -->
<!--FOOTER-->
