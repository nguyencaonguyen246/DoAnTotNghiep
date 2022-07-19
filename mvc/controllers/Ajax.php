<?php
    class Ajax extends Controller{
       public $adminmodel;
       public $kythuatmodel;
       public $usermodel;
       public $sanphamodel;
       public $giohangmodel;
       public function __construct(){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
        // model
    
            $this->adminmodel = $this -> model ("AdminModel");
            $this->kythuatmodel = $this -> model("KyThuatModel");
            $this->usermodel = $this -> model ("UserModel");
            $this->sanphamodel = $this -> model ("SanPhamModel");
            $this->giohangmodel = $this -> model ("GioHangModel");
        }
        public function KtraTrungMK(){

            $matkhau = $_POST["matkhau"];
            $re_matkhau = $_POST["re_matkhau"];
            if($matkhau != $re_matkhau){
                echo "Mật khẩu không khớp";
            }
            else
            {
                echo " ";
            }
        }
        public function ktraMatKhau(){
            $matkhaucu =  $_POST["passold"]; 
            $makh = $_POST["makh"];    
            
            $ketqua = $this->usermodel->thongtin($makh);
            if(mysqli_num_rows($ketqua)){
                while ($row = mysqli_fetch_array($ketqua)){
                    $matkhau = $row["matkhau"];
                    
                }
            }

            if(password_verify($matkhaucu, $matkhau) == false){
                echo "Mật khẩu cũ sai!";
            }
            else
                echo " ";
        }

        public function ktraSodienthoai(){
            $sdtkhachhang = $_POST["sdtkhachhang"];
            echo $this -> usermodel -> ktraSodienthoai($sdtkhachhang);
        }
        public function ktraSodienthoaiNV(){
            $sdtnhanvien = $_POST["sdtnhanvien"];
            echo $this -> adminmodel -> ktraSodienthoaiNV($sdtnhanvien);
        }
        public function ktraDoDaiSdt(){
            $sdtkhachhang = $_POST["sdtkhachhang"];
            if(strlen($sdtkhachhang) != 10){
                echo "Số điện thoại phải đủ 10 số!";
            }
            else 
            {
                echo " ";
            }           

        }
        public function ktraTendangnhapNV(){
            $tendangnhap = $_POST["tendangnhap"];
            echo $this -> adminmodel -> ktraTendangnhap($tendangnhap);
        }
        // public function ktraSodienthoai(){
        //     $sdtkhachhang = $_POST["sdtkhachhang"];
        //     echo $this -> adminmodel -> ktraSodienthoai($sdtkhachhang);
        // }
        public function ktrasoluongton(){
            $soluongton = $_POST["soluongton"];
            $ketqua = " ";
            if($soluongton < 0){
                echo "Số lượng kho phải lớn hơn hoặc bằng 0";
            }
            else{
                echo $ketqua;
            }
        }
        public function ktradongia(){
            $dongia = $_POST["dongia"];
            $ketqua = " ";
            if($dongia <= 1000){
                echo "Đơn giá phải lớn hơn 1000 VNĐ";
            }
            else{
                echo $ketqua;
            }
        }

        public function ktraDoDaiSdtNV(){
            $sdtnhanvien = $_POST["sdtnhanvien"];
            if(strlen($sdtnhanvien) != 10){
                echo "Số điện thoại phải đủ 10 số!";
            }
            else 
            {
                echo " ";
            }           

        }
        public function ktraDoDaiSdtKH(){
            $sdtkhachhang = $_POST["sdtkhachhang"];
            if(strlen($sdtkhachhang) != 10){
                echo "Số điện thoại phải đủ 10 số!";
            }
            else 
            {
                echo " ";
            }           

        }
        public function ktraDoDaiSdtNCC(){
            $sdtncc = $_POST["sdtncc"];
            if(strlen($sdtncc) != 10){
                echo "Số điện thoại phải đủ 10 số!";
            }
            else 
            {
                echo " ";
            }           

        }
        public function ktrabaohanh(){
            $thoihanbaohanh = $_POST["thoihanbaohanh"];
            $ketqua = " ";
            if($thoihanbaohanh < 0){
                echo "Thời gian bảo hành phải từ 0 tháng trở lên";
            }
            else{
                echo $ketqua;
            }
        }
        public function ktrangay(){
            $ngaysinh = date_create($_POST['ngaysinh']);
            $ngayhientai = date_create(date('d-m-Y'));
            $khoang = date_diff($ngaysinh, $ngayhientai); //tính ra khoảng thời gian giữa 2 mốc thời gian
            if(( $khoang->format('%Y'))<18){
                echo "Chưa đủ tuổi";
            }
            else{
                echo " ";
            }
            // echo $ngayhientai->format('d-m-Y');
            // echo $khoang->format('%Y');
            // echo $ngaysinh -> format('Y-m-d');
        }
        public function ktratendm(){
            $tendm = $_POST['tendm'];
            echo $this -> adminmodel -> ktratendm($tendm);
        }
        public function ktratennsx(){
            $tennsx = $_POST['tennsx'];
            echo $this -> adminmodel -> ktratennsx($tennsx);
        }
        public function ktratenncc(){
            $tenncc = $_POST['tenncc'];
            echo $this -> adminmodel -> ktratenncc($tenncc);
        }
        public function ktratenloai(){
            $tenloai = $_POST['tenloai'];
            echo $this -> adminmodel -> ktratenloai($tenloai);
        }
        public function  ktratenkhuyenmai(){
            $tenkhuyenmai = $_POST['tenkhuyenmai'];
            echo $this -> adminmodel -> ktratenkhuyenmai($tenkhuyenmai);
        }
        public function ktrangaybatdau(){
            $thoigianbatdau = $_POST['thoigianbatdau'];
            $ngayhientai = date('d-m-Y');
            if(strtotime($thoigianbatdau) - strtotime($ngayhientai) < 0){
                echo "Ngày bắt đầu phải lớn hơn <br> hoặc bằng ngày hiện tại";
            }
            else{
                echo " ";
            }
        }
        public function SPYeuThich(){   
            if(!isset($_SESSION["makh"])){
                //echo "Vui lòng quý khách đăng nhập để thêm sản phẩm yêu thích!"; 
                // echo json_encode("Hello");              
            }
            else {
                    $maspyt = $_POST['maspyt'];

                    //Kiểm tra tòn tại mã SP
                    $kqktMASP = $this ->sanphamodel -> getMaSPYT($_SESSION["makh"], $maspyt); //kiểm tra mã sản phẩm tồn tại trong giỏ hàng không
                    if(mysqli_num_rows($kqktMASP)){
                        while ($row = mysqli_fetch_array($kqktMASP)){
                            $masp = $row["masp"];                 
                        }
                    }
                if(isset($masp)) // mã sản phẩm đã tồn tại trong gio hang
                {
                    //da ton tai ma san pham
                }
                else // mã sản phẩm chưa có trong giỏ hàng
                {
                    // echo "Đã thêm sản phẩm yêu thích";       
                    $this -> sanphamodel -> SanPhamYeuThich($_SESSION["makh"], $maspyt);
                }       

            } 
            
        }
        public function ThemSPGioHang(){

            $masp = $_POST['masp'];
            $makh = $_POST['makh'];

   
           $solg = 1;

           //kiểm tra giỏ hàng đã tòn tại chưa???

           $kqgetGH = $this ->giohangmodel -> getmaGH($makh);  
           if(mysqli_num_rows($kqgetGH)){
                while ($row = mysqli_fetch_array($kqgetGH)){
                    $magh = $row["magh"];
                }
            }

            if(!isset($magh))
            {
                $kqCreateGH = $this ->giohangmodel -> CreateGH($makh);  
                $kqgetGH = $this ->giohangmodel -> getmaGH($makh);  
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

            $ketquaSuaTongTien = $this ->giohangmodel -> suaTongTienGH($makh, $tongtien); 

            // $this ->view("masterpage",
            // [
            //     "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
            //     "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
            //     "page"=> "khachhang/taikhoan/giohang",
            // ]);
            // tính số mặt hàng
            $trang = 1;

            //láy mã giỏ hàng
            $kqgetGH = $this ->giohangmodel -> getmaGH($makh);  
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

            // $this ->view("masterpage3",
            // [                    
            //     "GH"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
            //     "CART"=> $this->giohangmodel ->getGH($_SESSION["makh"]),
            //     "TongTien1"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
            //     "TongTien2"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
            //     "page"=> "khachhang/taikhoan/cart",
            //     "TongTien"=> $this->giohangmodel ->getTongTien($_SESSION["makh"]),
            //     "somathang" => $somathang,
            // ]);
            //======================================

        }
        // public function demsanpham(){
        //     if(isset($_SESSION["dathang"]))
        //     {
        //         $a = $this -> giohangmodel -> countCTGH_new($_SESSION['makh']);
        //         $b = sizeof($_SESSION['dathang']);
        //         $ketqua = $a + $b;
        //         echo $ketqua;
        //     }
        //     else
        //     {
        //         echo $this -> giohangmodel -> countCTGH_new($_SESSION['makh']);
        //     }
        // }

    }
?>