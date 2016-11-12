<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\LoaiSanPham;
use App\TinhTrang;
use Illuminate\Support\Facades\DB;
class SanphamController extends Controller
{
    //
    public function getDanhSach ()
    {
        $data = DB::table('sanpham')
        
        ->paginate(15);
    	return view('admin.sanpham.danhsach',['sp' => $data]);
    }


    public function getThem(){
        $data = DB::table('loaisp')
        
        ->get();

        $data1 = DB::table('TinhTrang')
        
        ->get();
        return view('admin.sanpham.them',['data'=>$data,'data1'=>$data1]);

    }

    public function postThem(SPAddRequest $request){
        $sp           = new SanPham;
      $sp->MaSP= $request ->txt_masp;
       $sp->idLoai = $request ->txt_loaisp;
       $sp->TenSP =$request->txt_tensp;
        /*)
         if(strlen($file) >0){
        $filename=time().'.'.$file->getClientOriginalName();
        $destinationPath='public/upload/'
        $file->move('$destinationPath',$filename);
        $sp->AnhCT2=$filename
       }
        if(strlen($file) >0){
        $filename=time().'.'.$file->getClientOriginalName();
        $destinationPath='public/upload/'
        $file->move('$destinationPath',$filename);
        $sp->AnhCT3=$filename
       }
       */
       $sp->MoTa=$request->txt_mota;
       $sp->NgayCapNhat=new DateTime();
       $sp->NgayTao=new DateTime();
       $sp->GiaBan= $request->txt_giaban;
       $sp->GiaBanHienTai= $request->txt_giaban_hientai;
       /*if(strlen($file) >0){
        $filename=time().'.'.$file->getClientOriginalName();
        $destinationPath='public/upload/'
        $file->move('$destinationPath',$filename);
        $sp->AnhDaiDien=$filename
       }*/

       
       $sp->SoLuongTonKho= $request->txt_soluong;
       $sp->NhaSanXuat=$request->txt_nsx;
       $sp->idTinhTrang=$request->txt_tinhtrang;

       $sp ->save();
       return $sp;
    }

    public function getXoa($id){

       $parent = SanPham::where('id',$id)->count();
    	if ($parent == 1) {
            
    		$sp = SanPham::find($id);
			$sp->delete($id);
			echo '<script type="text/javascript">
    			alert("Xóa Thành Công !");
    			window.location = "';
    			echo route('getSPList');
    		echo'"
    		</script>';
    	} 
    	
    }

    public function getSua($id){
        $data = DB::table('sanpham')
        ->where('id', $id)
        ->get();
         $lsp = DB::table('loaisp')
        
        ->get();
       return view('admin.sanpham.sua',['sps' => $data,'lsp' => $lsp]);
    }

    
}
