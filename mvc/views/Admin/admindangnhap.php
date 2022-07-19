<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Đăng nhập</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo BASE_URL?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo BASE_URL?>public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo BASE_URL?>public/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header text-center">
                <h3>ADMIN</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo BASE_URL?>admin/admindangnhap" method="POST">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="text" id="inputTendangnhap" name="tendangnhap" class="form-control"
                                placeholder="Tên đăng nhập" required="required" autofocus="autofocus">
                            <label for="inputTendangnhap">Tên đăng nhập</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="matkhau" class="form-control"
                                placeholder="Mật khẩu" required="required">
                            <label for="inputPassword">Mật khẩu</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="btndangnhapAdmin">Đăng nhập</button>
                </form>
                <div class="text-center">
                    <a style="padding: 10px;" class="d-block small" href="#">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo BASE_URL?>public/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo BASE_URL?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo BASE_URL?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>