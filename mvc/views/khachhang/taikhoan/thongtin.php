<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
@import url("//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css");

.thongtin {
    color: #FFF;
    text-align: left;
    padding-left: 30px;
}

.table-thongtin {
    border-radius: 10px;
    width: 100%;
    height: 300px;
    background-color: #c43b68;
    margin-bottom: 40px;
}

.thongtin_td {
    text-align: left;
    color: #FFF;
}

.table-thongtin td a {
    border-radius: 5px;
    background-color: #0367a6;
    color: #fff;
    border: none;
    height: 40px;
    width: 180px;
    transition: 0.5s;
}

.table-thongtin td a:hover {
    border-radius: 10px;
    text-decoration: none;
    background-color: #FFF;
    color: black;
    border: none;
    height: 40px;
    width: 180px;
    cursor: pointer;
}

/* body {
  background: #F1F3FA;
} */

.breadcrumb {
    background-color: #f6f9fb;
}

.breadcrumb a {
    color: #5b9bd1;
}

.profile-sidebar {
    padding: 20px 0 10px 0;
    background: #fff;
    position: fixed;
    top: 25px;
    border-radius: 5px;
}

.profile-pic img {
    max-height: 200px;
    margin: 0px auto;
}

.profile-title {
    text-align: center;
    margin-top: 20px;
}

.profile-title-name {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 7px;
}

.profile-title-job {
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 15px;
    padding: 10px;
}

.profile-buttons {
    text-align: center;
    margin: 10px
}

.profile-buttons .btn {
    text-transform: uppercase;
    font-size: 11px;
    font-weight: 600;
    padding: 6px 15px;
}

.profile-buttons .btn a {
    text-decoration: none;
}

.profile-buttons .btn:last-child {
    margin-right: 0px;
}

.profile-menu {
    margin-top: 30px;
}

.profile-menu ul li {
    border-bottom: 1px solid #f0f4f7;
}

.profile-menu ul li:last-child {
    border-bottom: none;
}

.nav>li>a:focus,
.nav>li>a:hover {
    background-color: #ffffff;
}

.profile-menu ul li a {
    font-size: 14px;
    font-weight: 400;
    color: #5b9bd1;
}

.profile-menu ul li a i {
    margin-right: 8px;
    font-size: 14px;
}

.profile-menu ul li a:hover {
    background-color: #fafcfd;
    color: #5b9bd1;
}

.profile-menu ul li.active {
    color: #5b9bd1;
    border-bottom: none;
    background-color: white;
}

.profile-menu ul li.active a {
    background-color: #f6f9fb !important;
    border-left: 2px solid #5b9bd1;
    margin-left: -2px;
}

.profile-content {
    margin-left: -100px;
    padding-top: 45px;
    min-height: 800px;
}

@media (max-width: 768px) {
    .profile-sidebar {
        position: relative;
    }
}


/**=============================================================================================================*/
</style>

<?php
        if(isset($dataview["ketqua"])) {
            if($dataview["ketqua"]){?>
<script>
$(document).ready(
    function() {
        alert('Thay đổi thông tin thành công!');
    }
);
</script>
<?php }
        }
    ?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(<?php echo BASE_URL?>public/asbab/images/bg/bg24.png) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="<?php echo BASE_URL?>HomeController/newHome">Trang Chủ</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Thông Tin</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="profile-sidebar" style="margin-top: 85px; padding:10px;">
                <div class="profile-pic">
                    <img src="<?php echo BASE_URL?>public/asbab/images/slider/fornt-img/user1.png"
                        class="img-responsive img-circle" alt="Ian Doyle">
                </div>
                <?php 
                    while ($row = mysqli_fetch_array($dataview["KH"])){
                ?>
                <div class="profile-title">
                    <div class="profile-title-name">
                        <?php echo  $row["tenkhachhang"]; ?>
                    </div>
                    <div class="profile-title-job">
                        <?php echo  $row["email"]; ?>
                    </div>
                </div>
                <!-- <div class="profile-buttons">
                    <a href="http://iandoyle.pro/" class="btn btn-default btn-sm" target="_blank">Sửa Hình</a>
                    <a href="https://twitter.com/ianquickly" class="btn btn-info btn-sm" target="_blank">Sửa Thông Tin</a>
                </div> -->
                <div class="profile-menu">
                    <ul class="nav" style="display: block;">
                        <li class="active">
                            <a href="#hoso" class="hoso">
                                <i class="glyphicon glyphicon-home"></i>Hồ Sơ</a>
                        </li>
                        <li>
                            <a href="#donmua" class="donmua">
                                <i class="glyphicon glyphicon-user"></i>Đơn Mua</a>
                        </li>
                        <li>
                            <a href="#lienhe" class="lienhe">
                                <i class="glyphicon glyphicon-ok"></i>Sửa & Bảo Hành </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-7 col-sm-offset-1 col-xs-12 col-md-8 col-md-offset-4">
            <section id="hoso" class="profile-content">

                <h1><i class="glyphicon glyphicon-home"></i> Hồ Sơ</h1>




                <!-- ================================Thông Tin Khách Hàng============================ -->

                <div class="container">
                    <div class="row">
                        <!--<div class="col-md-2"></div> -->
                        <div class="col-md-8" style="text-align: center;">

                            <table class="table-thongtin">
                                <tr>
                                    <th class="thongtin">Họ và tên:</th>
                                    <td class="thongtin_td">
                                        <?php
                            echo  $row["tenkhachhang"];
                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="thongtin">Số điện thoại:</th>
                                    <td class="thongtin_td">
                                        <?php 
                             echo  $row["sdtkhachhang"];
                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="thongtin">Email:</th>
                                    <td class="thongtin_td">
                                        <?php 
                             echo  $row["email"];
                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="thongtin">Địa chỉ:</th>
                                    <td class="thongtin_td">
                                        <?php 
                             echo  $row["diachi"];
                        ?>
                                    </td>
                                </tr>

                                <!-- <tr>
                                    <th class="thongtin">Số Điện Thoại:</th>
                                    <td class="thongtin_td">
                                        <?php 
                            // echo  $row["diachi"];
                        ?>
                                    </td>
                                </tr> -->

                                <tr>
                                    <td colspan="2">
                                        <a data-toggle="modal" data-target="#modelId" class="btn" href="#"
                                            name="btnThongTin" type="submit">Thay đổi thông tin</a>

                                        <div class="modal fade " id="modelId" tabindex="-1" role="dialog"
                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document"
                                                style="position: fixed; margin-top: 6em; margin-left: -10em;">
                                                <div class="modal-content"
                                                    style="position: fixed; margin-top: 6em; margin-left: -10em;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:  #008997;">Cập nhật thông
                                                            tin</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="<?php echo BASE_URL?>DangNhapController/suathongtin"
                                                            method="post">
                                                            <div class="form-group"
                                                                style="text-align: left; color:  #008997;">
                                                                <label for="email">Họ và tên</label>
                                                                <input name="tenkhachhang"
                                                                    style="border-color: #008997;" type="text"
                                                                    class="form-control"
                                                                    value="<?php echo $row["tenkhachhang"];?>">
                                                            </div>
                                                            <div class="form-group"
                                                                style="text-align: left; color:  #008997;">
                                                                <label for="pwd">Số điện thoại</label>
                                                                <input name="sdtkhachhang"
                                                                    style="border-color: #008997;" type="text"
                                                                    class="form-control"
                                                                    value="<?php echo $row["sdtkhachhang"];?>">
                                                            </div>
                                                            <div class="form-group"
                                                                style="text-align: left; color:  #008997;">
                                                                <label for="email">Email</label>
                                                                <input name="email" style="border-color: #008997;"
                                                                    type="email" class="form-control"
                                                                    value="<?php echo $row["email"];?>">
                                                            </div>
                                                            <div class="form-group"
                                                                style="text-align: left; color:  #008997;">
                                                                <label for="email">Địa chỉ</label>
                                                                <input name="diachi" style="border-color: #008997;"
                                                                    type="text" class="form-control"
                                                                    value="<?php echo $row["diachi"];?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" style="width: 80px;"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal">Đóng</button>
                                                                <button type="submit" name="btncapnhat"
                                                                    style="width: 80px;"
                                                                    class="btn btn-thaydoitt">Lưu</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <?php 
            } 
            ?>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>




            </section>
            <section id="donmua" class="profile-content">
                <div class="row">
                    <h1><i class="glyphicon glyphicon-user"></i> Đơn Mua</h1>
                    <!-- <ol class="breadcrumb">
                        <li><a href="#hoso">Hồ Sơ</a></li>
                        <li><a href="#donmua">Đơn Mua</a></li>
                        <li><a href="#lienhe">Liên Hệ</a></li>
                    </ol> -->
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        Sản phẩm bạn đã mua ở đây.
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                               
                                                <th class="product-thumbnail">Hình Ảnh</th>
                                                <th class="product-name"><span class="nobr">Tên Sản Phẩm</span></th>
                                                <th class="product-price"><span class="nobr"> Ngày Mua </span></th>
                                                <th class="product-price"><span class="nobr"> Số Lượng </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Thành Tiền </span></th>
                                                <th class="product-add-to-status"><span class="nobr">Tình Trạng</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            while ($row = mysqli_fetch_array($dataview["DSHD"])){
                                            //while ($row = mysqli_fetch_array($tin)){
                                            ?>

                                            <tr>
                                              
                                                <td class="product-thumbnail"><a href="#"><img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="" /></a></td>
                                                <td class="product-name">
                                                  <a ><?php  echo $row["tensanpham"];?></a>
                                                  <ul  class="pro__prize">
                                                    <?php 
                                                    if($row["dongia"] != $row["giakhuyenmai"]){ ?>
                                                    <li class="old__prize" style="text-decoration-line:line-through; color: red;">
                                                      <?php  echo number_format($row["dongia"], 0,',','.');?> ₫</li>
                                                    <li>

                                                    <?php }                                                   
                                                    ?>
                                                    <li> <?php  echo number_format($row["giakhuyenmai"], 0,',','.');?>  ₫</li>
                                                </ul>
                                                </td>
                                                <td class="product-price"><span class="amount"><?php  echo $row["ngaylap"];?></span></td>
                                                <td class="product-price"><span class="amount"><?php  echo $row["soluong"];?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php  echo number_format($row["thanhtien"], 0,',','.');?> ₫</span></td>
                                                <td class="product-add-to-status"> 
                                                <?php 
                                                if($row["tinhtrangdh"] == "Chờ xác nhận")
                                                { ?>
                                                  <span style=" color: red;"> <?php  echo $row["tinhtrangdh"];?></span>
                                                <?php }
                                                else
                                                {?>
                                                   <span> <?php  echo $row["tinhtrangdh"];?></span>
                                                <?php }
                                                ?>

                                                 

                                                </td>
                                            </tr>
                                            
                                            <?php 
                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Cám ơn quý khách đã tin tưởng CapCuuDienThoai.vn</h4>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>


            </section>


            <section id="lienhe" class="profile-content">
                <div class="row">
                    <h1><i class="glyphicon glyphicon-ok"></i>Sửa Chữa & Bảo Hành</h1>

                    <!-- <ol class="breadcrumb">
                        <li><a href="#hoso">Hồ Sơ</a></li>
                        <li><a href="#donmua">Đơn Mua</a></li>
                        <li><a href="#lienhe">Liên Hệ</a></li>
                    </ol> -->
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        Thông tin sản phẩm sửa chữa và bảo hành ở đây.
                    </div>
                </div>
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                
                                                <th class="product-thumbnail">Hình Ảnh</th>
                                                <th class="product-name"><span class="nobr">Tên Sản Phẩm</span></th>
                                                <th class="product-price"><span class="nobr"> Ngày Mua </span></th>
                                                <th class="product-price"><span class="nobr"> Số Lượng </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Thành Tiền </span></th>
                                                <th class="product-add-to-status"><span class="nobr">Tình Trạng</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                            while ($row = mysqli_fetch_array($dataview["DSBH"])){
                                            //while ($row = mysqli_fetch_array($tin)){
                                            ?>

                                            <tr>
                                                
                                                <td class="product-thumbnail"><a href="#"><img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="" /></a></td>
                                                <td class="product-name">
                                                  <a ><?php  echo $row["tensanpham"];?></a>
                                                  <ul  class="pro__prize">
                                                    <!-- <?php 
                                                    if($row["dongia"] != $row["giakhuyenmai"]){ ?>
                                                    <li class="old__prize" style="text-decoration-line:line-through; color: red;">
                                                      <?php  echo number_format($row["dongia"], 0,',','.');?> ₫</li>
                                                    <li>

                                                    <?php }                                                   
                                                    ?> -->
                                                    <li> <?php  echo number_format($row["dongia"], 0,',','.');?>  ₫</li>
                                                </ul>
                                                </td>
                                                <td class="product-price"><span class="amount"><?php  echo $row["ngaylap"];?></span></td>
                                                <td class="product-price"><span class="amount"><?php  echo $row["soluong"];?></span></td>
                                                <td class="product-stock-status"><span class="wishlist-in-stock"><?php  echo number_format($row["thanhtien"], 0,',','.');?> ₫</span></td>
                                                <td class="product-add-to-status"> 
                                                <?php 
                                                if($row["tinhtranghd"] == "Chờ tiếp nhận" || $row["tinhtranghd"] == "Yêu cầu sửa chữa")
                                                { ?>
                                                  <span style=" color: red;"> <?php  echo $row["tinhtranghd"];?></span>
                                                <?php }
                                                else
                                                {?>
                                                   <span> <?php  echo $row["tinhtranghd"];?></span>
                                                <?php }
                                                ?>

                                                 

                                                </td>
                                            </tr>
                                            
                                            <?php 
                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="wishlist-share">
                                                        <h4 class="wishlist-share-title">Cám ơn quý khách đã tin tưởng CapCuuDienThoai.vn</h4>
                                                        
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>