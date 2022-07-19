<?php 
    class thongke extends Controller{
        public $thongkemodel;
        public function __construct()
        {
            $this->thongkemodel = $this -> model ("ThongKeModel");
            date_default_timezone_set('Asia/Ho_Chi_Minh'); //Chỉnh về múi giờ Việt Nam
        }
        public function thongkedoanhthu(){
            if(isset($_SESSION["macv"]) == 1 || isset($_SESSION["macv"]) == 2 ){
                $this ->viewadmin("ThongKe/thongkedoanhthu");
            }
            else{
                $this ->viewadmin("404");
            }
        }
        public function post_thongkedoanhthu(){
            if(isset($_SESSION["macv"]) == 1 || isset($_SESSION["macv"]) == 2 ){
                if(isset($_POST['thongke'])){
                    $ketqua = false;
                    $tungay = date_create( $_POST['ngaybatdau']) -> format('Y-m-d');
                    $denngay = date_create( $_POST['ngayketthuc']) -> format('Y-m-d');
                    $ngayhientai = date_create(date('Y-m-d')) -> format('Y-m-d');
                    if(strtotime($tungay) <= strtotime($denngay)){
                        if(strtotime($denngay) <= strtotime($ngayhientai)){
                            $row = $this -> thongkemodel -> tongdoanhthu($tungay, $denngay);
                            $doanhthu = mysqli_fetch_array($row);
                            $this ->viewadmin("ThongKe/thongkedoanhthu",[
                                "thongke" => $this -> thongkemodel -> thongkehoadon($tungay, $denngay),
                                "thongke_sp" => $this -> thongkemodel -> sanphambanchay($tungay, $denngay),
                                "solonnhat" => $this -> thongkemodel -> sanphambanchay_lonnhat($tungay, $denngay),
                                "doanhthu" => $doanhthu['doanhthu'],
                                "thongbao" => $ketqua = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("ThongKe/thongkedoanhthu",[
                                "thongbao" => $ketqua,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("ThongKe/thongkedoanhthu",[
                            "thongbao" => $ketqua,
                        ]);
                    }
                  
                }
                if(isset($_POST['thongke_onl'])){
                    $ketqua = false;
                    $tungay = date_create( $_POST['ngaybatdau']) -> format('Y-m-d');
                    $denngay = date_create( $_POST['ngayketthuc']) -> format('Y-m-d');
                    $ngayhientai = date_create(date('Y-m-d')) -> format('Y-m-d');
                    if(strtotime($tungay) <= strtotime($denngay)){
                        if(strtotime($denngay) <= strtotime($ngayhientai)){
                            $row = $this -> thongkemodel -> tongdoanhthu_onl($tungay, $denngay);
                            $doanhthu = mysqli_fetch_array($row);
                            $this ->viewadmin("ThongKe/thongkedoanhthu",[
                                "thongke_onl" => $this -> thongkemodel -> thongkehoadon_onl($tungay, $denngay),
                                "thongke_sp" => $this -> thongkemodel -> sanphambanchay_onl($tungay, $denngay),
                                "solonnhat" => $this -> thongkemodel -> sanphambanchay_onl_lonnhat($tungay, $denngay),
                                "doanhthu" => $doanhthu['doanhthu'],
                                "thongbao" => $ketqua = true,
                            ]);
                        }
                        else{
                            $this ->viewadmin("ThongKe/thongkedoanhthu",[
                                "thongbao" => $ketqua,
                            ]);
                        }
                    }
                    else{
                        $this ->viewadmin("ThongKe/thongkedoanhthu",[
                            "thongbao" => $ketqua,
                        ]);
                    }
                  
                }
            }
            else{
                $this ->viewadmin("404");
            }
        }
        
    }
?>