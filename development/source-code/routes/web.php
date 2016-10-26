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
        Route::get('danhsach', 'admin\LoaiSanPhamController@getDanhSach');

        Route::get('sua', 'admin\LoaiSanPhamController@getSua');

        Route::get('them', 'admin\LoaiSanPhamController@getThem');

    });

    Route::group(['prefix'=>'sanpham'], function(){
        Route::get('danhsach','admin\SanPhamController@getDanhSach');

        Route::get('sua','admin\SanPhamController@getSua');

        Route::get('them','admin\SanPhamController@getThem');

    });

    Route::group(['prefix'=>'nhanvien'], function(){
        Route::get('danhsach','admin\NhanVienController@getDanhSach')->name('danh_sach_nhan_vien');

        Route::get('sua','admin\NhanVienController@getSua');

        Route::get('them','admin\NhanVienController@getThem');

    });

    Route::group(['prefix'=>'khachhang'], function(){
        Route::get('danhsach','admin\KhachHangController@getDanhSach')->name('danh_sach_khach_hang');

        Route::get('sua','admin\KhachHangController@getSua');

        Route::get('them','admin\KhachHangController@getThem');

    });

    Route::group(['prefix'=>'donhang'], function(){
        Route::get('danhsach','admin\DonHangController@index');

        Route::get('{id}/sua','admin\DonHangController@edit');

        Route::get('them','admin\DonHangController@create');

        Route::delete('{id}/xoa','admin\DonHangController@destroy');

        Route::post('/','admin\DonHangController@store');

        Route::put('{id}','admin\DonHangController@update');

        Route::get('{id}','admin\DonHangController@show');
        
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
