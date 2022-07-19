<?php 
class SanPhamModel extends dbconnect{
    function getDSSP(){
        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai ORDER BY masp ASC";
        return mysqli_query($this->con, $query);
    }

    function getDSLSP(){ // LẤY DANH SÁCH LOẠI SẢN PHÂMR
        $query = "SELECT * FROM loaisanpham";
        return mysqli_query($this->con, $query);
    }
    function getDSDM(){ // LẤY DANH SÁCH danh muc san pham
        $query = "SELECT * FROM danhmuc";
        return mysqli_query($this->con, $query);
    }

    function getSPDM($madm){ // LẤY DS SẢN PHẨM THEO DANH MỤC
        $query = "SELECT * FROM sanpham WHERE madanhmuc= $madm";
        return mysqli_query($this->con, $query);
    }

    function getSPLSP($maml){ // LẤY DANH SÁCH SẢN PHẨM THEO LOẠI
        $query = "SELECT * FROM sanpham WHERE maloai= $maml";
        return mysqli_query($this->con, $query);
    }

    function getLIMITSP($trang) // lấy danh sách sản phẩm phân trang
    {
        $sotintrang = 6;
        settype ($trang, "int");
        
        $from = ($trang - 1) * $sotintrang;


        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai ORDER BY masp ASC LIMIT $from, $sotintrang";
        return mysqli_query($this->con, $query);

    }

    ///san pham mới
    function getSPMoi() // lấy danh sách sản phẩm phân trang
    {
        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai ORDER BY masp DESC LIMIT 0, 8";
        return mysqli_query($this->con, $query);

    }

    function getSPTB() //lấy sản phẩm tiêu biểu
    {
        $sotintrang = 4;
        settype ($trang, "int");
        
        $from = 0;

        $query = "SELECT *, count(chitiethoadon.masp) as tong from chitiethoadon 
        inner join hoadon on chitiethoadon.mahd = hoadon.mahd 
        inner join sanpham on chitiethoadon.masp = sanpham.masp 
        inner join khuyenmai on khuyenmai.makhuyenmai = sanpham.makhuyenmai 
        where tinhtranghd = 'Đã hoàn thành' group by chitiethoadon.masp order by tong DESC LIMIT 4;";

        //$query = "SELECT * FROM sanpham s, khuyenmai k, sanphamtieubieu b WHERE s.makhuyenmai = k.makhuyenmai and s.masp = b.masp ORDER BY s.masp ASC LIMIT 0, 4";
        return mysqli_query($this->con, $query);

    }

    function getDetail($id)
    {
        settype ($id, "int");

        $query = "SELECT * FROM sanpham, khuyenmai, motasanpham WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai and sanpham.masp = motasanpham.masp and sanpham.masp = $id";
        return mysqli_query($this->con, $query);

    }

    function getMoTa($id)
    {
        settype ($id, "int");

        $query = "SELECT * FROM motasanpham where masp = $id";
        return mysqli_query($this->con, $query);

    }
    function getLoaiSPlienquan($maloai)
    {
        settype ($maloai, "int");

        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai and maloai = $maloai ORDER BY masp ASC LIMIT 8";
        return mysqli_query($this->con, $query);

    }

    //Thêm sản phẩm yêu thích
    function SanPhamYeuThich($makh, $masp){
        $query = "INSERT INTO `sanphamyeuthich` (`mayt`, `makh`, `masp`) VALUES (NULL, $makh, $masp);";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //Tìm Kiếm Sản Phẩm
    function findSanPham($noidung)
    {
        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai and tensanpham LIKE '%$noidung%' ORDER BY masp ";
        return mysqli_query($this->con, $query);
    }

    //Select sản phẩm theo danh mục
    function viewSanPhamDM($madm)
    {

        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai  and madm = $madm ORDER BY masp ";
        return mysqli_query($this->con, $query);

    }

    //Select sản phẩm theo LOẠI SẢN PHẨM
    function viewSanPhamLSP($maloai)
    {       

        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai  and maloai = $maloai ORDER BY masp ";
        return mysqli_query($this->con, $query);

    }

    //Thêm lỊCH Sử tìm kiếm
    function iLichSuTimKiem($makh, $noidung){
        $query = "INSERT INTO lichsutimkiem VALUES (NULL, $makh, '$noidung');";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //Select DanhSach lich Su Tim Kiem
    function sDSLichSuTimKiem($makh)
    {       

        $query = "SELECT * FROM lichsutimkiem WHERE makh = $makh";
        return mysqli_query($this->con, $query);

    }

    //Select lich Su Tim Kiem Theo ma
    function sLichSuTimKiem($mals)
    {       

        $query = "SELECT * FROM lichsutimkiem WHERE mals = $mals";
        return mysqli_query($this->con, $query);

    }

      //delete Lich Su Tim Kiem
      function dLichSuTimKiem($mals){
        $query = "DELETE FROM lichsutimkiem WHERE mals = $mals";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }


    // select thống kê số lượng của sản phẩm yêu thích sắp xếp giảm dần
    // SELECT *, COUNT(t.masp) as 'tong' from sanpham s INNER JOIN sanphamyeuthich t ON s.masp = t.masp GROUP BY t.masp ORDER BY tong DESC;
    // Cũng như trên nhưng mà join them bảng khuyến mãi thôi
    //SELECT *, COUNT(t.masp) as 'tong' from sanpham s INNER JOIN khuyenmai k ON s.makhuyenmai = k.makhuyenmai INNER JOIN sanphamyeuthich t ON s.masp = t.masp GROUP BY t.masp ORDER BY `tong` DESC LIMIT 3;
    
    //lấy 3 sản phẩm được yêu thích nhiều nhất.
    function SanPhamYeuThichNhieu()
    {       
        $query = "SELECT *, COUNT(t.masp) as 'tong' from sanpham s INNER JOIN khuyenmai k ON s.makhuyenmai = k.makhuyenmai INNER JOIN sanphamyeuthich t ON s.masp = t.masp GROUP BY t.masp ORDER BY `tong` DESC LIMIT 3;";
        return mysqli_query($this->con, $query);

    }

    function getdsSPYT($makh) //lấy sản phẩm YEU THICH của khách
    {
        $query = "SELECT * FROM sanpham s, khuyenmai k, sanphamyeuthich y WHERE s.makhuyenmai = k.makhuyenmai and s.masp = y.masp and y.makh = $makh ";
        return mysqli_query($this->con, $query);
    }

    //xóa sản phẩm yêu thích
    function XoaSPYT($makh, $id){
        $query = "DELETE FROM sanphamyeuthich where makh = $makh AND masp = $id";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    //get san phẩm yêu thích
    function getMaSPYT($makh, $masp)
    {       

        $query = "SELECT * FROM sanphamyeuthich WHERE makh = $makh and masp = $masp";
        return mysqli_query($this->con, $query);

    }

    function getlimitSPYT($makh) //lấy sản phẩm YEU THICH của khách
    {
        $query = "SELECT * FROM sanpham s, khuyenmai k, sanphamyeuthich y WHERE s.makhuyenmai = k.makhuyenmai and s.masp = y.masp and y.makh = $makh LIMIT 4";
        return mysqli_query($this->con, $query);
    }

    function getDSNSX(){ // LẤY DANH SÁCH nhà sản xuất
        $query = "SELECT * FROM nhasanxuat";
        return mysqli_query($this->con, $query);
    }

    //Select sản phẩm theo NHÀ SẢN XUẤT
    function viewSanPhamNSX($mansx)
    {       

        $query = "SELECT * FROM sanpham, khuyenmai WHERE sanpham.makhuyenmai = khuyenmai.makhuyenmai  and mansx = $mansx ORDER BY masp ";
        return mysqli_query($this->con, $query);

    }


}
?>