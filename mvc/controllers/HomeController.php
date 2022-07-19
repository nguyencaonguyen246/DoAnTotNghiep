<?php 
class HomeController extends Controller{
    public $sanphamodel;
    public $usermodel;
    public $giohangmodel;
    public $mailmodel;
    public $smsmodel;
    public function __construct(){
        // model
        $this->sanphamodel = $this -> model ("SanPhamModel");
        $this->usermodel = $this -> model ("UserModel");
        $this->giohangmodel = $this -> model ("GioHangModel");
        $this->mailmodel = $this -> model ("MailModel");
        $this->smsmodel = $this -> model ("SMSModel");
    }
    public function home(){
        $this ->view ("masterpage3",
        [
            "page"=>"khachhang/Home/home2",
        ]);
    }   
    
    function newHome(){

        // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "somathang" => "0",
                "LTSP"=> $this->sanphamodel-> getSPMoi(),
                "SPTB"=> $this->sanphamodel-> getSPTB(),
                "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                "page"=> "khachhang/Home/home2",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
        else{
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


       
    }

//Chính sách 

function ChinhSach(){

    // khách hàng CHƯA đăng nhập 
    if(!isset($_SESSION['makh'])){
        $trang = 1;
        // view
        $this ->view("masterpage3",
        [
            "somathang" => "0",
            // "LTSP"=> $this->sanphamodel-> getSPMoi(),
            // "SPTB"=> $this->sanphamodel-> getSPTB(),
            // "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
            "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
            "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

            "page"=> "khachhang/Home/chinhsach",
        ]);
    }
    //khách hàng ĐÃ đăng nhập
    else{
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
            "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
            "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
            "page"=> "khachhang/Home/chinhsach",
        ]);
    }

   
    }






    function XoaGioHang($magh, $id){
        // view 
        if(isset($id))
        {
            unset($_SESSION['giohang'][$id]);
        }
        $ketqua = $this ->giohangmodel -> XoaHang($magh, $id);  


        $kqTongTienGH = $this ->giohangmodel -> tongTienGH($magh);  
       if(mysqli_num_rows($kqTongTienGH)){
            while ($row = mysqli_fetch_array($kqTongTienGH)){
                $tongtien = $row["tongtien"];
            }
        }

        $ketquaSuaTongTien = $this ->giohangmodel -> suaTongTienGH($_SESSION["makh"], $tongtien); 


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
                // "somathang" => $somathang,
                // "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                // "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                // "LTSP"=> $this->sanphamodel-> getLIMITSP($trang),
                // "SPTB"=> $this->sanphamodel-> getSPTB(),
                // "page"=> "khachhang/Home/home2",
                "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/taikhoan/cart",
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,
            ]);
            
        
    }

    function ThongTin(){

        // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "somathang" => "0",
                // "LTSP"=> $this->sanphamodel-> getSPMoi(),
                // "SPTB"=> $this->sanphamodel-> getSPTB(),
                // "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
    
                "page"=> "khachhang/Home/chinhsach",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
        else{
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
                // "LTSP"=> $this->sanphamodel-> getSPMoi(),
                // "SPTB"=> $this->sanphamodel-> getSPTB(),
                // "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "DSHD"=> $this->giohangmodel ->GetSPHoaDon($_SESSION["makh"]),
                "DSBH"=> $this->giohangmodel ->GetHoaDonSCBH($_SESSION["makh"]),
                "KH"=> $this->usermodel ->thongtin($_SESSION["makh"]),
                "page"=> "khachhang/taikhoan/thongtin",
            ]);
        }
    }


    function Contact(){

        if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "somathang" => "0",
                // "LTSP"=> $this->sanphamodel-> getSPMoi(),
                // "SPTB"=> $this->sanphamodel-> getSPTB(),
                // "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                "page"=> "pages/contact",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
        else{
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
                // "LTSP"=> $this->sanphamodel-> getSPMoi(),
                // "SPTB"=> $this->sanphamodel-> getSPTB(),
                // "SPYT"=> $this->sanphamodel-> SanPhamYeuThichNhieu(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "page"=> "pages/contact",
            ]);
        }
    } // khách hàng CHƯA đăng nhập 
   
    
    function SendContact(){
        
        $ten = $_POST["name"];
        $mail = $_POST["email"];
        $tieude = $_POST["subject"];
        $noidung = $_POST["message"];
        $to = "vuvanthin1702@gmail.com";
        $txt = "Người Gủi: ".$ten." <br>Tiêu Đề: ".$tieude." <br> Email: ".$mail." <br> Nội Dung: ".$noidung;
        //gửi mail
        $subject = "Hộp thư hỗ trợ";
        $cc = $mail;
        $kqguimail = $this ->mailmodel -> SendMail($to, $subject, $txt, $cc);
        
        echo "Thư của bạn được đã gửi, vui lòng xem lại hộp thư Gmail.";

        
    } // khách hàng CHƯA đăng nhập




}    
?>