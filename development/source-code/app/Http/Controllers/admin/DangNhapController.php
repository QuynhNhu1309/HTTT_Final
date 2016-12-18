<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\TaiKhoan;



class DangNhapController extends Controller
{
    //

    public function getDangNhap(){
      return view('admin.dangnhap.dangnhap');
    }

    public function postDangNhap(Request $request){

        $tenDangNhap=$request->txtUser;
        $matKhau=$request->txtPass;
        $credentials=['Username' => $tenDangNhap, 'password'=> $matKhau];
       if(Auth::guard('web')->attempt($credentials) && Auth::user()->idTinhTrang==4)
         {
  
       // return "Username: ".$tenDangNhap."Pass = ".$matKhau;
            return redirect('admin/loaisanpham/danhsach');
        }
        else
        {
             return redirect('dangnhap')->with('thongbao', 'Đăng nhập không thành công');
        }
       

        // Authenticate user
       
    }

    public function getDangXuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    }
}
