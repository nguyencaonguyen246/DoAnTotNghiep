<?php 
    class android extends Controller{
        public $androidmodel;
        public $mailmodel;
        public $smsmodel;
        public function __construct()
        {
            $this->mailmodel = $this -> model ("MailModel");
            $this->smsmodel = $this -> model ("SMSModel");
            $this->androidmodel = $this -> model ("AndroidModel");
        }
        public function xemnhanvien(){
            $ketqua = $this -> androidmodel -> xemnhanvien();
            echo $ketqua;
        }
        public function xem10nhanvien(){
            $ketqua = $this -> androidmodel -> xem10nhanvien();
            echo $ketqua;
        }
        public function xemnhanvienkythuat(){
            $ketqua = $this -> androidmodel -> xemnhanvienkythuat();
            echo $ketqua;
        }

        public function dangnhap(){
            $tendangnhap = filter_input(INPUT_POST,"tendangnhap");
            $matkhau_nhap = filter_input(INPUT_POST,"matkhau_nhap");
            $ketqua = $this->androidmodel->dangnhap($tendangnhap);
            if(mysqli_num_rows($ketqua)){
                while ($row = mysqli_fetch_array($ketqua)){
                    $matkhau = $row["matkhau"];
                }
                if(password_verify($matkhau_nhap, $matkhau)){
                    echo '1';
                }
                else{
                    echo '0';
                }
            }
            else{
                echo '0';
            }
        }

        public function suanhanvien(){
            $manv = filter_input(INPUT_POST, "manv" );
            $tennhanvien = filter_input(INPUT_POST, "tennhanvien" );
            $sdt = filter_input(INPUT_POST, "sdtnhanvien" );
            $email = filter_input(INPUT_POST, "email" );
            $diachi = filter_input(INPUT_POST, "diachi" );
            $ketqua = $this -> androidmodel -> suanhanvien($manv,$tennhanvien,$sdt,$email,$diachi);
            if($ketqua){
                echo '1';
            }
            else{
                echo '0';   
            }
        }
        
        public function laytrangthaiCV(){
            $manv = filter_input(INPUT_POST, "manv" );
            $ketqua = $this -> androidmodel -> laytrangthaiCV($manv);
            $tam = mysqli_fetch_assoc($ketqua);
            if(isset($tam["tennhanvien"])){
                echo '1';
            }
            else{
                echo '0';   
            }
        }

        public function suaxongnhanvien(){
            $manv = filter_input(INPUT_POST, "manv");
            $ketqua = $this -> androidmodel -> suaxongnhanvien($manv);
            if($ketqua){
                echo '1';
            }
            else{
                echo '0';   
            }
        }
        public function suaxongphancong(){
            $manv = filter_input(INPUT_POST, "manv");
            // $manv = 5;
            $laymahd = $this -> androidmodel -> laymahd($manv);
            $hoadon = mysqli_fetch_array($laymahd);
            $mahd = $hoadon['mahd']; 
            $ketqua = $this -> androidmodel -> suaxongphancong($manv);
            if($ketqua){
                echo '1';
                $thongbao = $this-> androidmodel -> laythongtinKH($manv,$mahd);
                $khachhang = mysqli_fetch_array($thongbao);
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

            }
            else{
                echo '0';   
            }
        }

        public function xemviecphancong(){
            $manv =4;
            $ketqua = $this -> androidmodel -> xemviecphancong($manv);
            echo $ketqua;
        }
    }
?>