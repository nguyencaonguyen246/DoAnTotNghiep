<?php

require 'dbconnect.php';

class LSPHANCONG
{
    function LSPHANCONG($malspc,$mahd,$manv,$ngaygiophancong,$makh,$ngaylap,$tongtien,$tinhtranghd,$ngaygiodieuphoi,$tennhanvien,$sdtnhanvien,$gioitinh,$ngaysinh,$email,$diachi,$macv,$tendangnhap,$matkhau,$trangthai,$motacongviec,$hinhanh,$tenkhachhang,$sdtkhachhang)
    {
        $this->malspc = $malspc;
        $this->mahd = $mahd;
        $this->manv = $manv;
        $this->ngaygiophancong =$ngaygiophancong;
        $this->makh = $makh;
        $this->ngaylap = $ngaylap;
        $this->tongtien = $tongtien;
        $this->tinhtranghd = $tinhtranghd;
        $this->ngaygiodieuphoi = $ngaygiodieuphoi;
        $this->tennhanvien = $tennhanvien;
        $this->sdtnhanvien = $sdtnhanvien;
        $this->gioitinh = $gioitinh;
        $this->email = $email;
        $this->diachi = $diachi;
        $this->macv = $macv;
        $this->tendangnhap = $tendangnhap;
        $this->ngaysinh = $ngaysinh;
        $this->matkhau = $matkhau;
        $this->trangthai = $trangthai;
        $this->motacongviec = $motacongviec;
        $this->hinhanh= $hinhanh;
        $this->tenkhachhang = $tenkhachhang;
        $this->sdtkhachhang = $sdtkhachhang;
    }
}
$page = $_GET['id'];
$query =  "SELECT * FROM lichsuphancong inner join hoadon on hoadon.mahd = lichsuphancong.mahd 
        inner join nhanvien on nhanvien.manv = lichsuphancong.manv
        inner join khachhang on khachhang.makh = hoadon.makh
        where lichsuphancong.manv = $page";
$data = mysqli_query($connect, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data))
{
    array_push($mang, new LSPHANCONG($row['malspc'],$row['mahd'],$row['manv'],$row['ngaygiophancong'],$row['makh'],$row['ngaylap'],$row['tongtien'],$row['tinhtranghd'],$row['ngaygiodieuphoi'],$row['tennhanvien'],$row['sdtnhanvien'],$row['gioitinh'],$row['ngaysinh'],$row['email'],$row['diachi'],$row['macv'],$row['tendangnhap'],$row['matkhau'],$row['trangthai'],$row['motacongviec'],$row['hinhanh'],$row['tenkhachhang'],$row['sdtkhachhang']));
}
header("Content-type:application/json");
echo json_encode($mang, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>