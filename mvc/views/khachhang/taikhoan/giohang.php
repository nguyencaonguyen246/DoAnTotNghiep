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
* {

    font-family: 'Muli', sans-serif;
}

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

footer {
    position: fixed;
    bottom: 5px;
    right: 5px;
    color: #FFF;
}

footer a,
footer a:after {
    font-size: em !important;
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

<?php 



?>

<div class="container" style="margin: 50px auto;">
    <div class="row">
        <div class="col-md-12">
            <h4 style="font-weight: 700; margin-bottom: 50px; text-align: center;">GIỎ HÀNG CỦA BẠN</h4>
        </div>


        <form id="cart-form" action="<?php echo BASE_URL?>GioHangController/ThongTinGioHang?action=submit"
            method="POST">

            <table class="text-center" style="width: 100%; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>SỐ LƯỢNG</th>
                        <th>GIÁ</th>
                        <th>THÀNH TIỀN</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                   while ($row = mysqli_fetch_array($dataview["GH"])){
                    //while ($row = mysqli_fetch_array($tin)){
                    ?>

                    <tr style="border-bottom: 1px solid black; height: 150px;">
                        <td style="width: 10%;">
                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="lỗi ảnh"
                                style="width: 100%;">
                        </td>
                        <td style="width: 38%;"><?php  echo $row["tensanpham"];?></td>
                        <td style="width: 14%;">
                            <div class="input-group">
                                <input min="1" max = "10" type="number" class="form-control text-center"
                                    value="<?php  echo $row["soluong"];?>" name="soluong[<?php  echo $row["masp"];?>]">
                                
                                    <button class="btn btn-outline-info" type="submit"
                                name="update_click" value="Cập Nhật">Cập Nhật</button>
                                
                            </div>
                        </td>
                        <td style="width: 20%;">
                        
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
                        
                        </td>
                        <td style="width: 20%; color: red;"><?php  echo number_format($row["thanhtien"], 0,',','.');?>
                        ₫</td>
                        <td style="width: 20%;">
                        <a href="<?php echo BASE_URL?>GioHangController/XoaGioHang/<?php  echo $row["magh"];?>/<?php  echo $row["masp"];?>"> 
                            <ion-icon style="font-size : 25px; padding-top:6px; color: red;" name="close-circle-outline"></ion-icon></a>
                        </td>
                    </tr>


                    <?php 
                    }
                    ?>

                </tbody>
            </table>

            </form>

            <div class="container" style="margin: 20px auto;">
                <div class="row">

                    <div class="col-md-6 text-left">
                        <a href="<?php echo BASE_URL?>SanPhamController/limitSP" style="font-size: 20px;">Tiếp tục mua
                            hàng</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <p style="font-size: 20px;">Tạm tính: <span style="color: red; font-size: 20px;">
                                <?php while ($row = mysqli_fetch_array($dataview["TongTien"])){  echo number_format($row["tongtien"], 0,',','.'); }?>
                                VND</span>
                        </p>
                    </div>

                    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
                    <div class="col-md-8 text-right">
                        <!--<button class="btn btn-danger" style="padding: 20px 12px">THANH TOÁN NGAY</button>-->
                        
                    </div>

                    <div class="col-md-4" style="text-align: right; margin-left:70%;">
                        <!--<button class="btn btn-danger" style="padding: 20px 12px">THANH TOÁN NGAY</button>-->
                        <div class="ctn">
                        
                                <a class="button2 b-green rot-135" 
                                style="text-decoration: none; color: #fff; display: block; border: none;" href="<?php echo BASE_URL?>GioHangController/GiaoHang">Đặt Hàng Ngay</a> 
                        </div>
                    </div>


                </div>
            </div>

        


    </div>
</div>