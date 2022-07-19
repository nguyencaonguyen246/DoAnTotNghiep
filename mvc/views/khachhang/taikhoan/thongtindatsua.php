<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg19.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Thông Tin Đặt Sửa</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            
                            <div class="accordion__title">
                                Thông Tin Đặt Sửa
                            </div>
                            <div class="accordion__body">
                                <div class="bilinfo">
                                    <h3 class="shipinfo__title">Đặt Lịch Sửa Chữa Tại CapCuuDienThoai.vn</h3>
                                    <p><b>địa chỉ:</b> 140 Lê Trọng Tấn, ...</p>
                                    <p>Sau khi đặt lịch sửa tại cửa hàng CapCuuDienThoai.vn sẽ có nhân viên hỗ trợ quý khách hẹn lịch sửa chữa tại của hàng.</p>
                                    
                                </div>
                            </div>
                            
                            

                        </div>
                    </div>
                </div>
                
                <ul class="shopping__btn">
                        <li><a href="<?php echo BASE_URL?>GioHangController/XacNhanDatLichSua">Đặt Hàng</a></li>
                        <li class="shp__checkout"><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Tiếp Tục Mua Hàng</a></li>
                </ul>
                
            </div>
            <div class="col-md-6">
                <div class="order-details">
                    <h5 class="order-details__title">Sản Phẩm Đặt Sửa</h5>
                    <div class="order-details__item">

                        <?php 
                            $tongtien = 0; 
                            for ($i=0; $i < sizeof($_SESSION['dathang']) ; $i++) { 
                        ?>

                        <div class="single-item">
                            <div class="single-item__thumb">
                            <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $_SESSION['dathang'][$i][4]; ?>/9">
                                <img src="<?php echo $_SESSION['dathang'][$i][0]?>" alt="ordered item"></a>
                            </div>
                            <div class="single-item__content">
                                <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $_SESSION['dathang'][$i][4]; ?>/9"><?php echo $_SESSION['dathang'][$i][1]?></a><br>
                                <a>Số Lượng: <?php echo $_SESSION['dathang'][$i][3]?></a>
                                <span class="price"> <?php echo number_format($_SESSION['dathang'][$i][2], 0,',','.');?> VNĐ</span>
                            </div>
                            <div class="single-item__remove">
                                <a href="<?php echo BASE_URL?>GioHangController/xoaitem/<?php echo $i; ?>"><i class="zmdi zmdi-delete"></i></a>
                            </div>
                        </div>

                        <!-- tinhs toong tien -->
                        <?php 
                            $thanhtien = 0;
                            $thanhtien = $_SESSION['dathang'][$i][2]*$_SESSION['dathang'][$i][3];
                            $tongtien += $thanhtien;
                        ?>
                         <!-- tinhs toong tien -->

                        <?php 
                        }
                        ?>
                        
                    </div>
                    <div class="order-details__count">
                        <div class="order-details__count__single">
                            <h5>Tạm Tính</h5>
                            <span class="price"><?php  echo number_format($tongtien, 0,',','.'); ?> vnđ</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Phí khác</h5>
                            <span class="price">0.00 vnđ</span>
                        </div>
                        <div class="order-details__count__single">
                            <h5>Shipping</h5>
                            <span class="price">0 vnđ</span>
                        </div>
                    </div>
                    <div class="ordre-details__total">
                        <h5>Tổng Hóa Đơn</h5>
                        <span class="price"><?php  echo number_format($tongtien, 0,',','.'); ?> vnđ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->

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