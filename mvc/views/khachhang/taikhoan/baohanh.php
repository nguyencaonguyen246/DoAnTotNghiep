<style>
* {
    border: 0;
    box-sizing: border-box;

}

.search-bar {
    font-size: calc(16px + (24 - 16)*(100vw - 320px)/(1920 - 320));
}

button,
input {
    font: 1em Hind, sans-serif;
    line-height: 1.5em;
}

input {
    color: #ff39b6;
}

.search-bar {
    display: flex;
}

.search-bar input,
.search-btn,
.search-btn:before,
.search-btn:after {
    transition: all 0.25s ease-out;
}

.search-bar input,
.search-btn {
    width: 3em;
    height: 3em;
}

.search-bar input:invalid:not(:focus),
.search-btn {
    cursor: pointer;
}

.search-bar,
.search-bar input:focus,
.search-bar input:valid {
    width: 100%;
}

.search-bar input:focus,
.search-bar input:not(:focus)+.search-btn:focus {
    outline: transparent;
}

.search-bar {
    margin: auto;
    padding: 1.5em;
    justify-content: center;
    max-width: 30em;
}

.search-bar input {
    background: transparent;
    border-radius: 1.5em;
    box-shadow: 0 0 0 0.4em #171717 inset;
    padding: 0.75em;
    transform: translate(0.5em, 0.5em) scale(0.5);
    transform-origin: 100% 0;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.search-bar input::-webkit-search-decoration {
    -webkit-appearance: none;
}

.search-bar input:focus,
.search-bar input:valid {
    background: #fff;
    border-radius: 0.375em 0 0 0.375em;
    box-shadow: 0 0 0 0.1em #d9d9d9 inset;
    transform: scale(1);
}

.search-btn {
    /* tay cầm kính lup */
    background-color: black;
    border-radius: 0 0.75em 0.75em 0 / 0 1.5em 1.5em 0;
    padding: 0.75em;
    position: relative;
    transform: translate(0.25em, 0.25em) rotate(45deg) scale(0.25, 0.125);
    transform-origin: 0 50%;
}

.search-btn:before,
.search-btn:after {
    content: "";
    display: block;
    opacity: 0;
    position: absolute;
}

.search-btn:before {
    border-radius: 50%;
    box-shadow: 0 0 0 0.2em #f1f1f1 inset;
    top: 0.75em;
    left: 0.75em;
    width: 1.2em;
    height: 1.2em;
}

.search-btn:after {
    background: #f1f1f1;
    border-radius: 0 0.25em 0.25em 0;
    top: 51%;
    left: 51%;
    width: 0.75em;
    height: 0.25em;
    transform: translate(0.2em, 0) rotate(45deg);
    transform-origin: 0 50%;
}

.search-btn span {
    display: inline-block;
    overflow: hidden;
    width: 1px;
    height: 1px;
}

/* Active state */
.search-bar input:focus+.search-btn,
.search-bar input:valid+.search-btn {
    /* màu nút buttom */
    background: #c43b68;
    border-radius: 0 0.375em 0.375em 0;
    transform: scale(1);
}

.search-bar input:focus+.search-btn:before,
.search-bar input:focus+.search-btn:after,
.search-bar input:valid+.search-btn:before,
.search-bar input:valid+.search-btn:after {
    opacity: 1;
}

.search-bar input:focus+.search-btn:hover,
.search-bar input:valid+.search-btn:hover,
.search-bar input:valid:not(:focus)+.search-btn:focus {
    /* đổi màu nut buttom */
    background: #030303;
}

.search-bar input:focus+.search-btn:active,
.search-bar input:valid+.search-btn:active {
    transform: translateY(1px);
}

@media screen and (prefers-color-scheme: dark) {
    input {
        color: #f1f1f1;
    }

    .search-bar input {
        box-shadow: 0 0 0 0.4em #f1f1f1 inset;
    }

    .search-bar input:focus,
    .search-bar input:valid {
        background: #fff;
        box-shadow: 0 0 0 0.1em #3d3d3d inset;
    }

    .search-btn {
        background: #f1f1f1;
    }

    
}
</style>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg17.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <form action="<?php echo BASE_URL?>SanPhamController/TimSPBaoHanh" method="POST" class="search-bar">
                                <input placeholder="Nhập sản phẩm cần bảo hành... " type="text" name="search" pattern=".*\S.*" required>
                                <button class="search-btn" type="submit">
                                    <span>Tìm</span>
                                </button>
                            </form>
                            <a class="breadcrumb-item" href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Bảo Hành</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- Start Product Grid -->
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <!-- <select class="ht__select">
                                        <option>Default softing</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select>
                                    <select class="ht__select">
                                        <option>Show by</option>
                                        <option>Sort by popularity</option>
                                        <option>Sort by average rating</option>
                                        <option>Sort by newness</option>
                                    </select> -->
                        </div>
                        <div class="ht__pro__qun">
                            <!-- <span>Showing 1-12 of 1033 products</span> -->
                        </div>
                        <!-- Start List And Grid View -->
                        <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab"
                                    data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab"
                                    data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view"
                                class="single-grid-view tab-pane fade in active clearfix">


                                <div class="col-xs-12">
                                    <div class="ht__list__wrap">

                                        <?php 
                                        while ($row = mysqli_fetch_array($dataview["BHSP"])){
                                        ?>
                                            <hr  width="70%" size="5px" align="center" />
                                        <!-- Start List Product -->
                                        <div class="ht__list__product">
                                            <div class="ht__list__thumb">
                                                <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                                <img style="max-width: 300px;" src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>"
                                                        alt="product images"></a>
                                            </div>
                                            <div class="htc__list__details">
                                                <h2><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php echo $row["tensanpham"]?></a></h2>
                                                <ul class="pro__prize">                                                           
                                                    <li><?php  echo number_format($row["dongia"], 0,',','.');?>₫</li>
                                                </ul>
                                                <ul>
                                                    <!-- Thời hạn còn được bảo hành ở đây -->
                                                    <li>
                                                    <!-- Còn 2 Tháng Bảo Hành. -->

                                                    <?php 
                                                    date_default_timezone_set('Asia/Ho_Chi_Minh'); //Chỉnh về múi giờ Việt Nam
                                                    $ngayhientai = date_create(date('d-m-Y'));
                                                    $ngaylaphoadon = date_create($row['ngaylap']);
                                                    $checkbaohanh = date_diff($ngaylaphoadon, $ngayhientai);
                                                    $namTothang = $checkbaohanh -> format('%y')*12;
                                                    $baohanh = $checkbaohanh -> format('%m') + $namTothang;
                                                    if(($row['thoihanbaohanh'] - $baohanh) <= 0){
                                                    ?> <h6 style="color: red;"> <ion-icon style="font-size:20px; margin-bottom:-4px;"  name="hourglass-outline"></ion-icon> Hết bảo hành</h6> <?php
                                                    }
                                                    else{
                                                        $thoigianconlai = $row['thoihanbaohanh'] - $baohanh;
                                                        ?> <h6 style="color: green;"> <ion-icon style="font-size:20px; margin-bottom:-4px;"  name="hourglass-outline"></ion-icon> Hạn bảo hành còn lại: <?php echo  $thoigianconlai; ?> Tháng</h6> <?php
                                                    }
                                                    ?>                                                 
                                                    
                                                    </li>   
                                                    <!-- Thời hạn còn được bảo hành ở đây -->                                                 
                                                </ul>
                                                <!-- thông tin sản phẩm -->
                                                <p>

                                                    <i class="icon-star icons"></i> Mã Hóa Đơn: <?php echo $row["mahd"]?> <br>

                                                    <i class="icon-star icons"></i>  Thời Gian Mua: <?php echo $row["ngaylap"]?> <br>

                                                    <i class="icon-star icons"></i> Số lượng: <?php echo $row["soluong"]?>
                                                </p>

                                                <p><?php echo $row["mota"]?></p>
                                                        

                                                <div class="fr__list__btn">
                                                    <!-- Nút bảo hành -->
                                                    <!-- <a class="fr__btn" href="cart.html">Yêu Cầu Bảo Hành</a> -->
                                                    <?php 
                                                        if(($row['thoihanbaohanh'] - $baohanh) > 0){
                                                            ?>  


                                                           
                                                           <?php 
                                                           if($row['tinhtrang'] == 'Đã bảo hành')
                                                           { ?>
                                                                <a class="fr__btn" style="background:#030303;"> Đang yêu cầu bảo hành </a>
                                                           <?php }
                                                           else{ ?>

                                                                <a class="fr__btn" href="<?php echo BASE_URL?>SanPhamController/ThongTinBaoHanh/<?php echo $row["mahd"]; ?>/<?php echo $row["macthd"]; ?>">Yêu cầu bảo hành</a>
                                                            <?php }
                                                           ?>



                                                        <?php } else{
                                                        
                                                            ?> <a class="fr__btn" style="background:#030303;"> Hết bảo hành </a> <?php
                                                        }
                                                    ?>

                                                    <!-- Nút bảo hành -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End List Product -->   
                                        
                                        <?php 
                                        }
                                        ?>
                                        

                                    </div>
                                </div>

                                <!-- End Single Product -->
                            </div>
                            <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="wishlist-content">
                                        <form action="#">
                                            <div class="wishlist-table table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                           
                                                            </th>
                                                            <th class="product-thumbnail">Ngày Lập</th>
                                                            <th class="product-name"><span class="nobr">Tổng Tiền</span></th>
                                                            <th class="product-price"><span class="nobr"> Tình Trạng</span></th>
                                                            <th class="product-add-to-cart"><span class="nobr">Xem Chi Tiết</span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php 
                                                        while ($row = mysqli_fetch_array($dataview["BHHD"])){
                                                        ?>

                                                        <tr>
                                                           
                                                            <td class="product-thumbnail"><span class="nobr"><?php echo $row["ngaylap"]?></span></td>
                                                            <td class="product-name"><a href="#"><?php  echo number_format($row["tongtien"], 0,',','.');?>₫</a>
                                                            </td>
                                                            <td class="product-price"><span
                                                                    class="amount"><?php echo $row["tinhtranghd"]?></span></td>
                                                            
                                                            <td class="product-add-to-cart"><a  href="<?php echo BASE_URL?>SanPhamController/ChiTietHoaDon/<?php echo $row["mahd"]; ?>"> Xem Chi Tiết </a>
                                                            </td>
                                                        </tr>
                                                        
                                                        <?php 
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>
                <!-- Start Pagenation -->

                <!-- End Pagenation -->
            </div>
            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                <div class="htc__product__leftsidebar">
                    <!-- khung trái -->

                    <div class="htc__category">
                        <h4 class="title__line--4">Loại Sản Phẩm</h4>
                        <ul class="ht__cat__list">
                            <?php 
                            while ($row = mysqli_fetch_array($dataview["DSLSP"])){
                            ?>

                            <li><a
                                    href="<?php echo BASE_URL?>SanPhamController/LoaiSPBaoHanh/<?php echo $row["maloai"]; ?>">
                                    <?php echo $row["tenloai"]?></a></li>

                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- End Category Area -->

                    <!-- Start Tag Area -->
                    <div class="htc__tag">
                        <h4 class="title__line--4">Danh Mục</h4>
                        <ul class="ht__tag__list">

                            <?php 
                            while ($row = mysqli_fetch_array($dataview["DSDM"])){
                            ?>

                            <li><a
                                    href="<?php echo BASE_URL?>SanPhamController/DMSPBaoHanh/<?php echo $row["madm"]; ?>">
                                    <?php echo $row["tendm"]?></a></li>

                            <?php 
                                }
                            ?>

                        </ul>
                    </div>
                    <!-- End Tag Area -->
                    <?php if (isset($_SESSION["makh"])){ ?>
                    <!-- Start Compare Area -->
                    <div class="htc__compare__area">
                        <h4 class="title__line--4">Lịch Sử Tìm Kiếm</h4>
                        <ul class="htc__compare__list">

                            <!-- Licj Su Tim Kiem Cua Khach -->
                            <?php 
                        if(isset($_SESSION["makh"]))
                        {
                            while ($row = mysqli_fetch_array($dataview["LSTK"])){
                            ?>

                            <li>
                                <a
                                    href="<?php echo BASE_URL?>SanPhamController/TimKiemLSSP/<?php echo $row["mals"]; ?>"><?php echo $row["noidungtim"]; ?></a>
                                <a href="<?php echo BASE_URL?>SanPhamController/XoaTimKiem/<?php echo $row["mals"]; ?>"><i
                                        class="icon-trash icons"></a></i>
                            </li>

                            <?php 
                                }
                                ?>

                            <?php 
                        }
                        ?>

                        </ul>

                        <?php 
                        if(isset($_SESSION["makh"]))
                        {
                        ?>

                        <ul class="ht__com__btn">
                            <li><a href="#">Xóa lịch sử tìm kiếm</a></li>
                            <!-- <li class="compare"><a href="#">Compare</a></li> -->
                        </ul>

                        <?php 
                        }
                        ?>

                        <!-- Licj Su Tim Kiem Cua Khach -->

                    </div>
                    <?php } ?>
                    <!-- End Compare Area -->
                    <?php if (isset($_SESSION["makh"])){ ?>
                    <!-- Start Best Sell Area -->
                    <div class="htc__recent__product">
                        <h2 class="title__line--4">Sản phẩm yêu thích</h2>
                        <div class="htc__recent__product__inner" style="margin-left: -30px;">

                            <?php 
                                while ($row = mysqli_fetch_array($dataview["SPYT"])){
                                ?>

                            <!-- Start Single Product -->
                            <div class="htc__best__product">
                                <div class="htc__best__pro__thumb">
                                    <a
                                        href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                        <img style="max-width:100px;"
                                            src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>"
                                            alt="small product">
                                    </a>
                                </div>
                                <div class="htc__best__product__details">
                                    <h2><a
                                            href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                            <?php echo $row["tensanpham"]?></a></h2>
                                    <!-- <ul class="rating">
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li><i class="icon-star icons"></i></li>
                                        <li class="old"><i class="icon-star icons"></i></li>
                                        <li class="old"><i class="icon-star icons"></i></li>
                                    </ul> -->
                                    <ul class="pro__prize">

                                        <!-- tính giá khiển mại -->
                                        <!-- kIỂM TRA TÌNH TRẠNG KHUYẾN MÃI -->
                                        <?php 
                                                        if($row["tinhtrang"] != 1)
                                                        {
                                                            //khuyến mãi bằng 0%
                                                            ?>
                                        <li>
                                            <?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</li>

                                        <?php
                                                        }
                                                        else
                                                        {
                                                            $today = date("Y-m-d");
                                                            // KIỂM TRA NGÀY BẮT ĐẦU
                                                            if (strtotime($today) < strtotime($row["thoigianbatdau"]))
                                                            {
                                                                // không khuyến mãi.
                                                                ?>
                                        <li>
                                            <?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</li>

                                        <?php
                                                            }
                                                            // KIỂM TRA NGÀY KẾT THÚC
                                                            else if(strtotime($today) > strtotime($row["thoigianketthuc"]))
                                                            {
                                                                // Hết khuyến mãi.
                                                                ?>
                                        <li>
                                            <?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</li>

                                        <?php
                                                            }
                                                            else
                                                            {
                                                                // TÍNH KHUYẾN MÃI
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
                                            <?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</li>

                                        <?php
                                                                    }

                                                            }

                                                        }
                                                        ?>
                                        <!-- tính giá khiển mại -->

                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Product -->

                            <?php 
                            }
                            ?>

                            <ul class="ht__com__btn">
                                <li><a href="<?php echo BASE_URL?>SanPhamController/SanPhamYeuThich">Xem tất cả sản phẩm yêu thích</a></li>
                                <!-- <li class="compare"><a href="#">Compare</a></li> -->
                            </ul>

                        </div>
                    </div>
                    <!-- End Best Sell Area -->
                    <?php } ?>

                    <!-- khung trái -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Product Grid -->
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
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/1.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/2.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/3.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/4.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/5.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/6.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/1.jpg"
                    alt="banner images"></a></li>
        <li><a href="product-details.html"><img src="<?php echo BASE_URL?>public/asbab/images/banner/bn-3/2.jpg"
                    alt="banner images"></a></li>
    </ul>
</div>
<!-- End Banner Area -->
<!-- End Banner Area -->