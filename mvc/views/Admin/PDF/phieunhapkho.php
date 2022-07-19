<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

$mang = array();
while($row =  mysqli_fetch_array($dataview['chitietphieunhap'])){
    $mang[] = $row;
}
$data .= '<div style="font-size:14px">';
$data .= '<span>Đơn vị: ........................................... </span> <br>';
$data .= '<span>Bộ phận: ......................................... </span> <br>';
$data .= '</div>';
$data .= '<h2 style="text-align:center;">PHIẾU NHẬP KHO</h2>';
$data .= '<div style="font-size:14px; padding-top:10px">';
$data .= '<p style="text-align:right">Ngày '.$dataview['ngay'].' tháng '.$dataview['thang'].' năm '.$dataview['nam'].'</p>';
$data .= '<span>Nhập hàng từ công ty: '.$dataview['tenncc'].'</span> <br>';
$data .= '<span>Địa chỉ gửi hàng: '.$dataview['diachi'].'</span> <br>';
$data .= '<span>Họ và tên người nhập kho: '.$dataview['tennhanvien'].'</span> <br>';
$data .= '<span>Nhập kho tại: Công ty TNHH MTV Cấp Cứu Điện Thoại </span> <br>';
$data .= '<span>Địa chỉ nhập kho: 140 Lê Trọng Tấn, phường Tây Thạnh, quận Tân Phú, TPHCM</span> <br>';
$data .= '<span>Nội dung nhập vào kho gồm: </span> <br>';
$data .= '<span></span> <br>';
$data .= '<table class="table" style="width:100%; font-size:13px"> ';
$data .= '  <thead>
                <tr>
                    <td style="font-weight:bold;">STT</td>
                    <td style="font-weight:bold;" width="350">Tên sản phẩm</td>
                    <td style="font-weight:bold;">Số lượng</td>
                    <td align="center" style="font-weight:bold;">Giá nhập</td>
                    <td align="center" style="font-weight:bold;">Thành tiền</td>
                </tr>
            </thead>';
$data .= '<tbody>';
for($i = 0; $i < sizeof($mang); $i++){
    $dem = $i + 1;
    $data .= 
            '<tr>
                <td align="center">'.$dem.'</td>
                <td align="left">'.$mang[$i][0].'</td>
                <td align="center">'.$mang[$i][1].'</td>
                <td align="center">'.number_format($mang[$i][2], 0,',','.').' VNĐ</td>
                <td align="center">'.number_format($mang[$i][3], 0,',','.').' VNĐ</td>
            </tr>';
}
    $data .= '<tr>
                <td colspan="5" align="right"><strong>Tổng tiền:</strong> '.number_format($dataview['tongtien'], 0,',','.').' VNĐ</td>
            </tr>';
$data .= '</tbody>';
$data .= '</table>';
$data .= '<span></span> <br>';
$data .= '<table class="table" style="width:100%; font-size:13px; text-align:center">
                <tr>
                    <td style="font-weight:bold;">Người lập phiếu</td>
                    <td style="font-weight:bold;">Người nhập kho</td>
                    <td style="font-weight:bold;">Thủ kho</td>
                    <td style="font-weight:bold;">Quản lý</td>
                </tr>
                <tr>
                    <td>(Ký tên)</td>
                    <td>(Ký tên)</td>
                    <td>(Ký tên)</td>
                    <td>(Ký tên)</td>
                </tr>
        </table>';
$data .= '</div>';
$data .= '<div style="position: fixed;bottom:0; right:0; "><img style="max-width: 200px;" src="https://firebasestorage.googleapis.com/v0/b/quanlynhansu-10734.appspot.com/o/Khoaluantotnghiep%2Flogo_ccdt_v3.png?alt=media&token=fff83bf9-5470-4570-aa5a-ab5a3df6c33d" alt="logo images"> <br> (Phiếu nhập kho lưu hành nội bộ)</div>';

$mpdf->WriteHTML($data);
$mpdf->Output();

