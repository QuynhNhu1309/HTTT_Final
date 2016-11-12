<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
USE DB;
use App\KhachHang;

class KhachHangController extends Controller
{
    //
      public function getDanhSach ()
    {

        $danhsach_khachhang = DB::select("EXEC Data_khachhang");
        //$danhsach_khachhang = KhachHang::all();
        return view('admin.khachhang.danhsach')->with('danhsach_khachhang', $danhsach_khachhang) ;
    }

     public function getSua ()
    {
        return view('admin.khachhang.sua');
    }

    public function getThem ()
    {
       
    }
}
