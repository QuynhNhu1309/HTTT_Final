<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('dangnhap', 'admin\DangNhapController@getDangNhap')->name('getDangNhap');
Route::post('dangnhap', 'admin\DangNhapController@postDangNhap')->name('postDangNhap');

Route::get('dangxuat','admin\DangNhapController@getDangXuat')->name('getDangXuat');

Route::get('dangky','admin\DangKyController@getDangKy')->name('getDangKy');
Route::post('dangky','admin\DangKyController@postDangKy')->name('postDangKy');

Route::group(['prefix'=>'admin','middleware'=>'adminDangNhap_Middleware'], function(){
    //admin/theloai/danhsach
    Route::group(['prefix'=>'loaisanpham'], function(){
        Route::get('danhsach', 'admin\LoaiSanPhamController@getDanhSach')->name('getLoaiSPList');
        Route::get('xoa/{id}','admin\LoaiSanPhamController@getXoa')->name('getLoaiSPXoa')->where('id','[0-9]+');
        Route::get('sua/{id}', 'admin\LoaiSanPhamController@getSua')->name('getLSPSua')->where('id','[0-9]+');
        Route::post('sua/{id}', 'admin\LoaiSanPhamController@postSua')->name('postLSPSua')->where('id','[0-9]+');
        Route::get('them', 'admin\LoaiSanPhamController@getThem')->name('getLSPThem');
        Route::post('them', 'admin\LoaiSanPhamController@postThem')->name('postLSPThem');

    });

    Route::group(['prefix'=>'sanpham'], function(){
        Route::get('danhsach','admin\SanphamController@getDanhSach')->name('getSPList');
        Route::get('xoa/{id}','admin\SanphamController@getXoa')->name('getSpXoa')->where('id','[0-9]+');
        Route::get('sua/{id}','admin\SanphamController@getSua')->name('getSpSua')->where('id','[0-9]+');
        Route::post('sua/{id}','admin\SanphamController@postSua')->name('postSpSua')->where('id','[0-9]+');
        Route::get('them','admin\SanphamController@getThem')->name('getSpThem');
        Route::post('them','admin\SanphamController@postThem')->name('postSpThem');

    });

    Route::group(['prefix'=>'nhanvien'], function(){
        Route::get('danhsach','admin\NhanVienController@getDanhSach')->name('danh_sach_nhan_vien');

        Route::get('sua/{id}','admin\NhanVienController@getSua')->name('get_sua_nhanvien')->where('id','[0-9]+');

        Route::get('an/{id}','admin\NhanVienController@getSua_An')->name('get_nhan_vien_an')->where('id','[0-9]+');
 
        Route::get('hien/{id}','admin\NhanVienController@getSua_Hien')->name('get_nhan_vien_hien')->where('id','[0-9]+');

        Route::post('sua/{id}','admin\NhanVienController@postSua')->name('post_sua_nhanvien')->where('id','[0-9]+');

        Route::get('them','admin\NhanVienController@getThem')->name('get_nhan_vien_them');

        Route::post('them','admin\NhanVienController@postThem')->name('post_nhan_vien_them');

    });

    Route::group(['prefix'=>'khachhang'], function(){
        Route::get('danhsach','admin\KhachHangController@getDanhSach')->name('danh_sach_khach_hang');

        Route::get('sua/{id}','admin\KhachHangController@getSua')->name('get_sua_khach_hang')->where('id','[0-9]+');

        Route::get('chitiet/{id}','admin\KhachHangController@getChiTiet')->name('get_chi_tiet_khach_hang')->where('id','[0-9]+');

        Route::get('them','admin\KhachHangController@getThem')->name('get_them_khach_hang');

        Route::post('them','admin\KhachHangController@postThem')->name('post_them_khach_hang');

    });

    Route::group(['prefix'=>'donhang'], function(){
        Route::get('danhsach','admin\DonHangController@index');

        Route::get('{id}/sua','admin\DonHangController@edit');

        Route::get('them','admin\DonHangController@create');

        Route::delete('{id}/xoa','admin\DonHangController@destroy');

        Route::post('them','admin\DonHangController@store')->name('them.donhang.post');

        Route::put('{id}','admin\DonHangController@update');

        Route::get('khachhang/{ma_khach_hang}','admin\DonHangController@timkhachhang');

        Route::get('sanpham/{ma_san_pham}','admin\DonHangController@timsanpham');

        Route::get('{id}','admin\DonHangController@show');
        
    });

    Route::group(['prefix'=>'phieunhap'], function(){
        Route::get('danhsach','admin\PhieuNhapController@getDanhSach')->name('danh_sach_phieu_nhap');

        Route::get('sua/{id}','admin\PhieuNhapController@getSua')->name('get_sua_phieu_nhap')->where('id','[0-9]+');

        Route::get('xem/{id}','admin\PhieuNhapController@getChiTiet')->name('get_chi_tiet_phieu_nhap')->where('id','[0-9]+');

        Route::get('them','admin\PhieuNhapController@getThem')->name('get_them_phieu_nhap');

        Route::post('them','admin\PhieuNhapController@postThem')->name('post_them_phieu_nhap');

        Route::post('them_exist/id','admin\PhieuNhapController@postThem')->name('post_them_phieu_nhap_exist')->where('id','[0-9]+');;

    });

});

// Route::resource('san-pham',$baseFolder.'SanPhamController', ['names' => [
//     'index' => 'sanpham.index',
//     'show' => 'sanpham.show'
// ]]);

// Route::resource('danh-muc',$baseFolder.'DanhMucController', ['names' => [
//     'show' => 'danhmuc.show'
// ]]);

// Route::resource('giao-dich',$baseFolder.'GiaoDichController',['names' => [
//     'index'=> 'giaodich.index',
//     'show'=> 'giaodich.show'
// ]]);

// Route::resource('tai-khoan',$baseFolder.'TaiKhoanController',['names' => [
//     'index' => 'taikhoan.index'
// ]]);

// // User authenticate route
// Route::get('dang-nhap','TaiKhoanAuth\DangNhapController@getDangNhap')->name('dangnhap.index');
// Route::post('dang-nhap','TaiKhoanAuth\DangNhapController@postDangNhap')->name('dangnhap.post');
// Route::post('dang-xuat','TaiKhoanAuth\DangNhapController@postDangXuat')->name('dangxuat.post');
// Route::get('dang-ky','TaiKhoanAuth\DangKyController@getDangKy')->name('dangky.index');
// Route::post('dang-ky','TaiKhoanAuth\DangKyController@postDangKy')->name('dangky.post');
// Route::get('quen-mat-khau','TaiKhoanAuth\QuenMatKhauController@getQuenMatKhau')->name('quenmatkhau.index');
// Route::post('quen-mat-khau','TaiKhoanAuth\QuenMatKhauController@postQuenMatKhau')->name('quenmatkhau.post');
// Route::get('khoi-phuc-mat-khau','TaiKhoanAuth\KhoiPhucMatKhauController@getKhoiPhucMatKhau')->name('khoiphucmatkhau.index');
// Route::post('khoi-phuc-mat-khau','TaiKhoanAuth\KhoiPhucMatKhauController@postKhoiPhucMatKhau')->name('khoiphucmatkhau.post');


// // Route::resource('dang-nhap','TaiKhoanAuth\DangNhapController',['names'=>[
// //     'index' => 'dangnhap.index',
// //     'store' => 'dangnhap.store'
// // ]]);
// // Route::resource('dang-ky','TaiKhoanAuth\DangKyController',['names'=>[
// //     'index' => 'dangky.index',
// //     'store' => 'dangky.store'
// // ]]);
// // Route::resource('dang-xuat','TaiKhoanAuth\DangKyController',['names'=>[
// //     'index' => 'dangky.index',
// //     'store' => 'dangky.store'
// // ]]);

// Route::group(['prefix' => 'admin'], function () {
//     Route::get('dang-nhap','QuanTriVienAuth\DangNhapController@getDangNhap')->name('admin.dangnhap.index');
//     Route::post('dang-nhap','QuanTriVienAuth\DangNhapController@postDangNhap')->name('admin.dangnhap.post');
// });


// Route::get('demo', 'SanPhamController@demo')->name('demo');
