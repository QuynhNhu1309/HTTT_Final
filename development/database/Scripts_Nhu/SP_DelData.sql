-- Xóa loại sản phẩm, đồng thời xóa sản phẩm ---

DROP PROCEDURE Del_LoaiSP_SanPham
 CREATE PROCEDURE Del_LoaiSP_SanPham
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

EXEC Del_LoaiSP_SanPham 10


SELECT count(*) FROM sanpham WHERE idLoai = 10