USE [HTTT_Dodunghoctap]
GO
/****** Object:  StoredProcedure [dbo].[Them_Don_Hang]    Script Date: 12/3/2016 2:17:18 PM ******/
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
