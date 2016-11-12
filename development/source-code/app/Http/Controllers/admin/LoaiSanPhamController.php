<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LoaiSanPham;
use Illuminate\Support\Facades\DB;
class LoaiSanPhamController extends Controller
{
    //
    public function getDanhSach ()
    {
       $data = DB::table('loaisp')->get();
    	return view('admin.loaisanpham.danhsach',['lsp' => $data]);
    }

     public function getSua ($id)
    {
      
      $lsp = DB::table('loaisp')->where('id', $id)->get();
      return view('admin.loaisanpham.sua',[
        'lsp'=>$lsp]);
    }

    public function postSua(Request $request,$id){
       $lsp= LoaiSanPham::find($id);
       $lsp->TenLoai = $request ->txt_tenloai;
       $lsp ->save();
       echo '<script type="text/javascript">
          alert("Sửa Thành Công !");
          window.location = "';
          echo route('getLoaiSPList');
        echo'"
        </script>';
    }

    

    public function getThem ()
    {
       return view('admin.loaisanpham.them');
    }

    public function postThem(Request $request){
      $lsp            = new LoaiSanPham;
      $lsp->MaLoai= $request ->txt_maloai_them;
       $lsp->TenLoai = $request ->txt_tenloai_them;
       $lsp ->save();
       echo '<script type="text/javascript">
          alert("Thêm Thành Công !");
          window.location = "';
          echo route('getLoaiSPList');
        echo'"
        </script>';
    }
}
