<?php

namespace App\Http\Controllers\TaiKhoanAuth;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
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
        return view('pages.dang-nhap');
    }
    
    public function postDangNhap(Request $request)
    {
        // Get request parameters and set to credentials array
        $tenDangNhap=$request->ten_dang_nhap;
        $matKhau=$request->mat_khau;
        $credentials=['ten_dang_nhap' => $tenDangNhap, 'password'=> $matKhau];

        // Authenticate user
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect()->route('dangnhap.index');
    }

    public function postDangXuat()
    {
        Auth::guard('web')->logout();

        return back();
    }
}
