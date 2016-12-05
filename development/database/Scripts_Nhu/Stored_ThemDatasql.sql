
---- TẠO MÃ TÀI KHOẢN NHÂN VIÊN -----

DROP PROC Them_Lay_Ma_Tai_Khoan

CREATE PROC Them_Lay_Ma_Tai_Khoan
AS
SET NOCOUNT ON;
declare @stt int;
	declare @idUser varchar(100);
	if(not exists(select * from taikhoan))
		begin
		set @stt = 1;
		set @idUser = 'U0' + CAST(@stt as varchar(100));
		
		select @idUser as MaTaiKhoan;
		end
	else
		begin
		set @idUser = (select MAX(MaTaiKhoan) from taikhoan)
		set @idUser = cast(SUBSTRING(@idUser, 2 ,4) as int)
		set @stt = @idUser;
		set @stt = @stt + 1;
		
			if(@stt < 10)
				begin 
				set @idUser = 'U0' + CAST(@stt as varchar(100))
				select @idUser as MaTaiKhoan;
				end
			else
				begin 
				set @idUser = 'U' + CAST(@stt as varchar(100));
				select @idUser as MaTaiKhoan;
				end
	end

	select * from taikhoan

	




CREATE PROC Them_Lay_Ma_Tai_Khoan
@id int output
AS
select @id = id from taikhoan

CREATE PROC Them_Lay_Ma_Tai_Khoan
AS
select id from taikhoan


declare @id int;
EXEC Them_Lay_Ma_Tai_Khoan @id output;
select @id;



---  TẠO MÃ LOẠI -----


DROP PROC Them_Lay_Ma_Loai

CREATE PROC Them_Lay_Ma_Loai
AS
SET NOCOUNT ON;
declare @stt int;
	declare @MaLoai varchar(100);
	if(not exists(select * from loaisp))
		begin
		set @stt = 1;
		set @MaLoai = 'L0' + CAST(@stt as varchar(100));
		
		select @MaLoai as MaLoai;
		end
	else
		begin
		set @MaLoai = (select MAX(MaLoai) from loaisp)
		set @stt = cast(SUBSTRING(@MaLoai, 2 ,4) as int);
		set @stt = @stt + 1;
		
			if(@stt < 10)
				begin 
				set @MaLoai = 'L0' + CAST(@stt as varchar(100))
				select @MaLoai as MaLoai;
				end
			else
				begin 
				set @MaLoai = 'L' + CAST(@stt as varchar(100));
				select @MaLoai as MaLoai;
				end
	end

EXEC Them_Lay_Ma_Loai


---  TẠO MÃ SẢN PHẨM -----


DROP PROC Them_Lay_Ma_SP
CREATE PROC Them_Lay_Ma_SP
AS
SET NOCOUNT ON;
declare @stt int;
	declare @MaSP varchar(100);
	if(not exists(select * from sanpham))
		begin
		set @stt = 1;
		set @MaSP = 'SP0000' + CAST(@stt as varchar(100));
		
		select @MaSP as MaSP;
		end
	else
		begin
		set @MaSP = (select TOP 1 MaSP from sanpham ORDER BY id DESC)
		set @stt = cast(SUBSTRING(@MaSP, 3, 7) as int);
		set @stt = @stt + 1;
			if(@stt < 10)
				begin 
				set @MaSP = 'SP0000' + CAST(@stt as varchar(100))
				select @MaSP as MaSP;
				end
			else if(@stt < 100 and @stt >= 10)
				begin 
				set @MaSP = 'SP000' + CAST(@stt as varchar(100));
				select @MaSP as MaSP;
				end
			else if(@stt < 1000 and @stt >= 100)
				begin 
				set @MaSP = 'SP00' + CAST(@stt as varchar(100));
				select @MaSP as MaSP;
				end
			else if(@stt < 10000 and @stt >= 1000)
				begin 
				set @MaSP = 'SP0' + CAST(@stt as varchar(100));
				select @MaSP as MaSP;
				end
	end

EXEC Them_Lay_Ma_SP



----- TẠO MÃ KHÁCH HÀNG -----


DROP PROC Them_Lay_Ma_KH
CREATE PROC Them_Lay_Ma_KH
AS
SET NOCOUNT ON;
declare @stt int;
	declare @MaKH varchar(100);
	if(not exists(select * from khachhang))
		begin
		set @stt = 1;
		set @MaKH = 'KH0000' + CAST(@stt as varchar(100));
		
		select @MaKH as MaKhachHang;
		end
	else
		begin
		set @MaKH = (select TOP 1 MaKhachHang from khachhang ORDER BY id DESC)
		set @stt = cast(SUBSTRING(@MaKH, 3, 7) as int);
		set @stt = @stt + 1;
			if(@stt < 10)
				begin 
				set @MaKH = 'KH0000' + CAST(@stt as varchar(100))
				select @MaKH as MaKhachHang;
				end
			else if(@stt < 100 and @stt >= 10)
				begin 
				set @MaKH = 'KH000' + CAST(@stt as varchar(100));
				select @MaKH as MaKhachHang;
				end
			else if(@stt < 1000 and @stt >= 100)
				begin 
				set @MaKH = 'KH00' + CAST(@stt as varchar(100));
				select @MaKH as MaKhachHang;
				end
			else if(@stt < 10000 and @stt >= 1000)
				begin 
				set @MaKH = 'KH0' + CAST(@stt as varchar(100));
				select @MaKH as MaKhachHang;
				end
	end

EXEC Them_Lay_Ma_KH


ALTER TABLE khachhang DROP column idTaiKhoan


----- THÊM SẢN PHẨM TỪ LARAVEL SAU ĐÓ THÊM VÀO BẢNG PHIẾU NHẬP VÀ PHIẾU NHẬP CHI TIẾT -----

IF OBJECT_ID('Them_PhieuNhap_PhieuNhapChiTiet') IS NOT NULL
DROP PROCEDURE Them_PhieuNhap_PhieuNhapChiTiet;
GO
 CREATE PROCEDURE Them_PhieuNhap_PhieuNhapChiTiet
	@id_PhieuNhap int,
	@idTaiKhoan int,
	@NgayXuatHoaDon datetime

 AS
 BEGIN
SET NOCOUNT ON;
declare @tongtien float;
declare @tongtien_phieunhap_existed float;
declare  @idSanPham int;
declare  @idLoai int;
declare  @GiaNhap float;
declare  @SoLuongNhap int;
declare  @NhaSanXuat varchar(300);

SET @idSanPham = (SELECT TOP 1 id FROM sanpham ORDER BY id DESC);

SET @idLoai = (SELECT TOP 1 idLoai FROM sanpham ORDER BY id DESC);

SET @GiaNhap = (SELECT TOP 1 GiaNhap FROM sanpham ORDER BY id DESC);

SET @SoLuongNhap = (SELECT TOP 1 SoLuongTonKho FROM sanpham ORDER BY id DESC);

SET @NhaSanXuat = (SELECT TOP 1 NhaSanXuat FROM sanpham ORDER BY id DESC );

SET @tongtien = @GiaNhap * @SoLuongNhap; 



declare @MaPNCT varchar(200);
declare @stt_pnct int;
	IF(@id_PhieuNhap = -1)
	BEGIN
	declare @MaPN varchar(100);
	declare @stt int;
	
	if(not exists(select * from phieunhap))
		begin
		set @stt = 1;
		set @MaPN = 'PN0000' + CAST(@stt as varchar(100));
		
		select @MaPN as MaPhieuNhap;
		end
	else
		begin
		set @MaPN = (select TOP 1 MaPhieuNhap from phieunhap ORDER BY id DESC)
		set @stt = cast(SUBSTRING(@MaPN, 3, 7) as int);
		set @stt = @stt + 1;
			if(@stt < 10)
				begin 
				set @MaPN = 'PN0000' + CAST(@stt as varchar(100))
				select @MaPN as MaPhieuNhap;
				end
			else if(@stt < 100 and @stt >= 10)
				begin 
				set @MaPN = 'PN000' + CAST(@stt as varchar(100));
				select @MaPN as MaPhieuNhap;
				end
			else if(@stt < 1000 and @stt >= 100)
				begin 
				set @MaPN = 'PN00' + CAST(@stt as varchar(100));
				select @MaPN as MaPhieuNhap;
				end
			else if(@stt < 10000 and @stt >= 1000)
				begin 
				set @MaPN = 'PN0' + CAST(@stt as varchar(100));
				select @MaPN as MaPhieuNhap;
				end
		end
	
		INSERT INTO phieunhap(MaPhieuNhap, idTaiKhoan, TongTien, NgayXuatHoaDon, NgayCapNhat) 
		VALUES(@MaPN, @idTaiKhoan, @tongtien, @NgayXuatHoaDon, @NgayXuatHoaDon)

		SET @id_PhieuNhap = (SELECT TOP 1 id FROM phieunhap ORDER BY id DESC);

	END
	
	ELSE IF(@id_PhieuNhap != -1)
	BEGIN
		SET @tongtien_phieunhap_existed = (SELECT TongTien FROM phieunhap WHERE id = @id_PhieuNhap);
		SET @tongtien_phieunhap_existed = @tongtien_phieunhap_existed + @tongtien;
		UPDATE phieunhap SET idTaiKhoan = @idTaiKhoan, NgayCapNhat = @NgayXuatHoaDon, TongTien = @tongtien_phieunhap_existed
		WHERE id = @id_PhieuNhap;

	END


	if(not exists(select * from phieunhap_chitiet))
		begin
		set @stt_pnct = 1;
		set @MaPNCT = 'PNCT0000' + CAST(@stt as varchar(100));
		
		select @MaPNCT as MaPhieuNhapChiTiet;
		end
	else
		begin
		set @MaPNCT = (select TOP 1 MaPhieuNhapChiTiet from phieunhap_chitiet ORDER BY id DESC)
		set @stt_pnct = cast(SUBSTRING(@MaPNCT, 5, 7) as int);
		set @stt_pnct = @stt_pnct + 1;
			if(@stt_pnct < 10)
				begin 
				set @MaPNCT = 'PNCT0000' + CAST(@stt_pnct as varchar(100))
				select @MaPNCT as MaPhieuNhapChiTiet;
				end
			else if(@stt_pnct < 100 and @stt_pnct >= 10)
				begin 
				set @MaPNCT = 'PNCT000' + CAST(@stt_pnct as varchar(100));
				select @MaPNCT as MaPhieuNhapChiTiet;
				end
			else if(@stt_pnct < 1000 and @stt_pnct >= 100)
				begin 
				set @MaPNCT = 'PNCT00' + CAST(@stt_pnct as varchar(100));
				select @MaPNCT as MaPhieuNhapChiTiet;
				end
			else if(@stt_pnct < 10000 and @stt_pnct >= 1000)
				begin 
				set @MaPNCT = 'PNCT0' + CAST(@stt_pnct as varchar(100));
				select @MaPNCT as MaPhieuNhapChiTiet;
				end
		end
	

	INSERT INTO phieunhap_chitiet (MaPhieuNhapChiTiet, NhaSanXuat, idLoai, idSanPham, GiaNhap, SoLuongNhap, ThanhTien, idPN)
	VALUES (@MaPNCT, @NhaSanXuat, @idLoai, @idSanPham, @GiaNhap, @SoLuongNhap, @tongtien, @id_PhieuNhap)

 END

 EXEC Them_PhieuNhap_PhieuNhapChiTiet @id_PhieuNhap = -1,
	@idTaiKhoan = 9,
	@NgayXuatHoaDon ='1955-12-13 12:43:00'

	EXEC Them_PhieuNhap_PhieuNhapChiTiet @id_PhieuNhap = -1, @idTaiKhoan = 3,
@NgayXuatHoaDon = "2016-11-28 15:27:21"

 EXEC Them_PhieuNhap_PhieuNhapChiTiet @id_PhieuNhap = -1, @idTaiKhoan = 3,
@NgayXuatHoaDon = '2016-11-28 15:28:51'







