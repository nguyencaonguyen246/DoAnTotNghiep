    <?php
        if(isset($dataview["ketqua"])) {
            if($dataview["ketqua"] == 1){?>
                <script>
                $(document).ready(
                    function() {
                        alert('Số lượng trong không trong đủ!');
                    }
                );
                </script>
        <?php }
        }
    ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">

<style>


/* BY ESTEBAN MAUVAIS
[--=INDEX=--]
/BODY
/GRADIENTS
  /GREEN
  /PINK
  /RED
  /ORANGE
  /BLUE
/BASE BUTTON
/ROTATE
[--=END INDEX=--]
*/

/*BODY*/
body {
    font-family: 'Roboto', sans-serif;
}

.ctn {
    display: block;
    margin: auto;
    text-align: center;
}



/*END BODY*/

/*GRADIENTS*/
/*GREEN*/
.b-green,
.b-green:before {
    background: rgba(73, 155, 234, 1);
    background: -moz-linear-gradient(45deg, rgba(73, 155, 234, 1) 0%, rgba(26, 188, 156, 1) 100%);
    background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(73, 155, 234, 1)), color-stop(100%, rgba(26, 188, 156, 1)));
    background: -webkit-linear-gradient(45deg, rgba(73, 155, 234, 1) 0%, rgba(26, 188, 156, 1) 100%);
    background: -o-linear-gradient(45deg, rgba(73, 155, 234, 1) 0%, rgba(26, 188, 156, 1) 100%);
    background: -ms-linear-gradient(45deg, rgba(73, 155, 234, 1) 0%, rgba(26, 188, 156, 1) 100%);
    background: linear-gradient(45deg, rgba(73, 155, 234, 1) 0%, rgba(26, 188, 156, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#499bea', endColorstr='#1abc9c', GradientType=1);
}

/*PINK*/
.b-pink,
.b-pink:before {
    background: rgba(231, 72, 234, 1);
    background: -moz-linear-gradient(45deg, rgba(231, 72, 234, 1) 0%, rgba(75, 26, 188, 1) 100%);
    background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(231, 72, 234, 1)), color-stop(100%, rgba(75, 26, 188, 1)));
    background: -webkit-linear-gradient(45deg, rgba(231, 72, 234, 1) 0%, rgba(75, 26, 188, 1) 100%);
    background: -o-linear-gradient(45deg, rgba(231, 72, 234, 1) 0%, rgba(75, 26, 188, 1) 100%);
    background: -ms-linear-gradient(45deg, rgba(231, 72, 234, 1) 0%, rgba(75, 26, 188, 1) 100%);
    background: linear-gradient(45deg, rgba(231, 72, 234, 1) 0%, rgba(75, 26, 188, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e748ea', endColorstr='#4b1abc', GradientType=1);
}

/*RED*/
.b-red,
.b-red:before {
    background: rgba(234, 110, 72, 1);
    background: -moz-linear-gradient(45deg, rgba(234, 110, 72, 1) 0%, rgba(188, 26, 99, 1) 100%);
    background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(234, 110, 72, 1)), color-stop(100%, rgba(188, 26, 99, 1)));
    background: -webkit-linear-gradient(45deg, rgba(234, 110, 72, 1) 0%, rgba(188, 26, 99, 1) 100%);
    background: -o-linear-gradient(45deg, rgba(234, 110, 72, 1) 0%, rgba(188, 26, 99, 1) 100%);
    background: -ms-linear-gradient(45deg, rgba(234, 110, 72, 1) 0%, rgba(188, 26, 99, 1) 100%);
    background: linear-gradient(45deg, rgba(234, 110, 72, 1) 0%, rgba(188, 26, 99, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ea6e48', endColorstr='#bc1a63', GradientType=1);
}

/*ORANGE*/
.b-orange,
.b-orange:before {
    background: rgba(255, 193, 7, 1);
    background: -moz-linear-gradient(45deg, rgba(255, 193, 7, 1) 0%, rgba(255, 87, 34, 1) 100%);
    background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(255, 193, 7, 1)), color-stop(100%, rgba(255, 87, 34, 1)));
    background: -webkit-linear-gradient(45deg, rgba(255, 193, 7, 1) 0%, rgba(255, 87, 34, 1) 100%);
    background: -o-linear-gradient(45deg, rgba(255, 193, 7, 1) 0%, rgba(255, 87, 34, 1) 100%);
    background: -ms-linear-gradient(45deg, rgba(255, 193, 7, 1) 0%, rgba(255, 87, 34, 1) 100%);
    background: linear-gradient(45deg, rgba(255, 193, 7, 1) 0%, rgba(255, 87, 34, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffc107', endColorstr='#ff5722', GradientType=1);
}

/*BLUE*/
.b-blue,
.b-blue:before {
    background: rgba(5, 118, 255, 1);
    background: -moz-linear-gradient(45deg, rgba(5, 118, 255, 1) 0%, rgba(36, 248, 255, 1) 100%);
    background: -webkit-gradient(left bottom, right top, color-stop(0%, rgba(5, 118, 255, 1)), color-stop(100%, rgba(36, 248, 255, 1)));
    background: -webkit-linear-gradient(45deg, rgba(5, 118, 255, 1) 0%, rgba(36, 248, 255, 1) 100%);
    background: -o-linear-gradient(45deg, rgba(5, 118, 255, 1) 0%, rgba(36, 248, 255, 1) 100%);
    background: -ms-linear-gradient(45deg, rgba(5, 118, 255, 1) 0%, rgba(36, 248, 255, 1) 100%);
    background: linear-gradient(45deg, rgba(5, 118, 255, 1) 0%, rgba(36, 248, 255, 1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0576ff', endColorstr='#24f8ff', GradientType=1);
}

/*END GRADIENTS*/
/*BASE BUTTON*/
.button {
    display: inline-block;
    position: relative;
    border-radius: 3px;
    text-decoration: none;
    padding: .5em;
    margin: .5em;
    font-size: 2em;
    font-weight: bold;
    transition: all .5s;
    background-clip: text;
    -webkit-text-fill-color: transparent;
}

.button:hover {
    text-shadow: 0px 0px 0px rgba(255, 255, 255, .75);
}

.button:hover:after {
    left: 100%;
    top: 100%;
    bottom: 100%;
    right: 100%;
}

.button:before {
    content: '';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    z-index: -1;
    border-radius: 5px;
    transition: all .5s;
}

.button:after {
    content: '';
    display: block;
    position: absolute;
    left: 2px;
    top: 2px;
    bottom: 2px;
    right: 2px;
    z-index: -1;
    border-radius: 5px;
    transition: all .5s;
}

.button2 {
    display: inline-block;
    font-size: 2em;
    margin: .5em;
    padding: .5em;
    border-radius: 5px;
    transition: all .5s;
    filter: hue-rotate(0deg);
    color: #FFF;
    text-decoration: none;
}

/*END BASE BUTTON*/
/*ROTATE*/
.rot-360-noscoop:hover {
    filter: hue-rotate(360deg);
    transform: rotate(360deg);
}

.rot-135:hover {
    filter: hue-rotate(135deg);
}

.rot-90:hover {
    filter: hue-rotate(90deg);
}

/*END ROTATE*/
</style>

<style>
/*-------------------Khuyến mãi CSS ------------*/
.wvn-gift {
    font-family: sans-serif;
    margin-bottom: 15px;
    margin-top: 30px;
    background: white;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #6e304b;
    font-size: 15px;
    width: 60%;
}

.wvn-gift .tieu-de {
    background-image: linear-gradient(90deg, #6e304b 0%, #db0a5b 74%);
    padding: 2px 20px;
    margin-top: -20px;
    font-size: 15px;
    font-weight: 500;
    color: #ffffff;
    display: block;
    max-width: 207px;
    border-radius: 99px;
}

.wvn-gift ul {
    margin-bottom: 4px;
    margin: 4px;
}
</style>     
        
        
        <?php 
        while ($row = mysqli_fetch_array($dataview["Detail"])){
        ?>
       
       <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg7.png) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item">Sản Phẩm</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active"><?php  echo  $row["tensanpham"];?></span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">       

            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="full-image" style="width: 100%;">1
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-2">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="full-image" style="width: 100%;">2
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-3">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="full-image" style="width: 100%;">3
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-4">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="full-image" style="width: 100%;">4
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-5">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="full-image" style="width: 100%;">5
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="img-tab-6">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="full-image" style="width: 100%;">6
                                        </div>
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                <!-- Start Small images -->
                                <ul class="product__small__images" role="tablist">
                                    <li role="presentation" class="pot-small-img active">
                                        <a href="#img-tab-1" role="tab" data-toggle="tab">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-2" role="tab" data-toggle="tab">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-3" role="tab" data-toggle="tab">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-4" role="tab" data-toggle="tab">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-5" role="tab" data-toggle="tab">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="small-image">
                                        </a>
                                    </li>
                                    <li role="presentation" class="pot-small-img">
                                        <a href="#img-tab-6" role="tab" data-toggle="tab">
                                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="small-image">
                                        </a>
                                    </li>
                                </ul>
                                <!-- End Small images -->
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2 style="font-family: sans-serif;"><?php  echo  $row["tensanpham"];?> </h2>
                                <h6>Mã : <span><?php echo  $row["masp"]; ?></span></h6>
                                <h6>Thời gian bảo hành : <span><?php echo  $row["thoihanbaohanh"]; ?> tháng</span></h6>
                                <!-- <ul class="rating">
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                    <li class="old"><i class="icon-star icons"></i></li>
                                </ul> -->
                                <ul  class="pro__prize">


                                    <!-- tính giá khiển mại -->
                                    <?php 
                                        if($row["giatrikhuyenmai"] > 0)
                                        {
                                    ?>
                                            <li class="old__prize" style="text-decoration-line:line-through; color: red;"><?php  echo number_format($row["dongia"], 0,',','.');?>
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
                                            <li><?php  echo number_format($row["dongia"], 0,',','.');?>
                                            ₫</li>

                                        <?php
                                        }
                                    ?>
                                    <!-- tính giá khiển mại -->

                                </ul>
                                
                                <p class="pro__info" style=" font-size: large;"><?php  echo  $row["mota"];?></p>
                                
                                <div class="ht__pro__desc">
                                    <div class="sin__desc" >
                                        <p><span style=" font-size: large;">Trạng thái:</span> 
                                         <!-- Check số lượng trong kho -->
                                        <?php 
                                            if($row["soluongton"] > 0) {?>
                                        <span style="color: green; font-size: large;">
                                            <?php 
                                                echo "Còn hàng"; }?>

                                            <?php  if($row["soluongton"] <= 0){ ?>
                                            <span style="color: red; font-size: large;">
                                                <?php     echo "Hết hàng";    }            
                                            ?>
                                            </span>
                                        </p>
                                        <!-- Check số lượng trong kho -->
                                    </div>
                                    <!-- <div class="sin__desc align--left">
                                        <p><span>color:</span></p>
                                        <ul class="pro__color">
                                            <li class="red"><a href="#">red</a></li>
                                            <li class="green"><a href="#">green</a></li>
                                            <li class="balck"><a href="#">balck</a></li>
                                        </ul>
                                        <div class="pro__more__btn">
                                            <a href="#">more</a>
                                        </div>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>size</span></p>
                                        <select class="select__size">
                                            <option>s</option>
                                            <option>l</option>
                                            <option>xs</option>
                                            <option>xl</option>
                                            <option>m</option>
                                            <option>s</option>
                                        </select>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#">Fashion,</a></li>
                                            <li><a href="#">Accessories,</a></li>
                                            <li><a href="#">Women,</a></li>
                                            <li><a href="#">Men,</a></li>
                                            <li><a href="#">Kid,</a></li>
                                            <li><a href="#">Mobile,</a></li>
                                            <li><a href="#">Computer,</a></li>
                                            <li><a href="#">Hair,</a></li>
                                            <li><a href="#">Clothing,</a></li>
                                        </ul>
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Product tags:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#">Fashion,</a></li>
                                            <li><a href="#">Accessories,</a></li>
                                            <li><a href="#">Women,</a></li>
                                            <li><a href="#">Men,</a></li>
                                            <li><a href="#">Kid,</a></li>
                                        </ul>
                                    </div>

                                    <div class="sin__desc product__share__link">
                                        <p><span>Share this:</span></p>
                                        <ul class="pro__share">
                                            <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                            <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                        </ul>
                                    </div> -->

                                    <!-- Nút mua sản phẩm -->
                                    <ul>
                                        <li style="list-style-type: none; margin-top: 20px;  font-size: large;">
                                            <form id="add-to-cart-form"
                                                action="<?php echo BASE_URL?>GioHangController/ThemSPGioHang/<?php echo  $row["masp"]; ?>"
                                                method="POST">
                                                <input min="1" max="10" type="number" value="1" name="soluong[<?php echo  $row["masp"]; ?>]"
                                                    size="2"> </input>
                                                <input style=" font-size: large;" type="submit" value="Mua Sản Phẩm" class="btn btn-danger"></input>
                                            </form>
                                            <h6 style="font-style: italic;">*Sản phẩm mua về tự lắp đặt sẽ không được hỗ trợ bảo hành</h6>
                                        </li>

                                        

                                        <li style="list-style-type: none; margin-top: 20px;  font-size: large;">
                                            <form action="<?php echo BASE_URL?>GioHangController/ThemGioHangDat" method="POST">
                                                <td align="center">
                                                    <input type="hidden" name="hinhanhdh"
                                                        value="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh'];?>" />
                                                    <input type="hidden" name="tensanphamdh"
                                                        value="<?php echo $row['tensanpham'];?>" />
                                                    <input type="hidden" name="dongiadh"
                                                        value="<?php  $dongiasaugiam = $row["dongia"] - ( $row["dongia"] * ($row['giatrikhuyenmai']/100)); 
                                                        echo $dongiasaugiam;?>" />
                                                    <input type="number" style="width: 50px; text-align: center;"
                                                        name="soluongdh" min="1" max="10" value="1" />
                                                    <input type="hidden" name="maspdh" value="<?php echo $row['masp'];?>" />
                                                    <input class="button2 b-green rot-135" style="border: none;" type="submit" name="themgiodathang"
                                                        value="Đặt Lịch Sửa Chữa" />                                                   
                                                </td>
                                            </form>
                                        </li>

                                        <li style="list-style-type: none; margin-top: 20px;  font-size: large;"><a
                                                href="<?php echo BASE_URL?>SanPhamController/limitProductGrid">Tiếp tục mua hàng</a></li>
                                                
                                    </ul>
                                    <!-- Nút mua sản phẩm -->

                                    <!-- Khuyến mãi cứng -->
                                    <div class="wvn-gift">
                                        <span class="tieu-de"><ion-icon style="font-size:16px; margin-bottom:-2px;" name="gift-outline"></ion-icon> Khuyến mãi đặc biệt</span>
                                        <ul>
                                            <li>Nâng cấp ở cứng bảo hành 3 năm</li>
                                            <li>Thay màn hình Tiết Kiệm 20%</li>
                                            <li>Giá đã có công thợ, không thêm chi phí khác</li>
                                        </ul>
                                    </div>
                                    <!-- Khuyến mãi cứng -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Details Top -->

            <?php
                }
            ?>

        </section>
        <!-- End Product Details Area -->
        <!-- Start Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- Start List And Grid View -->
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Mô tả</a></li>
                            <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">Thông tin thêm</a></li>
                            <li role="presentation" class="shipping"><a href="#shipping" role="tab" data-toggle="tab">Cùng loại</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">

                            <?php 
                                while ($row = mysqli_fetch_array($dataview["MoTa"])){
                            ?>
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <p>Thời gian bảo hành 6 - 12 tháng, hoàn 100% tiền nếu khách hàng không hài lòng, tổng đài miễn phí 1234.5678 giải đáp thắc mắc nhanh chóng.</p>
                                    <h4 class="ht__pro__title"><?php echo  $row["tieude"]; ?></h4>
                                    <p><?php echo  $row["mota"]; ?></p>
                                    <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in</p> -->
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                                <div class="pro__tab__content__inner">
                                    <p>Kiểm tra lỗi chính xác và đưa giải pháp khắc phục cụ thể mang lại dịch vụ sửa chữa, thay thế nhanh chóng với chi phí thấp cho khách hàng.</p>
                                    <h4 class="ht__pro__title"><?php echo  $row["tieude"]; ?></h4>
                                    <p><?php echo  $row["thongtinthem"]; ?></p>
                                    <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p> -->
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <?php
                                }
                            ?>

                            <!-- Start Single Content -->
                            <div role="tabpanel" id="shipping" class="pro__single__content tab-pane fade">
                                <div class="pro__tab__content__inner">
                                    <!-- <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                                    <h4 class="ht__pro__title">Description</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                    <h4 class="ht__pro__title">Standard Featured</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p> -->
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <!-- Start Product Area -->
        <section class="htc__product__area--2 pb--100 product-details-res">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line" style="font-family: 'Muli', sans-serif;">Sản Phẩm Cùng Loại</h2>
                            <p> Sale giảm giá 12.12 – Khuyến mãi deal khủng </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="product__wrap clearfix">

                    <?php 
                    while ($row = mysqli_fetch_array($dataview["LoaiSPLienQuan"])){
                    //while ($row = mysqli_fetch_array($tin)){
                    ?>

                        <!-- Start Single Product -->
                        <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <a href="/KhoaLuanTotNghiep/SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
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
                                    <h4 style="height: 40px;"><a href="/KhoaLuanTotNghiep/SanPhamController/productDetail/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>"><?php echo $row["tensanpham"]; ?> </a></h4>
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
                        <!-- End Single Product -->
                        
                        <?php 
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Area -->
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