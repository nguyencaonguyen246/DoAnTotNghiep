<?php

class SanPhamController extends Controller{
    protected $sotrang = 1;
    public $sanphamodel;
    public $giohangmodel;
    public $mailmodel;
    public $smsmodel;
    public $adminmodel;
    public function __construct(){
        // model
        $this->giohangmodel = $this -> model ("GioHangModel");
        $this->sanphamodel = $this -> model ("SanPhamModel");
        $this->mailmodel = $this -> model ("MailModel");
        $this->usermodel = $this -> model ("UserModel");
        $this->smsmodel = $this -> model ("SMSModel");
        $this->adminmodel = $this -> model ("AdminModel");
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
    public function home(){
        $this ->view("masterpage3",
        [
            "page"=>"khachhang/Home/home2",
        ]);
    }
    
    public function danhSachSP(){

        // view
        $this ->view("masterpage3",
        [
            "SP"=> $this->sanphamodel-> getDSSP(),
            "page"=> "khachhang/SanPham/sanphamview",
        ]);
    }

    public function limitSP(){
        //$trang = $_GET["trang"];       
        $trang = 1;
        // view
        $this ->view("masterpage3",
        [
            "LTSP"=> $this->sanphamodel-> getLIMITSP($trang),
            "page"=> "khachhang/SanPham/sanphamview",
        ]);
    }

    function newHome(){
        $trang = 1;
        // view
        $this ->view("masterpage3",
        [
            "LTSP"=> $this->sanphamodel-> getLIMITSP($trang),
            "page"=> "khachhang/Home/home2",
        ]);
    }

    public function limitSP2($trang){
        //$trang = $_GET["trang"];
        settype ($trang, "int");
        // view
        $this ->view("viewSP",
        [
            "LTSP"=> $this->sanphamodel-> getLIMITSP($trang),
            "page"=> "khachhang/SanPham/xemthem",
        ]);
    }

    public function limitSP3($trang){
        //$trang = $_GET["trang"];
        settype ($trang, "int");
        // view
        $this ->view("khachhang/SanPham/productPlusView",
        [
            "LTSP"=> $this->sanphamodel-> getLIMITSP($trang),
            "page"=> "khachhang/SanPham/productPlusView",
        ]);
    }

    function ChiTietSanPham($id, $maloai){
        // view
        //echo $id;
        //echo $maloai;

        $this ->view("masterpage3",
        [
            "LoaiSPLienQuan" =>$this->sanphamodel-> getLoaiSPlienquan($maloai),
            "Detail"=> $this->sanphamodel-> getDetail($id),
            "MoTa"=> $this->sanphamodel-> getMoTa($id),
             "page"=> "khachhang/SanPham/chitietsanpham",
        ]);
    }

    //chi tiết sản phẩm giao diện mới.
    function productDetail($id, $maloai){
        // view
        //echo $id;
        //echo $maloai;

        // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "TongTien"=> 0,
                "somathang" => "0",
                "LoaiSPLienQuan" =>$this->sanphamodel-> getLoaiSPlienquan($maloai),
                "Detail"=> $this->sanphamodel-> getDetail($id),
                "MoTa"=> $this->sanphamodel-> getMoTa($id),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(),
                "DSNSX"=> $this->sanphamodel-> getDSNSX(),  
                "page"=> "khachhang/SanPham/productDetail",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
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

                $this ->view("masterpage3",
                [
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,
                    "LoaiSPLienQuan" =>$this->sanphamodel-> getLoaiSPlienquan($maloai),
                    "Detail"=> $this->sanphamodel-> getDetail($id),
                    "MoTa"=> $this->sanphamodel-> getMoTa($id),
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/SanPham/productDetail",
                ]);
        }
       
    }

 public function limitProductGrid(){ // giao dien moi==================
            // view
        //echo $id;
        //echo $maloai;

        // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "TongTien"=> 0,
                "somathang" => "0",
                "DSSP1"=> $this->sanphamodel-> getLIMITSP(1),
                    "DSSP2"=> $this->sanphamodel-> getDSSP(), 
                    "SPTB"=> $this->sanphamodel-> getSPTB(),    
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
                    "DSDM"=> $this->sanphamodel-> getDSDM(),
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "page"=> "khachhang/SanPham/productGrid",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
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

                $this ->view("masterpage3",
                [
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,     
                    "DSSP1"=> $this->sanphamodel-> getLIMITSP(1),
                    "DSSP2"=> $this->sanphamodel-> getDSSP(), 
                    "SPTB"=> $this->sanphamodel-> getSPTB(),    
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),
                    "DSDM"=> $this->sanphamodel-> getDSDM(),    
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]), 
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(),   
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/SanPham/productGrid",
                ]);
            }
    }

    //Tìm Kiếm
    public function TimKiemSP(){
        
         // khách hàng CHƯA đăng nhập 
         if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "TongTien"=> 0,
                "somathang" => "0",
                "DSSP1"=> $this->sanphamodel-> findSanPham($_POST['search']),
                    "DSSP2"=> $this->sanphamodel-> findSanPham($_POST['search']), 
                    "SPTB"=> $this->sanphamodel-> getSPTB(),    
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
                    "DSDM"=> $this->sanphamodel-> getDSDM(), 
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(),   
                "page"=> "khachhang/SanPham/productGrid",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
        else{
        //láy mã giỏ hàng

        
        $kqInsertLS = $this ->sanphamodel -> iLichSuTimKiem($_SESSION["makh"], $_POST['search']);  
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
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,     
                    "DSSP1"=> $this->sanphamodel-> findSanPham($_POST['search']),
                    "DSSP2"=> $this->sanphamodel-> findSanPham($_POST['search']),
                    "SPTB"=> $this->sanphamodel-> getSPTB(),    
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]), 
                    "DSDM"=> $this->sanphamodel-> getDSDM(),
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]),    
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(),    
                    "page"=> "khachhang/SanPham/productGrid",
                ]);
            }
        
    }

    // View san pham theo DANH MUC
    public function ViewSanPhamDM($madm){
        
        // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
           $trang = 1;
           // view
           $this ->view("masterpage3",
           [
               "TongTien"=> 0,
               "somathang" => "0",
               "DSSP1"=> $this->sanphamodel-> viewSanPhamDM($madm),
                   "DSSP2"=> $this->sanphamodel-> viewSanPhamDM($madm), 
                   "SPTB"=> $this->sanphamodel-> getSPTB(),    
                   "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
                   "DSDM"=> $this->sanphamodel-> getDSDM(),
                   "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                   "DSNSX"=> $this->sanphamodel-> getDSNSX(),  
               "page"=> "khachhang/SanPham/productGrid",
           ]);
       }
       //khách hàng ĐÃ đăng nhập
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

               $this ->view("masterpage3",
               [
                   "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                   "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                   "somathang" => $somathang,     
                   "DSSP1"=> $this->sanphamodel-> viewSanPhamDM($madm), 
                   "DSSP2"=> $this->sanphamodel-> viewSanPhamDM($madm), 
                   "SPTB"=> $this->sanphamodel-> getSPTB(),    
                   "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                   "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]), 
                   "DSDM"=> $this->sanphamodel-> getDSDM(),
                   "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]),    
                   "DSLSPh"=> $this->sanphamodel-> getDSLSP(),  
                   "DSNSX"=> $this->sanphamodel-> getDSNSX(),   
                   "page"=> "khachhang/SanPham/productGrid",
               ]);
           }
       
   }

   //View San Pham theo Loại San Pham
   public function ViewSanPhamLSP($maloai){
        
    // khách hàng CHƯA đăng nhập 
    if(!isset($_SESSION['makh'])){
       $trang = 1;
       // view
       $this ->view("masterpage3",
       [
           "TongTien"=> 0,
           "somathang" => "0",
           "DSSP1"=> $this->sanphamodel-> viewSanPhamLSP($maloai),
               "DSSP2"=> $this->sanphamodel-> viewSanPhamLSP($maloai),
               "SPTB"=> $this->sanphamodel-> getSPTB(),    
               "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
               "DSDM"=> $this->sanphamodel-> getDSDM(),
               "DSLSPh"=> $this->sanphamodel-> getDSLSP(),  
               "DSNSX"=> $this->sanphamodel-> getDSNSX(),   
           "page"=> "khachhang/SanPham/productGrid",
       ]);
   }
   //khách hàng ĐÃ đăng nhập
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

           $this ->view("masterpage3",
           [
               "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
               "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
               "somathang" => $somathang,     
               "DSSP1"=> $this->sanphamodel-> viewSanPhamLSP($maloai),
               "DSSP2"=> $this->sanphamodel-> viewSanPhamLSP($maloai), 
               "SPTB"=> $this->sanphamodel-> getSPTB(),    
               "DSLSP"=> $this->sanphamodel-> getDSLSP(),
               "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),  
               "DSDM"=> $this->sanphamodel-> getDSDM(),
               "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]),
               "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
               "DSNSX"=> $this->sanphamodel-> getDSNSX(),        
               "page"=> "khachhang/SanPham/productGrid",
           ]);
       }
   
    }

    //
    //Tìm Kiếm theo lịch sử đã tìm
    public function TimKiemLSSP($mals){
        
        // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
           $trang = 1;
           // view
           $this ->view("masterpage3",
           [
               "TongTien"=> 0,
               "somathang" => "0",
               "DSSP1"=> $this->sanphamodel-> findSanPham($_POST['search']),
                   "DSSP2"=> $this->sanphamodel-> findSanPham($_POST['search']), 
                   "SPTB"=> $this->sanphamodel-> getSPTB(),    
                   "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
                   "DSDM"=> $this->sanphamodel-> getDSDM(),  
                   "DSLSPh"=> $this->sanphamodel-> getDSLSP(),  
                   "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
               "page"=> "khachhang/SanPham/productGrid",
           ]);
       }
       //khách hàng ĐÃ đăng nhập
       else{
       //láy mã giỏ hàng

       
       // lấy nội dung lịch sử tìm kiếm
       $kqgetNDTIM = $this ->sanphamodel -> sLichSuTimKiem($mals);  
               if(mysqli_num_rows($kqgetNDTIM)){
                       while ($row = mysqli_fetch_array($kqgetNDTIM)){
                           $noidung = $row["noidungtim"];
                       }
                   }
       
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
                   "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                   "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                   "somathang" => $somathang,     
                   "DSSP1"=> $this->sanphamodel-> findSanPham($noidung),
                   "DSSP2"=> $this->sanphamodel-> findSanPham($noidung),
                   "SPTB"=> $this->sanphamodel-> getSPTB(),    
                   "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                   "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]), 
                   "DSDM"=> $this->sanphamodel-> getDSDM(), 
                   "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]),  
                   "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                   "DSNSX"=> $this->sanphamodel-> getDSNSX(),     
                   "page"=> "khachhang/SanPham/productGrid",
               ]);
           }
       
   }

   //Xoa Lich Su Tim Kiem
   public function XoaTimKiem($mals){
        
    // khách hàng CHƯA đăng nhập 
    if(!isset($_SESSION['makh'])){
       $trang = 1;
       // view
       $this ->view("masterpage3",
       [
           "TongTien"=> 0,
           "somathang" => "0",
           "DSSP1"=> $this->sanphamodel-> findSanPham($_POST['search']),
               "DSSP2"=> $this->sanphamodel-> findSanPham($_POST['search']), 
               "SPTB"=> $this->sanphamodel-> getSPTB(),    
               "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
               "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
               "DSDM"=> $this->sanphamodel-> getDSDM(),  
               "DSNSX"=> $this->sanphamodel-> getDSNSX(),  
           "page"=> "khachhang/SanPham/productGrid",
       ]);
   }
   //khách hàng ĐÃ đăng nhập
   else{
   //láy mã giỏ hàng

   
   // Xoa lịch sử tìm kiếm
   $kqgetNDTIM = $this ->sanphamodel -> dLichSuTimKiem($mals);  
           
   
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
               "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
               "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
               "somathang" => $somathang,     
               "DSSP1"=> $this->sanphamodel-> getLIMITSP(1),
                    "DSSP2"=> $this->sanphamodel-> getDSSP(), 
               "SPTB"=> $this->sanphamodel-> getSPTB(),    
               "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
               "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]), 
               "DSDM"=> $this->sanphamodel-> getDSDM(),
               "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]),   
               "DSLSPh"=> $this->sanphamodel-> getDSLSP(),  
               "DSNSX"=> $this->sanphamodel-> getDSNSX(),    
               "page"=> "khachhang/SanPham/productGrid",
           ]);
       }
   
    }


    function SanPhamYeuThich(){
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
                "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "SPYT" => $this->sanphamodel-> getdsSPYT($_SESSION["makh"]), 
                "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "somathang" => $somathang,
                "page"=> "khachhang/SanPham/sanphamyeuthich",
            ]);
        }
    }


    function XoaSanPhamYeuThich($id){
            // view 

            //xóa sản phẩm yêu thích
            $ketqua = $this ->sanphamodel -> XoaSPYT($_SESSION["makh"], $id);  


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
                    "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,
                    "SPYT" => $this->sanphamodel-> getdsSPYT($_SESSION["makh"]), 
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "page"=> "khachhang/SanPham/sanphamyeuthich",
                ]);
                
            
        }

        function BaoHanh(){
            // khách hàng CHƯA đăng nhập 
        if(!isset($_SESSION['makh'])){
            $this ->view("khachhang/taikhoan/dangnhap",[
                "page" => "khachhang/taikhoan/dangnhap",
                
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
                "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                "DSDM"=> $this->sanphamodel-> getDSDM(), 
                "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),
                "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]), 
                "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                "BHSP"=> $this->giohangmodel ->GetSPBaoHanh($_SESSION["makh"]), 
                "BHHD"=> $this->giohangmodel ->GetDSHoaDon($_SESSION["makh"]), 
                "page"=> "khachhang/taikhoan/baohanh",
            ]);
            }
        }


        //View San Pham theo Loại San Pham
        public function ViewSanPhamNSX($mansx){
                
            // khách hàng CHƯA đăng nhập 
            if(!isset($_SESSION['makh'])){
            $trang = 1;
            // view
            $this ->view("masterpage3",
            [
                "TongTien"=> 0,
                "somathang" => "0",
                "DSSP1"=> $this->sanphamodel-> viewSanPhamNSX($mansx),
                // "DSSP2"=> $this->sanphamodel-> viewSanPhamLSP($maloai),
                "SPTB"=> $this->sanphamodel-> getSPTB(),    
                "DSLSP"=> $this->sanphamodel-> getDSLSP(),  
                "DSDM"=> $this->sanphamodel-> getDSDM(),
                "DSLSPh"=> $this->sanphamodel-> getDSLSP(),   
                "DSNSX"=> $this->sanphamodel-> getDSNSX(),                 
                "page"=> "khachhang/SanPham/productGrid",
            ]);
        }
        //khách hàng ĐÃ đăng nhập
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

                $this ->view("masterpage3",
                [
                    "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
                    "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
                    "somathang" => $somathang,     
                    "DSSP1"=> $this->sanphamodel-> viewSanPhamNSX($mansx),
                    // "DSSP2"=> $this->sanphamodel-> viewSanPhamLSP($maloai), 
                    "SPTB"=> $this->sanphamodel-> getSPTB(),    
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(),
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),  
                    "DSDM"=> $this->sanphamodel-> getDSDM(),
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]),
                    "DSLSPh"=> $this->sanphamodel-> getDSLSP(),    
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(),  
                    "page"=> "khachhang/SanPham/productGrid",
                ]);
            }
        
            }

            public function ThongTinBaoHanh($mahd, $macthd){
            
               
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
                        "SPBH"=> $this->giohangmodel ->GetThongTinBaoHanh($mahd, $macthd),
                        "page"=> "khachhang/taikhoan/xacnhanbaohanh",
                    ]);
                }
         
            }


            public function XacNhanBaoHanh($mahd, $macthd){
            
               //láy thông tin bảo hành
                $kqgetGH = $this ->giohangmodel -> GetThongTinBaoHanh($mahd, $macthd);  
                if(mysqli_num_rows($kqgetGH)){
                    while ($row = mysqli_fetch_array($kqgetGH)){
                        $masp = $row["masp"];
                        $dongia = $row["dongia"];
                        $ngayyeucau = $row["ngaylap"];
                    }
                } 
                $ngayhientai = date_create(date('d-m-Y'));
                $ngayyeucau1 = $ngayhientai->format('Y-m-d');
                $tongtien = 0;
                $tinhtranghd = 'Yêu cầu bảo hành';

                $ngaygiohientai = date_create(date('d-m-Y H:i:s'));
                $ngaygiodieuphoi = $ngaygiohientai->format('Y-m-d H:i:s');


                //lấy thông tin số lượng
                //function GetCTHD($mahd, $mact)
                $kqgetcthd = $this ->giohangmodel -> GetCTHD($mahd, $macthd);  
                if(mysqli_num_rows($kqgetcthd)){
                    while ($row = mysqli_fetch_array($kqgetcthd)){
                        $soluongct = $row["soluong"];
                    }
                }
                
                //số lượng - 1 > 0 -> cập nhật số lượng trừ đi một 

                if(($soluongct - 1) <= 0)
                {
                    //cập nhật tình trạng sản phẩm hóa đon
                    $tinhtrang = "Đã bảo hành";
                    $kqUpdateTTSP = $this ->giohangmodel -> suaTrangThaiBaoHanh($mahd, $macthd, $tinhtrang);  
                }
                else
                {
                    $soluongct = $soluongct -1;
                    $kqUpdateSLSP = $this ->giohangmodel -> suaSoLuongBaoHanh($mahd, $macthd,  $soluongct);  

                }
                // số lượng -1 <= 0 cập nhật lại đã bảo hành
                //function suaSoLuongBaoHanh($mahd, $mact, $soluong){

                

                

                $kqCreatePBH = $this ->giohangmodel -> CreatePhieuBH($_SESSION["makh"], $tongtien, $ngayyeucau, $tinhtranghd,  $ngaygiodieuphoi); 
                

                //lấy mã hóa đơn mới tạo
                $kqgethd = $this ->giohangmodel -> GetHDBH($_SESSION["makh"]);  
                if(mysqli_num_rows($kqgethd)){
                    while ($row = mysqli_fetch_array($kqgethd)){
                        $maph = $row["mahd"];
                    }
                } 

                $soluong = 1;
                $thanhtien = 0;

                $kqCreateCTPBH = $this ->giohangmodel ->  CreateCTPhieuBH($masp, $maph, $soluong, $dongia, $thanhtien); 




                   //GỬI MAIL ============================
                //lấy thông tin sản phẩm
                   $ketquactsp = $this->sanphamodel-> getMoTa($masp);
                    if(mysqli_num_rows($ketquactsp)){
                        while ($row = mysqli_fetch_array($ketquactsp)){
                            $tensanpham = $row["tieude"];
                        }
                    }
                //lấy thông tin khách hàng
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
                        $subject = 'Yêu cầu bảo hành #DHCCDT'.$maph.'PRR đã ghi nhận thành công!';
                        $txt = ' <h3 style="coler:red;"> Xin chào '.$tenkhachhang.', </h3> Yêu cầu bảo hành #DHCCDT'.$maph.'PRR của bạn đã được ghi nhận thành công ngày '.$ngaygiodieuphoi.'. 
                        <br> Nhân viên CapCuuDienThoai.vn sẽ liên hệ hỗ trợ bạn sớm nhất!
                        <p> Cám ơn bạn đã tin tưởng CapCuuDienThoai.vn .  </p>            

                        <table style="border-collapse:collapse;border-color:#C44D58;border-spacing:0;table-layout: fixed; width: 756px" class="tg">
                            <colgroup>
                                <col style="width: 347px">
                                <col style="width: 168px">
                                <col style="width: 86px">
                                <col style="width: 155px">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th
                                        style="background-color:#FE4365;border-color:#ffffff;border-style:solid;border-width:1px;color:#fdf6e3;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        Sản Phẩm Bảo Hành</th>
                                    <th
                                        style="background-color:#FE4365;border-color:#ffffff;border-style:solid;border-width:1px;color:#fdf6e3;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        Đơn Giá</th>
                                    <th
                                        style="background-color:#FE4365;border-color:#ffffff;border-style:solid;border-width:1px;color:#fdf6e3;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        Số Lượng</th>
                                    <th
                                        style="background-color:#FE4365;border-color:#ffffff;border-style:solid;border-width:1px;color:#fdf6e3;font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td
                                        style="background-color:#FFA4A0;border-color:#ffffff;border-style:solid;border-width:1px;color:#002b36;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        <p>'.$tensanpham.'</p></td>
                                    <td
                                        style="background-color:#FFA4A0;border-color:#ffffff;border-style:solid;border-width:1px;color:#002b36;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        <p>'.number_format($dongia, 0,',','.').' vnđ </p></td>
                                    <td
                                        style="background-color:#FFA4A0;border-color:#ffffff;border-style:solid;border-width:1px;color:#002b36;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        <p>1</p></td>
                                    <td
                                        style="background-color:#FFA4A0;border-color:#ffffff;border-style:solid;border-width:1px;color:#002b36;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        <p> 0 vnđ </p></td>
                                </tr>
                                <tr>
                                    <td style="background-color:#F9CDAD;border-color:#ffffff;border-style:solid;border-width:1px;color:#002b36;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal"
                                        colspan="3">Tổng:</td>
                                    <td
                                        style="background-color:#F9CDAD;border-color:#ffffff;border-style:solid;border-width:1px;color:#002b36;font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:center;vertical-align:top;word-break:normal">
                                        0 vnđ</td>
                                </tr>
                            </tbody>
                        </table>


                        <br> <img style="max-width: 400px;" src="https://firebasestorage.googleapis.com/v0/b/quanlynhansu-10734.appspot.com/o/Khoaluantotnghiep%2Flogo_ccdt_v3.png?alt=media&token=fff83bf9-5470-4570-aa5a-ab5a3df6c33d" alt="logo images">';
                        $cc = "vuvanhongson@gmail.com";
                        $this ->mailmodel -> SendMail($to, $subject, $txt, $cc);  
                    }

                    //GỬI MAIL ============================

                    
                    // GỬI TIN NHÁN SMS======================================================                 
                    // $txtsms = "Capcuudienthoai.vn cam on anh/chi $tenkhachhang da su dung dich vu cua chung toi, yeu cau bao hanh #DHCCDT$maph-PRR da ghi nhan thanh cong! Nhan vien se lien he voi quy khach som nhat.";
                    $txtsms = "Capcuudienthoai.vn cam on anh/chi da su dung dich vu, phieu yeu cau bao hanh #DHCCDT$maph-PRR  da gui thanh cong!";
                    $this ->smsmodel -> SendSMS($sdt, $txtsms);  
                    // GỬI TIN NHÁN SMS======================================================
        




                // var_dump($ngayhientai);
                // var_dump($ngayyeucau);
                $this ->view("khachhang/taikhoan/baohanhthanhcong",[
                    "page" => "khachhang/taikhoan/baohanhthanhcong",
                ]);
                
         
            }


            function ChiTietHoaDon($mahd){
                // khách hàng CHƯA đăng nhập 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
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
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                    "DSDM"=> $this->sanphamodel-> getDSDM(), 
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 
                    "BHSP"=> $this->giohangmodel ->GetSPinCTHD($mahd), 
                    "BHHD"=> $this->giohangmodel ->GetDSHoaDon($_SESSION["makh"]), 
                    "page"=> "khachhang/taikhoan/baohanh",
                ]);
                }
            }

            function TimSPBaoHanh(){
                // khách hàng CHƯA đăng nhập 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
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
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                    "DSDM"=> $this->sanphamodel-> getDSDM(), 
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                    "BHSP"=> $this->giohangmodel ->TimSPBH($_SESSION["makh"], $_POST['search']), 

                    "BHHD"=> $this->giohangmodel ->GetDSHoaDon($_SESSION["makh"]), 
                    "page"=> "khachhang/taikhoan/baohanh",
                ]);
                }
            }

            //Tìm sản phẩm bảo hành theo loại
            function LoaiSPBaoHanh($maloai){
                // khách hàng CHƯA đăng nhập 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
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
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                    "DSDM"=> $this->sanphamodel-> getDSDM(), 
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                    "BHSP"=> $this->giohangmodel ->LSPBaoHanh($_SESSION["makh"], $maloai), 

                    "BHHD"=> $this->giohangmodel ->GetDSHoaDon($_SESSION["makh"]), 
                    "page"=> "khachhang/taikhoan/baohanh",
                ]);
                }
            }


            //Tìm sản phẩm bảo hành theo loại
            function DMSPBaoHanh($madm){
                // khách hàng CHƯA đăng nhập 
            if(!isset($_SESSION['makh'])){
                $this ->view("khachhang/taikhoan/dangnhap",[
                    "page" => "khachhang/taikhoan/dangnhap",
                    
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
                    "DSLSP"=> $this->sanphamodel-> getDSLSP(), 
                    "DSDM"=> $this->sanphamodel-> getDSDM(), 
                    "LSTK" => $this->sanphamodel-> sDSLichSuTimKiem($_SESSION["makh"]),
                    "SPYT" => $this->sanphamodel-> getlimitSPYT($_SESSION["makh"]), 
                    "DSNSX"=> $this->sanphamodel-> getDSNSX(), 

                    "BHSP"=> $this->giohangmodel ->MDSPBaoHanh($_SESSION["makh"], $madm), 

                    "BHHD"=> $this->giohangmodel ->GetDSHoaDon($_SESSION["makh"]), 
                    "page"=> "khachhang/taikhoan/baohanh",
                ]);
                }
            }





}    
?>