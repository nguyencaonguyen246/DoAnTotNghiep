<?php 
    class DangNhapController extends Controller{
        public $sanphamodel;
        public $usermodel;
        public $giohangmodel;
        public $adminmodel;
        public function __construct(){
        // model
            $this->usermodel = $this -> model ("UserModel");
            $this->sanphamodel = $this -> model ("SanPhamModel");
            $this->giohangmodel = $this -> model ("GioHangModel");
            $this->adminmodel = $this -> model ("AdminModel");

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
        function newHome(){
            $this ->view("khachhang/taikhoan/dangnhap",[]);
        }
        function dangnhap(){
            $ketqua_mess = false;
            if(isset($_POST["btnDangNhap"])){
                $sdtkhachhang = $_POST["sdtkhachhang"];
                $matkhau_nhap = $_POST["matkhau"];
                if(empty($_POST["sdtkhachhang"]) || empty($_POST["matkhau"])){
                    $this ->view("khachhang/taikhoan/dangnhap",[
                        "page" => "khachhang/taikhoan/dangnhap",
                        "thongtin" => "Vui lòng nhập đầy đủ thông tin",
                    ]);
                }
                $ketqua = $this->usermodel->dangnhap($sdtkhachhang);
                if(mysqli_num_rows($ketqua)){
                    while ($row = mysqli_fetch_array($ketqua)){
                        $makh = $row["makh"];
                        //$tendangnhap = $row["tendangnhap"];
                        $matkhau = $row["matkhau"];
                        $tenkhachhang = $row["tenkhachhang"];
                        $sdtkhachhang = $row["sdtkhachhang"];
                        $email = $row["email"];
                        $diachi = $row["diachi"];
                    }
                    if(password_verify($matkhau_nhap, $matkhau)){
                        $_SESSION["makh"] =  $makh;
                        $_SESSION["tenkhachhang"] =  $tenkhachhang;
                        $_SESSION["sdtkhachhang"] =  $sdtkhachhang;
                        $_SESSION["email"] =  $email;
                        $_SESSION["diachi"] =  $diachi;
                        // $this ->view("masterpage3",[
                        //     "khach"=> $tenkhachhang,
                        //     "page"=>"khachhang/Home/trangchu",
                        //     "ketqua"=> $ketqua_mess = true, 
                        // ]);
                        $trang = 1;

                        //láy mã giỏ hàng
                        $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
                        if(mysqli_num_rows($kqgetGH)){
                                while ($row = mysqli_fetch_array($kqgetGH)){
                                    $magh = $row["magh"];
                                }
                            } 
                        
                        if(isset($magh))
                        {
                             //lấy số mặt hàng
                        $kqcountGH = $this->giohangmodel -> countCTGH($magh);  
                        if(mysqli_num_rows($kqcountGH)){
                                while ($row = mysqli_fetch_array($kqcountGH)){
                                    $somathang = $row["somathang"];
                                }
                            }
                            else
                            {
                                $somathang = '0';
                            }  
                        }
                        else
                            {
                                $somathang = '0';
                            }
            
                        // view
                        $this ->view("masterpage3",
                        [
                            "somathang" => $somathang,
                            "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                            "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                            "LTSP"=> $this->sanphamodel-> getSPMoi(),
                            "SPTB"=> $this->sanphamodel-> getSPTB(),
                            "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                            "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                            "DSNSX"=> $this->sanphamodel-> getDSNSX(),
                            "page"=> "khachhang/Home/home2",
                        ]);
                    }
                    else if ($matkhau_nhap == $matkhau){
                        $_SESSION["makh"] =  $makh;
                        $_SESSION["tenkhachhang"] =  $tenkhachhang;
                        $_SESSION["sdtkhachhang"] =  $sdtkhachhang;
                        $_SESSION["email"] =  $email;
                        $_SESSION["diachi"] =  $diachi;
                        // $this ->view("masterpage3",[
                        //     "page"=>"khachhang/Home/trangchu",
                        //     "ketqua"=> $ketqua_mess = true, 
                        // ]);
                        $trang = 1;

                        //láy mã giỏ hàng
                        $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
                        if(mysqli_num_rows($kqgetGH)){
                                while ($row = mysqli_fetch_array($kqgetGH)){
                                    $magh = $row["magh"];
                                }
                            } 
                        
                        if(isset($magh))
                        {
                             //lấy số mặt hàng
                        $kqcountGH = $this->giohangmodel -> countCTGH($magh);  
                        if(mysqli_num_rows($kqcountGH)){
                                while ($row = mysqli_fetch_array($kqcountGH)){
                                    $somathang = $row["somathang"];
                                }
                            }
                            else
                            {
                                $somathang = '0';
                            }  
                        }
                        else
                            {
                                $somathang = '0';
                            }
                          
            
                        // view
                        $this ->view("masterpage3",
                        [
                            "somathang" => $somathang,
                            "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                            "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                            "LTSP"=> $this->sanphamodel-> getSPMoi(),
                            "SPTB"=> $this->sanphamodel-> getSPTB(),
                            "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                            "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                            "DSNSX"=> $this->sanphamodel-> getDSNSX(),
                            "page"=> "khachhang/Home/home2",
                        ]);
                    }
                    else{
                        $this ->view("khachhang/taikhoan/dangnhap",[
                            "page" => "khachhang/taikhoan/dangnhap",
                            "ketqua" => $ketqua_mess,
                        ]);
                    }
                }
                else{
                    $this ->view("khachhang/taikhoan/dangnhap",[
                        "page" => "khachhang/taikhoan/dangnhap",
                        "ketqua" => $ketqua_mess,
                    ]);
                }
            }
        }
        function thongtin(){
            if(isset($_SESSION["makh"])){
                $this ->view("masterpage3",
                [
                    "KH"=> $this->usermodel ->thongtin($_SESSION["makh"]),
                    "page"=> "khachhang/taikhoan/thongtin",
                ]);
            }
           
            
        }



        function notfound(){
            // view
            $this ->view("Null",
            [
                "page"=> "notfound",
            ]);
        }

        // function newHome(){
        //     // view
        //     $this ->view("masterpage3",
        //     [
        //         "page"=> "khachhang/Home/home2",
        //     ]);
        // }

        function GioHang(){
            // view
            $this ->view("masterpage3",
            [
                "page"=> "khachhang/taikhoan/giohang",
            ]);
        }

        function ThongTinGioHang(){
            // view
            $this ->view("masterpage3",
            [
                "page"=> "khachhang/taikhoan/thongtinthanhtoan",
            ]);
        }

        function suathongtin(){

            //láy mã giỏ hàng
                $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
                if(mysqli_num_rows($kqgetGH)){
                        while ($row = mysqli_fetch_array($kqgetGH)){
                            $magh = $row["magh"];
                        }
                    } 
                
                if(isset($magh))
                {
                    //lấy số mặt hàng
                $kqcountGH = $this->giohangmodel -> countCTGH($magh);  
                if(mysqli_num_rows($kqcountGH)){
                        while ($row = mysqli_fetch_array($kqcountGH)){
                            $somathang = $row["somathang"];
                        }
                    }
                    else
                    {
                        $somathang = '0';
                    }  
                }
                else
                    {
                        $somathang = '0';
                    }

            unset($_SESSION["tenkhachhang"]);          
            $ketqua_mess = false;
            if(isset($_POST["btncapnhat"])){
                $tenkhachhang = $_POST["tenkhachhang"];
                //$sdtkhachhang = $_POST["sdtkhachhang"];
                $email = $_POST["email"];
                $diachi = $_POST["diachi"];
                $ketqua = $this ->usermodel -> suathongtin($_SESSION["makh"], $tenkhachhang, $email, $diachi);
                if($ketqua){
                    
                    $_SESSION["tenkhachhang"] = $tenkhachhang;

                    $this ->view("masterpage3",
                    [
                        "KH"=> $this->usermodel ->thongtin($_SESSION["makh"]),
                        "somathang" => $somathang,
                        "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                        "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),           
                        "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                        "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                        "page"=> "khachhang/taikhoan/thongtin",
                        "ketqua"=> $ketqua_mess = true,
                        "khach" => $tenkhachhang,
                    ]);
                }
                else{
                    $this ->view("masterpage3",
                    [
                        "somathang" => $somathang,
                        "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                        "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),           
                        "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                        "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                        "page"=> "khachhang/taikhoan/thongtin",
                        "ketqua"=> $ketqua_mess,
                    ]);
                }
            }
            $this ->view("masterpage3",
            [
                "page"=> "khachhang/taikhoan/thongtin",
            ]);
        }
        function dangxuat(){
            $trang = 1;
            unset($_SESSION['makh']);
            unset($_SESSION['dathang']);
            unset($_SESSION["tenkhachhang"]);
            unset($_SESSION["sdtkhachhang"]);
            unset($_SESSION["email"]);
            unset($_SESSION["diachi"]);
            $this ->view("masterpage3",[
                "somathang" => "0",
                "LTSP"=> $this->sanphamodel-> getLIMITSP($trang),
                "SPTB"=> $this->sanphamodel-> getSPTB(),
                "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "page"=> "khachhang/Home/home2",
            ]);
        }

        function DoiMaKhau(){
            // view
            $this ->view("khachhang/taikhoan/doimatkhau",
                    [
                        "page"=> "khachhang/taikhoan/doimatkhau",                        
                    ]);
            
        }

        function doipass(){
            $ketqua_mess = false;
            if(isset($_POST["btnDoiMatKhau"])){
               // $tendangnhap = $_POST["tendangnhap"];
                $matkhau = $_POST["matkhau"];
                $matkhau = password_hash($matkhau, PASSWORD_DEFAULT);
               // $tenkhachhang = $_POST["tenkhachhang"];
                $passold = $_POST["passold"];
                $re_matkhau = $_POST["re_matkhau"];

                $ketqua1 = $this->usermodel->thongtin($_SESSION['makh']);
                if(mysqli_num_rows($ketqua1)){
                    while ($row = mysqli_fetch_array($ketqua1)){
                        $matkhaucu = $row["matkhau"];
                        $sdtkhachhang = $row["sdtkhachhang"];
                    }
                }

                if(password_verify($passold, $matkhaucu) == false)
                {
                    $this->view("khachhang/taikhoan/doimatkhau", [
                        "page" => "khachhang/taikhoan/doimatkhau",
                        "ketquasdt"=> $ketqua_mess,
                    ]);
                } else
                if($re_matkhau != $_POST["matkhau"])
                {
                    $this->view("khachhang/taikhoan/doimatkhau", [
                        "page" => "khachhang/taikhoan/doimatkhau",
                        "ketquasdt"=> $ketqua_mess,
                    ]);
                } else
                if(empty($_POST["matkhau"])){
                    $this->view("khachhang/taikhoan/doimatkhau", [
                        "page" => "khachhang/taikhoan/doimatkhau",
                        "ketqua"=> $ketqua_mess,
                    ]);
                }else{
                    $ketqua2 = $this->usermodel->doimatkhau($_SESSION['makh'], $matkhau );
                    if($ketqua2){
                        $this->view("khachhang/taikhoan/dangnhap", [
                            "page" => "khachhang/taikhoan/dangnhap",
                            "ketqua_dangky"=> true,
                            "sdtkhachhang" => $sdtkhachhang,
                        ]);
                        
                    }
                }
            }
        }

    }
?>