<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KhachHangController extends Controller
{
    //
      public function getDanhSach ()
    {
        return view('admin.khachhang.danhsach');
    }

     public function getSua ()
    {
        return view('admin.khachhang.sua');
    }

    public function getThem ()
    {
       
    }
}
