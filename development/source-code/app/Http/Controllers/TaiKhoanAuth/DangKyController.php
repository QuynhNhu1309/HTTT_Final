<?php

namespace App\Http\Controllers\TaiKhoanAuth;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\TaiKhoan;

class DangKyController extends Controller
{
    public function getDangKy()
    {
        return view('pages.dang-ky');
    } 

    public function postDangKy(Request $request)
    {
        // Get request body
        $tenDangNhap=$request->ten_dang_nhap;
        $email=$request->email;
        $matKhau=$request->mat_khau;
        $ho=$request->ho;
        $ten=$request->ten;
        $gioiTinh=$request->gioi_tinh;

        // Create new TaiKhoan Model instance and set its values
        $taiKhoanIns=new TaiKhoan();
        $taiKhoanIns->ten_dang_nhap=$tenDangNhap;
        $taiKhoanIns->email=$email;
        $taiKhoanIns->mat_khau=Hash::make($matKhau);
        $taiKhoanIns->ho=$ho;
        $taiKhoanIns->ten=$ten;
        $taiKhoanIns->gioi_tinh=$gioiTinh;
        $taiKhoanIns->save();

        return $taiKhoanIns;
    }
}
