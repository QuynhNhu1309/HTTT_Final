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


--- LẤY RA idSanPham từ id bảng phieunhap_chitiet ---


IF OBJECT_ID('Data_PhieuNhapCT_LayIdSP') IS NOT NULL
DROP PROCEDURE Data_PhieuNhapCT_LayIdSP;
GO
 CREATE PROCEDURE Data_PhieuNhapCT_LayIdSP
	@idPhieuNhapCT int
 AS
 BEGIN
	SELECT idSanPham FROM phieunhap_chitiet WHERE id = @idPhieuNhapCT
 END

 EXEC Data_PhieuNhapCT_LayIdSP 30


 --- LẤY DANH SÁCH NĂM TRONG THỐNG KÊ DOANH THU ----

 IF OBJECT_ID('ThongKe_DoanhThu_GetYear') IS NOT NULL
DROP PROCEDURE ThongKe_DoanhThu_GetYear;
GO
 CREATE PROCEDURE ThongKe_DoanhThu_GetYear
 AS
 BEGIN
 SELECT DISTINCT YEAR(Ngaygiao) AS sort_year FROM donhang 
 END

 EXEC ThongKe_DoanhThu_GetYear



 ------ THỐNG KÊ DOANH THU THEO THÁNG----


 IF OBJECT_ID('ThongKe_DoanhThu_BanHang_Thang') IS NOT NULL
DROP PROCEDURE ThongKe_DoanhThu_BanHang_Thang;
GO
 CREATE PROCEDURE ThongKe_DoanhThu_BanHang_Thang
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


  EXEC ThongKe_DoanhThu_BanHang_Thang @year = 2016, @month = 12

 ---- THỐNG KÊ LẤY SỐ TUẦN ----

 IF OBJECT_ID('ThongKe_DoanhThu_GetWeek') IS NOT NULL
DROP PROCEDURE ThongKe_DoanhThu_GetWeek;
GO
 CREATE PROCEDURE ThongKe_DoanhThu_GetWeek
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


EXEC ThongKe_DoanhThu_GetWeek 2016


---- THỐNG KÊ DOANH THU TRONG THÁNG ----

 IF OBJECT_ID('ThongKe_DoanhThu_Week') IS NOT NULL
DROP PROCEDURE ThongKe_DoanhThu_Week;
GO
 CREATE PROCEDURE ThongKe_DoanhThu_Week
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
	AND YEAR(Ngaygiao)= @year

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


EXEC ThongKe_DoanhThu_Week 2016, 12, '2016-12-29'
EXEC ThongKe_DoanhThu_Week @year = 2016, @month = 12, @first_day ='2016-12-15 00:00:00.000'


SELECT DATEADD(day,6,'2016-12-29') AS OrderPayDate
FROM donhang


SELECT DATEADD(month, DATEDIFF(month, 0, 1), 0) AS StartOfMonth

SELECT DATEADD(mm, DATEDIFF(mm, 0, ) - 1, 0)

DECLARE @Month int
DECLARE @Year int

set @Month = 2
set @Year = 2004

select DATEADD(month,2-1,DATEADD(year,2004-1900,0)) /*First*/

(SELECT DATEADD(day,@number_day-1, @first_day) AS OrderPayDate);

SELECT id FROM donhang WHERE idTinhTrang = 14 And MONTH(Ngaygiao) = 12
SELECT TongTien FROM donhang WHERE Ngaygiao BETWEEN '2016-12-01' and 
	'2016-12-07' and YEAR(Ngaygiao) =2016 AND idTinhTrang = 14



	----- THỐNG KÊ DOANH THU THEO NGÀY -----
IF OBJECT_ID('ThongKe_DoanhThu_Day') IS NOT NULL
DROP PROCEDURE ThongKe_DoanhThu_Day;
GO
 CREATE PROCEDURE ThongKe_DoanhThu_Day
	@year int,
	@month int,
	@day int
 AS
 BEGIN

declare @ThanhTien float;
declare @TongTien float;
declare @NgayGiao datetime;
SET @TongTien = 0;
declare @idDH int;

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
				SET @NgayGiao = (SELECT Ngaygiao FROM donhang WHERE id = @idDH);

		
	END
	SELECT @NgayGiao AS Ngaygiao, @TongTien AS TongTien
	
	CLOSE @cur_DH
	DEALLOCATE @cur_DH

 END

 EXEC ThongKe_DoanhThu_Day 2016, 12, 14





 --- LẤY DANH SÁCH NĂM TRONG THỐNG KÊ KHO HÀNG----

 IF OBJECT_ID('ThongKe_KhoHang_GetYear') IS NOT NULL
DROP PROCEDURE ThongKe_KhoHang_GetYear;
GO
 CREATE PROCEDURE ThongKe_KhoHang_GetYear
 AS
 BEGIN
 SELECT DISTINCT YEAR(NgayXuatHoaDon) AS sort_year FROM phieunhap 
 END

EXEC ThongKe_KhoHang_GetYear



 ------ THỐNG KÊ KHO HÀNG THEO THÁNG----


 IF OBJECT_ID('ThongKe_KhoHang_Thang') IS NOT NULL
DROP PROCEDURE ThongKe_KhoHang_Thang;
GO
 CREATE PROCEDURE ThongKe_KhoHang_Thang
	@year int,
	@month int
 AS
 BEGIN
	declare @ThanhTien float;
	declare @TongTien float;
	declare @SoLuong int;
	declare @TongSoLuong int;
	declare @idCT int;
	SET @SoLuong = 0;
	SET @TongSoLuong = 0;
	SET @TongTien = 0;
	SET @TongSoLuong = 0;
	declare @idDH int;

	DECLARE @cur_DH CURSOR
	SET @cur_DH = CURSOR FOR SELECT id FROM phieunhap WHERE MONTH(NgayXuatHoaDon) = @month and YEAR(NgayXuatHoaDon) = @year

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
				
				DECLARE @cur_idCT CURSOR
				SET @cur_idCT = CURSOR FOR SELECT id FROM phieunhap_chitiet WHERE idPN = @idDH
						
					OPEN @cur_idCT 
					WHILE ( 0 = 0)
					BEGIN
						FETCH NEXT FROM @cur_idCT INTO @idCT
						IF @@FETCH_STATUS <> 0 BREAK;
							SET @SoLuong = (SELECT SoLuongNhap FROM phieunhap_chitiet WHERE id = @idCT);
							SET @TongSoLuong = @TongSoLuong + @SoLuong;
					END

		
	END
	SELECT @TongSoLuong AS TongSoLuong
	CLOSE @cur_idCT
		DEALLOCATE @cur_idCT
		CLOSE @cur_DH
		DEALLOCATE @cur_DH
	

 END



 
 IF OBJECT_ID('ThongKe_KhoHang_GetYear') IS NOT NULL
DROP PROCEDURE ThongKe_KhoHang_GetYear;
GO
 CREATE PROCEDURE ThongKe_KhoHang_GetYear
 AS
 BEGIN
 SELECT DISTINCT YEAR(NgayXuatHoaDon) AS sort_year FROM phieunhap 
 END

EXEC ThongKe_KhoHang_GetYear



 ------ THỐNG KÊ KHO HÀNG THEO THÁNG----


 IF OBJECT_ID('ThongKe_KhoHang_Thang') IS NOT NULL
DROP PROCEDURE ThongKe_KhoHang_Thang;
GO
 CREATE PROCEDURE ThongKe_KhoHang_Thang
	@year int,
	@month int
 AS
 BEGIN
	declare @ThanhTien float;
	declare @TongTien float;
	declare @SoLuong int;
	declare @TongSoLuong int;
	declare @idCT int;
	SET @SoLuong = 0;
	SET @TongSoLuong = 0;
	SET @TongTien = 0;
	SET @TongSoLuong = 0;
	declare @idDH int;

	DECLARE @cur_DH CURSOR
	SET @cur_DH = CURSOR FOR SELECT id FROM phieunhap WHERE MONTH(NgayXuatHoaDon) = @month and YEAR(NgayXuatHoaDon) = @year

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
				SET @ThanhTien = (SELECT TongTien FROM phieunhap WHERE id = @idDH);
							SET @TongTien = @TongTien + @ThanhTien;
				DECLARE @cur_idCT CURSOR
				SET @cur_idCT = CURSOR FOR SELECT id FROM phieunhap_chitiet WHERE idPN = @idDH
						
					OPEN @cur_idCT 
					WHILE ( 0 = 0)
					BEGIN
						FETCH NEXT FROM @cur_idCT INTO @idCT
						IF @@FETCH_STATUS <> 0 BREAK;
							SET @SoLuong = (SELECT SoLuongNhap FROM phieunhap_chitiet WHERE id = @idCT);
							SET @TongSoLuong = @TongSoLuong + @SoLuong;
					END

		
	END
	SELECT @TongSoLuong AS TongSoLuong, @TongTien AS TongTien
	CLOSE @cur_idCT
		DEALLOCATE @cur_idCT
		CLOSE @cur_DH
		DEALLOCATE @cur_DH
	

 END


EXEC ThongKe_KhoHang_Thang @year = 2016, @month = 11


---- THỐNG KÊ KHO HÀNG TRONG THÁNG ----

 IF OBJECT_ID('ThongKe_KhoHang_Week') IS NOT NULL
DROP PROCEDURE ThongKe_KhoHang_Week;
GO
 CREATE PROCEDURE ThongKe_KhoHang_Week
	@year int,
	@month int,
	@first_day datetime
 AS
 BEGIN
 --declare @first_day datetime;
 declare @ThanhTien float;
	declare @TongTien float;
	declare @SoLuong int;
	declare @TongSoLuong int;
	declare @idCT int;
	SET @SoLuong = 0;
	SET @TongSoLuong = 0;
	SET @TongTien = 0;
	SET @TongSoLuong = 0;
	declare @idDH int;

 declare @next_week datetime;
 declare @the_next datetime;
 declare @number_day int;
 SET @number_day = 7;

 if (@first_day = '')
 BEGIN
SET @first_day = (SELECT DATEADD(month,@month-1,DATEADD(year,@year-1900,0))); /*First day*/
END

SET @next_week = (SELECT DATEADD(day,@number_day-1, @first_day) AS OrderPayDate);


	DECLARE @cur_DH CURSOR

	SET @cur_DH = CURSOR FOR SELECT id FROM phieunhap WHERE MONTH(NgayXuatHoaDon) = @month and YEAR(NgayXuatHoaDon) = @year
	and NgayXuatHoaDon BETWEEN @first_day and 
	@next_week

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
			SET @ThanhTien = (SELECT TongTien FROM phieunhap WHERE id = @idDH);
							SET @TongTien = @TongTien + @ThanhTien;
					DECLARE @cur_idCT CURSOR
					SET @cur_idCT = CURSOR FOR SELECT id FROM phieunhap_chitiet WHERE idPN = @idDH 
					OPEN @cur_idCT 
					WHILE ( 0 = 0)
					BEGIN
						FETCH NEXT FROM @cur_idCT INTO @idCT
						IF @@FETCH_STATUS <> 0 BREAK;
							if exists(SELECT SoLuongNhap FROM phieunhap_chitiet WHERE id = @idCT)
							BEGIN
							SET @SoLuong = (SELECT SoLuongNhap FROM phieunhap_chitiet WHERE id = @idCT);
							SET @TongSoLuong = @TongSoLuong + @SoLuong;
							END
				
				END
		
	END
	SET @the_next = DATEADD(day, 1,@next_week)
	SELECT @next_week AS next_week, @TongSoLuong AS TongSoLuong, @TongTien AS TongTien, @first_day as first_day, @the_next as the_next
	
	
	
	IF CURSOR_STATUS('global','@cur_idCT')>=-1
BEGIN
DEALLOCATE @cur_idCT
END
	CLOSE @cur_DH
	DEALLOCATE @cur_DH

END


EXEC ThongKe_KhoHang_Week 2016, 12, '2016-12-07 00:00:00.000'
EXEC ThongKe_KhoHang_Week @year = 2016, @month = 12, @first_day =''



----- THỐNG KÊ kHO HÀNG THEO NGÀY -----
IF OBJECT_ID('ThongKe_KhoHang_Day') IS NOT NULL
DROP PROCEDURE ThongKe_KhoHang_Day;
GO
 CREATE PROCEDURE ThongKe_KhoHang_Day
	@year int,
	@month int,
	@day int
 AS
 BEGIN
 declare @ThanhTien float;
	declare @TongTien float;
	declare @SoLuong int;
	declare @TongSoLuong int;
	declare @idCT int;
	SET @SoLuong = 0;
	SET @TongSoLuong = 0;
	SET @TongTien = 0;
	SET @TongSoLuong = 0;
	declare @idDH int;
	declare @NgayXuatHoaDon varchar(100);

	DECLARE @cur_DH CURSOR

	SET @cur_DH = CURSOR FOR SELECT id FROM phieunhap WHERE MONTH(NgayXuatHoaDon) = @month and YEAR(NgayXuatHoaDon) = @year
	and DAY(NgayXuatHoaDon) = @day 

	OPEN @cur_DH
	WHILE ( 0 = 0 )
	BEGIN
		FETCH NEXT FROM @cur_DH INTO @idDH
			IF @@FETCH_STATUS <> 0 BREAK;
				SET @ThanhTien = (SELECT TongTien FROM phieunhap WHERE id = @idDH);
							SET @TongTien = @TongTien + @ThanhTien;
					DECLARE @cur_idCT CURSOR
					SET @cur_idCT = CURSOR FOR SELECT id FROM phieunhap_chitiet WHERE idPN = @idDH 
					OPEN @cur_idCT 
					WHILE ( 0 = 0)
					BEGIN
						FETCH NEXT FROM @cur_idCT INTO @idCT
						IF @@FETCH_STATUS <> 0 BREAK;
							if exists(SELECT SoLuongNhap FROM phieunhap_chitiet WHERE id = @idCT)
							BEGIN
							SET @SoLuong = (SELECT SoLuongNhap FROM phieunhap_chitiet WHERE id = @idCT);
							SET @TongSoLuong = @TongSoLuong + @SoLuong;
							
							END
				
				END
				
		
	END
	SET @NgayXuatHoaDon = CONCAT(CAST(@year AS char),'-', CAST(@month as char), '-', CAST(@day as char));
	SELECT @NgayXuatHoaDon AS NgayXuatHoaDon, @TongSoLuong AS TongSoLuong, @TongTien AS TongTien

	IF CURSOR_STATUS('global','@cur_idCT')>=-1
	BEGIN
	DEALLOCATE @cur_idCT
	END
	CLOSE @cur_DH
	DEALLOCATE @cur_DH


 END

 EXEC ThongKe_KhoHang_Day 2016, 12, 14
















