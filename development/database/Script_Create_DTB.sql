use [HTTT_Dodunghoctap]
go
drop database HTTT_Dodunghoctap
go
create database HTTT_Dodunghoctap
Go
Use dodunghoctap

Go

----------- PHIẾU NHẬP -------

DROP TABLE phieunhap
GO

CREATE TABLE phieunhap(
	idDH_Nhap varchar(100) primary key not null,
	idUser varchar(100) FOREIGN KEY (idUser) references users(idUser),
	NoiNhap  nvarchar(100) not null,
	NgayXuatHoaDon date NOT NULL DEFAULT '0000-00-00',
	TongTien int
	)

Insert into phieunhap(idDH_Nhap, idUser, NoiNhap, NgayXuatHoaDon) values('NDH01', 'U02', N'Cửa hàng Quỳnh Như', '2015-02-10'),
('NDH02', 'U02', N'Cửa hàng Minh Hiếu', '2015-02-12'),
('NDH03', 'U07', N'Cửa hành Kim Xuân', '2015-02-15'),
('NDH04', 'U07', N'Cửa hàng Quỳnh Như', '2015-08-11'),
('NDH05', 'U02', N'Cửa hàng Minh Hiếu', '2015-10-11'),
('NDH06', 'U07', N'Cửa hàng Kim Xuân', '2015-10-20')

	------------------------------

DROP TABLE phieunhap_chitiet
GO

CREATE TABLE phieunhap_chitiet(
	idCT_Nhap varchar(100) primary key not null,
	idDH_Nhap varchar(100) FOREIGN KEY (idDH_Nhap) references phieunhap(idDH_Nhap),
	idSP varchar(100) FOREIGN KEY(idSP) references sanpham(idSP),
	idLoai varchar(100) FOREIGN KEY(idLoai) references loaisp(idLoai),
	Gia_Nhap int,
	SoLuong_Nhap int,
	ThanhTien int
)



------------ LOẠI SẢN PHẨM  ---------------

drop table loaisp

CREATE TABLE loaisp (
	id int primary key NOT NULL IDENTITY(1, 1),
	MaLoai varchar(200),
	TenLoai nvarchar(200) NOT NULL,
) 

delete from loaisp
Insert into loaisp (MaLoai, TenLoai) values
('L01', N'Bút bi'),
('L02', N'Bút chì gỗ'),
('L03', N'Bút nước'),
('L04', N'Tẩy chì'),
('L05', N'Hộp bút'),
('L06', N'Lịch');



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
	NgayCapNhat SMALLDATETIME,
	NgayTao SMALLDATETIME,
	GiaBan int NOT NULL DEFAULT '0',
	GiaBanHienTai int NOT NULL DEFAULT '0',
	AnhDaiDien nvarchar(255) NOT NULL,
	SoLuongTonKho int DEFAULT '0',
	NhaSanXuat nvarchar(255),
	idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id),
	Slug varchar(255),
	SoLanMua int DEFAULT '0',
)

INSERT INTO sanpham (idSP, idLoai, TenSP, urlPreview, MoTa, NgayCapNhat, Gia, urlHinh, SoLanXem, SoLuongTonKho, GhiChu, SoLanMua) VALUES
('SP01', 'L01', N'Bút bi vương miện Crown Love Magic', N'BUT_BI_Pre (1).jpg', N'<ul><li>Chiều dài: 20cm.</li><li>Chất liệu: Inox.Bút có 3 màu: đỏ, xanh, tím.</li><li>Ở trên đầu bút có hình vương miện màu vàng bóng kết hợp với đầu bi tròn.</li></ul>', '2015-02-12', 18000, N'Butbi1.jpg', 20, 10, NULL, 3),
('SP02', 'L01', N'Bút bi kẹo đầu bông bi', N'BUT_BI_Pre (2).jpg', N'<ul><li>Chiều dài: 20cm.</li><li>Đâu bông được làm từ len.</li><li>Chất liệu: Nhựa.</li><li>Bút đầu bông hình tròn có nhiều màu: trắng, đỏ, cam, hồng, xanh dương.</li><li>Thân bút còn có kèm theo một chiếc nơ nhỏ nhắn xinh xắn.</li></ul>', '2015-02-14', 18000, N'Butbi2.jpg', 4, 12, NULL, 4),
('SP03', 'L01', N'Bút bi uốn dẻo hình hoa mặt trời', N'BUT_BI_Pre (3).jpg', N'<ul><li>Chiều dài:22cm.</li><li>Đầu bút là hình hoa mặt trời với chất liệu là chất dẻo.</li><li>Thân bút còn có cả lá với nhiều màu sắc nổi bật.</li></ul>', '2015-02-15', 22000, N'Butbi3.jpg', 19, 30, NULL, 16),
('SP04', 'L01', N'Bút bi kem ốc quế', N'BUT_BI_Pre (4).jpg', N'<ul><li>Chất liệu: Nhựa.</li><li>Chiều dài:12.6cm.</li><li>Đầu bút là những cây kem ốc quế và đầu mốc cực kì dễ thương!</li></ul>', '2015-02-15', 18000, N'Butbi4.jpg', 3, 16, NULL, 12),
('SP05', 'L01', N'Bút bi kẹo mút', N'BUT_BI_Pre (5).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu đầu bông được làm từ len.</li><li>Bút đầu bông hình tròn có nhiều màu: trắng, đỏ, cam, hồng, xanh dương.</li><li>Thân bút còn có kèm theo một chiếc nơ nhỏ nhắn xinh xắn.</li></ul>', '2015-02-15', 20000, N'Butbi5.jpg', 10, 30, NULL, 12),
('SP06', 'L01', N'Bút bi uốn dẻo hình bàn tay', N'BUT_BI_Pre (6).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Chất dẻo</li><li>Bút bi có nhiều màu: xanh dương, cam, tím, hồng,..</li><li>Đặc biệt bút có hình bàn tay uốn dẻo và bên trong bàn tay là hình mặt người vô cùng đáng yêu.</li></ul>', '2015-02-15', 17000, N'Butbi6.jpg', 12, 30, NULL, 12),
('SP07', 'L01', N'Bút bi kim vương miện kim chấm bi', N'BUT_BI_Pre (7).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Inox.</li><li>Bút có 3 màu: đỏ, xanh, tím.</li><li>Ở trên đầu bút có hình vương miện.</li></ul>', '2015-02-15', 19000, N'Butbi7.jpg', 20, 39, NULL, 12),
('SP08', 'L01', N'Bút bi kim vương miện kim chấm bi', N'BUT_BI_Pre (8).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Inox.</li><li>Bút có 3 màu: đỏ, xanh, tím.</li><li> Ở trên đầu bút có hình vương miện.</li></ul><br/>', '2015-02-15', 19000, N'Butbi8.jpg', 20, 39, NULL, 12),
('SP09', 'L01', N'Bút bi dễ thương Lucky', N'BUT_BI_Pre (9).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Nhựa.</li><li>Bút có nhiều màu sắc: xanh dương, nâu, tím, hồng,...</li><li>Mỗi đầu bút là hình một con thú.Gồm có ếch, thỏ, sóc, bướm, khỉ,...</li></ul><br/>', '2015-02-15', 20000, N'Butbi9.jpg', 20, 160, NULL, 30),
('SP10', 'L01', N'Bút bi thỏ bông', N'BUT_BI_Pre (10).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu đầu bông: Vải, bông gòn.</li><li>Thân bút có nhiều màu sắc kèm theo những vết chấm bi cực cá tính.</li><li>Đầu bút được đính vào đầu những chú thỏ bông với ba màu: xanh dương, hồng, tím.</li></ul>', '2015-02-15', 34000, N'Butbi10.jpg', 40, 230, NULL, 180),
('SP11', 'L01', N'Bút bi Patin', N'BUT_BI_Pre (11).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Nhựa.</li><li>Đầu bút là hình cậu bé đang đội chiếc nón, với nhiều màu sắc tùy theo ý thích của bạn.</li><li>Thân bút có màu trắng và những đường kẻ sọc màu đen, kết hợp với những màu sắc vô cùng ngộ nghĩnh.</li><li>Nắp bút hoàn toàn như tên gọi của tên bút chính là một đôi giày Patin.</li></ul>', '2015-02-15', 25000, N'Butbi11.jpg', 50, 300, NULL, 180),
('SP12', 'L01', N'Bút bi uốn dẻo hình con vật ngộ nghĩnh', N'BUT_BI_Pre (12).jpg', N'<ul><li>Chiều dài:19cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là những con vật ngộ nghĩnh: voi, hổ, báo....</li><li>Thân bút là chỉ có một màu.</li><li>Nắp bút hoàn toàn như tên gọi của tên bút chính là những con vật ngộ nghĩnh.</li></ul>', '2015-02-15', 20000, N'Butbi12.jpg', 90, 200, NULL, 98),
('SP13', 'L01', N'Bút bi uốn dẻo hình ô', N'BUT_BI_Pre (13).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là hình chiếc ô cùng với những ngôi sao be bé.</li><li>Thân bút có một màu từ đầu bút tới nắp bút.</li></ul>', '2015-02-15', 28000, N'Butbi13.jpg', 40, 170, NULL, 38),
('SP14', 'L01', N'Bút bi uốn dẻo hình quả bóng', N'BUT_BI_Pre (14).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Cao su.</li><li>Thân bút có một màu tùy vào màu bút bạn tha hồ chọn nhé!.</li><li>Đầu bút có hình quả bóng.</li></ul>', '2015-02-15', 30000, N'Butbi14.jpg',70, 230, NULL, 59),
('SP15', 'L01', N'Bút bi uốn dẻo hình quần vợt', N'BUT_BI_Pre (15).jpg', N'<ul><li>Chiều dài:21cm.</li><li>Chất liệu:Nhựa</li><li>Đầu bút là hình quần vợt.</li><li>Thân bút chỉ có một màu.</li></ul>', '2015-02-15', 20000, N'Butbi15.jpg', 30, 100, NULL, 32),
('SP16', 'L01', N'Bút bi uốn dẻo râu ria', N'BUT_BI_Pre (16).jpg', N'<ul><li>Chiều dài:17cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là hình chú hài ngộ nghĩnh kèm theo hàm râu đen cong.</li><li>Thân bút bạn có thể bẻ cong nhiều phía mà không hề sợ bị gãy.</li></ul>', '2015-02-15', 38000, N'Butbi16.jpg', 30, 120, NULL, 33),
('SP17', 'L01', N'Bút bi The Bianconeri', N'BUT_BI_Pre (17).jpg', N'<ul><li>Chiều dài:17cm.</li><li>Chất liệu:Nhựa.</li><li>Đầu bút là chú ngựa, bạn có thể gỡ cả đầu bút ra một cách dễ dàng.</li><li>Thân bút có màu sọc vằn đen.</li></ul>', '2015-03-05', 40000, N'Butbi17.jpg', 80, 58, NULL, 84),
('SP18', 'L02', N'Hộp bút chì màu gấu xinh', N'BUT_CHI_GO_Pre (1).jpg', N'<ul><li>Kích thước: 10.5 x 3.5 cm.</li><li>Khối lượng: 35g.</li><li>Hộp gồm 12 chiếc bút chì màu 9 x 0.5 cm.</li></ul>', '2015-02-15', 520000, N'Butchi1.jpg', 30, 120, NULL, 37),
('SP19', 'L02', N'Hộp bút chì màu Floating Town', N'BUT_CHI_GO_Pre (2).jpg', N'<ul><li>Khối lượng: 35g.</li><li>Kích thước: 10.5 x 3.5 cm.</li><li>Hộp gồm 12 chiếc bút chì màu 9 x 0.5 cm.</li></ul>', '2015-02-15', 42000, N'Butchi2.jpg', 20, 130, NULL, 15),
('SP20', 'L02', N'Bút chì gỗ cú mèo gấu heo khỉ ốc sên', N'BUT_CHI_GO_Pre (3).jpg', N'<ul><li>Kích thước: 22 cm.</li><li>Bút chì gỗ cú mèo gấu heo khỉ ốc sên được làm từ loại gỗ thiên nhiên cao cấp, <br/> kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ cú mèo gấu heo khỉ ốc sên sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li> Làm từ gỗ cao cấp.</li>		<li>Trang trí hình con vật dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-15', 19000, N'Butchi3.jpg', 30, 90, NULL, 34),
('SP21', 'L02', N'Bút chì gỗ con vật', N'BUT_CHI_GO_Pre (4).jpg', N'<ul><li>Kích thước: 23cm.</li><li>Bút chì gỗ con vật được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con vật sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Chất liệu được làm từ gỗ.</li>		<li>Trang trí hình thú ngộ nghĩnh dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 24000, N'Butchi4.jpg', 39, 120, NULL, 12),
('SP22', 'L02', N'Bút chì gỗ động vật ngộ nghĩnh', N'BUT_CHI_GO_Pre (5).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ con vật được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con vật sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Chất liệu được làm từ gỗ.</li>		<li>Trang trí đầu thú dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 30000, N'Butchi5.jpg', 30, 100, NULL, 20),
('SP23', 'L02', N'Bút chì gỗ con ong', N'BUT_CHI_GO_Pre (6).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ con ong được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con ong sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình con ong dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 30000, N'Butchi6.jpg', 40, 23, NULL, 20),
('SP24', 'L02', N'Bút chì gỗ em bé', N'BUT_CHI_GO_Pre (7).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ em bé được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Chất liệu được làm từ gỗ.</li>		<li>Trang trí hình thú ngộ nghĩnh dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Có 5 mẫu như hình:		(từ trái qua phải: trắng, hồng, đỏ kẻ, xanh dương, đỏ hoa)</li></ul></li></ul>', '2015-02-16', 19000, N'Butchi7.jpg',25, 38, NULL, 26),
('SP25', 'L02', N'Bút chì gỗ Noel', N'BUT_CHI_GO_Pre (8).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ Noel được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 19000, N'Butchi8.jpg', 20, 40, NULL, 10),
('SP26', 'L02', N'Bút chì gỗ dâu tây', N'BUT_CHI_GO_Pre (9).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ dâu tây được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình dâu tây dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 24000, N'Butchi9.jpg',45, 24, NULL, 28),
('SP27', 'L02', N'Bút chì gỗ chữ số', N'BUT_CHI_GO_Pre (10).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình con số dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 22000, N'Butchi10.jpg', 22, 19, NULL, 22),
('SP28', 'L02', N'Bút chì gỗ hoa quả', N'BUT_CHI_GO_Pre (11).jpg', N'<ul><li>Kích thước: 20cm.</li><li>Bút chì gỗ hoa quả được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình hoa quả dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 21000, N'Butchi11.jpg', 12, 38, NULL, 15),
('SP29', 'L02', N'Bút chì gỗ xe cộ', N'BUT_CHI_GO_Pre (12).jpg', N'<ul><li>Kích thước: 19.5cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình xe cộ tây dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 13000, N'Butchi12.jpg', 10, 28, NULL, 5),
('SP30', 'L02', N'Bút chì gỗ nốt nhạc', N'BUT_CHI_GO_Pre (13).jpg', N'<ul><li>Kích thước: 19.5cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình nốt nhạc dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 19000, N'Butchi13.jpg', 14, 28, NULL, 5),
('SP31', 'L02', N'Bút chì gỗ thú mặt tròn dây lắc cánh quạt', N'BUT_CHI_GO_Pre (14).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 10g.</li><li>Được trang trí với thú dây lắc mặt tròn cánh quạt vô cùng độc đáo.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 26000, N'Butchi14.jpg', 12, 48, NULL, 14),
('SP32', 'L02', N'Bút chì gỗ bánh & kem', N'BUT_CHI_GO_Pre (15).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 12g</li><li>Bút chì gỗ bánh & kem được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li>		<li>Trang trí hình bánh và kem dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 24000, N'Butchi15.jpg', 14, 40, NULL, 19),
('SP33', 'L02', N'Bút chì gỗ ốc sên bướm vịt', N'BUT_CHI_GO_Pre (16).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 12g</li><li>Bút chì gỗ ốc sên bướm vịt được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul>		<li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li>		<li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li>		<li>Rất thích hợp cho công việc văn phòng và học sinh.</li>		<li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', '2015-02-16', 28000, N'Butchi16.jpg', 9, 40, NULL, 22),
('SP34', 'L03', N'Bút nước The Bianconeri', N'BUT_NUOC_Pre (1).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 17 x 5.5 cm.</li><li>Đầu bi 0.38mm mũi kim.</li><li>Trọng lượng:15g.</li></ul>', '2015-02-19', 15000, N'Butnuoc1.jpg', 30, 40, NULL, 30),
('SP35', 'L03', N'Bút bi nước The Freshness and Peace', N'BUT_NUOC_Pre (2).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.38mm mũi kim.</li><li>Trọng lượng:15g.</li><li>Vỏ nhựa mờ.</li></ul>', '2015-02-19', 16000, N'Butnuoc2.jpg', 22, 48, NULL, 30),
('SP36', 'L03', N'Bút bi kẻ caro Noble', N'BUT_NUOC_Pre (3).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.1cm.</li><li>Đầu bi 0.5mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li><li>Có 2 màu: xanh, đỏ;1 hộp gồm 12 chiếc.</li></ul>', '2015-02-19', 22000, N'Butnuoc3.jpg', 22, 60, NULL, 34),
('SP37', 'L03', N'Bút bi nước cà phê', N'BUT_NUOC_Pre (4).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.6cm.</li><li>Đầu bi 0.38mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li><li>Có 3 màu: xanh, đen, đỏ.</li></ul>', '2015-02-19', 22000, N'Butnuoc4.jpg', 34, 120, NULL, 22),
('SP38', 'L03', N'Bút bi nước đuôi kẻ caro MOSAIC', N'BUT_NUOC_Pre (5).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.6cm.</li><li>Đầu bi 0.35mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li></ul>', '2015-02-19', 12000, N'Butnuoc5.jpg', 12, 90, NULL, 44),
('SP39', 'L03', N'Bút bi nước chấm bi đen trắng', N'BUT_NUOC_Pre (6).jpg', N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 2.5cm đường kính 1.5cm màu trong suốt.</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm đường kính 0.7cm vỏ  bút bằng nhựa mờ trang trí bằng họa tiết chấm bi và kẻ.</li><li>Đuôi bút màu trắng, hình bán cầu gắn chặt với thân bút.</li></ul>', '2015-02-19', 22000, N'Butnuoc6.jpg', 32, 90, NULL, 44),
('SP40', 'L03', N'Bút bi nước ngôi sao Let''s Party Girl', N'BUT_NUOC_Pre (7).jpg', N'<ul><li>Hãng: SCM.</li><li>Có 3 mẫu: xanh lá, đen, trắng.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút dài 4.1cm đường kính 1cm đỉnh nắp hình mặt kim cương cùng màu thân bút.</li><li>Đầu bi 0.38mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 13.9cm đường kính 0.8cm, được trang trí bằng họa tiết sao và chữ tiếng Anh.</li></ul></li></ul>', '2015-02-19', 20000, N'Butnuoc7.jpg', 10, 38, NULL, 22),
('SP41', 'L03', N'Bút bi nước Bow Memories kẻ và nơ', N'BUT_NUOC_Pre (8).jpg', N'<ul><li>Hãng: SCM.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút dài 4.4cm đường kính 1cm, đầu nắp bút màu trắng thiết kế hình mặt kim cương.</li><li>Đầu bi 0.38mm mũi kim mực ra đều, đẹp, không bay màu.</li><li>Thân bút dài 14.1cm đường kính 0.8cm khi cầm bút viết rất thoải mái, thân bút có các chi tiết trang trí: kẻ, hoa văn, nơ.</li></ul></li></ul>', '2015-02-20', 22000, N'Butnuoc8.jpg', 25, 40, NULL, 22),
('SP42', 'L03', N'Bút bi nước Fine chấm bi/sao/kẻ', N'BUT_NUOC_Pre (9).jpg', N'<ul><li>Hãng: SCM.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút: dài 5.2cm, đường kính 1cm, có hoa văn cùng màu với thân bút.</li><li>Đầu bi 0.35mm, mực sử dụng chất màu carbon đen, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm, đường kính 0.8cm, được trang trí 3 loại hoa văn: kẻ, ngôi sao, chấm bi cùng hàng chữ tiếng Anh.</li><li>Đuôi bút màu trắng dạng bán cầu, gắn chặt với thân bút.</li></ul></li></ul>', '2015-02-20', 17000, N'Butnuoc9.jpg', 22, 60, NULL, 34),
('SP43', 'L03', N'Bút bi nước Classic vintage a car', N'BUT_NUOC_Pre (10).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.35mm mũi kim.</li><li>Đuôi bút màu trắng dạng bán cầu, gắn chặt với thân bút.</li></ul>', '2015-02-20', 19000, N'Butnuoc10.jpg', 33, 50, NULL, 34),
('SP44', 'L03', N'Bút bi nước hoa quả caro/chấm bi/kẻ', N'BUT_NUOC_Pre (11).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.35mm mũi kim.</li><li>Vỏ nhựa mờ.</li></ul>', '2015-02-20', 19000, N'Butnuoc11.jpg', 37, 60, NULL, 34),
('SP45', 'L03', N'Bút bi nước trái tim Love We are heart to heart', N'BUT_NUOC_Pre (12).jpg', N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 3.4cm đường kính 1cm</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 14.1cm đường kính 0.8cm vỏ bút bằng nhựa mờ trang trí bằng họa tiết trái tim.</li><li>Đuôi bút cùng màu với họa tiết trên thân bút, gắn chặt thân bút.</li></ul>', '2015-02-20', 22000, N'Butnuoc12.jpg', 37, 60, NULL, 34),
('SP46', 'L03', N'Bút bi nước hải quân', N'BUT_NUOC_Pre (13).jpg', N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 3.4cm đường kính 1cm in các biểu tượng hàng hải.</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm đường kính 0.8cm vỏ  bút bằng nhựa bóng trang trí bằng họa tiết kẻ ngang và biểu tượng hàng hải.</li><li>Đuôi bút màu trắng, hình bán cầu gắn chặt với thân bút.</li></ul>', '2015-02-20', 21000, N'Butnuoc13.jpg', 37, 65, NULL, 34),
('SP47', 'L03', N'Bút bi nước nắp nhãn Coffee tròn', N'BUT_NUOC_Pre (14).jpg', N'<ul><li>Hãng: SCM.</li><li>Có 3 mẫu: xanh lá, nâu đậm, đỏ đậm.</li><li>Mô tả chi tiết bút:<ul><li>Nắp bút dài 4.3cm đường kính 1cm, màu trong suốt, gắn mác nhựa tròn Coffee.</li><li>Đầu bi 0.38mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 13.9cm, đường kính 0.8cm, vỏ bút in họa tiết kẻ và tách cà  phê kèm dòng chữ tiếng Anh.</li><li>Đuôi bút màu trắng, dạng bán cầu, gắn chặt với thân bút.</li></ul></li></ul>', '2015-02-20', 26000, N'Butnuoc14.jpg', 37, 65, NULL, 34),
('SP48', 'L03', N'Bút bi nước Lifestyle hoa văn nền trắng', N'BUT_NUOC_Pre (15).jpg', N'<ul><li>Hãng: SCM.</li><li>Chất liệu vỏ: nhựa mờ.</li><li>Bút có 3 mẫu: xanh lá, hồng, xanh lam.</li><li>Mô tả chi tiết bút:<ul><li>Nắp bút dài 2.1cm, đường kính 1cm, màu trong suốt, nắp chặt đầu bút.</li><li>Thân bút dài 15.6cm, đường kính 0.8cm, được in hoa văn trên nền màu trắng sữa rất nhã nhặn.</li><li>Đuôi bút dài 0.6cm, đường kính 0.4cm, dạng bán cầu gắn chặt với thân bút.</li></ul></li></ul>', '2015-02-20', 18000, N'Butnuoc15.jpg', 22, 48, NULL, 45),
('SP49', 'L03', N'Bút bi nước nắp kẻ trắng', N'BUT_NUOC_Pre (16).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.8cm, đầu bi 0.38mm.</li><li>Ngòi bút dạng đầu kim.</li><li>Màu mực: xanh, đen.</li></ul>', '2015-02-20', 19000, N'Butnuoc16.jpg', 28, 50, NULL, 34),
('SP50', 'L03', N'Bút bi nước Monami', N'BUT_NUOC_Pre (17).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 16 cm..</li><li>Ngòi bút dạng đầu kim.</li><li>Màu mực: xanh, đen.</li><li>Bt1 có 6 màu, 144 chiếc(2kg)</li></ul>', '2015-02-20', 19000, N'Butnuoc17.jpg', 55, 70, NULL, 56),
('SP51', 'L04', N'Tẩy chì CAND ERASER', N'Gom_Pre (1).jpg', N'<ul><li>Khối lượng:100g.</li><li>Kích thước: 4 x 2 x 7 cm.</li></ul>', '2015-02-20', 9000, N'Gom1.jpg', 24, 70, NULL, 33),
('SP52', 'L04', N'Bộ tẩy hình tim 365 day love', N'Gom_Pre (2).jpg', N'<ul><li>Khối lượng:95g.</li><li>Kích thước: 3.3 x 3.5 cm.</li></ul>', '2015-02-20', 13000, N'Gom2.jpg', 24, 70, NULL, 30),
('SP53', 'L04', N'Tẩy chì Graphic Love Eraser', N'Gom_Pre (3).jpg', N'<ul><li>Khối lượng:70g.</li><li>Kích thước: 7 x 0.8 x 6 cm.</li></ul>', '2015-02-20', 14000, N'Gom3.jpg', 33, 50, NULL, 40),
('SP54', 'L04', N'Tẩy chì hình chữ nhật mặt gấu mèo lợn', N'Gom_Pre (4).jpg', N'<ul><li>Khối lượng:25g.</li><li>Kích thước: 5.2 x 3 x 1.2 cm.</li></ul>', '2015-02-20', 14000, N'Gom4.jpg', 33, 60, NULL, 40),
('SP55', 'L04', N'Tẩy chì Building Style', N'Gom_Pre (5).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 7 x 1.5 x 4 cm.</li><li>Tẩy chì Building Style với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li><li>Sản phẩm đa dạng về màu sắc, được thiết kế bo tròn 4 cạnh giúp bạn có thể tẩy nét chì dễ dàng, không bị gãy đầu như các loại tẩy vuông.</li></ul>', '2015-02-20', 14000, N'Gom5.jpg', 30, 70, NULL, 30),
('SP56', 'L04', N'Tẩy chì Shingle Eraser', N'Gom_Pre (6).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6 x 3.6 x 1.3 cm.</li><li>Tẩy chì Shingle Eraser với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li><li>Sản phẩm đa dạng về màu sắc, được thiết kế bo tròn 4 cạnh giúp bạn có thể tẩy nét chì dễ dàng, không bị gãy đầu như các loại tẩy vuông.</li></ul>', '2015-02-20', 7000, N'Gom6.jpg', 28, 60, NULL, 30),
('SP57', 'L04', N'Tẩy thỏ, gấu, mèo', N'Gom_Pre (7).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6.3 x 3 x 1.5cm</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', '2015-02-20', 7000, N'Gom7.jpg', 28, 60, NULL, 30),
('SP58', 'L04', N'Tẩy dài động vật Amainoo', N'Gom_Pre (8).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6.6 x 1.6cm.</li><li>Có 4 mẫu: hồng, đen, tím, nâu.</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', '2015-02-20', 12000, N'Gom8.jpg', 28, 50, NULL, 34),
('SP59', 'L04', N'Tẩy chì 4B', N'Gom_Pre (9).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 3cm x 2cm.</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', '2015-02-20', 9000, N'Gom9.jpg', 28, 50, NULL, 34),
('SP60', 'L05', N'Hộp đựng bút kẹp ảnh bò sữa mèo sư tử', N'Hop_Pre (1).jpg', N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2015-02-20', 18000, N'Hopbut1.jpg', 34, 60, NULL, 38),
('SP61', 'L05', N'Hộp đựng bút kẹp ảnh hình hoa', N'Hop_Pre (2).jpg', N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2015-02-20', 16000, N'Hopbut2.jpg', 38, 70, NULL, 38),
('SP62', 'L05', N'Hộp đựng bút kẹp ảnh voi, ếch, gấu', N'Hop_Pre (3).jpg', N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2015-02-20', 16000, N'Hopbut3.jpg', 37, 110, NULL, 38),
('SP63', 'L05', N'Hộp đựng bút Mood For Love', N'Hop_Pre (4).jpg', N'<ul><li>Khối lượng:100g.</li><li>Kích thước: 20 x 5,3 x 2,6 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2015-02-20', 22000, N'Hopbut4.jpg', 33, 80, NULL, 38),
('SP64', 'L05', N'Hộp đựng bút Vintage', N'Hop_Pre (5).jpg', N'<ul><li>Khối lượng:90g.</li><li>Kích thước: 20 x 5,3 x 2,6 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2015-02-20', 18000, N'Hopbut5.jpg', 30, 90, NULL, 38),
('SP65', 'L05', N'Hộp đựng bút nhựa hello kitty', N'Hop_Pre (6).jpg', N'<ul><li>Khối lượng:45g.</li><li>Kích thước: 18 x 4 cm.</li><li>Chất liệu: nhựa.</li></ul>', '2015-02-20', 19000, N'Hopbut6.jpg', 38, 100, NULL, 42),
('SP66', 'L05', N'Hộp đựng bút gỗ languo', N'Hop_Pre (7).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 5 x 18 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2015-02-20', 17000, N'Hopbut7.jpg', 38, 100, NULL, 42),
('SP67', 'L05', N'Hộp đựng bút da Languo', N'Hop_Pre (8).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 5 x 18 cm.</li><li>Chất liệu: gỗ.</li></ul>', '2015-02-20', 34000, N'Hopbut8.jpg',  50, 89, NULL, 58),
('SP68', 'L05', N'Hộp đựng bútbút vải thô quai đeo Hero', N'Hop_Pre (9).jpg', N'<ul><li>Khối lượng: 90g.</li><li>Kích thước: 9.5 x 18 cm.</li><li>Chất liệu: vải thô.</li></ul>', '2015-02-20', 34000, N'Hopbut9.jpg', 40, 90, NULL, 42),
('SP69', 'L05', N'Hộp đựng bút da cuộn RXZN nâu, hồng', N'Hop_Pre (10).jpg', N'<ul><li>Khối lượng: 50g.</li><li>Kích thước: 18 x 12.3 (cm)</li><li>Chất liệu: Giả da.</li></ul>', '2015-02-20', 30000, N'Hopbut10.jpg', 38, 90, NULL, 42),
('SP70', 'L05', N'Hộp đựng bút Winny', N'Hop_Pre (11).jpg', N'<ul><li>Khối lượng: 50g.</li><li>Kích thước: 20 x 1.5 x 6 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2015-02-20', 28000, N'Hopbut11.jpg', 38, 90, NULL, 48),
('SP71', 'L05', N'Hộp đựng bút Retro Pattern cỡ đại', N'Hop_Pre (12).jpg', N'<ul><li>Khối lượng: 110g.</li><li>Kích thước: 19 x 8.5 x 2.7 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2015-02-20', 25000, N'Hopbut12.jpg',  28, 90, NULL, 50),
('SP72', 'L05', N'Hộp đựng bút nhựa mặt cười', N'Hop_Pre (13).jpg', N'<ul><li>Khối lượng: 30g.</li><li>Kích thước: 2 x 5 x 17.5 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2015-02-20', 22000, N'Hopbut13.jpg', 36, 90, NULL, 60),
('SP73', 'L05', N'Hộp đựng bút Retro Pattern cỡ trung', N'Hop_Pre (14).jpg', N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 6.5 x 2 x 18 cm.</li><li>Chất liệu: kim loại.</li></ul>', '2015-02-20', 18000, N'Hopbut14.jpg', 40, 120, NULL, 60),
('SP74', 'L06', N'lịch kế hoạch để bàn heo xinh', N'Lich_Pre (1).jpg', N'<ul><li>Khối lượng: 100g.</li><li>Kích thước: 12 x 14 cm.</li><li>Số tờ: 14.</li></ul>', '2015-02-20', 54000, N'Lich1.jpg', 38, 100, NULL, 42),
('SP75', 'L06', N'lịch để bàn Time Is The Air', N'Lich_Pre (2).jpg', N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 5 x 22 x 6 cm.</li><li>Số tờ: 14.</li></ul>', '2015-02-20', 50000, N'Lich2.jpg', 38, 100, NULL, 42),
('SP76', 'L06', N'lịch trang trí để bàn Life Is Beautiful', N'Lich_Pre (3).jpg', N'<ul><li>Khối lượng: 40g.</li><li>Kích thước: 10.5 x 8.5 cm.</li></ul>', '2015-02-20', 52000, N'Lich3.jpg', 40, 90, NULL, 42),
('SP77', 'L06', N'lịch trang trí để bàn Paper Dall Mate', N'Lich_Pre (4).jpg', N'<ul><li>Khối lượng: 40g.</li><li>kích thước: 10 x 4 x 4.5 cm.</li></ul>', '2015-02-20', 62000, N'Lich4.jpg', 44, 90, NULL, 42),
('SP78', 'L06', N'lịch trang trí để bàn The Soldier', N'Lich_Pre (5).jpg', N'<ul><li>Khối lượng: 100g.</li><li>Kích thước: 10 x 4 x 4.5 cm.</li></ul>', '2015-02-20', 62000, N'Lich5.jpg', 38, 94, NULL, 42),
('SP79', 'L06', N'lịch để bàn April Story', N'Lich_Pre (6).jpg', N'<ul><li>Khối lượng: 85g.</li><li>Kích thước: 5.5 x 5.8 x 22.3 cm.</li></ul>', '2015-02-20', 56000, N'Lich6.jpg', 28, 88, NULL, 41),
('SP80', 'L06', N'lịch trang trí để bàn Nono', N'Lich_Pre (7).jpg', N'<ul><li>Khối lượng: 200g.</li><li>Kích thước: 21.2 x 15 cm.</li></ul>', '2015-02-20', 58000, N'Lich7.jpg', 34, 90, NULL, 40),
('SP81', 'L06', N'lịch trang trí để bàn', N'Lich_Pre (8).jpg', N'<ul><li>Khối lượng: 60g.</li><li>Kích thước: 14.5 x 12 cm.</li><li>Số tờ 14.</li></ul>', '2015-02-20', 55000, N'Lich8.jpg', 40, 110, NULL, 40),
('SP82', 'L06', N'lịch kế hoạch trang trí để bàn', N'Lich_Pre (9).jpg', N'<ul><li>Khối lượng: 310g.</li><li>Kích thước: 25.5 x 18 cm.</li><li>Mẫu 1.</li></ul>', '2015-02-20', 55000, N'Lich9.jpg', 32, 98, NULL, 42),
('SP83', 'L06', N'lịch trang trí để bàn Hello Geeks', N'Lich_Pre (10).jpg', N'<ul><li>Khối lượng: 60g.</li><li>Kích thước: 25.5 x 18 cm.</li><li>Số tờ: 14.</li></ul>', '2015-02-20', 54000, N'Lich10.jpg', 38, 98, NULL, 42),
('SP84', 'L06', N'lịch trang trí để bàn', N'Lich_Pre (11).jpg', N'<ul><li>Khối lượng: 210g.</li><li>Kích thước: 26x 14.5 cm.</li><li>Số tờ: 14.</li></ul>', '2015-02-20', 61000, N'Lich11.jpg', 38, 98, NULL, 42),
('SP85', 'L06', N'lịch & Port Card Sketching Life & Food', N'Lich_Pre (12).jpg', N'<ul><li>Khối lượng: 75g.</li><li>Kích thước: 15.4 x 11 cm.</li><li>Số tờ: 12.</li></ul>', '2015-02-20', 64000, N'Lich12.jpg', 36, 80, NULL, 39),
('SP86', 'L06', N'lịch kế hoạch để bàn Desk Calendar', N'Lich_Pre (13).jpg', N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 12 x 14 cm.</li><li>Số tờ: 14.</li></ul>', '2015-02-20', 60000, N'Lich13.jpg', 38, 88, NULL, 39);


-- INSERT SANPHAM --
Insert into sanpham (MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, GiaBan, GiaBanHienTai, AnhDaiDien, SoluongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua) values('SP011', 01, N'Bút bi vương miện Crown Love Magic', N'BUT_BI_Pre (1).jpg', N'BUT_BI_Pre (1).jpg', N'BUT_BI_Pre (1).jpg', N'<ul><li>Chiều dài: 20cm.</li><li>Chất liệu: Inox.Bút có 3 màu: đỏ, xanh, tím.</li><li>Ở trên đầu bút có hình vương miện màu vàng bóng kết hợp với đầu bi tròn.</li></ul>', 18000, 18000, N'Butbi1.jpg', 90, N'MINX', 1, 'But-bi-vuong-mien-Crown-Love-Magic',3)
Insert into sanpham (MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, GiaBan, GiaBanHienTai, AnhDaiDien, SoluongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua) values ('SP012', 01, N'Bút bi kẹo đầu bông bi', N'BUT_BI_Pre (2).jpg', N'BUT_BI_Pre (2).jpg', N'BUT_BI_Pre (2).jpg', N'<ul><li>Chiều dài: 20cm.</li><li>Đâu bông được làm từ len.</li><li>Chất liệu: Nhựa.</li><li>Bút đầu bông hình tròn có nhiều màu: trắng, đỏ, cam, hồng, xanh dương.</li><li>Thân bút còn có kèm theo một chiếc nơ nhỏ nhắn xinh xắn.</li></ul>', 18000, 18000, N'Butbi2.jpg', 93, N'MINX', 1, 'But-bi-keo-dau-bong-bi',4)
Insert into sanpham (MaSP, idLoai, TenSP, AnhCT1, AnhCT2, AnhCT3, MoTa, GiaBan, GiaBanHienTai, AnhDaiDien, SoluongTonKho, NhaSanXuat, idTinhTrang, Slug, SoLanMua) values ('SP013', 01, N'Bút bi uốn dẻo hình hoa mặt trời', N'BUT_BI_Pre (3).jpg', N'BUT_BI_Pre (3).jpg', N'BUT_BI_Pre (3).jpg', N'<ul><li>Chiều dài:22cm.</li><li>Đầu bút là hình hoa mặt trời với chất liệu là chất dẻo.</li><li>Thân bút còn có cả lá với nhiều màu sắc nổi bật.</li></ul>', 22000, 22000, N'Butbi3.jpg', 30, N'MINX', 1, 'But-bi-uon-deo-hinh-hoa-mat-troi',16),
('SP014', 01, N'Bút bi kem ốc quế', N'BUT_BI_Pre (4).jpg', N'BUT_BI_Pre (4).jpg', N'BUT_BI_Pre (4).jpg', N'<ul><li>Chất liệu: Nhựa.</li><li>Chiều dài:12.6cm.</li><li>Đầu bút là những cây kem ốc quế và đầu mốc cực kì dễ thương!</li></ul>', 18000, 18000, N'Butbi4.jpg', 98, N'MINX', 1, 'But-bi-kem-oc-que',12),
('SP015', 01, N'Bút bi kẹo mút', N'BUT_BI_Pre (5).jpg', N'BUT_BI_Pre (5).jpg', N'BUT_BI_Pre (5).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu đầu bông được làm từ len.</li><li>Bút đầu bông hình tròn có nhiều màu: trắng, đỏ, cam, hồng, xanh dương.</li><li>Thân bút còn có kèm theo một chiếc nơ nhỏ nhắn xinh xắn.</li></ul>', 20000, 20000, N'Butbi5.jpg', 90, N'MINX', 1, 'But-bi-keo-mut',12),
('SP016', 01, N'Bút bi uốn dẻo hình bàn tay', N'BUT_BI_Pre (6).jpg', N'BUT_BI_Pre (6).jpg', N'BUT_BI_Pre (6).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Chất dẻo</li><li>Bút bi có nhiều màu: xanh dương, cam, tím, hồng,..</li><li>Đặc biệt bút có hình bàn tay uốn dẻo và bên trong bàn tay là hình mặt người vô cùng đáng yêu.</li></ul>', 17000, 17000, N'Butbi6.jpg', 90, N'MINX', 1, 'But-bi-uon-deo-hinh-ban-tay',12),
('SP017', 01, N'Bút bi kim vương miện kim chấm bi', N'BUT_BI_Pre (7).jpg', N'BUT_BI_Pre (7).jpg', N'BUT_BI_Pre (7).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Inox.</li><li>Bút có 3 màu: đỏ, xanh, tím.</li><li>Ở trên đầu bút có hình vương miện.</li></ul>', 19000, 19000, N'Butbi7.jpg', 80, N'MINX', 1, 'But-bi-kim-vuong-mien-kim-cham-bi',12),
('SP018', 01, N'Bút bi kim vương miện kim chấm bi', N'BUT_BI_Pre (8).jpg', N'BUT_BI_Pre (8).jpg', N'BUT_BI_Pre (8).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Inox.</li><li>Bút có 3 màu: đỏ, xanh, tím.</li><li> Ở trên đầu bút có hình vương miện.</li></ul><br/>', 19000, 19000, N'Butbi8.jpg', 39, N'MINX', 1, 'But-bi-kim-vuong-mien-kim-cham-bi',12),
('SP019', 01, N'Bút bi thỏ bông', N'BUT_BI_Pre (10).jpg', N'BUT_BI_Pre (10).jpg', N'BUT_BI_Pre (10).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu đầu bông: Vải, bông gòn.</li><li>Thân bút có nhiều màu sắc kèm theo những vết chấm bi cực cá tính.</li><li>Đầu bút được đính vào đầu những chú thỏ bông với ba màu: xanh dương, hồng, tím.</li></ul>', 34000, 34000, N'Butbi10.jpg', 230, N'MINX', 1, 'But-bi-tho-bong',180),
('SP0110', 01, N'Bút bi Patin', N'BUT_BI_Pre (11).jpg', N'BUT_BI_Pre (11).jpg', N'BUT_BI_Pre (11).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Nhựa.</li><li>Đầu bút là hình cậu bé đang đội chiếc nón, với nhiều màu sắc tùy theo ý thích của bạn.</li><li>Thân bút có màu trắng và những đường kẻ sọc màu đen, kết hợp với những màu sắc vô cùng ngộ nghĩnh.</li><li>Nắp bút hoàn toàn như tên gọi của tên bút chính là một đôi giày Patin.</li></ul>', 25000, 25000, N'Butbi11.jpg', 300, N'MINX', 1, 'But-bi-Patin',180),
('SP0111', 01, N'Bút bi uốn dẻo hình con vật ngộ nghĩnh', N'BUT_BI_Pre (12).jpg', N'BUT_BI_Pre (12).jpg', N'BUT_BI_Pre (12).jpg', N'<ul><li>Chiều dài:19cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là những con vật ngộ nghĩnh: voi, hổ, báo....</li><li>Thân bút là chỉ có một màu.</li><li>Nắp bút hoàn toàn như tên gọi của tên bút chính là những con vật ngộ nghĩnh.</li></ul>', 20000, 20000, N'Butbi12.jpg', 200, N'MINX', 1, 'But-bi-uon-deo-hinh-con-vat-ngo-nghinh',98),
('SP0112', 01, N'Bút bi uốn dẻo hình ô', N'BUT_BI_Pre (13).jpg', N'BUT_BI_Pre (13).jpg', N'BUT_BI_Pre (13).jpg', N'<ul><li>Chiều dài:19.2cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là hình chiếc ô cùng với những ngôi sao be bé.</li><li>Thân bút có một màu từ đầu bút tới nắp bút.</li></ul>', 28000, 28000, N'Butbi13.jpg', 170, N'MINX', 1, 'But-bi-uon-deo-hinh-o',38),
('SP0113', 01, N'Bút bi uốn dẻo hình quả bóng', N'BUT_BI_Pre (14).jpg', N'BUT_BI_Pre (14).jpg', N'BUT_BI_Pre (14).jpg', N'<ul><li>Chiều dài:20cm.</li><li>Chất liệu: Cao su.</li><li>Thân bút có một màu tùy vào màu bút bạn tha hồ chọn nhé!.</li><li>Đầu bút có hình quả bóng.</li></ul>', 30000, 30000, N'Butbi14.jpg', 230, N'MINX', 1, 'But-bi-uon-deo-hinh-qua-bong',59),
('SP0114', 01, N'Bút bi uốn dẻo hình quần vợt', N'BUT_BI_Pre (15).jpg', N'BUT_BI_Pre (15).jpg', N'BUT_BI_Pre (15).jpg', N'<ul><li>Chiều dài:21cm.</li><li>Chất liệu:Nhựa</li><li>Đầu bút là hình quần vợt.</li><li>Thân bút chỉ có một màu.</li></ul>', 20000, 20000, N'Butbi15.jpg', 100, N'MINX', 1, 'But-bi-uon-deo-hinh-quan-vot',32),
('SP0115', 01, N'Bút bi uốn dẻo râu ria', N'BUT_BI_Pre (16).jpg', N'BUT_BI_Pre (16).jpg', N'BUT_BI_Pre (16).jpg', N'<ul><li>Chiều dài:17cm.</li><li>Chất liệu: Chất dẻo.</li><li>Đầu bút là hình chú hài ngộ nghĩnh kèm theo hàm râu đen cong.</li><li>Thân bút bạn có thể bẻ cong nhiều phía mà không hề sợ bị gãy.</li></ul>', 38000, 38000, N'Butbi16.jpg', 108, N'MINX', 1, 'But-bi-uon-deo-rau-ria',33),
('SP0116', 01, N'Bút bi The Bianconeri', N'BUT_BI_Pre (17).jpg', N'BUT_BI_Pre (17).jpg', N'BUT_BI_Pre (17).jpg', N'<ul><li>Chiều dài:17cm.</li><li>Chất liệu:Nhựa.</li><li>Đầu bút là chú ngựa, bạn có thể gỡ cả đầu bút ra một cách dễ dàng.</li><li>Thân bút có màu sọc vằn đen.</li></ul>', 40000, 40000, N'Butbi17.jpg', 50, N'MINX', 1, 'But-bi-The-Bianconeri',84),
('SP0217', 02, N'Hộp bút chì màu gấu xinh', N'BUT_CHI_GO_Pre (1).jpg', N'BUT_CHI_GO_Pre (1).jpg', N'BUT_CHI_GO_Pre (1).jpg', N'<ul><li>Kích thước: 10.5 x 3.5 cm.</li><li>Khối lượng: 35g.</li><li>Hộp gồm 12 chiếc bút chì màu 9 x 0.5 cm.</li></ul>', 520000, 520000, N'Butchi1.jpg', 120, N'MINX', 1, 'Hop-but-chi-mau-gau-xinh',37),
('SP0218', 02, N'Hộp bút chì màu Floating Town', N'BUT_CHI_GO_Pre (2).jpg', N'BUT_CHI_GO_Pre (2).jpg', N'BUT_CHI_GO_Pre (2).jpg', N'<ul><li>Khối lượng: 35g.</li><li>Kích thước: 10.5 x 3.5 cm.</li><li>Hộp gồm 12 chiếc bút chì màu 9 x 0.5 cm.</li></ul>', 42000, 42000, N'Butchi2.jpg', 130, N'MINX', 1, 'Hop-but-chi-mau-Floating-Town',15),
('SP0219', 02, N'Bút chì gỗ cú mèo gấu heo khỉ ốc sên', N'BUT_CHI_GO_Pre (3).jpg', N'BUT_CHI_GO_Pre (3).jpg', N'BUT_CHI_GO_Pre (3).jpg', N'<ul><li>Kích thước: 22 cm.</li><li>Bút chì gỗ cú mèo gấu heo khỉ ốc sên được làm từ loại gỗ thiên nhiên cao cấp, <br/> kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ cú mèo gấu heo khỉ ốc sên sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li> Làm từ gỗ cao cấp.</li> <li>Trang trí hình con vật dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 19000, 19000, N'Butchi3.jpg', 90, N'MINX', 1, 'But-chi-go-cu-meo-gau-heo-khi-oc-sen',34),
('SP0220', 02, N'Bút chì gỗ con vật', N'BUT_CHI_GO_Pre (4).jpg', N'BUT_CHI_GO_Pre (4).jpg', N'BUT_CHI_GO_Pre (4).jpg', N'<ul><li>Kích thước: 23cm.</li><li>Bút chì gỗ con vật được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con vật sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Chất liệu được làm từ gỗ.</li> <li>Trang trí hình thú ngộ nghĩnh dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 24000, 24000, N'Butchi4.jpg', 120, N'MINX', 1, 'But-chi-go-con-vat',12),
('SP0221', 02, N'Bút chì gỗ động vật ngộ nghĩnh', N'BUT_CHI_GO_Pre (5).jpg', N'BUT_CHI_GO_Pre (5).jpg', N'BUT_CHI_GO_Pre (5).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ con vật được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con vật sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Chất liệu được làm từ gỗ.</li> <li>Trang trí đầu thú dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 30000, 30000, N'Butchi5.jpg', 100, N'MINX', 1, 'But-chi-go-dong-vat-ngo-nghinh',20),
('SP0222', 02, N'Bút chì gỗ con ong', N'BUT_CHI_GO_Pre (6).jpg', N'BUT_CHI_GO_Pre (6).jpg', N'BUT_CHI_GO_Pre (6).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ con ong được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét. Bút chì gỗ con ong sử dụng lý tưởng cho việc ghi chép và mang đến nguồn ý tưởng trong hội hoạ.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình con ong dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 30000, 30000, N'Butchi6.jpg', 23, N'MINX', 1, 'But-chi-go-con-ong',20),
('SP0223', 02, N'Bút chì gỗ em bé', N'BUT_CHI_GO_Pre (7).jpg', N'BUT_CHI_GO_Pre (7).jpg', N'BUT_CHI_GO_Pre (7).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ em bé được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, màu sắc đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Chất liệu được làm từ gỗ.</li> <li>Trang trí hình thú ngộ nghĩnh dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Có 5 mẫu như hình: (từ trái qua phải: trắng, hồng, đỏ kẻ, xanh dương, đỏ hoa)</li></ul></li></ul>', 19000, 19000, N'Butchi7.jpg', 38, N'MINX', 1, 'But-chi-go-em-be',26),
('SP0224', 02, N'Bút chì gỗ Noel', N'BUT_CHI_GO_Pre (8).jpg', N'BUT_CHI_GO_Pre (8).jpg', N'BUT_CHI_GO_Pre (8).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ Noel được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 19000, 19000, N'Butchi8.jpg', 40, N'MINX', 1, 'But-chi-go-Noel',10),
('SP0225', 02, N'Bút chì gỗ dâu tây', N'BUT_CHI_GO_Pre (9).jpg', N'BUT_CHI_GO_Pre (9).jpg', N'BUT_CHI_GO_Pre (9).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Bút chì gỗ dâu tây được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình dâu tây dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 24000, 24000, N'Butchi9.jpg', 24, N'MINX', 1, 'But-chi-go-dau-tay',28),
('SP0226', 02, N'Bút chì gỗ chữ số', N'BUT_CHI_GO_Pre (10).jpg', N'BUT_CHI_GO_Pre (10).jpg', N'BUT_CHI_GO_Pre (10).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình con số dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 22000, 22000, N'Butchi10.jpg', 19, N'MINX', 1, 'But-chi-go-chu-so',22),
('SP0227', 02, N'Bút chì gỗ hoa quả', N'BUT_CHI_GO_Pre (11).jpg', N'BUT_CHI_GO_Pre (11).jpg', N'BUT_CHI_GO_Pre (11).jpg', N'<ul><li>Kích thước: 20cm.</li><li>Bút chì gỗ hoa quả được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình hoa quả dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 21000, 21000, N'Butchi11.jpg', 38, N'MINX', 1, 'But-chi-go-hoa-qua',15),
('SP0228', 02, N'Bút chì gỗ xe cộ', N'BUT_CHI_GO_Pre (12).jpg', N'BUT_CHI_GO_Pre (12).jpg', N'BUT_CHI_GO_Pre (12).jpg', N'<ul><li>Kích thước: 19.5cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình xe cộ tây dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 13000, 13000, N'Butchi12.jpg', 28, N'MINX', 1, 'But-chi-go-xe-co',5),
('SP0229', 02, N'Bút chì gỗ nốt nhạc', N'BUT_CHI_GO_Pre (13).jpg', N'BUT_CHI_GO_Pre (13).jpg', N'BUT_CHI_GO_Pre (13).jpg', N'<ul><li>Kích thước: 19.5cm.</li><li>Khối lượng: 10g.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình nốt nhạc dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 19000, 19000, N'Butchi13.jpg', 28, N'MINX', 1, 'But-chi-go-not-nhac',5),
('SP0230', 02, N'Bút chì gỗ thú mặt tròn dây lắc cánh quạt', N'BUT_CHI_GO_Pre (14).jpg', N'BUT_CHI_GO_Pre (14).jpg', N'BUT_CHI_GO_Pre (14).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 10g.</li><li>Được trang trí với thú dây lắc mặt tròn cánh quạt vô cùng độc đáo.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 26000, 26000, N'Butchi14.jpg', 46, N'MINX', 1, 'But-chi-go-thu-mat-tron-day-lac-canh-quat',14),
('SP0231', 02, N'Bút chì gỗ bánh & kem', N'BUT_CHI_GO_Pre (15).jpg', N'BUT_CHI_GO_Pre (15).jpg', N'BUT_CHI_GO_Pre (15).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 12g</li><li>Bút chì gỗ bánh & kem được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li> <li>Trang trí hình bánh và kem dễ thương.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 24000, 24000, N'Butchi15.jpg', 40, N'MINX', 1, 'But-chi-go-banh-&-kem',19),
('SP0232', 02, N'Bút chì gỗ ốc sên bướm vịt', N'BUT_CHI_GO_Pre (16).jpg', N'BUT_CHI_GO_Pre (16).jpg', N'BUT_CHI_GO_Pre (16).jpg', N'<ul><li>Kích thước: 22cm.</li><li>Khối lượng: 12g</li><li>Bút chì gỗ ốc sên bướm vịt được làm từ loại gỗ thiên nhiên cao cấp, kiểu dáng thon gọn, dễ dàng cầm nắm, hoa văn tinh tế, đẹp mắt in dọc trên thân bút, ruột chì cứng cáp, nét chì rõ ràng và sắc nét.</li><li>ĐẶC ĐIỂM NỔI BẬT:<br/><ul> <li>Làm từ gỗ cao cấp.</li><li>Kiểu dáng thon gọn, cầm vừa tay.</li> <li>Ruột chì cứng cáp được đặc chế từ đất sét đặc biệt cho nét chì thanh mảnh với độ đậm nhạt vừa phải.</li> <li>Rất thích hợp cho công việc văn phòng và học sinh.</li> <li>Không chứa các chất độc hại, đạt tiêu chuẩn an toàn.</li></ul></li></ul>', 28000, 28000, N'Butchi16.jpg', 100, N'MINX', 1, 'But-chi-go-oc-sen-buom-vit',22),
('SP0333', 03, N'Bút nước The Bianconeri', N'BUT_NUOC_Pre (1).jpg', N'BUT_NUOC_Pre (1).jpg', N'BUT_NUOC_Pre (1).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 17 x 5.5 cm.</li><li>Đầu bi 0.38mm mũi kim.</li><li>Trọng lượng:15g.</li></ul>', 15000, 15000, N'Butnuoc1.jpg', 40, N'MINX', 1, 'But-nuoc-The-Bianconeri',30),
('SP0334', 03, N'Bút bi nước The Freshness and Peace', N'BUT_NUOC_Pre (2).jpg', N'BUT_NUOC_Pre (2).jpg', N'BUT_NUOC_Pre (2).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.38mm mũi kim.</li><li>Trọng lượng:15g.</li><li>Vỏ nhựa mờ.</li></ul>', 16000, 16000, N'Butnuoc2.jpg', 48, N'MINX', 1, 'But-bi-nuoc-The-Freshness-and-Peace',30),
('SP0335', 03, N'Bút bi kẻ caro Noble', N'BUT_NUOC_Pre (3).jpg', N'BUT_NUOC_Pre (3).jpg', N'BUT_NUOC_Pre (3).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.1cm.</li><li>Đầu bi 0.5mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li><li>Có 2 màu: xanh, đỏ;1 hộp gồm 12 chiếc.</li></ul>', 22000, 22000, N'Butnuoc3.jpg', 60, N'MINX', 1, 'But-bi-ke-caro-Noble',34),
('SP0336', 03, N'Bút bi nước cà phê', N'BUT_NUOC_Pre (4).jpg', N'BUT_NUOC_Pre (4).jpg', N'BUT_NUOC_Pre (4).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.6cm.</li><li>Đầu bi 0.38mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li><li>Có 3 màu: xanh, đen, đỏ.</li></ul>', 22000, 22000, N'Butnuoc4.jpg', 120, N'MINX', 1, 'But-bi-nuoc-ca-phe',22),
('SP0337', 03, N'Bút bi nước đuôi kẻ caro MOSAIC', N'BUT_NUOC_Pre (5).jpg', N'BUT_NUOC_Pre (5).jpg', N'BUT_NUOC_Pre (5).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 15.6cm.</li><li>Đầu bi 0.35mm mũi kim, mực ra đều, không bay màu.</li><li>Trọng lượng:14g.</li></ul>', 12000, 12000, N'Butnuoc5.jpg', 90, N'MINX', 1, 'But-bi-nuoc-duoi-ke-caro-MOSAIC',44),
('SP0338', 03, N'Bút bi nước chấm bi đen trắng', N'BUT_NUOC_Pre (6).jpg', N'BUT_NUOC_Pre (6).jpg', N'BUT_NUOC_Pre (6).jpg', N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 2.5cm đường kính 1.5cm màu trong suốt.</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm đường kính 0.7cm vỏ bút bằng nhựa mờ trang trí bằng họa tiết chấm bi và kẻ.</li><li>Đuôi bút màu trắng, hình bán cầu gắn chặt với thân bút.</li></ul>', 22000, 22000, N'Butnuoc6.jpg', 90, N'MINX', 1, 'But-bi-nuoc-cham-bi-den-trang',44),
('SP0339', 03, N'Bút bi nước ngôi sao Let Party Girl', N'BUT_NUOC_Pre (7).jpg', N'BUT_NUOC_Pre (7).jpg', N'BUT_NUOC_Pre (7).jpg', N'<ul><li>Hãng: SCM.</li><li>Có 3 mẫu: xanh lá, đen, trắng.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút dài 4.1cm đường kính 1cm đỉnh nắp hình mặt kim cương cùng màu thân bút.</li><li>Đầu bi 0.38mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 13.9cm đường kính 0.8cm, được trang trí bằng họa tiết sao và chữ tiếng Anh.</li></ul></li></ul>', 20000, 20000, N'Butnuoc7.jpg', 38, N'MINX', 1, 'But-bi-nuoc-ngoi-sao-Let-Party-Girl',22),
('SP0340', 03, N'Bút bi nước Bow Memories kẻ và nơ', N'BUT_NUOC_Pre (8).jpg', N'BUT_NUOC_Pre (8).jpg', N'BUT_NUOC_Pre (8).jpg', N'<ul><li>Hãng: SCM.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút dài 4.4cm đường kính 1cm, đầu nắp bút màu trắng thiết kế hình mặt kim cương.</li><li>Đầu bi 0.38mm mũi kim mực ra đều, đẹp, không bay màu.</li><li>Thân bút dài 14.1cm đường kính 0.8cm khi cầm bút viết rất thoải mái, thân bút có các chi tiết trang trí: kẻ, hoa văn, nơ.</li></ul></li></ul>', 22000, 22000, N'Butnuoc8.jpg', 40, N'MINX', 1, 'But-bi-nuoc-Bow-Memories-ke-va-no',22),
('SP0341', 03, N'Bút bi nước Fine chấm bi/sao/kẻ', N'BUT_NUOC_Pre (9).jpg', N'BUT_NUOC_Pre (9).jpg', N'BUT_NUOC_Pre (9).jpg', N'<ul><li>Hãng: SCM.</li><li>Mô tả chi tiết bút:</li><ul><li>Nắp bút: dài 5.2cm, đường kính 1cm, có hoa văn cùng màu với thân bút.</li><li>Đầu bi 0.35mm, mực sử dụng chất màu carbon đen, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm, đường kính 0.8cm, được trang trí 3 loại hoa văn: kẻ, ngôi sao, chấm bi cùng hàng chữ tiếng Anh.</li><li>Đuôi bút màu trắng dạng bán cầu, gắn chặt với thân bút.</li></ul></li></ul>', 17000, 17000, N'Butnuoc9.jpg', 60, N'MINX', 1, 'But-bi-nuoc-Fine-cham-bi/sao/ke',34),
('SP0342', 03, N'Bút bi nước Classic vintage a car', N'BUT_NUOC_Pre (10).jpg', N'BUT_NUOC_Pre (10).jpg', N'BUT_NUOC_Pre (10).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.35mm mũi kim.</li><li>Đuôi bút màu trắng dạng bán cầu, gắn chặt với thân bút.</li></ul>', 19000, 19000, N'Butnuoc10.jpg', 50, N'MINX', 1, 'But-bi-nuoc-Classic-vintage-a-car',34),
('SP0343', 03, N'Bút bi nước hoa quả caro/chấm bi/kẻ', N'BUT_NUOC_Pre (11).jpg', N'BUT_NUOC_Pre (11).jpg', N'BUT_NUOC_Pre (11).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.6cm, đầu bi 0.35mm mũi kim.</li><li>Vỏ nhựa mờ.</li></ul>', 19000, 19000, N'Butnuoc11.jpg', 60, N'MINX', 1, 'But-bi-nuoc-hoa-qua-caro/cham-bi/ke',34),
('SP0344', 03, N'Bút bi nước trái tim Love We are heart to heart', N'BUT_NUOC_Pre (12).jpg', N'BUT_NUOC_Pre (12).jpg', N'BUT_NUOC_Pre (12).jpg', N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 3.4cm đường kính 1cm</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 14.1cm đường kính 0.8cm vỏ bút bằng nhựa mờ trang trí bằng họa tiết trái tim.</li><li>Đuôi bút cùng màu với họa tiết trên thân bút, gắn chặt thân bút.</li></ul>', 22000, 22000, N'Butnuoc12.jpg', 42, N'MINX', 1, 'But-bi-nuoc-trai-tim-Love-We-are-heart-to-heart',34),
('SP0345', 03, N'Bút bi nước hải quân', N'BUT_NUOC_Pre (13).jpg', N'BUT_NUOC_Pre (13).jpg', N'BUT_NUOC_Pre (13).jpg', N'<ul><li>Hãng: SCM.</li><li>Nắp bút dài 3.4cm đường kính 1cm in các biểu tượng hàng hải.</li><li>Đầu bi 0.35mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 15.3cm đường kính 0.8cm vỏ bút bằng nhựa bóng trang trí bằng họa tiết kẻ ngang và biểu tượng hàng hải.</li><li>Đuôi bút màu trắng, hình bán cầu gắn chặt với thân bút.</li></ul>', 21000, 21000, N'Butnuoc13.jpg', 65, N'MINX', 1, 'But-bi-nuoc-hai-quan',34),
('SP0346', 03, N'Bút bi nước nắp nhãn Coffee tròn', N'BUT_NUOC_Pre (14).jpg', N'BUT_NUOC_Pre (14).jpg', N'BUT_NUOC_Pre (14).jpg', N'<ul><li>Hãng: SCM.</li><li>Có 3 mẫu: xanh lá, nâu đậm, đỏ đậm.</li><li>Mô tả chi tiết bút:<ul><li>Nắp bút dài 4.3cm đường kính 1cm, màu trong suốt, gắn mác nhựa tròn Coffee.</li><li>Đầu bi 0.38mm, mũi kim, mực ra đều, không bay màu.</li><li>Thân bút dài 13.9cm, đường kính 0.8cm, vỏ bút in họa tiết kẻ và tách cà phê kèm dòng chữ tiếng Anh.</li><li>Đuôi bút màu trắng, dạng bán cầu, gắn chặt với thân bút.</li></ul></li></ul>', 26000, 26000, N'Butnuoc14.jpg', 65, N'MINX', 1, 'But-bi-nuoc-nap-nhan-Coffee-tron',34),
('SP0347', 03, N'Bút bi nước Lifestyle hoa văn nền trắng', N'BUT_NUOC_Pre (15).jpg', N'BUT_NUOC_Pre (15).jpg', N'BUT_NUOC_Pre (15).jpg', N'<ul><li>Hãng: SCM.</li><li>Chất liệu vỏ: nhựa mờ.</li><li>Bút có 3 mẫu: xanh lá, hồng, xanh lam.</li><li>Mô tả chi tiết bút:<ul><li>Nắp bút dài 2.1cm, đường kính 1cm, màu trong suốt, nắp chặt đầu bút.</li><li>Thân bút dài 15.6cm, đường kính 0.8cm, được in hoa văn trên nền màu trắng sữa rất nhã nhặn.</li><li>Đuôi bút dài 0.6cm, đường kính 0.4cm, dạng bán cầu gắn chặt với thân bút.</li></ul></li></ul>', 18000, 18000, N'Butnuoc15.jpg', 42, N'MINX', 1, 'But-bi-nuoc-Lifestyle-hoa-van-nen-trang',45),
('SP0348', 03, N'Bút bi nước nắp kẻ trắng', N'BUT_NUOC_Pre (16).jpg', N'BUT_NUOC_Pre (16).jpg', N'BUT_NUOC_Pre (16).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: dài 14.8cm, đầu bi 0.38mm.</li><li>Ngòi bút dạng đầu kim.</li><li>Màu mực: xanh, đen.</li></ul>', 19000, 19000, N'Butnuoc16.jpg', 40, N'MINX', 1, 'But-bi-nuoc-nap-ke-trang',34),
('SP0349', 03, N'Bút bi nước Monami', N'BUT_NUOC_Pre (17).jpg', N'BUT_NUOC_Pre (17).jpg', N'BUT_NUOC_Pre (17).jpg', N'<ul><li>Hãng: SCM.</li><li>Kích thước: 16 cm..</li><li>Ngòi bút dạng đầu kim.</li><li>Màu mực: xanh, đen.</li><li>Bt1 có 6 màu, 144 chiếc(2kg)</li></ul>', 19000, 19000, N'Butnuoc17.jpg', 70, N'MINX', 1, 'But-bi-nuoc-Monami',56),
('SP0450', 04, N'Tẩy chì CAND ERASER', N'Gom_Pre (1).jpg', N'Gom_Pre (1).jpg', N'Gom_Pre (1).jpg', N'<ul><li>Khối lượng:100g.</li><li>Kích thước: 4 x 2 x 7 cm.</li></ul>', 9000, 9000, N'Gom1.jpg', 70, N'MINX', 1, 'Tay-chi-CAND-ERASER',33),
('SP0451', 04, N'Bộ tẩy hình tim 365 day love', N'Gom_Pre (2).jpg', N'Gom_Pre (2).jpg', N'Gom_Pre (2).jpg', N'<ul><li>Khối lượng:95g.</li><li>Kích thước: 3.3 x 3.5 cm.</li></ul>', 13000, 13000, N'Gom2.jpg', 70, N'MINX', 1, 'Bo-tay-hinh-tim-365-day-love',30),
('SP0452', 04, N'Tẩy chì Graphic Love Eraser', N'Gom_Pre (3).jpg', N'Gom_Pre (3).jpg', N'Gom_Pre (3).jpg', N'<ul><li>Khối lượng:70g.</li><li>Kích thước: 7 x 0.8 x 6 cm.</li></ul>', 14000, 14000, N'Gom3.jpg', 50, N'MINX', 1, 'Tay-chi-Graphic-Love-Eraser',40),
('SP0453', 04, N'Tẩy chì hình chữ nhật mặt gấu mèo lợn', N'Gom_Pre (4).jpg', N'Gom_Pre (4).jpg', N'Gom_Pre (4).jpg', N'<ul><li>Khối lượng:25g.</li><li>Kích thước: 5.2 x 3 x 1.2 cm.</li></ul>', 14000, 14000, N'Gom4.jpg', 60, N'MINX', 1, 'Tay-chi-hinh-chu-nhat-mat-gau-meo-lon',40),
('SP0454', 04, N'Tẩy chì Building Style', N'Gom_Pre (5).jpg', N'Gom_Pre (5).jpg', N'Gom_Pre (5).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 7 x 1.5 x 4 cm.</li><li>Tẩy chì Building Style với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li><li>Sản phẩm đa dạng về màu sắc, được thiết kế bo tròn 4 cạnh giúp bạn có thể tẩy nét chì dễ dàng, không bị gãy đầu như các loại tẩy vuông.</li></ul>', 14000, 14000, N'Gom5.jpg', 70, N'MINX', 1, 'Tay-chi-Building-Style',30),
('SP0455', 04, N'Tẩy chì Shingle Eraser', N'Gom_Pre (6).jpg', N'Gom_Pre (6).jpg', N'Gom_Pre (6).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6 x 3.6 x 1.3 cm.</li><li>Tẩy chì Shingle Eraser với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li><li>Sản phẩm đa dạng về màu sắc, được thiết kế bo tròn 4 cạnh giúp bạn có thể tẩy nét chì dễ dàng, không bị gãy đầu như các loại tẩy vuông.</li></ul>', 7000, 7000, N'Gom6.jpg', 60, N'MINX', 1, 'Tay-chi-Shingle-Eraser',30),
('SP0456', 04, N'Tẩy thỏ, gấu, mèo', N'Gom_Pre (7).jpg', N'Gom_Pre (7).jpg', N'Gom_Pre (7).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6.3 x 3 x 1.5cm</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', 7000, 7000, N'Gom7.jpg', 60, N'MINX', 1, 'Tay-tho,-gau,-meo',30),
('SP0457', 04, N'Tẩy dài động vật Amainoo', N'Gom_Pre (8).jpg', N'Gom_Pre (8).jpg', N'Gom_Pre (8).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 6.6 x 1.6cm.</li><li>Có 4 mẫu: hồng, đen, tím, nâu.</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', 12000, 12000, N'Gom8.jpg', 50, N'MINX', 1, 'Tay-dai-dong-vat-Amainoo',34),
('SP0458', 04, N'Tẩy chì 4B', N'Gom_Pre (9).jpg', N'Gom_Pre (9).jpg', N'Gom_Pre (9).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 3cm x 2cm.</li><li>Tẩy chì với độ bền dẻo cao có khả năng tẩy sạch các vết chì đen mà không gây rách giấy, không làm bẩn, lem trên giấy trắng. Dễ dàng sử dụng và thuận tiện trong học tập và trong văn phòng.</li></ul>', 9000, 9000, N'Gom9.jpg', 50, N'MINX', 1, 'Tay-chi-4B',34),
('SP0559', 05, N'Hộp đựng bút kẹp ảnh bò sữa mèo sư tử', N'Hop_Pre (1).jpg', N'Hop_Pre (1).jpg', N'Hop_Pre (1).jpg', N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', 18000, 18000, N'Hopbut1.jpg', 60, N'MINX', 1, 'Hop-dung-but-kep-anh-bo-sua-meo-su-tu',38),
('SP0560', 05, N'Hộp đựng bút kẹp ảnh hình hoa', N'Hop_Pre (2).jpg', N'Hop_Pre (2).jpg', N'Hop_Pre (2).jpg', N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', 16000, 16000, N'Hopbut2.jpg', 70, N'MINX', 1, 'Hop-dung-but-kep-anh-hinh-hoa',38),
('SP0561', 05, N'Hộp đựng bút kẹp ảnh voi, ếch, gấu', N'Hop_Pre (3).jpg', N'Hop_Pre (3).jpg', N'Hop_Pre (3).jpg', N'<ul><li>Khối lượng:65g.</li><li>Kích thước: 8.5 x 6.5 x 4.8 cm.</li><li>Chất liệu: gỗ.</li></ul>', 16000, 16000, N'Hopbut3.jpg', 110, N'MINX', 1, 'Hop-dung-but-kep-anh-voi,-ech,-gau',38),
('SP0562', 05, N'Hộp đựng bút Mood For Love', N'Hop_Pre (4).jpg', N'Hop_Pre (4).jpg', N'Hop_Pre (4).jpg', N'<ul><li>Khối lượng:100g.</li><li>Kích thước: 20 x 5,3 x 2,6 cm.</li><li>Chất liệu: kim loại.</li></ul>', 22000, 22000, N'Hopbut4.jpg', 80, N'MINX', 1, 'Hop-dung-but-Mood-For-Love',38),
('SP0563', 05, N'Hộp đựng bút Vintage', N'Hop_Pre (5).jpg', N'Hop_Pre (5).jpg', N'Hop_Pre (5).jpg', N'<ul><li>Khối lượng:90g.</li><li>Kích thước: 20 x 5,3 x 2,6 cm.</li><li>Chất liệu: kim loại.</li></ul>', 18000, 18000, N'Hopbut5.jpg', 90, N'MINX', 1, 'Hop-dung-but-Vintage',38),
('SP0564', 05, N'Hộp đựng bút nhựa hello kitty', N'Hop_Pre (6).jpg', N'Hop_Pre (6).jpg', N'Hop_Pre (6).jpg', N'<ul><li>Khối lượng:45g.</li><li>Kích thước: 18 x 4 cm.</li><li>Chất liệu: nhựa.</li></ul>', 19000, 19000, N'Hopbut6.jpg', 100, N'MINX', 1, 'Hop-dung-but-nhua-hello-kitty',42),
('SP0565', 05, N'Hộp đựng bút gỗ languo', N'Hop_Pre (7).jpg', N'Hop_Pre (7).jpg', N'Hop_Pre (7).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 5 x 18 cm.</li><li>Chất liệu: gỗ.</li></ul>', 17000, 17000, N'Hopbut7.jpg', 100, N'MINX', 1, 'Hop-dung-but-go-languo',42),
('SP0566', 05, N'Hộp đựng bút da Languo', N'Hop_Pre (8).jpg', N'Hop_Pre (8).jpg', N'Hop_Pre (8).jpg', N'<ul><li>Khối lượng:60g.</li><li>Kích thước: 5 x 18 cm.</li><li>Chất liệu: gỗ.</li></ul>', 34000, 34000, N'Hopbut8.jpg', 89, N'MINX', 1, 'Hop-dung-but-da-Languo',58),
('SP0567', 05, N'Hộp đựng bútbút vải thô quai đeo Hero', N'Hop_Pre (9).jpg', N'Hop_Pre (9).jpg', N'Hop_Pre (9).jpg', N'<ul><li>Khối lượng: 90g.</li><li>Kích thước: 9.5 x 18 cm.</li><li>Chất liệu: vải thô.</li></ul>', 34000, 34000, N'Hopbut9.jpg', 90, N'MINX', 1, 'Hop-dung-butbut-vai-tho-quai-deo-Hero',42),
('SP0568', 05, N'Hộp đựng bút da cuộn RXZN nâu, hồng', N'Hop_Pre (10).jpg', N'Hop_Pre (10).jpg', N'Hop_Pre (10).jpg', N'<ul><li>Khối lượng: 50g.</li><li>Kích thước: 18 x 12.3 (cm)</li><li>Chất liệu: Giả da.</li></ul>', 30000, 30000, N'Hopbut10.jpg', 90, N'MINX', 1, 'Hop-dung-but-da-cuon-RXZN-nau,-hong',42),
('SP0569', 05, N'Hộp đựng bút Winny', N'Hop_Pre (11).jpg', N'Hop_Pre (11).jpg', N'Hop_Pre (11).jpg', N'<ul><li>Khối lượng: 50g.</li><li>Kích thước: 20 x 1.5 x 6 cm.</li><li>Chất liệu: kim loại.</li></ul>', 28000, 28000, N'Hopbut11.jpg', 80, N'MINX', 1, 'Hop-dung-but-Winny',48),
('SP0570', 05, N'Hộp đựng bút Retro Pattern cỡ đại', N'Hop_Pre (12).jpg', N'Hop_Pre (12).jpg', N'Hop_Pre (12).jpg', N'<ul><li>Khối lượng: 110g.</li><li>Kích thước: 19 x 8.5 x 2.7 cm.</li><li>Chất liệu: kim loại.</li></ul>', 25000, 25000, N'Hopbut12.jpg', 90, N'MINX', 1, 'Hop-dung-but-Retro-Pattern-co-dai',50),
('SP0571', 05, N'Hộp đựng bút nhựa mặt cười', N'Hop_Pre (13).jpg', N'Hop_Pre (13).jpg', N'Hop_Pre (13).jpg', N'<ul><li>Khối lượng: 30g.</li><li>Kích thước: 2 x 5 x 17.5 cm.</li><li>Chất liệu: kim loại.</li></ul>', 22000, 22000, N'Hopbut13.jpg', 90, N'MINX', 1, 'Hop-dung-but-nhua-mat-cuoi',60),
('SP0572', 05, N'Hộp đựng bút Retro Pattern cỡ trung', N'Hop_Pre (14).jpg', N'Hop_Pre (14).jpg', N'Hop_Pre (14).jpg', N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 6.5 x 2 x 18 cm.</li><li>Chất liệu: kim loại.</li></ul>', 18000, 18000, N'Hopbut14.jpg', 100, N'MINX', 1, 'Hop-dung-but-Retro-Pattern-co-trung',60),
('SP0673', 06, N'lịch kế hoạch để bàn heo xinh', N'Lich_Pre (1).jpg', N'Lich_Pre (1).jpg', N'Lich_Pre (1).jpg', N'<ul><li>Khối lượng: 100g.</li><li>Kích thước: 12 x 14 cm.</li><li>Số tờ: 14.</li></ul>', 54000, 54000, N'Lich1.jpg', 100, N'MINX', 1, 'lich-ke-hoach-de-ban-heo-xinh',42),
('SP0674', 06, N'lịch để bàn Time Is The Air', N'Lich_Pre (2).jpg', N'Lich_Pre (2).jpg', N'Lich_Pre (2).jpg', N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 5 x 22 x 6 cm.</li><li>Số tờ: 14.</li></ul>', 50000, 50000, N'Lich2.jpg', 100, N'MINX', 1, 'lich-de-ban-Time-Is-The-Air',42),
('SP0675', 06, N'lịch trang trí để bàn Life Is Beautiful', N'Lich_Pre (3).jpg', N'Lich_Pre (3).jpg', N'Lich_Pre (3).jpg', N'<ul><li>Khối lượng: 40g.</li><li>Kích thước: 10.5 x 8.5 cm.</li></ul>', 52000, 52000, N'Lich3.jpg', 90, N'MINX', 1, 'lich-trang-tri-de-ban-Life-Is-Beautiful',42),
('SP0676', 06, N'lịch trang trí để bàn Paper Dall Mate', N'Lich_Pre (4).jpg', N'Lich_Pre (4).jpg', N'Lich_Pre (4).jpg', N'<ul><li>Khối lượng: 40g.</li><li>kích thước: 10 x 4 x 4.5 cm.</li></ul>', 62000, 62000, N'Lich4.jpg', 90, N'MINX', 1, 'lich-trang-tri-de-ban-Paper-Dall-Mate',42),
('SP0677', 06, N'lịch trang trí để bàn The Soldier', N'Lich_Pre (5).jpg', N'Lich_Pre (5).jpg', N'Lich_Pre (5).jpg', N'<ul><li>Khối lượng: 100g.</li><li>Kích thước: 10 x 4 x 4.5 cm.</li></ul>', 62000, 62000, N'Lich5.jpg', 94, N'MINX', 1, 'lich-trang-tri-de-ban-The-Soldier',42),
('SP0678', 06, N'lịch để bàn April Story', N'Lich_Pre (6).jpg', N'Lich_Pre (6).jpg', N'Lich_Pre (6).jpg', N'<ul><li>Khối lượng: 85g.</li><li>Kích thước: 5.5 x 5.8 x 22.3 cm.</li></ul>', 56000, 56000, N'Lich6.jpg', 88, N'MINX', 1, 'lich-de-ban-April-Story',41),
('SP0679', 06, N'lịch trang trí để bàn Nono', N'Lich_Pre (7).jpg', N'Lich_Pre (7).jpg', N'Lich_Pre (7).jpg', N'<ul><li>Khối lượng: 200g.</li><li>Kích thước: 21.2 x 15 cm.</li></ul>', 58000, 58000, N'Lich7.jpg', 90, N'MINX', 1, 'lich-trang-tri-de-ban-Nono',40),
('SP0680', 06, N'lịch trang trí để bàn', N'Lich_Pre (8).jpg', N'Lich_Pre (8).jpg', N'Lich_Pre (8).jpg', N'<ul><li>Khối lượng: 60g.</li><li>Kích thước: 14.5 x 12 cm.</li><li>Số tờ 14.</li></ul>', 55000, 55000, N'Lich8.jpg', 110, N'MINX', 1, 'lich-trang-tri-de-ban',40),
('SP0681', 06, N'lịch kế hoạch trang trí để bàn', N'Lich_Pre (9).jpg', N'Lich_Pre (9).jpg', N'Lich_Pre (9).jpg', N'<ul><li>Khối lượng: 310g.</li><li>Kích thước: 25.5 x 18 cm.</li><li>Mẫu 1.</li></ul>', 55000, 55000, N'Lich9.jpg', 98, N'MINX', 1, 'lich-ke-hoach-trang-tri-de-ban',42),
('SP0682', 06, N'lịch trang trí để bàn Hello Geeks', N'Lich_Pre (10).jpg', N'Lich_Pre (10).jpg', N'Lich_Pre (10).jpg', N'<ul><li>Khối lượng: 60g.</li><li>Kích thước: 25.5 x 18 cm.</li><li>Số tờ: 14.</li></ul>', 54000, 54000, N'Lich10.jpg', 98, N'MINX', 1, 'lich-trang-tri-de-ban-Hello-Geeks',42),
('SP0683', 06, N'lịch trang trí để bàn', N'Lich_Pre (11).jpg', N'Lich_Pre (11).jpg', N'Lich_Pre (11).jpg', N'<ul><li>Khối lượng: 210g.</li><li>Kích thước: 26x 14.5 cm.</li><li>Số tờ: 14.</li></ul>', 61000, 61000, N'Lich11.jpg', 98, N'MINX', 1, 'lich-trang-tri-de-ban',42),
('SP0684', 06, N'lịch & Port Card Sketching Life & Food', N'Lich_Pre (12).jpg', N'Lich_Pre (12).jpg', N'Lich_Pre (12).jpg', N'<ul><li>Khối lượng: 75g.</li><li>Kích thước: 15.4 x 11 cm.</li><li>Số tờ: 12.</li></ul>', 64000, 64000, N'Lich12.jpg', 66, N'MINX', 1, 'lich-&-Port-Card-Sketching-Life-&-Food',39),
('SP0685', 06, N'lịch kế hoạch để bàn Desk Calendar', N'Lich_Pre (13).jpg', N'Lich_Pre (13).jpg', N'Lich_Pre (13).jpg', N'<ul><li>Khối lượng: 80g.</li><li>Kích thước: 12 x 14 cm.</li><li>Số tờ: 14.</li></ul>', 60000, 60000, N'Lich13.jpg', 92, N'MINX', 1, 'lich-ke-hoach-de-ban-Desk-Calendar',39),
('L0186', 01, N'abc', N'Jellyfish.jpg', N'Jellyfish.jpg', N'Jellyfish.jpg', N'<p>
abc</p>
', 60000, 60000, N'Tulips.jpg', 90, N'MINX', 1, 'abc',0),
('L0687', 06, N'DEMO', N'Jellyfish.jpg', N'Jellyfish.jpg', N'Jellyfish.jpg', N'<p>
DEMO</p>
', 700000, 700000, N'Jellyfish.jpg', 100, N'MINX', 1, 'DEMO',0),







--------------- TÌNH TRẠNG  -------------

create table tinhtrang(
	id int primary key NOT NULL IDENTITY(1, 1),
	TinhTrang nvarchar(255),
	TenBang varchar(200),
)
go


--- INSERT TINH TRANG ----
Insert into tinhtrang(TinhTrang, TenBang) values (N'Còn hàng', 'sanpham')
Insert into tinhtrang(TinhTrang, TenBang) values (N'Hàng lỗi', 'sanpham')
Insert into tinhtrang(TinhTrang, TenBang) values (N'Hết hàng', 'sanpham')



---------------   TÀI KHOẢN  ----------------

 CREATE TABLE taikhoan(
   id int primary key NOT NULL IDENTITY(1, 1),
   MaTaiKhoan varchar(100),
   HoTen nvarchar(150) NOT NULL DEFAULT '',
   GioiTinh tinyint,
   HinhDaiDien varchar(200),
   Username varchar(50) NOT NULL DEFAULT '',
   Pass varchar(50) NOT NULL,
   DiaChi nvarchar(255) DEFAULT NULL,
   DienThoai varchar(50) DEFAULT NULL,
   Email varchar(75) NOT NULL DEFAULT '',
   NgayDangKy SMALLDATETIME,
   NgayCapNhat SMALLDATETIME,
   idGroup int NOT NULL,
   Luong int,
   idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id),
)

INSERT INTO users (idUser, HoTen, Username, Pass, DiaChi, DienThoai, Email, NgayDangKy, idGroup) VALUES
('U01', N'Quỳnh Như', 'QuynhNhu', '123', N'An Dương Vương, Quận 5', '0987654321', 'quynhnhu@gmail.com', '2015-02-28',1),
('U02', N'Nguyễn Tí', 'nguyenti', '456', N'Lý Chính Thắng, Quận 3', '0123456789', 'nguyenti@gmail.com', '2015-02-28',2),
('U03', N'Nguyễn Tèo', 'nguyenteo', '789', N'Lý Chính Thắng, Quận 3', '0933333333', 'nguyenteo@gmail.com', '2015-02-28', 1),
('U04', N'Nguyễn Văn', 'nguyenteo123', '789', N'Lý Chính Thắng, Quận 3', '0933333334', 'nguyenteo123@gmail.com', '2015-02-28', 0),
('U05', N'Nguyễn Tèo', 'nguyenteo456', '789', N'Lý Chính Thắng, Quận 3', '0933333336', 'nguyenteo@gmail.com', '2015-02-28', 2),
('U06', N'Huỳnh Kim Xuân', 'kimxuan', '123', N'Quận 6', '0933333336', 'xuanhuynh@gmail.com', '2015-02-28', 3)

Alter TABLE users Add Luong int

update users set Luong = 30000000 where idGroup = 3
update users set Luong = 10000000 where idGroup = 1
update users set Luong = 20000000 where idGroup = 2
update users set Luong = 0 where idGroup = 0


delete from users where idUSer = 'U03'
DROP TABLE users


---------------------  KHÁCH HÀNG ---------------------------

 CREATE TABLE khachhang(
   id int primary key NOT NULL IDENTITY(1, 1),
   MaKhachHang varchar(100),
   HoTen nvarchar(150) NOT NULL DEFAULT '',
   DiaChi nvarchar(255) DEFAULT NULL,
   DienThoai varchar(50) DEFAULT NULL,
   NgayDangKy SMALLDATETIME,
   NgayCapNhat SMALLDATETIME,
   idTaiKhoan int FOREIGN KEY (idTaiKhoan) references taikhoan(id),
)


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
  Ngaygiao date NOT NULL DEFAULT '0000-00-00',
  TongTien int DEFAULT '0',
  idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id), 
)

INSERT INTO donhang(idDH, idUser, ThoiDiemDatHang, TenNguoiNhan, DTNguoiNhan, DiaChi, Ngaygiao, TongTien, DaXuLy, GhiChu) VALUES
('DH01', 'U10', '2015-11-08', N'Bích Trâm', '091256128912', N'Quận 1', '2015-11-12', 520000, 1, ''),
('DH02', 'U11', '2015-11-20', N'Thu Hồng', '012341789122', N'Quận 5', '2015-11-29', 400000, 1, ''),
('DH03', 'U14', '2015-12-01', N'Quỳnh Như', '0987653426', N'Quận 2', '2015-12-05', 390000, 2, ''),
('DH04', 'U16', '2015-12-06', N'Ngọc Huyển', '09356782918', N'Quận 6', '2015-12-14', 280000, 0 ,''),
('DH05', 'U15', '2015-12-07', N'Hoàng Thông', '098745678329', N'Quận 2', '2015-12-16', 988000, 0, '')

drop table donhang

ALTER TABLE donhang ALTER COLUMN ThoiDiemDatHang date NOT NULL DEFAULT '0000-00-00'



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


INSERT INTO donhang_chitiet(idChiTiet, idDH, idSP, TenSP, SoLuong, Gia) VALUES
('CT01', 'DH01', 'SP01', N'Bút bi vương miện Crown Love Magic', 10, 18000),
('CT02', 'DH01', 'SP10', N'Bút bi thỏ bông', 10, 34000),
('CT03', 'DH02', 'SP12', N'Bút bi uốn dẻo hình con vật ngộ nghĩnh', 5, 20000),
('CT04', 'DH02', 'SP59', N'Tẩy chì 4B', 10, 9000),
('CT05', 'DH02', 'SP28', N'Bút chì gỗ hoa quả', 10, 21000),
('CT06', 'DH03', 'SP46', N'Bút bi nước hải quân', 10, 21000),
('CT07', 'DH03', 'SP64', N'Hộp đựng bút Vintage', 10, 18000),
('CT08', 'DH04', 'SP70', N'Hộp đựng bút Winny', 10, 28000),
('CT09', 'DH05', 'SP79', N'lịch để bàng April Story', 8, 56000),
('CT10', 'DH05', 'SP05', N'Bút bi kẹo mút', 10,20000),
('CT11', 'DH05', 'SP10', N'Bút bi thỏ bông', 10, 34000)


------------------  PHIẾU NHẬP  ----------------------------

CREATE TABLE  phieunhap (
  id int primary key NOT NULL IDENTITY(1, 1),
  MaPhieuNhap varchar(100),
  NhaSanXuat nvarchar(255),
  idTaiKhoan int FOREIGN KEY (idTaiKhoan) references taikhoan(id),
  NgayXuatHoaDon SMALLDATETIME,
  TongTien int DEFAULT '0',
  idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id), 
)



------------------------  PHIẾU NHẬP CHI TIẾT  -----------------

CREATE TABLE phieunhap_chitiet(
  id int primary key NOT NULL IDENTITY(1, 1),
  MaPhieuNhapChiTiet varchar(100),
  NhaSanXuat nvarchar(255),
  idLoai int FOREIGN KEY (idLoai) references loaisp(id),
  idSanPham int FOREIGN KEY (idSanPham) references sanpham(id),
  GiaNhap int,
  SoLuongNhap int,
  ThanhTien int,
  idTinhTrang int Foreign KEY (idTinhTrang) references tinhtrang(id)
)



