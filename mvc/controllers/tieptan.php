<?php 
    class tieptan extends Controller{
        public $adminmodel;
        public $thongkemodel;
        public $tieptanmodel;
        public function __construct()
        {
            $this->adminmodel = $this -> model ("AdminModel");
            $this->thongkemodel = $this -> model ("ThongKeModel");
            $this->tieptanmodel = $this -> model ("TiepTanModel");
            date_default_timezone_set('Asia/Ho_Chi_Minh'); //Chỉnh về múi giờ Việt Nam
        }
        // =====================================ĐĂNG NHẬP & ĐĂNG XUẤT====================
        public function index(){
            if(isset($_SESSION["macv_tt"])==2){
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
            $this -> viewtieptan("tieptandangnhap");
        }
        public function tieptan(){
            $this -> viewtieptan("tieptandangnhap");
        }
        public function tieptandangnhap(){
            unset($_SESSION["macv"]);
            unset( $_SESSION["tennhanvien"]);
            unset( $_SESSION["macv"]);
            if(isset($_POST["btndangnhapTiepTan"])){
                $tendangnhap = $_POST["tendangnhap"];
                $matkhau_nhap = $_POST["matkhau"];
                $ketqua = $this->tieptanmodel->dangnhap($tendangnhap);
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
            if(isset($_SESSION["macv_tt"])==2){
                unset($_SESSION["macv_tt"]);
                unset($_SESSION["tennhanvien_tt"]);
                unset($_SESSION["manv_tt"]);
                // session_destroy();
                $this -> viewtieptan("tieptandangnhap");
             }
            else{
                $this ->viewadmin("404");
            }
        }
    }
?>