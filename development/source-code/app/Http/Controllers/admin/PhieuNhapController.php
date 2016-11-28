<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\SanPham;
use App\LoaiSanPham;
use App\TinhTrang;
use App\PhieuNhap;
use App\PhieuNhapChiTiet;
use Illuminate\Support\Facades\Auth;

class PhieuNhapController extends Controller
{
    //

    public function getDanhSach ()
    {
        //$data = SanPham::paginate(15);
        $phieunhap = PhieuNhap::paginate(2);
        $loaisp = LoaiSanPham::all();
        return view('admin.phieunhap.danhsach',['phieunhap' => $phieunhap,'loaisp' => $loaisp]);
    }

    public function getThem(){
        $data = DB::table('loaisp')->get();

        $data1 = DB::table('TinhTrang')->where('TenBang','sanpham')->get();
        return view('admin.phieunhap.them',['data'=>$data,'data1'=>$data1]);

    }

    public function postThem(Request $request){
        $sp    = new SanPham;
        $MaSP = DB::select("EXEC Them_Lay_Ma_SP");
        $sp->MaSP=  $MaSP[0]->MaSP;


         $this ->validate($request, [
                            'txt_tensp' => 'required|max:150|min:5',
                            'txt_mota' => 'required|min:5',
                            'txt_giaban' => 'required|numeric',
                            'txt_giaban_hientai' => 'required|numeric',
                            'txt_soluong' => 'required|numeric',
                            'txt_nsx' => 'required',
                            'anh_dai_dien' =>'required',
                            

                            ],
                            ['txt_tensp.required'=>'Vui lòng nhập tên sản phẩm',
                            'txt_tensp.max'=>'Tên sản phẩm chứa ít nhất 5 kí tự, nhiều nhất 150 kí tự',
                            'txt_tensp.min'=>'Tên sản phẩm chứa ít nhất 5 kí tự, nhiều nhất 150 kí tự',

                             'txt_mota.required'=>'Vui lòng nhập mô tả',
                             'txt_mota.min'=>'Mô tả chứa ít nhất 5 kí tự', 

                             'txt_giaban.required' => 'Vui lòng nhập giá bán',
                             'txt_giaban.numeric' => 'Gía bán không phải số',

                             'txt_giaban_hientai.required' => 'Vui lòng nhập giá bán hiện tại',
                             'txt_giaban_hientai.numeric' => 'Gía bán hiện tại không phải số',


                             'txt_soluong.required' => 'Vui lòng nhập số lượng',
                             'txt_soluong.numeric' => 'Số lượng không phải số',

                             'txt_nsx.required' => 'Vui lòng nhập nhà sản xuất',  

                             'anh_dai_dien.required' => 'Vui lòng chọn hình đại diện',                       
                            ]);

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
       $sp->NgayCapNhat=date("Y-m-d H:i:s");
       $sp->NgayTao=date("Y-m-d H:i:s");
       $sp->GiaNhap= $request->txt_gianhap;
       $sp->GiaBan=$request->txt_gianhap + $request->txt_gianhap * 0.3 ;
       $sp->PhanTramKM= $request->txt_phantramKM;
       $sp->GiaBanHienTai= ($request->txt_gianhap + $request->txt_gianhap * 0.3) -  ($request->txt_gianhap + $request->txt_gianhap * 0.3)* $request->txt_phantramKM/100;
       /*if(strlen($file) >0){
        $filename=time().'.'.$file->getClientOriginalName();
        $destinationPath='public/upload/'
        $file->move('$destinationPath',$filename);
        $sp->AnhDaiDien=$filename
       }*/

       $sp->SoLuongTonKho= $request->txt_soluong;
       $sp->NhaSanXuat=$request->txt_nsx;

       if(Input::file('anh_dai_dien'))
        {
        $name_img = Input::file('anh_dai_dien')->getClientOriginalName();
        Input::file('anh_dai_dien')->move("assets/img/", $name_img);
     
        $sp->AnhDaiDien = $name_img;
        }

        if(Input::file('anh_ct_1'))
        {
        $name_img_ct1 = Input::file('anh_ct_1')->getClientOriginalName();
        Input::file('anh_ct_1')->move("assets/img/", $name_img_ct1);
     
        $sp->AnhCT1 = $name_img_ct1;
        }

        if(Input::file('anh_ct_2'))
        {
        $name_img_ct2 = Input::file('anh_ct_2')->getClientOriginalName();
        Input::file('anh_ct_2')->move("assets/img/", $name_img_ct2);
     
        $sp->AnhCT2 = $name_img_ct2;
        }

        if(Input::file('anh_ct_3'))
        {
        $name_img_ct3 = Input::file('anh_ct_3')->getClientOriginalName();
        Input::file('anh_ct_3')->move("assets/img/", $name_img_ct3);
     
        $sp->AnhCT3 = $name_img_ct3;
        }

       $sp ->save();
       $idTaiKhoan = Auth::user()->id;
       $NgayXuatHoaDon = date("Y-m-d H:i:s");
       $idPhieuNhap = -1;

       $rs = DB::select("EXEC Them_PhieuNhap_PhieuNhapChiTiet @id_PhieuNhap = ".$idPhieuNhap.", @idTaiKhoan = ".$idTaiKhoan.",
       @NgayXuatHoaDon = '". $NgayXuatHoaDon."'");
       return redirect('admin/phieunhap/them')->with('thongbao', 'Thêm thành công');
    }


    public function getChiTiet($id)
    {
         //$chi_tiet_phieu_nhap = DB::select('EXEC Data_PN_PhieuNhapCT '.$id);
         //$chi_tiet_phieu_nhap  = Paginator::make($chi_tiet_phieu_nhap);

         $chi_tiet_phieu_nhap  = DB::table('phieunhap_chitiet')
            ->join('loaisp', 'phieunhap_chitiet.idLoai', '=', 'loaisp.id')
            ->join('sanpham', 'phieunhap_chitiet.idSanPham', '=', 'sanpham.id')
            ->where('phieunhap_chitiet.idPN', $id)
            ->select('phieunhap_chitiet.*', 'loaisp.TenLoai', 'sanpham.TenSP')
            ->paginate(1);
         //return $chi_tiet_phieu_nhap;
        return view('admin.phieunhap.xemct', ['chi_tiet_phieu_nhap'=>$chi_tiet_phieu_nhap]);
    }

    
}
