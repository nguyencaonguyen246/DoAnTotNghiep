<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kỹ thuật - Admin</title>

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

        <a class="navbar-brand mr-1" style="color: #CCCCCC;" href="<?php echo BASE_URL?>kythuat/index">Kỹ thuật viên:
            <?php echo $_SESSION['ten_kythuat']?></a></a>

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
                    <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
                </div>
            </li>
        </ul>

    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo BASE_URL?>kythuat/index">
                    <i class="fas fa-toolbox"></i>
                    <span>Công việc</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL?>kythuat/lichsuphancong">
                    <i class="fas fa-history"></i>
                    <span>Lịch sử phân công</span></a>
            </li>

        </ul>
        <!-- ============================================================================================= -->
        <div id="content-wrapper">

            <div class="container-fluid">
                <!-- Icon Cards-->
                <div class="card mb-3">

                    <?php 
                        if($dataview['ketqua'] != null ){?>
                    <h2 class="alert alert-warning"><i class="fas fa-exclamation"></i> Bạn có công việc mới</h2>
                    <!-- Button to Open the Modal -->
                    <button data-toggle="modal" data-target="#myModal"
                        style="color: red;width: fit-content; border: none; background-color: #FFF;text-align: left; cursor: pointer;"><i
                            class="fas fa-exclamation-triangle"></i> Nhắc nhở</button>
                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 style="color: red;" class="modal-title">Chú ý:</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <?php 
                                        if(isset($dataview["mota"])){?>
                                            <h4><?php echo $dataview["mota"];?></h4>
                                        <?php }
                                    ?>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">

                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th width="120">Hình ảnh</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while( $row =  mysqli_fetch_array($dataview['hienthiphancong'])){?>
                                    <tr>
                                        <td><?php echo $row['tensanpham']?></td>
                                        <td align="center"><img
                                                src="<?php echo BASE_URL?>public/img/<?php echo $row['hinhanh'];?>"
                                                width="120"></td>
                                        <td align="center"><?php  echo number_format($row["dongia"], 0,',','.');?> VNĐ
                                        </td>
                                        <td align="center"><?php echo $row['soluong']; ?> Cái</td>
                                        <td align="center">
                                            <?php 
                                                if($row["thanhtien"] <= 0){?>
                                            <h6 style="color: green;">Bảo hành: 0 VNĐ</h6>
                                            <?php }
                                                else{
                                                    echo number_format($row["thanhtien"], 0,',','.') ;echo" VNĐ";
                                                }
                                            ?>

                                        </td>
                                    </tr>
                                    <?php
                            }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="text-align: center;">
                        <a type="button" style="width: max-content;" class="button2 b-blue rot-135"
                            href="<?php echo BASE_URL?>kythuat/xacnhanphancong/<?php echo $_SESSION['manv_kythuat'];?>/<?php echo $dataview['ketqua'];?>"><i
                                class="fas fa-check"></i> Xác nhận phân công</a>
                    </div>

                    <?php }
                    else if($dataview['ketqua_saupc'] != null){?>
                    <div class="text-center">
                        <img width="60%" src="<?php echo BASE_URL?>public/img/donefix/fix1.gif" alt="">
                    </div>
                    <div style="text-align: center;">
                        <a type="button" style="width: fit-content;" class="button2 b-green rot-135"
                            href="<?php echo BASE_URL?>kythuat/xacnhanhoanthanh/<?php echo $_SESSION['manv_kythuat'];?>/<?php echo $dataview['ketqua_saupc'];?>">
                            <i class="fas fa-check"></i> Nếu đã hoàn thành công việc - Hãy ấn vào đây</a>
                    </div>
                    <?php }
                    else{?>
                    <h2 class="alert alert-success"> <i class="fas fa-check"></i> Thật tốt! Tất cả các công việc đã hoàn
                        thành</h2>
                    <div class="text-center">
                        <a style="width: fit-content;" class="button2 b-blue rot-135"
                            href="<?php echo BASE_URL?>kythuat/index">
                            <i class="fas fa-toolbox"></i>
                            <span>Nhận điều phối</span>
                        </a>
                    </div>

                    <?php }
                    ?>

                </div>
            </div>
            <div class="container-fluid">

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
        <!-- ============================================================================================= -->
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
                    <div class="modal-body">Chọn "Đăng xuất" bên dưới nếu bạn muốn thoát khỏi trang kỹ thuật.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                        <a class="btn btn-primary" href="<?php echo BASE_URL?>kythuat/dangxuat">Đăng xuất</a>
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
        <script src="<?php echo BASE_URL?>public/js/demo/chart-bar-demo.js"></script>
        <script src="<?php echo BASE_URL?>public/js/demo/chart-pie-demo.js"></script>
        <script>

        </script>
</body>

</html>