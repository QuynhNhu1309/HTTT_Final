<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoaiSanPhamController extends Controller
{
    //
    public function getDanhSach ()
    {
        return view('admin.loaisanpham.danhsach');
    }

     public function getSua ()
    {
       
    }

    public function getThem ()
    {
       
    }
}
