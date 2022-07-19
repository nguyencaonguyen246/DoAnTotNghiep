<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg10.png) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Trang Chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Sản Phẩm Yêu Thích</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- wishlist-area start -->
        <div class="wishlist-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <!-- BẮT ĐẦU BẲNG SẢN PHẨM YÊU THÍCH -->
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-remove"><span class="nobr">Xóa</span></th>
                                                <th class="product-thumbnail">Hình Ảnh</th>
                                                <th class="product-name"><span class="nobr">Tên Sản Phẩm</span></th>
                                                <th class="product-price"><span class="nobr"> Giá </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Trạng Thái </span></th>
                                                <th class="product-add-to-cart"><span class="nobr">Thêm Giỏ Hàng</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                        while ($row = mysqli_fetch_array($dataview["SPYT"])){                                   
                                        ?>

                                        <!-- BẮT ĐẦU SẢN PHẨM YÊU THÍCH ĐƠN -->

                                            <tr>
                                                <td class="product-remove"><a href="<?php echo BASE_URL?>SanPhamController/XoaSanPhamYeuThich/<?php  echo $row["masp"];?>">×</a></td>
                                                <td class="product-thumbnail">
                                                    <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                                        <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="" />
                                                    </a>
                                                </td>
                                                <td class="product-name"><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"> <?php echo $row["tensanpham"]?></a></td>
                                                <td class="product-price">
                                                    <!-- <span class="amount"> -->

                                                    <!-- tính giá khiển mại -->
                                                    <?php 
                                                        if($row["giatrikhuyenmai"] > 0)
                                                        {
                                                    ?>
                                                    <span class="old__prize" style="text-decoration-line:line-through; color: red;">
                                                        <?php  echo number_format($row["dongia"], 0,',','.');?>                                      
                                                        ₫</span> <br>
                                                    <span>
                                                    <?php  
                                                                $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                                                echo number_format($giakhuyenmai, 0,',','.');
                                                                ?>
                                                        ₫</span>

                                                    <?php                             
                                                        }
                                                        else{
                                                            
                                                        ?>
                                                    <span>
                                                        <?php  echo number_format($row["dongia"], 0,',','.');?>
                                                        ₫</span>

                                                    <?php
                                                        }
                                                    ?>
                                                    <!-- tính giá khiển mại -->

                                                    <!-- </span> -->
                                                </td>
                                                <td class="product-stock-status">
                                                    <!-- <span class="wishlist-in-stock">In Stock</span> -->

                                                    <?php 
                                                    if($row["soluongton"] > 0) {?>
                                                        <span class="wishlist-in-stock" style="color: green; font-size: large;">
                                                    <?php 
                                                        echo "Còn hàng"; }?>

                                                    <?php  if($row["soluongton"] <= 0){ ?>
                                                        <span class="wishlist-in-stock" style="color: red; font-size: large;">
                                                        <?php     echo "Hết hàng";    }            
                                                    ?>
                                                    </span>

                                                </td>
                                                <td class="product-add-to-cart"><a href="<?php echo BASE_URL?>GioHangController/ThemOneGioHang/<?php echo $row["masp"]; ?>"> Thêm Vào Giỏ</a></td>
                                            </tr>

                                        <!-- kẾT THÚC SẢN PHẨM YÊU THÍCH ĐƠN -->
                         

                                        <?php 
                                        }
                                        ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Share on:</h4>
                                                        <div class="social-icon">
                                                            <ul>
                                                                <li><a href="#"><i class="zmdi zmdi-rss"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-vimeo"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-tumblr"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                                                <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- kẾT THÚC BẢNG SẢN PHẨM YÊU THÍCH -->
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wishlist-area end -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/11.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/22.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/33.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/44.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/55.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/66.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/77.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/brand/22.png" alt="brand images"></a></li>
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
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>
        <!-- End Banner Area -->
        <!-- End Banner Area -->