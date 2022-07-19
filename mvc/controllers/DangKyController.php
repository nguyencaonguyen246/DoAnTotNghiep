<?php 
    class DangKyController extends Controller{
        public $sanphamodel;
        public $usermodel;
        public function __construct(){
        // model
            $this->usermodel = $this -> model ("UserModel");
            $this->sanphamodel = $this -> model ("SanPhamModel");
        }
        function newHome(){
            $this ->view("khachhang/taikhoan/dangky",[]);
        }
       
        function dangky(){
            $ketqua_mess = false;
            if(isset($_POST["btnDangKy"])){
               // $tendangnhap = $_POST["tendangnhap"];
                $matkhau = $_POST["matkhau"];
                $matkhau = password_hash($matkhau, PASSWORD_DEFAULT);
               // $tenkhachhang = $_POST["tenkhachhang"];
                $sdtkhachhang = $_POST["sdtkhachhang"];
                $re_matkhau = $_POST["re_matkhau"];
                if(strlen($sdtkhachhang) != 10)
                {
                    $this->view("khachhang/taikhoan/dangky", [
                        "page" => "khachhang/taikhoan/dangky",
                        "ketquasdt"=> $ketqua_mess,
                    ]);
                } else
                if($re_matkhau != $_POST["matkhau"])
                {
                    $this->view("khachhang/taikhoan/dangky", [
                        "page" => "khachhang/taikhoan/dangky",
                        "ketquasdt"=> $ketqua_mess,
                    ]);
                } else
                if(empty($_POST["sdtkhachhang"])||empty($_POST["matkhau"])){
                    $this->view("khachhang/taikhoan/dangky", [
                        "page" => "khachhang/taikhoan/dangky",
                        "ketqua"=> $ketqua_mess,
                    ]);
                }else{
                    $ketqua = $this->usermodel->dangky($matkhau, $sdtkhachhang );
                    if($ketqua){
                        $this->view("khachhang/taikhoan/dangnhap", [
                            "page" => "khachhang/taikhoan/dangnhap",
                            "ketqua_dangky"=> $ketqua,
                            "sdtkhachhang" => $sdtkhachhang,
                        ]);
                    }
                }
            }
        }
       
    }
?>

