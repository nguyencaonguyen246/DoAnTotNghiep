<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Đổi Mật Khẩu</title>


    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL?>public/asbab/images/icons8_Incoming_Call_on_iPhone.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

</head>
<style>
:root {
    /* COLORS */
    --white: #e9e9e9;
    --gray: #333;
    --blue: #228b22;
    --lightblue: #20b2aa;

    /* RADII */
    --button-radius: 0.7rem;

    /* SIZES */
    --max-width: 758px;
    --max-height: 420px;

    font-size: 16px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

body {
    align-items: center;
    background-color: var(--white);
    /* background: url("https://res.cloudinary.com/dci1eujqw/image/upload/v1616769558/Codepen/waldemar-brandt-aThdSdgx0YM-unsplash_cnq4sb.jpg"); */
    background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: grid;
    height: 100vh;
    place-items: center;
}

.form__title {
    font-weight: 300;
    margin: 0;
    margin-bottom: 1.25rem;
}

.btn {
    background-color: var(--blue);
    background-image: linear-gradient(90deg, var(--blue) 0%, var(--lightblue) 74%);
    color: var(--white);
    cursor: pointer;
    border-radius: 20px;
    border: 1px solid var(--blue);
    font-size: 0.8rem;
    font-weight: bold;
    letter-spacing: 0.1rem;
    padding: 0.9rem 4rem;
    text-transform: uppercase;
    transition: transform 80ms ease-in;
    margin-top: 30px;
}

.form {
    background-color: var(--white);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 3rem;
    height: 600px;
    margin-top: 10%;
    text-align: center;
    border-radius: 10px;
    width: 450px;
}

.input {
    background-color: #fff;
    border: none;
    padding: 0.9rem 0.9rem;
    margin: 0.7rem 0;
    width: 100%;
}

.container__form {
    height: 60%;
    position: absolute;

    top: 0;

    transition: all 0.6s ease-in-out;
}

a {
    color: gray;
    text-decoration: none;
    padding-top: 10px;
    font-size: 15px;
}

h5 {
    position: absolute;
    color: red;
    font-size: 13px;
    margin-top: 50%;
}


.ajax_sdt {
    position: absolute;
}

.ajax_sdt #messSodienthoai {
    position: relative;
    color: red;
    font-size: 11px;
    margin-top: -10px;
    margin-left: 45%;
    width: 300px;

}

.ajax_sdt #messSDT {
    position: relative;
    color: red;
    font-size: 11px;
    margin-top: -25px;
    margin-left: 48%;
    width: 300px;

}

.mess_MK {
    position: absolute;
}

.mess_MK #messMK {
    position: relative;
    color: red;
    font-size: 11px;
    margin-top: -10px;
    margin-left: 41%;
    width: 300px;

}

.form-group {
    width: 360px;
    margin-top: -7px ;
}
</style>

<body>
    <div>
        <a href="<?php echo BASE_URL?>HomeController">TRANG CHỦ</a>
    </div>
    <div class="container__form">
        <form action="<?php echo BASE_URL?>DangNhapController/doipass" method="post" class="form">
            <h2 class="form__title">Đổi Mật Khẩu</h2>
            <!--<input name="tendangnhap" id="tendangnhap" type="text" placeholder="Tên đăng nhập" class="input" />-->
            <div class="form-group">
                <input name="passold" id="matkhaucu" type="password" placeholder="Nhập mật khẩu cũ" class="input"
                    required="required" />
                <div class="ajax_sdt">
                    <p id="messSodienthoai"></p>
                    <p id="messSDT"></p>
                </div>
                <input type="hidden" name="makh" id="makhachhang" value="<?php echo $_SESSION['makh'];?>" />
            </div>
            <div class="form-group">
                <input name="matkhau" id="matkhau" type="password" placeholder="Mật khẩu mới" required="required"
                    class="input" />
            </div>
            <div class="form-group">
                <input name="re_matkhau" id="re_matkhau" type="password" placeholder="Nhập lại mật khẩu mới" class="input"
                    required="required" />
                <div class="mess_MK">
                    <p id="messMK"></p>
                </div>
            </div>






            <!--<input name="tenkhachhang" type="text" placeholder="Họ tên" class="input" />-->

            <!-- <input class="btn" type="submit" name="btnDangKy" value="Đăng ký"> -->
            <button type="submit" name="btnDoiMatKhau" class="btn">Đổi Mật Khẩu</button>
            <a href="<?php echo BASE_URL?>HomeController">Quay Về</a>

            <?php
                if(isset($dataview["ketqua"])){
                    if($dataview["ketqua"]==true){
                        // chưa làm gì <!--  -->
                    }
                    else{?>
            <h5><?php echo "Bạn chưa nhập đầy đủ thông tin";  ?></h5>
            <?php 
                }
                }
            ?>

            <?php
                if(isset($dataview["ketquasdt"])){
                    if($dataview["ketquasdt"]==true){
                        // chưa làm gì <!--  -->
                    }
                    else{?>
            <h5><?php echo "Thông tin không hợp lệ";  ?></h5>
            <?php 
                }
                }
            ?>

        </form>
    </div>

    <script>
    $(function() {
        $('#re_matkhau').keyup(function() {
            if ($('input[name=matkhau]').val() != $('input[name=re_matkhau]').val()) {
                var s = "Mật khẩu nhập lại chưa trùng khớp";
                $("#messMK").html(s);
            }
            else{
                var s = "";
                $("#messMK").html(s);
            }
        });
    })
    </script>
    <script>
    // $(document).ready(function() { // kiểm tra số điện thoại
    //     $("#sodienthoai").keyup(function() {
    //         var usersdt = $(this).val();
    //         $.post("<?php echo BASE_URL ?>Ajax/ktraDoDaiSdt", {
    //             sdtkhachhang: usersdt
    //         }, function(data) {
    //             $("#messSDT").html(data);
    //         });
    //     });
    //     s
    // });
    $(document).ready(function() { // kiểm tra số điện thoại
        $("#matkhaucu").keyup(function() {
            var usermk = $(this).val();
            var makh = $("#makhachhang").val();
            $.post("<?php echo BASE_URL ?>Ajax/ktraMatKhau", {
                passold: usermk,
                makh: makh
            }, function(data) {
                $("#messSodienthoai").html(data);
            });
        });
    });
    </script>

</body>

</html>