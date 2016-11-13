USE [HTTT_Dodunghoctap]
GO
/****** Object:  StoredProcedure [dbo].[sp_get_dsdonhang]    Script Date: 11/14/2016 12:29:31 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		Xuan Huynh
-- Create date: 08-11-2016
-- Description:	None
-- =============================================
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
