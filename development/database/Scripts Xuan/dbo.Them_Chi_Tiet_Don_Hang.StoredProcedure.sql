USE [HTTT_Dodunghoctap]
GO
/****** Object:  StoredProcedure [dbo].[Them_Chi_Tiet_Don_Hang]    Script Date: 12/3/2016 2:17:18 PM ******/
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
