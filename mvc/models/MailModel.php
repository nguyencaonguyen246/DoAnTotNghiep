<?php 
class MailModel{
    function SendMail($to, $subject, $txt, $cc){
        $ketqua_ktra = false;
        // $to = "nguyencaonguyen246@gmail.com";
        // $subject = "Tin nhắn mail mẫu";
        // $txt = "Đây là nội dung của mail!";
        $headers = "From: CapCuuDienThoai.vn <vuvanthin1702@gmail.com>" . "\r\n" ;
        $headers .= "Content-type: text/html; charset=utf-8 \r\n";
        $headers .= "CC:".$cc;
        // "CC: vuvanhongson@gmail.com";
        

        //mail($to,$subject,$txt,$headers);

        if (mail($to,$subject,$txt,$headers) == true){
            $ketqua_ktra = true;
        }
        else{ 
            $ketqua_ktra = false;
        }
        return $ketqua_ktra;
    }

}
?>