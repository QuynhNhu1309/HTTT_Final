--- Cập nhật bảng phieunhap_chitiet khi sửa bảng phieunhap_chitiet ---


IF OBJECT_ID('Update_phieunhap_chittiet') IS NOT NULL
DROP PROCEDURE Update_phieunhap_chittiet;
GO
 CREATE PROCEDURE Update_phieunhap_chittiet
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

 EXEC Update_phieunhap_chittiet 33, 'DEMO', 16, 60000, 10, '2016-11-28 23:22:12.000'
