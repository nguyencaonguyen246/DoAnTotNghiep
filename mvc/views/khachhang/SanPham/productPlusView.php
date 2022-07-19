

                                <?php 
                                        while ($row = mysqli_fetch_array($dataview["LTSP"])){
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

                                                <li onclick="BUYSP('<?php echo $row['masp']; ?>', '<?php if(isset($_SESSION['makh'])){echo $_SESSION['makh'];} else {echo 'null';}  ?>')" ><a><i class="icon-handbag icons"></i></a></li>

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