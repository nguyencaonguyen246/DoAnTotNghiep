<?php 
class ThongKeModel extends dbconnect{
    function sanphambanchay($tungay, $denngay){
        $query ="SELECT *, sum(chitiethoadon.soluong) as tong from chitiethoadon 
        inner join hoadon on chitiethoadon.mahd = hoadon.mahd
        inner join sanpham on chitiethoadon.masp = sanpham.masp 
        inner join motasanpham on motasanpham.masp = sanpham.masp 
        where tinhtranghd = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay'
        group by chitiethoadon.masp order by tong DESC LIMIT 5";
        return mysqli_query($this->con, $query);
    }
    function sanphambanchay_lonnhat($tungay, $denngay){
        $query ="SELECT *, sum(chitiethoadon.soluong) as tong from chitiethoadon 
        inner join hoadon on chitiethoadon.mahd = hoadon.mahd
        inner join sanpham on chitiethoadon.masp = sanpham.masp 
        inner join motasanpham on motasanpham.masp = sanpham.masp 
        where tinhtranghd = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay'
        group by chitiethoadon.masp order by tong DESC LIMIT 1";
        return mysqli_query($this->con, $query);
    }
    function sanphambanchay_onl($tungay, $denngay){
        $query ="SELECT *, sum(cthd_online.soluong) as tong from cthd_online
        inner join hoadon_online on cthd_online.mahdonl = hoadon_online.mahdonl
        inner join sanpham on cthd_online.masp = sanpham.masp 
        inner join motasanpham on motasanpham.masp = sanpham.masp 
        where tinhtrangdh = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay'
        group by cthd_online.masp order by tong DESC LIMIT 5";
        return mysqli_query($this->con, $query);
    }
    function sanphambanchay_onl_lonnhat($tungay, $denngay){
        $query ="SELECT *, sum(cthd_online.soluong) as tong from cthd_online
        inner join hoadon_online on cthd_online.mahdonl = hoadon_online.mahdonl
        inner join sanpham on cthd_online.masp = sanpham.masp 
        inner join motasanpham on motasanpham.masp = sanpham.masp 
        where tinhtrangdh = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay'
        group by cthd_online.masp order by tong DESC LIMIT 1";
        return mysqli_query($this->con, $query);
    }
    function thongkehoadon($tungay, $denngay){
        $query ="SELECT * from hoadon  inner join nhanvien on nhanvien.manv = hoadon.manv  where tinhtranghd = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay' order by mahd DESC";
        return mysqli_query($this->con, $query);
    }
    function tongdoanhthu($tungay, $denngay){
        $query ="SELECT SUM(hoadon.tongtien) as doanhthu from hoadon where tinhtranghd = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay' order by mahd DESC";
        return mysqli_query($this->con, $query);
    }
    function thongkehoadon_onl($tungay, $denngay){
        $query ="SELECT * from hoadon_online  inner join khachhang on khachhang.makh = hoadon_online.makh  where tinhtrangdh = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay' order by mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function tongdoanhthu_onl($tungay, $denngay){
        $query ="SELECT SUM(hoadon_online.tongtien) as doanhthu from hoadon_online where tinhtrangdh = 'Đã hoàn thành' and ngaylap >= '$tungay' and ngaylap <= '$denngay' order by mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
}
?>