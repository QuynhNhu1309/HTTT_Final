<?php

namespace App\Http\Controllers\TaiKhoanAuth;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DangXuatController extends Controller
{
    public function postDangXuat()
    {
        Auth::guard('web')->logout();

        return back();
    }
}
