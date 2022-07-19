<style>
/*-------------------Khuyến mãi CSS ------------*/
.wvn-gift {
    margin-bottom: 15px;
    margin-top: 30px;
    background: white;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #008997;
    font-size: 15px;
    width: 100%;
}

.wvn-gift .tieu-de {
    background-image: linear-gradient(90deg, #0367a6 0%, #008997 74%);
    padding: 2px 20px;
    margin-top: -24px;
    font-size: 15px;
    font-weight: 500;
    color: #ffffff;
    display: block;
    max-width: 207px;
    border-radius: 99px;
}

.wvn-gift ul {
    margin-bottom: 4px;
}
</style>


<?php 
                    while ($row = mysqli_fetch_array($dataview["Detail"])){
?>


<div class="container" style="margin: 50px auto; text-align:left;">
    <div class="row"
        style="background-color: #fff; box-shadow: 0 0 15px -5px #ABADAF; padding:30px; border-radius:15px;">
        <div class="col-md-12">
            <h2 style="font-weight: 700; margin-bottom: 20px;"><?php
                            echo  $row["tensanpham"];
                        ?></h2>

        </div>

        <div class="col-md-6">
            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="ảnh lỗi"
                style="width: 100%;">
        </div>
        <div class="col-md-6" style="padding: 50px;">
            <ul>
                <li>MÃ: <?php echo  $row["masp"]; ?> </li>
                <li>Thời gian bảo hành: <?php echo  $row["thoihanbaohanh"]; ?> tháng </li>
                <li>Giá bán: 
                    

                        <!-- tính giá khiển mại -->
                        <?php 
                            if($row["giatrikhuyenmai"] > 0)
                            {
                        ?>
                                <span style="text-decoration-line:line-through; color: red;"><?php  echo number_format($row["dongia"], 0,',','.');?>
                                ₫</span> |
                                <span style="font-size: 20px; font-weight: 700;" >
                                <?php  
                                $giakhuyenmai = $row["dongia"] - $row["dongia"]*$row["giatrikhuyenmai"]/100;
                                echo number_format($giakhuyenmai, 0,',','.');
                                ?>
                                ₫</span> 
                        <?php                             
                            }
                            else{
                                
                            ?>
                                <span
                                style="font-size: 20px; font-weight: 700;"><?php  echo number_format($row["dongia"], 0,',','.');?>
                                VND</span>

                            <?php
                            }
                        ?>
                        <!-- tính giá khiển mại -->

                </li>
                <li>Trạng thái:
                    <?php 
                        if($row["soluongton"] > 0) {?>
                    <span style="color: green;">
                        <?php 
                            echo "Còn hàng"; }?>

                        <?php  if($row["soluongton"] <= 0){ ?>
                        <span style="color: red;">
                            <?php     echo "Hết hàng";    }            
                        ?>
                        </span>

                </li>
                <li style="list-style-type: none; margin-top: 20px;">
                    <form id="add-to-cart-form"
                        action="<?php echo BASE_URL?>GioHangController/ThemSPGioHang/<?php echo  $row["masp"]; ?>"
                        method="POST">
                        <input min="1" max="10" type="number" value="1" name="soluong[<?php echo  $row["masp"]; ?>]"
                            size="2"> </input>
                        <input type="submit" value="Mua Sản Phẩm" class="btn btn-success"></input>
                    </form>
                </li>
                <li style="list-style-type: none; margin-top: 20px;"><a
                        href="<?php echo BASE_URL?>SanPhamController/limitSP">Quay về trang chủ</a></li>
            </ul>

            <div class="wvn-gift">
                <span class="tieu-de"><ion-icon style="font-size:16px; margin-bottom:-2px;" name="gift-outline"></ion-icon> Khuyến mãi đặc biệt</span>
                <ul>
                    <li>Nâng cấp ở cứng bảo hành 3 năm</li>
                    <li>Thay màn hình Tiết Kiệm 20%</li>
                    <li>Giá đã có công thợ, không thêm chi phí khác</li>
                </ul>
            </div>

        </div>
        <?php
                    }
                ?>

    </div>
    <!-- ------------------------------------------ -->
    <div class="row"
        style="background-color: #fff; box-shadow: 0 0 15px -5px #ABADAF; padding:30px; border-radius:15px; margin-top:15px;">

        <?php 
                    while ($row = mysqli_fetch_array($dataview["MoTa"])){
                ?>
        <div class="col-md-12">
            <h2>Mô tả</h2>
            <span style=" font-weight: bold;"> Sản phẩm: <?php echo  $row["tieude"]; ?></span> <br>
            <?php echo  $row["mota"]; ?> <br><br>
            <h2>Thông tin thêm</h2>
            

        </div>

        <?php
                    }

                ?>

    </div>

    <!-- ------------------------------------------ -->

    <div class="row text-center" id="sanpham"
        style="background-color: #fff; box-shadow: 0 0 15px -5px #ABADAF; padding:30px; border-radius:15px; margin-top:15px;">
        <div class="col-md-12" style="text-align:left;">
            <h2>Sản Phẩm Cùng Loại</h2>
        </div>
        <?php 
                   while ($row = mysqli_fetch_array($dataview["LoaiSPLienQuan"])){
                    //while ($row = mysqli_fetch_array($tin)){
                ?>
        <div class="col-sm-4 col-md-2 col-xs-12">

            <div class="card">

                <!-- <div class="pro-sale">
                        <p>Sale</p>
                    </div> -->
                <div>
                    <a
                        href="/KhoaLuanTotNghiep/SanPhamController/ChiTietSanPham/<?php echo $row["masp"]; ?>/<?php echo $row["maloai"]; ?>">
                        <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" width="300"></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">
                        <?php if (strlen($row["tensanpham"]) > 35) { echo trim(substr($row["tensanpham"], 0, 35)) . "...";
                                } else {
                                    echo $row["tensanpham"];
                                }?>
                    </h6>
                    <span style=" color: gray;"><?php  echo number_format($row["dongia"], 0,',','.');?>
                        VND</span>
                </div>
                <div class="detail-pro">
                    <br>
                    <span>
                        <a href="#" class="btn" style="border: 1px solid gray; color: gray;">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                        <a href="#" class="btn" style="border: 1px solid gray; color: gray;">
                            <ion-icon name="open-outline"></ion-icon>
                        </a>
                    </span>
                </div>
            </div>

        </div>
        <?php 
                }
                ?>
    </div>

    <!-- ------------------------------------------ -->
</div>