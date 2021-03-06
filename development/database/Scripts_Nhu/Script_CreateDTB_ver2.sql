﻿use [HTTT_DungCuHocTap]
go
drop database HTTT_DungCuHocTap
go
create database HTTT_DungCuHocTap
Go
Use dodunghoctap

Go

--------------- TÌNH TRẠNG  -------------


DROP TABLE tinhtrang
create table tinhtrang(
	id int primary key NOT NULL IDENTITY(1, 1),
	TinhTrang nvarchar(255),
	TenBang varchar(200),
	ThuocTinh varchar(200)
)
go



------------ LOẠI SẢN PHẨM  ---------------

drop table loaisp

CREATE TABLE loaisp (
	id int primary key NOT NULL IDENTITY(1, 1),
	MaLoai varchar(200),
	TenLoai nvarchar(200) NOT NULL,
) 


-------------- SẢN PHẨM  ---------------

drop table sanpham

CREATE TABLE sanpham (
	id int primary key NOT NULL IDENTITY(1, 1),
	MaSP varchar(100) NOT NULL,
	idLoai int FOREIGN KEY (idLoai) references loaisp(id) ,
	TenSP nvarchar(255) NOT NULL DEFAULT '',
	AnhCT1 nvarchar(255),
	AnhCT2 nvarchar(255),
	AnhCT3 nvarchar(255),
	MoTa nvarchar(4000) NOT NULL,
	NgayCapNhat DATETIME,
	NgayTao DATETIME,
	GiaBan float,
	GiaBanHienTai float,
	AnhDaiDien nvarchar(255) NOT NULL,
	SoLuongTonKho int,
	NhaSanXuat nvarchar(255),
	idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id),
	Slug varchar(255),
	SoLanMua int DEFAULT '0',
	GiaNhap float,
	PhanTramKM int DEFAULT '0'
)

---------------   TÀI KHOẢN  ----------------

 CREATE TABLE taikhoan(
   id int primary key NOT NULL IDENTITY(1, 1),
   MaTaiKhoan varchar(100),
   HoTen nvarchar(150) NOT NULL DEFAULT '',
   GioiTinh tinyint,
   HinhDaiDien varchar(200),
   Username varchar(50) NOT NULL DEFAULT '',
   Pass varchar(255) NOT NULL,
   DiaChi nvarchar(255) DEFAULT NULL,
   DienThoai varchar(50) DEFAULT NULL,
   Email varchar(75) NOT NULL DEFAULT '',
   NgayDangKy SMALLDATETIME,
   NgayCapNhat SMALLDATETIME,
   idGroup int NOT NULL,
   Luong int,
   idTinhTrang int,
   remember_token varchar(250)
)


DROP TABLE taikhoan


------------------  PHIẾU NHẬP  ----------------------------


drop table phieunhap

CREATE TABLE  phieunhap (
  id int primary key NOT NULL IDENTITY(1, 1),
  MaPhieuNhap varchar(100),
  idTaiKhoan int FOREIGN KEY (idTaiKhoan) references taikhoan(id),
  NgayXuatHoaDon DATE,
  NgayCapNhat DATETIME,
  TongTien float,
  idTinhTrang int,
)


drop table phieunhap_chitiet

CREATE TABLE phieunhap_chitiet(
  id int primary key NOT NULL IDENTITY(1, 1),
  MaPhieuNhapChiTiet varchar(100),
  NhaSanXuat nvarchar(255),
  idLoai int FOREIGN KEY (idLoai) references loaisp(id),
  idSanPham int FOREIGN KEY (idSanPham) references sanpham(id),
  GiaNhap float,
  SoLuongNhap int,
  ThanhTien float,
  idPN int FOREIGN KEY (idPN) references phieunhap(id)
)



---------------------  KHÁCH HÀNG ---------------------------

 CREATE TABLE khachhang(
   id int primary key NOT NULL IDENTITY(1, 1),
   MaKhachHang varchar(100),
   HoTen nvarchar(150) NOT NULL DEFAULT '',
   DiaChi nvarchar(255) DEFAULT NULL,
   DienThoai varchar(50) DEFAULT NULL,
   NgayDangKy SMALLDATETIME,
   NgayCapNhat SMALLDATETIME,
   idTaiKhoan int,
)


DROP table khachhang
---------------------- ĐƠN HÀNG  ----------------------------
DROP TABLE donhang
CREATE TABLE  donhang (
  id int primary key NOT NULL IDENTITY(1, 1),
  MaDonHang varchar(100),
  idTaiKhoan int FOREIGN KEY (idTaiKhoan) references taikhoan(id),
  idKhachHang int FOREIGN KEY (idKhachHang) references khachhang(id),
  ThoiDiemDatHang SMALLDATETIME,
  TenNguoiNhan nvarchar(150),
  DTNguoiNhan varchar(150),
  DiaChi nvarchar(200) DEFAULT NULL,
  Ngaygiao date,
  TongTien float,
  idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id), 
)



---------------------   CHI TIẾT ĐƠN HÀNG   -------------------

drop table donhang_chitiet

CREATE TABLE donhang_chitiet (
  id int primary key NOT NULL IDENTITY(1, 1),
  MaDonHangChiTiet varchar(100) NOT NULL,
  idDonHang int FOREIGN KEY (idDonHang) references donhang(id) NOT NULL,
  idSanPham int FOREIGN KEY (idSanPham) references sanpham(id) NOT NULL,
  TenSP nvarchar(255) NOT NULL DEFAULT '',
  SoLuong int NOT NULL DEFAULT '0',
  Gia int NOT NULL DEFAULT '0', 
) 


-------------- BÁO CÁO -------

CREATE TABLE baocao (
  id int primary key NOT NULL IDENTITY(1, 1),
  idTaiKhoan int FOREIGN KEY (idTaiKhoan) references taikhoan(id) NOT NULL,
  NgayTao smalldatetime NULL,
  GhiChu nvarchar(255) NULL,
  idTinhTrang int FOREIGN KEY (idTinhTrang) references tinhtrang(id) NOT NULL,
)


-------------- BÁO CÁO CHI TIẾT-------

CREATE TABLE baocao (
  id int primary key NOT NULL IDENTITY(1, 1),
  idTaiKhoan int FOREIGN KEY (idTaiKhoan) references taikhoan(id) NOT NULL,
  NgayTao smalldatetime NULL,
  GhiChu nvarchar(255) NULL,
  idTinhTrang int FOREIGN KEY (idTinhTrang) references tinhtrang(id) NOT NULL,
)




---- INSERT DATA -----

		-- LOAI SAN PHAM --
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L01',N'Bút bi');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L02',N'Bút chì gỗ');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L03',N'Bút nước');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L04',N'Tẩy chì');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L05',N'Hộp bút');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L06',N'Lịch');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L07',N'DEMO');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L08',N'DEMO3');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L09',N'demo443');
INSERT INTO loaisp(MaLoai, TenLoai) VALUES ('L10',N'DEMO8');

		--TINH TRANG --

INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Bán hàng','taikhoan', 'idGroup');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Quản kho','taikhoan', 'idGroup');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Admin','taikhoan', 'idGroup');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Hoạt động','taikhoan', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Ngưng hoạt động','taikhoan', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Nam','taikhoan', 'GioiTinh');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Nữ','taikhoan', 'GioiTinh');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Khác','taikhoan', 'GioiTinh');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Còn hàng','sanpham', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Hàng lỗi','sanpham', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Hết hàng','sanpham', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'DEMO','', '');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Chưa xử lý','donhang', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Đã xử lý','donhang', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Hủy','donhang', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Chưa Duyệt','baocao', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Đã Duyệt','baocao', 'idTinhTrang');
INSERT INTO tinhtrang(TinhTrang, TenBang, ThuocTinh) VALUES (N'Đã Nhập','baocao', 'idTinhTrang');


		---SAN PHAM --

INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP011',1, N'Bút bi vương miện Crown Love Magic', 'BUT_BI_Pre (1).jpg','BUT_BI_Pre (1).jpg', 'BUT_BI_Pre (1).jpg',N'<ul><li>Chiều dài: 20cm.</li><li>Chất liệu: Inox.Bút có 3 màu: đỏ, xanh, tím.</li><li>Ở trên đầu bút có hình vương miện màu vàng bóng kết hợp với đầu bi tròn.</li></ul>', '2016-11-28 16:04:53.000','2016-11-28 16:04:53.000', 23400,18000,'Butbi1.jpg',90,N'MINX',9,'NULL',3,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP012',1, N'Bút bi kẹo đầu bông bi', 'BUT_BI_Pre (2).jpg','BUT_BI_Pre (2).jpg', 'BUT_BI_Pre (2).jpg',N'<ul><li>Chiều dài: 20cm.</li><li>Đâu bông được làm từ len.</li><li>Chất liệu: Nhựa.</li><li>Bút đầu bông hình tròn có nhiều màu: trắng, đỏ, cam, hồng, xanh dương.</li><li>Thân bút còn có kèm theo một chiếc nơ nhỏ nhắn xinh xắn.</li></ul>', '2016-11-28 16:04:53.001','2016-11-28 16:04:53.001', 23400,18000,'Butbi2.jpg',93,N'MINX',9,'NULL',4,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP013',1, N'Bút bi uốn dẻo hình hoa mặt trời', 'BUT_BI_Pre (3).jpg','BUT_BI_Pre (3).jpg', 'BUT_BI_Pre (3).jpg',N'<ul><li>Chiều dài:22cm.</li><li>Đầu bút là hình hoa mặt trời với chất liệu là chất dẻo.</li><li>Thân bút còn có cả lá với nhiều màu sắc nổi bật.</li></ul>', '2016-11-28 16:04:53.002','2016-11-28 16:04:53.002', 28600,22000,'Butbi3.jpg',30,N'MINX',9,'NULL',16,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP014',1, N'Bút bi kem ốc quế', 'BUT_BI_Pre (4).jpg','BUT_BI_Pre (4).jpg', 'BUT_BI_Pre (4).jpg',N'<ul><li>Chất liệu: Nhựa.</li><li>Chiều dài:12.6cm.</li><li>Đầu bút là những cây kem ốc quế và đầu mốc cực kì dễ thương!</li></ul>', '2016-11-28 16:04:53.003','2016-11-28 16:04:53.003', 23400,18000,'Butbi4.jpg',98,N'MINX',9,'NULL',12,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP015',1, N'Bút bi kẹo mút', 'BUT_BI_Pre (5).jpg','BUT_BI_Pre (5).jpg', 'BUT_BI_Pre (5).jpg',N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu đầu bông được làm từ len.</li><li>Bút đầu bông hình tròn có nhiều màu: trắng, đỏ, cam, hồng, xanh dương.</li><li>Thân bút còn có kèm theo một chiếc nơ nhỏ nhắn xinh xắn.</li></ul>', '2016-11-28 16:04:53.004','2016-11-28 16:04:53.004', 26000,20000,'Butbi5.jpg',90,N'MINX',9,'NULL',12,20000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP016',1, N'Bút bi uốn dẻo hình bàn tay', 'BUT_BI_Pre (6).jpg','BUT_BI_Pre (6).jpg', 'BUT_BI_Pre (6).jpg',N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Chất dẻo</li><li>Bút bi có nhiều màu: xanh dương, cam, tím, hồng,..</li><li>Đặc biệt bút có hình bàn tay uốn dẻo và bên trong bàn tay là hình mặt người vô cùng đáng yêu.</li></ul>', '2016-11-28 16:04:53.005','2016-11-28 16:04:53.005', 22100,17000,'Butbi6.jpg',90,N'MINX',9,'NULL',12,17000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP017',1, N'Bút bi kim vương miện kim chấm bi', 'BUT_BI_Pre (7).jpg','BUT_BI_Pre (7).jpg', 'BUT_BI_Pre (7).jpg',N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Inox.</li><li>Bút có 3 màu: đỏ, xanh, tím.</li><li>Ở trên đầu bút có hình vương miện.</li></ul>', '2016-11-28 16:04:53.006','2016-11-28 16:04:53.006', 24700,19000,'Butbi7.jpg',80,N'MINX',9,'NULL',12,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP018',1, N'Bút bi kim vương miện kim chấm bi', 'BUT_BI_Pre (8).jpg','BUT_BI_Pre (8).jpg', 'BUT_BI_Pre (8).jpg',N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Inox.</li><li>Bút có 3 màu: đỏ, xanh, tím.</li><li> Ở trên đầu bút có hình vương miện.</li></ul><br/>', '2016-11-28 16:04:53.007','2016-11-28 16:04:53.007', 24700,19000,'Butbi8.jpg',39,N'MINX',9,'NULL',12,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP019',1, N'Bút bi thỏ bông', 'BUT_BI_Pre (10).jpg','BUT_BI_Pre (10).jpg', 'BUT_BI_Pre (10).jpg',N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu đầu bông: Vải, bông gòn.</li><li>Thân bút có nhiều màu sắc kèm theo những vết chấm bi cực cá tính.</li><li>Đầu bút được đính vào đầu những chú thỏ bông với ba màu: xanh dương, hồng, tím.</li></ul>', '2016-11-28 16:04:53.008','2016-11-28 16:04:53.008', 44200,34000,'Butbi10.jpg',230,N'MINX',9,'NULL',180,34000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0110',1, N'Bút bi Patin', 'BUT_BI_Pre (11).jpg','BUT_BI_Pre (11).jpg', 'BUT_BI_Pre (11).jpg',N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Nhựa.</li><li>Đầu bút là hình cậu bé đang đội chiếc nón, với nhiều màu sắc tùy theo ý thích của bạn.</li><li>Thân bút có màu trắng và những đường kẻ sọc màu đen, kết hợp với những màu sắc vô cùng ngộ nghĩnh.</li><li>Nắp bút hoàn toàn như tên gọi của tên bút chính là một đôi giày Patin.</li></ul>', '2016-11-28 16:04:53.009','2016-11-28 16:04:53.009', 32500,25000,'Butbi11.jpg',300,N'MINX',9,'NULL',180,25000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0111',1, N'Bút bi uốn dẻo hình con vật ngộ nghĩnh', 'BUT_BI_Pre (12).jpg','BUT_BI_Pre (12).jpg', 'BUT_BI_Pre (12).jpg',N'<ul><li>Chiều dài:19cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là những con vật ngộ nghĩnh: voi, hổ, báo....</li><li>Thân bút là chỉ có một màu.</li><li>Nắp bút hoàn toàn như tên gọi của tên bút chính là những con vật ngộ nghĩnh.</li></ul>', '2016-11-28 16:04:53.010','2016-11-28 16:04:53.010', 26000,20000,'Butbi12.jpg',200,N'MINX',9,'NULL',98,20000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0112',1, N'Bút bi uốn dẻo hình ô', 'BUT_BI_Pre (13).jpg','BUT_BI_Pre (13).jpg', 'BUT_BI_Pre (13).jpg',N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là hình chiếc ô cùng với những ngôi sao be bé.</li><li>Thân bút có một màu từ đầu bút tới nắp bút.</li></ul>', '2016-11-28 16:04:53.011','2016-11-28 16:04:53.011', 36400,28000,'Butbi13.jpg',170,N'MINX',9,'NULL',38,28000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0113',1, N'Bút bi uốn dẻo hình quả bóng', 'BUT_BI_Pre (14).jpg','BUT_BI_Pre (14).jpg', 'BUT_BI_Pre (14).jpg',N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Cao su.</li><li>Thân bút có một màu tùy vào màu bút bạn tha hồ chọn nhé!.</li><li>Đầu bút có hình quả bóng.</li></ul>', '2016-11-28 16:04:53.012','2016-11-28 16:04:53.012', 39000,30000,'Butbi14.jpg',230,N'MINX',9,'NULL',59,30000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0114',1, N'Bút bi uốn dẻo hình quần vợt', 'BUT_BI_Pre (15).jpg','BUT_BI_Pre (15).jpg', 'BUT_BI_Pre (15).jpg',N'<ul><li>Chiều dài:21cm.</li><li>Chất liệu:Nhựa</li><li>Đầu bút là hình quần vợt.</li><li>Thân bút chỉ có một màu.</li></ul>', '2016-11-28 16:04:53.013','2016-11-28 16:04:53.013', 26000,20000,'Butbi15.jpg',100,N'MINX',9,'NULL',32,20000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0115',1, N'Bút bi uốn dẻo râu ria', 'BUT_BI_Pre (16).jpg','BUT_BI_Pre (16).jpg', 'BUT_BI_Pre (16).jpg',N'<ul><li>Chiều dài:17cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là hình chú hài ngộ nghĩnh kèm theo hàm râu đen cong.</li><li>Thân bút bạn có thể bẻ cong nhiều phía mà không hề sợ bị gãy.</li></ul>', '2016-11-28 16:04:53.014','2016-11-28 16:04:53.014', 49400,38000,'Butbi16.jpg',108,N'MINX',9,'NULL',33,38000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0116',1, N'Bút bi The Bianconeri', 'BUT_BI_Pre (17).jpg','BUT_BI_Pre (17).jpg', 'BUT_BI_Pre (17).jpg',N'<ul><li>Chiều dài:17cm.</li><li>Chất liệu:Nhựa.</li><li>Đầu bút là chú ngựa, bạn có thể gỡ cả đầu bút ra một cách dễ dàng.</li><li>Thân bút có màu sọc vằn đen.</li></ul>', '2016-11-28 16:04:53.015','2016-11-28 16:04:53.015', 52000,40000,'Butbi17.jpg',50,N'MINX',9,'NULL',84,40000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0217',2, N'Hộp bút chì màu gấu xinh', 'BUT_CHI_GO_Pre (1).jpg','BUT_CHI_GO_Pre (1).jpg', 'BUT_CHI_GO_Pre (1).jpg',N'<ul><li>Kích thước: 10.5 x 3.5 cm.</li><li>Khối lượng: 35g.</li><li>Hộp gồm 12 chiếc bút chì màu 9 x 0.5 cm.</li></ul>', '2015-12-13 12:43:00.002','2015-12-13 12:43:00.002', 676000,520000,'Butchi1.jpg',120,N'MINX',9,'NULL',37,520000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0218',2, N'Hộp bút chì màu Floating Town', 'BUT_CHI_GO_Pre (2).jpg','BUT_CHI_GO_Pre (2).jpg', 'BUT_CHI_GO_Pre (2).jpg',N'<ul><li>Khối lượng: 35g.</li><li>Kích thước: 10.5 x 3.5 cm.</li><li>Hộp gồm 12 chiếc bút chì màu 9 x 0.5 cm.</li></ul>', '2015-12-13 12:43:00.003','2015-12-13 12:43:00.003', 54600,42000,'Butchi2.jpg',130,N'MINX',9,'NULL',15,42000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0219',2, N'Bút chì gỗ cú mèo gấu heo khỉ ốc sên', 'BUT_CHI_GO_Pre (3).jpg','BUT_CHI_GO_Pre (3).jpg', 'BUT_CHI_GO_Pre (3).jpg',N'<ul><li>Kích thước: 22 cm.</li><li>Bút chì gỗ cú mèo gấu heo khỉ ốc sên được làm từ loại gỗ thiên nhiên cao cấp, <br/> kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ cú mèo gấu heo khỉ ốc sên sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li> Làm từ gỗ cao cấp.</li> <li>Trang trí hình con vật dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.004','2015-12-13 12:43:00.004', 24700,19000,'Butchi3.jpg',90,N'MINX',9,'NULL',34,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0220',2, N'Bút chì gỗ con vật', 'BUT_CHI_GO_Pre (4).jpg','BUT_CHI_GO_Pre (4).jpg', 'BUT_CHI_GO_Pre (4).jpg',N'<ul><li>Kích thước: 23cm.</li><li>Bút chì gỗ con vật được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con vật sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Chất liệu được làm từ gỗ.</li> <li>Trang trí hình thú ngộ nghĩnh dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.005','2015-12-13 12:43:00.005', 31200,24000,'Butchi4.jpg',120,N'MINX',9,'NULL',12,24000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0221',2, N'Bút chì gỗ động vật ngộ nghĩnh', 'BUT_CHI_GO_Pre (5).jpg','BUT_CHI_GO_Pre (5).jpg', 'BUT_CHI_GO_Pre (5).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ con vật được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con vật sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Chất liệu được làm từ gỗ.</li> <li>Trang trí đầu thú dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.006','2015-12-13 12:43:00.006', 39000,30000,'Butchi5.jpg',100,N'MINX',9,'NULL',20,30000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0222',2, N'Bút chì gỗ con ong', 'BUT_CHI_GO_Pre (6).jpg','BUT_CHI_GO_Pre (6).jpg', 'BUT_CHI_GO_Pre (6).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ con ong được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con ong sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình con ong dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.007','2015-12-13 12:43:00.007', 39000,30000,'Butchi6.jpg',23,N'MINX',9,'NULL',20,30000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0223',2, N'Bút chì gỗ em bé', 'BUT_CHI_GO_Pre (7).jpg','BUT_CHI_GO_Pre (7).jpg', 'BUT_CHI_GO_Pre (7).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ em bé được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Chất liệu được làm từ gỗ.</li> <li>Trang trí hình thú ngộ nghĩnh dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Có 5 mẫu như hình: (từ trái qua phải: trắng, hồng, đỏ kẻ, xanh dương, đỏ hoa)</li></ul></li></ul>', '2015-12-13 12:43:00.008','2015-12-13 12:43:00.008', 24700,19000,'Butchi7.jpg',38,N'MINX',9,'NULL',26,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0224',2, N'Bút chì gỗ Noel', 'BUT_CHI_GO_Pre (8).jpg','BUT_CHI_GO_Pre (8).jpg', 'BUT_CHI_GO_Pre (8).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ Noel được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.009','2015-12-13 12:43:00.009', 24700,19000,'Butchi8.jpg',40,N'MINX',9,'NULL',10,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0225',2, N'Bút chì gỗ dâu tây', 'BUT_CHI_GO_Pre (9).jpg','BUT_CHI_GO_Pre (9).jpg', 'BUT_CHI_GO_Pre (9).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ dâu tây được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình dâu tây dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.010','2015-12-13 12:43:00.010', 31200,24000,'Butchi9.jpg',24,N'MINX',9,'NULL',28,24000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0226',2, N'Bút chì gỗ chữ số', 'BUT_CHI_GO_Pre (10).jpg','BUT_CHI_GO_Pre (10).jpg', 'BUT_CHI_GO_Pre (10).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình con số dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.011','2015-12-13 12:43:00.011', 28600,22000,'Butchi10.jpg',19,N'MINX',9,'NULL',22,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0227',2, N'Bút chì gỗ hoa quả', 'BUT_CHI_GO_Pre (11).jpg','BUT_CHI_GO_Pre (11).jpg', 'BUT_CHI_GO_Pre (11).jpg',N'<ul><li>Kích thước: 20cm.</li><li>Bút chì gỗ hoa quả được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình hoa quả dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.012','2015-12-13 12:43:00.012', 27300,21000,'Butchi11.jpg',38,N'MINX',9,'NULL',15,21000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0228',2, N'Bút chì gỗ xe cộ', 'BUT_CHI_GO_Pre (12).jpg','BUT_CHI_GO_Pre (12).jpg', 'BUT_CHI_GO_Pre (12).jpg',N'<ul><li>Kích thước: 19.5cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình xe cộ tây dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.013','2015-12-13 12:43:00.013', 16900,13000,'Butchi12.jpg',28,N'MINX',9,'NULL',5,13000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0229',2, N'Bút chì gỗ nốt nhạc', 'BUT_CHI_GO_Pre (13).jpg','BUT_CHI_GO_Pre (13).jpg', 'BUT_CHI_GO_Pre (13).jpg',N'<ul><li>Kích thước: 19.5cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình nốt nhạc dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.014','2015-12-13 12:43:00.014', 24700,19000,'Butchi13.jpg',28,N'MINX',9,'NULL',5,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0230',2, N'Bút chì gỗ thú mặt tròn dây lắc cánh quạt', 'BUT_CHI_GO_Pre (14).jpg','BUT_CHI_GO_Pre (14).jpg', 'BUT_CHI_GO_Pre (14).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 10g.</li><li>Được trang trí với thú dây lắc mặt tròn cánh quạt vô cùng độc đáo.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.015','2015-12-13 12:43:00.015', 33800,26000,'Butchi14.jpg',46,N'MINX',9,'NULL',14,26000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0231',2, N'Bút chì gỗ bánh & kem', 'BUT_CHI_GO_Pre (15).jpg','BUT_CHI_GO_Pre (15).jpg', 'BUT_CHI_GO_Pre (15).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 12g</li><li>Bút chì gỗ bánh & kem được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình bánh và kem dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.016','2015-12-13 12:43:00.016', 31200,24000,'Butchi15.jpg',40,N'MINX',9,'NULL',19,24000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0232',2, N'Bút chì gỗ ốc sên bướm vịt', 'BUT_CHI_GO_Pre (16).jpg','BUT_CHI_GO_Pre (16).jpg', 'BUT_CHI_GO_Pre (16).jpg',N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 12g</li><li>Bút chì gỗ ốc sên bướm vịt được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-12-13 12:43:00.017','2015-12-13 12:43:00.017', 36400,28000,'Butchi16.jpg',100,N'MINX',9,'NULL',22,28000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0333',3, N'Bút nước The Bianconeri', 'BUT_NUOC_Pre (1).jpg','BUT_NUOC_Pre (1).jpg', 'BUT_NUOC_Pre (1).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: 17 x 5.5 cm.</li><li>Đầu bi 0.38mm mũi kim.</li><li>Trọng lượng:15g.</li></ul>', '2016-10-28 23:22:12.009','2016-10-28 23:22:12.009', 19500,15000,'Butnuoc1.jpg',40,N'MINX',9,'NULL',30,15000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0334',3, N'Bút bi nước The Freshness and Peace', 'BUT_NUOC_Pre (2).jpg','BUT_NUOC_Pre (2).jpg', 'BUT_NUOC_Pre (2).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.38mm mũi kim.</li><li>Trọng lượng:15g.</li><li>Vỏ nhựa mờ.</li></ul>', '2016-10-28 23:22:12.010','2016-10-28 23:22:12.010', 20800,16000,'Butnuoc2.jpg',48,N'MINX',9,'NULL',30,16000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0335',3, N'Bút bi kẻ caro Noble', 'BUT_NUOC_Pre (3).jpg','BUT_NUOC_Pre (3).jpg', 'BUT_NUOC_Pre (3).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.1cm.</li><li>Đầu bi 0.5mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li><li>Có 2 màu: xanh, đỏ;1 hộp gồm 12 chiếc.</li></ul>', '2016-10-28 23:22:12.011','2016-10-28 23:22:12.011', 28600,22000,'Butnuoc3.jpg',60,N'MINX',9,'NULL',34,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0336',3, N'Bút bi nước cà phê', 'BUT_NUOC_Pre (4).jpg','BUT_NUOC_Pre (4).jpg', 'BUT_NUOC_Pre (4).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.6cm.</li><li>Đầu bi 0.38mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li><li>Có 3 màu: xanh, đen, đỏ.</li></ul>', '2016-10-28 23:22:12.012','2016-10-28 23:22:12.012', 28600,22000,'Butnuoc4.jpg',120,N'MINX',9,'NULL',22,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0337',3, N'Bút bi nước đuôi kẻ caro MOSAIC', 'BUT_NUOC_Pre (5).jpg','BUT_NUOC_Pre (5).jpg', 'BUT_NUOC_Pre (5).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.6cm.</li><li>Đầu bi 0.35mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li></ul>', '2016-10-28 23:22:12.013','2016-10-28 23:22:12.013', 15600,12000,'Butnuoc5.jpg',90,N'MINX',9,'NULL',44,12000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0338',3, N'Bút bi nước chấm bi đen trắng', 'BUT_NUOC_Pre (6).jpg','BUT_NUOC_Pre (6).jpg', 'BUT_NUOC_Pre (6).jpg',N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 2.5cm đường kính 1.5cm màu trong suốt.</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm đường kính 0.7cm vỏ bút bằng nhựa mờ trang trí bằng họa tiết chấm bi và kẻ.</li><li>Đuôi bút màu trắng, hình bán cầu gắn chặt với thân bút.</li></ul>', '2016-10-28 23:22:12.014','2016-10-28 23:22:12.014', 28600,22000,'Butnuoc6.jpg',90,N'MINX',9,'NULL',44,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0339',3, N'Bút bi nước ngôi sao Let Party Girl', 'BUT_NUOC_Pre (7).jpg','BUT_NUOC_Pre (7).jpg', 'BUT_NUOC_Pre (7).jpg',N'<ul><li>Hãng: SCM.</li><li>Có 3 mẫu: xanh lá, đen, trắng.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút dài 4.1cm đường kính 1cm đỉnh nắp hình mặt kim cương cùng màu thân bút.</li><li>Đầu bi 0.38mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 13.9cm đường kính 0.8cm, được trang trí bằng họa tiết sao và chữ tiếng Anh.</li></ul></li></ul>', '2016-10-28 23:22:12.015','2016-10-28 23:22:12.015', 26000,20000,'Butnuoc7.jpg',38,N'MINX',9,'NULL',22,20000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0340',3, N'Bút bi nước Bow Memories kẻ và nơ', 'BUT_NUOC_Pre (8).jpg','BUT_NUOC_Pre (8).jpg', 'BUT_NUOC_Pre (8).jpg',N'<ul><li>Hãng: SCM.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút dài 4.4cm đường kính 1cm, đầu nắp bút màu trắng thiết kế hình mặt kim cương.</li><li>Đầu bi 0.38mm mũi kim mực ra đều, đẹp, không bay màu.</li><li>Thân bút dài 14.1cm đường kính 0.8cm khi cầm bút viết rất thoải mái, thân bút có các chi tiết trang trí: kẻ, hoa văn, nơ.</li></ul></li></ul>', '2016-10-28 23:22:12.016','2016-10-28 23:22:12.016', 28600,22000,'Butnuoc8.jpg',40,N'MINX',9,'NULL',22,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0341',3, N'Bút bi nước Fine chấm bi/sao/kẻ', 'BUT_NUOC_Pre (9).jpg','BUT_NUOC_Pre (9).jpg', 'BUT_NUOC_Pre (9).jpg',N'<ul><li>Hãng: SCM.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút: dài 5.2cm, đường kính 1cm, có hoa văn cùng màu với thân bút.</li><li>Đầu bi 0.35mm, mực sử dụng chất màu carbon đen, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm, đường kính 0.8cm, được trang trí 3 loại hoa văn: kẻ, ngôi sao, chấm bi cùng hàng chữ tiếng Anh.</li><li>Đuôi bút màu trắng dạng bán cầu, gắn chặt với thân bút.</li></ul></li></ul>', '2016-10-28 23:22:12.017','2016-10-28 23:22:12.017', 22100,17000,'Butnuoc9.jpg',60,N'MINX',9,'NULL',34,17000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0342',3, N'Bút bi nước Classic vintage a car', 'BUT_NUOC_Pre (10).jpg','BUT_NUOC_Pre (10).jpg', 'BUT_NUOC_Pre (10).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.35mm mũi kim.</li><li>Đuôi bút màu trắng dạng bán cầu, gắn chặt với thân bút.</li></ul>', '2016-10-28 23:22:12.018','2016-10-28 23:22:12.018', 24700,19000,'Butnuoc10.jpg',50,N'MINX',9,'NULL',34,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0343',3, N'Bút bi nước hoa quả caro/chấm bi/kẻ', 'BUT_NUOC_Pre (11).jpg','BUT_NUOC_Pre (11).jpg', 'BUT_NUOC_Pre (11).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.35mm mũi kim.</li><li>Vỏ nhựa mờ.</li></ul>', '2016-10-28 23:22:12.019','2016-10-28 23:22:12.019', 24700,19000,'Butnuoc11.jpg',60,N'MINX',9,'NULL',34,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0344',3, N'Bút bi nước trái tim Love We are heart to heart', 'BUT_NUOC_Pre (12).jpg','BUT_NUOC_Pre (12).jpg', 'BUT_NUOC_Pre (12).jpg',N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 3.4cm đường kính 1cm</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 14.1cm đường kính 0.8cm vỏ bút bằng nhựa mờ trang trí bằng họa tiết trái tim.</li><li>Đuôi bút cùng màu với họa tiết trên thân bút, gắn chặt thân bút.</li></ul>', '2016-10-28 23:22:12.020','2016-10-28 23:22:12.020', 28600,22000,'Butnuoc12.jpg',42,N'MINX',9,'NULL',34,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0345',3, N'Bút bi nước hải quân', 'BUT_NUOC_Pre (13).jpg','BUT_NUOC_Pre (13).jpg', 'BUT_NUOC_Pre (13).jpg',N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 3.4cm đường kính 1cm in các biểu tượng hàng hải.</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm đường kính 0.8cm vỏ bút bằng nhựa bóng trang trí bằng họa tiết kẻ ngang và biểu tượng hàng hải.</li><li>Đuôi bút màu trắng, hình bán cầu gắn chặt với thân bút.</li></ul>', '2016-10-28 23:22:12.021','2016-10-28 23:22:12.021', 27300,21000,'Butnuoc13.jpg',65,N'MINX',9,'NULL',34,21000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0346',3, N'Bút bi nước nắp nhãn Coffee tròn', 'BUT_NUOC_Pre (14).jpg','BUT_NUOC_Pre (14).jpg', 'BUT_NUOC_Pre (14).jpg',N'<ul><li>Hãng: SCM.</li><li>Có 3 mẫu: xanh lá, nâu đậm, đỏ đậm.</li><li>Mô tả chi tiết bút:<ul><li>Nắp bút dài 4.3cm đường kính 1cm, màu trong suốt, gắn mác nhựa tròn Coffee.</li><li>Đầu bi 0.38mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 13.9cm, đường kính 0.8cm, vỏ bút in họa tiết kẻ và tách cà phê kèm dòng chữ tiếng Anh.</li><li>Đuôi bút màu trắng, dạng bán cầu, gắn chặt với thân bút.</li></ul></li></ul>', '2016-10-28 23:22:12.022','2016-10-28 23:22:12.022', 33800,26000,'Butnuoc14.jpg',65,N'MINX',9,'NULL',34,26000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0347',3, N'Bút bi nước Lifestyle hoa văn nền trắng', 'BUT_NUOC_Pre (15).jpg','BUT_NUOC_Pre (15).jpg', 'BUT_NUOC_Pre (15).jpg',N'<ul><li>Hãng: SCM.</li><li>Chất liệu vỏ: nhựa mờ.</li><li>Bút có 3 mẫu: xanh lá, hồng, xanh lam.</li><li>Mô tả chi tiết bút:<ul><li>Nắp bút dài 2.1cm, đường kính 1cm, màu trong suốt, nắp chặt đầu bút.</li><li>Thân bút dài 15.6cm, đường kính 0.8cm, được in hoa văn trên nền màu trắng sữa rất nhã nhặn.</li><li>Đuôi bút dài 0.6cm, đường kính 0.4cm, dạng bán cầu gắn chặt với thân bút.</li></ul></li></ul>', '2016-10-28 23:22:12.023','2016-10-28 23:22:12.023', 23400,18000,'Butnuoc15.jpg',42,N'MINX',9,'NULL',45,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0348',3, N'Bút bi nước nắp kẻ trắng', 'BUT_NUOC_Pre (16).jpg','BUT_NUOC_Pre (16).jpg', 'BUT_NUOC_Pre (16).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.8cm, đầu bi 0.38mm.</li><li>Ngòi bút dạng đầu kim.</li><li>Màu mực: xanh, đen.</li></ul>', '2016-10-28 23:22:12.024','2016-10-28 23:22:12.024', 24700,19000,'Butnuoc16.jpg',40,N'MINX',9,'NULL',34,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0349',3, N'Bút bi nước Monami', 'BUT_NUOC_Pre (17).jpg','BUT_NUOC_Pre (17).jpg', 'BUT_NUOC_Pre (17).jpg',N'<ul><li>Hãng: SCM.</li><li>Kích thước: 16 cm..</li><li>Ngòi bút dạng đầu kim.</li><li>Màu mực: xanh, đen.</li><li>Bt1 có 6 màu, 144 chiếc(2kg)</li></ul>', '2016-10-28 23:22:12.025','2016-10-28 23:22:12.025', 24700,19000,'Butnuoc17.jpg',70,N'MINX',9,'NULL',56,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0450',4, N'Tẩy chì CAND ERASER', 'Gom_Pre (1).jpg','Gom_Pre (1).jpg', 'Gom_Pre (1).jpg',N'<ul><li>Khối lượng:100g.</li><li>Kích thước: 4 x 2 x 7 cm.</li></ul>', '2016-10-1 23:22:12.014','2016-10-1 23:22:12.014', 11700,9000,'Gom1.jpg',70,N'MINX',9,'NULL',33,9000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0451',4, N'Bộ tẩy hình tim 365 day love', 'Gom_Pre (2).jpg','Gom_Pre (2).jpg', 'Gom_Pre (2).jpg',N'<ul><li>Khối lượng:95g.</li><li>Kích thước: 3.3 x 3.5 cm.</li></ul>', '2016-10-1 23:22:12.015','2016-10-1 23:22:12.015', 16900,13000,'Gom2.jpg',70,N'MINX',9,'NULL',30,13000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0452',4, N'Tẩy chì Graphic Love Eraser', 'Gom_Pre (3).jpg','Gom_Pre (3).jpg', 'Gom_Pre (3).jpg',N'<ul><li>Khối lượng:70g.</li><li>Kích thước: 7 x 0.8 x 6 cm.</li></ul>', '2016-10-1 23:22:12.016','2016-10-1 23:22:12.016', 18200,14000,'Gom3.jpg',50,N'MINX',9,'NULL',40,14000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0453',4, N'Tẩy chì hình chữ nhật mặt gấu mèo lợn', 'Gom_Pre (4).jpg','Gom_Pre (4).jpg', 'Gom_Pre (4).jpg',N'<ul><li>Khối lượng:25g.</li><li>Kích thước: 5.2 x 3 x 1.2 cm.</li></ul>', '2016-10-1 23:22:12.017','2016-10-1 23:22:12.017', 18200,14000,'Gom4.jpg',60,N'MINX',9,'NULL',40,14000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0454',4, N'Tẩy chì Building Style', 'Gom_Pre (5).jpg','Gom_Pre (5).jpg', 'Gom_Pre (5).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 7 x 1.5 x 4 cm.</li><li>Tẩy chì Building Style với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li><li>Sản phẩm đa dạng về màu sắc, được thiết kế bo tròn 4 cạnh giúp bạn có thể tẩy nét chì dễ dàng, không bị gãy đầu như các loại tẩy vuông.</li></ul>', '2016-10-1 23:22:12.018','2016-10-1 23:22:12.018', 18200,14000,'Gom5.jpg',70,N'MINX',9,'NULL',30,14000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0455',4, N'Tẩy chì Shingle Eraser', 'Gom_Pre (6).jpg','Gom_Pre (6).jpg', 'Gom_Pre (6).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6 x 3.6 x 1.3 cm.</li><li>Tẩy chì Shingle Eraser với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li><li>Sản phẩm đa dạng về màu sắc, được thiết kế bo tròn 4 cạnh giúp bạn có thể tẩy nét chì dễ dàng, không bị gãy đầu như các loại tẩy vuông.</li></ul>', '2016-10-1 23:22:12.019','2016-10-1 23:22:12.019', 9100,7000,'Gom6.jpg',60,N'MINX',9,'NULL',30,7000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0456',4, N'Tẩy thỏ, gấu, mèo', 'Gom_Pre (7).jpg','Gom_Pre (7).jpg', 'Gom_Pre (7).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6.3 x 3 x 1.5cm</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', '2016-10-1 23:22:12.020','2016-10-1 23:22:12.020', 9100,7000,'Gom7.jpg',60,N'MINX',9,'NULL',30,7000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0457',4, N'Tẩy dài động vật Amainoo', 'Gom_Pre (8).jpg','Gom_Pre (8).jpg', 'Gom_Pre (8).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6.6 x 1.6cm.</li><li>Có 4 mẫu: hồng, đen, tím, nâu.</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', '2016-10-1 23:22:12.021','2016-10-1 23:22:12.021', 15600,12000,'Gom8.jpg',50,N'MINX',9,'NULL',34,12000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0458',4, N'Tẩy chì 4B', 'Gom_Pre (9).jpg','Gom_Pre (9).jpg', 'Gom_Pre (9).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 3cm x 2cm.</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', '2016-10-1 23:22:12.022','2016-10-1 23:22:12.022', 11700,9000,'Gom9.jpg',50,N'MINX',9,'NULL',34,9000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0559',5, N'Hộp đựng bút kẹp ảnh bò sữa mèo sư tử', 'Hop_Pre (1).jpg','Hop_Pre (1).jpg', 'Hop_Pre (1).jpg',N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2016-7-28 23:22:12.023','2016-7-28 23:22:12.023', 23400,18000,'Hopbut1.jpg',60,N'MINX',9,'NULL',38,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0560',5, N'Hộp đựng bút kẹp ảnh hình hoa', 'Hop_Pre (2).jpg','Hop_Pre (2).jpg', 'Hop_Pre (2).jpg',N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2016-7-28 23:22:12.024','2016-7-28 23:22:12.024', 20800,16000,'Hopbut2.jpg',70,N'MINX',9,'NULL',38,16000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0561',5, N'Hộp đựng bút kẹp ảnh voi, ếch, gấu', 'Hop_Pre (3).jpg','Hop_Pre (3).jpg', 'Hop_Pre (3).jpg',N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2016-7-28 23:22:12.025','2016-7-28 23:22:12.025', 20800,16000,'Hopbut3.jpg',110,N'MINX',9,'NULL',38,16000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0562',5, N'Hộp đựng bút Mood For Love', 'Hop_Pre (4).jpg','Hop_Pre (4).jpg', 'Hop_Pre (4).jpg',N'<ul><li>Khối lượng:100g.</li><li>Kích thước: 20 x 5,3 x 2,6 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2016-7-28 23:22:12.026','2016-7-28 23:22:12.026', 28600,22000,'Hopbut4.jpg',80,N'MINX',9,'NULL',38,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0563',5, N'Hộp đựng bút Vintage', 'Hop_Pre (5).jpg','Hop_Pre (5).jpg', 'Hop_Pre (5).jpg',N'<ul><li>Khối lượng:90g.</li><li>Kích thước: 20 x 5,3 x 2,6 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2016-7-28 23:22:12.027','2016-7-28 23:22:12.027', 23400,18000,'Hopbut5.jpg',90,N'MINX',9,'NULL',38,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0564',5, N'Hộp đựng bút nhựa hello kitty', 'Hop_Pre (6).jpg','Hop_Pre (6).jpg', 'Hop_Pre (6).jpg',N'<ul><li>Khối lượng:45g.</li><li>Kích thước: 18 x 4 cm.</li><li>Chất liệu: nhựa.</li></ul>', '2016-7-28 23:22:12.028','2016-7-28 23:22:12.028', 24700,19000,'Hopbut6.jpg',100,N'MINX',9,'NULL',42,19000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0565',5, N'Hộp đựng bút gỗ languo', 'Hop_Pre (7).jpg','Hop_Pre (7).jpg', 'Hop_Pre (7).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 5 x 18 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2016-7-28 23:22:12.029','2016-7-28 23:22:12.029', 22100,17000,'Hopbut7.jpg',100,N'MINX',9,'NULL',42,17000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0566',5, N'Hộp đựng bút da Languo', 'Hop_Pre (8).jpg','Hop_Pre (8).jpg', 'Hop_Pre (8).jpg',N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 5 x 18 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2016-7-28 23:22:12.030','2016-7-28 23:22:12.030', 44200,34000,'Hopbut8.jpg',89,N'MINX',9,'NULL',58,34000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0567',5, N'Hộp đựng bútbút vải thô quai đeo Hero', 'Hop_Pre (9).jpg','Hop_Pre (9).jpg', 'Hop_Pre (9).jpg',N'<ul><li>Khối lượng: 90g.</li><li>Kích thước: 9.5 x 18 cm.</li><li>Chất liệu: vải thô.</li></ul>', '2016-7-28 23:22:12.031','2016-7-28 23:22:12.031', 44200,34000,'Hopbut9.jpg',90,N'MINX',9,'NULL',42,34000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0568',5, N'Hộp đựng bút da cuộn RXZN nâu, hồng', 'Hop_Pre (10).jpg','Hop_Pre (10).jpg', 'Hop_Pre (10).jpg',N'<ul><li>Khối lượng: 50g.</li><li>Kích thước: 18 x 12.3 (cm)</li><li>Chất liệu: Giả da.</li></ul>', '2016-7-28 23:22:12.032','2016-7-28 23:22:12.032', 39000,30000,'Hopbut10.jpg',90,N'MINX',9,'NULL',42,30000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0569',5, N'Hộp đựng bút Winny', 'Hop_Pre (11).jpg','Hop_Pre (11).jpg', 'Hop_Pre (11).jpg',N'<ul><li>Khối lượng: 50g.</li><li>Kích thước: 20 x 1.5 x 6 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2016-7-28 23:22:12.033','2016-7-28 23:22:12.033', 36400,28000,'Hopbut11.jpg',80,N'MINX',9,'NULL',48,28000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0570',5, N'Hộp đựng bút Retro Pattern cỡ đại', 'Hop_Pre (12).jpg','Hop_Pre (12).jpg', 'Hop_Pre (12).jpg',N'<ul><li>Khối lượng: 110g.</li><li>Kích thước: 19 x 8.5 x 2.7 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2016-7-28 23:22:12.034','2016-7-28 23:22:12.034', 32500,25000,'Hopbut12.jpg',90,N'MINX',9,'NULL',50,25000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0571',5, N'Hộp đựng bút nhựa mặt cười', 'Hop_Pre (13).jpg','Hop_Pre (13).jpg', 'Hop_Pre (13).jpg',N'<ul><li>Khối lượng: 30g.</li><li>Kích thước: 2 x 5 x 17.5 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2016-7-28 23:22:12.035','2016-7-28 23:22:12.035', 28600,22000,'Hopbut13.jpg',90,N'MINX',9,'NULL',60,22000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0572',5, N'Hộp đựng bút Retro Pattern cỡ trung', 'Hop_Pre (14).jpg','Hop_Pre (14).jpg', 'Hop_Pre (14).jpg',N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 6.5 x 2 x 18 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2016-7-28 23:22:12.036','2016-7-28 23:22:12.036', 23400,18000,'Hopbut14.jpg',100,N'MINX',9,'NULL',60,18000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0673',6, N'lịch kế hoạch để bàn heo xinh', 'Lich_Pre (1).jpg','Lich_Pre (1).jpg', 'Lich_Pre (1).jpg',N'<ul><li>Khối lượng: 100g.</li><li>Kích thước: 12 x 14 cm.</li><li>Số tờ: 14.</li></ul>', '2016-5-28 23:22:12.037','2016-5-28 23:22:12.037', 70200,54000,'Lich1.jpg',100,N'MINX',9,'NULL',42,54000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0674',6, N'lịch để bàn Time Is The Air', 'Lich_Pre (2).jpg','Lich_Pre (2).jpg', 'Lich_Pre (2).jpg',N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 5 x 22 x 6 cm.</li><li>Số tờ: 14.</li></ul>', '2016-5-28 23:22:12.038','2016-5-28 23:22:12.038', 65000,50000,'Lich2.jpg',100,N'MINX',9,'NULL',42,50000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0675',6, N'lịch trang trí để bàn Life Is Beautiful', 'Lich_Pre (3).jpg','Lich_Pre (3).jpg', 'Lich_Pre (3).jpg',N'<ul><li>Khối lượng: 40g.</li><li>Kích thước: 10.5 x 8.5 cm.</li></ul>', '2016-5-28 23:22:12.039','2016-5-28 23:22:12.039', 67600,52000,'Lich3.jpg',100,N'MINX',9,'NULL',42,52000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0676',6, N'lịch trang trí để bàn Paper Dall Mate', 'Lich_Pre (4).jpg','Lich_Pre (4).jpg', 'Lich_Pre (4).jpg',N'<ul><li>Khối lượng: 40g.</li><li>kích thước: 10 x 4 x 4.5 cm.</li></ul>', '2016-5-28 23:22:12.040','2016-5-28 23:22:12.040', 80600,62000,'Lich4.jpg',100,N'MINX',9,'NULL',42,62000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0677',6, N'lịch trang trí để bàn The Soldier', 'Lich_Pre (5).jpg','Lich_Pre (5).jpg', 'Lich_Pre (5).jpg',N'<ul><li>Khối lượng: 100g.</li><li>Kích thước: 10 x 4 x 4.5 cm.</li></ul>', '2016-5-28 23:22:12.041','2016-5-28 23:22:12.041', 80600,62000,'Lich5.jpg',100,N'MINX',9,'NULL',42,62000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0678',6, N'lịch để bàn April Story', 'Lich_Pre (6).jpg','Lich_Pre (6).jpg', 'Lich_Pre (6).jpg',N'<ul><li>Khối lượng: 85g.</li><li>Kích thước: 5.5 x 5.8 x 22.3 cm.</li></ul>', '2016-5-28 23:22:12.042','2016-5-28 23:22:12.042', 72800,56000,'Lich6.jpg',100,N'MINX',9,'NULL',41,56000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0679',6, N'lịch trang trí để bàn Nono', 'Lich_Pre (7).jpg','Lich_Pre (7).jpg', 'Lich_Pre (7).jpg',N'<ul><li>Khối lượng: 200g.</li><li>Kích thước: 21.2 x 15 cm.</li></ul>', '2016-5-28 23:22:12.043','2016-5-28 23:22:12.043', 75400,58000,'Lich7.jpg',100,N'MINX',9,'NULL',40,58000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0680',6, N'lịch trang trí để bàn', 'Lich_Pre (8).jpg','Lich_Pre (8).jpg', 'Lich_Pre (8).jpg',N'<ul><li>Khối lượng: 60g.</li><li>Kích thước: 14.5 x 12 cm.</li><li>Số tờ 14.</li></ul>', '2016-5-28 23:22:12.044','2016-5-28 23:22:12.044', 71500,55000,'Lich8.jpg',100,N'MINX',9,'NULL',40,55000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0681',6, N'lịch kế hoạch trang trí để bàn', 'Lich_Pre (9).jpg','Lich_Pre (9).jpg', 'Lich_Pre (9).jpg',N'<ul><li>Khối lượng: 310g.</li><li>Kích thước: 25.5 x 18 cm.</li><li>Mẫu 1.</li></ul>', '2016-5-28 23:22:12.045','2016-5-28 23:22:12.045', 71500,55000,'Lich9.jpg',100,N'MINX',9,'NULL',42,55000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0682',6, N'lịch trang trí để bàn Hello Geeks', 'Lich_Pre (10).jpg','Lich_Pre (10).jpg', 'Lich_Pre (10).jpg',N'<ul><li>Khối lượng: 60g.</li><li>Kích thước: 25.5 x 18 cm.</li><li>Số tờ: 14.</li></ul>', '2016-5-28 23:22:12.046','2016-5-28 23:22:12.046', 70200,54000,'Lich10.jpg',100,N'MINX',9,'NULL',42,54000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0683',6, N'lịch trang trí để bàn', 'Lich_Pre (11).jpg','Lich_Pre (11).jpg', 'Lich_Pre (11).jpg',N'<ul><li>Khối lượng: 210g.</li><li>Kích thước: 26x 14.5 cm.</li><li>Số tờ: 14.</li></ul>', '2016-5-28 23:22:12.047','2016-5-28 23:22:12.047', 79300,61000,'Lich11.jpg',100,N'MINX',9,'NULL',42,61000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0684',6, N'lịch & Port Card Sketching Life & Food', 'Lich_Pre (12).jpg','Lich_Pre (12).jpg', 'Lich_Pre (12).jpg',N'<ul><li>Khối lượng: 75g.</li><li>Kích thước: 15.4 x 11 cm.</li><li>Số tờ: 12.</li></ul>', '2016-5-28 23:22:12.048','2016-5-28 23:22:12.048', 83200,64000,'Lich12.jpg',100,N'MINX',9,'NULL',39,64000,0);
INSERT INTO sanpham(MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, NgayCapNhat, NgayTao, GiaBan, GiaBanHienTai, AnhDaiDien, SoLuongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua, GiaNhap, PhanTramKM ) VALUES ('SP0685',6, N'lịch kế hoạch để bàn Desk Calendar', 'Lich_Pre (13).jpg','Lich_Pre (13).jpg', 'Lich_Pre (13).jpg',N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 12 x 14 cm.</li><li>Số tờ: 14.</li></ul>', '2016-5-28 23:22:12.049','2016-5-28 23:22:12.049', 78000,60000,'Lich13.jpg',100,N'MINX',9,'NULL',39,60000,0);



				---- TAI KHOAN ----

INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U03',N'demo9',7,'Koala.jpg','demo9','$2y$10$155PilYSBOb43I7pcB.2XeJ4PU9zCT4MdbbxMGThV4Y6Pr6YpmUH.', N'An Dương Vương, Quận 5','987890985','demo91@gmail.com',NULL,NULL,3,7000000,4,'TrJiHgYSixG9I1GbBJdOfYHHJ8X6yevn024SApwptEY4MDtVhR2ejftF1pOf');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U04',N'a',8,'NULL','a','$2y$10$1p7pFg5cSwqcBcuz4dnPXevDVt82jx6LjZ5WOZP7YYFAqt7mO2wrW', N'An Dương Vương, Quận 6','987990985','a@gmail.com',NULL,NULL,2,7000000,5,'1NT6JC914HFxWQDQrqfOXq94aFYiG3m5tB1TnEAoheI82vijVeqluLCNxHir');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U05',N'n3',7,'NULL','n3','$2y$10$F9jrUrTbyZnp2ZlGqkNHwexHQbAW4o8IKuQylV1LHfvAsy2Vx7EsG', N'An Dương Vương, Quận 7','987997985','n3@gmail.com',NULL,NULL,1,7000000,5,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U06',N'ab',7,'NULL','ab','$2y$10$1x8HdOMbpw8j6YWCHq8DMu4HOxfsBROVquMBYFL0B0vursyhsmhve', N'An Dương Vương, Quận 8','987910985','ab@gmail.com',NULL,NULL,1,7000000,5,'5FVfWSQlYDf9ZEw9l84OfyyDqoORHgsIh8v0uxKvqJVjwij5L8p312fWqfas');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U07',N'nhu1',7,'NULL','nhu1','$2y$10$TVzfDLzJY6j2nDTiJv1c/OKvB2efXghp7cOBvI0vuAgRtSRKPzHaq', N'Bình Phú, Quận 9','987995985','nhu@gmail.com',NULL,NULL,1,7000000,5,'QX0AJMLM6l8Ju3kPaXGwqwRwioclbvQcTShlJdve7ioAA6ccfCzTxAnYotzH');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U08',N'nhu2',7,'NULL','nhu2','$2y$10$.VBI6x5h31wwCe23WVPAN.rPqmiqJ2yUsqx27riRIklMEjFsQoigO', N'An Dương Vương, Quận 10','987230985','nhu2@gmail.com',NULL,NULL,1,7000000,4,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U09',N'nhu5',6,'NULL','nhu5','$2y$10$TO.jYY0ZVJpWRkJmMglRj.IDAtpromOT0A5.q3X7BF5RnwiGbxQT2', N'An Dương Vương, Quận 11','986790985','nhu5@gmail.com',NULL,NULL,1,7000000,4,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U10',N'nhu5',6,'NULL','nhu5','$2y$10$y0nzglgyRva2Ae0rpWal5Oyxn3CNKrPh2kkbUtGoZ2oP/48mK0W4q', N'An Dương Vương, Quận 12','983190985','nhu5@gmail.com',NULL,NULL,1,7000000,4,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U11',N'fdggggggggggggggg',7,'Tulips.jpg','fdgdgdg56uytu','$2y$10$cYRWU2jXl.hrsfUSnXS8w.C1lb3eqwuYuCYWoUi2zW4fgDjfK24K2', N'An Dương Vương, Quận 13','987120987','fsd23fsf@gmail.com',NULL,NULL,2,9000000,NULL,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U12',N'fdgfddsfsdfdsf',7,'Desert.jpg','demo1','$2y$10$QblzbzCyIaLCV55PcqJUx.xjYShbaVoDB4foMdQHVo6.6RrcWZfRG', N'An Dương Vương, Quận 14','9098909890','demo12@gmail.com',NULL,NULL,2,9000000,4,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('NULL',N'gfgfgfhgfhghghgjhj',7,'american-express.png','abcdef','$2y$10$2uOSvI21vrbLktlE0au/MeIn0O.0m72jRLEfg7f9tFet71NVsdLhC', N'An Dương Vương, Quận 15','909090909','abcd@gmail.com',NULL,NULL,1,9000000,4,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U13',N'DFSFDDSFSFSF',7,'Desert.jpg','demodemo1','$2y$10$.qgAx0wQThZD/hdHu2xlseagjdNNX82e/5Y0Ifn0xLVwiZOaN8lfe', N'An Dương Vương, Quận 16','9090909090','DSFSF@gmail.com',NULL,NULL,1,9000000,4,'NULL');
INSERT INTO taikhoan(MaTaiKhoan, HoTen, GioiTinh, HinhDaiDien, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, NgayCapNhat, idGroup, Luong, idTinhTrang, remember_token) VALUES ('U14',N'Demo Quỳnh Như',6,'Penguins.jpg','abcde','$2y$10$8mrp5JNG9A8ek6uFmMWspOmlPDfTbQ2W88jsxwDBTOvwrHPHAaChO', N'An Dương Vương, Quận 17','987898123','abcde@gmail.com',NULL,NULL,1,7000000,4,'NULL');


UPDATE taikhoan SET NgayDangKy = '2016-11-21 21:11:00' , NgayCapNhat = '2016-11-21 21:11:00'


	--- PHIEU NHAP ----

INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, idTinhTrang, NgayXuatHoaDon, NgayCapNhat) VALUES ('PN00001',3, 50393000,0,'2016-11-28 16:04:53.000','2016-11-28 16:04:53.000');
INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, idTinhTrang, NgayXuatHoaDon, NgayCapNhat) VALUES ('PN00002',9, 85266000,0,'2015-12-13 12:43:00.003','2015-12-13 12:43:00.003');
INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, idTinhTrang, NgayXuatHoaDon, NgayCapNhat) VALUES ('PN00003',9, 19963000,0,'2016-10-28 23:22:12.009','2016-10-28 23:22:12.009');
INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, idTinhTrang, NgayXuatHoaDon, NgayCapNhat) VALUES ('PN00004',9, 5500000,0,'2016-10-1 23:22:12.016','2016-10-1 23:22:12.016');
INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, idTinhTrang, NgayXuatHoaDon, NgayCapNhat) VALUES ('PN00005',9, 27996000,0,'2016-7-28 23:22:12.034','2016-7-28 23:22:12.034');
INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, idTinhTrang, NgayXuatHoaDon, NgayCapNhat) VALUES ('PN00006',3, 74300000,0,'2016-5-28 23:22:12.048','2016-5-28 23:22:12.048');

		--- PHIEU NHAP CHI TIET -----


INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00001',N'MINX',1,1,18000,90,1620000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00002',N'MINX',1,2,18000,93,1674000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00003',N'MINX',1,3,22000,30,660000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00004',N'MINX',1,4,18000,98,1764000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00005',N'MINX',1,5,20000,90,1800000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00006',N'MINX',1,6,17000,90,1530000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00007',N'MINX',1,7,19000,80,1520000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00008',N'MINX',1,8,19000,39,741000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00009',N'MINX',1,9,34000,230,7820000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00010',N'MINX',1,10,25000,300,7500000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00011',N'MINX',1,11,20000,200,4000000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00012',N'MINX',1,12,28000,170,4760000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00013',N'MINX',1,13,30000,230,6900000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00014',N'MINX',1,14,20000,100,2000000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00015',N'MINX',1,15,38000,108,4104000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00016',N'MINX',1,16,40000,50,2000000,1);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00017',N'MINX',2,17,520000,120,62400000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00018',N'MINX',2,18,42000,130,5460000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00019',N'MINX',2,19,19000,90,1710000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00020',N'MINX',2,20,24000,120,2880000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00021',N'MINX',2,21,30000,100,3000000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00022',N'MINX',2,22,30000,23,690000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00023',N'MINX',2,23,19000,38,722000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00024',N'MINX',2,24,19000,40,760000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00025',N'MINX',2,25,24000,24,576000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00026',N'MINX',2,26,22000,19,418000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00027',N'MINX',2,27,21000,38,798000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00028',N'MINX',2,28,13000,28,364000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00029',N'MINX',2,29,19000,28,532000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00030',N'MINX',2,30,26000,46,1196000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00031',N'MINX',2,31,24000,40,960000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00032',N'MINX',2,32,28000,100,2800000,2);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00033',N'MINX',3,33,15000,40,600000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00034',N'MINX',3,34,16000,48,768000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00035',N'MINX',3,35,22000,60,1320000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00036',N'MINX',3,36,22000,120,2640000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00037',N'MINX',3,37,12000,90,1080000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00038',N'MINX',3,38,22000,90,1980000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00039',N'MINX',3,39,20000,38,760000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00040',N'MINX',3,40,22000,40,880000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00041',N'MINX',3,41,17000,60,1020000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00042',N'MINX',3,42,19000,50,950000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00043',N'MINX',3,43,19000,60,1140000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00044',N'MINX',3,44,22000,42,924000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00045',N'MINX',3,45,21000,65,1365000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00046',N'MINX',3,46,26000,65,1690000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00047',N'MINX',3,47,18000,42,756000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00048',N'MINX',3,48,19000,40,760000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00049',N'MINX',3,49,19000,70,1330000,3);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00050',N'MINX',4,50,9000,70,630000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00051',N'MINX',4,51,13000,70,910000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00052',N'MINX',4,52,14000,50,700000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00053',N'MINX',4,53,14000,60,840000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00054',N'MINX',4,54,14000,70,980000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00055',N'MINX',4,55,7000,60,420000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00056',N'MINX',4,56,7000,60,420000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00057',N'MINX',4,57,12000,50,600000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00058',N'MINX',4,58,9000,50,450000,4);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00059',N'MINX',5,59,18000,60,1080000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00060',N'MINX',5,60,16000,70,1120000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00061',N'MINX',5,61,16000,110,1760000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00062',N'MINX',5,62,22000,80,1760000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00063',N'MINX',5,63,18000,90,1620000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00064',N'MINX',5,64,19000,100,1900000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00065',N'MINX',5,65,17000,100,1700000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00066',N'MINX',5,66,34000,89,3026000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00067',N'MINX',5,67,34000,90,3060000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00068',N'MINX',5,68,30000,90,2700000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00069',N'MINX',5,69,28000,80,2240000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00070',N'MINX',5,70,25000,90,2250000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00071',N'MINX',5,71,22000,90,1980000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00072',N'MINX',5,72,18000,100,1800000,5);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00073',N'MINX',6,73,54000,100,5400000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00074',N'MINX',6,74,50000,100,5000000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00075',N'MINX',6,75,52000,100,5200000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00076',N'MINX',6,76,62000,100,6200000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00077',N'MINX',6,77,62000,100,6200000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00078',N'MINX',6,78,56000,100,5600000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00079',N'MINX',6,79,58000,100,5800000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00080',N'MINX',6,80,55000,100,5500000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00081',N'MINX',6,81,55000,100,5500000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00082',N'MINX',6,82,54000,100,5400000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00083',N'MINX',6,83,61000,100,6100000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00084',N'MINX',6,84,64000,100,6400000,6);
INSERT INTO phieunhap_chitiet(MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN) VALUES ('PNCT00085',N'MINX',6,85,60000,100,6000000,6);



				--- KHACH HANG -----

INSERT INTO khachhang(MaKhachHang, HoTen,DiaChi, DienThoai, NgayDangKy, NgayCapNhat, idTaiKhoan) VALUES (N'KH00001',N'Phạm Lê Quỳnh Như', N'An Dương Vương, Quận 5','2132314','2016-11-23 20:32:00','2016-11-23 20:32:00',3);
INSERT INTO khachhang(MaKhachHang, HoTen,DiaChi, DienThoai, NgayDangKy, NgayCapNhat, idTaiKhoan) VALUES (N'KH00002',N'Phạm Thị Phúc Xuân', N'An Dương Vương, Quận 6','243242343242','2016-11-23 20:41:00','2016-11-23 20:41:00',3);
INSERT INTO khachhang(MaKhachHang, HoTen,DiaChi, DienThoai, NgayDangKy, NgayCapNhat, idTaiKhoan) VALUES (N'KH00003',N'Guỳnh Kim Xuân', N'An Dương Vương, Quận 7','989324324','2016-11-23 20:41:00','2016-11-23 20:41:006',3);
INSERT INTO khachhang(MaKhachHang, HoTen,DiaChi, DienThoai, NgayDangKy, NgayCapNhat, idTaiKhoan) VALUES (N'KH00004',N'Lê Hoàng Minh Hiếu', N'An Dương Vương, Quận 8','2323323213','2016-11-23 20:41:00','2016-11-23 20:41:00',3);
INSERT INTO khachhang(MaKhachHang, HoTen,DiaChi, DienThoai, NgayDangKy, NgayCapNhat, idTaiKhoan) VALUES (N'K01',N'Nguyễn Tuấn Vũ', N'Bình Phú, Quận 9','232','2016-11-23 20:41:00','2016-11-23 20:41:00',1);
INSERT INTO khachhang(MaKhachHang, HoTen,DiaChi, DienThoai, NgayDangKy, NgayCapNhat, idTaiKhoan) VALUES (N'K01',N'Xuan', N'An Dương Vương, Quận 10','324324','2016-11-23 20:41:00','2016-11-23 20:41:00',1);
