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
                            <span class="breadcrumb-item active">Xác Nhận Bảo Hành</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align:center;">
                <h2>PHIẾU BẢO HÀNH</h2> <br>
                </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Hình Ảnh</th>
                                            <th class="product-name">Tên Sản Phẩm</th>
                                            <th class="product-price">Mã Hóa Đơn</th>
                                            <th class="product-quantity">Ngày Mua</th>
                                            <th class="product-subtotal">Thời Hạn Bảo Hành</th>
                                            <th class="product-remove">Chi Phí</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            while ($row = mysqli_fetch_array($dataview["SPBH"])){
                                        ?>

                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?php echo $row["tensanpham"]?></a>
                                                
                                            </td>
                                            <td class="product-price"><span class="amount"><?php echo $row["mahd"]?></span></td>
                                            <td class="product-price"><span class="amount"><?php echo $row["ngaylap"]?></span></td>
                                            <td class="product-subtotal"><?php echo $row["thoihanbaohanh"]?></td>
                                            <td class="product-subtotal">0₫</td>
                                        </tr>  
                                        
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            
                                            <a href="<?php echo BASE_URL?>SanPhamController/XacNhanBaoHanh/<?php echo $row["mahd"]; ?>/<?php echo $row["macthd"]; ?>">Xác Nhận Gửi Yêu Cầu</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <?php 
                                    }
                                ?>
                            
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->

        <!-- Start Banner Area -->
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
        <!-- End Banner Area -->