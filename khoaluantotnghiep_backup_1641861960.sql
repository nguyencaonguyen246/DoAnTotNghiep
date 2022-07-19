

CREATE TABLE `chitietgiohang` (
  `mactgiohang` int(11) NOT NULL AUTO_INCREMENT,
  `magh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `giatrikhuyenmai` int(11) NOT NULL,
  `giakhuyenmai` float NOT NULL,
  `thanhtien` float NOT NULL,
  PRIMARY KEY (`mactgiohang`),
  KEY `chitietgiohang_ibfk_1` (`magh`),
  KEY `chitietgiohang_ibfk_2` (`masp`),
  CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`magh`) REFERENCES `giohangkhachhang` (`magh`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ckSLCTgh` CHECK (`soluong` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `chitiethoadon` (
  `macthd` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) NOT NULL,
  `mahd` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `thanhtien` float NOT NULL,
  `tinhtrang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`macthd`),
  KEY `masp` (`masp`),
  KEY `mahd` (`mahd`),
  CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE,
  CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE,
  CONSTRAINT `ckSLCTHD` CHECK (`soluong` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO chitiethoadon VALUES("1","21","1","1","4550000","4550000","Bảo hành");
INSERT INTO chitiethoadon VALUES("2","18","2","1","650000","650000","Bảo hành");
INSERT INTO chitiethoadon VALUES("3","20","3","1","1100000","1100000","Đã bảo hành");
INSERT INTO chitiethoadon VALUES("4","20","4","1","0","0","Đã bảo hành");
INSERT INTO chitiethoadon VALUES("5","3","5","1","584000","584000","Bảo hành");
INSERT INTO chitiethoadon VALUES("6","20","6","1","1100000","0","Bảo hành");



CREATE TABLE `chitietphieudat` (
  `mactpd` int(11) NOT NULL AUTO_INCREMENT,
  `mapd` int(11) DEFAULT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`mactpd`),
  KEY `mapd` (`mapd`),
  KEY `masp` (`masp`),
  CONSTRAINT `chitietphieudat_ibfk_1` FOREIGN KEY (`mapd`) REFERENCES `phieudathang` (`mapd`),
  CONSTRAINT `chitietphieudat_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO chitietphieudat VALUES("1","1","1","100");
INSERT INTO chitietphieudat VALUES("2","2","1","100");
INSERT INTO chitietphieudat VALUES("3","2","4","100");
INSERT INTO chitietphieudat VALUES("4","2","9","100");



CREATE TABLE `chitietphieunhap` (
  `mactpn` int(11) NOT NULL AUTO_INCREMENT,
  `mapn` int(11) DEFAULT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gianhap` float DEFAULT NULL,
  `thanhtien` float DEFAULT NULL,
  PRIMARY KEY (`mactpn`),
  KEY `mapn` (`mapn`),
  KEY `masp` (`masp`),
  CONSTRAINT `chitietphieunhap_ibfk_1` FOREIGN KEY (`mapn`) REFERENCES `phieunhaphang` (`mapn`),
  CONSTRAINT `chitietphieunhap_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE,
  CONSTRAINT `ckSLCTPN` CHECK (`soluong` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO chitietphieunhap VALUES("1","1","1","95","400000","38000000");
INSERT INTO chitietphieunhap VALUES("2","1","4","100","200000","20000000");
INSERT INTO chitietphieunhap VALUES("3","1","9","100","900000","90000000");



CREATE TABLE `chitietphieutra` (
  `mactpt` int(11) NOT NULL AUTO_INCREMENT,
  `mapt` int(11) DEFAULT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY (`mactpt`),
  KEY `mapt` (`mapt`),
  KEY `masp` (`masp`),
  CONSTRAINT `chitietphieutra_ibfk_1` FOREIGN KEY (`mapt`) REFERENCES `phieutrahang` (`mapt`),
  CONSTRAINT `chitietphieutra_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE,
  CONSTRAINT `ckSLCTPT` CHECK (`soluong` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO chitietphieutra VALUES("1","1","1","1");



CREATE TABLE `chucvu` (
  `macv` int(11) NOT NULL,
  `tenchucvu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`macv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO chucvu VALUES("1","admin");
INSERT INTO chucvu VALUES("2","Nhân viên tiếp tân");
INSERT INTO chucvu VALUES("3","Nhân viên kỹ thuật");



CREATE TABLE `cthd_online` (
  `macthdol` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) NOT NULL,
  `mahdonl` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `giatrikhuyenmai` int(11) NOT NULL,
  `giakhuyenmai` float NOT NULL,
  `thanhtien` float NOT NULL,
  PRIMARY KEY (`macthdol`),
  KEY `masp` (`masp`),
  KEY `mahdonl` (`mahdonl`),
  CONSTRAINT `cthd_online_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE,
  CONSTRAINT `cthd_online_ibfk_2` FOREIGN KEY (`mahdonl`) REFERENCES `hoadon_online` (`mahdonl`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO cthd_online VALUES("1","3","1","10","730000","20","584000","-1065790000000");



CREATE TABLE `danhmuc` (
  `madm` int(11) NOT NULL AUTO_INCREMENT,
  `tendm` varchar(255) NOT NULL,
  PRIMARY KEY (`madm`),
  UNIQUE KEY `uniTendm` (`tendm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO danhmuc VALUES("2","Tablet");
INSERT INTO danhmuc VALUES("1","Điện Thoại");



CREATE TABLE `giohangkhachhang` (
  `magh` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `tongtien` float NOT NULL,
  PRIMARY KEY (`magh`),
  KEY `makh` (`makh`),
  CONSTRAINT `giohangkhachhang_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL AUTO_INCREMENT,
  `manv` int(11) DEFAULT NULL,
  `makh` int(11) DEFAULT NULL,
  `ngaylap` date DEFAULT NULL,
  `tongtien` float DEFAULT NULL,
  `tinhtranghd` varchar(255) DEFAULT NULL,
  `ngaygiodieuphoi` datetime DEFAULT NULL,
  PRIMARY KEY (`mahd`),
  KEY `manv` (`manv`),
  KEY `makh` (`makh`),
  CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE,
  CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO hoadon VALUES("1","4","2","2022-01-10","4550000","Đã hoàn thành","2022-01-10 17:40:54");
INSERT INTO hoadon VALUES("2","","1","2022-01-10","650000","Chờ tiếp nhận","2022-01-10 17:41:03");
INSERT INTO hoadon VALUES("3","4","2","2022-01-11","1100000","Đã hoàn thành","2022-01-11 07:28:04");
INSERT INTO hoadon VALUES("4","5","2","2022-01-11","0","Đã hoàn thành","2022-01-11 07:30:58");
INSERT INTO hoadon VALUES("5","4","1","2022-01-11","584000","Đã tiếp nhận","2022-01-11 07:32:40");
INSERT INTO hoadon VALUES("6","5","2","2022-01-11","0","Đã hoàn thành","2022-01-11 07:34:36");



CREATE TABLE `hoadon_online` (
  `mahdonl` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `ngaylap` date NOT NULL,
  `tongtien` float NOT NULL,
  `tinhtrangdh` varchar(255) DEFAULT NULL,
  `iddiachi` varchar(255) NOT NULL,
  `sdtgiaohang` varchar(11) NOT NULL,
  PRIMARY KEY (`mahdonl`),
  KEY `makh` (`makh`),
  CONSTRAINT `hoadon_online_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO hoadon_online VALUES("1","2","2022-01-11","-1065790000000","Đã hủy","Tân Bình, Tp Hồ Chí Minh","0988512813");



CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL AUTO_INCREMENT,
  `tenkhachhang` varchar(255) DEFAULT NULL,
  `sdtkhachhang` varchar(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `matkhau` varchar(255) NOT NULL,
  PRIMARY KEY (`makh`),
  UNIQUE KEY `uniSDTkh` (`sdtkhachhang`),
  CONSTRAINT `ckSDTkh` CHECK (octet_length(`sdtkhachhang`) between 6 and 11)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO khachhang VALUES("1","Nguyễn Cao Nguyên","0358034832","nguyencaonguyen246@gmail.com","Tây Ninh","2000-06-24","$2y$10$DUqZKhICA7LF224z98x9..lcoodkY92kqcyH3UcdLLUZ7L0TTDr9G");
INSERT INTO khachhang VALUES("2","Trần Bảo Ngọc","0988512813","harutet47@gmail.com","Tân Bình, Tp Hồ Chí Minh","2000-07-04","$2y$10$DUqZKhICA7LF224z98x9..lcoodkY92kqcyH3UcdLLUZ7L0TTDr9G");



CREATE TABLE `khuyenmai` (
  `makhuyenmai` int(11) NOT NULL AUTO_INCREMENT,
  `tenkhuyenmai` varchar(255) NOT NULL,
  `giatrikhuyenmai` int(11) NOT NULL,
  `thoigianbatdau` date NOT NULL,
  `thoigianketthuc` date NOT NULL,
  `tinhtrang` bit(1) DEFAULT NULL,
  PRIMARY KEY (`makhuyenmai`),
  CONSTRAINT `ckTIMEKM` CHECK (`thoigianketthuc` > `thoigianbatdau`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO khuyenmai VALUES("1","Không khuyến mãi","0","2021-09-01","2030-01-01","1");
INSERT INTO khuyenmai VALUES("2","Khuyến mãi mừng khai trương","20","2021-11-13","2022-01-01","1");
INSERT INTO khuyenmai VALUES("3","Đẩy lùi đại dịch","30","2021-11-13","2022-01-01","1");



CREATE TABLE `lichsuphancong` (
  `malspc` int(11) NOT NULL AUTO_INCREMENT,
  `mahd` int(11) NOT NULL,
  `manv` int(11) NOT NULL,
  `ngaygiophancong` datetime DEFAULT NULL,
  PRIMARY KEY (`malspc`),
  KEY `manv` (`manv`),
  KEY `mahd` (`mahd`),
  CONSTRAINT `lichsuphancong_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE,
  CONSTRAINT `lichsuphancong_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO lichsuphancong VALUES("1","1","4","2022-01-10 17:42:10");
INSERT INTO lichsuphancong VALUES("2","3","4","2022-01-11 07:28:57");
INSERT INTO lichsuphancong VALUES("3","4","5","2022-01-11 07:31:19");
INSERT INTO lichsuphancong VALUES("4","5","4","2022-01-11 07:33:36");
INSERT INTO lichsuphancong VALUES("5","6","5","2022-01-11 07:35:26");



CREATE TABLE `lichsutimkiem` (
  `mals` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `noidungtim` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mals`),
  KEY `makh` (`makh`),
  CONSTRAINT `lichsutimkiem_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




CREATE TABLE `loaisanpham` (
  `maloai` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(255) NOT NULL,
  PRIMARY KEY (`maloai`),
  UNIQUE KEY `uniTenloai` (`tenloai`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

INSERT INTO loaisanpham VALUES("2","Camera");
INSERT INTO loaisanpham VALUES("1","Cáp Home");
INSERT INTO loaisanpham VALUES("3","Cáp Nguồn");
INSERT INTO loaisanpham VALUES("4","Cáp Sạc");
INSERT INTO loaisanpham VALUES("5","Chân Sạc");
INSERT INTO loaisanpham VALUES("6","Kích Cảm Ứng");
INSERT INTO loaisanpham VALUES("7","Loa");
INSERT INTO loaisanpham VALUES("8","Main");
INSERT INTO loaisanpham VALUES("9","Màn Hình");
INSERT INTO loaisanpham VALUES("10","Mic");
INSERT INTO loaisanpham VALUES("11","Nút Home");
INSERT INTO loaisanpham VALUES("12","Nút Nguồn");
INSERT INTO loaisanpham VALUES("13","Pin");
INSERT INTO loaisanpham VALUES("14","Vỏ");



CREATE TABLE `motasanpham` (
  `mamota` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) NOT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `mota` varchar(1000) DEFAULT NULL,
  `congdung` varchar(1000) DEFAULT NULL,
  `thongtinthem` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`mamota`),
  KEY `fk_mota_sanpham` (`masp`),
  CONSTRAINT `fk_mota_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO motasanpham VALUES("1","1","Màn Hình Iphone X",""iPhone X màn hình tỉ lệ 19:5:9 mới mẻ cho phần diện tích hiển thị cực lớn, 
mang lại không gian trải nghiệm thoải mái cho người dùng."","Thay Thế Màn Hình","thông tin thêm");
INSERT INTO motasanpham VALUES("2","2","Màn Hình iPhone Xs Max","Màn hình iPhone Xs Max cũng được trang bị rất nhiều tính năng đặc biệt như 
3D Touch và độ nhạy cảm ứng 120Hz, HDR10, Dolby Vision,  True Tone.","Thay Thế Màn Hình","thông tin thêm");
INSERT INTO motasanpham VALUES("3","3","Pin iPhone 7 Plus Pisen","Pin iPhone 7 Plus được Apple trang bị lên tới dung lượng 2.900 mAh, 
một dung lượng không quá lớn nhưng có thể đáp ứng khả năng sử dụng liên tục trong thời gian hơn 1 ngày.","Thay Pin iPhone 7 Plus","Cụ thể pin iP 7 Plus cho thời gian onscreen liên tục được 7 tiếng 25 phút .");
INSERT INTO motasanpham VALUES("4","4","Pin iPhone 6S","Dung lượng 2330mAh
Cao hơn dung lượng chuẩn 615mAh (tăng 36% dung lượng pin)","Thay Pin iPhone 6S","thông tin thêm");
INSERT INTO motasanpham VALUES("5","5","Pin iPhone X Pisen","Từ khi ra mắt, iPhone X đã không làm người dùng quá ngạc nhiên về dung lượng pin 
vì nó chỉ được trang bị viên pin dung lượng 2716 mAh.","Thay Pin iPhone X Pisen","thông tin thêm");
INSERT INTO motasanpham VALUES("6","6","Pin iPhone 7 Pisen","Điện thoại iPhone 7 – Dung lượng pin 1960 mAh cùng những bước cải tiến vượt trội của Apple","Thay Pin iPhone X Pisen","thông tin thêm");
INSERT INTO motasanpham VALUES("7","7","Pin iPhone 6S Plus Pisen","Pin iPhone 6S+: Dung lượng 2750 mAh, thời lượng sử dụng rất tốt","Thay Pin iPhone 6S Plus Pisen","thông tin thêm");
INSERT INTO motasanpham VALUES("8","8","Màn Hình iPhone 6","Màn hình có độ phân giải 1334 x 750 pixels và sử dụng tấm nền IPS LCD. Bề mặt màn hình được phủ 
kính cường lực Ion và lớp phủ chống vân tay đảm bảo bề mặt màn hình luôn được sạch sẽ.","Thay Màn Hình iPhone 6","thông tin thêm");
INSERT INTO motasanpham VALUES("9","9","Màn Hình iPhone 7 Plus ","Chiếc iPhone 7 Plus về tổng thể về kích thước không có gì thay đổi so với chiếc iPhone 6 Plus, 
với màn hình rộng 5.5 inch cùng độ phân giải 1080×1920 pixels được trang bị công nghệ màn hình Retina sắc nét","Thay Màn Hình iPhone 7 Plus","thông tin thêm");
INSERT INTO motasanpham VALUES("10","10","Màn Hình iPhone 7 Plus ","Máy sở hữu thiết kế nhỏ gọn 143.6 x 70.9 x 7.7 mm và trọng lượng cực kỳ nhẹ 174 g. 
Màn hình có kích thước 5.8 inch và độ phân giải đạt chuẩn 
Super Retina HD cho khả năng hiển thị sắc nét.","Thay Màn Hình iPhone X chính hãng Pisen V3","thông tin thêm");
INSERT INTO motasanpham VALUES("11","11","Pin iPhone 8 Plus Pisen","Thời lượng sử dụng liên tục lên đến 10 giờ 35 phút. Ngoài ra, iPhone 8 Plus còn được trang bị 
tính năng sạc nhanh không dây tân tiến, giúp sạc 30% chỉ trong vòng 30 phút.","Thay Pin iPhone 8 Plus Pisen","thông tin thêm");
INSERT INTO motasanpham VALUES("12","12","Kính iPhone 7 Plus","Màn hình cũng như mặt kính là một trong những bộ phận quan trọng nhất của tất cả các thiết bị điện tử, 
iPhone 7 Plus cũng không phải là ngoại lệ.","Thay Kính iPhone 7 Plus","thông tin thêm");
INSERT INTO motasanpham VALUES("13","13","Màn Hình iPhone 6 Plus","IPhone 6 Plus (hay 6+) là chiếc iPhone tiên phong trong việc cung cấp một màn hình 
kích thước lớn cho người sử dụng. Dòng iphone này sở hữu một màn Retina 
kích thước 5.5 inches với mật độ điểm ảnh đạt 401 ppi.","Thay Màn Hình iPhone 6 Plus","thông tin thêm");
INSERT INTO motasanpham VALUES("14","14","Màn Hình iPhone 7 Plus","Màn hình Retina trên iPhone 7 Plus với kích thuước rộng 5.5 inch, độ phân giải 1080×1920 pixels 
tương tự iPhone 6s Plus.","Thay Màn Hình iPhone 7 Plus","Diểm nổi bật hơn là tấm nền màn hình mới đã được bổ sung
 thêm 25% độ sáng, đạt mức cao nhất 625 nits cùng khả năng tái tạo màu sắc, 
gam màu rộng hơn và hỗ trợ 3D Touch.");
INSERT INTO motasanpham VALUES("15","15","Kính iPhone X","Tình trạng vỡ mặt kính điện thoại iPhone X đến tới nhiều nguyên nhân khác nhau. 
Nhưng nguyên nhân chuẩn yếu đến từ thói quen của người dùng.","Thay Kính iPhone X","thông tin thêm");
INSERT INTO motasanpham VALUES("16","16","Màn Hình iPhone 5S","Về hiển thị, màn hình IP 5S sở hữu công nghệ  Retina với kích thước 4 inch cùng độ phân giải 
Full HD 1.136 x 640 pixel. Do đó, màu sắc và hình ảnh hiển thị trên màn hình sẽ rất chân thực và rõ nét.","Thay Màn Hình iPhone 5S","thông tin thêm");
INSERT INTO motasanpham VALUES("17","17","Kính iPhone 6","Điện Thoại iPhone 6 là một trong những chiếc iPhone rất phổ biến tại Việt Nam bởi đây chính là 
sản phẩm đánh dấu việc Apple lần đầu tiên mở rộng kích thước màn hình. 
Tuy nhiên, trong quá trình sử dụng, đôi khi sự cố xảy ra khiến mặt kính bảo vệ màn hình bị hỏng","Thay Kính iPhone 6","thông tin thêm");
INSERT INTO motasanpham VALUES("18","18","Vỏ iPhone 7 Plus","Điện thoại iPhone 7 Plus phần vỏ – nắp lưng bị trầy xước ảnh hưởng đến vẻ ngoài. 
Nếu muốn mang lại vẻ đẹp như mới cho điện thoại thì hãy tìm đến dịch vụ thay vỏ iPhone 7 Plus.","Thay Vỏ iPhone 7 Plus","thông tin thêm");
INSERT INTO motasanpham VALUES("19","19","Camera Sau iPhone 7 Plus","iPhone 7 Plus là chiếc smartphone phá cách trong làng smartphone bởi thiết 
kế cụm camera kép 12 MP + 12 MP. Camera chính có khẩu độ f/1.8, tích hợp lấy nét 
PDAF cùng khả năng chụp góc rộng bắt mắt.","Thay Camera Sau iPhone 7 Plus","thông tin thêm");
INSERT INTO motasanpham VALUES("20","20","Màn Hình Samsung Galaxy J7 Pro","Chảy mực màn hình là lỗi thường hay gặp phải trên chiếc 
Samsung Galaxy J7 Pro khi người dùng vô tình đánh rơi máy trong quá trình sử dụng.","Thay Màn Hình Samsung Galaxy J7 Pro","thông tin thêm");
INSERT INTO motasanpham VALUES("21","21","Màn Hình Samsung Galaxy Note 8","Note 8 là chiếc Galaxy Note có kích thước lớn nhất đến thời điểm đó với màn hình vô cực lên tới 6.3 inch.","Thay Màn Hình Samsung Galaxy Note 8","thông tin thêm");



CREATE TABLE `nhacungcap` (
  `mancc` int(11) NOT NULL AUTO_INCREMENT,
  `tenncc` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdtncc` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`mancc`),
  UNIQUE KEY `uniTenncc` (`tenncc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO nhacungcap VALUES("1","CÔNG TY CỔ PHẨN REMAX VIỆT NAM","Số 298 phố Tây Sơn, P. Ngã Tư Sở, Q. Đống đa, Tp. Hà Nội (TPHN)","cskh@remaxvietnam.vn","0356353443");
INSERT INTO nhacungcap VALUES("2","CÔNG TY CỔ PHẦN VIỄN THÔNG TIN HỌC STAPHONE"," 21 Lê Văn Lương, Phường Trung Hòa, Quận Cầu Giấy, TP Hà Nội (TPHN)","staphone@staphone.com","0356353444");
INSERT INTO nhacungcap VALUES("3","CÔNG TY CỔ PHẦN PHỤ KIỆN CÔNG NGHỆ SUNSMART","Số 118A Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Tp. Hà Nội (TPHN)","sunsmart.info.vn@gmail.com","0356353443");
INSERT INTO nhacungcap VALUES("4","CÔNG TY CỔ PHẦN ZIN LINH KIỆN","Tầng 3, Tòa nhà Zin City, 55/1B Lý Chiêu Hoàng, Phường 10, Quận 6. Thành phố Hồ Chí Minh.","cskh@zinlinhkien.com.vn","0356353443");



CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL AUTO_INCREMENT,
  `tennhanvien` varchar(255) NOT NULL,
  `sdtnhanvien` varchar(11) NOT NULL,
  `gioitinh` varchar(6) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `macv` int(11) NOT NULL,
  `tendangnhap` varchar(255) DEFAULT NULL,
  `matkhau` varchar(255) DEFAULT NULL,
  `trangthai` varchar(255) DEFAULT NULL,
  `motacongviec` varchar(255) DEFAULT NULL,
  `hinhanh` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`manv`),
  UNIQUE KEY `uniSDTnv` (`sdtnhanvien`),
  KEY `macv` (`macv`),
  CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`macv`) REFERENCES `chucvu` (`macv`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO nhanvien VALUES("1","Nguyễn Cao Nguyên","0358034832","Nam","2000-06-24","nguyencaonguyen246@gmail.com","Tây Ninh","1","admin","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","","","1.png");
INSERT INTO nhanvien VALUES("2","Trần Bảo Ngọc","0358034833","Nữ","2000-07-04","harutet47@gmail.com","Tp Hồ Chí Minh","2","harutet47","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","","","2.png");
INSERT INTO nhanvien VALUES("3","Nguyễn Văn Cợp","0358034834","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","2","nguyen246","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","3.png");
INSERT INTO nhanvien VALUES("4","Nguyễn A","0398000838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen47","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Đang sửa chữa","ád","4.png");
INSERT INTO nhanvien VALUES("5","Nguyễn B","0388344838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen48","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","5.png");
INSERT INTO nhanvien VALUES("6","Nguyễn C","0038034838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen49","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","6.png");
INSERT INTO nhanvien VALUES("7","Nguyễn E","0151134838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen50","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","7.png");
INSERT INTO nhanvien VALUES("8","Nguyễn D","0958034878","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen51","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","8.png");
INSERT INTO nhanvien VALUES("9","Nguyễn F","0858034838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen52","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","9.png");
INSERT INTO nhanvien VALUES("10","Nguyễn G","0711034838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen53","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","10.png");
INSERT INTO nhanvien VALUES("11","Nguyễn H","0658034438","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen54","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","11.png");
INSERT INTO nhanvien VALUES("12","Nguyễn K","0558034838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen55","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","12.png");
INSERT INTO nhanvien VALUES("13","Nguyễn L","0458030938","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen56","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","13.png");
INSERT INTO nhanvien VALUES("14","Nguyễn M","0351234838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen57","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","14.png");
INSERT INTO nhanvien VALUES("15","Nguyễn N","0358067838","Nam","2000-06-24","copngu@gmail.com","Tây Ninh","3","nguyen58","$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG","Chưa có việc","","15.png");
INSERT INTO nhanvien VALUES("16","Gia Hưng","0978727066","Nam","2003-02-04","nguyencaonguyen246@gmail.com"," Tây Ninh","2","giahung","$2y$10$Zhe6mLZzx/ONgY8tAjfq7edMYD9hqZdH.qBncD7w0EivU80vc4zd.","Chưa có việc","","");



CREATE TABLE `nhasanxuat` (
  `mansx` int(11) NOT NULL AUTO_INCREMENT,
  `tennsx` varchar(255) NOT NULL,
  PRIMARY KEY (`mansx`),
  UNIQUE KEY `uniTennsx` (`tennsx`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

INSERT INTO nhasanxuat VALUES("1","Asus");
INSERT INTO nhasanxuat VALUES("2","Huawei");
INSERT INTO nhasanxuat VALUES("3","iPad");
INSERT INTO nhasanxuat VALUES("4","Iphone");
INSERT INTO nhasanxuat VALUES("5","Nokia");
INSERT INTO nhasanxuat VALUES("6","Oppo");
INSERT INTO nhasanxuat VALUES("7","Samsung");
INSERT INTO nhasanxuat VALUES("8","Sony");
INSERT INTO nhasanxuat VALUES("9","Vsmart");
INSERT INTO nhasanxuat VALUES("10","Xiaomi");



CREATE TABLE `phieudathang` (
  `mapd` int(11) NOT NULL AUTO_INCREMENT,
  `ngaylap` date NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `mancc` int(11) NOT NULL,
  `tinhtrangpd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mapd`),
  KEY `manv` (`manv`),
  KEY `mancc` (`mancc`),
  CONSTRAINT `phieudathang_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE,
  CONSTRAINT `phieudathang_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO phieudathang VALUES("1","2022-01-10","1","1","Chưa tạo phiếu nhập");
INSERT INTO phieudathang VALUES("2","2022-01-11","1","1","Đã tạo phiếu nhập hàng");



CREATE TABLE `phieunhaphang` (
  `mapn` int(11) NOT NULL AUTO_INCREMENT,
  `mapd` int(11) DEFAULT NULL,
  `ngaylap` date NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `mancc` int(11) NOT NULL,
  `tongtien` float DEFAULT NULL,
  PRIMARY KEY (`mapn`),
  KEY `mapd` (`mapd`),
  KEY `manv` (`manv`),
  KEY `mancc` (`mancc`),
  CONSTRAINT `phieunhaphang_ibfk_1` FOREIGN KEY (`mapd`) REFERENCES `phieudathang` (`mapd`),
  CONSTRAINT `phieunhaphang_ibfk_2` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE,
  CONSTRAINT `phieunhaphang_ibfk_3` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO phieunhaphang VALUES("1","2","2022-01-11","1","1","148000000");



CREATE TABLE `phieutrahang` (
  `mapt` int(11) NOT NULL AUTO_INCREMENT,
  `ngaylap` date NOT NULL,
  `manv` int(11) DEFAULT NULL,
  `mancc` int(11) NOT NULL,
  PRIMARY KEY (`mapt`),
  KEY `manv` (`manv`),
  KEY `mancc` (`mancc`),
  CONSTRAINT `phieutrahang_ibfk_1` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE,
  CONSTRAINT `phieutrahang_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO phieutrahang VALUES("1","2022-01-11","1","1");
INSERT INTO phieutrahang VALUES("2","2022-01-11","1","1");



CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `thoihanbaohanh` int(11) NOT NULL,
  `maloai` int(11) NOT NULL,
  `madm` int(11) NOT NULL,
  `mansx` int(11) NOT NULL,
  `mancc` int(11) NOT NULL,
  `makhuyenmai` int(11) NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `maloai` (`maloai`),
  KEY `madm` (`madm`),
  KEY `mansx` (`mansx`),
  KEY `mancc` (`mancc`),
  KEY `makhuyenmai` (`makhuyenmai`),
  CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaisanpham` (`maloai`),
  CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`madm`) REFERENCES `danhmuc` (`madm`),
  CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`mansx`) REFERENCES `nhasanxuat` (`mansx`),
  CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`),
  CONSTRAINT `sanpham_ibfk_5` FOREIGN KEY (`makhuyenmai`) REFERENCES `khuyenmai` (`makhuyenmai`),
  CONSTRAINT `ckSLTSP` CHECK (`soluongton` >= 0)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

INSERT INTO sanpham VALUES("1","Thay màn hình Iphone X","1.jpg","1950000","110","6","9","1","4","1","1");
INSERT INTO sanpham VALUES("2","Thay màn hình iPhone Xs Max","2.png","2650000","12","6","9","1","4","3","1");
INSERT INTO sanpham VALUES("3","Thay pin iPhone 7 Plus Pisen","3.jpg","730000","15","12","13","1","4","2","2");
INSERT INTO sanpham VALUES("4","Thay pin iPhone 6S 
dung lượng siêu cao Pisen","4.jpg","800000","112","12","13","1","4","1","1");
INSERT INTO sanpham VALUES("5","Thay pin iPhone X Pisen
","5.jpg","1100000","14","12","13","1","4","3","2");
INSERT INTO sanpham VALUES("6","Thay pin iPhone 7 Pisen
","6.jpg","680000","22","12","13","1","4","4","1");
INSERT INTO sanpham VALUES("7","Thay pin iPhone 6S Plus Pisen
","7.jpg","560000","15","12","13","1","4","4","1");
INSERT INTO sanpham VALUES("8","Thay màn hình iPhone 6
","8.jpg","600000","15","6","9","1","4","2","1");
INSERT INTO sanpham VALUES("9","Thay màn hình iPhone 7 Plus 
chính hãng Pisen V3","9.jpg","1350000","112","12","9","1","4","1","1");
INSERT INTO sanpham VALUES("10","Thay màn hình iPhone X chính hãng Pisen V3
","10.jpg","3500000","16","12","9","1","4","2","1");
INSERT INTO sanpham VALUES("11","Thay pin iPhone 8 Plus Pisen
","11.jpg","800000","10","12","13","2","4","2","1");
INSERT INTO sanpham VALUES("12","Thay kính iPhone 7 Plus
","12.jpg","480000","11","12","6","1","4","2","1");
INSERT INTO sanpham VALUES("13","Thay màn hình iPhone 6 Plus
","13.jpg","1000000","16","6","9","1","4","4","1");
INSERT INTO sanpham VALUES("14","Thay màn hình iPhone 7 Plus
","14.jpg","1400000","20","6","9","1","4","1","2");
INSERT INTO sanpham VALUES("15","Thay kính iPhone X
","15.jpg","850000","23","12","6","1","4","1","1");
INSERT INTO sanpham VALUES("16","Thay màn hình iPhone 5S","16.jpg","500000","15","6","9","1","4","1","1");
INSERT INTO sanpham VALUES("17","Thay kính iPhone 6","17.jpg","300000","12","12","6","1","4","2","1");
INSERT INTO sanpham VALUES("18","Thay vỏ iPhone 7 Plus","18.jpg","650000","11","0","14","1","4","1","1");
INSERT INTO sanpham VALUES("19","Thay camera sau iPhone 7 Plus","19.jpg","1650000","16","6","2","1","4","2","2");
INSERT INTO sanpham VALUES("20","Thay màn hình Samsung Galaxy J7 Pro
","20.jpg","1100000","9","6","9","1","7","1","1");
INSERT INTO sanpham VALUES("21","Thay màn hình Samsung Galaxy Note 8","21.jpg","4550000","110","6","9","1","7","1","1");



CREATE TABLE `sanphamloi` (
  `masploi` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) NOT NULL,
  `mancc` int(11) NOT NULL,
  `soluong` int(11) DEFAULT NULL,
  PRIMARY KEY (`masploi`),
  KEY `masp` (`masp`),
  KEY `mancc` (`mancc`),
  CONSTRAINT `sanphamloi_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE,
  CONSTRAINT `sanphamloi_ibfk_2` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;




CREATE TABLE `sanphamtieubieu` (
  `matb` int(11) NOT NULL AUTO_INCREMENT,
  `masp` int(11) NOT NULL,
  PRIMARY KEY (`matb`),
  KEY `fk_sptb_sanpham` (`masp`),
  CONSTRAINT `fk_sptb_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO sanphamtieubieu VALUES("1","1");
INSERT INTO sanphamtieubieu VALUES("2","2");
INSERT INTO sanphamtieubieu VALUES("3","3");
INSERT INTO sanphamtieubieu VALUES("4","4");



CREATE TABLE `sanphamyeuthich` (
  `mayt` int(11) NOT NULL AUTO_INCREMENT,
  `makh` int(11) DEFAULT NULL,
  `masp` int(11) NOT NULL,
  PRIMARY KEY (`mayt`),
  KEY `makh` (`makh`),
  KEY `masp` (`masp`),
  CONSTRAINT `sanphamyeuthich_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE,
  CONSTRAINT `sanphamyeuthich_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


