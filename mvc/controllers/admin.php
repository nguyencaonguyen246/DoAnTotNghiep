<?php 
    class admin extends Controller{
        public $adminmodel;
        public $thongkemodel;
        public $smsmodel;
        public $mailmodel;
        public $restore;
        public function __construct()
        {
            $this->mailmodel = $this -> model ("MailModel");
            $this->smsmodel = $this -> model ("SMSModel");
            $this->adminmodel = $this -> model ("AdminModel");
            $this->thongkemodel = $this -> model ("ThongKeModel");
            $this->restore = $this -> model ("Restore");
            date_default_timezone_set('Asia/Ho_Chi_Minh'); //Chỉnh về múi giờ Việt Nam
            //=====UPDATE KHUYẾN MÃI
            $ngayhientai = date_create(date('d-m-Y')) -> format('Y-m-d');
            $khuyenmaihethan = $this -> adminmodel -> khuyenmaihethan($ngayhientai);
            $this -> adminmodel -> update_khuyenmai($ngayhientai);
            $mang_kmhh = array();
            while($row = mysqli_fetch_array($khuyenmaihethan)){
                $mang_kmhh[] = $row;
            }
            if(!empty($mang_kmhh)){
                for ($i=0; $i < sizeof($mang_kmhh); $i++) { 
                   $this -> adminmodel -> update_khuyenmai_sanpham($mang_kmhh[$i][0]);
                }
            }
        }
        // =====================================ĐĂNG NHẬP & ĐĂNG XUẤT====================
        public function index(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $count1 = mysqli_fetch_array($this -> adminmodel -> count_ycsuachua());
                $count2 = mysqli_fetch_array($this -> adminmodel -> count_ycbaohanh());
                $count3 = mysqli_fetch_array($this -> adminmodel -> count_ycmuahang());
                $this -> viewadmin("admin", [
                    "ycsuachua" => $count1['soluongyeucau'],
                    "ycbaohanh" => $count2['soluongyeucau'],
                    "ycmuahang" => $count3['soluongyeucau'],
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function newHome(){
            $this -> viewadmin("admindangnhap");
        }
        public function admin(){
            $this -> viewadmin("admindangnhap");
        }
        public function admindangnhap(){
            unset($_SESSION["macv"]);
            unset( $_SESSION["tennhanvien"]);
            unset( $_SESSION["macv"]);
            $ketqua_mess = false;
            if(isset($_POST["btndangnhapAdmin"])){
                $tendangnhap = $_POST["tendangnhap"];
                $matkhau_nhap = $_POST["matkhau"];
                $ketqua = $this->adminmodel->dangnhap($tendangnhap);
                if(mysqli_num_rows($ketqua)){
                    while ($row = mysqli_fetch_array($ketqua)){
                        $manv = $row["manv"];
                        $tendangnhap = $row["tendangnhap"];
                        $matkhau = $row["matkhau"];
                        $tennhanvien = $row["tennhanvien"];
                        $sdtnhanvien = $row["sdtnhanvien"];
                        $email = $row["email"];
                        $diachi = $row["diachi"];
                        $macv = $row["macv"];
                    }
                    if(password_verify($matkhau_nhap, $matkhau)){
                        $_SESSION["manv"] =  $manv;
                        $_SESSION["tennhanvien"] =  $tennhanvien;
                        $_SESSION["macv"] =  $macv;
                        $count1 = mysqli_fetch_array($this -> adminmodel -> count_ycsuachua());
                        $count2 = mysqli_fetch_array($this -> adminmodel -> count_ycbaohanh());
                        $count3 = mysqli_fetch_array($this -> adminmodel -> count_ycmuahang());
                        $this ->viewadmin("admin",[
                            "ycsuachua" => $count1['soluongyeucau'],
                            "ycbaohanh" => $count2['soluongyeucau'],
                            "ycmuahang" => $count3['soluongyeucau'],
                        ]);
                    }
                    else{
                        $this -> viewadmin("admindangnhap");
                    }
                }
                else{
                    $this -> viewadmin("admindangnhap");
                }
            }
        }
        public function dangxuat(){
            if(isset($_SESSION["macv"])  && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if($_SESSION["macv"] == 2){
                    unset($_SESSION["macv"]);
                    unset( $_SESSION["tennhanvien"]);
                    unset( $_SESSION["macv"]);
                    $this -> viewtieptan("tieptandangnhap");
                }
                else{
                    unset($_SESSION["macv"]);
                    unset( $_SESSION["tennhanvien"]);
                    unset( $_SESSION["macv"]);
                    $this -> viewadmin("admindangnhap");
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // ---------------------SẢN PHẨM---------------------------//
        public function admin_sanpham(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("SanPham_admin/xemsanpham",
                [
                    "SP_AD"=> $this->adminmodel-> getSP(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function themsanpham(){
            if(isset($_SESSION["macv"])  && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                // view
                $this ->viewadmin("SanPham_admin/themsanpham",
                [
                    "DANHMUC"=> $this->adminmodel-> danhmuc(),
                    "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                    "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                    "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                    "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                ]);
            }
            else{
                $this -> viewadmin("404");
            }
        }
        public function post_themsanpham(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua_them = null;
                if(isset($_POST["themsanpham"])){
                    if($_POST["tensanpham"]!= ""){
                        $tensanpham = $_POST["tensanpham"];

                        $hinhanh = $_FILES['hinhanh']['name'];
                        $hinh_tmp = $_FILES['hinhanh']['tmp_name'];
                    
    
                        $dongia = $_POST["dongia"];
                        $soluongton = $_POST["soluongton"];
                        $thoihanbaohanh = $_POST["thoihanbaohanh"];
                        $madm = $_POST["madm"];
                        $mansx = $_POST["mansx"];
                        $mancc =  $_POST["mancc"];
                        $maloai = $_POST["maloai"];
                        $makhuyenmai = $_POST["makhuyenmai"];
                            
                        $ketqua = $this->adminmodel->themsanpham($tensanpham, $hinhanh, $dongia, $soluongton, $thoihanbaohanh, $maloai, $madm, $mansx, $mancc, $makhuyenmai);
                        
                        if($ketqua){
                            move_uploaded_file($hinh_tmp, './public/img/'.$hinhanh);
                            $this ->viewadmin("SanPham_admin/themsanpham",
                            [
                                "DANHMUC"=> $this->adminmodel-> danhmuc(),
                                "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                                "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                                "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                                "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                                "Ketqua" => $ketqua_them = true,
                            ]);
                        }
                        else{
                            $this -> viewadmin("404",[
                                "Ketqua" => $ketqua_them = false,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/themsanpham",
                        [
                            "DANHMUC"=> $this->adminmodel-> danhmuc(),
                            "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                            "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                            "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                            "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                            "Ketqua" => $ketqua_them,
                        ]);
                    }
                }    
                else{
                    $this -> viewadmin("404");
                }  
            }
            else{
                $this -> viewadmin("404");
            }     
        }
        public function motasanpham($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $test = mysqli_fetch_array($this->adminmodel-> ctsanpham($masp));
                // print_r($test["masp"]);
                $this-> viewadmin("SanPham_admin/motasanpham",[
                    "mota" => $this -> adminmodel -> motasanpham($masp),
                    "MASP_mota"=> $test["masp"],
                ]);
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        public function themmota($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){

                $test = mysqli_fetch_array($this->adminmodel-> ctsanpham($masp));
                $this-> viewadmin("SanPham_admin/themmota",[
                    "MASP_mota"=> $test["masp"],
                ]);
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        public function post_themmota(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST["themmota"])){
                    $masp = $_POST["masp"];
                    $tieude = $_POST["tieude"];
                    $mota = $_POST["mota"];
                    $congdung = $_POST["congdung"];
                    $thongtinthem = $_POST["thongtinthem"];

                    $ketqua = $this -> adminmodel -> themmota($masp, $tieude, $mota, $congdung, $thongtinthem);

                    if($ketqua){
                        $this-> viewadmin("SanPham_admin/motasanpham",[
                            "mota" => $this -> adminmodel -> motasanpham($masp),
                        ]);
                    }
                    else{
                        echo "Thêm thất bại";
                    }
                }
                else{
                    $this -> viewadmin("404");
                } 
            }
            else{
                $this -> viewadmin("404");
            }      
        }
        public function suamota($mamota,$masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $test = mysqli_fetch_array($this->adminmodel-> ctsanpham($masp));
                $this-> viewadmin("SanPham_admin/suamota",[
                    "mota" => $this -> adminmodel -> motasanpham($masp),
                    "MASP_mota"=> $test["masp"],
                ]);
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        public function post_suamota($mamota,$masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST["suamota"])){
                    $tieude = $_POST["tieude"];
                    $mota = $_POST["mota"];
                    $congdung = $_POST["congdung"];
                    $thongtinthem = $_POST["thongtinthem"];

                    $ketqua = $this -> adminmodel -> suamota($mamota,$tieude, $mota, $congdung, $thongtinthem);

                    if($ketqua){
                        $test = mysqli_fetch_array($this->adminmodel-> ctsanpham($masp));
                        $this-> viewadmin("SanPham_admin/motasanpham",[
                            "mota" => $this -> adminmodel -> motasanpham($masp),
                            "MASP_mota"=> $test["masp"],
                        ]);
                    }
                    else{
                        echo "Không sưa được";
                    }
                }
                else{
                    $this -> viewadmin("404");
                } 
            }
            else{
                $this -> viewadmin("404");
            }      
        }
        public function xoasanpham($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel -> xoasanpham($masp);
                if($ketqua){
                    $this -> viewadmin("SanPham_admin/xemsanpham",[
                        "SP_AD"=> $this->adminmodel-> getSP(),
                    ]);
                }
                else{
                    $this ->viewadmin("404");
                }
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        public function chitietsanpham($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
            // view
                $this ->viewadmin("SanPham_admin/suasanpham",
                [
                    "chitiet"=> $this->adminmodel-> ctsanpham($masp),
                    "DANHMUC"=> $this->adminmodel-> danhmuc(),
                    "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                    "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                    "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                    "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                ]);
            }
            else{
                $this -> viewadmin("404");
            }     
        }
        public function chitietsanpham_2($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
            // view
                $this ->viewadmin("SanPham_admin/chitietsanpham",
                [
                    "chitiet"=> $this->adminmodel-> ctsanpham($masp),
                    "DANHMUC"=> $this->adminmodel-> danhmuc(),
                    "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                    "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                    "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                    "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                ]);
            }
            else{
                $this -> viewadmin("404");
            }     
        }
        public function post_suasanpham($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $row = mysqli_fetch_array($this->adminmodel-> ctsanpham($masp));
                // view
                $ketqua_sua = null;
                    if(isset($_POST["suasanpham"])){
                        if($_POST["tensanpham"]!= ""){
                            $tensanpham = $_POST["tensanpham"];


                            $hinh_tmp = $_FILES['hinhanh']['tmp_name'];
                            if(empty($_FILES['hinhanh']['name'])){
                                $hinhanh = $row["hinhanh"];
                            }  
                            else{
                            $hinhanh = $_FILES['hinhanh']['name'];
                            $hinh_tmp = $_FILES['hinhanh']['tmp_name'];
                            move_uploaded_file($hinh_tmp, './public/img/'.$hinhanh);
                            }                     
        
                            $dongia = $_POST["dongia"];
                            $soluongton = $_POST["soluongton"];
                            $thoihanbaohanh = $_POST["thoihanbaohanh"];
                            $madm = $_POST["madm"];
                            $mansx = $_POST["mansx"];
                            $mancc =  $_POST["mancc"];
                            $maloai = $_POST["maloai"];
                            $makhuyenmai = $_POST["makhuyenmai"];
                                
                            $ketqua = $this->adminmodel->suasanpham($masp, $tensanpham, $hinhanh, $dongia, $soluongton, $thoihanbaohanh, $maloai, $madm, $mansx, $mancc, $makhuyenmai);
                            
                            if($ketqua){
                                $this ->viewadmin("SanPham_admin/suasanpham",
                                [
                                    "chitiet"=> $this->adminmodel-> ctsanpham($masp),
                                    "DANHMUC"=> $this->adminmodel-> danhmuc(),
                                    "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                                    "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                                    "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                                    "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                                    "Ketqua" => $ketqua_sua = true,
                                ]);
                            }
                            else{
                                $this -> viewadmin("404",[
                                    "Ketqua" => $ketqua_sua = false,
                                ]);
                            }
                        }
                        else{
                            $this ->viewadmin("SanPham_admin/suasanpham",
                            [
                                "chitiet"=> $this->adminmodel-> ctsanpham($masp),
                                "DANHMUC"=> $this->adminmodel-> danhmuc(),
                                "NHASANXUAT"=> $this->adminmodel-> nhasanxuat(),
                                "NHACUNGCAP"=> $this->adminmodel-> nhacungcap(),
                                "LOAISANPHAM"=> $this->adminmodel-> loaisanpham(),
                                "KHUYENMAI"=> $this->adminmodel-> khuyenmai(),
                            ]);
                        }
                    
                    }    
                    else{
                        $this -> viewadmin("404");
                    } 
            }
            else{
                $this -> viewadmin("404");
            }      
        }
        // ======================DANH MỤC====KHUYẾN MÃI=====LOẠI SẢN PHẨM====NHÀ SẢN XUẤT====NHÀ CUNG CẤP==================
        // ========DANH MỤC
        public function themdanhmuc(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("SanPham_Admin/themdanhmuc",
                [
                    "DANHMUC"=> $this->adminmodel-> danhmuc(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themdanhmuc(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themdanhmuc'])){
                    $ketqua_dm = false;
                    $tendm = $_POST['tendm'];
                    $ketqua = $this -> adminmodel -> themdanhmuc($tendm);
                    if($ketqua){
                        $this ->viewadmin("SanPham_admin/themdanhmuc",
                        [
                            "DANHMUC"=> $this->adminmodel-> danhmuc(),
                            "ketqua_dm" => $ketqua_dm = true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/themdanhmuc",
                        [
                            "DANHMUC"=> $this->adminmodel-> danhmuc(),
                            "ketqua_dm" => $ketqua_dm ,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function suadanhmuc($madm){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                    $this ->viewadmin("SanPham_admin/suadanhmuc",
                    [
                        "chitietdanhmuc" => $this -> adminmodel -> chitietdanhmuc($madm),
                    ]);
                }
                else{
                    $this -> viewadmin("404");
                } 
        }
        public function post_suadanhmuc($madm){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketquasua = false;
                if(isset($_POST['suadanhmuc'])){
                    $tendm = $_POST['tendm'];
                    $ketqua =  $this -> adminmodel -> suadanhmuc($madm,$tendm);
                    if($ketqua){
                        $this ->viewadmin("SanPham_admin/suadanhmuc",
                        [
                            "chitietdanhmuc" => $this -> adminmodel -> chitietdanhmuc($madm),
                            "ketquasua" =>  $ketquasua=true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/suadanhmuc",
                        [
                            "chitietdanhmuc" => $this -> adminmodel -> chitietdanhmuc($madm),
                            "ketquasua" =>  $ketquasua,
                        ]);
                    }
                }
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        // =======NHÀ SẢN XUẤT
        public function themnsx(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("SanPham_Admin/themnhasx",
                [
                    "nsx"=> $this->adminmodel-> nhasanxuat(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themnsx(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themnsx'])){
                    $ketqua_nsx = false;
                    $tennsx = $_POST['tennsx'];
                    $ketqua = $this -> adminmodel -> themnhasx($tennsx);
                    if($ketqua){
                        $this ->viewadmin("SanPham_admin/themnhasx",
                        [
                            "nsx"=> $this->adminmodel->nhasanxuat(),
                            "ketqua_nsx" => $ketqua_nsx = true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/themnhasx",
                        [
                            "nsx"=> $this->adminmodel-> nhasanxuat(),
                            "ketqua_nsx" => $ketqua_nsx ,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function suansx($mansx){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                    $this ->viewadmin("SanPham_admin/suanhasx",
                    [
                        "chitietnsx" => $this -> adminmodel -> chitietnsx($mansx),
                    ]);
                }
                else{
                    $this -> viewadmin("404");
                } 
        }
        public function post_suansx($mansx){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketquasua = false;
                if(isset($_POST['suansx'])){
                    $tennsx = $_POST['tennsx'];
                    $ketqua =  $this -> adminmodel -> suansx($mansx,$tennsx);
                    if($ketqua){
                        $this ->viewadmin("SanPham_admin/suanhasx",
                        [
                            "chitietnsx" => $this -> adminmodel -> chitietnsx($mansx),
                            "ketquasua" =>  $ketquasua=true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/suanhasx",
                        [
                            "chitietnsx" => $this -> adminmodel -> chitietnsx($mansx),
                            "ketquasua" =>  $ketquasua,
                        ]);
                    }
                }
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        // =========LOẠI SẢN PHẨM
        public function loaisanpham(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("SanPham_Admin/themloaisp",
                [
                    "loaisp"=> $this->adminmodel-> loaisanpham(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themloaisp(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themloaisp'])){
                    $ketqua_loai = false;
                    $tenloai = $_POST['tenloai'];
                    $ketqua = $this -> adminmodel -> themloaisp($tenloai);
                    if($ketqua){
                        $this ->viewadmin("SanPham_Admin/themloaisp",
                        [
                            "loaisp"=> $this->adminmodel-> loaisanpham(),
                            "ketqua_loai" => $ketqua_loai = true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/themnhasx",
                        [
                            "loaisp"=> $this->adminmodel-> loaisanpham(),
                            "ketqua_loai" => $ketqua_loai ,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function sualoaisp($maloai){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                    $this ->viewadmin("SanPham_admin/sualoaisp",
                    [
                        "chitietloaisp" => $this -> adminmodel -> chitietloaisp($maloai),
                    ]);
                }
                else{
                    $this -> viewadmin("404");
                } 
        }
        public function post_sualoaisp($maloai){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketquasua = false;
                if(isset($_POST['sualoaisp'])){
                    $tenloai = $_POST['tenloai'];
                    $ketqua =  $this -> adminmodel -> sualoaisp($maloai,$tenloai);
                    if($ketqua){
                        $this ->viewadmin("SanPham_admin/sualoaisp",
                        [
                            "chitietloaisp" => $this -> adminmodel -> chitietloaisp($maloai),
                            "ketquasua" =>  $ketquasua=true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/sualoaisp",
                        [
                            "chitietloaisp" => $this -> adminmodel -> chitietloaisp($maloai),
                            "ketquasua" =>  $ketquasua,
                        ]);
                    }
                }
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        //========NHÀ CUNG CẤP
        public function themncc(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
            // view
                $this ->viewadmin("SanPham_admin/themnhacungcap",
                [
                    "nhacungcap" => $this -> adminmodel -> nhacungcap(),
                ]);
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        public function post_themncc(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themncc'])){
                    $ketqua_ncc = false;
                    $tenncc = $_POST['tenncc'];
                    $sdtncc = $_POST['sdtncc'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    if(strlen($sdtncc) == 10){
                        $ketqua = $this -> adminmodel ->themnhacc($tenncc, $sdtncc, $diachi,$email);
                        if($ketqua){
                            $this ->viewadmin("SanPham_admin/themnhacungcap",
                            [
                                "nhacungcap" => $this -> adminmodel -> nhacungcap(),
                                "ketqua_ncc" => $ketqua_ncc = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("SanPham_admin/themnhacungcap",
                            [
                                "nhacungcap" => $this -> adminmodel -> nhacungcap(),
                                "ketqua_ncc" => $ketqua_ncc ,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/themnhacungcap",
                        [
                            "nhacungcap" => $this -> adminmodel -> nhacungcap(),
                            "ketqua_ncc" => $ketqua_ncc ,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function suanhacungcap($mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                    $this ->viewadmin("SanPham_admin/suanhacungcap",
                    [
                        "chitietncc" => $this -> adminmodel ->  chitietncc($mancc),
                        "mancc" => $mancc,
                    ]);
                }
                else{
                    $this -> viewadmin("404");
                } 
        }
        public function post_suanhacungcap($mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['suancc'])){
                    $ketqua_ncc = false;
                    $tenncc = $_POST['tenncc'];
                    $sdtncc = $_POST['sdtncc'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    if(strlen($sdtncc) == 10){
                        $ketqua = $this -> adminmodel ->suancc($mancc, $tenncc, $sdtncc, $diachi,$email);
                        if($ketqua){
                            $this ->viewadmin("SanPham_admin/suanhacungcap",
                            [
                                "chitietncc" => $this -> adminmodel ->  chitietncc($mancc),
                                "ketqua_ncc" => $ketqua_ncc = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("SanPham_admin/suanhacungcap",
                            [
                                "chitietncc" => $this -> adminmodel ->  chitietncc($mancc),
                                "ketqua_ncc" => $ketqua_ncc ,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/suanhacungcap",
                        [
                            "chitietncc" => $this -> adminmodel ->  chitietncc($mancc),
                            "ketqua_ncc" => $ketqua_ncc ,
                        ]); 
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // ========KHUYẾN MÃI
        public function themkhuyenmai(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
            // view
                $this ->viewadmin("SanPham_admin/themkhuyenmai",
                [
                    "khuyenmai" => $this -> adminmodel -> tatcakhuyenmai(),
                ]);
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        public function post_themkhuyenmai(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themkhuyenmai'])){
                    $ketqua_km = false;
                    $tenkhuyenmai = $_POST['tenkhuyenmai'];
                    $giatrikhuyenmai = $_POST['giatrikhuyenmai'];
                    $thoigianbatdau = $_POST['thoigianbatdau'];
                    $thoigianketthuc = $_POST['thoigianketthuc'];
                    if(strtotime($thoigianbatdau) >= strtotime(date_create(date('Y-m-d')) -> format('Y-m-d'))){
                        if(strtotime($thoigianbatdau) < strtotime($thoigianketthuc)){
                            $ketqua = $this -> adminmodel ->themkhuyenmai($tenkhuyenmai, $giatrikhuyenmai, $thoigianbatdau, $thoigianketthuc);
                            if($ketqua){
                                $this ->viewadmin("SanPham_admin/themkhuyenmai",
                                [
                                    "khuyenmai" => $this -> adminmodel -> tatcakhuyenmai(),
                                    "ketqua_km" => $ketqua_km = true,
                                ]);
                            }
                            else{
                                $this ->viewadmin("SanPham_admin/themkhuyenmai",
                                [
                                    "khuyenmai" => $this -> adminmodel -> tatcakhuyenmai(),
                                    "ketqua_km" => $ketqua_km ,
                                ]);
                            }
                        }
                        else{
                            $this ->viewadmin("SanPham_admin/themkhuyenmai",
                            [
                                "khuyenmai" => $this -> adminmodel -> tatcakhuyenmai(),
                                "ketqua_km" => $ketqua_km ,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/themkhuyenmai",
                        [
                            "khuyenmai" => $this -> adminmodel -> tatcakhuyenmai(),
                            "ketqua_km" => $ketqua_km ,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function suakhuyenmai($makhuyenmai){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                    $this ->viewadmin("SanPham_admin/suakhuyenmai",
                    [
                        "chitietkm" => $this -> adminmodel -> chitietkhuyenmai($makhuyenmai),
                    ]);
                }
                else{
                    $this -> viewadmin("404");
                } 
        }
        public function post_suakhuyenmai($makhuyenmai){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketquasua = false;
                if(isset($_POST['suakhuyenmai'])){
                    $tenkhuyenmai = $_POST['tenkhuyenmai'];
                    $giatrikhuyenmai = $_POST['giatrikhuyenmai'];
                    $thoigianbatdau = $_POST['thoigianbatdau'];
                    $thoigianketthuc = $_POST['thoigianketthuc'];
                    $ketqua =  $this -> adminmodel -> suakhuyenmai($makhuyenmai, $tenkhuyenmai, $giatrikhuyenmai, $thoigianbatdau, $thoigianketthuc);
                    if($ketqua){
                        $this ->viewadmin("SanPham_admin/suakhuyenmai",
                        [
                            "chitietkm" => $this -> adminmodel -> chitietkhuyenmai($makhuyenmai),
                            "ketquasua" =>  $ketquasua=true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("SanPham_admin/suakhuyenmai",
                        [
                            "chitietkm" => $this -> adminmodel -> chitietkhuyenmai($makhuyenmai),
                            "ketquasua" =>  $ketquasua,
                        ]);
                    }
                }
            }
            else{
                $this -> viewadmin("404");
            } 
        }
        // -----------------------NHÂN VIÊN-----------------------------//

        public function xemnhanvien(){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/xemnhanvien",
                [
                    "nhanvien"=> $this->adminmodel-> xemnhanvien(),
                    "CHUCVU" => $this -> adminmodel -> chucvu(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function chitietnhanvien($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/chitietnhanvien",
                [
                    "ctnhanvien"=> $this->adminmodel-> chitietnhanvien($manv),
                    "CHUCVU" => $this -> adminmodel -> chucvu(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function suanhanvien($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/suanhanvien",
                [
                    "suanhanvien"=> $this->adminmodel-> chitietnhanvien($manv),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_suanhanvien($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $ketqua_mess = false;
                if(isset($_POST['suanhanvien'])){
                    $tennhanvien = $_POST['tennhanvien'];
                    $sdtnhanvien = $_POST['sdtnhanvien'];
                    $gioitinh = $_POST['gioitinh'];
                    $ngaysinh = $_POST['ngaysinh'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];

                    $ketqua =  $this->adminmodel-> suanhanvien($manv, $tennhanvien, $sdtnhanvien, $gioitinh, $ngaysinh, $email, $diachi);
                    if($ketqua){
                        $this ->viewadmin("NhanVien/suanhanvien",
                        [
                            "suanhanvien"=> $this->adminmodel-> chitietnhanvien($manv),
                            "Ketqua" => $ketqua_mess = true,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function phanquyen(){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/phanquyen",
                [
                    "nhanvien"=> $this->adminmodel-> xemnhanvien(),
                    "CHUCVU" => $this -> adminmodel -> chucvu(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function chonquyen($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/chonquyen",
                [
                    "ctnhanvien"=> $this->adminmodel-> chitietnhanvien($manv),
                    "CHUCVU" => $this -> adminmodel -> chucvu(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_phanquyen($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $ketqua_phanquyen = false;
                if(isset($_POST['btnphanquyen'])){
                    $macv = $_POST['macv'];
                    $ketqua = $this ->adminmodel->phanquyen($manv, $macv);
                    if($ketqua){
                        $this ->viewadmin("NhanVien/chonquyen",
                        [
                            "ctnhanvien"=> $this->adminmodel-> chitietnhanvien($manv),
                            "CHUCVU" => $this -> adminmodel -> chucvu(),
                            "kqphanquyen" =>  $ketqua_phanquyen = true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("404",[
                            "kqphanquyen" =>  $ketqua_phanquyen,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function themnhanvien(){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/themnhanvien",
                [
                    "nhanvien"=> $this->adminmodel-> xemnhanvien(),
                    "CHUCVU" => $this ->adminmodel -> chucvu(), 
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themnhanvien(){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $ketqua_mess = false;
                if(isset($_POST['themnhanvien'])){
                    $tennhanvien = $_POST['tennhanvien'];
                    $sdtnhanvien = $_POST['sdtnhanvien'];
                    $gioitinh = $_POST['gioitinh'];
                    $ngaysinh = date_create($_POST['ngaysinh'])-> format('Y-m-d');
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $macv = $_POST['macv'];
                    $ketqua =  $this->adminmodel-> themnhanvien($tennhanvien, $sdtnhanvien, $gioitinh, $ngaysinh, $email, $diachi, $macv);
                    if($ketqua){
                        $this ->viewadmin("NhanVien/themnhanvien",
                        [
                            "nhanvien"=> $this->adminmodel-> xemnhanvien(),
                            "CHUCVU" => $this ->adminmodel -> chucvu(),
                            "Ketqua" => $ketqua_mess = true,
                        ]);
                    }
                    else{
                        $this ->viewadmin("NhanVien/themnhanvien",
                        [
                            "nhanvien"=> $this->adminmodel-> xemnhanvien(),
                            "CHUCVU" => $this ->adminmodel -> chucvu(),
                            "Ketqua" => $ketqua_mess,
                        ]);
                    }
                }
               
            }
            else{
                $this ->viewadmin("404");
            }
        }

        public function themtaikhoan($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                $this ->viewadmin("NhanVien/themtaikhoan",
                [
                    "nhanvien"=> $this->adminmodel-> chitietnhanvien($manv), 
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
            
        }
        public function post_themtaikhoan($manv){
            if(isset($_SESSION["macv"]) && $_SESSION["macv"] == 1){
                if($manv != 1){
                    $ketqua_mess = false;
                    if(isset($_POST['themtaikhoan'])){
                        $ktra = $this -> adminmodel ->ktraTendangnhap2($_POST['tendangnhap']);
                        if($ktra){
    
                            if($_POST['matkhau'] == $_POST['re_matkhau']){
                                $tendangnhap = $_POST['tendangnhap'];
                                $matkhau_nhap = $_POST['matkhau'];
                                $matkhau = password_hash($matkhau_nhap, PASSWORD_DEFAULT);
            
                                $ketqua = $this->adminmodel-> themtaikhoan($manv, $tendangnhap, $matkhau);
                                if($ketqua){
                                    $this ->viewadmin("NhanVien/themtaikhoan",
                                    [
                                        "nhanvien"=> $this->adminmodel-> chitietnhanvien($manv), 
                                        "Ketqua" => $ketqua_mess = true,
                                    ]); 
                                }
                            }
                            else{
                                $this ->viewadmin("NhanVien/themtaikhoan",
                                [
                                    "nhanvien"=> $this->adminmodel-> chitietnhanvien($manv), 
                                    "Ketqua" => $ketqua_mess,
                                ]);
                            }
    
                           
                        }
                        else{
                            $this ->viewadmin("NhanVien/themtaikhoan",
                            [
                                "nhanvien"=> $this->adminmodel-> chitietnhanvien($manv), 
                                "Ketqua" => $ketqua_mess,
                            ]);
                        }
                    }
                }
                else{
                    $this ->viewadmin("404");
                }
                    
            }
            else{
                $this ->viewadmin("404");
            }

        }
       
        // ========================SỬA CHỮA===================================
        function loadsanpham(){
            $this ->viewadmin("SuaChua/chonsanpham",
            [
                "SP_AD"=> $this->adminmodel-> getSP(),
            ]);
        }
        function loadkhachhang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_SESSION['suachua'])){
                    if(is_array($_SESSION['suachua']) && sizeof($_SESSION['suachua']) > 0){ 
                        $this ->viewadmin("SuaChua/loadkhachhang",
                        [
                            "kh"=> $this->adminmodel-> loadkhachhang(),
                        ]);
                    }
                    else{
                        $this ->viewadmin("404");
                    }
                }
                else{
                    $this ->viewadmin("404");
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function themgiohang(){
            if(!isset( $_SESSION['suachua'])){
                $_SESSION['suachua'] = [];
            }
            if(isset($_POST['themgiohang'])){
                
                $hinhanh = $_POST['hinhanh'];
                $tensanpham =$_POST['tensanpham'];
                $dongia = $_POST['dongia'];
                $soluong =$_POST['soluong'];
                $masp = $_POST['masp'];
                $row = mysqli_fetch_array($this -> adminmodel -> ctsanpham_giohang($masp));
                if( $_POST['soluong'] > $row['soluongton']){
                    $this ->viewadmin("SuaChua/chonsanpham",
                    [
                        "SP_AD"=> $this->adminmodel-> getSP(),
                        "ketqua_giohang" => "Số lượng kho không đủ!",
                    ]);
                }
                else{
                    $flag = 0; // Dùng cờ dánh dấu sản phẩm đã thêm hay chưa
                    //Kiểm tra trùng sản phẩm trong giỏ hàng
                    for ($i=0; $i < sizeof( $_SESSION['suachua']); $i++) { 
                        if( $_SESSION['suachua'][$i][1] == $tensanpham){
                            $flag = 1; // Cờ bằng 1 nghĩa là sản phẩm đã được thêm
                            $soluong_moi = $soluong + $_SESSION['suachua'][$i][3];
                            if( $soluong_moi > $row['soluongton']){
                                $this ->viewadmin("SuaChua/chonsanpham",
                                [
                                    "SP_AD"=> $this->adminmodel-> getSP(),
                                    "ketqua_giohang" => "Số lượng kho không đủ!",
                                ]);
                            }
                            else{
                                $_SESSION['suachua'][$i][3] = $soluong_moi;
                            }                           
                            $this ->viewadmin("SuaChua/chonsanpham",
                            [
                                "SP_AD"=> $this->adminmodel-> getSP(),
                            ]);
                            break;
                            
                        }
                    }
                    if($flag == 0){
                        $itemgiohang = [$hinhanh, $tensanpham, $dongia, $soluong,$masp];
                        $_SESSION['suachua'][] =  $itemgiohang;
                        $this ->viewadmin("SuaChua/chonsanpham",
                        [
                            "SP_AD"=> $this->adminmodel-> getSP(),
                        ]);
                    }
                }
            }   
        }
        function giohang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("SuaChua/giohang",
                [
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function xoagiohang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['xoagiohang'])){
                    unset($_SESSION['suachua']);
                    $this ->viewadmin("SuaChua/giohang",
                    [
    
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function xoaitem($i){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                array_splice($_SESSION['suachua'],$i,1);
                $this ->viewadmin("SuaChua/giohang",
                [

                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function themhoadon($makh){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                 if(isset($_SESSION['suachua'])){
                    if(is_array($_SESSION['suachua']) && sizeof($_SESSION['suachua']) > 0){ 
                        $this ->viewadmin("SuaChua/themchitiethd",
                        [
                            "makh" => $makh,
                            "kh"=> $this->adminmodel-> ctkhachhang($makh),
        
                        ]);
                    }
                    else{
                        $this ->viewadmin("404");
                    }
                }
                else{
                    $this ->viewadmin("404");
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function post_themhoadon($makh){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_SESSION['suachua'])){
                    if(is_array($_SESSION['suachua']) && sizeof($_SESSION['suachua']) > 0){ 
                        $ngayhientai = date_create(date('d-m-Y'));
                        $ngaylap = $ngayhientai->format('Y-m-d');

                        $ngaygiohientai = date_create(date('d-m-Y H:i:s'));
                        $ngaygiodieuphoi = $ngaygiohientai->format('Y-m-d H:i:s');

                        $ketqua = $this->adminmodel-> themhoadon($makh,$ngaylap,$ngaygiodieuphoi);
                        if($ketqua){
                            $hoadon_moi = mysqli_fetch_array($this ->adminmodel -> laymahd_moi());
                            $mahd = $hoadon_moi['mahd'];
                            $tongtien = 0;
                            $thanhtien = 0;
                            for ($i=0; $i < sizeof($_SESSION['suachua']); $i++) { 
                                $masp = $_SESSION['suachua'][$i][4];
                                $soluong = $_SESSION['suachua'][$i][3];
                                $dongia = $_SESSION['suachua'][$i][2];
                                $thanhtien = $_SESSION['suachua'][$i][3] * $_SESSION['suachua'][$i][2];
                                $tongtien += $thanhtien;
                                $this -> adminmodel -> themchitiethd($masp, $mahd, $soluong, $dongia, $thanhtien);
                            }
                            $ketqua_tongtien = $this -> adminmodel -> update_tongtienhd($mahd, $tongtien);
                            if($ketqua_tongtien){
                                unset($_SESSION['suachua']);
                                if(!isset($_SESSION['suachua'])){
                                    $this ->viewadmin("SuaChua/chonsanpham",
                                    [
                                        "SP_AD"=> $this->adminmodel-> getSP(),
                                        "Ketqua_hoadon" => "Vào ĐIỀU PHỐI để phân công sửa chữa",
                                    ]);
                                }
                            }
                           
                        }
                    }
                    else{
                        $this ->viewadmin("404");
                    }
                }
                else{
                    $this ->viewadmin("404");
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function loadhoadon(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this->viewadmin("SuaChua/loadhoadon",
                [
                    "hoadon_dieuphoi" => $this -> adminmodel -> loadhoadon_dieuphoi(),
                    "hoadon_dieuphoi_datlich" => $this -> adminmodel -> loadhoadon_dieuphoi_datlich(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // ======Yêu cầu sửa chữa online
        function yeucausuachua(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this->viewadmin("BaoHanh/suachuaonline",
                [
                    "hoadon_datlich_suachua" => $this -> adminmodel -> loadhoadon_datlich_suachua(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // ======Yêu cầu bảo hành online
        function yeucaubaohanh(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this->viewadmin("BaoHanh/baohanhonline",
                [
                    "hoadon_dieuphoi_datlich" => $this -> adminmodel -> loadhoadon_dieuphoi_datlich(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function chitietyeucau($mahd){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $row = mysqli_fetch_array($this -> adminmodel -> laytinhtranghd($mahd));
                $tinhtrang = $row['tinhtranghd'];
                $this->viewadmin("BaoHanh/chitietyeucau",
                [
                    "chitietyeucau" => $this -> adminmodel -> chitietyeucau($mahd),
                    "mahd" => $mahd,
                    "tinhtranghd" => $tinhtrang,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function huyyeucau($mahd, $masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel ->  update_tinhtrang_huyyeucau($mahd);
                $ketqua2 = $this -> adminmodel ->  update_tinhtrangcthd_huyyeucau_suachua($mahd,$masp);
                if($ketqua && $ketqua2){
                    $mang = array();
                    $huyyeucau = $this -> adminmodel ->  hoadonhuyyeucau($mahd);
                    while($row = mysqli_fetch_array($huyyeucau)){
                        $mang[] = $row;
                    }
                    for($i = 0; $i < sizeof($mang); $i++){
                        $huyyeucau_sanpham = $this -> adminmodel ->  huyyeucau_masp($mahd,$mang[$i][1]);
                        $row2 = mysqli_fetch_array($huyyeucau_sanpham);
                        $soluong = $row2['soluong'];
                        $ctsp_huyyeucau = $this -> adminmodel -> ctsp_huyyeucau($mang[$i][1]);
                        $row3 = mysqli_fetch_array($ctsp_huyyeucau);
                        $soluongton_sp = $row3['soluongton'];
                        $soluongton = $soluong + $soluongton_sp;
                        $this -> adminmodel -> update_sanpham_huyyeucau($mang[$i][1], $soluongton);
                    }
                    $this->viewadmin("BaoHanh/baohanhonline",
                    [
                        "hoadon_dieuphoi_datlich" => $this -> adminmodel -> loadhoadon_dieuphoi_datlich(),
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function huyyeucau2($mahd){// trả về trang yêu cầu sửa chữa
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel ->  update_tinhtrang_huyyeucau_suachua($mahd);
                if($ketqua){
                    $mang = array();
                    $huyyeucau = $this -> adminmodel ->  hoadonhuyyeucau($mahd);
                    while($row = mysqli_fetch_array($huyyeucau)){
                        $mang[] = $row;
                    }
                    for($i = 0; $i < sizeof($mang); $i++){
                        $huyyeucau_sanpham = $this -> adminmodel ->  huyyeucau_masp($mahd,$mang[$i][1]);
                        $row2 = mysqli_fetch_array($huyyeucau_sanpham);
                        $soluong = $row2['soluong'];
                        $ctsp_huyyeucau = $this -> adminmodel -> ctsp_huyyeucau($mang[$i][1]);
                        $row3 = mysqli_fetch_array($ctsp_huyyeucau);
                        $soluongton_sp = $row3['soluongton'];
                        $soluongton = $soluong + $soluongton_sp;
                        $this -> adminmodel -> update_sanpham_huyyeucau($mang[$i][1], $soluongton);
                    }
                    $this->viewadmin("BaoHanh/suachuaonline",
                    [
                        "hoadon_datlich_suachua" => $this -> adminmodel -> loadhoadon_datlich_suachua(),
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
// ===========================PHÂN CÔNG================================

        public function admin_phancong($mahd){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("PhanCong/phancong",
                [
                    "phancong"=> $this->adminmodel-> nhanvien_pc(),
                    "mahd_dieuphoi" => $mahd,//Truyền mã hóa đơn qua bảng phân công
                    
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
          
        }
        public function phancong_yeucauonl($mahd){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $row = mysqli_fetch_array($this -> adminmodel -> laytinhtranghd($mahd));
                $tinhtrang = $row['tinhtranghd'];
                $this ->viewadmin("PhanCong/phancongyeucauonl",
                [
                    "phancong"=> $this->adminmodel-> nhanvien_pc(),
                    "mahd_dieuphoi" => $mahd,//Truyền mã hóa đơn qua bảng phân công
                    "tinhtranghd" => $tinhtrang,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
          
        }
        public function admin_phancong_mota($manv, $mahd){
            
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("PhanCong/motavieclam",
                [
                    "phancong"=> $this->adminmodel-> ct_nhanvien_pc($manv),
                    "mahd_dieuphoi_mota" => $mahd,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
          
        }
        public function post_admin_phancong($manv, $mahd){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST["xacnhanphancong"])){
                    $motacongviec = $_POST["motacongviec"];
                    
                    $ketqua1 = $this -> adminmodel ->phancong_coviec($manv, $motacongviec);

                    if($ketqua1){
                        $ketqua2 = $this -> adminmodel -> update_hoadon_manv($mahd, $manv);
                        if($ketqua2){
                            $ngaygiohientai = date_create(date('d-m-Y H:i:s'));
                            $ngaygiophancong = $ngaygiohientai->format('Y-m-d H:i:s');
                            $ketqua3 =$this ->  adminmodel ->themlichsuphancong($mahd, $manv, $ngaygiophancong);
                            if($ketqua3){
                                $this->viewadmin("SuaChua/loadhoadon",[
                                    "hoadon_dieuphoi" => $this -> adminmodel -> loadhoadon_dieuphoi(),
                                ]);
                            }
                            else{
                                $this ->viewadmin("404");
                            }
                            
                        }
                        else{
                            $this ->viewadmin("404");
                        }
                        
                    }
                    else{
                        $this ->viewadmin("404");
                    }
                }  
                else{
                    $this ->viewadmin("404");
                }             
            }
            else{
                $this ->viewadmin("404");
            }
          
        }
        public function lichsuphancong(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("SuaChua/lichsuphancong",
                [
                    "lichsu"=> $this->adminmodel->  lichsuphancong(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xemchitietLS($mahd){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
               $ketqua = $this -> adminmodel -> xemchitietLS($mahd);
               if($ketqua){
                    $this -> viewadmin("SuaChua/xemchitietLS",[
                        "chitietLS" =>  $ketqua,    
                    ]);
               }
               else{
                   echo "thất bại";
               }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // ======================================KHÁCH HÀNG=======================================
        public function xemkhachhang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhachHang_admin/xemkhachhang",
                [
                    "khachhang"=> $this->adminmodel->  xemkhachhang(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function themkhachhang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhachHang_admin/themkhachhang",
                [
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function themkhachhang2(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhachHang_admin/themkhachhang",
                [
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themkhachhang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themkhachhang'])){
                    $ketqua_kh = false;
                    $tenkhachhang = $_POST['tenkhachhang'];
                    $sdtkhachhang = $_POST['sdtkhachhang'];
                    if(strlen($sdtkhachhang) == 10){
                        $ketqua = $this -> adminmodel -> themkhachhang($tenkhachhang, $sdtkhachhang);
                        if($ketqua){
                            $txtsms = "Capcuudienthoai.vn xin chao!, Moi quy khach su dung Taikhoan: '.$sdtkhachhang.' _ Matkhau: 1 de dang nhap website";
                            $this ->smsmodel -> SendSMS($sdtkhachhang, $txtsms);
                            $this ->viewadmin("KhachHang_admin/themkhachhang",
                            [
                                "ketqua_kh" =>$ketqua_kh = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("KhachHang_admin/themkhachhang",
                            [
                                "ketqua_kh" =>$ketqua_kh,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("KhachHang_admin/themkhachhang",
                        [
                            "ketqua_kh" =>$ketqua_kh,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themkhachhang2(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['themkhachhang2'])){
                    $ketqua_kh = false;
                    $tenkhachhang = $_POST['tenkhachhang'];
                    $sdtkhachhang = $_POST['sdtkhachhang'];
                    if(strlen($sdtkhachhang) == 10){
                        $ketqua = $this -> adminmodel -> themkhachhang($tenkhachhang, $sdtkhachhang);
                        if($ketqua){
                            $txtsms = "Capcuudienthoai.vn xin chao!, Moi quy khach su dung Taikhoan: '.$sdtkhachhang.' _ Matkhau: 1 de dang nhap website";
                            $this ->smsmodel -> SendSMS($sdtkhachhang, $txtsms);
                            $this ->viewadmin("SuaChua/loadkhachhang",
                            [
                                "kh"=> $this->adminmodel-> loadkhachhang(),
                                "ketqua_kh" =>$ketqua_kh = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("SuaChua/loadkhachhang",
                            [
                                "kh"=> $this->adminmodel-> loadkhachhang(),
                                "ketqua_kh" =>$ketqua_kh ,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("SuaChua/loadkhachhang",
                        [
                            "kh"=> $this->adminmodel-> loadkhachhang(),
                            "ketqua_kh" =>$ketqua_kh ,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function suakhachhang($makh){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhachHang_admin/suakhachhang",
                [
                    "thongtin" => $this -> adminmodel -> xemchitietkhachhang($makh),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_suakhachhang($makh){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['suakhachhang'])){
                    $ketqua_kh = false;
                    $tenkhachhang = $_POST['tenkhachhang'];
                    $sdtkhachhang = $_POST['sdtkhachhang'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $ngaysinh = date_create($_POST['ngaysinh']) -> format('Y-m-d');
                
                    if(strlen($sdtkhachhang) == 10){
                        $ketqua = $this -> adminmodel -> suakhachhang($makh, $tenkhachhang, $sdtkhachhang, $diachi, $email, $ngaysinh);
                        if($ketqua){
                            $this ->viewadmin("KhachHang_admin/suakhachhang",
                            [
                                "thongtin" => $this -> adminmodel -> xemchitietkhachhang($makh),
                                "ketqua_kh" =>$ketqua_kh = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("KhachHang_admin/suakhachhang",
                            [
                                "thongtin" => $this -> adminmodel -> xemchitietkhachhang($makh),
                                "ketqua_kh" =>$ketqua_kh,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("KhachHang_admin/suakhachhang",
                        [
                            "thongtin" => $this -> adminmodel -> xemchitietkhachhang($makh),
                            "ketqua_kh" =>$ketqua_kh,
                        ]);
                    }
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xoakhachhang($makh){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel -> xoakhachhang($makh);
                if($ketqua){
                    $this ->viewadmin("KhachHang_admin/xemkhachhang",
                    [
                        "khachhang"=> $this->adminmodel->  xemkhachhang(),
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // =================================BẢO HÀNH========================================
        public function xembaohanh(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("BaoHanh/xembaohanh",
                [
                    "baohanh" => $this -> adminmodel -> xembaohanh(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function chitietbaohanh($masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel -> chitietbaohanh($masp);
                if($ketqua){
                    $this ->viewadmin("BaoHanh/chitietbaohanh",
                    [
                        "ctbaohanh" => $ketqua,
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function post_baohanh($macthd, $soluong, $makh, $ngaylap,$masp,$mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua_bh = false;
                $slsp = mysqli_fetch_array($this -> adminmodel ->soluongsanpham($masp));
                if($slsp['soluongton'] > 0){
                    if(($soluong - 1) <= 0){
                        // $this -> adminmodel ->  delete_cthd($macthd);
                        $this -> adminmodel -> update_cthd_tinhtrang($macthd);
                        $ngaygiohientai = date_create(date('d-m-Y H:i:s'));
                        $ngaygiodieuphoi = $ngaygiohientai->format('Y-m-d H:i:s');
                        $ketqua = $this ->adminmodel -> themhoadon_baohanh($makh, $ngaylap, $ngaygiodieuphoi);
                        if($ketqua){
                            $ketqua2 = $this ->adminmodel -> laymahd_moi_baohanh();
                            if($ketqua2){
                                $row = mysqli_fetch_array($ketqua2);
                                $mahd = $row['mahd'];
                                $ketqua3 = $this ->adminmodel ->themchitiethd_baohanh($masp, $mahd);
                                if($ketqua3 ){
                                   
                                    if($this ->adminmodel -> ktrasanphamloi($mancc, $masp)){
                                        $sanphamloi =  mysqli_fetch_array($this ->adminmodel -> sanphamloi($masp));
                                        $soluong_sploi = $sanphamloi['soluong'] + 1;
                                        $this ->adminmodel ->  updatesanphamloi($masp, $soluong_sploi);
                                        $this ->viewadmin("BaoHanh/xembaohanh",
                                        [
                                            "baohanh" => $this -> adminmodel -> xembaohanh(),
                                            "ketquaBH" =>  $ketqua_bh = true,
                                        ]);
                                    }
                                    else{
                                        $this ->adminmodel ->themsanphamloi($masp,$mancc, 1);
                                        $this ->viewadmin("BaoHanh/xembaohanh",
                                        [
                                            "baohanh" => $this -> adminmodel -> xembaohanh(),
                                            "ketquaBH" =>  $ketqua_bh = true,
                                        ]);
                                    }       
                                }
                            }
                        }
                    }
                    else{
                        $soluong = $soluong - 1;
                        $this -> adminmodel -> update_cthd($macthd, $soluong);
                        $ngaygiohientai = date_create(date('d-m-Y H:i:s'));
                        $ngaygiodieuphoi = $ngaygiohientai->format('Y-m-d H:i:s');
                        $ketqua = $this ->adminmodel -> themhoadon_baohanh($makh, $ngaylap, $ngaygiodieuphoi);
                        if($ketqua){
                            $ketqua2 = $this ->adminmodel -> laymahd_moi_baohanh();
                            if($ketqua2){
                                $row = mysqli_fetch_array($ketqua2);
                                $mahd = $row['mahd'];
                                $ketqua3 = $this ->adminmodel ->themchitiethd_baohanh($masp, $mahd);
                                if($ketqua3 ){
                                    if($this ->adminmodel -> ktrasanphamloi($mancc, $masp)){
                                        $sanphamloi =  mysqli_fetch_array($this ->adminmodel -> sanphamloi($masp));
                                        $soluong_sploi = $sanphamloi['soluong'] + 1;
                                        $this ->adminmodel ->  updatesanphamloi($masp, $soluong_sploi);
                                        $this ->viewadmin("BaoHanh/xembaohanh",
                                        [
                                            "baohanh" => $this -> adminmodel -> xembaohanh(),
                                            "ketquaBH" =>  $ketqua_bh = true,
                                        ]);
                                    }
                                    else{
                                        $this ->adminmodel ->themsanphamloi($masp,$mancc, 1);
                                        $this ->viewadmin("BaoHanh/xembaohanh",
                                        [
                                            "baohanh" => $this -> adminmodel -> xembaohanh(),
                                            "ketquaBH" =>  $ketqua_bh = true,
                                        ]);
                                    }               
                                  
                                }
                            }
                        }
                    }
                }
                else{
                    $this ->viewadmin("BaoHanh/xembaohanh",
                    [
                        "baohanh" => $this -> adminmodel -> xembaohanh(),
                        "ketquaBH" =>  $ketqua_bh,
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }

        // ===================================KHO HÀNG========================================
        // =============Trả hàng
        public function xemnhacungcap(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhoHang/trahang",
                [
                    "ncc" => $this -> adminmodel -> xemnhacc_sanphamloi(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xemsanphamloi($mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhoHang/dssploi",
                [
                    "sploi" => $this -> adminmodel -> xemsanphamloi($mancc),
                    "mancc" => $mancc,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xemphieutra($mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemchitietncc($mancc);
                $row = mysqli_fetch_array($nhacc);
                $tenncc = $row['tenncc'];
                $this ->viewadmin("KhoHang/phieutrahang",
                [
                    "sploi" => $this -> adminmodel -> xemsanphamloi($mancc),
                    "mancc" => $mancc,
                    "tenncc" => $tenncc,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themphieutra($manv,$mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemchitietncc($mancc);
                $row = mysqli_fetch_array($nhacc);
                $tenncc = $row['tenncc'];

                $ngayhientai = date_create(date('d-m-Y'));
                $ngaylap = $ngayhientai->format('Y-m-d');
                $ketquatra = false;
                $ketqua = $this -> adminmodel -> themphieutra($ngaylap, $manv, $mancc);
                if($ketqua){
                    $ketqua2 = $this -> adminmodel -> laymaphieutra_new();
                    if($ketqua2){
                        $row2 = mysqli_fetch_array($ketqua2);
                        $mapt = $row2['mapt'];
                        $ketqua3 = $this -> adminmodel -> xemsanphamloi($mancc);
                        $mang = array();
                        while($row3 = mysqli_fetch_array($ketqua3)){
                            $mang[] = $row3;
                        }
                        for($i = 0; $i < sizeof($mang); $i++){
                            $mapt = $row2['mapt'];
                            $masp = $mang[$i][0];
                            $soluong = $mang[$i][3];
                            $this -> adminmodel -> themchitietphieutra($mapt, $masp, $soluong);
                        }
                        $this -> adminmodel -> xoasanphamloi($mancc);//Xóa ở bảng sản phẩm lỗi

                        $this ->viewadmin("KhoHang/trahang",
                        [
                            "ncc" => $this -> adminmodel -> xemnhacc_sanphamloi(),
                            "sploi" => $this -> adminmodel -> xemsanphamloi($mancc),
                            "mancc" => $mancc,
                            "tenncc" => $tenncc,
                            "ketqua_tra" => $ketquatra = true,
                        ]);                    
                    }
                    else{
                        $this ->viewadmin("KhoHang/trahang",
                        [
                            "ncc" => $this -> adminmodel -> xemnhacc_sanphamloi(),
                            "sploi" => $this -> adminmodel -> xemsanphamloi($mancc),
                            "mancc" => $mancc,
                            "tenncc" => $tenncc,
                            "ketqua_tra" => $ketquatra,
                        ]);         
                    }
                }
                else{
                    $this ->viewadmin("KhoHang/trahang",
                    [
                        "ncc" => $this -> adminmodel -> xemnhacc_sanphamloi(),
                        "sploi" => $this -> adminmodel -> xemsanphamloi($mancc),
                        "mancc" => $mancc,
                        "tenncc" => $tenncc,
                        "ketqua_tra" => $ketquatra,
                    ]);         
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xemdanhsachphieutra(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhoHang/dsphieutra",
                [
                    "dsphieutra" => $this -> adminmodel -> xemdanhsachphieutra(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function chitietphieutra($mapt, $mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemnhacc($mancc);
                $row = mysqli_fetch_array($nhacc);
                $tenncc = $row['tenncc'];
                $this ->viewadmin("KhoHang/chitietphieutra",
                [
                    "ctpt" => $this -> adminmodel -> chitietphieutra($mapt),
                    "ten" => $tenncc,
                    "mapt" => $mapt,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function nhaphang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                unset($_SESSION['danhsachnhap']);
                $this ->viewadmin("KhoHang/nhaphang",
                [
                    "ncc" => $this -> adminmodel -> xemnhacc_sanpham(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xemdssanpham($mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $_SESSION['mancc'] = $mancc;
                $this ->viewadmin("KhoHang/dssptheonhacc",
                [
                    "dssp" => $this -> adminmodel -> xemdssanpham($mancc),
                    "mancc" => $mancc,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function nhapsanpham($mancc){
            
            if(!isset( $_SESSION['danhsachnhap'])){
                $_SESSION['danhsachnhap'] = [];
            }
            if(isset($_POST['themsanpham'])){
                $tensanpham =$_POST['tensanpham'];
                $soluong =$_POST['soluong'];
                $masp = $_POST['masp'];
                $flag = 0; // Dùng cờ dánh dấu sản phẩm đã thêm hay chưa

                //Kiểm tra trùng sản phẩm trong giỏ hàng
                for ($i=0; $i < sizeof( $_SESSION['danhsachnhap']); $i++) { 
                    if( $_SESSION['danhsachnhap'][$i][0] == $tensanpham){
                        $flag = 1; // Cờ bằng 1 nghĩa là sản phẩm đã được thêm
                        $soluong_moi = $soluong + $_SESSION['danhsachnhap'][$i][1];
                        $_SESSION['danhsachnhap'][$i][1] = $soluong_moi;
                        $this ->viewadmin("KhoHang/dssptheonhacc",
                        [
                            "dssp" => $this -> adminmodel -> xemdssanpham($mancc),
                            "mancc" => $mancc,
                        ]);
                        break;
                        
                    }
                }
                if($flag == 0){
                    $itemdondat = [$tensanpham,$soluong,$masp];
                    $_SESSION['danhsachnhap'][] =  $itemdondat;
                    // unset( $_SESSION['danhsachnhap']);
                    $this ->viewadmin("KhoHang/dssptheonhacc",
                    [
                        "dssp" => $this -> adminmodel -> xemdssanpham($mancc),
                        "mancc" => $mancc,
                    ]);
                }

               
            }
        }
        function sanphamdat(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhoHang/sanphamdat",
                [
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function phieudathang(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemnhacc( $_SESSION['mancc']);
                $row = mysqli_fetch_array($nhacc);
                $tenncc = $row['tenncc'];
                $this ->viewadmin("KhoHang/phieudathang",
                [
                    "tenncc" => $tenncc ,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function xoasanpham_dondat(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['xoasanpham_dondat'])){
                    unset($_SESSION['danhsachnhap']);
                    $this ->viewadmin("KhoHang/sanphamdat",
                    [
    
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function xoasp($i){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                array_splice($_SESSION['danhsachnhap'],$i,1);
                $this ->viewadmin("KhoHang/sanphamdat",
                [

                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_themphieudat($manv,$mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_SESSION['danhsachnhap'])){
                    if(is_array($_SESSION['danhsachnhap']) && sizeof($_SESSION['danhsachnhap']) > 0){ 
                        $nhacc = $this -> adminmodel -> xemnhacc($mancc);
                        $row = mysqli_fetch_array($nhacc);
                        $tenncc = $row['tenncc'];
    
                        $ngayhientai = date_create(date('d-m-Y'));
                        $ngaylap = $ngayhientai->format('Y-m-d');
                        $ketquadat = false;
                        $ketqua = $this -> adminmodel -> themphieudathang($ngaylap, $manv, $mancc);
                        if($ketqua){
                            $ketqua2 = $this -> adminmodel -> laymaphieudat_new();
                            if($ketqua2){
                                $row2 = mysqli_fetch_array($ketqua2);
                                $mapd = $row2['mapd'];
                                for ($i=0; $i < sizeof($_SESSION['danhsachnhap']) ; $i++) { 
                                    $masp = $_SESSION['danhsachnhap'][$i][2];
                                    $soluong = $_SESSION['danhsachnhap'][$i][1];
                                    $this -> adminmodel -> themchitietphieudat($mapd, $masp, $soluong);
                                }
                                unset($_SESSION['danhsachnhap']);
                                $this ->viewadmin("KhoHang/dssptheonhacc",
                                [
                                    "dssp" => $this -> adminmodel -> xemdssanpham($mancc),
                                    "mancc" => $mancc,
                                    "ketquadat" => $ketquadat = true,
                                ]);          
                            }
                            else{
                                $this ->viewadmin("KhoHang/dssptheonhacc",
                                [
                                    "dssp" => $this -> adminmodel -> xemdssanpham($mancc),
                                    "mancc" => $mancc,
                                    "ketquadat" => $ketquadat,
                                ]); 
                            }
                        }
                        else{
                            $this ->viewadmin("KhoHang/dssptheonhacc",
                            [
                                "dssp" => $this -> adminmodel -> xemdssanpham($mancc),
                                "mancc" => $mancc,
                                "ketquadat" => $ketquadat,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("404");
                    }
                }
                else{
                    $this ->viewadmin("404");
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xemdanhsachphieudat(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhoHang/dsphieudathang",
                [
                    "dsphieudat" => $this -> adminmodel -> xemdsphieudat(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function chitietphieudat($mapd, $mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemnhacc($mancc);
                $row = mysqli_fetch_array($nhacc);
                $mancc = $row['mancc'];
                $tenncc = $row['tenncc'];
                $this ->viewadmin("KhoHang/chitietphieudat",
                [
                    "ctpd" => $this -> adminmodel -> chitietphieudat($mapd),
                    "ten" => $tenncc,
                    "mapd" => $mapd,
                    "mancc" => $mancc,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function phieunhaphang($mapd, $mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemnhacc($mancc);
                $row = mysqli_fetch_array($nhacc);
                $tenncc = $row['tenncc'];
                $mancc = $row['mancc'];
                $this ->viewadmin("KhoHang/xemphieunhap",
                [
                    "ctpn" => $this -> adminmodel -> chitietphieudat($mapd),
                    "ten" => $tenncc,
                    "mapd" => $mapd,
                    "mancc" => $mancc,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function taophieunhap($mapd, $mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketquatao = false;
                if(isset($_POST['taophieunhap'])){
                    $ngayhientai = date_create(date('d-m-Y'));
                    $ngaylap = $ngayhientai->format('Y-m-d');

                    $manv = $_SESSION["manv"];
                    $ketqua = $this ->adminmodel -> taophieunhap($mapd, $ngaylap, $manv, $mancc);
                    if($ketqua){
                        $ketqua2 = $this ->adminmodel -> laymaphieunhap_new();
                        if($ketqua2){
                            $row = mysqli_fetch_array($ketqua2);
                            $mapn = $row['mapn'];
                            foreach($_POST['soluong'] as $id => $soluong){
                                $masp = $id;
                                $this ->adminmodel -> themchitietphieunhap($mapn, $masp, $soluong); 
                            }
                            $tongtien = 0;
                            foreach($_POST['gianhap'] as $id => $gianhap){
                                $masp = $id;
                                $this ->adminmodel -> update_gianhap_ctpn($mapn, $masp, $gianhap); 
                                $chitietphieunhap =  $this ->adminmodel -> chitietphieunhap($mapn, $masp);
                                $row2 = mysqli_fetch_array($chitietphieunhap);
                                $thanhtien = $row2['gianhap'] * $row2['soluong'];
                                $this ->adminmodel -> update_thanhtien_ctpn($mapn,$masp, $thanhtien); 
                                $tongtien += $thanhtien;
                                $this ->adminmodel ->  update_tongtien_phieunhap($mapn, $tongtien);
                                //Nhập kho
                                $ctsp_nhapkho =  $this ->adminmodel -> ctsp_nhapkho($masp);
                                $laysoluong =  mysqli_fetch_array($ctsp_nhapkho);
                                $soluongton = $laysoluong['soluongton'] + $row2['soluong']; // số lượng tồn mới  =  số lượng tồn cũ + Số lượng nhập
                                $this ->adminmodel -> nhapkho($masp, $soluongton);
                            }
                            $this ->adminmodel -> update_phieudat($mapd);
                            $this ->viewadmin("KhoHang/dsphieudathang",
                            [
                                "dsphieudat" => $this -> adminmodel -> xemdsphieudat(),
                                "ketquatao" => $ketquatao = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("KhoHang/dsphieudathang",
                            [
                                "dsphieudat" => $this -> adminmodel -> xemdsphieudat(),
                                "ketquatao" => $ketquatao,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("KhoHang/dsphieudathang",
                        [
                            "dsphieudat" => $this -> adminmodel -> xemdsphieudat(),
                            "ketquatao" => $ketquatao,
                        ]);
                    }
               }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function dsphieunhap(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("KhoHang/danhsachphieunhap",
                [
                    "dspn" => $this -> adminmodel -> danhsachphieunhap(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        function chitietphieunhap($mapn, $mancc){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $nhacc = $this -> adminmodel -> xemnhacc($mancc);
                $row = mysqli_fetch_array($nhacc);
                $tenncc = $row['tenncc'];

                $hoadon = $this -> adminmodel -> xemtongtien_nhanvien_phieunhap($mapn);
                $row2 = mysqli_fetch_array($hoadon);
                $tongtien = $row2['tongtien'];
                $tennhanvien = $row2['tennhanvien'];

                $this ->viewadmin("KhoHang/chitietphieunhap",
                [
                    "ctpn" => $this -> adminmodel -> chitietphieunhap_xem($mapn),
                    "tenncc" =>  $tenncc,
                    "tongtien" => $tongtien,
                    "tennhanvien" => $tennhanvien,
                    "mapn" => $mapn,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // =====================ĐƠN HÀNG
        public function chuaxacnhan(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("DonHang/chuaxacnhan",
                [
                    "DH_chuaxacnhan" => $this -> adminmodel -> chuaxacnhan(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function chitietdonhang($mahdonl){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $row = mysqli_fetch_array($this -> adminmodel -> donhang($mahdonl));
                $sdtkhachhang = $row['sdtkhachhang'];
                $diachi = $row['iddiachi'];
                $tongtienhd = $row['tongtien'];
                $tinhtrang = $row['tinhtrangdh'];
                
                $this ->viewadmin("DonHang/chitietdon",
                [
                    "CTDH" => $this -> adminmodel -> chitietdonhang($mahdonl),
                    "mahdonl" => $mahdonl,
                    "sdtkhachhang" => $sdtkhachhang,
                    "diachi" => $diachi,
                    "tongtien" => $tongtienhd,
                    "tinhtrang" => $tinhtrang,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xoactdh($macthdol, $mahdonl,$masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $rowcthd = mysqli_fetch_array($this -> adminmodel -> ctsp_cthd($masp));
                $rowctsp_sl = mysqli_fetch_array($this -> adminmodel ->ctsp_soluong_cthd($macthdol, $masp));
                $soluong_sanpham = $rowcthd['soluongton'];
                $soluong_dat = $rowctsp_sl['soluong'];
                $soluongton =  $soluong_sanpham +  $soluong_dat;
                $ketqua = $this -> adminmodel -> xoactdh($macthdol);
                if($ketqua){
                    $this -> adminmodel -> update_sanpham_huydon($masp, $soluongton);
                    $mang_ctdh = array();
                    $row2 = $this -> adminmodel -> chitietdonhang2($mahdonl);
                    while($ctdh = mysqli_fetch_array($row2)){
                        $mang_ctdh[] = $ctdh;
                    }
                    $row = mysqli_fetch_array($this -> adminmodel -> donhang($mahdonl));
                    $tongtien = 0;
                    for($i = 0; $i < sizeof($mang_ctdh); $i++){
                        $tongtien += $mang_ctdh[$i][0];
                    }
                    $this -> adminmodel -> update_tongtien_hoadon_onl($mahdonl,$tongtien);
                    $tongtienhd = $tongtien;
                    $sdtkhachhang = $row['sdtkhachhang'];
                    $diachi = $row['iddiachi'];
                    $tinhtrang = $row['tinhtrangdh'];

                    $this ->viewadmin("DonHang/chitietdon",
                    [
                        "CTDH" => $this -> adminmodel -> chitietdonhang($mahdonl),
                        "mahdonl" => $mahdonl,
                        "sdtkhachhang" => $sdtkhachhang,
                        "diachi" => $diachi,
                        "tongtien" => $tongtienhd,
                        "mahdonl" =>$mahdonl,
                        "tinhtrang" => $tinhtrang,
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function capnhatdonhang($macthdol, $mahdonl,$masp){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                if(isset($_POST['capnhat'])){
                    $soluong = $_POST['soluong'];
                    if($soluong > 0){
                        $rowctsp_sl = mysqli_fetch_array($this -> adminmodel ->ctsp_soluong_cthd($macthdol, $masp));
                        $soluong_dat = $rowctsp_sl['soluong'];
                        if($soluong > $soluong_dat){
                            $rowcthd = mysqli_fetch_array($this -> adminmodel -> ctsp_cthd($masp));
                            $soluong_sanpham = $rowcthd['soluongton'];
                            $soluongton =  $soluong_sanpham - ($soluong - $soluong_dat);
                            $this -> adminmodel -> update_sanpham_huydon($masp, $soluongton);
                        }
                        else if($soluong < $soluong_dat){
                            $rowcthd = mysqli_fetch_array($this -> adminmodel -> ctsp_cthd($masp));
                            $soluong_sanpham = $rowcthd['soluongton'];
                            $soluongton =  $soluong_sanpham + ($soluong_dat - $soluong);
                            $this -> adminmodel -> update_sanpham_huydon($masp, $soluongton);
                        }
                        $ketqua = $this -> adminmodel -> update_soluong_cthd($macthdol,$soluong);
                        if($ketqua){
                            $mang_ctdh = array();
                            $row2 = mysqli_fetch_array($this -> adminmodel -> chitietdonhang3($macthdol));
                            $thanhtien = $soluong * ($row2['dongia'] - ($row2['dongia']*$row2['giatrikhuyenmai']/100));  
                            $ketqua2 = $this -> adminmodel -> update_thanhtien_cthd($macthdol,$thanhtien);
                            if($ketqua2){
                                $row = mysqli_fetch_array($this -> adminmodel -> donhang($mahdonl));
                                $row3 = $this -> adminmodel -> chitietdonhang2($mahdonl);
                                while($ctdh = mysqli_fetch_array($row3)){
                                    $mang_ctdh[] = $ctdh;
                                }
                                $tongtien = 0;
                                for($i = 0; $i < sizeof($mang_ctdh); $i++){
                                    $tongtien += $mang_ctdh[$i][0];
                                }
                                $this -> adminmodel -> update_tongtien_hoadon_onl($mahdonl,$tongtien);
                                $tongtienhd =  $tongtien;
                                $sdtkhachhang = $row['sdtkhachhang'];
                                $diachi = $row['iddiachi'];
                                $tinhtrang = $row['tinhtrangdh'];
                                $this ->viewadmin("DonHang/chitietdon",
                                [
                                    "CTDH" => $this -> adminmodel -> chitietdonhang($mahdonl),
                                    "mahdonl" => $mahdonl,
                                    "sdtkhachhang" => $sdtkhachhang,
                                    "diachi" => $diachi,
                                    "tongtien" => $tongtienhd,
                                    "mahdonl" =>$mahdonl,
                                    "tinhtrang" => $tinhtrang,
                                ]);
                            }
                        }
                    }
                    else{
                        $row = mysqli_fetch_array($this -> adminmodel -> donhang($mahdonl));
                        $sdtkhachhang = $row['sdtkhachhang'];
                        $diachi = $row['iddiachi'];
                        $tongtienhd = $row['tongtien'];
                        $tinhtrang = $row['tinhtrangdh'];
                        
                        $this ->viewadmin("DonHang/chitietdon",
                        [
                            "CTDH" => $this -> adminmodel -> chitietdonhang($mahdonl),
                            "mahdonl" => $mahdonl,
                            "sdtkhachhang" => $sdtkhachhang,
                            "diachi" => $diachi,
                            "tongtien" => $tongtienhd,
                            "mahdonl" =>$mahdonl,
                            "tinhtrang" => $tinhtrang,
                        ]);
                    }
                }               
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xacnhandon($mahdonl){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel ->  update_tinhtrang_xacnhan($mahdonl);
                if($ketqua){
                    $this ->viewadmin("DonHang/chuaxacnhan",
                    [
                        "DH_chuaxacnhan" => $this -> adminmodel -> chuaxacnhan(),
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function huydonhang($mahdonl){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel ->  update_tinhtrang_huydon($mahdonl);
                if($ketqua){
                    $mang = array();
                    $hoadonhuy = $this -> adminmodel ->  hoadonhuy($mahdonl);
                    while($row = mysqli_fetch_array($hoadonhuy)){
                        $mang[] = $row;
                    }
                    for($i = 0; $i < sizeof($mang); $i++){
                        $hoadonhuy_sanpham = $this -> adminmodel ->  hoadonhuy_masp($mahdonl,$mang[$i][1]);
                        $row2 = mysqli_fetch_array($hoadonhuy_sanpham);
                        $soluong = $row2['soluong'];
                        $ctsp_huydon = $this -> adminmodel -> ctsp_huydon($mang[$i][1]);
                        $row3 = mysqli_fetch_array($ctsp_huydon);
                        $soluongton_sp = $row3['soluongton'];
                        $soluongton = $soluong + $soluongton_sp;
                        $this -> adminmodel -> update_sanpham_huydon($mang[$i][1], $soluongton);
                    }
                    $this ->viewadmin("DonHang/chuaxacnhan",
                    [
                        "DH_chuaxacnhan" => $this -> adminmodel -> chuaxacnhan(),
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function daxacnhan(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("DonHang/daxacnhan",
                [
                    "DH_chuaxacnhan" => $this -> adminmodel -> daxacnhan(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function dahuy(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("DonHang/dahuy",
                [
                    "DH_chuaxacnhan" => $this -> adminmodel -> dahuy(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function dahoanthanh(){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("DonHang/dahoanthanh",
                [
                    "DH_chuaxacnhan" => $this -> adminmodel -> dahoanthanh(),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xacnhandon_hoanthanh($mahdonl){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $ketqua = $this -> adminmodel ->  update_tinhtrang_hoanthanh($mahdonl);
                if($ketqua){
                    $this ->viewadmin("DonHang/daxacnhan",
                    [
                        "DH_chuaxacnhan" => $this -> adminmodel -> daxacnhan(),
                    ]);
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }

        // ==================XUẤT FILE PDF==========================
        public function xuatpdfphieunhap($mapn){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                
                $row = mysqli_fetch_array($this -> adminmodel -> phieunhap_pdf($mapn));
                $tenncc = $row['tenncc'];
                $diachi = $row['diachincc'];
                $tongtien = $row['tongtien'];
                $tennhanvien = $row['tennhanvien'];
                $ngay = date_create($row['ngaylap']) -> format('d'); 
                $thang = date_create($row['ngaylap']) -> format('m'); 
                $nam = date_create($row['ngaylap']) -> format('Y'); 
                $this ->viewadmin("PDF/phieunhapkho",
                [
                    "chitietphieunhap" => $this -> adminmodel ->  chitietphieunhap_pdf($mapn),
                    "tennhanvien" => $tennhanvien,
                    "tenncc" => $tenncc,
                    "tongtien" => $tongtien,
                    "diachi" => $diachi,
                    "ngay" => $ngay,
                    "thang" => $thang,
                    "nam" => $nam,
                ]);
                
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xuatpdfphieutra($mapt){
            if(isset($_SESSION["macv"]) && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                
                $row = mysqli_fetch_array($this -> adminmodel -> phieutra_pdf($mapt));
                $tenncc = $row['tenncc'];
                $diachi = $row['diachincc'];
                $sdtncc =  $row['sdtncc'];
                $email =  $row['email'];
                $tennhanvien = $row['tennhanvien'];
                $phut = date_create(date('d-m-Y H:i:s')) -> format('i'); 
                $gio = date_create(date('d-m-Y H:i:s')) -> format('H'); 
                $ngay = date_create(date('d-m-Y')) -> format('d'); 
                $thang = date_create(date('d-m-Y')) -> format('m'); 
                $nam = date_create(date('d-m-Y')) -> format('Y'); 
                $this ->viewadmin("PDF/phieutrahang",
                [
                    "chitietphieutra" => $this -> adminmodel ->  chitietphieutra_pdf($mapt),
                    "tennhanvien" => $tennhanvien,
                    "tenncc" => $tenncc,
                    "sdtncc" => $sdtncc,
                    "diachi" => $diachi,
                    "email" => $email,
                    "phut" => $phut,
                    "gio" => $gio,
                    "ngay" => $ngay,
                    "thang" => $thang,
                    "nam" => $nam,
                ]);
                
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xuatpdfphieudat($mapd){
            if(isset($_SESSION["macv"])  && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                
                $row = mysqli_fetch_array($this -> adminmodel -> phieudat_pdf($mapd));
                $tenncc = $row['tenncc'];
                $diachi = $row['diachincc'];
                $sdtncc =  $row['sdtncc'];
                $email =  $row['email'];
                $tennhanvien = $row['tennhanvien'];
                $phut = date_create(date('d-m-Y H:i:s')) -> format('i'); 
                $gio = date_create(date('d-m-Y H:i:s')) -> format('H'); 
                $ngay = date_create(date('d-m-Y')) -> format('d'); 
                $thang = date_create(date('d-m-Y')) -> format('m'); 
                $nam = date_create(date('d-m-Y')) -> format('Y'); 
                $this ->viewadmin("PDF/phieudathang",
                [
                    "chitietphieudat" => $this -> adminmodel ->  chitietphieudat_pdf($mapd),
                    "tennhanvien" => $tennhanvien,
                    "tenncc" => $tenncc,
                    "sdtncc" => $sdtncc,
                    "diachi" => $diachi,
                    "email" => $email,
                    "phut" => $phut,
                    "gio" => $gio,
                    "ngay" => $ngay,
                    "thang" => $thang,
                    "nam" => $nam,
                ]);
                
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // =========================BACKUP
        public function backup(){
            if(isset($_SESSION["macv"])  && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("BackUp/backup",
                []);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function restore(){
            if(isset($_SESSION["macv"])  && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
                $this ->viewadmin("BackUp/restore",[
                    "ketqua" => "Chức năng đang được bảo trì",
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
        }
        // public function post_restore(){
        //     if(isset($_SESSION["macv"])  && ($_SESSION["macv"] == 1 || $_SESSION["macv"] == 2)){
        //         if(isset($_POST['restore'])){
        //             $filename = $_FILES['filename']['name'];
        //             $this -> restore -> phuchoi($filename);
        //             $this ->viewadmin("BackUp/restore",[
                             //             ]);
        //         }
        //     }
        //     else{
        //         $this ->viewadmin("404");
        //     }
        // }
    }
?>