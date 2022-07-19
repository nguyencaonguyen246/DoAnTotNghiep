<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> 
        <?php 
            if($_SESSION['macv'] == 1){
                echo "Admin";
            }
            else{
                echo "Tiếp tân";
            }
        ?> - Admin
    </title>

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
    .cus-input {
        width: 100%;
    }
    </style>
</head>

<body id="page-top">

    <nav class="navbar navbar-expand static-top" style="height: 50px;">

        <a class="navbar-brand mr-1" style="color: #CCCCCC;" href="<?php echo BASE_URL?>admin/index">Cấp cứu điện
            thoại</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <!-- <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." aria-label="Search"
                    aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div> -->
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw" style="color: #CCCCCC;"></i>
                    <span class="badge badge-danger">99+</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw" style="color: #CCCCCC;"></i>
                    <span class="badge badge-danger">7</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw" style="color: #CCCCCC;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Settings</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL?>admin/index">
                    <i class="fas fa-mobile-alt"></i>
                    <span>
                        <?php 
                                if($_SESSION['macv'] == 1){
                                    echo "Tài khoản: ADMIN";
                                }
                                else{
                                    echo "Tài khoản: TIẾP TÂN";
                                }
                            ?>
                    </span>
                </a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Trang</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <h6 class="dropdown-header">Login Screens:</h6>
                    <a class="dropdown-item" href="login.html">Login</a>
                    <a class="dropdown-item" href="register.html">Register</a>
                    <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Other Pages:</h6>
                    <a class="dropdown-item" href="404.html">404 Page</a>
                    <a class="dropdown-item" href="blank.html">Blank Page</a>
                </div>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-wrench"></i>
                    <span>Sửa chữa</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item " href="<?php echo BASE_URL?>admin/loadsanpham"><i
                            class="fas fa-screwdriver"></i> Sửa chữa</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/loadhoadon"><i
                            class="fas fa-file-invoice"></i> Điều phối</a>
                            <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/yeucaubaohanh"><i class="far fa-edit"></i>
                        Bảo hành online</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/yeucausuachua"><i class="far fa-edit"></i>
                        Sửa chữa online</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/lichsuphancong">
                        <i class="fas fa-history"></i> Lịch sử phân công</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-luggage-cart"></i>
                    <span>Sản phẩm</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/admin_sanpham"><i
                            class="fas fa-luggage-cart"></i> Xem sản phẩm</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="<?php echo BASE_URL?>admin/themsanpham"><i class="fas fa-plus"></i>
                        Thêm sản phẩm</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themdanhmuc"><i class="fas fa-plus"></i>
                        Thêm danh mục</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themncc"><i class="fas fa-plus"></i>
                        Thêm nhà cung cấp</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themnsx"><i class="fas fa-plus"></i>
                        Thêm nhà sản xuất</a>
                        <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/loaisanpham"><i class="fas fa-plus"></i>
                        Thêm loại sản phẩm</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item " href="<?php echo BASE_URL?>admin/themkhuyenmai"><i
                            class="fas fa-tags"></i> Thêm khuyến mãi</a>


                </div>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-people-carry"></i>
                    <span>Nhân viên</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item " href="<?php echo BASE_URL?>admin/xemnhanvien"><i
                            class="fas fa-user-friends"></i> Xem nhân viên</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item active" href="<?php echo BASE_URL?>admin/themnhanvien"><i
                            class="fas fa-plus"></i> Thêm nhân viên</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/phanquyen"><i
                            class="fas fa-user-shield"></i></i> Phân quyền</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span>Khách hàng</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/xemkhachhang"><i
                            class="fas fa-user-friends"></i> Xem khách hàng</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themkhachhang"><i class="fas fa-plus"></i>
                        Thêm khách hàng</a>
                </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="<?php echo BASE_URL?>admin/xembaohanh">
                    <i class="fas fa-ambulance"></i>
                    <span>Bảo hành</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Đơn hàng</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo BASE_URL?>admin/chuaxacnhan"><i class="fas fa-luggage-cart"></i> Chưa xác nhận</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/daxacnhan"><i class="fas fa-check"></i> Đã xác nhận</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/dahuy"><i class="far fa-trash-alt"></i> Đã hủy</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/dahoanthanh"><i class="fas fa-check-circle"></i> Đã hoàn thành</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-warehouse"></i>
                    <span>Quản lý kho</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="<?php echo BASE_URL?>thongke/thongkedoanhthu">Thống kê doanh thu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/nhaphang">Nhập hàng</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/xemnhacungcap">Trả hàng</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-database"></i>
                    <span>Dữ liệu</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/backup"><i class="fas fa-cloud-download-alt"></i> Sao lưu dữ liệu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/restore"><i class="fas fa-window-restore"></i>
                        Restore</a>
                </div>
            </li>
        </ul>

        <div id="content-wrapper">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo BASE_URL?>admin/xemnhanvien">Danh sách nhân viên</a>
                    </li>
                    <li class="breadcrumb-item active">Thêm nhân viên</li>
                </ol>
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-user-plus"></i>
                            Thêm nhân viên
                        </h3>

                    </div>
                    <form action="<?php echo BASE_URL?>admin/post_themnhanvien" method="post"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <tr>
                                        <td colspan="4">
                                            <?php
                                            if(isset($dataview["Ketqua"])) {
                                                if($dataview["Ketqua"]){?>
                                            <h4 class="alert alert-success">Thêm thành công</h4>
                                            <?php }
                                                else{ ?>
                                            <h4 class="alert alert-danger">Thêm thất bại</h4>
                                            <?php }
                                                } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Họ tên</th>
                                        <td><input class="cus-input" type="text" name="tennhanvien" required="required"
                                                autofocus="autofocus" /></td>
                                        <th width="200">Số điện thoại</th>
                                        <td><input class="cus-input" type="number" id="sdtnhanvien" name="sdtnhanvien"
                                                required="required" />
                                            <div style="width: 100%; color: red; text-align: right; font-size: 13px;"
                                                id="messSDT"></div>
                                                <div style="width: 100%; color: red; text-align: right; font-size: 13px;"
                                                id="messtrungSDT"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Giới tính</th>
                                        <td>
                                            <select style="width: 100%" class="form-control" name="gioitinh">
                                                <option>Nam</option>
                                                <option>Nữ</option>
                                            </select>
                                        </td>
                                        <th>Ngày sinh</th>
                                        <td>
                                            <input class="cus-input" type="date" id="ngaysinh" name="ngaysinh"
                                                required="required" />
                                            <div style="width: 100%; color: red; text-align: right; font-size: 13px;"
                                                id="mess_ngaysinh"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <input class="cus-input" type="email" name="email" required="required" />
                                        </td>
                                        <th rowspan="2">Địa chỉ</th>
                                        <td rowspan="2">
                                            <textarea style="width: 100%; height: 85px;" type="text" name="diachi"
                                                required="required"> </textarea>
                                            <!-- <input class="cus-input"  /> -->
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Chức vụ</th>
                                        <td>
                                            <select style="width: 100%;" class="form-control" name="macv">
                                                <?php
                                                  while ($row = mysqli_fetch_array($dataview["CHUCVU"])){?>
                                                <option value="<?php echo $row['macv']; ?>">
                                                    <?php echo $row['tenchucvu']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="center"> <button style="width: max-content;"
                                                type="submit" name="themnhanvien" class="button2 b-blue rot-135">
                                                <i class="fas fa-check"></i> Thêm mới</button>
                                        </td>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto" style="color: black;">
                            <span>Copyright © Ri - Po - Ru 2021</span>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chắc chắn rời khỏi trang này?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn muốn thoát khỏi trang quản lý.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary" href="<?php echo BASE_URL?>admin/dangxuat">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo BASE_URL?>public/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo BASE_URL?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo BASE_URL?>public/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="<?php echo BASE_URL?>public/vendor/chart.js/Chart.min.js"></script>
        <script src="./public/vendor/datatables/jquery.dataTables.js"></script>
        <script src="./public/vendor/datatables/dataTables.bootstrap4.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo BASE_URL?>public/js/sb-admin.min.js"></script>

        <!-- Demo scripts for this page-->
        <script src="<?php echo BASE_URL?>public/js/demo/datatables-demo.js"></script>
        <script src="<?php echo BASE_URL?>public/js/demo/chart-area-demo.js"></script>
        <script>
        // $(document).ready(function() {
        //     $("#ngaysinh").blur(function() {
        //         var ngaysinhNV = $(this).val();
        //         $.post("Ajax/ktrangay", {
        //             ngaysinh: ngaysinhNV
        //         }, function(data) {
        //             $("#mess_ngaysinh").html(data);
        //         });
        //     });
        // });
        $(document).ready(function() {
            $("#ngaysinh").keyup(function() {
                var ngaysinhNV = $(this).val();
                $.post("<?php echo BASE_URL?>Ajax/ktrangay", {
                    ngaysinh: ngaysinhNV
                }, function(data) {
                    $("#mess_ngaysinh").html(data);
                });
            });
        });
        $(document).ready(function() { // kiểm tra độ dài số điện thoại
            $("#sdtnhanvien").keyup(function() {
                var adsdt = $(this).val();
                $.post("<?php echo BASE_URL ?>Ajax/ktraDoDaiSdtNV", {
                    sdtnhanvien: adsdt
                }, function(data) {
                    $("#messSDT").html(data);
                });
            });
        });
        $(document).ready(function() { // kiểm tra độ dài số điện thoại
            $("#sdtnhanvien").keyup(function() {
                var adsdt = $(this).val();
                $.post("<?php echo BASE_URL ?>Ajax/ktraSodienthoaiNV", {
                    sdtnhanvien: adsdt
                }, function(data) {
                    $("#messtrungSDT").html(data);
                });
            });
        });
        </script>
    </div>
</body>

</html>