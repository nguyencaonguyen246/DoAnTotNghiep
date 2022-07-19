<?php 
class UserModel extends dbconnect{
    function dangky($matkhau, $sdtkhachhang ){
        $query = "INSERT into khachhang values (null,null,'$sdtkhachhang', null, null, null,'$matkhau')";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }
    function dangnhap($sdtkhachhang){
        $query = "SELECT * From khachhang Where sdtkhachhang = '$sdtkhachhang'";
        return mysqli_query($this->con, $query);
    }

    function ktraSdtdangnhap($sdtkhachhang){
        $query = "SELECT makh from khachhang where sdtkhachhang = '$sdtkhachhang'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) > 0){
            $ketqua_ktra = "Số điện thoại đã được sử dụng";
        }
        return $ketqua_ktra;
    }

    function ktraDoiMK($makh, $matkhau){
        $query = "SELECT makh from khachhang where makh = '$makh' and matkhau =  '$matkhau'";
        $row = mysqli_query($this -> con, $query);
        $ketqua_ktra = "";
        if(mysqli_num_rows($row) <= 0){
            $ketqua_ktra = "Mật khẩu cũ không đúng!";
        }
        return $ketqua_ktra;
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

    function suathongtin($makh, $tenkhachhang, $email, $diachi){
        $query = "UPDATE khachhang SET tenkhachhang ='$tenkhachhang', email='$email', diachi='$diachi' where makh = $makh";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }
    function thongtin($makh){
        $query = "SELECT * from khachhang where makh = $makh ";
        return mysqli_query($this->con, $query);
    }

    //đỏi mật khẩu
    function doimatkhau($makh, $matkhau){
        $query = "UPDATE khachhang SET matkhau ='$matkhau' where makh = $makh";
        $ketqua = false;
        if(mysqli_query($this->con, $query)){
            $ketqua = true;
        }
        return json_encode($ketqua);
    }
    
}
?>