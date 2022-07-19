<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Đăng nhập</title>

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL?>public/asbab/images/icons8_Incoming_Call_on_iPhone.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

</head>
<style>
:root {
    /* COLORS */
    --white: #e9e9e9;
    --gray: #333;
    --blue: #ef798a; 
    --lightblue: #f7a9a8;

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
    height: 100%;
    margin-top: 40%;
    text-align: center;
    border-radius: 10px;
    width: 300px;
}

.input {
    background-color: #fff;
    border: none;
    padding: 0.9rem 0.9rem;
    margin: 0.5rem 0;
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
    padding-top: 30px;
    font-size: 15px;
}

h3 {
    position: absolute;
    color: red;
    margin-top: 20%;
    font-size: 13px;
}
</style>

<body>
    <div class="container__form">
        <form action="<?php echo BASE_URL?>DangNhapController/dangnhap" method="post" class="form">
            <h2 class="form__title">Đăng nhập</h2>
            <h3>
                <?php 
                    if(isset($dataview["ketqua"])){
                        if(!$dataview["ketqua"]){
                            echo "Đăng nhập thất bại!";
                        }
                    }
                ?>
            </h3>
            <h3>
                <?php 
                    if(isset($dataview["thongtin"])){
                            echo $dataview["thongtin"];
                    }
                ?>
            </h3>
            <input name="sdtkhachhang" type="text" placeholder="Số Điện Thoại" class="input"
                value="<?php if(isset($dataview["sdtkhachhang"])){echo $dataview["sdtkhachhang"];} ?>" />
            <input name="matkhau" type="password" placeholder="Mật khẩu" class="input" />
            <button type="submit" name="btnDangNhap" class="btn">Đăng nhập</button>
            <a href="<?php echo BASE_URL?>DangKyController">Bạn chưa có tài khoản?</a>
        </form>
    </div>
    <?php
        if(isset($dataview["ketqua_dangky"])) {
            if($dataview["ketqua_dangky"]){?>
    <script>
    $(document).ready(
        function() {
            alert('Đăng ký thành công. Hãy đăng nhập!');
        }
    );
    </script>
    <?php }
        }
    ?>

</body>

</html>