<!-- Start Slider Area -->
<div class="slider__container slider--one bg__cat--3">
    <div class="slide__container slider__activation__wrap owl-carousel">
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>Sửa Chữa Điện Thoại</h2>
                                <h1>BẢO HÀNH 12 THÁNG</h1>
                                <div class="cr__btn">
                                    <a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Mua sắm ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/slider/fornt-img/11.png"
                                alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>Thay Màn Hình</h2>
                                <h1>TIẾT KIỆM 30%</h1>
                                <div class="cr__btn">
                                    <a style="background:#FBBA00;" href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Ghé xem</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/slider/fornt-img/22.png"
                                alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
        <!-- Start Single Slide -->
        <div class="single__slide animation__style01 slider__fixed--height">
            <div class="container">
                <div class="row align-items__center">
                    <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                        <div class="slide">
                            <div class="slider__inner">
                                <h2>Sửa Chữa Điện Thoại</h2>
                                <h1>GIÁ SIÊU TIẾT KIỆM</h1>
                                <div class="cr__btn">
                                    <a style="background:#187BC1;" href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Mua sắm ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                        <div class="slide__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/slider/fornt-img/slide02.gif"
                                alt="slider images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Single Slide -->
    </div>
</div>
<!-- Start Slider Area -->
<!-- Start Category Area -->
<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'Muli', sans-serif;">SẢN PHẨM MỚI</h2>
                    <p>Thời gian bảo hành 6 - 12 tháng, hoàn 100% tiền nếu khách hàng không hài lòng</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <!-- Start Single Category -->

                    <?php 
                   while ($row = mysqli_fetch_array($dataview["LTSP"])){
                    //while ($row = mysqli_fetch_array($tin)){
                ?>

                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                    <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>"
                                        alt="product images">
                                </a>
                            </div>
                            <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li onclick="SPYT('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a ><i class="icon-heart icons"></i></a></li>

                                    <li onclick="BUYSP('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a><i class="icon-handbag icons"></i></a></li>

                                    <li><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><i class="icon-shuffle icons"></i></a></li>
                                </ul>
                            </div>
                            <div class="fr__product__inner">
                                <h4 style="height: 40px;"><a
                                        href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php  echo $row["tensanpham"];?></a>
                                </h4>
                                <ul class="fr__pro__prize">


                                    <!-- tính giá khiển mại -->
                                    <?php 
                                        if($row["giatrikhuyenmai"] > 0)
                                        {
                                    ?>
                                    <li class="old__prize" style="text-decoration-line:line-through; color: red;">
                                        <?php  echo number_format($row["dongia"], 0,',','.');?>                                      
                                        ₫</li>
                                    <li>
                                    <?php  
                                                $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                                echo number_format($giakhuyenmai, 0,',','.');
                                                ?>
                                        ₫</li>

                                    <?php                             
                                        }
                                        else{
                                            
                                        ?>
                                    <li>
                                        <?php  echo number_format($row["dongia"], 0,',','.');?>
                                        ₫</li>

                                    <?php
                                        }
                                    ?>
                                    <!-- tính giá khiển mại -->

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Category -->

                    <?php 
                }
                ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Category Area -->
<!-- Start Prize Good Area -->
<section class="htc__good__sale bg__cat--3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="fr__prize__inner">
                    <h2 style="font-family: 'Muli', sans-serif;">Kiểm tra lỗi chính xác và đưa giải pháp khắc phục cụ thể.</h2>
                    <h3>Dịch vụ sửa chữa, thay thế nhanh chóng với chi phí thấp cho khách hàng.</h3>
                    <a class="fr__btn" href="<?php echo BASE_URL?>HomeController/ChinhSach">Xem chính sách</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="prize__inner">
                    <div class="prize__thumb">
                        <img src="<?php echo BASE_URL?>public/asbab/images/banner/big-img/banner01.png"
                            alt="banner images">
                    </div>
                    <div class="banner__info">
                        <!-- <div class="pointer__tooltip pointer--3 align-left">
                            <div class="tooltip__box">
                                <h4>Tooltip Left</h4>
                                <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                            </div>
                        </div> -->
                        <div class="pointer__tooltip pointer--4 align-top">
                            <div class="tooltip__box" style="font-family: 'Muli', sans-serif;">
                                <h4 >Chuyên Nghiệp</h4>
                                <p>Nhận sửa chữa thiết bị công nghệ : điện thoại, laptop, tablet,...</p>
                            </div>
                        </div>
                        <!-- <div class="pointer__tooltip pointer--5 align-bottom">
                            <div class="tooltip__box">
                                <h4>Tooltip Bottom</h4>
                                <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                            </div>
                        </div>
                        <div class="pointer__tooltip pointer--6 align-top">
                            <div class="tooltip__box">
                                <h4>Tooltip Bottom</h4>
                                <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                            </div>
                        </div>
                        <div class="pointer__tooltip pointer--7 align-top">
                            <div class="tooltip__box">
                                <h4>Tooltip Bottom</h4>
                                <p>Lorem ipsum pisaci volupt atem accusa saes ntisdumtiu loperm asaerks.</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Prize Good Area -->
<!-- Start Product Area -->
<section class="ftr__product__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'Muli', sans-serif;">SẢN PHẨM BÁN CHẠY</h2>
                    <p>Tận tâm, trung thực với khách hàng - Chuyên nghiệp - Tiết kiệm – Tối ưu</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product__wrap clearfix">

                <!-- Start Single Category -->
                <?php 
                   while ($row = mysqli_fetch_array($dataview["SPTB"])){
                    //while ($row = mysqli_fetch_array($tin)){
                ?>

                <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                    <div class="category">
                        <div class="ht__cat__thumb">
                            <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="product images">
                            </a>
                        </div>
                        <div class="fr__hover__info">
                            <ul class="product__action">
                                <li onclick="SPYT('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a ><i class="icon-heart icons"></i></a></li>

                                <li onclick="BUYSP('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a><i class="icon-handbag icons"></i></a></li>

                                <li><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                        <div class="fr__product__inner">
                            <h4><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php  echo $row["tensanpham"];?></a></h4>
                            <ul class="fr__pro__prize">
                                <!-- tính giá khiển mại -->
                                <?php 
                                        if($row["giatrikhuyenmai"] > 0)
                                        {
                                    ?>
                                    <li class="old__prize" style="text-decoration-line:line-through; color: red;">
                                        <?php  echo number_format($row["dongia"], 0,',','.');?>                                      
                                        ₫</li>
                                    <li>
                                    <?php  
                                                $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                                echo number_format($giakhuyenmai, 0,',','.');
                                                ?>
                                        ₫</li>

                                    <?php                             
                                        }
                                        else{
                                            
                                        ?>
                                    <li>
                                        <?php  echo number_format($row["dongia"], 0,',','.');?>
                                        ₫</li>

                                    <?php
                                        }
                                    ?>
                                    <!-- tính giá khiển mại -->
                            </ul>
                        </div>
                    </div>
                </div>

                <?php 
                }
                ?>
                <!-- End Single Category -->
                
               
            </div>
        </div>
    </div>
</section>
<!-- End Product Area -->
<!-- Start Testimonial Area -->
<section class="htc__testimonial__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="ht__testimonial__activation clearfix">
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/test/client/client01.png"
                                alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4 ><a href="#">Nguyễn Cao Nguyên</a></h4>
                            <p>Sinh viên khoa công nghệ thông tin, có 3,5 năm kinh nghiệm chăn nuôi mèo số lượng vừa và nhỏ. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/test/client/client02.png"
                                alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">Đỗ Thanh Phương</a></h4>
                            <p>Sinh viên trường ĐH công nghiệp thực phẩm thành phố Hồ Chí Minh, hiện đang làm việc và chạy deadline tại TheGioiDiDong.vn. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/test/client/client03.png"
                                alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">Vũ Văn Hồng Sơn</a></h4>
                            <p>Sinh viên khóa 09 khoa công nghệ thông tin tại trường ĐH công nghiệp thực phẩm thành phố Hồ Chí Minh, đã có 6 tháng kinh nghiệp làm nhóm trưởng. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
                <!-- Start Single Testimonial -->
                <div class="col-lg-6 col-md-6 single__tes">
                    <div class="testimonial">
                        <div class="testimonial__thumb">
                            <img src="<?php echo BASE_URL?>public/asbab/images/test/client/client05.png"
                                alt="testimonial images">
                        </div>
                        <div class="testimonial__details">
                            <h4><a href="#">GVHD: Nguyễn Thế Hữu</a></h4>
                            <p>Giảng viên khoa công nghệ thông tin trường ĐH công nghiệp thực phẩm thành phố Hồ Chí Minh. </p>
                        </div>
                    </div>
                </div>
                <!-- End Single Testimonial -->
            </div>
        </div>
    </div>
</section>
<!-- End Testimonial Area -->
<!-- Start Top Rated Area -->
<section class="top__rated__area bg__white pt--100 pb--110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'Muli', sans-serif;">SẢN PHẨM YÊU THÍCH</h2>
                    <p>Chúng tôi luôn luôn quan tâm sự tin yêu của khách hàng</p>
                </div>
            </div>
        </div>
        <div class="row mt--20">

            <?php 
            while ($row = mysqli_fetch_array($dataview["SPYT"])){
            ?>

            <!-- Start Single Product -->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="htc__best__product">
                    <div class="htc__best__pro__thumb">
                        <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>"
                                alt="small product">
                        </a>
                    </div>
                    <div class="htc__best__product__details">
                        <h2><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php  echo $row["tensanpham"];?></a></h2>
                        <ul class="rating">
                            <li> <h6>Thời gian bảo hành : <span><?php echo  $row["thoihanbaohanh"]; ?> tháng</span></h6> </li>
                            <!-- <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li>
                            <li class="old"><i class="icon-star icons"></i></li> -->
                        </ul>
                        <ul class="top__pro__prize">

                            
                             <!-- tính giá khiển mại -->
                            <?php 
                                if($row["giatrikhuyenmai"] > 0)
                                {
                            ?>
                                    <li class="old__prize" style="text-decoration-line:line-through; color: red;">
                                        <?php  echo number_format($row["dongia"], 0,',','.');?>₫</li>
                                    <li>
                                    <?php  
                                                $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                                echo number_format($giakhuyenmai, 0,',','.');
                                                ?>₫</li>

                                    <?php                             
                                        }
                                        else{
                                            
                                        ?>
                                    <li>
                                        <?php  echo number_format($row["dongia"], 0,',','.');?>₫</li>

                            <?php
                                }
                            ?>
                            <!-- tính giá khiển mại -->


                        </ul>
                        <div class="best__product__action">
                            <ul class="product__action--dft">
                                <li onclick="SPYT('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a ><i class="icon-heart icons"></i></a></li>

                                <li onclick="BUYSP('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a><i class="icon-handbag icons"></i></a></li>

                                <li><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><i class="icon-shuffle icons"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product -->
            
            <?php 
            }
            ?>


        </div>
    </div>
</section>
<!-- End Top Rated Area -->
<!-- Start Brand Area -->
<div class="htc__brand__area bg__cat--4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="ht__brand__inner">
                    <ul class="brand__list owl-carousel clearfix">
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/11.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/22.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/33.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/44.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/55.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/66.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/77.png"
                                    alt="brand images"></a></li>
                        <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/22.png"
                                    alt="brand images"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Brand Area -->
<!-- Start Blog Area -->
<section class="htc__blog__area bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line" style="font-family: 'Muli', sans-serif;">VỀ CHÚNG EM</h2>
                    <p>Nhóm gồm ba thành viên có tên là PoRuRi</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ht__blog__wrap clearfix">
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="<?php echo BASE_URL?>public/asbab/images/blog/blog-img/po.jpg"
                                    alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>Thành viên 1 - Po</span>
                            </div>
                            <h2><a href="blog-details.html">Nguyễn Cao Nguyên</a></h2>
                            <p>Thành viên chăn nuôi mèo số lượng vừa và nhỏ, có 6 tháng kinh nghiệm trong công nghệ web PHP.</p>
                            <div class="blog__btn">
                                <a href="https://www.facebook.com/nguyencaonguyen246">Trang Cá Nhân</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="<?php echo BASE_URL?>public/asbab/images/blog/blog-img/ru.jpg"
                                    alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>Thành viên 2 - Ru</span>
                            </div>
                            <h2><a href="blog-details.html">Đỗ Thanh Phương</a></h2>
                            <p>Thành viên bận nhất của nhóm, hiện đang làm việc và chạy deadline tại TheGioiDiDong.vn</p>
                            <div class="blog__btn">
                                <a href="blog-details.html">Trang Cá Nhân</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
                <!-- Start Single Blog -->
                <div class="col-md-6 col-lg-4 col-sm-6 col-xs-12">
                    <div class="blog">
                        <div class="blog__thumb">
                            <a href="blog-details.html">
                                <img src="<?php echo BASE_URL?>public/asbab/images/blog/blog-img/ri.jpg"
                                    alt="blog images">
                            </a>
                        </div>
                        <div class="blog__details">
                            <div class="bl__date">
                                <span>Thành viên 3 - Ri</span>
                            </div>
                            <h2><a href="blog-details.html">Vũ Văn Hồng Sơn</a></h2>
                            <p>Là thành viên F0 của nhóm, có 6 tháng kinh nghiệm trong việc làm nhóm trưởng.</p>
                            <div class="blog__btn">
                                <a href="https://www.facebook.com/vuvanhongson">Trang Cá Nhân</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Blog -->
            </div>
        </div>
    </div>
</section>


<script>
    function SPYT(masp, makh){
        console.log(masp);
        var maspyt = masp;
        var makh = makh;
        $.post("<?php echo BASE_URL?>Ajax/SPYeuThich", {
            maspyt : maspyt,
            makh : makh,                 
            }, function(data) {  
                if(makh == 'null')
                {
                    setTimeout(function() {
                    alert("Vui lòng Đăng Nhập để thêm sản phẩm yêu thích");
                    // location.reload();
                    }, 800);
                }                  
                else if (data == true) {
                    setTimeout(function() {
                    alert("Đã thêm sản phẩm yêu thích");
                    // location.reload();
                    }, 800);
                } else {
                    // $(".hienthiloi").html("Thêm không thành công");
                    setTimeout(function() {
                        alert("Đã thêm sản phẩm yêu thích!");
                    // location.reload();
                    }, 800);
                }
                           
        });  
        
    }
</script>

<script>
    function BUYSP(masp, makh){
        console.log(masp);
        console.log(makh);
        var masp = masp;
        var makh = makh;
        $.post("<?php echo BASE_URL?>Ajax/ThemSPGioHang", {
            masp : masp,  
            makh : makh,              
            }, function(data) { 
                if(makh == 'null')
                {
                    setTimeout(function() {
                    alert("Vui lòng Đăng Nhập để thêm sản phẩm vào giỏ!");
                    // location.reload();
                    }, 800);
                }                  
                else if (data == true) {
                    setTimeout(function() {
                    alert("Đã thêm mua sản phẩm");
                    // location.reload();
                    }, 800);
                } else {
                    // $(".hienthiloi").html("Thêm không thành công");
                    setTimeout(function() {
                        alert("Đã thêm mua sản phẩm");
                    // location.reload();
                    }, 800);
                }
                           
        });  
        
    }
</script>
