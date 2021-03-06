USE [HTTT_Dodunghoctap]
GO
/****** Object:  StoredProcedure [dbo].[Danh_Sach_Don_Hang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Danh_Sach_Don_Hang]
AS
	SELECT * FROM dbo.donhang


GO
/****** Object:  StoredProcedure [dbo].[Data_CT_khachhang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_CT_khachhang]
	@idkhachhang int
 AS
 BEGIN
	SELECT kh.HoTen as KH_HoTen, kh.MaKhachHang as KH_MaKhachHang, kh.DiaChi as KH_DiaChi, kh.DienThoai as KH_DienThoai,
	kh.NgayCapNhat as KH_NgayCapNhat, kh.NgayDangKy as KH_NgayDangKy, tk.HoTen as TK_HoTen
	FROM khachhang kh, taikhoan tk WHERE kh.id = @idkhachhang AND kh.idTaiKhoan = tk.idGroup
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_KH_Feature_NguoiTao]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_KH_Feature_NguoiTao]
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%idGroup%' and TenBang like '%taikhoan%'
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_khachhang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_khachhang]
 AS
 BEGIN
	SELECT *
	FROM khachhang
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_nhanvien]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_nhanvien]
 AS
 BEGIN
	SELECT *
	FROM taikhoan WHERE idGroup < 3 and idGroup >= 1
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_NV_Feature_Chucvu]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_NV_Feature_Chucvu]
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%idGroup%' and TenBang like '%taikhoan%'
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_NV_Feature_Gender]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_NV_Feature_Gender]
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%GioiTinh%' and TenBang like '%taikhoan%'
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_NV_Feature_TinhTrang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_NV_Feature_TinhTrang]
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%idTinhTrang%' and TenBang like '%taikhoan%'
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_PhieuNhapCT_LayIdSP]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_PhieuNhapCT_LayIdSP]
	@idPhieuNhapCT int
 AS
 BEGIN
	SELECT idSanPham FROM phieunhap_chitiet WHERE id = @idPhieuNhapCT
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_PN_PhieuNhapCT]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_PN_PhieuNhapCT]
	@idPhieuNhap int
 AS
 BEGIN
	SELECT pnct.MaPhieuNhapChiTiet as MaPhieuNhapChiTiet, pnct.NhaSanXuat as NhaSanXuat, 
	lsp.TenLoai as TenLoai, sp.TenSP as TenSP, pnct.GiaNhap as GiaNhap, pnct.SoLuongNhap as SoLuongNhap,
	ThanhTien as ThanhTien FROM phieunhap_chitiet pnct, loaisp lsp, sanpham sp
	WHERE pnct.idSanPham = sp.id AND lsp.id = pnct.idLoai AND pnct.idPN = @idPhieuNhap
 END
GO
/****** Object:  StoredProcedure [dbo].[Data_SP_Feature_LoaiSP]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Data_SP_Feature_LoaiSP]
 AS
 BEGIN
	SELECT * FROM loaisp 
 END
GO
/****** Object:  StoredProcedure [dbo].[Del_LoaiSP_SanPham]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Del_LoaiSP_SanPham]
 @idloaisp int
 AS
 BEGIN
 SET NOCOUNT ON;
 DECLARE  @count_sp int
 SET @count_sp = (SELECT count(*) FROM sanpham WHERE idLoai = @idloaisp)
 WHILE(@count_sp > 0)
 BEGIN
	DELETE FROM sanpham where idLoai = @idloaisp
	SET @count_sp = @count_sp - 1;
 END

	DELETE FROM loaisp WHERE id = @idloaisp
	SELECT @count_sp as count
 END
GO
/****** Object:  StoredProcedure [dbo].[sp_get_dsdonhang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[sp_get_dsdonhang]
	-- Add the parameters for the stored procedure here
	@idTinhTrang int = null,
	@idTaiKhoan int = null,
	@Trang int = 1,
	@SoDongMotTrang int = 20
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

	-- Calculate values
	DECLARE @Start int
	DECLARE @End int
	SET @Start = @SoDongMotTrang * (@Trang - 1) + 1
	SET @End = @SoDongMotTrang * @Trang
    -- Insert statements for procedure here
	SELECT * 
	FROM (
		SELECT dh.[id]
			,dh.[MaDonHang]
			,dh.[idTaiKhoan]
			,dh.[idKhachHang]
			,dh.[ThoiDiemDatHang]
			,dh.[TenNguoiNhan]
			,dh.[DTNguoiNhan]
			,dh.[DiaChi]
			,dh.[Ngaygiao]
			,dh.[TongTien]
			,dh.[idTinhTrang]
			,tk.[HoTen]
			,row_number() OVER (ORDER BY (SELECT 0)) AS row_num 
		FROM [dbo].[donhang] AS dh
		INNER JOIN [dbo].[taikhoan] AS tk ON dh.[idTaiKhoan] = tk.[id]
		WHERE 
			(@idTinhTrang IS NULL OR (dh.[idTinhTrang] = @idTinhTrang))
		AND	(@idTaiKhoan IS NULL OR (dh.[idTaiKhoan] = @idTaiKhoan)) 
	) 
	AS temp_table 
	WHERE row_num 
	BETWEEN @Start AND @End
END


GO
/****** Object:  StoredProcedure [dbo].[Them_Chi_Tiet_Don_Hang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Them_Chi_Tiet_Don_Hang]
	@idDonHang int,
	@idSanPham int,
	@TenSP nvarchar(255),
	@SoLuong int,
	@Gia int
As
	SET NOCOUNT ON;
	DECLARE @maDonHangChiTiet varchar(100)
	DECLARE @id int
	
	if(NOT EXISTS(SELECT * FROM dbo.donhang_chitiet))
		BEGIN
			SET @id = 1
			SET @maDonHangChiTiet =  @id
		END
	ELSE
		BEGIN
			SET @id = (SELECT TOP 1 id FROM dbo.donhang_chitiet ORDER BY id DESC)
			SET @maDonHangChiTiet =  @id +  1
		END
	SET @maDonHangChiTiet = 'DHCT' + @maDonHangChiTiet
	SELECT @maDonHangChiTiet as MaDonHangChiTiet
	INSERT INTO dbo.donhang_chitiet (idDonHang, MaDonHangChiTiet, idSanPham, TenSP, SoLuong, Gia)
	VALUES (@idDonHang,@maDonHangChiTiet,@idSanPham,@TenSP,@SoLuong,@Gia)
	DECLARE @SoLuongTonKho int
	SELECT @SoLuongTonKho = SoLuongTonKho FROM dbo.sanpham WHERE id = @idSanPham
	SET @SoLuongTonKho = @SoLuongTonKho - @SoLuong
	UPDATE dbo.sanpham SET SoLuongTonKho = @SoLuongTonKho WHERE id = @idSanPham

GO
/****** Object:  StoredProcedure [dbo].[Them_Don_Hang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[Them_Don_Hang]
	@idTaiKhoan int,
	@idKhachHang int,
	@thoiDiemDatHang smalldatetime,
	@tenNguoiNhan nvarchar(150),
	@dtNguoiNhan varchar(150),
	@diaChi nvarchar(200),
	@ngayGiao date,
	@tongTien int,
	@idTinhTrang int
as
	SET NOCOUNT ON;
	declare @maDH varchar(100)
	declare @id int

	if(NOT EXISTS(SELECT * FROM dbo.donhang_chitiet))
		BEGIN
			SET @id = 1
			SET @maDH =  @id
		END
	ELSE
		BEGIN
			SET @id = (SELECT TOP 1 id FROM dbo.donhang ORDER BY id DESC)
			SET @maDH =  @id + 1
		END

	SET @maDH = 'DH' + @maDH
	
	INSERT INTO dbo.donhang (MaDonHang,idTaiKhoan, idKhachHang, ThoiDiemDatHang, TenNguoiNhan, DTNguoiNhan, DiaChi, NgayGiao, TongTien, idTinhTrang)
	VALUES (@maDH,@idTaiKhoan,@idKhachHang,@thoiDiemDatHang,@tenNguoiNhan,@dtNguoiNhan,@diaChi,@ngayGiao,@tongTien,@idTinhTrang)

	SELECT TOP 1 id as idDonHang FROM dbo.donhang ORDER BY id DESC
	


GO
/****** Object:  StoredProcedure [dbo].[Them_Lay_Ma_KH]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROC [dbo].[Them_Lay_Ma_KH]
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
GO
/****** Object:  StoredProcedure [dbo].[Them_Lay_Ma_Loai]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROC [dbo].[Them_Lay_Ma_Loai]
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
GO
/****** Object:  StoredProcedure [dbo].[Them_Lay_Ma_SP]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROC [dbo].[Them_Lay_Ma_SP]
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
GO
/****** Object:  StoredProcedure [dbo].[Them_Lay_Ma_Tai_Khoan]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROC [dbo].[Them_Lay_Ma_Tai_Khoan]
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
GO
/****** Object:  StoredProcedure [dbo].[Them_PhieuNhap_PhieuNhapChiTiet]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Them_PhieuNhap_PhieuNhapChiTiet]
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
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_DoanhThu_BanHang_Thang]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_DoanhThu_BanHang_Thang]
	@year int,
	@month int
 AS
 BEGIN
	declare @ThanhTien float;
	declare @TongTien float;
	SET @TongTien = 0;
	declare @idDH int;

	DECLARE @cur_DH CURSOR
	SET @cur_DH = CURSOR FOR SELECT id FROM donhang WHERE idTinhTrang = 14 And MONTH(Ngaygiao) = @month and YEAR(Ngaygiao) = @year

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
				SET @ThanhTien = (SELECT TongTien FROM donhang WHERE id = @idDH);
				SET @TongTien = @TongTien + @ThanhTien;

		
	END
	SELECT @TongTien AS TongTien
		CLOSE @cur_DH
		DEALLOCATE @cur_DH
	

 END
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_DoanhThu_BanHang_Thangnt]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_DoanhThu_BanHang_Thangnt]
 AS
 BEGIN
	declare @ThanhTien int;
	
		SET @ThanhTien = (SELECT idTaiKhoan FROM donhang WHERE idTinhTrang = 14 and id = 1004);
	

	SELECT @ThanhTien AS TongTien

 END
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_DoanhThu_Day]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_DoanhThu_Day]
	@year int,
	@month int,
	@day int
 AS
 BEGIN

declare @ThanhTien float;
declare @TongTien float;
declare @NgayGiao date;
SET @TongTien = 0;
declare @idDH int;

SET @NgayGiao = (SELECT
   CAST(
      CAST(@year AS VARCHAR(4)) +
      RIGHT('0' + CAST(@month AS VARCHAR(2)), 2) +
      RIGHT('0' + CAST(@day AS VARCHAR(2)), 2) 
   AS DATETIME));

	DECLARE @cur_DH CURSOR
	SET @cur_DH = CURSOR FOR SELECT id FROM donhang WHERE idTinhTrang = 14 And MONTH(Ngaygiao) = @month
	 and YEAR(Ngaygiao) = @year and DAY(Ngaygiao) = @day

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
				SET @ThanhTien = (SELECT TongTien FROM donhang WHERE id = @idDH);
				SET @TongTien = @TongTien + @ThanhTien;
				

		
	END
	SELECT @NgayGiao AS Ngaygiao, @TongTien AS TongTien
	
	CLOSE @cur_DH
	DEALLOCATE @cur_DH

 END
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_DoanhThu_GetWeek]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_DoanhThu_GetWeek]
	@year int
 AS
 BEGIN
WITH NumWeeks
AS
(
 SELECT Number + 1 as mth,
 DATEDIFF(day,-1,DATEADD(month,((@year-1900)*12)+ Number,0))/7 AS fst,
 DATEDIFF(day,-1,DATEADD(month,((@year-1900)*12)+ Number,30))/7  AS lst
 FROM master..spt_values
 WHERE Type = 'P' and Number < 12
)
SELECT DateName(mm,DATEADD(mm,mth,-1)) as [MonthName],
lst - fst + 1 AS [NumberOfWeeks]
FROM NumWeeks;

END
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_DoanhThu_GetYear]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_DoanhThu_GetYear]
 AS
 BEGIN
 SELECT DISTINCT YEAR(Ngaygiao) AS sort_year FROM donhang 
 END
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_DoanhThu_Week]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_DoanhThu_Week]
	@year int,
	@month int,
	@first_day datetime
 AS
 BEGIN
 --declare @first_day datetime;
 declare @next_week datetime;
 declare @number_day int;
 SET @number_day = 7;

 if (@first_day = '')
 BEGIN
SET @first_day = (SELECT DATEADD(month,@month-1,DATEADD(year,@year-1900,0))); /*First day*/
END

SET @next_week = (SELECT DATEADD(day,@number_day-1, @first_day) AS OrderPayDate);

declare @ThanhTien float;
	declare @TongTien float;
	SET @TongTien = 0;
	declare @idDH int;

	DECLARE @cur_DH CURSOR

	SET @cur_DH = CURSOR FOR SELECT id FROM donhang WHERE idTinhTrang = 14 And MONTH(Ngaygiao) = @month 

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
				 IF exists(SELECT TongTien FROM donhang WHERE id = @idDH and Ngaygiao BETWEEN @first_day and 
	@next_week and YEAR(Ngaygiao) = @year)
				BEGIN
				SET @ThanhTien = (SELECT TongTien FROM donhang WHERE id = @idDH and Ngaygiao BETWEEN @first_day and 
	@next_week);
				--SELECT @idDH as idDH;
				SET @TongTien = @TongTien + @ThanhTien;
				--SELECT @first_day as first_day;
				--SELECT @next_week as next_week;
				--SELECT @TongTien AS Part;
				
				END
	--			IF not exists(SELECT TongTien FROM donhang WHERE id = @idDH and Ngaygiao BETWEEN @first_day and 
	--@next_week and YEAR(Ngaygiao) = @year) 
	--			BEGIN
	--				SET @first_day = @next_week + 1;
	--				SET @next_week = (SELECT DATEADD(day,@number_day-1, @first_day) AS OrderPayDate);
					
					
	--			END

		
	END
	SET @next_week = DATEADD(day, 1,@next_week)
	SELECT @next_week AS next_week, @TongTien AS TongTien
	
	CLOSE @cur_DH
	DEALLOCATE @cur_DH

END
GO
/****** Object:  StoredProcedure [dbo].[ThongKe_KhoHang_GetYear]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[ThongKe_KhoHang_GetYear]
 AS
 BEGIN
 SELECT DISTINCT YEAR(NgayXuatHoaDon) AS sort_year FROM phieunhap 
 END

GO
/****** Object:  StoredProcedure [dbo].[Update_phieunhap_chittiet]    Script Date: 12/13/2016 9:54:43 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
 CREATE PROCEDURE [dbo].[Update_phieunhap_chittiet]
	@idPhieuNhapCT int,
	@NhaSanXuat varchar(400),
	@idLoai int,
	@GiaNhap float,
	@SoLuongNhap int,
	@NgayCapNhat datetime
 AS
 BEGIN
declare @thanhtien float;
declare @thanhtien_old float;
declare @idPN int;
declare @tongtien float;
declare @tongtien_old float;

SET @thanhtien = @GiaNhap * @SoLuongNhap;
SET @thanhtien_old = (SELECT ThanhTien FROM phieunhap_chitiet WHERE id = @idPhieuNhapCT)
SET @idPN = (SELECT idPN FROM phieunhap_chitiet WHERE id = @idPhieuNhapCT)


	UPDATE phieunhap_chitiet SET NhaSanXuat = @NhaSanXuat, idLoai = @idLoai, GiaNhap = @GiaNhap, SoLuongNhap = @SoLuongNhap
	WHERE id = @idPhieuNhapCT

SET @tongtien_old = (SELECT TongTien FROM phieunhap WHERE id = @idPN);
SET @tongtien = @tongtien_old - @thanhtien_old + @thanhtien;

	UPDATE phieunhap SET NgayCapNhat = @NgayCapNhat, TongTien = @tongtien WHERE id = @idPN

 END
GO
