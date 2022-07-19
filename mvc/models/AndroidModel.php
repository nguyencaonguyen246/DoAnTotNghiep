<?php 
class AndroidModel extends dbconnect{
    function xem10nhanvien(){
        $query = "SELECT * FROM nhanvien LIMIT 10";
        $row = mysqli_query($this -> con, $query);
        $mang = array();
        while($json = mysqli_fetch_assoc($row)){
            $mang[] = $json;
        }
        header("Content-type:application/json");
        return json_encode($mang,  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    function xemnhanvien(){
        $query = "SELECT * FROM nhanvien";
        $row = mysqli_query($this -> con, $query);
        $mang = array();
        while($json = mysqli_fetch_assoc($row)){
            $mang[] = $json;
        }
        header("Content-type:application/json");
        return json_encode($mang,  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
    
    function xemnhanvienkythuat(){
        $query = "SELECT * FROM nhanvien WHERE macv = 3 ";
        $row = mysqli_query($this -> con, $query);// xử lý với csdl
        $mang = array();
        while($json = mysqli_fetch_assoc($row)){
            $mang[] = $json;
        }
        header("Content-type:application/json");
        return json_encode($mang,  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }


    function dangnhap($tendangnhap){
        $query = "SELECT * FROM nhanvien where tendangnhap = '$tendangnhap' and macv = 3 ";
        return mysqli_query($this -> con, $query);// xử lý với csdl
    }
    function suanhanvien($manv,$tennhanvien,$sdt,$email,$diachi){
        $query = "UPDATE nhanvien SET tennhanvien ='".$tennhanvien."', sdtnhanvien ='".$sdt."', email='".$email."', diachi='".$diachi."' where manv = $manv ";
        $row = mysqli_query($this -> con, $query);// xử lý với csdl
        return $row;
    }

    function laytrangthaiCV($manv){
        $query = "SELECT * From nhanvien Where manv = $manv and macv = 3 and trangthai ='Chưa có việc'";
        $row = mysqli_query($this -> con, $query);// xử lý với csdl
        return $row;
    }


    function suaxongnhanvien($manv){
        $query = "UPDATE nhanvien SET trangthai ='Chưa có việc', motacongviec = null where manv = $manv ";
        $row = mysqli_query($this -> con, $query);// xử lý với csdl
        return $row;
    }
    function suaxongphancong($manv){
        $query = "UPDATE hoadon SET tinhtranghd = 'Đã hoàn thành' where manv = $manv";
        $row = mysqli_query($this -> con, $query);// xử lý với csdl
        return $row;    
    }
    function laymahd($manv){
        $query = "SELECT * from hoadon where  tinhtranghd = 'Đã tiếp nhận' and manv = $manv";
        return mysqli_query($this -> con, $query);// xử lý với csdl  
    }
    function laythongtinKH($manv,$mahd){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        Where manv = $manv and mahd = $mahd and tinhtranghd = 'Đã hoàn thành'";
        return mysqli_query($this -> con, $query);
    }
    function xemviecphancong($manv){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
                                        inner join sanpham on sanpham.masp = chitiethoadon.masp 
                            Where manv = $manv and tinhtranghd = 'Đã tiếp nhận'";
        $row = mysqli_query($this -> con, $query);
        $mang = array();
        while($json = mysqli_fetch_assoc($row)){
            $mang[] = $json;
        }
        header("Content-type:application/json");
        return json_encode($mang,  JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}