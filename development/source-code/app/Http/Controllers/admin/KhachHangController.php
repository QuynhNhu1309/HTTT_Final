<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
USE DB;
use App\KhachHang;
use App\TaiKhoan;

class KhachHangController extends Controller
{
    //
      public function getDanhSach ()
    {

        //$danhsach_khachhang = DB::select("EXEC Data_khachhang");

        $danhsach_khachhang = KhachHang::paginate(1);
        //$danhsach_khachhang = KhachHang::all();
        return view('admin.khachhang.danhsach')->with('danhsach_khachhang', $danhsach_khachhang) ;
    }

     public function getSua ($id)
    {

        
        $chi_tiet_khach_hang = DB::table('khachhang')->where('id', $id)->get();
        return view('admin.khachhang.sua', ['chi_tiet_khach_hang'=>$chi_tiet_khach_hang]);
    }

    public function getChiTiet($id)
    {
         $chi_tiet_khach_hang = DB::select("EXEC Data_CT_khachhang ".$id);
       // $query= exe_sp('Data_CT_khachhang',['id' => $id, 'loaisp' => 'giay']);
        //return $query;
        //return  $chi_tiet_khach_hang;
        return view('admin.khachhang.chitiet', ['chi_tiet_khach_hang'=>$chi_tiet_khach_hang]);
    }

   public function getThem ()
    {
       return view('admin.khachhang.them');
    }

    public function postThem(Request $request)
    {
        
        //$nv= new TaiKhoan;
        
        //$MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");//Tạo mã tài khoản

        
        $this ->validate($request, [
                            'txt_hoten' => 'required|max:50|min:5',
                            'txt_diachi' => 'required',
                            'txt_sdt' => 'required|numeric|unique:khachhang,DienThoai'
                            ],
                            ['txt_hoten.required'=>'Vui lòng nhập họ tên',
                            'txt_hoten.max'=>'Họ tên chứa ít nhất 5 kí tự, nhiều nhất 50 kí tự',
                            'txt_hoten.min'=>'Họ tên chứa ít nhất 5 kí tự, nhiều nhất 50 kí tự',

                        
                             'txt_diachi.required' => 'Vui lòng nhập địa chỉ',

                             'txt_sdt.required' => 'Vui lòng nhập số điện thoại',
                             'txt_sdt.unique'=>'Số điện thoại này đã tồn tại',
                             'txt_sdt.numeric' => 'Không phải số điện thoại',

                            
                            ]);
        $kh= new KhachHang;
        $MaKhachHang = DB::select("EXEC Them_Lay_Ma_KH");
        $kh->MaKhachHang = $MaKhachHang[0]->MaKhachHang;
        $kh->HoTen = $request ->txt_hoten;
        $kh->DiaChi = $request ->txt_diachi;
        $kh->DienThoai= $request ->txt_sdt;
        $kh->idTaiKhoan= Auth::user()->idGroup;
        $kh->NgayDangKy = date("Y-m-d H:i:s");
        $kh->NgayCapNhat = date("Y-m-d H:i:s");

        $kh ->save();
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
        return redirect('admin/khachhang/danhsach')->with('thongbao', 'Thêm thành công');
        
    }

    
}
