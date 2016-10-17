<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{
    //
    public function getDanhSach ()
    {
        return view('admin.nhanvien.danhsach');
    }

     public function getSua ()
    {
        return view('admin.nhanvien.sua');
    }

    public function getThem ()
    {
       
    }
}
