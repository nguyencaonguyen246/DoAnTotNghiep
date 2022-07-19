/*
    UPDATE ngày 08/12/2021
    V10.0.0
    --  Thêm Unique cho bảng danhmuc, nhasanxuat, nhacungcap, loaisanpham
    -- Thêm bảng Sản Phẩm Yêu Thích của khách hàng
    -- Thêm bảng lịch sử tìm kiếm của khách hàng
    */

create database khoaluantotnghiep;
use khoaluantotnghiep;

create table khachhang(
	makh INT PRIMARY KEY AUTO_INCREMENT,
    tenkhachhang varchar(255),
    sdtkhachhang varchar(11) not null,
    email varchar (255),
    diachi varchar (255),
    ngaysinh date,
    matkhau varchar(255) not null
);
ALTER TABLE khachhang ADD CONSTRAINT uniSDTkh UNIQUE(sdtkhachhang);
ALTER TABLE khachhang ADD CONSTRAINT ckSDTkh CHECK (LENGTH(sdtkhachhang) BETWEEN 6 AND 11);

insert into khachhang(tenkhachhang, sdtkhachhang, email, diachi, ngaysinh, matkhau) values ('Nguyễn Cao Nguyên','0358034832','nguyencaonguyen246@gmail.com','Tây Ninh', '2000-06-24','$2y$10$DUqZKhICA7LF224z98x9..lcoodkY92kqcyH3UcdLLUZ7L0TTDr9G');
insert into khachhang(tenkhachhang, sdtkhachhang, email, diachi, ngaysinh, matkhau) values ('Trần Bảo Ngọc','0912345673','harutet47@gmail.com','tphcm', '2000-07-04','$2y$10$DUqZKhICA7LF224z98x9..lcoodkY92kqcyH3UcdLLUZ7L0TTDr9G');
insert into khachhang values (null,'Hagu','1231241414','harutet47@gmail.com','tphcm', '2000-07-04','$2y$10$DUqZKhICA7LF224z98x9..lcoodkY92kqcyH3UcdLLUZ7L0TTDr9G');

create table chucvu(
	macv int not null, primary key(macv),
    tenchucvu varchar(50)
);
insert into chucvu (macv,tenchucvu) values ('1','admin');
insert into chucvu (macv,tenchucvu) values ('2','Nhân viên tiếp tân');
insert into chucvu (macv,tenchucvu) values ('3','Nhân viên kỹ thuật');
create table nhanvien(
	manv INT PRIMARY KEY AUTO_INCREMENT,
    tennhanvien varchar(255) not null,
    sdtnhanvien varchar(11) not null,
    gioitinh varchar(6),
    ngaysinh date,
    email varchar (255),
    diachi varchar (255),
    macv int not null, 
    foreign key (macv) REFERENCES chucvu(macv),
	tendangnhap varchar(255),
    matkhau varchar(255),
    trangthai varchar(255),
    motacongviec varchar(255),
	hinhanh varchar(255)
);
insert into nhanvien values (null,'Nguyễn Cao Nguyên','0358034832','Nam','2000-06-24','nguyencaonguyen246@gmail.com','Tây Ninh',1,'admin','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG', null, null,'1.png');
insert into nhanvien values (null,'Trần Bảo Ngọc','0358034833','Nữ','2000-07-04','harutet47@gmail.com','Tp Hồ Chí Minh',2,'harutet47','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG',null , null, '2.png');
insert into nhanvien values (null,'Nguyễn Văn Cợp','0358034834','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen246','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '3.png');
insert into nhanvien values (null,'Nguyễn A','0398000838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen47','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '4.png');
insert into nhanvien values (null,'Nguyễn B','0388344838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen48','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '5.png');
insert into nhanvien values (null,'Nguyễn C','0038034838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen49','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '6.png');
insert into nhanvien values (null,'Nguyễn E','0151134838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen50','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '7.png');
insert into nhanvien values (null,'Nguyễn D','0958034878','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen51','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '8.png');
insert into nhanvien values (null,'Nguyễn F','0858034838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen52','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '9.png');
insert into nhanvien values (null,'Nguyễn G','0711034838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen53','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '10.png');
insert into nhanvien values (null,'Nguyễn H','0658034438','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen54','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '11.png');
insert into nhanvien values (null,'Nguyễn K','0558034838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen55','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '12.png');
insert into nhanvien values (null,'Nguyễn L','0458030938','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen56','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '13.png');
insert into nhanvien values (null,'Nguyễn M','0351234838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen57','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '14.png');
insert into nhanvien values (null,'Nguyễn N','0358067838','Nam','2000-06-24','copngu@gmail.com','Tây Ninh',3,'nguyen58','$2y$10$iqGAQPmCUSadx7W49xeL/OgrqyX6h9i1uexLnothM90bO6TahJPGG','Chưa có việc',null, '15.png');

-- select * from nhanvien order by manv LIMIT 10000 offset 1; 
-- SELECT * from nhanvien inner join chucvu on nhanvien.macv = chucvu.macv order by manv LIMIT 10000 offset 1 ;
-- 
-- UPDATE nhanvien SET  trangthai = 'Đang sửa chữa',
--             motacongviec = 'Sửa cho khách Cợp' 
--             where manv = 4;

/*ALTER TABLE nhanvien ADD CONSTRAINT ckTUOInv CHECK ( YEAR(CURDATE()) - YEAR(ngaysinh) >= 18); */
select * from nhanvien;
ALTER TABLE nhanvien ADD CONSTRAINT uniSDTnv UNIQUE(sdtnhanvien);

create table nhacungcap(
	mancc INT PRIMARY KEY AUTO_INCREMENT,
    tenncc varchar (255) not null,
    diachi varchar (255) not null,
    email varchar (255) not null,
    sdtncc varchar(11)
);

-- unique cho bảng nhacungcap
ALTER TABLE nhacungcap ADD CONSTRAINT uniTenncc UNIQUE(tenncc);

create table nhasanxuat(
	mansx INT PRIMARY KEY AUTO_INCREMENT,
    tennsx varchar (255) not null
);

-- unique cho bảng nhasanxuat
ALTER TABLE nhasanxuat ADD CONSTRAINT uniTennsx UNIQUE(tennsx);

create table danhmuc(
	madm INT PRIMARY KEY AUTO_INCREMENT,
    tendm varchar (255) not null
    /*
    danhmuc bao gom dien thoai, may tinh bang, dong ho, ...
    */
);

-- unique cho bảng danhmuc
ALTER TABLE danhmuc ADD CONSTRAINT uniTendm UNIQUE(tendm);

create table loaisanpham(
	maloai INT PRIMARY KEY AUTO_INCREMENT,
    tenloai varchar (255) not null
	/*
    loaisanpham bao gom pin, man hinh, module rung, ...
    */
);

-- unique cho bảng loaisanpham
ALTER TABLE loaisanpham ADD CONSTRAINT uniTenloai UNIQUE(tenloai);

create table khuyenmai(
	makhuyenmai INT PRIMARY KEY AUTO_INCREMENT,
    tenkhuyenmai varchar (255) not null,
    giatrikhuyenmai int not null,
    thoigianbatdau date not null,
    thoigianketthuc date not null,
    tinhtrang bit 
);

ALTER TABLE khuyenmai ADD CONSTRAINT ckTIMEKM CHECK (thoigianketthuc > thoigianbatdau);
INSERT INTO khuyenmai VALUES (null , 'Không khuyến mãi', 0, '2021-09-01', '2030-01-01', 1);
INSERT INTO khuyenmai VALUES (null , 'Khuyến mãi mừng khai trương', 20, '2021-11-13', '2022-01-01', 1);
INSERT INTO khuyenmai VALUES (null , 'Đẩy lùi đại dịch', 30, '2021-11-13', '2022-01-01', 1);


create table sanpham(
	masp INT PRIMARY KEY AUTO_INCREMENT,
    tensanpham varchar (255) not null,
    hinhanh varchar (255) not null,
    dongia float not null,
    soluongton  int not null, 
    /* them rang buoc so luong > 0 */
    thoihanbaohanh int not null,
    maloai int not null, foreign key (maloai) REFERENCES loaisanpham(maloai),
    madm int not null, foreign key (madm) REFERENCES danhmuc(madm),
    mansx int not null, foreign key (mansx) REFERENCES nhasanxuat(mansx),
    mancc int not null, foreign key (mancc) REFERENCES nhacungcap(mancc),
    makhuyenmai int not null, foreign key (makhuyenmai) REFERENCES khuyenmai(makhuyenmai)
);

ALTER TABLE sanpham ADD CONSTRAINT ckSLTSP CHECK (soluongton >= 0);

create table motasanpham(
    mamota INT PRIMARY KEY AUTO_INCREMENT,
	masp INT not null,
    tieude varchar(255),
    mota varchar(1000),
	congdung varchar(1000),
	thongtinthem varchar(1000)
);
alter table motasanpham add constraint fk_mota_sanpham foreign key(masp) references sanpham(masp) on delete cascade;



/* ======================================================================================================================================================= */
/* SẢN PHẨM TIÊU BIỂU===================================================================================================================================== */


create table sanphamtieubieu(
    matb INT PRIMARY KEY AUTO_INCREMENT,
	masp INT not null
);
alter table sanphamtieubieu add constraint fk_sptb_sanpham foreign key(masp) references sanpham(masp) on delete cascade;


/* SẢN PHẨM TIÊU BIỂU===================================================================================================================================== */
/* ======================================================================================================================================================= */

create table hoadon(
	mahd INT PRIMARY KEY AUTO_INCREMENT,
    manv int, foreign key (manv) REFERENCES nhanvien(manv) on delete cascade,
    makh INT, foreign key (makh) REFERENCES khachhang(makh) on delete cascade,
    ngaylap date,
    tongtien float,
    tinhtranghd varchar(255),
    ngaygiodieuphoi datetime
);
create table chitiethoadon(
	macthd INT PRIMARY KEY AUTO_INCREMENT,
    masp INT not null,
    mahd int not null,
    foreign key (masp) REFERENCES sanpham(masp) on delete cascade ,
    foreign key (mahd) REFERENCES hoadon(mahd) on delete cascade,
    soluong int not null,
    dongia float not null,
    thanhtien float not null,
    tinhtrang varchar(255)
);

create table lichsuphancong(
	malspc INT PRIMARY KEY AUTO_INCREMENT,
	mahd int not null,
    manv int not null,
	foreign key (manv) REFERENCES nhanvien(manv) on delete cascade ,
    foreign key (mahd) REFERENCES hoadon(mahd) on delete cascade,
    ngaygiophancong datetime
);
-- Dữ liệu của bảng sản phẩm lỗi sẽ được thêm khi bảo hành 
create table sanphamloi(
	masploi INT PRIMARY KEY AUTO_INCREMENT,
	masp INT not null,
    mancc INT not null,
	foreign key (masp) REFERENCES sanpham(masp) on delete cascade ,
	foreign key (mancc) REFERENCES nhacungcap(mancc) on delete cascade ,
    soluong int
);


ALTER TABLE chitiethoadon ADD CONSTRAINT ckSLCTHD CHECK (soluong >= 0);
create table phieudathang(
	mapd INT PRIMARY KEY AUTO_INCREMENT,
    ngaylap date not null,
    manv int, foreign key (manv) REFERENCES nhanvien(manv) on delete cascade,
    mancc int not null, foreign key (mancc) REFERENCES nhacungcap(mancc),
    tinhtrangpd varchar(255)
);
create table chitietphieudat(
	mactpd INT PRIMARY KEY AUTO_INCREMENT,
    mapd INT, foreign key (mapd) REFERENCES phieudathang(mapd),
    masp INT not null,  foreign key (masp) REFERENCES sanpham(masp) on delete cascade,
    soluong int not null
);
create table phieunhaphang(
	mapn INT PRIMARY KEY AUTO_INCREMENT,
    mapd INT ,foreign key (mapd) REFERENCES phieudathang(mapd),
    ngaylap date not null,
    manv int, foreign key (manv) REFERENCES nhanvien(manv) on delete cascade,
    mancc int not null, foreign key (mancc) REFERENCES nhacungcap(mancc),
    tongtien float 
);
create table chitietphieunhap(
	mactpn INT PRIMARY KEY AUTO_INCREMENT,
    mapn INT, foreign key (mapn) REFERENCES phieunhaphang(mapn),
    masp INT not null,  foreign key (masp) REFERENCES sanpham(masp) on delete cascade,
    soluong int not null,
    gianhap float,
    thanhtien float
);

ALTER TABLE chitietphieunhap ADD CONSTRAINT ckSLCTPN CHECK (soluong >= 0);

create table phieutrahang(
	mapt INT PRIMARY KEY AUTO_INCREMENT,
    ngaylap date not null,
    manv int, foreign key (manv) REFERENCES nhanvien(manv) on delete cascade,
    mancc int not null, foreign key (mancc) REFERENCES nhacungcap(mancc)
);
create table chitietphieutra(
	mactpt INT PRIMARY KEY AUTO_INCREMENT,
    mapt int, foreign key (mapt) REFERENCES phieutrahang(mapt),
    masp INT not null,  foreign key (masp) REFERENCES sanpham(masp) on delete cascade,
    soluong int not null
);

ALTER TABLE chitietphieutra ADD CONSTRAINT ckSLCTPT CHECK (soluong >= 0);

create table giohangkhachhang(
	magh INT PRIMARY KEY AUTO_INCREMENT,
	makh INT, foreign key (makh) REFERENCES khachhang(makh)on delete cascade,
    tongtien float not null
);

create table chitietgiohang(
	mactgiohang INT PRIMARY KEY AUTO_INCREMENT,
    magh INT not null,
    masp INT not null,
    soluong int not null,
    dongia float not null,
    giatrikhuyenmai int not null,
    giakhuyenmai float not null,
    thanhtien float not null
);

ALTER TABLE chitietgiohang ADD CONSTRAINT ckSLCTgh CHECK (soluong >= 0);
create table hoadon_online(
	mahdonl INT PRIMARY KEY AUTO_INCREMENT,
	makh INT, foreign key (makh) REFERENCES khachhang(makh) on delete cascade,
    ngaylap date not null,
    tongtien float not null,
    tinhtrangdh varchar(255),
    iddiachi varchar (255) not null,
	sdtgiaohang varchar(11) not null
);
create table cthd_online(
	macthdol INT PRIMARY KEY AUTO_INCREMENT,
    masp INT not null,
    mahdonl int not null,
    foreign key (masp) REFERENCES sanpham(masp) on delete cascade,
    foreign key (mahdonl) REFERENCES hoadon_online(mahdonl) on delete cascade,
    soluong int not null,
    dongia float not null,
    giatrikhuyenmai int not null,
    giakhuyenmai float not null,
    thanhtien float not null
);


-- Bảng Lịch Sử Tìm Kiếm của Khách Hàng
create table lichsutimkiem(
	mals INT PRIMARY KEY AUTO_INCREMENT,
	makh INT, foreign key (makh) REFERENCES khachhang(makh)on delete cascade,
    noidungtim varchar(255)
); 

-- Bảng Sản Phẩm Yêu thích

create table sanphamyeuthich(
	mayt INT PRIMARY KEY AUTO_INCREMENT,
	makh INT, foreign key (makh) REFERENCES khachhang(makh) on delete cascade,
     masp INT not null,  foreign key (masp) REFERENCES sanpham(masp) on delete cascade
);
--
-- Constraints for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`magh`) REFERENCES `giohangkhachhang` (`magh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE NO ACTION ON UPDATE NO ACTION;



/*Danh Muc*/

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (null,'Điện Thoại'),(null,'Tablet');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;


/* Loai san pham*/

LOCK TABLES `loaisanpham` WRITE;
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` VALUES (null,'Cáp Home'),(null,'Camera'),(null,'Cáp Nguồn'),
(null,'Cáp Sạc'),(null,'Chân Sạc'),(null,'Kích Cảm Ứng'),(null,'Loa'),(null,'Main'),
(null,'Màn Hình'),(null,'Mic'),(null,'Nút Home'),(null,'Nút Nguồn'),(null,'Pin'),(null,'Vỏ');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;
UNLOCK TABLES;

/*nha cung cap*/

LOCK TABLES `nhacungcap` WRITE;
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
INSERT INTO `nhacungcap` VALUES (null,'CÔNG TY CỔ PHẨN REMAX VIỆT NAM','Số 298 phố Tây Sơn, P. Ngã Tư Sở, Q. Đống đa, Tp. Hà Nội (TPHN)','cskh@remaxvietnam.vn','0356353443'),
(null,'CÔNG TY CỔ PHẦN VIỄN THÔNG TIN HỌC STAPHONE',' 21 Lê Văn Lương, Phường Trung Hòa, Quận Cầu Giấy, TP Hà Nội (TPHN)','staphone@staphone.com','0356353444'),
(null,'CÔNG TY CỔ PHẦN PHỤ KIỆN CÔNG NGHỆ SUNSMART','Số 118A Hồ Tùng Mậu, Mai Dịch, Cầu Giấy, Tp. Hà Nội (TPHN)','sunsmart.info.vn@gmail.com','0356353443'),
(null,'CÔNG TY CỔ PHẦN ZIN LINH KIỆN','Tầng 3, Tòa nhà Zin City, 55/1B Lý Chiêu Hoàng, Phường 10, Quận 6. Thành phố Hồ Chí Minh.','cskh@zinlinhkien.com.vn','0356353443');
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;
UNLOCK TABLES;


/*nha san xuát*/

LOCK TABLES `nhasanxuat` WRITE;
/*!40000 ALTER TABLE `nhasanxuat` DISABLE KEYS */;
INSERT INTO `nhasanxuat` VALUES (null,'Asus'),
(null,'Huawei'),(null,'iPad'),(null,'Iphone'),(null,'Nokia'),
(null,'Oppo'),(null,'Samsung'),(null,'Sony'),(null,'Vsmart'),(null,'Xiaomi');
/*!40000 ALTER TABLE `nhasanxuat` ENABLE KEYS */;
UNLOCK TABLES;
/*sanpham*/

INSERT INTO sanpham VALUES (null, 'Thay màn hình Iphone X', '1.jpg', 1950000, 15, 6, 9, 1, 4, 1, 1 );
INSERT INTO motasanpham VALUES (null, 1, 'Màn Hình Iphone X', '"iPhone X màn hình tỉ lệ 19:5:9 mới mẻ cho phần diện tích hiển thị cực lớn, 
mang lại không gian trải nghiệm thoải mái cho người dùng."', 'Thay Thế Màn Hình', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone Xs Max', '2.png', 2650000, 12, 6, 9, 1, 4, 3, 1 );
INSERT INTO motasanpham VALUES (null, 2, 'Màn Hình iPhone Xs Max', 'Màn hình iPhone Xs Max cũng được trang bị rất nhiều tính năng đặc biệt như 
3D Touch và độ nhạy cảm ứng 120Hz, HDR10, Dolby Vision,  True Tone.', 'Thay Thế Màn Hình', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay pin iPhone 7 Plus Pisen', '3.jpg', 730000, 7, 12, 13, 1, 4, 2, 2 );
INSERT INTO motasanpham VALUES (null, 3, 'Pin iPhone 7 Plus Pisen', 'Pin iPhone 7 Plus được Apple trang bị lên tới dung lượng 2.900 mAh, 
một dung lượng không quá lớn nhưng có thể đáp ứng khả năng sử dụng liên tục trong thời gian hơn 1 ngày.'
, 'Thay Pin iPhone 7 Plus', 'Cụ thể pin iP 7 Plus cho thời gian onscreen liên tục được 7 tiếng 25 phút .');

INSERT INTO sanpham VALUES (null, 'Thay pin iPhone 6S 
dung lượng siêu cao Pisen', '4.jpg', 800000, 12, 12, 13, 1, 4, 1, 1 );
INSERT INTO motasanpham VALUES (null, 4, 'Pin iPhone 6S', 'Dung lượng 2330mAh
Cao hơn dung lượng chuẩn 615mAh (tăng 36% dung lượng pin)', 'Thay Pin iPhone 6S', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay pin iPhone X Pisen
', '5.jpg', 1100000, 14, 12, 13, 1, 4, 3, 2 );
INSERT INTO motasanpham VALUES (null, 5, 'Pin iPhone X Pisen', 'Từ khi ra mắt, iPhone X đã không làm người dùng quá ngạc nhiên về dung lượng pin 
vì nó chỉ được trang bị viên pin dung lượng 2716 mAh.', 'Thay Pin iPhone X Pisen', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay pin iPhone 7 Pisen
', '6.jpg', 680000, 22, 12 , 13, 1, 4, 4, 1 );
INSERT INTO motasanpham VALUES (null, 6, 'Pin iPhone 7 Pisen', 'Điện thoại iPhone 7 – Dung lượng pin 1960 mAh cùng những bước cải tiến vượt trội của Apple', 'Thay Pin iPhone X Pisen', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay pin iPhone 6S Plus Pisen
', '7.jpg', 560000, 15, 12 , 13, 1, 4, 4, 1 );
INSERT INTO motasanpham VALUES (null, 7, 'Pin iPhone 6S Plus Pisen', 'Pin iPhone 6S+: Dung lượng 2750 mAh, thời lượng sử dụng rất tốt', 'Thay Pin iPhone 6S Plus Pisen', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone 6
', '8.jpg', 600000, 15, 6 , 9, 1,4, 2, 1 );
INSERT INTO motasanpham VALUES (null, 8, 'Màn Hình iPhone 6', 'Màn hình có độ phân giải 1334 x 750 pixels và sử dụng tấm nền IPS LCD. Bề mặt màn hình được phủ 
kính cường lực Ion và lớp phủ chống vân tay đảm bảo bề mặt màn hình luôn được sạch sẽ.', 'Thay Màn Hình iPhone 6', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone 7 Plus 
chính hãng Pisen V3', '9.jpg', 1350000, 12, 12, 9, 1, 4, 1, 1 );
INSERT INTO motasanpham VALUES (null, 9, 'Màn Hình iPhone 7 Plus ', 'Chiếc iPhone 7 Plus về tổng thể về kích thước không có gì thay đổi so với chiếc iPhone 6 Plus, 
với màn hình rộng 5.5 inch cùng độ phân giải 1080×1920 pixels được trang bị công nghệ màn hình Retina sắc nét', 'Thay Màn Hình iPhone 7 Plus', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone X chính hãng Pisen V3
', '10.jpg', 3500000, 16, 12, 9, 1, 4,2 , 1 );
INSERT INTO motasanpham VALUES (null, 10, 'Màn Hình iPhone 7 Plus ', 'Máy sở hữu thiết kế nhỏ gọn 143.6 x 70.9 x 7.7 mm và trọng lượng cực kỳ nhẹ 174 g. 
Màn hình có kích thước 5.8 inch và độ phân giải đạt chuẩn 
Super Retina HD cho khả năng hiển thị sắc nét.', 'Thay Màn Hình iPhone X chính hãng Pisen V3', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay pin iPhone 8 Plus Pisen
', '11.jpg', 800000, 10, 12, 13, 2, 4, 2, 1 );
INSERT INTO motasanpham VALUES (null, 11, 'Pin iPhone 8 Plus Pisen', 'Thời lượng sử dụng liên tục lên đến 10 giờ 35 phút. Ngoài ra, iPhone 8 Plus còn được trang bị 
tính năng sạc nhanh không dây tân tiến, giúp sạc 30% chỉ trong vòng 30 phút.', 'Thay Pin iPhone 8 Plus Pisen', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay kính iPhone 7 Plus
', '12.jpg', 480000, 11, 12, 6, 1, 4, 2, 1 );
INSERT INTO motasanpham VALUES (null, 12, 'Kính iPhone 7 Plus', 'Màn hình cũng như mặt kính là một trong những bộ phận quan trọng nhất của tất cả các thiết bị điện tử, 
iPhone 7 Plus cũng không phải là ngoại lệ.', 'Thay Kính iPhone 7 Plus', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone 6 Plus
', '13.jpg', 1000000, 16, 6 , 9, 1, 4, 4, 1 );
INSERT INTO motasanpham VALUES (null, 13, 'Màn Hình iPhone 6 Plus', 'IPhone 6 Plus (hay 6+) là chiếc iPhone tiên phong trong việc cung cấp một màn hình 
kích thước lớn cho người sử dụng. Dòng iphone này sở hữu một màn Retina 
kích thước 5.5 inches với mật độ điểm ảnh đạt 401 ppi.', 'Thay Màn Hình iPhone 6 Plus', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone 7 Plus
', '14.jpg', 1400000, 20, 6, 9, 1, 4, 1, 2 );
INSERT INTO motasanpham VALUES (null, 14, 'Màn Hình iPhone 7 Plus', 'Màn hình Retina trên iPhone 7 Plus với kích thuước rộng 5.5 inch, độ phân giải 1080×1920 pixels 
tương tự iPhone 6s Plus.', 'Thay Màn Hình iPhone 7 Plus', 'Diểm nổi bật hơn là tấm nền màn hình mới đã được bổ sung
 thêm 25% độ sáng, đạt mức cao nhất 625 nits cùng khả năng tái tạo màu sắc, 
gam màu rộng hơn và hỗ trợ 3D Touch.');

INSERT INTO sanpham VALUES (null, 'Thay kính iPhone X
', '15.jpg', 850000, 23, 12, 6, 1, 4, 1, 1 );
INSERT INTO motasanpham VALUES (null, 15, 'Kính iPhone X', 'Tình trạng vỡ mặt kính điện thoại iPhone X đến tới nhiều nguyên nhân khác nhau. 
Nhưng nguyên nhân chuẩn yếu đến từ thói quen của người dùng.', 'Thay Kính iPhone X', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay màn hình iPhone 5S', '16.jpg', 500000, 15, 6, 9, 1, 4, 1, 1 );
INSERT INTO motasanpham VALUES (null, 16, 'Màn Hình iPhone 5S', 'Về hiển thị, màn hình IP 5S sở hữu công nghệ  Retina với kích thước 4 inch cùng độ phân giải 
Full HD 1.136 x 640 pixel. Do đó, màu sắc và hình ảnh hiển thị trên màn hình sẽ rất chân thực và rõ nét.', 'Thay Màn Hình iPhone 5S', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay kính iPhone 6', '17.jpg', 300000, 12, 12, 6, 1, 4, 2, 1);
INSERT INTO motasanpham VALUES (null, 17, 'Kính iPhone 6', 'Điện Thoại iPhone 6 là một trong những chiếc iPhone rất phổ biến tại Việt Nam bởi đây chính là 
sản phẩm đánh dấu việc Apple lần đầu tiên mở rộng kích thước màn hình. 
Tuy nhiên, trong quá trình sử dụng, đôi khi sự cố xảy ra khiến mặt kính bảo vệ màn hình bị hỏng', 'Thay Kính iPhone 6', 'thông tin thêm');

INSERT INTO sanpham VALUES (null, 'Thay vỏ iPhone 7 Plus', '18.jpg', 650000, 12, 0, 14, 1, 4, 1, 1 );
INSERT INTO motasanpham VALUES (null, 18, 'Vỏ iPhone 7 Plus', 'Điện thoại iPhone 7 Plus phần vỏ – nắp lưng bị trầy xước ảnh hưởng đến vẻ ngoài. 
Nếu muốn mang lại vẻ đẹp như mới cho điện thoại thì hãy tìm đến dịch vụ thay vỏ iPhone 7 Plus.', 'Thay Vỏ iPhone 7 Plus', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay camera sau iPhone 7 Plus', '19.jpg', 1650000, 16, 6, 2, 1, 4, 2, 2 );
INSERT INTO motasanpham VALUES (null, 19, 'Camera Sau iPhone 7 Plus', 'iPhone 7 Plus là chiếc smartphone phá cách trong làng smartphone bởi thiết 
kế cụm camera kép 12 MP + 12 MP. Camera chính có khẩu độ f/1.8, tích hợp lấy nét 
PDAF cùng khả năng chụp góc rộng bắt mắt.', 'Thay Camera Sau iPhone 7 Plus', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay màn hình Samsung Galaxy J7 Pro
', '20.jpg', 1100000, 12, 6, 9, 1, 7, 1, 1 );
INSERT INTO motasanpham VALUES (null, 20, 'Màn Hình Samsung Galaxy J7 Pro', 'Chảy mực màn hình là lỗi thường hay gặp phải trên chiếc 
Samsung Galaxy J7 Pro khi người dùng vô tình đánh rơi máy trong quá trình sử dụng.', 'Thay Màn Hình Samsung Galaxy J7 Pro', 'thông tin thêm');


INSERT INTO sanpham VALUES (null, 'Thay màn hình Samsung Galaxy Note 8
', '21.jpg', 4550000, 12, 6, 9, 1, 7, 1, 1 );
INSERT INTO motasanpham VALUES (null, 21, 'Màn Hình Samsung Galaxy Note 8', 'Note 8 là chiếc Galaxy Note có kích thước lớn nhất đến thời điểm đó với màn hình vô cực lên tới 6.3 inch.', 'Thay Màn Hình Samsung Galaxy Note 8', 'thông tin thêm');
/*
INSERT INTO sanpham VALUES ('masp', 'tensanpham', 'hinhanh', dongia, soluongton, thoihanbaohanh, 'mota', 'maloai', 'madm', 'mansx', 'mancc', null );
INSERT INTO sanpham VALUES ('masp', 'tensanpham', 'hinhanh', dongia, soluongton, thoihanbaohanh, 'mota', 'maloai', 'madm', 'mansx', 'mancc', null );
*/

/* 
create table motasanpham( mamota ,masp ,  tieude ,  mota ,congdung ,thongtinthem);
INSERT INTO motasanpham VALUES ('mamota', 'masp', 'tieude', mota, congdung, thongtinthem);
*/


/*  
create table khuyenmai(makhuyenmai , tenkhuyenmai, giatrikhuyenmai, thoigianbatdau, thoigianketthuc,tinhtrang);
INSERT INTO khuyenmai VALUES (makhuyenmai , tenkhuyenmai, giatrikhuyenmai, thoigianbatdau, thoigianketthuc,tinhtrang);
 */
 
 /*  
INSERT INTO sanphamtieubieu VALUES  ( matb ,masp);
 */
 INSERT INTO sanphamtieubieu VALUES  ( null ,1);
  INSERT INTO sanphamtieubieu VALUES  ( null ,2);
   INSERT INTO sanphamtieubieu VALUES  ( null ,3);
    INSERT INTO sanphamtieubieu VALUES  ( null ,4);
    
-- delimiter $$
-- create procedure themCTHD(in idsp int, in idhd int, in insoluong int, in dongia float, in thanhtien float)
-- begin
-- 		insert into chitiethoadon values(null, idsp, idhd, insoluong, dongia, thanhtien);
--         update sanpham set soluongton = soluongton - insoluong where masp = idsp;
-- end$$


-- cập nhật số lượng sản phẩm
delimiter |
CREATE TRIGGER upd_soluong_sanpham before INSERT ON chitiethoadon for each row
BEGIN 
	UPDATE sanpham
	SET soluongton = soluongton - new.soluong where masp = new.masp;
END;
|
delimiter ;

-- cập nhật số lượng sản phẩm hóa đơn khách hàng, hóa dơn online

delimiter |
CREATE TRIGGER upd_soluong_sanpham_online before INSERT ON cthd_online for each row
BEGIN 
	UPDATE sanpham
	SET soluongton = soluongton - new.soluong where masp = new.masp;
END;
|
delimiter ;
-- Cập nhật số lượng trong bảng sản phẩm lỗi
-- drop trigger if exists upd_soluong_sanphamloi
-- delimiter |
-- CREATE TRIGGER upd_soluong_sanphamloi before insert ON sanphamloi for each row
-- BEGIN 
-- 	
-- 	UPDATE sanphamloi
-- 	SET soluong = soluong + new.soluong where masp = new.masp;
-- END;
-- |
-- delimiter ;
-- insert into sanphamloi values (null,2,3);
-- insert into sanphamloi values (null,3,3);
-- select * from sanphamloi;
-- update sanphamloi set soluong = 4 where masploi = 1;
-- SELECT * FROM nhanvien where motacongviec != "";

-- INSERT INTO hoadon VALUES  ( null ,1 ,2, '2021-11-18', 78000, 'Chờ tiếp nhận', '2021-11-18 21:22:57');
-- INSERT INTO hoadon VALUES  ( null ,2 ,1, '2021-11-18', 77000, 'Đã tiếp nhận', '2021-11-18 21:23:57');
-- INSERT INTO hoadon VALUES  ( null ,null ,2, '2021-11-18', 78000, 'Chờ tiếp nhận', '2021-11-18 21:12:57');
-- INSERT INTO hoadon VALUES  ( null ,null ,3, '2021-11-18', 78000, 'Chờ tiếp nhận', '2021-11-18 21:32:57');
-- INSERT INTO hoadon VALUES  ( null ,null ,2, '2021-11-18', 78000, 'Chờ tiếp nhận', '2021-11-18 21:42:57');
-- INSERT INTO hoadon VALUES  ( null ,5 ,1, '2021-11-18', 99000, 'Đã tiếp nhận', '2021-11-18 21:23:57');
-- SELECT * FROM hoadon inner join khachhang on hoadon.makh = khachhang.makh 
--  inner join nhanvien on hoadon.manv = nhanvien.manv ;
-- SELECT * FROM hoadon where tinhtranghd = 'Chờ tiếp nhận' ORDER BY  mahd DESC LIMIT 1;
-- SELECT * FROM hoadon where tinhtranghd = 'Chờ tiếp nhận' ORDER BY  mahd DESC LIMIT 2;


-- INSERT INTO hoadon VALUES  ( null ,2 ,2, '2021-11-18', 78000, 'Chờ tiếp nhận', '2021-11-18 21:22:57');
-- insert into chitiethoadon values(null, 2, 2, 2, 1950000, 3900000);



-- call themCTHD(4, 3, 2, 1950000, 3900000);
-- call themCTHD(5, 3, 2, 1950000, 3900000);
-- select * from sanpham;
-- 13-12-7-12-- 



-- SELECT * From hoadon  inner join khachhang on hoadon.makh = khachhang.makh 
--                                         inner join nhanvien on hoadon.manv = nhanvien.manv
--                                         Where hoadon.manv = 2 and tinhtranghd = 'Đã tiếp nhận';
-- SELECT mahd From hoadon Where manv = 2 ORDER BY  mahd DESC LIMIT 1









