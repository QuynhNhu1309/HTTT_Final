<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\TaiKhoan;

class DangKyController extends Controller
{
    //

    public function getDangKy(){
      return view('admin.dangnhap.dangky');
    }

    public function postDangKy(Request $request)
    {
        // Get request body
        $tenDangNhap=$request->txtUser;
        $email=$request->txtEmail;
        $matKhau=$request->txtPass;
        $ten=$request->txtName;
     
        // Create new TaiKhoan Model instance and set its values
        $taiKhoanIns=new TaiKhoan();
        $taiKhoanIns->Username=$tenDangNhap;
        $taiKhoanIns->Email=$email;
        $taiKhoanIns->Pass=Hash::make($matKhau);
        $taiKhoanIns->HoTen=$ten;
        $taiKhoanIns->idGroup =3;
        $taiKhoanIns->GioiTinh=6;
        $taiKhoanIns->HinhDaiDien='picture.jpg';
        $taiKhoanIns->DiaChi='273 An Dương Vương';
        $taiKhoanIns->DiaChi='0987890987';
        $taiKhoanIns->HinhDaiDien='picture.jpg';
        $MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");
        $taiKhoanIns->MaTaiKhoan=$MaTaiKhoan[0]->MaTaiKhoan;
        $taiKhoanIns->idTinhTrang=4;
        //$taiKhoanIns->NgayDangKy = date("Y-m-d H:i:s");
        //$taiKhoanIns->idGroup =1;
        $taiKhoanIns->save();

        return $taiKhoanIns;
    }
}
