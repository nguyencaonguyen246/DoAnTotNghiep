<?php 
class GioHangModel extends dbconnect{
    function getGH($makh){
        //SELECT * FROM giohangkhachhang As g, chitietgiohang AS c, sanpham AS s WHERE g.makh = "1" AND g.magh = c.magh AND c.masp = s.masp;
        $query = "SELECT c.dongia, soluong, thanhtien, s.masp, tensanpham, hinhanh, maloai, g.magh, giatrikhuyenmai, giakhuyenmai FROM giohangkhachhang As g, chitietgiohang AS c, sanpham AS s WHERE g.makh = $makh AND g.magh = c.magh AND c.masp = s.masp";
        return mysqli_query($this->con, $query);
    }

    function getTongTien($makh){
        //SELECT * FROM giohangkhachhang As g, chitietgiohang AS c, sanpham AS s WHERE g.makh = "1" AND g.magh = c.magh AND c.masp = s.masp;
        $query = "SELECT tongtien FROM giohangkhachhang WHERE makh = $makh;";
        return mysqli_query($this->con, $query);
    }

    function getMaSPctGH($magh, $masp){
        //SELECT * FROM giohangkhachhang As g, chitietgiohang AS c, sanpham AS s WHERE g.makh = "1" AND g.magh = c.magh AND c.masp = s.masp;
        $query = "SELECT * FROM chitietgiohang WHERE magh = $magh and masp = $masp;";
        return mysqli_query($this->con, $query);
    }

    function getSPDM($madm){
        $query = "SELECT * FROM sanpham WHERE madanhmuc= $madm";
        return mysqli_query($this->con, $query);
    }

    function getLIMITSP($trang)
    {
        $sotintrang = 8;
        settype ($trang, "int");
        
        $from = ($trang - 1) * $sotintrang;


        $query = "SELECT * FROM sanpham ORDER BY masp ASC LIMIT $from, $sotintrang";
        return mysqli_query($this->con, $query);

    }

    function ThemGioHang($magh, $masp, $solg, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien){
        $query = "INSERT into chitietgiohang values (null,$magh,$masp, $solg, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien)";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    function CreateGH($makh){
        $query = "INSERT into giohangkhachhang values (null,$makh,0)";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    function XoaHang($magh, $id){
        $query = "DELETE FROM chitietgiohang where magh = $magh AND masp = $id";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    function getSP($masp){
        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai and masp = $masp";
        return mysqli_query($this->con, $query);
    }


    function getmaGH($makh){
        //SELECT * FROM giohangkhachhang As g, chitietgiohang AS c, sanpham AS s WHERE g.makh = "1" AND g.magh = c.magh AND c.masp = s.masp;
        $query = "SELECT * FROM giohangkhachhang WHERE makh = $makh";
        return mysqli_query($this->con, $query);
    }

    function tongTienGH($magh){
        $query = "SELECT SUM(thanhtien) AS 'tongtien' FROM chitietgiohang WHERE magh = $magh";
        return mysqli_query($this->con, $query);
    }

    function suaTongTienGH($makh, $tongtien){
        $query = "UPDATE giohangkhachhang SET tongtien ='$tongtien' where makh = $makh";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    function updateSoLuongGH($magh, $masp, $soluong, $thanhtien)
    {
        $query = "UPDATE chitietgiohang SET soluong = $soluong , thanhtien = $thanhtien  where magh = $magh and masp = $masp";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    function thongtinkhachhang($makh){
        $query = "SELECT * from khachhang where makh = $makh ";
        return mysqli_query($this->con, $query);
    }

    //tạo hóa đơn online cho khách hàng
    function CreateHDonline($makh, $ngaylap, $tongtien, $sdt, $diachi){
        $query = "INSERT into hoadon_online values (null, $makh, '$ngaylap', $tongtien, 'Chờ xác nhận', '$diachi', '$sdt')";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //tạo chi tiết hóa đơn online
    function CreateCTHDonline($mahd, $masp, $soluong, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien){
        $query = "INSERT into cthd_online values (null, $masp, $mahd, $soluong, $dongia, $giatrikhuyenmai, $giakhuyenmai, $thanhtien)";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //delete gio hang khách hàng
    function DeleteGH($makh){
        $query = "DELETE FROM giohangkhachhang WHERE makh = $makh";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //Lấy mã hóa đơn online mới nhất từ khách hàng
    function getMADHOnline($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT * FROM `hoadon_online` where makh = $makh ORDER BY mahdonl DESC LIMIT 1";
        return mysqli_query($this->con, $query);
    }

    //Lấy chi tiết giỏ hàng
    function getCTGH($magh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT * FROM `chitietgiohang` where magh = $magh";
        return mysqli_query($this->con, $query);
    }

    // lấy số lượng sản phẩm trong giỏ của khách
    function countCTGH($magh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT  COUNT(mactgiohang) as 'somathang' FROM `chitietgiohang` where magh = $magh";
        return mysqli_query($this->con, $query);
    }
    function countCTGH_new($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT  COUNT(mactgiohang) as 'somathang' FROM chitietgiohang inner join giohangkhachhang on giohangkhachhang.magh = chitietgiohang.magh where makh = $makh";
        $mathang = mysqli_query($this->con, $query);
        $row = mysqli_fetch_array($mathang);
        return $row['somathang'];
    }



    // lấy số lượng sản phẩm trong giỏ của khách
    function GetSPBaoHanh($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthd, c.dongia, c.soluong, h.mahd, h.ngaylap, s.thoihanbaohanh, s.hinhanh, s.tensanpham, m.mota, c.tinhtrang FROM `chitiethoadon` c JOIN hoadon h on c.mahd = h.mahd JOIN sanpham s on c.masp = s.masp JOIN motasanpham m on m.masp = s.masp WHERE h.makh = $makh and tinhtranghd = 'Đã hoàn thành' and c.tinhtrang = 'Bảo hành';";
        return mysqli_query($this->con, $query);
    }

    // lấy số lượng sản phẩm trong giỏ của khách
    function GetThongTinBaoHanh($mahd, $mact){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT * FROM `chitiethoadon` c join hoadon h on c.mahd = h.mahd join sanpham s on c.masp = s.masp where h.mahd = $mahd and c.macthd = $mact";
        return mysqli_query($this->con, $query);
    }

    //TẠO PHIẾU BẢO HÀNH
    function CreatePhieuBH($makh, $tongtien, $ngayyeucau, $tinhtranghd,  $ngaygiodieuphoi){
        $query = "INSERT into hoadon values (null, null, $makh, '$ngayyeucau', $tongtien, '$tinhtranghd', '$ngaygiodieuphoi')";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    // lấy HÓA ĐƠN KHACH HANG
    function GetDSHoaDon($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT * FROM `hoadon`  where makh = $makh and tinhtranghd = 'Đã hoàn thành' "; // 
        return mysqli_query($this->con, $query);
    }

    // lấy CHI TIẾT HOA ĐƠN
    function GetSPinCTHD($mahd){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthd, c.dongia, c.soluong, h.mahd, h.ngaylap, s.thoihanbaohanh, s.hinhanh, s.tensanpham, m.mota, c.tinhtrang FROM `chitiethoadon` c JOIN hoadon h on c.mahd = h.mahd JOIN sanpham s on c.masp = s.masp JOIN motasanpham m on m.masp = s.masp WHERE c.mahd = $mahd;";
        return mysqli_query($this->con, $query);
    }

    // tÌM KIẾM SAN PHẨM BẢO HÀNH
    function TimSPBH($makh, $noidung){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthd, c.dongia, c.soluong, h.mahd, h.ngaylap, s.thoihanbaohanh, s.hinhanh, s.tensanpham, m.mota, c.tinhtrang FROM `chitiethoadon` c JOIN hoadon h on c.mahd = h.mahd JOIN sanpham s on c.masp = s.masp JOIN motasanpham m on m.masp = s.masp WHERE h.makh = $makh and c.tinhtrang = 'Bảo hành'  and tinhtranghd = 'Đã hoàn thành' and s.tensanpham LIKE '%$noidung%'";
        return mysqli_query($this->con, $query);
    }

    // DANH SACH SẢN PHẨM BẢO HÀNH BẰNG LOẠI SẢN PHẨM
    function LSPBaoHanh($makh, $maloai){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthd, c.dongia, c.soluong, h.mahd, h.ngaylap, s.thoihanbaohanh, s.hinhanh, s.tensanpham, m.mota, c.tinhtrang FROM `chitiethoadon` c JOIN hoadon h on c.mahd = h.mahd JOIN sanpham s on c.masp = s.masp JOIN motasanpham m on m.masp = s.masp WHERE h.makh = $makh and c.tinhtrang = 'Bảo hành'  and tinhtranghd = 'Đã hoàn thành' and s.maloai = $maloai";
        return mysqli_query($this->con, $query);
    }

    // DANH SACH SẢN PHẨM BẢO HÀNH BẰNG LOẠI SẢN PHẨM
    function MDSPBaoHanh($makh, $madm){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthd, c.dongia, c.soluong, h.mahd, h.ngaylap, s.thoihanbaohanh, s.hinhanh, s.tensanpham, m.mota, c.tinhtrang FROM `chitiethoadon` c JOIN hoadon h on c.mahd = h.mahd JOIN sanpham s on c.masp = s.masp JOIN motasanpham m on m.masp = s.masp WHERE h.makh = $makh and c.tinhtrang = 'Bảo hành'  and tinhtranghd = 'Đã hoàn thành' and s.madm = $madm";
        return mysqli_query($this->con, $query);
    }

    //Lấy  hóa đơn bảo hành của khách mới nhất
    function GetHDBH($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT * FROM `hoadon` where makh = $makh ORDER BY mahd DESC LIMIT 1;";
        return mysqli_query($this->con, $query);
    }

    //TẠO CHỈ TIẾT PHIẾU BẢO HÀNH
    function CreateCTPhieuBH($masp, $mahd, $soluong, $dongia, $thanhtien){
        $query = "INSERT into chitiethoadon values (null, $masp, $mahd, $soluong, $dongia, $thanhtien, 'Bảo hành')";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    // lấy danh sách hóa đơn mua hàng
    function GetSPHoaDon($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthdol, c.dongia, c.giakhuyenmai, c.thanhtien , c.soluong, h.mahdonl, h.ngaylap,
         h.tinhtrangdh, h.ngaylap , s.thoihanbaohanh, s.hinhanh, s.tensanpham, m.mota FROM `cthd_online` c JOIN hoadon_online h on 
         c.mahdonl = h.mahdonl JOIN sanpham s on c.masp = s.masp JOIN motasanpham m on m.masp = s.masp WHERE h.makh = $makh ORDER BY h.mahdonl DESC;";
        return mysqli_query($this->con, $query);
    }


    // lấy danh sách hóa đơn sửa chữa bảo hành
    function GetHoaDonSCBH($makh){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthd, c.dongia, c.soluong, c.thanhtien, h.mahd, h.ngaylap, h.tinhtranghd, s.thoihanbaohanh, 
        s.hinhanh, s.tensanpham, m.mota FROM `chitiethoadon` c JOIN hoadon h on c.mahd = h.mahd JOIN sanpham s on c.masp = s.masp 
        JOIN motasanpham m on m.masp = s.masp WHERE h.makh = $makh ORDER BY h.mahd DESC;";
        return mysqli_query($this->con, $query);
    }

    // lấy danh sách hóa đơn mua hàng ĐỂ GỬI MAIL
    function GetSPCTHD($mahd){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT c.masp, c.macthdol, c.dongia, c.giakhuyenmai, c.thanhtien , c.soluong, h.mahdonl, h.ngaylap, h.tinhtrangdh, h.ngaylap , s.thoihanbaohanh, s.hinhanh, s.tensanpham 
        FROM `cthd_online` c JOIN hoadon_online h on c.mahdonl = h.mahdonl JOIN sanpham s on c.masp = s.masp WHERE h.mahdonl = $mahd";
        return mysqli_query($this->con, $query);
    }

    function suaTrangThaiBaoHanh($mahd, $mact, $tinhtrang){
        $query = "UPDATE chitiethoadon SET tinhtrang ='$tinhtrang' where mahd = $mahd and macthd = $mact";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //sửa số luongj trong chi tiết hóa đơn
    function suaSoLuongBaoHanh($mahd, $mact, $soluong){
        $query = "UPDATE chitiethoadon SET soluong = $soluong where mahd = $mahd and macthd = $mact";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }


    // lấy thông tin cho tiết hóa đơn
    function GetCTHD($mahd, $mact){
        //SELECT * FROM `hoadon_online` where makh=1 ORDER BY mahdonl DESC LIMIT 1;
        $query = "SELECT * FROM `chitiethoadon` WHERE mahd = $mahd and macthd = $mact";
        return mysqli_query($this->con, $query);
    }

}
?>
