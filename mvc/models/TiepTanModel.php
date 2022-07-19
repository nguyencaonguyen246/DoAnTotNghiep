<?php 
class TiepTanModel extends dbconnect{
    function dangnhap($tendangnhap){
        $query = "SELECT * From nhanvien Where tendangnhap = '$tendangnhap' and macv = 2";
        return mysqli_query($this->con, $query);
    }
}
?>