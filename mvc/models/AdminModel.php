<?php 
class AdminModel extends dbconnect{
    function dangnhap($tendangnhap){
        $query = "SELECT * From nhanvien Where tendangnhap = '$tendangnhap' and macv = 1";
        return mysqli_query($this->con, $query);
    }
    // ============Danh mục==================
    function danhmuc(){
        $query = "SELECT * FROM danhmuc order by madm DESC";
        return mysqli_query($this->con, $query);
    }
    function themdanhmuc($tendm){
        $query = "INSERT into danhmuc values (null,'$tendm')";
        return mysqli_query($this->con, $query);
    }
    function ktratendm($tendm){
        $query = "SELECT madm from danhmuc where tendm = '$tendm'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Tên danh mục này đã tồn tại";
        }
        return $ketqua_ktra;
    }
    function chitietdanhmuc($madm){
        $query = "SELECT * FROM danhmuc where madm = $madm ";
        return mysqli_query($this->con, $query);
    }
    function suadanhmuc($madm, $tendm){
        $query = "UPDATE danhmuc SET tendm = '$tendm' where madm = $madm ";
        return mysqli_query($this->con, $query);
    }
    
    // ============Nhà sản xuất==================
    function nhasanxuat(){
        $query = "SELECT * FROM nhasanxuat order by mansx DESC";
        return mysqli_query($this->con, $query);
    }
    function ktratennsx($tennsx){
        $query = "SELECT mansx from nhasanxuat where tennsx = '$tennsx'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Tên nhà sản xuát này đã tồn tại";
        }
        return $ketqua_ktra;
    }
    function themnhasx($tennsx){
        $query = "INSERT into nhasanxuat values (null,'$tennsx')";
        return mysqli_query($this->con, $query);
    }
    function chitietnsx($mansx){
        $query = "SELECT * FROM nhasanxuat where mansx = $mansx ";
        return mysqli_query($this->con, $query);
    }
    function suansx($mansx, $tennsx){
        $query = "UPDATE nhasanxuat SET tennsx = '$tennsx' where mansx = $mansx ";
        return mysqli_query($this->con, $query);
    }
    // ============Nhà cung cấp==================

    function nhacungcap(){
        $query = "SELECT * FROM nhacungcap order by mancc DESC";
        return mysqli_query($this->con, $query);
    }
    function ktratenncc($tenncc){
        $query = "SELECT mancc from nhacungcap where tenncc = '$tenncc'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Tên nhà cung cấp này đã tồn tại";
        }
        return $ketqua_ktra;
    }
    function themnhacc($tenncc, $sdtncc, $diachi,$email){
        $query = "INSERT into nhacungcap values (null,'$tenncc', '$diachi', '$email','$sdtncc')";
        return mysqli_query($this->con, $query);
    }
    function chitietncc($mancc){
        $query = "SELECT * FROM nhacungcap where mancc = $mancc";
        return mysqli_query($this->con, $query);
    }
    function suancc($mancc, $tenncc, $sdtncc, $diachi,$email){
        $query = "UPDATE nhacungcap SET tenncc = '$tenncc', sdtncc = '$sdtncc',
                                        diachi = '$diachi', email = '$email'
                                        where mancc = $mancc ";
        return mysqli_query($this->con, $query);
    }
    // ============Loai sản phẩm==================

    function loaisanpham(){
        $query = "SELECT * FROM loaisanpham  order by maloai DESC";
        return mysqli_query($this->con, $query);
    }
    function ktratenloai($tenloai){
        $query = "SELECT maloai from loaisanpham where tenloai = '$tenloai'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Loại sản phẩm này đã tồn tại";
        }
        return $ketqua_ktra;
    }
    function themloaisp($tenloai){
        $query = "INSERT into loaisanpham values (null,'$tenloai')";
        return mysqli_query($this->con, $query);
    }
    function chitietloaisp($maloai){
        $query = "SELECT * FROM loaisanpham where maloai = $maloai ";
        return mysqli_query($this->con, $query);
    }
    function sualoaisp($maloai, $tenloai){
        $query = "UPDATE loaisanpham SET tenloai = '$tenloai' where maloai = $maloai ";
        return mysqli_query($this->con, $query);
    }
    // ============Khuyến mãi==================

    function khuyenmai(){
        $query = "SELECT * FROM khuyenmai WHERE tinhtrang = 1";
        return mysqli_query($this->con, $query);
    }
    function tatcakhuyenmai(){
        $query = "SELECT * FROM khuyenmai where makhuyenmai > 1  order by makhuyenmai DESC";
        return mysqli_query($this->con, $query);
    }
    function ktratenkhuyenmai($tenkhuyenmai){
        $query = "SELECT makhuyenmai from khuyenmai where tenkhuyenmai = '$tenkhuyenmai'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Khuyến mãi này đã tồn tại";
        }
        return $ketqua_ktra;
    }
    function themkhuyenmai($tenkhuyenmai, $giatrikhuyenmai, $thoigianbatdau, $thoigianketthuc){
        $query = "INSERT into khuyenmai values (null,'$tenkhuyenmai','$giatrikhuyenmai','$thoigianbatdau','$thoigianketthuc', 1)";
        return mysqli_query($this->con, $query);
    }
    function chitietkhuyenmai($makhuyenmai){
        $query = "SELECT * FROM khuyenmai where makhuyenmai = $makhuyenmai ";
        return mysqli_query($this->con, $query);
    }
    function suakhuyenmai($makhuyenmai, $tenkhuyenmai, $giatrikhuyenmai, $thoigianbatdau, $thoigianketthuc){
        $query = "UPDATE khuyenmai SET tenkhuyenmai = '$tenkhuyenmai', giatrikhuyenmai = $giatrikhuyenmai, 
        thoigianbatdau = '$thoigianbatdau', thoigianketthuc = '$thoigianketthuc'
                    where makhuyenmai = $makhuyenmai";
        return mysqli_query($this->con, $query);
    }
    // =============Update khuyến mãi
    function khuyenmaihethan($ngayhientai){
        $query = "SELECT makhuyenmai FROM khuyenmai where thoigianketthuc = '$ngayhientai' and tinhtrang = 1";
        return mysqli_query($this->con, $query);
    }
    function update_khuyenmai($ngayhientai){
        $query = "UPDATE khuyenmai SET tinhtrang = 0 where thoigianketthuc = '$ngayhientai' and tinhtrang = 1";
        return mysqli_query($this->con, $query);
    }
    function update_khuyenmai_sanpham($makhuyenmai){
        $query = "UPDATE sanpham SET makhuyenmai = 1 where makhuyenmai = $makhuyenmai";
        return mysqli_query($this->con, $query);
    }
    // =================================SẢN PHẨM=============================
    function getSP(){
        $query = "SELECT * FROM sanpham inner join danhmuc on sanpham.madm = danhmuc.madm 
        inner join loaisanpham on sanpham.maloai = loaisanpham.maloai
        inner join nhacungcap on sanpham.mancc = nhacungcap.mancc
        inner join nhasanxuat on sanpham.mansx = nhasanxuat.mansx
        inner join khuyenmai on sanpham.makhuyenmai = khuyenmai.makhuyenmai
                                        ORDER BY  masp DESC";
        return mysqli_query($this->con, $query);
    }
    function ctsanpham($masp){
        $query = "SELECT * FROM sanpham inner join danhmuc on sanpham.madm = danhmuc.madm 
                                        inner join loaisanpham on sanpham.maloai = loaisanpham.maloai
                                        inner join nhacungcap on sanpham.mancc = nhacungcap.mancc
                                        inner join nhasanxuat on sanpham.mansx = nhasanxuat.mansx
                                        inner join khuyenmai on sanpham.makhuyenmai = khuyenmai.makhuyenmai 
                                        WHERE masp = $masp ";
        return mysqli_query($this->con, $query);
    }
    function ctsanpham_giohang($masp){
        $query = "SELECT * FROM sanpham WHERE masp = $masp ";
        return mysqli_query($this->con, $query);
    }
    function motasanpham($masp){
        $query = "SELECT * FROM motasanpham where masp = $masp";
        return mysqli_query($this ->con, $query);
    }
    function themmota($masp, $tieude, $mota, $congdung, $thongtinthem){
        $query = "INSERT into motasanpham VALUES (null, $masp, '$tieude', '$mota', '$congdung', '$thongtinthem')";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }
    function suamota($mamota, $tieude, $mota, $congdung, $thongtinthem){
        $query = "UPDATE motasanpham SET 
        tieude = '$tieude',
        mota = '$mota',
        congdung = '$congdung',
        thongtinthem = '$thongtinthem' 
        WHERE mamota = '$mamota'";
         $ketqua = false;
         if(mysqli_query($this->con, $query)){
             $ketqua = true;
         }
         return json_encode($ketqua);
        
    }
    // =================Thêm sản phẩm mới=======================
    function themsanpham($tensanpham, $hinhanh, $dongia, $soluongton, $thoihanbaohanh, $maloai, $madm, $mansx, $mancc, $makhuyenmai){
        $query = "INSERT into sanpham VALUES (null,'$tensanpham', '$hinhanh', '$dongia', '$soluongton', '$thoihanbaohanh', '$maloai', '$madm', '$mansx', '$mancc', '$makhuyenmai')";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }
    function xoasanpham($masp){
        $query = "DELETE FROM sanpham WHERE  masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function suasanpham($masp, $tensanpham, $hinhanh, $dongia, $soluongton, $thoihanbaohanh, $maloai, $madm, $mansx, $mancc, $makhuyenmai){
        $query = "UPDATE sanpham SET tensanpham = '$tensanpham',
        hinhanh = '$hinhanh',
        dongia = '$dongia',
        soluongton = '$soluongton',
        thoihanbaohanh = '$thoihanbaohanh',
        maloai = '$maloai',
        madm = '$madm',
        mansx = '$mansx',
        mancc = '$mancc',
        makhuyenmai = '$makhuyenmai' 
        where masp = $masp";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }

    // ===============================================* NHÂN VIÊN *===================================================//
    // -------Nhân viên
    function chucvu(){
        $query = "SELECT * from chucvu order by macv LIMIT 10000 offset 1 ";
        return mysqli_query($this->con, $query);
    }
    function phanquyen($manv, $macv){
        $query = "UPDATE nhanvien SET macv = $macv where manv = $manv " ;
        return mysqli_query($this->con, $query);
    }
    function xemnhanvien(){
        $query = "SELECT * from nhanvien inner join chucvu on nhanvien.macv = chucvu.macv order by manv LIMIT 10000 offset 1 ";
        return mysqli_query($this->con, $query);
    }
    function chitietnhanvien($manv){
        $query = "SELECT * from nhanvien inner join chucvu on nhanvien.macv = chucvu.macv where manv = $manv ";
        return mysqli_query($this->con, $query);
    }
    function themnhanvien($tennhanvien, $sdtnhanvien, $gioitinh, $ngaysinh, $email, $diachi, $macv){
        $query = "INSERT into nhanvien VALUES(null,'$tennhanvien','$sdtnhanvien','$gioitinh','$ngaysinh','$email','$diachi',$macv, null, null,'Chưa có việc',null,null)";
        return mysqli_query($this->con, $query);

    }
    function themtaikhoan($manv, $tendangnhap, $matkhau){
        $query = "UPDATE nhanvien SET tendangnhap = '$tendangnhap', matkhau = '$matkhau' where manv = $manv";
        return mysqli_query($this->con, $query);

    }
    function suanhanvien($manv, $tennhanvien, $sdtnhanvien, $gioitinh, $ngaysinh, $email, $diachi){
        $query = "UPDATE nhanvien SET 
        tennhanvien = '$tennhanvien', 
        sdtnhanvien = '$sdtnhanvien',
        gioitinh ='$gioitinh',
        ngaysinh = '$ngaysinh',
        email = '$email',
        diachi = '$diachi'                                  
        where manv = $manv " ;
        return mysqli_query($this->con, $query);
    }
    function ktraTendangnhap($tendangnhap){// ajax
        $query = "SELECT manv from nhanvien where tendangnhap = '$tendangnhap'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Tên đăng nhập đã được sử dụng";
        }
        return $ketqua_ktra;
    }
    function ktraSodienthoaiNV($sdtnhanvien){
        $query = "SELECT manv from nhanvien where sdtnhanvien = '$sdtnhanvien'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Số điện thoại đã được sử dụng";
        }
        return $ketqua_ktra;
    }
    function ktraTendangnhap2($tendangnhap){// controller
        $query = "SELECT manv from nhanvien where tendangnhap = '$tendangnhap'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = true;
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = false;
        }
        return $ketqua_ktra;
    }
    // -------PHÂN CÔNG
    function nhanvien_pc(){
        $query = "SELECT * FROM nhanvien inner join chucvu on nhanvien.macv = chucvu.macv  where nhanvien.macv = 3";
        return mysqli_query($this->con, $query);
    }
    function ct_nhanvien_pc($manv){
        $query = "SELECT * FROM nhanvien inner join chucvu on nhanvien.macv = chucvu.macv  where nhanvien.macv = 3 and manv = $manv";
        return mysqli_query($this->con, $query);
    }
    function phancong_coviec($manv, $motacongviec){
        $query = "UPDATE nhanvien SET 
            trangthai = 'Đang sửa chữa',
            motacongviec = '$motacongviec' 
            where manv = $manv;";
        return mysqli_query($this->con, $query);
    }
    function phancong_chuacoviec($manv){
        $query = "UPDATE nhanvien SET trangthai = 'Chưa có việc', motacongviec = null where manv = $manv";
        return mysqli_query($this->con, $query);
    }
    
    // =====================================SỬA CHỮA==========================================
    // ==========Load khách hàng
    function loadkhachhang(){
        $query = "SELECT * FROM khachhang ORDER BY makh DESC";
        return mysqli_query($this->con, $query);
    }
    function ctkhachhang($makh){
        $query = "SELECT * FROM khachhang where makh = $makh";
        return mysqli_query($this->con, $query);
    }
    function ktraSodienthoai($sdtkhachhang){
        $query = "SELECT makh from khachhang where sdtkhachhang = '$sdtkhachhang'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Số điện thoại đã được sử dụng";
        }
        return $ketqua_ktra;
    }
    // ============ Hóa đơn
    function themhoadon($makh,$ngaylap,$ngaygiodieuphoi){
        $query = "INSERT into hoadon values (null,null, $makh,'$ngaylap',null,'Chờ tiếp nhận','$ngaygiodieuphoi')";
        return mysqli_query($this->con, $query);
    }
    function update_hoadon_manv($mahd, $manv){
        $query = "UPDATE hoadon SET manv = $manv, tinhtranghd = 'Đã tiếp nhận' where mahd = $mahd";
        return mysqli_query($this->con, $query);
    }
    function update_tongtienhd($mahd, $tongtien){
        $query = "UPDATE hoadon SET tongtien = $tongtien where mahd = $mahd";
        return mysqli_query($this->con, $query);
    }
    function laymahd_moi(){
        $query = "SELECT * FROM hoadon  ORDER BY  mahd DESC LIMIT 1;";
        return mysqli_query($this->con, $query);
    }
    function themchitiethd($masp, $mahd, $soluong, $dongia, $thanhtien){
        $query = "INSERT into chitiethoadon values (null,$masp, $mahd, $soluong, $dongia, $thanhtien, 'Bảo hành')";
        return mysqli_query($this->con, $query);
    } 
    function loadhoadon_dieuphoi(){
        $query =  "SELECT * FROM hoadon inner join khachhang on hoadon.makh = khachhang.makh where tinhtranghd ='Chờ tiếp nhận'";
        return mysqli_query($this->con, $query);
    } 
    function lichsuphancong(){
        $query =  "SELECT * FROM lichsuphancong inner join hoadon on hoadon.mahd = lichsuphancong.mahd 
                                                inner join nhanvien on nhanvien.manv = lichsuphancong.manv
                                                inner join khachhang on khachhang.makh = hoadon.makh";
        return mysqli_query($this->con, $query);
    }
    function themlichsuphancong($mahd, $manv, $ngaygiophancong){
        $query = "INSERT into lichsuphancong values (null,$mahd, $manv, '$ngaygiophancong')";
        return mysqli_query($this->con, $query);
    }
    function xemchitietLS($mahd){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
                                        inner join sanpham on sanpham.masp = chitiethoadon.masp 
                                        Where hoadon.mahd = $mahd ";
        return mysqli_query($this->con, $query);
    }
   
    // ===========Yêu cầu bảo hành online
    function loadhoadon_dieuphoi_datlich(){
        $query =  "SELECT * FROM hoadon inner join khachhang on hoadon.makh = khachhang.makh where tinhtranghd ='Yêu cầu bảo hành'";
        return mysqli_query($this->con, $query);
    } 
    function loadhoadon_datlich_suachua(){
        $query =  "SELECT * FROM hoadon inner join khachhang on hoadon.makh = khachhang.makh where tinhtranghd ='Yêu cầu sửa chữa'";
        return mysqli_query($this->con, $query);
    } 
    function laytinhtranghd($mahd){
        $query =  "SELECT tinhtranghd FROM hoadon where  mahd = $mahd";
        return mysqli_query($this->con, $query);
    } 
    function chitietyeucau($mahd){
        $query =  "SELECT *, sanpham.hinhanh as hinhanh FROM chitiethoadon  inner join hoadon on hoadon.mahd = chitiethoadon.mahd 
                                                inner join sanpham on sanpham.masp = chitiethoadon.masp 
                                                inner join khachhang on khachhang.makh = hoadon.makh
                                                where chitiethoadon.mahd = $mahd and chitiethoadon.tinhtrang = 'Bảo hành'";
        return mysqli_query($this->con, $query);
    }
    function update_tinhtrang_huyyeucau($mahd){
        $query = "UPDATE hoadon SET tinhtranghd = 'Đã hoàn thành' where mahd = $mahd";
        return mysqli_query($this->con, $query);
    }
    function update_tinhtrang_huyyeucau_suachua($mahd){
        $query = "UPDATE hoadon SET tinhtranghd = 'Đã hủy' where mahd = $mahd";
        return mysqli_query($this->con, $query);
    }
    function update_tinhtrangcthd_huyyeucau_suachua($mahd,$masp){
        $query = "UPDATE chitiethoadon SET tinhtrang = 'Bảo hành' where mahd = $mahd and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function hoadonhuyyeucau($mahd){
        $query = "SELECT * FROM chitiethoadon inner join hoadon on chitiethoadon.mahd = hoadon.mahd where tinhtranghd = 'Đã hủy' and chitiethoadon.mahd = $mahd";
        return mysqli_query($this->con, $query);
    }
    function huyyeucau_masp($mahd,$masp){
        $query = "SELECT * FROM chitiethoadon inner join hoadon on chitiethoadon.mahd = hoadon.mahd where tinhtranghd = 'Đã hủy' and chitiethoadon.mahd = $mahd and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function ctsp_huyyeucau($masp){
        $query = "SELECT * FROM sanpham where  masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function update_sanpham_huyyeucau($masp, $soluongton){
        $query = "UPDATE sanpham SET soluongton = $soluongton where masp = $masp";
        return mysqli_query($this->con, $query);
    }
    // =========================KHÁCH HÀNG=========================
    function xemkhachhang(){
        $query = "SELECT * FROM khachhang order by makh DESC";
        return mysqli_query($this->con, $query);
    }
    function xemchitietkhachhang($makh){
        $query = "SELECT * FROM khachhang where makh = $makh";
        return mysqli_query($this->con, $query);
    }
    function themkhachhang($tenkhachhang, $sdtkhachhang){
        $query = "INSERT into khachhang values (null,'$tenkhachhang', '$sdtkhachhang',null,null,null,'$2y$10$9DBf.rAofVLKaD3g8DsI4O/xNx3lYOj7hg3NKnmNJz/fCzH/UDgLO')";
        return mysqli_query($this->con, $query);
    }
    function suakhachhang($makh, $tenkhachhang, $sdtkhachhang, $diachi, $email, $ngaysinh){
        $query = "UPDATE khachhang SET 
        tenkhachhang = '$tenkhachhang',
        sdtkhachhang = '$sdtkhachhang',
        diachi = '$diachi',
        email = '$email',
        ngaysinh = '$ngaysinh' where makh = $makh";
        return mysqli_query($this->con, $query);
    }
    function xoakhachhang($makh){
        $query = "DELETE FROM khachhang WHERE makh = $makh";
        return mysqli_query($this->con, $query);
    }
    // =========================BẢO HÀNH===========================
    function xembaohanh(){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
                                        inner join sanpham on sanpham.masp = chitiethoadon.masp 
                                        where tinhtranghd = 'Đã hoàn thành' and tinhtrang = 'Bảo hành' ";
        return mysqli_query($this->con, $query);
    }
    function chitietbaohanh($masp){
        $query = "SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
                                        inner join chitiethoadon on hoadon.mahd = chitiethoadon.mahd 
                                        inner join sanpham on sanpham.masp = chitiethoadon.masp 
                                        where tinhtranghd = 'Đã hoàn thành' and sanpham.masp = $masp and tinhtrang = 'Bảo hành' ";
        return mysqli_query($this->con, $query);
    }
    function update_cthd($macthd, $soluong){
        $query = "UPDATE chitiethoadon SET soluong = $soluong where macthd = $macthd ";
        return mysqli_query($this->con, $query);
    }
    function update_cthd_tinhtrang($macthd){
        $query = "UPDATE chitiethoadon SET tinhtrang ='Đã bảo hành' where macthd = $macthd";
        return mysqli_query($this->con, $query);
    }
    function delete_cthd($macthd){
        $query = "DELETE FROM chitiethoadon WHERE  macthd = $macthd";
        return mysqli_query($this->con, $query);
    }
    function themhoadon_baohanh($makh, $ngaylap, $ngaygiodieuphoi){
        $query = "INSERT into hoadon values (null,null, $makh,'$ngaylap',0,'Chờ tiếp nhận','$ngaygiodieuphoi')";
        return mysqli_query($this->con, $query);
    }
    function laymahd_moi_baohanh(){
        $query = "SELECT * FROM hoadon  ORDER BY  mahd DESC LIMIT 1;";
        return mysqli_query($this->con, $query);
    }
    function themchitiethd_baohanh($masp, $mahd){
        $query = "INSERT into chitiethoadon values (null,$masp, $mahd, 1, 0, 0, 'Bảo hành')";
        return mysqli_query($this->con, $query);
    } 
    function sanphamloi($masp){
        $query = "SELECT soluong from  sanphamloi where masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function ktrasanphamloi($mancc, $masp){
        $query = "SELECT masploi, soluong from  sanphamloi where masp = $masp and mancc = $mancc";
        $row = mysqli_query($this->con, $query);
        if(mysqli_num_rows($row) > 0){
            return true;
        }
        return false;
    }
    function themsanphamloi($masp,$mancc, $soluong){
        $query = "INSERT into sanphamloi values (null,$masp,$mancc, $soluong)";
        return mysqli_query($this->con, $query);
    }
    function updatesanphamloi($masp, $soluong){
        $query = "UPDATE sanphamloi SET soluong = $soluong where masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function soluongsanpham($masp){
        $query = "SELECT soluongton from sanpham where masp = $masp";
        return mysqli_query($this->con, $query);
    }
// ======================ĐƠN HÀNG=========================
    function chuaxacnhan(){
        $query = "SELECT * FROM hoadon_online inner join khachhang on khachhang.makh = hoadon_online.makh  where tinhtrangdh = 'Chờ xác nhận'  ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function daxacnhan(){
        $query = "SELECT * FROM hoadon_online inner join khachhang on khachhang.makh = hoadon_online.makh  where tinhtrangdh = 'Đã xác nhận'  ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function dahuy(){
        $query = "SELECT * FROM hoadon_online inner join khachhang on khachhang.makh = hoadon_online.makh  where tinhtrangdh = 'Đã hủy'  ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function dahoanthanh(){
        $query = "SELECT * FROM hoadon_online inner join khachhang on khachhang.makh = hoadon_online.makh  where tinhtrangdh = 'Đã hoàn thành'  ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function donhang($mahdonl){
        $query = "SELECT * FROM hoadon_online inner join khachhang on khachhang.makh = hoadon_online.makh  where mahdonl = $mahdonl  ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function chitietdonhang($mahdonl){
        $query = "SELECT * FROM cthd_online inner join sanpham on sanpham.masp = cthd_online.masp  where mahdonl = $mahdonl ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function chitietdonhang2($mahdonl){
        $query = "SELECT thanhtien, dongia, soluong, giatrikhuyenmai FROM cthd_online where mahdonl = $mahdonl ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function chitietdonhang3($macthdol){
        $query = "SELECT thanhtien, dongia, soluong, giatrikhuyenmai FROM cthd_online where macthdol = $macthdol ORDER BY  mahdonl DESC";
        return mysqli_query($this->con, $query);
    }
    function xoactdh($macthdol){
        $query = "DELETE FROM cthd_online WHERE macthdol = $macthdol";
        return mysqli_query($this->con, $query);
    }
    function update_tongtien_hoadon_onl($mahdonl,$tongtien){
        $query = "UPDATE hoadon_online SET tongtien = $tongtien where mahdonl = $mahdonl";
        return mysqli_query($this->con, $query);
    }
    function update_soluong_cthd($macthdol,$soluong){
        $query = "UPDATE cthd_online SET soluong = $soluong where macthdol = $macthdol";
        return mysqli_query($this->con, $query);
    }
    function update_thanhtien_cthd($macthdol,$thanhtien){
        $query = "UPDATE cthd_online SET thanhtien = $thanhtien where macthdol = $macthdol";
        return mysqli_query($this->con, $query);
    }
    function update_tinhtrang_xacnhan($mahdonl){
        $query = "UPDATE hoadon_online SET tinhtrangdh = 'Đã xác nhận' where mahdonl = $mahdonl";
        return mysqli_query($this->con, $query);
    }
    function update_tinhtrang_huydon($mahdonl){
        $query = "UPDATE hoadon_online SET tinhtrangdh = 'Đã hủy' where mahdonl = $mahdonl";
        return mysqli_query($this->con, $query);
    }
    function update_tinhtrang_hoanthanh($mahdonl){
        $query = "UPDATE hoadon_online SET tinhtrangdh = 'Đã hoàn thành' where mahdonl = $mahdonl";
        return mysqli_query($this->con, $query);
    }
    function hoadonhuy($mahdonl){
        $query = "SELECT * FROM cthd_online inner join hoadon_online on cthd_online.mahdonl = hoadon_online.mahdonl where tinhtrangdh = 'Đã hủy' and cthd_online.mahdonl = $mahdonl";
        return mysqli_query($this->con, $query);
    }
    function hoadonhuy_masp($mahdonl,$masp){
        $query = "SELECT * FROM cthd_online inner join hoadon_online on cthd_online.mahdonl = hoadon_online.mahdonl where tinhtrangdh = 'Đã hủy' and cthd_online.mahdonl = $mahdonl and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function update_sanpham_huydon($masp, $soluongton){
        $query = "UPDATE sanpham SET soluongton = $soluongton where masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function ctsp_huydon($masp){
        $query = "SELECT * FROM sanpham where  masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function ctsp_cthd($masp){
        $query = "SELECT soluongton FROM sanpham where  masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function ctsp_soluong_cthd($macthdol, $masp){
        $query = "SELECT soluong FROM cthd_online where  macthdol = $macthdol and masp = $masp";
        return mysqli_query($this->con, $query);
    }
// ================KHO HÀNG==================
// ===========Trả hàng
    function xemnhacc_sanphamloi(){
        $query ="SELECT *, count(nhacungcap.mancc) as tong from sanphamloi 
        inner join nhacungcap on sanphamloi.mancc = nhacungcap.mancc group by nhacungcap.mancc";
        return mysqli_query($this->con, $query);
    }
    function xemchitietncc($mancc){
        $query = "SELECT * FROM nhacungcap inner join sanphamloi on sanphamloi.mancc = nhacungcap.mancc
                                            where nhacungcap.mancc = $mancc";
        return mysqli_query($this->con, $query);
    }
    function xemnhacc($mancc){
        $query = "SELECT * FROM nhacungcap where mancc = $mancc";
        return mysqli_query($this->con, $query);
    }
    function xemsanphamloi($mancc){
        $query = "SELECT * FROM sanphamloi  inner join sanpham on sanpham.masp = sanphamloi.masp
                                            inner join nhacungcap on sanpham.mancc = nhacungcap.mancc
                                            where  nhacungcap.mancc = $mancc";
        return mysqli_query($this->con, $query);
    }
    function themphieutra($ngaylap, $manv, $mancc){
        $query = "INSERT into phieutrahang values (null,'$ngaylap', $manv, $mancc)";
        return mysqli_query($this->con, $query);
    }
    function laymaphieutra_new(){
        $query = "SELECT * FROM phieutrahang ORDER BY  mapt DESC LIMIT 1";
        return mysqli_query($this->con, $query);
    }
    function themchitietphieutra($mapt, $masp, $soluong){
        $query = "INSERT into chitietphieutra values (null,$mapt, $masp, $soluong)";
        return mysqli_query($this->con, $query);
    }
    function xoasanphamloi($mancc){
        $query = "DELETE  FROM  sanphamloi where mancc = $mancc";
        return mysqli_query($this->con, $query);
    }
    function xemdanhsachphieutra(){
        $query = "SELECT * FROM phieutrahang inner join nhacungcap on phieutrahang.mancc = nhacungcap.mancc
                                             ORDER BY  mapt DESC";
        return mysqli_query($this->con, $query);
    }
    function chitietphieutra($mapt){
        $query = "SELECT * FROM chitietphieutra 
                    inner join phieutrahang on chitietphieutra.mapt = phieutrahang.mapt
                    inner join nhacungcap on nhacungcap.mancc = phieutrahang.mancc 
                    inner join sanpham on chitietphieutra.masp = sanpham.masp
                    where chitietphieutra.mapt = $mapt";
        return mysqli_query($this->con, $query);
    }
    // ==================Đặt hàng + Nhập hàng
    function xemnhacc_sanpham(){
        $query ="SELECT *, count(nhacungcap.mancc) as tong from sanpham 
        inner join nhacungcap on sanpham.mancc = nhacungcap.mancc group by nhacungcap.mancc";
        return mysqli_query($this->con, $query);
    }
    function xemdssanpham($mancc){
        $query = "SELECT * FROM sanpham  inner join nhacungcap on sanpham.mancc = nhacungcap.mancc
                                            where  nhacungcap.mancc = $mancc";
        return mysqli_query($this->con, $query);
    }
    function themphieudathang($ngaylap,$manv,$mancc){
        $query = "INSERT into phieudathang values (null,'$ngaylap', $manv, $mancc, 'Chưa tạo phiếu nhập')";
        return mysqli_query($this->con, $query);
    }
    function laymaphieudat_new(){
        $query = "SELECT * FROM phieudathang ORDER BY  mapd DESC LIMIT 1";
        return mysqli_query($this->con, $query);
    }
    function themchitietphieudat($mapd, $masp, $soluong){
        $query = "INSERT into chitietphieudat values (null,$mapd, $masp, $soluong)";
        return mysqli_query($this->con, $query);
    }
    function xemdsphieudat(){
        $query = "SELECT * FROM phieudathang inner join nhacungcap on phieudathang.mancc = nhacungcap.mancc where tinhtrangpd ='Chưa tạo phiếu nhập' ORDER BY  mapd DESC";
        return mysqli_query($this -> con, $query);
    }
    function update_phieudat($mapd){
        $query = "UPDATE phieudathang SET tinhtrangpd = 'Đã tạo phiếu nhập hàng' where mapd = $mapd ";
        return mysqli_query($this->con, $query);
    }
    function chitietphieudat($mapd){
        $query = "SELECT * FROM chitietphieudat
                    inner join phieudathang on chitietphieudat.mapd = phieudathang.mapd
                    inner join nhacungcap on nhacungcap.mancc = phieudathang.mancc 
                    inner join sanpham on chitietphieudat.masp = sanpham.masp
                    where chitietphieudat.mapd = $mapd";
        return mysqli_query($this->con, $query);
    }
    function taophieunhap($mapd, $ngaylap, $manv, $mancc){
        $query = "INSERT into phieunhaphang values (null,$mapd, '$ngaylap', $manv, $mancc, null)";
        return mysqli_query($this->con, $query);
    }
    function laymaphieunhap_new(){
        $query = "SELECT * FROM phieunhaphang ORDER BY  mapn DESC LIMIT 1";
        return mysqli_query($this->con, $query);
    }
    function themchitietphieunhap($mapn, $masp, $soluong){//Phiếu nhập này chưa có giá nhập
        $query = "INSERT into chitietphieunhap values (null,$mapn, $masp, $soluong, null, null)";
        return mysqli_query($this->con, $query);
    }
    function update_gianhap_ctpn($mapn, $masp, $gianhap){
        $query = "UPDATE chitietphieunhap SET gianhap = $gianhap where mapn = $mapn and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function chitietphieunhap($mapn, $masp){
        $query = "SELECT * FROM chitietphieunhap where mapn = $mapn and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function chitietphieunhap_xem($mapn){
        $query = "SELECT * FROM chitietphieunhap inner join sanpham on sanpham.masp = chitietphieunhap.masp where mapn = $mapn";
        return mysqli_query($this->con, $query);
    }
    function xemtongtien_nhanvien_phieunhap($mapn){
        $query = "SELECT * FROM phieunhaphang inner join nhanvien on nhanvien.manv = phieunhaphang.manv  where mapn = $mapn";
        return mysqli_query($this->con, $query);
    }
    function update_thanhtien_ctpn($mapn, $masp, $thanhtien){
        $query = "UPDATE chitietphieunhap SET thanhtien = $thanhtien where mapn = $mapn and masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function update_tongtien_phieunhap($mapn, $tongtien){
        $query = "UPDATE phieunhaphang SET tongtien = $tongtien where mapn = $mapn";
        return mysqli_query($this->con, $query);
    }
    function nhapkho($masp, $soluongton){
        $query = "UPDATE sanpham SET soluongton = $soluongton where masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function ctsp_nhapkho($masp){
        $query = "SELECT soluongton FROM sanpham where masp = $masp";
        return mysqli_query($this->con, $query);
    }
    function danhsachphieunhap(){
        $query = "SELECT * FROM phieunhaphang inner join nhanvien on nhanvien.manv = phieunhaphang.manv
                                              inner join nhacungcap on nhacungcap.mancc = phieunhaphang.mancc
                                              ORDER BY  mapn DESC ";
        return mysqli_query($this->con, $query);
    }
    function chitietphieunhap2($mapn){
        $query = "SELECT * FROM chitietphieudat
                    inner join phieunhaphang on chitietphieunhap.mapn = phieunhaphang.mapn
                    inner join nhacungcap on nhacungcap.mancc = phieunhaphang.mancc 
                    inner join sanpham on chitietphieunhap.masp = sanpham.masp
                    where chitietphieunhap.mapn = $mapn";
        return mysqli_query($this->con, $query);
    }
    // =============================XUẤT PDF======================
    function chitietphieunhap_pdf($mapn){
        $query = "SELECT tensanpham, soluong, gianhap, thanhtien  FROM chitietphieunhap inner join sanpham on sanpham.masp = chitietphieunhap.masp where mapn = $mapn";
        return mysqli_query($this->con, $query);
    } 
    function phieunhap_pdf($mapn){
        $query = "SELECT *, nhacungcap.diachi as diachincc FROM phieunhaphang inner join nhanvien on nhanvien.manv = phieunhaphang.manv
                                              inner join nhacungcap on nhacungcap.mancc = phieunhaphang.mancc
                                              where mapn = $mapn";
        return mysqli_query($this->con, $query);
    }

    function chitietphieutra_pdf($mapt){
        $query = "SELECT tensanpham, soluong FROM chitietphieutra inner join sanpham on sanpham.masp = chitietphieutra.masp where mapt = $mapt";
        return mysqli_query($this->con, $query);
    } 
    function phieutra_pdf($mapt){
        $query = "SELECT *, nhacungcap.diachi as diachincc FROM phieutrahang inner join nhanvien on nhanvien.manv = phieutrahang.manv
                                              inner join nhacungcap on nhacungcap.mancc = phieutrahang.mancc
                                              where mapt = $mapt";
        return mysqli_query($this->con, $query);
    }
    function chitietphieudat_pdf($mapd){
        $query = "SELECT tensanpham, soluong FROM chitietphieudat inner join sanpham on sanpham.masp = chitietphieudat.masp where mapd = $mapd";
        return mysqli_query($this->con, $query);
    } 
    function phieudat_pdf($mapd){
        $query = "SELECT *, nhacungcap.diachi as diachincc FROM phieudathang inner join nhanvien on nhanvien.manv = phieudathang.manv
                                              inner join nhacungcap on nhacungcap.mancc = phieudathang.mancc
                                              where mapd = $mapd";
        return mysqli_query($this->con, $query);
    }
    // =========================THỐNG KÊ=========================
    function count_ycsuachua(){
        $query = "SELECT COUNT(mahd) as soluongyeucau from hoadon where tinhtranghd = 'Yêu cầu sửa chữa'";
        return mysqli_query($this->con, $query);
    } 
    function count_ycbaohanh(){
        $query = "SELECT COUNT(mahd) as soluongyeucau from hoadon where tinhtranghd = 'Yêu cầu bảo hành'";
        return mysqli_query($this->con, $query);
    } 
    function count_ycmuahang(){
        $query = "SELECT COUNT(mahdonl) as soluongyeucau from hoadon_online where tinhtrangdh = 'Chờ xác nhận'";
        return mysqli_query($this->con, $query);
    } 
}
?>