
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
