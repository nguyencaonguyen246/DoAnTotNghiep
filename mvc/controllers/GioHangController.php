<?php 
    class GioHangController extends Controller{
       
        public $giohangmodel;
        public $usermodel;
        public $sanphamodel;
        public $mailmodel;
        public $smsmodel;
        public function __construct(){
            // model
            $this->giohangmodel = $this -> model ("GioHangModel");
            $this->sanphamodel = $this -> model ("SanPhamModel");
            $this->mailmodel = $this -> model ("MailModel");
            $this->usermodel = $this -> model ("UserModel");
            $this->smsmodel = $this -> model ("SMSModel");
            date_default_timezone_set('Asia/Ho_Chi_Minh'); //Chỉnh về múi giờ Việt Nam
        }
        public function home(){
            $this ->view("masterpage3",
            [
                "page"=>"khachhang/Home/home2",
            ]);
        }

        function GioHang(){
            // view 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
                ]);
            }
            else{
                $this ->view("masterpage3",
                [
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "page"=> "khachhang/taikhoan/giohang",
                ]);
            }
        }

        function Cart(){
            // view 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
                ]);
            }
            else{

                // tính số mặt hàng
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
                // tính số mặt hàng

                $this ->view("masterpage3",
                [                    
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/taikhoan/cart",
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,
                ]);
            }
        }

        function GiaoHang(){           
            // view 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
                ]);
            }
            else{
                $this ->view("masterpage3",
                [
                    "KH1"=> $this->giohangmodel ->thongtinkhachhang($_SESSION["makh"]),
                    "GH1"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "page"=> "khachhang/taikhoan/thongtinthanhtoan",
                ]);
            }
        }

        
        function XacNhanDatHang()
        {
            //láy mã giỏ hàng
                $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
            if(mysqli_num_rows($kqgetGH)){
                    while ($row = mysqli_fetch_array($kqgetGH)){
                        $magh = $row["magh"];
                    }
                }
           // var_dump($_POST); 
            // echo $_POST["ten"];
            // echo $_POST["email"];
            // echo $_POST["sodienthoai"];
            // echo $_POST["diachi"];

            //lấy giá trị tổng tiền
           $kqTongTienGH = $this ->giohangmodel -> tongTienGH($magh);  
           if(mysqli_num_rows($kqTongTienGH)){
                while ($row = mysqli_fetch_array($kqTongTienGH)){
                    $tongtien = $row["tongtien"];
                }
            }

            //cắt chuỗi đổi đầu số +84
            // $str = "The quick brown fox jumps over the lazy dog."
            // $str2 = substr($str, 4); // "quick brown fox jumps over the lazy dog."
            // $result = $data1 . $data2;

            $ngayhientai = date_create(date('d-m-Y'));
                        $ngaylap = $ngayhientai->format('Y-m-d');

            $kqCreateHD = $this ->giohangmodel -> CreateHDonline($_SESSION["makh"], $ngaylap, $tongtien, $_POST["sodienthoai"], $_POST["diachi"]);  

            

            //lấy mã hóa đơn vừa lập

            $kqgetMAHDonline = $this ->giohangmodel -> getMADHOnline($_SESSION["makh"]);  
           if(mysqli_num_rows($kqgetMAHDonline)){
                while ($row = mysqli_fetch_array($kqgetMAHDonline)){
                    $mahd = $row["mahdonl"];
                }
            }
            
            //lấy thông tin chi tiết giỏ hàng
            $kqgetCTGH = $this ->giohangmodel -> getCTGH($magh);  
            if(mysqli_num_rows($kqgetCTGH)){
                 while ($row = mysqli_fetch_array($kqgetCTGH)){
                     $masp = $row["masp"];
                     $soluong = $row["soluong"];
                     $dongia = $row["dongia"];
                     $giatrikhuyenmai = $row["giatrikhuyenmai"];
                     $giakhuyenmai = $row["giakhuyenmai"];
                     $thanhtien = $row["thanhtien"];

                    //  echo $mahd."<br>";
                    //  echo $masp."<br>";
                    //  echo $thanhtien."<br>";

                    //tạo chi tiết hóa đơn online
                    $kqCreateCTHD = $this ->giohangmodel -> CreateCTHDonline($mahd, $masp, $soluong, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien);
                 }
             } 

             //Xóa giỏ hàng
             $kqXoaGHonline = $this ->giohangmodel -> DeleteGH($_SESSION["makh"]);  
             


            //GỬI MAIL ============================

            $ketquamail = $this->usermodel->thongtin($_SESSION["makh"]);
            if(mysqli_num_rows($ketquamail)){
                while ($row = mysqli_fetch_array($ketquamail)){
                    $email = $row["email"];

                    $tenkhachhang = $row["tenkhachhang"];
                }
            }
            if($email != null){
                $to =  $email;
                $subject = 'đơn hàng #DHCCDT'.$mahd.'PRR đã đặt mua thành công!';
                $txt = ' <h3 style="coler:red;"> Xin chào '.$tenkhachhang.', </h3> đơn hàng #DHCCDT'.$mahd.'PRR của bạn đã được ghi nhận thành công ngày '.$ngaylap.'. 
                <br> Nhân viên sẽ liên hệ hỗ trợ quý khách trong thời gian sớm nhất!
                <p> Cám ơn bạn đã tin tưởng CapCuuDienThoai.vn . </p>            

                <table class="tg" style="table-layout: fixed; width: 756px; border-collapse:collapse;border-color:#aaa;border-spacing:0;">
                <colgroup>
                <col style="width: 347px">
                <col style="width: 168px">
                <col style="width: 86px">
                <col style="width: 155px">
                </colgroup>
                <thead>
                <tr>
                    <th class="tg-wp8o" style="background-color:#f38630;border-color:#aaa;border-style:solid;border-width:1px;color:#fff; border-color:#000000;text-align:center;vertical-align:top">Tên Sản Phẩm</th>
                    <th class="tg-wp8o" style="background-color:#f38630;border-color:#aaa;border-style:solid;border-width:1px;color:#fff; border-color:#000000;text-align:center;vertical-align:top" >Đơn Giá</th>
                    <th class="tg-wp8o" style="background-color:#f38630;border-color:#aaa;border-style:solid;border-width:1px;color:#fff; border-color:#000000;text-align:center;vertical-align:top" >Số Lượng</th>
                    <th class="tg-wp8o" style="background-color:#f38630;border-color:#aaa;border-style:solid;border-width:1px;color:#fff; border-color:#000000;text-align:center;vertical-align:top" >Thành Tiền</th>
                </tr>
                </thead>
                <tbody>';

                //lấy thông tin chi tiết giỏ hàng
                $kqGetCTHD = $this ->giohangmodel -> GetSPCTHD($mahd);  
                if(mysqli_num_rows($kqGetCTHD)){
                    while ($row = mysqli_fetch_array($kqGetCTHD)){
                        $tensanpham = $row["tensanpham"];
                        $dongiam = $row["dongia"];
                        $giakhuyenmaim = $row["giakhuyenmai"];
                        $soluongm = $row["soluong"];
                        $thanhtienm = $row["thanhtien"];

                        

                $txt .= '<tr>
                    <td class="tg-0ok5" style="background-color:#fff;border-color:#aaa;border-style:solid;border-width:1px;color:#333;
                    font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal; 
                    background-color:#FCFBE3;border-color:#000000;text-align:center;vertical-align:top" > <p>'.$tensanpham.'</p></td>

                    <td class="tg-0ok5" style="background-color:#fff;border-color:#aaa;border-style:solid;border-width:1px;color:#333;
                    font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal; 
                    background-color:#FCFBE3;border-color:#000000;text-align:center;vertical-align:top" >';

                    if($dongiam !=  $giakhuyenmaim){  $txt .= '<p style="text-decoration-line:line-through; color: red;">'. number_format($dongiam, 0,',','.').' vnđ </p>'; };
                    
                    $txt .= '<p>'. number_format($giakhuyenmaim, 0,',','.').' vnđ </p> </td>

                    <td class="tg-0ok5" style="background-color:#fff;border-color:#aaa;border-style:solid;border-width:1px;color:#333;
                    font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal; 
                    background-color:#FCFBE3;border-color:#000000;text-align:center;vertical-align:top"><p>'.$soluongm.'</p></td>

                    <td class="tg-0ok5" style="background-color:#fff;border-color:#aaa;border-style:solid;border-width:1px;color:#333;
                    font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal; 
                    background-color:#FCFBE3;border-color:#000000;text-align:center;vertical-align:top" ><p>'.number_format($thanhtienm, 0,',','.').' vnđ </p></td>
                </tr>';


                    }
                } 


                $txt .='<tr>
                    <td class="tg-wp8o" colspan="3" style="background-color:#fff;border-color:#aaa;border-style:solid;border-width:1px;color:#333;
                        font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal; 
                        border-color:#000000;text-align:center;vertical-align:top ">Tổng:</td>

                    <td class="tg-wp8o" style="background-color:#fff;border-color:#aaa;border-style:solid;border-width:1px;color:#333;
                        font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal; 
                        border-color:#000000;text-align:center;vertical-align:top " >'.number_format($tongtien, 0,',','.').' vnđ </td>
                </tr>
                </tbody>
                </table>


                <br> <img style="max-width: 400px;" src="https://firebasestorage.googleapis.com/v0/b/quanlynhansu-10734.appspot.com/o/Khoaluantotnghiep%2Flogo_ccdt_v3.png?alt=media&token=fff83bf9-5470-4570-aa5a-ab5a3df6c33d" alt="logo images">';
                $cc = "vuvanhongson@gmail.com";
                $this ->mailmodel -> SendMail($to, $subject, $txt, $cc);  
            }
            //GỬI MAIL ============================


            
            // GỬI TIN NHÁN SMS======================================================
            $sdt = $_POST["sodienthoai"];                   
            // $txtsms = "Capcuudienthoai.vn cam on anh/chi $tenkhachhang da su dung dich vu cua chung toi, don hang #DHCCDT$mahd-PRR da dat mua thanh cong! Nhan vien se lien he voi quy khach som nhat.";
            $txtsms = "Capcuudienthoai.vn cam on anh/chi da su dung dich vu, don hang #DHCCDT$mahd-PRR  da gui yeu cau thanh cong!";
            $this ->smsmodel -> SendSMS($sdt, $txtsms);  
            // GỬI TIN NHÁN SMS======================================================


            // if($kqCreateHD == true)
            // {
            //     echo "True!"."<br>";
            //     echo $_SESSION["makh"]."<br>";
            //     echo $ngaylap."<br>";
            //     echo $tongtien."<br>";
            //     echo $_POST["diachi"]."<br>";
            // }
            // else
            // {
            //     echo "fales";
            // }

            $this ->view("khachhang/taikhoan/thanhtoangiohang",[
                "page" => "khachhang/taikhoan/thanhtoangiohang",
            ]);


        }


        function SuaTongTien()
        {
            $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
            if(mysqli_num_rows($kqgetGH)){
                 while ($row = mysqli_fetch_array($kqgetGH)){
                     $magh = $row["magh"];
                 }
             }
            $kqTongTienGH = $this ->giohangmodel -> tongTienGH($magh);  
           if(mysqli_num_rows($kqTongTienGH)){
                while ($row = mysqli_fetch_array($kqTongTienGH)){
                    $tongtien = $row["tongtien"];
                }
            }

            $ketquaSuaTongTien = $this ->giohangmodel -> suaTongTienGH($_SESSION["makh"], $tongtien); 
        }

        function ThongTinGioHang(){

            $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
            if(mysqli_num_rows($kqgetGH)){
                 while ($row = mysqli_fetch_array($kqgetGH)){
                     $magh = $row["magh"];
                 }
             }
            //var_dump($_POST); exit;

            if(isset($_POST["update_click"]))// cập giỏ hàng
            {
               
                //echo "cap nhat san pham";
                foreach($_POST['soluong'] as $id => $soluong){
                    $_SESSION['giohang'][$id] = $soluong;
         
                     $kqgetSP = $this ->giohangmodel -> getSP($id);  
                    if(mysqli_num_rows($kqgetSP)){
                         while ($row = mysqli_fetch_array($kqgetSP)){
                             $dongia = $row["dongia"];
                             $soluongton = $row["soluongton"];
                             $giatrikhuyenmai = $row["giatrikhuyenmai"];
                         }
                     }
         
                     $giakhuyenmai = $dongia - $dongia*$giatrikhuyenmai/100;
                     $thanhtien = $soluong * $giakhuyenmai;

                     $ketqua = $this ->giohangmodel -> updateSoLuongGH($magh, $id, $soluong, $thanhtien); 

                }

            }
            else if(isset($_POST['order_click'])) 
            {
                

            }

            //=============Updade Tong Tien Gio Hang=============
            $kqTongTienGH = $this ->giohangmodel -> tongTienGH($magh);  
           if(mysqli_num_rows($kqTongTienGH)){
                while ($row = mysqli_fetch_array($kqTongTienGH)){
                    $tongtien = $row["tongtien"];
                }
            }

            $ketquaSuaTongTien = $this ->giohangmodel -> suaTongTienGH($_SESSION["makh"], $tongtien); 
            

            //==========================
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
           // tính số mặt hàng
            $this ->view("masterpage3",
            [                    
                "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "page"=> "khachhang/taikhoan/cart",
                "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "somathang" => $somathang,
            ]);
            //=========================================================================
        }


        function ThemSPGioHang($masp){

            //Kiểm tra đăng nhập
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
                ]);
            }
            else{
                
                 if(!isset($_SESSION['giohang'])){
                $_SESSION['giohang'] = array();
            }

            foreach($_POST['soluong'] as $id => $soluong){
                $_SESSION['giohang'][$id] = $soluong;
            }
            //var_dump(implode(",", array_keys($_SESSION['giohang']))); exit;
            //var_dump($_SESSION['giohang'][10]); exit;

            //echo $masp ;
           $solg = $_SESSION['giohang'][$masp];

           //kiểm tra giỏ hàng đã tòn tại chưa???

           $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
           if(mysqli_num_rows($kqgetGH)){
                while ($row = mysqli_fetch_array($kqgetGH)){
                    $magh = $row["magh"];
                }
            }

            if(!isset($magh))
            {
                $kqCreateGH = $this ->giohangmodel -> CreateGH($_SESSION["makh"]);  
                $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
                if(mysqli_num_rows($kqgetGH)){
                        while ($row = mysqli_fetch_array($kqgetGH)){
                            $magh = $row["magh"];
                        }
                    }
            }

            //Thêm chi tiet gio hang
            $kqgetSP = $this ->giohangmodel -> getSP($masp);  // thấy thông tin sản phẩm chọn mua
                    if(mysqli_num_rows($kqgetSP)){
                            while ($row = mysqli_fetch_array($kqgetSP)){
                                $dongia = $row["dongia"];
                                $soluongton = $row["soluongton"];
                                $giatrikhuyenmai = $row["giatrikhuyenmai"];
                            }
                        }
            //Kiểm tra tòn tại mã SP
            $kqktMASP = $this ->giohangmodel -> getMaSPctGH($magh, $masp); //kiểm tra mã sản phẩm tồn tại trong giỏ hàng không
            if(mysqli_num_rows($kqktMASP)){
                while ($row = mysqli_fetch_array($kqktMASP)){
                    $mactgiohang = $row["mactgiohang"];
                    $solg2 = $row["soluong"];                   
                }
            }

            if(isset($mactgiohang)) // mã sản phẩm đã tồn tại trong gio hang
            {
                $solgT = $solg + $solg2;
                $giakhuyenmai = $dongia - $dongia*$giatrikhuyenmai/100;
                $thanhtien2 = $solgT * $giakhuyenmai;
                if($soluongton > 0)
                {
                    $ketquaT = $this ->giohangmodel -> updateSoLuongGH($magh, $masp, $solgT, $thanhtien2); 
                }
            }
            else // mã sản phẩm chưa có trong giỏ hàng
            {
                $giakhuyenmai = $dongia - $dongia*$giatrikhuyenmai/100;
                $thanhtien = $solg * $giakhuyenmai;
                    
                if($soluongton > 0)
                {
                    $ketqua = $this ->giohangmodel -> ThemGioHang($magh, $masp, $solg, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien); 
                }
            }

           

            


            //==============Cập nhật tổng tiền

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
            // tính số mặt hàng

            $this ->view("masterpage3",
            [                    
                "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "page"=> "khachhang/taikhoan/cart",
                "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "somathang" => $somathang,
            ]);
            //======================================
            }
           // echo $masp;

           //var_dump($_POST); exit;

           

          
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

            // tính số mặt hàng
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
            // tính số mặt hàng

            $this ->view("masterpage3",
                [
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/taikhoan/cart",
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,
                ]);
                
            
        }


        //Xac Nhan Thanh Toan Giao DIen Moi
        function XacNhanThanhToan(){           
            // view 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
                ]);
            }
            else{
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
                    "KH1"=> $this->giohangmodel ->thongtinkhachhang($_SESSION["makh"]),
                    "GH1"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/taikhoan/thongtinthanhtoan",
            ]);
                
            }
        }

        //Thêm 1 sản phẩm vào giỏ hàng

        function ThemOneGioHang($masp){

            // $masp = $_POST['masp'];
            // $makh = $_POST['makh'];

   
           $solg = 1;

           //kiểm tra giỏ hàng đã tòn tại chưa???

           $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
           if(mysqli_num_rows($kqgetGH)){
                while ($row = mysqli_fetch_array($kqgetGH)){
                    $magh = $row["magh"];
                }
            }

            if(!isset($magh))
            {
                $kqCreateGH = $this ->giohangmodel -> CreateGH($_SESSION["makh"]);  
                $kqgetGH = $this ->giohangmodel -> getmaGH($_SESSION["makh"]);  
                if(mysqli_num_rows($kqgetGH)){
                        while ($row = mysqli_fetch_array($kqgetGH)){
                            $magh = $row["magh"];
                        }
                    }
            }

            //Thêm chi tiet gio hang
            $kqgetSP = $this ->giohangmodel -> getSP($masp);  // thấy thông tin sản phẩm chọn mua
                    if(mysqli_num_rows($kqgetSP)){
                            while ($row = mysqli_fetch_array($kqgetSP)){
                                $dongia = $row["dongia"];
                                $soluongton = $row["soluongton"];
                                $giatrikhuyenmai = $row["giatrikhuyenmai"];
                            }
                        }
            //Kiểm tra tòn tại mã SP
            $kqktMASP = $this ->giohangmodel -> getMaSPctGH($magh, $masp); //kiểm tra mã sản phẩm tồn tại trong giỏ hàng không
            if(mysqli_num_rows($kqktMASP)){
                while ($row = mysqli_fetch_array($kqktMASP)){
                    $mactgiohang = $row["mactgiohang"];
                    $solg2 = $row["soluong"];                   
                }
            }

            if(isset($mactgiohang)) // mã sản phẩm đã tồn tại trong gio hang
            {
                $solgT = $solg + $solg2;
                $giakhuyenmai = $dongia - $dongia*$giatrikhuyenmai/100;
                $thanhtien2 = $solgT * $giakhuyenmai;
                if($soluongton > 0)
                {
                    $ketquaT = $this ->giohangmodel -> updateSoLuongGH($magh, $masp, $solgT, $thanhtien2); 
                }
            }
            else // mã sản phẩm chưa có trong giỏ hàng
            {
                $giakhuyenmai = $dongia - $dongia*$giatrikhuyenmai/100;
                $thanhtien = $solg * $giakhuyenmai;
                    
                if($soluongton > 0)
                {
                    $ketqua = $this ->giohangmodel -> ThemGioHang($magh, $masp, $solg, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien); 
                }
            }

           

            


            //==============Cập nhật tổng tiền

            $kqTongTienGH = $this ->giohangmodel -> tongTienGH($magh);  
           if(mysqli_num_rows($kqTongTienGH)){
                while ($row = mysqli_fetch_array($kqTongTienGH)){
                    $tongtien = $row["tongtien"];
                }
            }

            $ketquaSuaTongTien = $this ->giohangmodel -> suaTongTienGH($_SESSION["makh"], $tongtien); 

        
            // tính số mặt hàng
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
            // tính số mặt hàng

            $this ->view("masterpage3",
            [                    
                "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "page"=> "khachhang/taikhoan/cart",
                "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "somathang" => $somathang,
            ]);
            //======================================

        }

        //Them sản phẩm đặt sửa chữa
        function ThemGioHangDat(){
            // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
            $this ->view("khachhang/taikhoan/dangnhap",[
                "page" => "khachhang/taikhoan/dangnhap",
                
            ]);
        }
        //khách hàng ĐÃ đăng nhập
        else{

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

            $ketqua_mess = false;
            // Them Session giỏ đặt hàng
            if(!isset( $_SESSION['dathang'])){
                $_SESSION['dathang'] = [];
            }
            if(isset($_POST['themgiodathang'])){
                
                $hinhanh = $_POST['hinhanhdh'];
                $tensanpham =$_POST['tensanphamdh'];
                $dongia = $_POST['dongiadh'];
                $soluong =$_POST['soluongdh'];
                $masp = $_POST['maspdh'];
                $row = mysqli_fetch_array($this ->giohangmodel -> getSP($masp));
                if( $_POST['soluongdh'] > $row['soluongton']){
                    $this ->view("masterpage3",
                    [
                        "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                        "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                        "somathang" => $somathang,
                        "LoaiSPLienQuan" =>$this->sanphamodel-> getLoaiSPlienquan($row['maloai']),
                        "Detail"=> $this->sanphamodel-> getDetail($masp),
                        "MoTa"=> $this->sanphamodel-> getMoTa($masp),
                        "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                        "DSNSX"=> $this->sanphamodel-> getDSNSX(),
                        "ketqua"=> 1, 
                        "page"=> "khachhang/SanPham/productDetail",
                    ]);

                }
                else{
                    $flag = 0; // Dùng cờ dánh dấu sản phẩm đã thêm hay chưa
                    //Kiểm tra trùng sản phẩm trong giỏ hàng
                    for ($i=0; $i < sizeof( $_SESSION['dathang']); $i++) { 
                        if( $_SESSION['dathang'][$i][1] == $tensanpham){
                            $flag = 1; // Cờ bằng 1 nghĩa là sản phẩm đã được thêm
                            $soluong_moi = $soluong + $_SESSION['dathang'][$i][3];
                            if( $soluong_moi > $row['soluongton']){
                                $this ->view("masterpage3",
                                [
                                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                                    "somathang" => $somathang,
                                    "LoaiSPLienQuan" =>$this->sanphamodel-> getLoaiSPlienquan($row['maloai']),
                                    "Detail"=> $this->sanphamodel-> getDetail($masp),
                                    "MoTa"=> $this->sanphamodel-> getMoTa($masp),
                                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                                    "DSNSX"=> $this->sanphamodel-> getDSNSX(),
                                    "ketqua"=> 1, 
                                    "page"=> "khachhang/SanPham/productDetail",
                                ]);
                            }
                            else{
                                $_SESSION['dathang'][$i][3] = $soluong_moi;
                            }                           
                            // view
                            $this ->view("masterpage3",
                            [
                                "somathang" => $somathang,
                                "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                                "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),                
                                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                                // "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                                "DSDM"=> $this->sanphamodel-> getDSDM(),               
                                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                                
                                "page"=> "khachhang/taikhoan/thongtindatsua",
                            ]);
                            break;
                            
                        }
                    }
                    if($flag == 0){
                        $itemgiohang = [$hinhanh, $tensanpham, $dongia, $soluong,$masp];
                        $_SESSION['dathang'][] =  $itemgiohang;
                        // view
                        $this ->view("masterpage3",
                        [
                            "somathang" => $somathang,
                            "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                            "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),                
                            "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                            // "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                            "DSDM"=> $this->sanphamodel-> getDSDM(),               
                            "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                            
                            "page"=> "khachhang/taikhoan/thongtindatsua",
                        ]);
                    }
                }
            }

            // var_dump($_SESSION["dathang"]);

            }
        }


        function xoaitem($i){
            
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
                array_splice($_SESSION['dathang'],$i,1);
                $this ->view("masterpage3",
                        [
                            "somathang" => $somathang,
                            "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                            "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),                
                            "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                            // "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                            "DSDM"=> $this->sanphamodel-> getDSDM(),               
                            "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                            
                            "page"=> "khachhang/taikhoan/thongtindatsua",
                        ]);
            
        }

        function GioDatHang(){
            
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

            $this ->view("masterpage3",
            [
                "somathang" => $somathang,
                "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),                
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                // "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                "DSDM"=> $this->sanphamodel-> getDSDM(),               
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                                
                "page"=> "khachhang/taikhoan/thongtindatsua",
            ]);
        
        }

        //Xác nhận gửi yêu cầu đặt lịch sửa
        public function XacNhanDatLichSua(){

                // khách hàng CHƯA đăng nhập 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
                ]);
            }
            //khách hàng ĐÃ đăng nhập
            else{
                //láy thông tin giỏ đặt hàng

            
                $tongtien = 0; 
                for ($i=0; $i < sizeof($_SESSION['dathang']) ; $i++) { 
                    $thanhtien = 0;
                    $thanhtien = $_SESSION['dathang'][$i][2]*$_SESSION['dathang'][$i][3];
                    $tongtien += $thanhtien;
                }
                    
                
                
                $ngayhientai = date_create(date('d-m-Y'));
                $ngayyeucau = $ngayhientai->format('Y-m-d');
                
                $tinhtranghd = 'Yêu cầu sửa chữa';

                $ngaygiohientai = date_create(date('d-m-Y H:i:s'));
                $ngaygiodieuphoi = $ngaygiohientai->format('Y-m-d H:i:s');

                $kqCreatePBH = $this ->giohangmodel -> CreatePhieuBH($_SESSION["makh"], $tongtien, $ngayyeucau, $tinhtranghd, $ngaygiodieuphoi); 

                //lấy mã hóa đơn mới tạo
                $kqgethd = $this ->giohangmodel -> GetHDBH($_SESSION["makh"]);  
                if(mysqli_num_rows($kqgethd)){
                    while ($row = mysqli_fetch_array($kqgethd)){
                        $maph = $row["mahd"];
                    }
                } 

                for ($i=0; $i < sizeof($_SESSION['dathang']) ; $i++) { 
                    $masp = $_SESSION['dathang'][$i][4];
                    $dongia = $_SESSION['dathang'][$i][2];
                    $soluong = $_SESSION['dathang'][$i][3];
                    $thanhtienc =  $_SESSION['dathang'][$i][2]*$_SESSION['dathang'][$i][3];

                    $kqCreateCTPBH = $this ->giohangmodel ->  CreateCTPhieuBH($masp, $maph, $soluong, $dongia, $thanhtienc); 
                }


                //GỬI MAIL ============================

            $ketquamail = $this->usermodel->thongtin($_SESSION["makh"]);
            if(mysqli_num_rows($ketquamail)){
                while ($row = mysqli_fetch_array($ketquamail)){
                    $email = $row["email"];
                    $sdt = $row["sdtkhachhang"];
                    $tenkhachhang = $row["tenkhachhang"];
                }
            }
            if($email != null){
                $to =  $email;
                $subject = 'đơn hàng #DHCCDT'.$maph.'PRR đã đặt sửa chữa thành công!';
                $txt = ' <h3 style="coler:red;"> Xin chào '.$tenkhachhang.', </h3> đơn hàng đặt lịch sửa #DHCCDT'.$maph.'PRR của bạn đã được ghi nhận thành công ngày '.$ngayyeucau.'. 
                <br> Nhân viên CapCuuDienThoai.vn sẽ liên hệ hỗ trợ bạn sớm nhất!
                <p> Cám ơn bạn đã tin tưởng CapCuuDienThoai.vn .  </p>            

                <table style="border-collapse:collapse;border-color:#9ABAD9;border-spacing:0;table-layout: fixed; width: 756px"
                    class="tg">
                    <colgroup>
                        <col style="width: 347px">
                        <col style="width: 168px">
                        <col style="width: 86px">
                        <col style="width: 155px">
                    </colgroup>
                    <thead>
                        <tr>
                            <th
                                style="background-color:#409cff;border-color:#000000;border-style:solid;border-width:0px;color:#fff;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                Tên Sản Phẩm</th>
                            <th
                                style="background-color:#409cff;border-color:#000000;border-style:solid;border-width:0px;color:#fff;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                Đơn Giá</th>
                            <th
                                style="background-color:#409cff;border-color:#000000;border-style:solid;border-width:0px;color:#fff;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                Số Lượng</th>
                            <th
                                style="background-color:#409cff;border-color:#000000;border-style:solid;border-width:0px;color:#fff;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                Thành Tiền</th>
                        </tr>
                    </thead>
                    <tbody>';

                    for ($i=0; $i < sizeof($_SESSION['dathang']) ; $i++) { 
                        $tennanpham = $_SESSION['dathang'][$i][1];
                        $masp = $_SESSION['dathang'][$i][4];
                        $dongia = $_SESSION['dathang'][$i][2];
                        $soluong = $_SESSION['dathang'][$i][3];
                        $thanhtienc =  $_SESSION['dathang'][$i][2]*$_SESSION['dathang'][$i][3];

                    $txt .='<tr>
                            <td
                                style="background-color:#EBF5FF;border-color:#000000;border-style:solid;border-width:0px;color:#444;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                '.$tennanpham.'</td>
                            <td
                                style="background-color:#EBF5FF;border-color:#000000;border-style:solid;border-width:0px;color:#444;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                '.number_format($dongia, 0,',','.').' vnđ </td>
                            <td
                                style="background-color:#EBF5FF;border-color:#000000;border-style:solid;border-width:0px;color:#444;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                '.$soluong.'</td>
                            <td
                                style="background-color:#EBF5FF;border-color:#000000;border-style:solid;border-width:0px;color:#444;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                '.number_format($thanhtienc, 0,',','.').' vnđ </td>
                        </tr>';
                    
                    }


                    $txt .=' <tr>
                            <td style="background-color:#EBF5FF;border-color:#000000;border-style:solid;border-width:0px;color:#444;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal"
                                colspan="3">Tổng:</td>
                            <td
                                style="background-color:#EBF5FF;border-color:#000000;border-style:solid;border-width:0px;color:#444;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                '.number_format($tongtien, 0,',','.').' vnđ </td>
                        </tr>



                </tbody>
                </table>


                <br> <img style="max-width: 400px;" src="https://firebasestorage.googleapis.com/v0/b/quanlynhansu-10734.appspot.com/o/Khoaluantotnghiep%2Flogo_ccdt_v3.png?alt=media&token=fff83bf9-5470-4570-aa5a-ab5a3df6c33d" alt="logo images">';
                $cc = "vuvanhongson@gmail.com";
                $this ->mailmodel -> SendMail($to, $subject, $txt, $cc);  
            }
            //GỬI MAIL ============================

             
            // GỬI TIN NHÁN SMS======================================================
            // $sdt = $_POST["sodienthoai"];                   
            // $txtsms = "Capcuudienthoai.vn cam on anh/chi $tenkhachhang da su dung dich vu cua chung toi, don dat lich sua chua #DHCCDT$maph-PRR da gui thanh cong! Nhan vien se lien he voi quy khach som nhat.";
            $txtsms = "Capcuudienthoai.vn cam on anh/chi da su dung dich vu, don dat lich sua chua #DHCCDT$maph-PRR  da gui yeu cau thanh cong!";
            $this ->smsmodel -> SendSMS($sdt, $txtsms);  
            // GỬI TIN NHÁN SMS======================================================



                unset($_SESSION['dathang']);
                // var_dump($ngayhientai);
                // var_dump($ngayyeucau);
                $this ->view("khachhang/taikhoan/thanhtoangiohang",[
                    "page" => "khachhang/taikhoan/thanhtoangiohang",
                ]);
                
            
            }
            
            
      
         }








    }
?>