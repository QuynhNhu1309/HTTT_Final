<?php

namespace App\Http\Controllers\QuanTriVienAuth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DangNhapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }
    
    public function getDangNhap()
    {
        return view('pages.admin.dang-nhap');
    }
    
    public function postDangNhap(Request $request)
    {
        // Get request parameters and set to credentials array
        $tenDangNhap=$request->ten_dang_nhap;
        $matKhau=$request->mat_khau;
        $credentials=['ten_dang_nhap' => $tenDangNhap, 'password'=> $matKhau];

        // Authenticate user
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->route('admin.dangnhap.index');
    }

    public function postDangXuat()
    {
        Auth::guard('admin')->logout();

        return back();
    }
}
