<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CapCuuDienThoai.vn</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL?>public/asbab/images/icons8_Incoming_Call_on_iPhone.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">


    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="<?php echo BASE_URL?>public/asbab/css/custom.css">


    <!-- Modernizr JS -->
    <script src="<?php echo BASE_URL?>public/asbab/js/vendor/modernizr-3.5.0.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                                <div class="logo" style="width: 210%; margin-left:-120px;">
                                    <a href="<?php echo BASE_URL?>HomeController/newHome"><img src="<?php echo BASE_URL?>public/logo/logo_ccdt_v3.png"
                                            alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a></li>
                                        <li class="drop"><a href="<?php echo BASE_URL?>SanPhamController/BaoHanh">Bảo Hành</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo BASE_URL?>SanPhamController/BaoHanh">Yêu Cầu Bảo Hành</a></li>
                                                <li><a href="<?php echo BASE_URL?>HomeController/ChinhSach">Chính Sách Bảo Hành</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Sửa Chữa</a>
                                        
                                            <ul class="dropdown mega_dropdown" style="width: 404px;">
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="#">Nhà Sản Xuất</a>
                                                    <ul class="mega__item">
                                                        <?php 
                                                        while ($row = mysqli_fetch_array($dataview["DSNSX"])){
                                                        ?>

                                                        <li><a href="<?php echo BASE_URL?>SanPhamController/ViewSanPhamNSX/<?php echo $row["mansx"]; ?>"> <?php echo $row["tennsx"]?></a></li>

                                                        <?php 
                                                            }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <li><a class="mega__title" href="#">Loại Sản Phẩm</a>
                                                    <ul class="mega__item">
                                                        <?php 
                                                        while ($row = mysqli_fetch_array($dataview["DSLSPh"])){
                                                        ?>

                                                        <li><a href="<?php echo BASE_URL?>SanPhamController/ViewSanPhamLSP/<?php echo $row["maloai"]; ?>"> <?php echo $row["tenloai"]?></a></li>

                                                        <?php 
                                                            }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <!-- End Single Mega MEnu -->
                                                <!-- Start Single Mega MEnu -->
                                                <!-- <li><a class="mega__title" href="product-grid.html">Product Types</a>
                                                    <ul class="mega__item">
                                                        <li><a href="#">Simple Product</a></li>
                                                        <li><a href="#">Variable Product</a></li>
                                                        <li><a href="#">Grouped Product</a></li>
                                                        <li><a href="#">Downloadable Product</a></li>
                                                        <li><a href="#">Simple Product</a></li>
                                                    </ul>
                                                </li> -->
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                            
                                        </li>
                                        <li class="drop"><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Sản Phẩm</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Xem Sản Phẩm</a></li>
                                                <li><a href="<?php echo BASE_URL?>SanPhamController/SanPhamYeuThich">Sản Phẩm Yêu Thích</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="drop"><a href="blog.html">blog</a>
                                            <ul class="dropdown">
                                                <li><a href="blog.html">Blog Grid</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> -->
                                        <li class="drop"><a href="#">Chính Sách</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo BASE_URL?>HomeController/ChinhSach">Chính Sách</a></li>
                                                <li><a href="#">Thành Viên Nhóm</a></li>
                                                
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="<?php echo BASE_URL?>HomeController/Contact">Hỗ Trợ</a>
                                            <ul class="dropdown">
                                                <li><a href="<?php echo BASE_URL?>HomeController/ChinhSach">Liên Hệ Hỗ Trợ</a></li>
                                                <li><a href="#">Tìm Của Hàng</a></li>
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a></li>
                                            <li><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Sản Phẩm</a></li>
                                            <li><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Sủa Chữa</a>
                                                <!-- <ul>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                    <li><a href="cart.html">Cart page</a></li>
                                                    <li><a href="checkout.html">checkout</a></li>
                                                    <li><a href="contact.html">contact</a></li>
                                                    <li><a href="product-grid.html">product grid</a></li>
                                                    <li><a href="product-details.html">product details</a></li>
                                                    <li><a href="wishlist.html">wishlist</a></li>
                                                </ul> -->
                                            </li>
                                            <li><a href="<?php echo BASE_URL?>HomeController/Contact">Liên Hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right" style="width: 210%; margin-left:-20px;">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <nav class="main__menu__nav hidden-xs hidden-sm" style="margin: 0 0px 0 0;">
                                        <ul class="main__menu" style="margin: 0 0px 0 0;">
                                            <li class="drop" style="margin: 0 0px 0 0;">
                                                <div class="header__account">
                                                    <?php if (!isset($_SESSION["makh"])){?>

                                                    <a class="menu-link"
                                                        href="<?php echo BASE_URL?>DangNhapController/home">
                                                        <i class="icon-user icons"></i> Đăng nhập</a>
                                                    <?php }  else { ?>


                                                    <a><i class="icon-user icons"></i>


                                                        <?php 
                                            if(!isset($_SESSION["tenkhachhang"])){
                                                echo "Cập nhật thông tin";
                                            }
                                            else{
                                                echo $_SESSION["tenkhachhang"];
                                            }?>
                                                    </a>

                                                    <ul class="dropdown">
                                                        <li><a href="<?php echo BASE_URL?>DangNhapController/dangxuat" >Đăng xuất</a></li>
                                                        <li><a href="<?php echo BASE_URL?>HomeController/ThongTin">Thông tin</a></li>
                                                        <li><a href="<?php echo BASE_URL?>DangNhapController/DoiMaKhau">Đổi mật khẩu</a></li>
                                                    </ul>

                                                    <?php  }?>


                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="htc__shopping__cart">
                                        <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua" id="demsanpham">

                                        <!-- Số lượng mặt hàng trong giỏ hàng -->
                                       
                                        <?php 
                                        if(isset($_SESSION["dathang"]))
                                        {
                                            echo $dataview["somathang"] + sizeof($_SESSION['dathang']) ; 
                                        }
                                        else
                                        {
                                            echo $dataview["somathang"]; 
                                        }
                                        ?>
                                        <!-- Số lượng mặt hàng trong giỏ hàng -->

                                        </span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="search__inner">
                                <form action="<?php echo BASE_URL?>SanPhamController/TimKiemSP" method="POST">
                                    <input placeholder="Nhập sản phẩm cần tìm... " type="text" name="search">
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>

                    <h2>Giỏ Hàng Mua Hàng</h2>
                    <hr width="50%"  color="red"  align="right"  size="5px">

                    <?php 
                    if(isset($_SESSION["makh"]))
                    {
                    ?>

                    <div class="shp__cart__wrap">

                        <!-- chi tiết giỏ hàng -->
                        <?php 
                            while ($row = mysqli_fetch_array($dataview["GH"])){
                                //while ($row = mysqli_fetch_array($tin)){
                        ?>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                    <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="lỗi ảnh">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php  echo $row["tensanpham"];?></a></h2>
                                <span class="quantity">Số Lượng: <?php  echo $row["soluong"];?></span>
                                <span class="shp__price">

                                    <!-- tính giá khiển mại -->
                                    <?php 
                                        if($row["giatrikhuyenmai"] > 0)
                                        {
                                    ?>
                                            <span style="text-decoration-line:line-through; color: red;"><?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</span> |
                                            <span >
                                            <?php  
                                            $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                            echo number_format($giakhuyenmai, 0,',','.');
                                            ?>
                                            ₫</span> 
                                    <?php                             
                                        }
                                        else{
                                            
                                        ?>
                                            <span><?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</span>

                                        <?php
                                        }
                                    ?>
                                    <!-- tính giá khiển mại --> 

                                </span>
                            </div>
                            <div class="remove__btn">
                                <a href="<?php echo BASE_URL?>HomeController/XoaGioHang/<?php  echo $row["magh"];?>/<?php  echo $row["masp"];?>" title="Xóa khỏi giỏ">
                                    <i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>

                        <?php 
                        }
                        ?>
                        <!-- chi tiết giỏ hàng -->
                        <!-- <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="<?php //echo BASE_URL?>public/asbab/images/product-2/sm-smg/2.jpg"
                                        alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div> -->
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Tổng Tiền:</li>
                        <li class="total__price"><?php while ($row = mysqli_fetch_array($dataview["TongTien"])){  echo number_format($row["tongtien"], 0,',','.'); }?> vnđ</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a  href="<?php echo BASE_URL?>GioHangController/Cart">Xem Giỏ Hàng</a></li>
                        <!-- <li class="shp__checkout"><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Xem Sản Phẩm</a></li> -->
                    </ul>

                    <?php 
                    }
                    else{
                    ?>
                        <ul class="shopping__btn">
                        <!-- <li><a href="cart.html">Đăng nhập</a></li> -->
                        <li class="shp__checkout"><a  href="<?php echo BASE_URL?>DangNhapController/home">Đăng nhập để mua hàng</a></li>
                        </ul>
                    <?php } ?>

                    <!-- Gior Hang DAT hang --------------------------------------------------------------------------------->
                    <hr width="50%"  color="red"  align="right"  size="5px">
                    
                    <h2>Giỏ Hàng Đặt Lịch Sửa</h2>
                    <hr width="50%"  color="red"  align="right"  size="5px">

                    <?php 
                    if(isset($_SESSION["dathang"]))
                    {
                    ?>

                    

                    <div class="shp__cart__wrap">

                        <!-- chi tiết giỏ hàng -->
                        <?php 
                            $tongtien = 0; 
                            for ($i=0; $i < sizeof($_SESSION['dathang']) ; $i++) { 
                        ?>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $_SESSION['dathang'][$i][4]; ?>/9">
                                    <img src="<?php echo $_SESSION['dathang'][$i][0]?>" alt="lỗi ảnh">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $_SESSION['dathang'][$i][4]; ?>/9"> <?php echo $_SESSION['dathang'][$i][1]?> </a></h2>
                                <span class="quantity">Số Lượng: <?php echo $_SESSION['dathang'][$i][3]?></span>
                                <span class="shp__price">

                                    <!-- tính giá khiển mại -->
                                    <?php 
                                            $thanhtien = 0;
                                            $thanhtien = $_SESSION['dathang'][$i][2]*$_SESSION['dathang'][$i][3];
                                            $tongtien += $thanhtien;
                                             echo number_format($thanhtien, 0,',','.'); ?>₫
                                    <!-- tính giá khiển mại --> 
                                </span>
                            </div>
                            <div class="remove__btn">
                                <a href="<?php echo BASE_URL?>GioHangController/xoaitem/<?php echo $i; ?>" title="Xóa khỏi giỏ">
                                    <i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>

                        <?php 
                        }
                        ?>
                        

                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Tổng Tiền:</li>
                        <li class="total__price"><?php  echo number_format($tongtien, 0,',','.'); ?> vnđ</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a  href="<?php echo BASE_URL?>GioHangController/GioDatHang">Xem giỏ đặt lịch sửa</a></li>
                        
                    </ul>

                    <?php 
                    }
                    else{
                    ?>
                        <ul class="shopping__btn">
                        <!-- <li><a href="cart.html">Đăng nhập</a></li> -->
                        <li class="shp__checkout"><a  href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Chưa đặt lịch sửa</a></li>
                        </ul>
                    <?php } ?>
                    <ul class="shopping__btn">
                        <li class="shp__checkout"><a href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Xem sản phẩm</a></li>
                        
                    </ul>

                     <!-- Gior Hang DAT hang -------------------------------------------------------------------->

                     
                     <hr width="50%"  color="red"  align="right"  size="5px">
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->

        <?php
            require_once "./mvc/views/".$dataview["page"].".php";
        ?>


        <!-- End Blog Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
        <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">Về Chúng Tôi</h2>
                                <div class="ft__details">
                                    <p>CapCuuDienThoai.vn là hệ thống cửa hàng sửa chữa rộng khắp cả nước với nhiều năm kinh nhiệm nhận sửa 
                                        chữa thiết bị công nghệ : điện thoại, laptop, tablet,...</p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Thông Tin Hỗ Trợ</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="<?php echo BASE_URL?>HomeController/Contact">Liên Hệ Hỗ Trợ</a></li>
                                        <li><a href="<?php echo BASE_URL?>HomeController/ChinhSach">Chích Sách Bảo Hành</a></li>
                                        <li><a  href="<?php echo BASE_URL?>DangNhapController/notfound">Tìm Cửa Hàng</a></li>
                                        <li><a  href="<?php echo BASE_URL?>DangNhapController/notfound">Phòng dịch Corona tại CapCuuDienThoai</a></li>                                   
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Tài Khoản</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="<?php echo BASE_URL?>HomeController/ThongTin">Tài Khoản Của Tôi</a></li>
                                        <li><a href="<?php echo BASE_URL?>GioHangController/Cart">Giỏ Hàng</a></li>
                                        <?php 
                                        if(!isset($_SESSION['makh'])){ ?>
                                            <li><a href="<?php echo BASE_URL?>DangNhapController/home">Đăng Nhập</a></li>
                                        <?php }
                                        else{ ?>
                                            <li><a href="<?php echo BASE_URL?>DangKyController">Đăng Ký</a></li>
                                        <?php }
                                        ?>
                                        
                                        <li><a href="<?php echo BASE_URL?>SanPhamController/SanPhamYeuThich">Sản Phẩm Yêu Thích</a></li>
                                        <li><a href="<?php echo BASE_URL?>GioHangController/XacNhanThanhToan">Thanh Toán</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Hệ Thống</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="<?php echo BASE_URL?>DangNhapController/notfound">Admin</a></li>
                                        <li><a href="<?php echo BASE_URL?>DangNhapController/notfound">Kĩ Thuật</a></li>
                                        <li><a href="<?php echo BASE_URL?>DangNhapController/notfound">Tiếp Tân</a></li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Gửi Thư </h2>
                                <div class="ft__inner">
                                    <div class="news__input">
                                        <input type="text" placeholder="Mail của bạn*">
                                        <div class="send__btn">
                                            <a class="fr__btn" href="#">Gửi Thư</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright© <a href="<?php echo BASE_URL?>HomeController/newHome">CapCuuDienThoai.vn</a> 2021. Khóa Luận Tốt Nghiệp.</p>
                                <a href="#"><img src="<?php echo BASE_URL?>public/asbab/images/others/shape/paypol.png"
                                        alt="payment images"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="<?php echo BASE_URL?>public/asbab/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="<?php echo BASE_URL?>public/asbab/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="<?php echo BASE_URL?>public/asbab/js/plugins.js"></script>
    <script src="<?php echo BASE_URL?>public/asbab/js/slick.min.js"></script>
    <script src="<?php echo BASE_URL?>public/asbab/js/owl.carousel.min.js"></script>
    <script src="<?php echo BASE_URL?>public/asbab/js/ajax-mail.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="<?php echo BASE_URL?>public/asbab/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="<?php echo BASE_URL?>public/asbab/js/main.js"></script>

</body>

</html>

<script>
    var toancuc = 1;
    $(document).ready(function() {
        $("#xemthem").click(function() {
            toancuc = toancuc + 1;
            $.get("<?php echo BASE_URL?>SanPhamController/limitSP3/" + toancuc, {toancuc}, 
                function(data) {$("#danhsach").append(data);
            });
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js"></script>


<script>
    $(document).ready(function(){
    var hoso = $("#hoso").offset();
    var donmua = $("#donmua").offset();
    var lienhe = $("#lienhe").offset();
    $('li a').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
    $(window).scroll(function(){
        var screenPosition = $(document).scrollTop();
        if (screenPosition <= (hoso.top + 50)) {
        $homeParent = $(".hoso").parent();
        $homeParent.addClass( "active" );
        $homeParent.siblings().removeClass("active");
        }
        if (screenPosition >= (donmua.top - 50)) {
        $aboutParent = $(".donmua").parent();
        $aboutParent.addClass( "active" );
        $aboutParent.siblings().removeClass("active");
        }
        if (screenPosition >= (lienhe.top - 50)) {
        $projectsParent = $(".lienhe").parent();
        $projectsParent.addClass( "active" );
        $projectsParent.siblings().removeClass("active");
        }
    });
    });
</script>


