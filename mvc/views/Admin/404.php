<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>404 - Admin</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo BASE_URL?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo BASE_URL?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo BASE_URL?>public/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo BASE_URL?>public/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo BASE_URL?>public/css/button.css" rel="stylesheet">
    <style>
    /*======================
    404 page
=======================*/


    .page_404 {
        padding: 40px 0;
        background: #fff;
        font-family: 'Arvo', serif;
    }

    .page_404 img {
        width: 100%;
    }

    .four_zero_four_bg {

        background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        background-repeat: no-repeat;
        height: 400px;
        background-position: center;
    }


    .four_zero_four_bg h1 {
        font-size: 80px;
    }

    .four_zero_four_bg h3 {
        font-size: 80px;
    }

    .link_404 {
        color: #fff !important;
        padding: 10px 20px;
        background: #39ac31;
        margin: 20px 0;
        display: inline-block;
    }

    .contant_box_404 {
        margin-top: -50px;
    }
    </style>

</head>


<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="col-sm-12 col-sm-offset-1  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>
                        <div class="contant_box_404">
                            <h2 class="h2" style="color: red;">
                                CẢNH BÁO
                            </h2>

                            <h3>Bạn không có quyền truy cập hoặc thao tác sai khi thực hiện</h3>
                            <p>Bạn có thể thử đăng nhập lại website hoặc kiểm tra dữ liệu khi thao tác</p>
                            <p>
                                <a href="<?php echo BASE_URL?>admin">Đăng nhập admin</a>
                                | <a href="<?php echo BASE_URL?>tieptan">Đăng nhập tiếp tân</a>
                               | <a href="<?php echo BASE_URL?>kythuat">Đăng nhập kỹ thuật</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>