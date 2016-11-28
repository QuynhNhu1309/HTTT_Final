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



----- LẤY RA NHỮNG ĐẶC ĐIỂM CẦN SORT TRONG BẢNG NHÂN VIÊN ----

IF OBJECT_ID('Data_NV_Feature_Gender') IS NOT NULL
DROP PROCEDURE Data_NV_Feature_Gender;
GO
 CREATE PROCEDURE Data_NV_Feature_Gender
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%GioiTinh%' and TenBang like '%taikhoan%'
 END

 EXEC Data_NV_Feature_Gender


 IF OBJECT_ID('Data_NV_Feature_Chucvu') IS NOT NULL
DROP PROCEDURE Data_NV_Feature_Chucvu;
GO
 CREATE PROCEDURE Data_NV_Feature_Chucvu
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%idGroup%' and TenBang like '%taikhoan%'
 END

 EXEC Data_NV_Feature_Chucvu


 IF OBJECT_ID('Data_NV_Feature_TinhTrang') IS NOT NULL
DROP PROCEDURE Data_NV_Feature_TinhTrang;
GO
 CREATE PROCEDURE Data_NV_Feature_TinhTrang
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%idTinhTrang%' and TenBang like '%taikhoan%'
 END

 EXEC Data_NV_Feature_TinhTrang

----- LẤY RA NHỮNG ĐẶC ĐIỂM CẦN SORT TRONG BẢNG KHÁCH HÀNG ----

IF OBJECT_ID('Data_KH_Feature_NguoiTao') IS NOT NULL
DROP PROCEDURE Data_KH_Feature_NguoiTao;
GO
 CREATE PROCEDURE Data_KH_Feature_NguoiTao
 AS
 BEGIN
	SELECT * FROM tinhtrang WHERE ThuocTinh like '%idGroup%' and TenBang like '%taikhoan%'
 END

 EXEC Data_KH_Feature_NguoiTao


 --- LẤY RA DANH SÁCH LOẠI SẢN PHẨM ĐỂ SORT CHO BẢNG SẢN PHẨM ----

 IF OBJECT_ID('Data_SP_Feature_LoaiSP') IS NOT NULL
DROP PROCEDURE Data_SP_Feature_LoaiSP;
GO
 CREATE PROCEDURE Data_SP_Feature_LoaiSP
 AS
 BEGIN
	SELECT * FROM loaisp 
 END

 EXEC Data_SP_Feature_LoaiSP



 ---- LẤY RA DANH SÁCH PHIẾU NHẬP CHI TIẾT -----

IF OBJECT_ID('Data_PN_PhieuNhapCT') IS NOT NULL
DROP PROCEDURE Data_PN_PhieuNhapCT;
GO
 CREATE PROCEDURE Data_PN_PhieuNhapCT
	@idPhieuNhap int
 AS
 BEGIN
	SELECT pnct.MaPhieuNhapChiTiet as MaPhieuNhapChiTiet, pnct.NhaSanXuat as NhaSanXuat, 
	lsp.TenLoai as TenLoai, sp.TenSP as TenSP, pnct.GiaNhap as GiaNhap,
	 pnct.SoLuongNhap as SoLuongNhap,
	ThanhTien as ThanhTien FROM phieunhap_chitiet pnct, loaisp lsp, sanpham sp
	WHERE pnct.idSanPham = sp.id AND lsp.id = pnct.idLoai AND pnct.idPN = @idPhieuNhap
 END

 EXEC Data_PN_PhieuNhapCT 19




