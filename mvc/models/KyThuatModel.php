<?php 
class KyThuatModel extends dbconnect{
    function dangnhap($tendangnhap){
        $query = "SELECT * From nhanvien Where tendangnhap = '$tendangnhap' and macv = 3";
        return mysqli_query($this->con, $query);
    }
    function laymotacongviec($manv){
        $query = "SELECT * From nhanvien Where manv = $manv and macv = 3";
        return mysqli_query($this->con, $query);
    }
    function hienthiphancong($manv){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
                                        inner join sanpham on sanpham.masp = chitiethoadon.masp 
                                        Where manv = $manv and tinhtranghd = 'Đã tiếp nhận'";
        return mysqli_query($this->con, $query);
    }
    function xacnhanphancong($manv,$mahd){
        $query = "UPDATE hoadon SET tinhtranghd = 'Đã xác nhận phân công' where mahd = $mahd and manv = $manv";
        return mysqli_query($this->con, $query);
    }
    function hienthisauphancong($manv){
        $query = "SELECT * From hoadon  Where manv = $manv and tinhtranghd = 'Đã xác nhận phân công'";
        return mysqli_query($this->con, $query);
    }
    function xacnhanhoanthanh($manv,$mahd){
        $query = "UPDATE hoadon SET tinhtranghd = 'Đã hoàn thành' where mahd = $mahd and manv = $manv";
        return mysqli_query($this->con, $query);
    }function laykhachhang($manv,$mahd){
        $query = "SELECT * from hoadon  inner join khachhang on hoadon.makh = khachhang.makh  where tinhtranghd = 'Đã hoàn thành' and mahd = $mahd and manv = $manv";
        return mysqli_query($this->con, $query);
    }
    function update_cthd($mahd, $masp){
        $query = "UPDATE chitiethoadon SET tinhtrang = 'Bảo hành' where mahd = $mahd and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function update_trangthaiNV($manv){
        $query = "UPDATE nhanvien SET trangthai = 'Chưa có việc', motacongviec = null where manv = $manv";
        return mysqli_query($this->con, $query);
    }
    function lichsuphancong($manv){
        $query =  "SELECT * FROM lichsuphancong inner join hoadon on hoadon.mahd = lichsuphancong.mahd 
                                                inner join nhanvien on nhanvien.manv = lichsuphancong.manv
                                                inner join khachhang on khachhang.makh = hoadon.makh
                                                where lichsuphancong.manv = $manv";
        return mysqli_query($this->con, $query);
    }
    function xemchitietLS($mahd){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
                                        inner join sanpham on sanpham.masp = chitiethoadon.masp 
                                        Where hoadon.mahd = $mahd ";
        return mysqli_query($this->con, $query);
    }
    function push_phancong($manv){
        $query = "SELECT * From hoadon Where manv = $manv and tinhtranghd = 'Đã tiếp nhận'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = false;
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = true;
        }
        return $ketqua_ktra;
    }
}
?>