<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

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
        $taiKhoanIns->idGroup =1;
        $taiKhoanIns->save();

        return $taiKhoanIns;
    }
}
