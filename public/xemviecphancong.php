<?php

require 'dbconnect.php';

class PHANCONG
{
    function PHANCONG($mahd, $manv, $makh, $ngaylap, $tongtien, $tinhtranghd, $ngaygiodieuphoi, $tenkhachhang, $sdtkhachhang,$email, $diachi, $ngaysinh, $matkhau, $macthd,$masp, $soluong, $dongia, $thanhtien, $tensanpham, $hinhanh, $soluongton, $thoihanbaohanh,$maloai, $madm, $mansx, $mancc, $makhuyenmai)
    {
        $this->mahd = $mahd;
        $this->manv = $manv;
        $this->makh = $makh;
        $this->ngaylap = $ngaylap;
        $this->tongtien = $tongtien;
        $this->tinhtranghd = $tinhtranghd;
        $this->ngaygiodieuphoi = $ngaygiodieuphoi;
        $this->tenkhachhang = $tenkhachhang;
        $this->sdtkhachhang = $sdtkhachhang;
        $this->email = $email;
        $this->diachi = $diachi;
        $this->ngaysinh = $ngaysinh;
        $this->matkhau = $matkhau;
        $this->macthd = $macthd;
        $this->masp = $masp;
        $this->soluong = $soluong;
        $this->dongia = $dongia;
        $this->thanhtien = $thanhtien;
        $this->tensanpham = $tensanpham;
        $this->hinhanh = $hinhanh;
        $this->soluongton = $soluongton;
        $this->thoihanbaohanh = $thoihanbaohanh;
        $this->maloai = $maloai;
        $this->madm = $madm;
        $this->mansx = $mansx;
        $this->mancc = $mancc;
        $this->makhuyenmai = $makhuyenmai;
    }
}
$page = $_GET['id'];
$query = "SELECT * From hoadon inner join khachhang on hoadon.makh = khachhang.makh 
inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
inner join sanpham on sanpham.masp = chitiethoadon.masp
WHERE manv = $page and tinhtranghd = 'Đã tiếp nhận'";
$data = mysqli_query($connect, $query);
$mang = array();
while($row = mysqli_fetch_assoc($data))
{
    array_push($mang, new PHANCONG($row['mahd'], $row['manv'], $row['makh'],$row['ngaylap'],$row['tongtien'],$row['tinhtranghd'],$row['ngaygiodieuphoi'],$row['tenkhachhang'],$row['sdtkhachhang'],$row['email'],$row['diachi'],$row['ngaysinh'],$row['matkhau'],$row['macthd'],$row['masp'],$row['soluong'],$row['dongia'],$row['thanhtien'],$row['tensanpham'],$row['hinhanh'],$row['soluongton'],$row['thoihanbaohanh'],$row['maloai'],$row['madm'],$row['mansx'],$row['mancc'],$row['makhuyenmai']));
}
header("Content-type:application/json");
echo json_encode($mang, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

?>