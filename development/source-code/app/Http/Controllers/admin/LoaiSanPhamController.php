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

    public function postThem(Request $request)
    {
      $lsp   = new LoaiSanPham;
      $MaLoai = DB::select("EXEC Them_Lay_Ma_Loai");
       
      $lsp->MaLoai =  $MaLoai[0]->MaLoai;
       $lsp->TenLoai = $request ->txt_tenloai_them;
       $lsp ->save();
       echo '<script type="text/javascript">
          alert("Thêm Thành Công !");
          window.location = "';
          echo route('getLoaiSPList');
        echo'"
        </script>';
    }

     public function getXoa($id)
    {
      //$lsp = LoaiSanPham::find($id);
			//$lsp->delete($id);
      $sp = DB::select("EXEC Del_LoaiSP_SanPham ".$id);
      //DB::select("SET ANSI_NULLS ON; SET ANSI_WARNINGS ON;EXEC [Del_LoaiSP_SanPham] $id;");
      //DB::select("SET ANSI_NULLS ON; SET ANSI_WARNINGS ON;EXEC [storedprocedure] $param1,$param2;");
       return redirect('admin/loaisanpham/danhsach')->with('thongbao', 'Xóa thành công');
    }
}
