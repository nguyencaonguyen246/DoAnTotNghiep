<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$mang = array();
while($row =  mysqli_fetch_array($dataview['chitietphieutra'])){
    $mang[] = $row;
}
$data .= '<div style="font-size:14px">';
$data .= '<div style="text-align:center"><span>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</span></div>';
$data .= '<div style="text-align:center"><strong>Độc lập - Tự do - Hạnh phúc</strong></div>';
$data .= '<div style="text-align:center">_______________________</div>';
$data .= '</div>';
$data .= '<h2 style="text-align:center;">BIÊN BẢN TRẢ LẠI HÀNG</h2>';
$data .= '<div style="font-size:14px; padding-top:10px">';
$data .= '<p style="font-style: italic;">Hôm nay, vào lúc '.$dataview['gio'].' giờ '.$dataview['phut'].' phút, ngày '.$dataview['ngay'].' tháng '.$dataview['thang'].' năm '.$dataview['nam'].'</p>';
$data .= '<span>Tại công ty TNHH MTV Cấp Cứu Điện Thoại chúng tôi gồm:</span> <br>';
$data .= '<span><strong>1. BÊN BÁN:</strong> '.$dataview['tenncc'].'</span> <br>';
$data .= '<span>Địa chỉ: '.$dataview['diachi'].'</span> <br>';
$data .= '<span>Điện thoại: '.$dataview['sdtncc'].'  Email: '.$dataview['email'].'</span> <br>';
$data .= '<span>Đại diện:............................................., Chức vụ:......................................</span> <br>';
$data .= '<span><strong>2. BÊN MUA:</strong> CÔNG TY TNHH MTV CẤP CỨU ĐIỆN THOẠI</span> <br>';
$data .= '<span>Địa chỉ: 140 Lê Trọng Tấn, phường Tây Thạnh, quận Tân Phú, TPHCM</span> <br>';
$data .= '<span>Điện thoại: 0358034832  Email: nguyencaonguyen246@gmail.com</span> <br>';
$data .= '<span>Đại diện: Nguyễn Cao Nguyên, Chức vụ: Quản lý cửa hàng</span> <br>';
$data .= '<span></span> <br>';
$data .= '<span>Bên mua trả lại số linh kiện bị lỗi trong thời gian bảo hành theo thỏa thuận đã ký giữa 2 bên, bên bán đồng ý nhận lại số 
            linh kiện nêu trên và hoàn lại một số tiền bằng 70% giá trị sản phẩm như trong hợp đồng mua bán đã ký.</span> <br>';
$data .= '<span></span> <br>';
$data .= '<span>Danh sách linh kiện hoàn trả đính kèm: </span> <br>';
$data .= '<span></span> <br>';
$data .= '<table class="table" style="width:100%; font-size:13px"> ';
$data .= '  <thead>
                <tr>
                    <td style="font-weight:bold;">STT</td>
                    <td style="font-weight:bold;">Tên sản phẩm</td>
                    <td style="font-weight:bold; padding-right:0">Số lượng</td>
                </tr>
            </thead>';
$data .= '<tbody>';
for($i = 0; $i < sizeof($mang); $i++){
    $dem = $i + 1;
    $data .= 
            '<tr>
                <td>'.$dem.'</td>
                <td>'.$mang[$i][0].'</td>
                <td>'.$mang[$i][1].'</td>
            </tr>';
}
$data .= '</tbody>';
$data .= '</table>';
$data .= '<span></span> <br>';
$data .= '<table class="table" style="width:100%; font-size:13px; text-align:center">
                <tr>
                    <td style="font-weight:bold;">Đại diện bên bán</td>
                    <td style="font-weight:bold;">Đại diện bên mua</td>
                </tr>
                <tr>
                    <td style="font-style: italic;">(Ký tên và ghi rõ họ tên)</td>
                    <td style="font-style: italic;">(Ký tên và ghi rõ họ tên)</td>
                </tr>
        </table>';
$data .= '</div>';
$data .= '<div style="position: fixed;bottom:0; right:0; "><img style="max-width: 200px;" src="https://firebasestorage.googleapis.com/v0/b/quanlynhansu-10734.appspot.com/o/Khoaluantotnghiep%2Flogo_ccdt_v3.png?alt=media&token=fff83bf9-5470-4570-aa5a-ab5a3df6c33d" alt="logo images"></div>';

$mpdf->WriteHTML($data);
$mpdf->Output();

