$(document).ready(function() {
   $("#tendangnhap").keyup(function(){
       var user = $(this).val();
        $.post("http://localhost:8089/KhoaLuanTotNghiep/Ajax/ktraTendangnhap",
        {tendangnhap: user},function(data) {
            $("#messTendangnhap").html(data);
        });
   });
});