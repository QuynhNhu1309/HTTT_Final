<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SanphamController extends Controller
{
    public function getDanhSach ()
    {
        $data = SanPham::select('MaSP','SoLuongTonKho','TenSP')->get();
    	return view('admin.sanpham.danhsach',['sp' => $data]);
    }
}
