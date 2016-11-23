-- Lấy danh sách khách hàng ---
 CREATE PROCEDURE Data_khachhang
 AS
 BEGIN
	SELECT *
	FROM khachhang
 END

EXEC Data_khachhang



--- LẤY THÔNG TIN CHI TIẾT KHÁCH HÀNG
DROP PROCEDURE Data_CT_khachhang
 CREATE PROCEDURE Data_CT_khachhang
	@idkhachhang int
 AS
 BEGIN
	SELECT kh.HoTen as KH_HoTen, kh.MaKhachHang as KH_MaKhachHang, kh.DiaChi as KH_DiaChi, kh.DienThoai as KH_DienThoai,
	kh.NgayCapNhat as KH_NgayCapNhat, kh.NgayDangKy as KH_NgayDangKy, tk.HoTen as TK_HoTen
	FROM khachhang kh, taikhoan tk WHERE kh.id = @idkhachhang AND kh.idTaiKhoan = tk.idGroup
 END

EXEC Data_CT_khachhang 1



----- LẤY DANH SÁCH NHÂN VIÊN ----
DROP PROCEDURE Data_nhanvien
 CREATE PROCEDURE Data_nhanvien
 AS
 BEGIN
	SELECT *
	FROM taikhoan WHERE idGroup < 3 and idGroup >= 1
 END

EXEC Data_nhanvien