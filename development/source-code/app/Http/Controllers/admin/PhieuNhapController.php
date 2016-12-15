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
        //$phieunhap = PhieuNhap::paginate(10);

        
        $search = \Request::get('search');
        if($search != "")
        {
            $phieunhap = PhieuNhap::where('MaPhieuNhap','=',$search)->paginate(10);
        }
        else if($search == "")
        {
            $phieunhap = PhieuNhap::where('MaPhieuNhap','like','%'.$search.'%')->paginate(10);
        }
        
        
        if(isset($_GET['month']))
        {
            $month = \Request::get('month');
            $current_year = date("Y");
        }


        if(isset($_GET['month']) && $_GET['month'] != "")
        {
            $phieunhap = PhieuNhap::whereYear('NgayXuatHoaDon', $current_year)->whereMonth('NgayXuatHoaDon', $month)->paginate(10);
        }
  

        return view('admin.phieunhap.danhsach',['phieunhap' => $phieunhap]);

    
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
       $sp->MoTa=$request->txt_mota;
       $sp->NgayCapNhat=date("Y-m-d H:i:s");
       $sp->NgayTao=date("Y-m-d H:i:s");
       $sp->GiaNhap= $request->txt_gianhap;
       $sp->GiaBan=$request->txt_gianhap + $request->txt_gianhap * 0.3 ;
       $sp->PhanTramKM= $request->txt_phantramKM;
       $sp->GiaBanHienTai= ($request->txt_gianhap + $request->txt_gianhap * 0.3) -  ($request->txt_gianhap + $request->txt_gianhap * 0.3)* $request->txt_phantramKM/100;
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

        $query_id = PhieuNhap::orderBy('id', 'desc')->take(1)->get();
        $id =  $query_id[0]->{'id'};

        $data = DB::table('loaisp')->get();

        $data1 = DB::table('TinhTrang')->where('TenBang','sanpham')->get();

       return redirect('admin/phieunhap/them_exist/'.$id)->with('data', $data)
       ->with('data1', $data1)->with('thongbao', 'Thêm thành công, thêm tiếp nào!');
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
            ->paginate(10);
         //return $chi_tiet_phieu_nhap;
        return view('admin.phieunhap.xemct', ['chi_tiet_phieu_nhap'=>$chi_tiet_phieu_nhap, 'idPN' => $id]);
    }


    public function getThem_exist($id)
    {
        $data = DB::table('loaisp')->get();

        $data1 = DB::table('TinhTrang')->where('TenBang','sanpham')->get();
        return view('admin.phieunhap.them_exist',['data'=>$data,'data1'=>$data1, 'idPN'=>$id]);

    }

    public function postThem_exist(Request $request, $id){
       

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
       $sp->MoTa=$request->txt_mota;
       $sp->NgayCapNhat=date("Y-m-d H:i:s");
       $sp->NgayTao=date("Y-m-d H:i:s");
       $sp->GiaNhap= $request->txt_gianhap;
       $sp->GiaBan=$request->txt_gianhap + $request->txt_gianhap * 0.3 ;
       $sp->PhanTramKM= $request->txt_phantramKM;
       $sp->GiaBanHienTai= ($request->txt_gianhap + $request->txt_gianhap * 0.3) -  ($request->txt_gianhap + $request->txt_gianhap * 0.3)* $request->txt_phantramKM/100;
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
       $idPhieuNhap = $id;

       $rs = DB::select("EXEC Them_PhieuNhap_PhieuNhapChiTiet @id_PhieuNhap = ".$idPhieuNhap.", @idTaiKhoan = ".$idTaiKhoan.",
       @NgayXuatHoaDon = '". $NgayXuatHoaDon."'");
       return redirect('admin/phieunhap/them_exist/'.$id)->with('thongbao', 'Thêm thành công, thêm tiếp nào!');
    }

    public function getSua($id){
        $data = DB::table('phieunhap_chitiet')
        ->where('id', $id)
        ->get();
         $lsp = DB::table('loaisp')
        
        ->get();
       return view('admin.phieunhap.suact',['sps' => $data,'lsp' => $lsp]);
    }

    public function postSua(Request $request,$id){
         $this ->validate($request, [
                            'txt_tensp' => 'required|max:150|min:5',
                            'txt_mota' => 'required|min:5',
                            'txt_giaban' => 'required|numeric',
                            'txt_giaban_hientai' => 'required|numeric',
                            'txt_soluong' => 'required|numeric',
                            'txt_nsx' => 'required',

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
                            ]);
       $idSanPham = DB::select("EXEC Data_PhieuNhapCT_LayIdSP".$id);

       $sp = SanPham::find($idSanPham);
       $sp->idLoai = $request ->txt_loaisp;
       $sp->TenSP =$request->txt_tensp;
       
       $sp->MoTa=$request->txt_mota;
       $sp->NgayCapNhat=date("Y-m-d H:i:s");

       $sp->GiaNhap= $request->txt_gianhap;
       $sp->PhanTramKM= $request->txt_phantramKM;
       $sp->GiaBan= $request->txt_giaban;
       $sp->GiaBanHienTai= $request->txt_giaban_hientai;
       
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
        
       return redirect('admin/phieunhap/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }



    
}
