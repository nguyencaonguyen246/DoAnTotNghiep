<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg11.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Giỏ Hàng Mua</span>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form id="cart-form" action="<?php echo BASE_URL?>GioHangController/ThongTinGioHang?action=submit"
                 method="POST">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình Ảnh</th>
                                    <th class="product-name">Tên Sản Phẩm</th>
                                    <th class="product-price">Đơn Giá</th>
                                    <th class="product-quantity">Số Lượng</th>
                                    <th class="product-subtotal">Thành Tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                while ($row = mysqli_fetch_array($dataview["CART"])){
                                //while ($row = mysqli_fetch_array($tin)){
                                ?>

                                <tr>
                                    <td class="product-thumbnail"><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>"
                                                alt="product img" /></a></td>
                                    <td class="product-name"><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php  echo $row["tensanpham"];?></a>
                                        <ul class="pro__prize">
                                            
                                        <!-- tính giá khiển mại -->
                                        <?php 
                                            if($row["giatrikhuyenmai"] > 0)
                                            {
                                        ?>
                                        <li class="old__prize" style="text-decoration-line:line-through; color: red;">
                                            <?php  echo number_format($row["dongia"], 0,',','.');?> ₫</li>
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
                                    </td>
                                    <td class="product-price"><span class="amount"> <?php  $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                                    echo number_format($giakhuyenmai, 0,',','.');?>₫</span></td>
                                    <td class="product-quantity">
                                        <input min="1" max = "10" type="number" value="<?php  echo $row["soluong"];?>" name="soluong[<?php  echo $row["masp"];?>]" />
                                        <button class="btn btn-info" type="submit" name="update_click" value="Cập Nhật">Cập Nhật</button>
                                    </td>
                                    <td class="product-subtotal"><?php  echo number_format($row["thanhtien"], 0,',','.');?> ₫</td>
                                    <td class="product-remove"><a href="<?php echo BASE_URL?>GioHangController/XoaGioHang/<?php  echo $row["magh"];?>/<?php  echo $row["masp"];?>"><i class="icon-trash icons"></i></a></td>
                                </tr>
                                
                                <?php 
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Tiếp Tục Mua Hàng</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <button style="border: none;" type="submit" name="update_click" ><a>Cập Nhật</a></button>
                                    <!-- <a href="#">checkout</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <!-- <div class="ht__coupon__code">
                                <span>enter your discount code</span>
                                <div class="coupon__box">
                                    <input type="text" placeholder="">
                                    <div class="ht__cp__btn">
                                        <a href="#">enter</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__cart__total">
                                <h6>Tổng giỏ hàng</h6>
                                <div class="cart__desk__list">
                                    <ul class="cart__desc">
                                        <li>Tổng Tiền</li>
                                        <li>VAT</li>
                                        <li>Phí vận chuyểnn</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <li><?php while ($row = mysqli_fetch_array($dataview["TongTien1"])){  echo number_format($row["tongtien"], 0,',','.'); }?>₫</li>
                                        <li>0.00₫</li>
                                        <li>0₫</li>
                                    </ul>
                                </div>
                                <div class="cart__total">
                                    <span>Tổng thanh toán</span>
                                    <span><?php while ($row = mysqli_fetch_array($dataview["TongTien2"])){  echo number_format($row["tongtien"], 0,',','.'); }?>₫</span>
                                </div>
                                <ul class="payment__btn">
                                    <li class="active"><a href="<?php echo BASE_URL?>GioHangController/XacNhanThanhToan">Thanh Toán</a></li>
                                    <!-- <li><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Tiếp Tục Mua Hàng</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
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
<!-- Start Banner Area -->
<div class="htc__banner__area">
    <ul class="banner__list owl-carousel owl-theme clearfix">
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
<!-- End Banner Area -->
<!-- End Banner Area -->