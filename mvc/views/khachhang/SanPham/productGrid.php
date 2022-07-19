<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg12.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Sản Phẩm</span>
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
                        <!-- <ul class="view__mode" role="tablist">
                            <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab"
                                    data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                            <li role="presentation" class="list-view"><a href="#list-view" role="tab"
                                    data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                        </ul> -->
                        <!-- End List And Grid View -->
                    </div>
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view"
                                class="single-grid-view tab-pane fade in active clearfix">

                                <?php 
                                        while ($row = mysqli_fetch_array($dataview["DSSP1"])){
                                            //while ($row = mysqli_fetch_array($tin)){
                                        ?>

                                <!-- Start Single Product -->
                                <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
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

                                                <li id="muasanpham" onclick="BUYSP('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a><i class="icon-handbag icons"></i></a></li>

                                                <li><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><i class="icon-shuffle icons"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="fr__product__inner" >
                                            <h4 style="height: 40px;"><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                            <?php echo $row["tensanpham"]?></a></h4>
                                            <ul class="fr__pro__prize">


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
                                                <li class="old__prize"
                                                    style="text-decoration-line:line-through; color: red;">
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

                                                            }

                                                        }
                                                        ?>
                                                <!-- tính giá khiển mại -->

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->

                                <?php 
                                        }
                                        ?>

                                <div id="danhsach"> </div>

                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- End Product View -->
                </div>
                <!-- Start Pagenation -->
                <div class="row">
                    <div class="col-xs-12" style="padding-top: 40px;">
                        <!-- <ul class="htc__pagenation">
                            <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">3</a></li>
                            <li><a href="#">19</a></li>
                            <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                        </ul> -->
                        <ul class="shopping__btn">
                            <li id="xemthem"><a>Xem Thêm Sản Phẩm</a></li>
                            <!-- <li class="shp__checkout"><a href="checkout.html">Xem Sản Phẩm</a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- End Pagenation -->
            </div>
            <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                <div class="htc__product__leftsidebar">
                    <!-- Start Prize Range Sort THEO GIÁ SẢN PHẨM -->
                    <!-- <div class="htc-grid-range">
                        <h4 class="title__line--4">Price</h4>
                        <div class="content-shopby">
                            <div class="price_filter s-filter clear">
                                <form action="#" method="GET">
                                    <div id="slider-range"></div>
                                    <div class="slider__range--output">
                                        <div class="price__output--wrap">
                                            <div class="price--output">
                                                <span>Price :</span><input type="text" id="amount" readonly>
                                            </div>
                                            <div class="price--filter">
                                                <a href="#">Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> -->
                    <!-- End Prize Range -->
                    <!-- Start Category Area -->
                    <div class="htc__category">
                        <h4 class="title__line--4">Loại Sản Phẩm</h4>
                        <ul class="ht__cat__list">
                            <?php 
                            while ($row = mysqli_fetch_array($dataview["DSLSP"])){
                            ?>

                            <li><a href="<?php echo BASE_URL?>SanPhamController/ViewSanPhamLSP/<?php echo $row["maloai"]; ?>"> <?php echo $row["tenloai"]?></a></li>

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

                            <li><a href="<?php echo BASE_URL?>SanPhamController/ViewSanPhamDM/<?php echo $row["madm"]; ?>"> <?php echo $row["tendm"]?></a></li>

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
                                <a href="<?php echo BASE_URL?>SanPhamController/TimKiemLSSP/<?php echo $row["mals"]; ?>"><?php echo $row["noidungtim"]; ?></a>
                                <a href="<?php echo BASE_URL?>SanPhamController/XoaTimKiem/<?php echo $row["mals"]; ?>" ><i class="icon-trash icons"></a></i>
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
                                <li><a href="#">Xóa Lịch Sử Tìm Kiếm</a></li>
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
                        <h2 class="title__line--4">Sản Phẩm Yêu Thích</h2>
                        <div class="htc__recent__product__inner"  style="margin-left: -30px;">

                                <?php 
                                while ($row = mysqli_fetch_array($dataview["SPYT"])){
                                ?>

                            <!-- Start Single Product -->
                            <div class="htc__best__product">
                                <div class="htc__best__pro__thumb">
                                    <a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                                        <img style="max-width:100px;" src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>"
                                            alt="small product">
                                    </a>
                                </div>
                                <div class="htc__best__product__details">
                                    <h2><a href="<?php echo BASE_URL?>SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"> <?php echo $row["tensanpham"]?></a></h2>
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
                                                <li class="old__prize"
                                                    style="text-decoration-line:line-through; color: red;">
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
                                    <li><a href="<?php echo BASE_URL?>SanPhamController/SanPhamYeuThich">Xem Tất Cả Sản Phẩm Yêu Thích</a></li>
                                <!-- <li class="compare"><a href="#">Compare</a></li> -->
                                </ul>

                        </div>
                    </div>
                    <!-- End Best Sell Area -->
                    <?php } ?>
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
<!-- <div class="htc__banner__area">
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
</div> -->
<!-- End Banner Area -->
<!-- End Banner Area -->


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
                        alert("Đã thêm sản phẩm yêu thích");
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

