<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">


<style>
    * {
        font-family: 'Muli', sans-serif;
    }
</style>




<div class="container" style="margin: 50px auto;">
    <div class="row">
        <div class="col-md-5" style="width: 100%; background-color: #f5f5f5; padding: 30px 20px;">
            <h4>THÔNG TIN GIAO HÀNG</h4>
            <?php 
                    while ($row = mysqli_fetch_array($dataview["KH1"])){
                ?>
            <form id="hd-form" action="<?php echo BASE_URL?>GioHangController/XacNhanDatHang"
            method="POST">        
                <input type="text" required="required" name="ten" placeholder="Họ và tên" value="<?php echo $row["tenkhachhang"];?>" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <input type="email" required="required" name="email" placeholder="Email" value="<?php echo $row["email"];?>" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <input type="text" required="required" name="sodienthoai" placeholder="Số điện thoại" value="<?php echo $row["sdtkhachhang"];?>" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <input type="text"  required="required" name="diachi" placeholder="Địa chỉ" value="<?php echo $row["diachi"];?>" style="width: 100%; padding: 5px 10px; margin: 10px 0;">
                <a  href="<?php echo BASE_URL?>GioHangController/Cart" style="display: inline-block; margin-top: 10px; ">Quay lại giỏ hàng</a>
                <button type="submit" name="xacnhan_click"  class="btn btn-success" style="display: block; padding: 14px 12px; float: right; margin-top: 10px;">THANH TOÁN</button>
            </form>
            <?php 
            } 
            ?>
        </div>
        <div class="col-md-7" style="width: 100%; padding: 30px 20px;">
            <h4 style="margin-bottom: 30px;">ĐƠN HÀNG CỦA BẠN</h4>
            <table style="width: 100%; text-align: center;">
                <thead>
                    <tr>
                        <th>&nbsp;</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>SL</th>
                        <th>GIÁ</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                while ($row = mysqli_fetch_array($dataview["GH1"])){
                    //while ($row = mysqli_fetch_array($tin)){
                ?>
                    <tr style="border-bottom: 1px solid black; height: 70px;">
                        <td style="width: 15%;">
                            <img src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh']; ?>" alt="lỗi ảnh" style="width: 70%;">
                        </td style="width: 45%;">
                        <td><?php  echo $row["tensanpham"];?></td>
                        <td style="width: 10%;"><?php  echo $row["soluong"];?></td>
                        <td style="width: 30%;"><?php  echo number_format($row["thanhtien"], 0,',','.');?> VND</td>
                    </tr>
                    <?php 
                    } 
                    ?>
                </tbody>
                <tfoot>
                    <tr style="height: 40px;">
                        <td colspan="3" style="text-align: left;">Tạm tính: </td>
                        <td colspan="1"> </td>
                    </tr>
                    <tr style="border-bottom: 1px solid black; height: 40px;">
                        <td colspan="3" style="text-align: left;">Phí vận chuyển: </td>
                        <td colspan="1">--</td>
                    </tr>
                    <tr style="height: 60px;">
                        <td colspan="3" style="text-align: left; font-size: 20px;">Tổng cộng: </td>
                        <td colspan="1" style="font-size: 20px;"><?php while ($row = mysqli_fetch_array($dataview["TongTien1"])){  echo number_format($row["tongtien"], 0,',','.'); }?> VND</td>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>
