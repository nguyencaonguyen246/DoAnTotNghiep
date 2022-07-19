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
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
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

            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-luggage-cart"></i>
                    <span>Sản phẩm</span></a>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdown">

                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/admin_sanpham"><i
                            class="fas fa-luggage-cart"></i> Xem sản phẩm</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themsanpham"><i class="fas fa-plus"></i>
                        Thêm sản phẩm</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item active" href="<?php echo BASE_URL?>admin/themdanhmuc"><i
                            class="fas fa-plus"></i>
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
                    <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themkhuyenmai"><i class="fas fa-tags"></i>
                        Thêm khuyến mãi</a>
                </div>
            </li>
            <?php 
                if(isset($_SESSION['macv'])){
                    if($_SESSION['macv']==1){?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-people-carry"></i>
                                <span>Nhân viên</span></a>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="<?php echo BASE_URL?>admin/xemnhanvien"><i
                                    class="fas fa-user-friends"></i> Xem nhân viên</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASE_URL?>admin/themnhanvien"><i class="fas fa-plus"></i>
                                Thêm nhân viên</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item " href="<?php echo BASE_URL?>admin/phanquyen"><i
                                                class="fas fa-user-shield"></i></i> Phân quyền</a>
                            </div>
                        </li>
                    <?php }
                }
            ?>
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
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>
                            <i class="fas fa-plus"></i>
                            Thêm danh mục
                        </h3>
                    </div>
                    <div>
                        <?php
                            if(isset($dataview["ketqua_dm"])) {
                                if($dataview["ketqua_dm"]){?>
                            <h4 class="alert alert-success"><i class="fas fa-check"></i> Thêm thành công</h4>
                            <?php }
                                else{ ?>
                            <h4 class="alert alert-danger"><i class="fas fa-times"></i> Thêm thất bại</h4>
                            <?php }
                        }?>
                    </div>
                    <div style="padding: 20px;">
                        <form action="<?php echo BASE_URL?>admin/post_themdanhmuc" method="POST">
                            <div>
                                    Thêm danh mục mới:
                                    <input type=" text" class="cus-input" autofocus="autofocus" id="tendm" name="tendm"
                                    required="required">
                            </div>
                            <div style="color: red; font-size: 14px;" id="messtendm"></div>
                            <div>
                                <button style="width: max-content;" type="submit" name="themdanhmuc"
                                    class="button2 b-green rot-135">
                                    <i class="fas fa-plus"></i> Thêm</button>
                            </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th width="150">Hành dộng</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Hành dộng</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                    $stt = 1;
                                     while ($row = mysqli_fetch_array($dataview["DANHMUC"])){
                                    ?>
                                <tr>
                                    <td>
                                        <?php echo $stt++; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['tendm'];?>
                                    </td>
                                    <td align="center"> <a style="width: max-content;" type="button" href="<?php echo BASE_URL?>admin/suadanhmuc/<?php echo $row['madm']?>"
                                            name="suadanhmuc" class="button2 b-blue rot-135">
                                            <i class="fas fa-edit"></i> Sửa</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

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

    <!-- Phân trang -->
    <script src="<?php echo BASE_URL?>public/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo BASE_URL?>public/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo BASE_URL?>public/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo BASE_URL?>public/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo BASE_URL?>public/js/demo/datatables-demo.js"></script>
    <script src="<?php echo BASE_URL?>public/js/demo/chart-area-demo.js"></script>
    <script>
        $(document).ready(function() {
            $("#tendm").keyup(function() {
                var dm = $(this).val();
                $.post("<?php echo BASE_URL?>Ajax/ktratendm", {
                    tendm: dm
                }, function(data) {
                    $("#messtendm").html(data);
                });
            });
        });
    </script>
</body>

</html>