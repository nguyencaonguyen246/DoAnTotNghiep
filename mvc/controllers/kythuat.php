<?php 
    class kythuat extends Controller{
        public $kythuatmodel;
        public $smsmodel;
        public $mailmodel;
        public function __construct()
        {
            $this->mailmodel = $this -> model ("MailModel");
            $this->smsmodel = $this -> model ("SMSModel");
            $this-> kythuatmodel = $this -> model ("KyThuatModel");
            date_default_timezone_set('Asia/Ho_Chi_Minh'); //Chỉnh về múi giờ Việt Nam
        }
        // ================================ĐĂNG NHẬP - ĐĂNG XUẤT==================================
        public function newHome(){
            $this -> viewkythuat("kythuatdangnhap");
        }
        public function kythuat(){
            $this -> viewkythuat("kythuatdangnhap");
        }
        
        public function kythuatdangnhap(){
            $ketqua_mess = false;
            if(isset($_POST["btndangnhapKT"])){
                $tendangnhap = $_POST["tendangnhap"];
                $matkhau_nhap = $_POST["matkhau"];
                $ketqua = $this->kythuatmodel->dangnhap($tendangnhap);
                if(mysqli_num_rows($ketqua)){
                    while ($row = mysqli_fetch_array($ketqua)){
                        $manv = $row["manv"];
                        $tendangnhap = $row["tendangnhap"];
                        $matkhau = $row["matkhau"];
                        $tennhanvien = $row["tennhanvien"];
                        $macv = $row["macv"];
                        $motacongviec = $row["motacongviec"];
                    }
                    if(password_verify($matkhau_nhap, $matkhau)){
                        $_SESSION["manv_kythuat"] =  $manv;
                        $_SESSION["ten_kythuat"] =  $tennhanvien;
                        $_SESSION["macv_kythuat"] =  $macv;
                        $ketqua_ct = mysqli_fetch_array($this -> kythuatmodel -> hienthiphancong($_SESSION["manv_kythuat"])) ;
                        $ketqua_saupc = mysqli_fetch_array($this -> kythuatmodel -> hienthisauphancong($_SESSION["manv_kythuat"])) ;
                        $this ->viewkythuat("kythuat", [
                            "hienthiphancong" => $this -> kythuatmodel -> hienthiphancong($_SESSION["manv_kythuat"]),
                            "ketqua_saupc" =>   $ketqua_saupc['mahd'],
                            "ketqua" =>  $ketqua_ct['mahd'],  //Chỉ dùng để kiểm tra xem có tồn tại dữ liệu hay không
                            "mota" =>  $motacongviec,
                        ]);
                    }
                    else{
                        $this -> viewkythuat("kythuatdangnhap");
                    }
                }
                else{
                    $this -> viewkythuat("kythuatdangnhap");
                }
            }
        }
        public function dangxuat(){
            if(isset($_SESSION["macv_kythuat"])==3){
                unset($_SESSION["macv_kythuat"]);
                unset($_SESSION["ten_kythuat"]);
                unset($_SESSION["manv_kythuat"]);

                // session_destroy();
                $this -> viewkythuat("kythuatdangnhap");
             }
            else{
                $this ->viewadmin("404");
            }
        }

        // ================================HIỂN THỊ PHÂN CÔNG=====================================
        public function index(){
            if(isset($_SESSION['macv_kythuat'])==3){
                $ketqua_ct = mysqli_fetch_array($this -> kythuatmodel -> hienthiphancong($_SESSION["manv_kythuat"])) ;
                $ketqua_saupc = mysqli_fetch_array($this -> kythuatmodel -> hienthisauphancong($_SESSION["manv_kythuat"])) ;
                $laymota = mysqli_fetch_array($this -> kythuatmodel -> laymotacongviec($_SESSION["manv_kythuat"])) ;
                $motacongviec = $laymota['motacongviec'];
                $this ->viewkythuat("kythuat", [
                    "hienthiphancong" => $this -> kythuatmodel -> hienthiphancong($_SESSION['manv_kythuat']),
                    "ketqua_saupc" =>   $ketqua_saupc['mahd'],
                    "ketqua" =>  $ketqua_ct['mahd'],  //Chỉ dùng để kiểm tra xem có tồn tại dữ liệu hay không
                    "mota" =>  $motacongviec,
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
           
        }
        // =================================XÁC NHẬN PHÂN CÔNG======================================
        public function xacnhanphancong($manv, $mahd){
            if(isset($_SESSION['macv_kythuat'])==3){
                $ketqua_ct = $this -> kythuatmodel -> xacnhanphancong($manv,$mahd);
                
                if($ketqua_ct){
                    $ketqua_saupc = mysqli_fetch_array($this -> kythuatmodel -> hienthisauphancong($_SESSION["manv_kythuat"])) ;
                    $this ->viewkythuat("kythuat", [
                        "hienthiphancong" => $this -> kythuatmodel -> hienthiphancong($_SESSION['manv_kythuat']),
                        "ketqua_saupc" => $ketqua_saupc['mahd'],
                        "ketqua" => $ketqua_ct['mahd'],  //Chỉ dùng để kiểm tra xem có tồn tại dữ liệu hay không
                    ]);
                }
               
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function xacnhanhoanthanh($manv, $mahd){
            if(isset($_SESSION['macv_kythuat'])==3){
                $ketqua_saupc = mysqli_fetch_array($this -> kythuatmodel -> hienthisauphancong($_SESSION["manv_kythuat"])) ;
                if( $ketqua_saupc['mahd'] != null){
                    $ketqua = $this -> kythuatmodel -> xacnhanhoanthanh($manv,$mahd);
                    if($ketqua){
                        $ketqua2 = $this -> kythuatmodel -> update_trangthaiNV($manv); 
                        if($ketqua2){
                            $row = $this -> kythuatmodel -> laykhachhang($manv,$mahd);
                            $khachhang = mysqli_fetch_array($row);
                            $email = $khachhang['email'];
                            $tenkhachhang = $khachhang['tenkhachhang'];
                            $sdtkhachhang = $khachhang['sdtkhachhang'];
                            // ==============================GỬI EMAIL================================
                            if($email != null){
                                $to =  $email;
                                $subject = 'đã hoàn thành việc sửa chữa thiết bị cho hóa đơn #DHCCDT'.$mahd.'PRR';
                                $txt = ' <h3 style="coler:red;"> Xin chào '.$tenkhachhang.', </h3> đơn hàng đặt lịch sửa #DHCCDT'.$mahd.'PRR của quý khách 
                                đã hoàn thành việc sửa chữa, mời quý khách quay lại của hàng để nhận lại thiết bị và hoàn thành thanh toán.
                                <p> Cám ơn bạn đã tin tưởng CapCuuDienThoai.vn .  </p>
                                <br> <img style="max-width: 400px;" src="https://firebasestorage.googleapis.com/v0/b/quanlynhansu-10734.appspot.com/o/Khoaluantotnghiep%2Flogo_ccdt_v3.png?alt=media&token=fff83bf9-5470-4570-aa5a-ab5a3df6c33d" alt="logo images">';
                                $cc = "vuvanhongson@gmail.com";
                                $this ->mailmodel -> SendMail($to, $subject, $txt, $cc);
                            }
                            // ==============================GỬI SMS================================  
                            $txtsms = "Nhan vien da hoan thanh viec sua chua cho hoa don #DHCCDT$mahd-PRR moi quy khach den nhan lai thiet bi va thanh toan.";
                            $this ->smsmodel -> SendSMS($sdtkhachhang, $txtsms);  

                            $this ->viewkythuat("kythuat", 
                            [
                                "hienthiphancong" => $this -> kythuatmodel -> hienthiphancong($_SESSION['manv_kythuat']),
                                "ketqua_saupc" => null,
                                "ketqua" => null,  //Chỉ dùng để kiểm tra xem có tồn tại dữ liệu hay không
                            ]);
                        }
                    }
                }else{
                    $this ->viewkythuat("kythuat", [
                        "hienthiphancong" => null,
                        "ketqua_saupc" => null,
                        "ketqua" => null,  //Chỉ dùng để kiểm tra xem có tồn tại dữ liệu hay không
                    ]);
                }               
            }
            else{
                $this ->viewadmin("404");
            }
        }

        // ==============================LỊCH SỬ PHÂN CÔNG========================================
        public function lichsuphancong(){
            if(isset($_SESSION['macv_kythuat'])==3){
                $this-> viewkythuat('lichsuphancong',[
                    "lichsu" => $this -> kythuatmodel -> lichsuphancong($_SESSION['manv_kythuat']),
                ]);
            }
            else{
                $this ->viewadmin("404");
            }
           
        }
        public function xemchitietLS($mahd){
            if(isset($_SESSION["macv"])==3){
               $ketqua = $this -> kythuatmodel -> xemchitietLS($mahd);
               if($ketqua){
                    $this -> viewkythuat("xemchitietLS",[
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
    }
?>