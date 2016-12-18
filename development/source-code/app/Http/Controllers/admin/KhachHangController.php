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

        $khachhhang_sort_NguoiTao = DB::select("EXEC Data_KH_Feature_NguoiTao");
        

        $search = \Request::get('search');
        $danhsach_khachhang = KhachHang::where('HoTen','like','%'.$search.'%')->orwhere('DiaChi','like','%'.$search.'%')->paginate(6);

        if(isset($_GET['chucvu']))
        {
            $chucvu = \Request::get('chucvu');
        }

        if(isset($_GET['sapxep']))
        {
            $sapxep = \Request::get('sapxep');
        }

        if(isset($_GET['key']))
        {
            $key = \Request::get('key');
        }


          if(isset($_GET['chucvu']) && $_GET['chucvu'] !="" && $_GET['key'] == "" && $_GET['sapxep']=="")
        {
            $danhsach_khachhang = KhachHang::where('idTaiKhoan',$chucvu)->paginate(2);
        }

        if(isset($_GET['sapxep']) && $_GET['sapxep'] !="" && $_GET['key'] == "" && $_GET['chucvu']=="")
        {
          
                 $danhsach_khachhang = KhachHang::paginate(3);

            if($_GET['sapxep'] == 2)
            {
                 $danhsach_khachhang = KhachHang::orderBy('id', 'desc')->paginate(4);
            }
           
        }

        if(isset($_GET['key']) && $_GET['key'] !="" && $_GET['chucvu'] == "" && $_GET['sapxep']=="")
        {
           $danhsach_khachhang = KhachHang::where('HoTen','like','%'.$key.'%')->orwhere('DiaChi','like','%'.$key.'%')->paginate(5);
        }

        if(isset($_GET['chucvu']) && $_GET['chucvu'] !="" && isset($_GET['sapxep']) && $_GET['sapxep'] !="" && $_GET['key'] == "")
        {

            if($_GET['sapxep'] == 1)
            {
                 $danhsach_khachhang = KhachHang::where('idTaiKhoan',$chucvu)->orderBy('id', 'asc')->paginate(6);
            }

            if($_GET['sapxep'] == 2)
            {
                 $danhsach_khachhang = KhachHang::where('idTaiKhoan',$chucvu)->orderBy('id', 'desc')->paginate(7);
            }
           
        }

        if(isset($_GET['chucvu']) && $_GET['chucvu'] !="" && isset($_GET['key']) && $_GET['key'] !="" && $_GET['sapxep']=="")
        {
            $danhsach_khachhang = KhachHang::where(function ($query) use ($chucvu) {
                                                $query->where('idTaiKhoan', $chucvu);
                                            })->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%');
                                            })->paginate(8);
           
        }

        if(isset($_GET['sapxep']) && $_GET['sapxep'] !="" && isset($_GET['key']) && $_GET['key'] !="" && $_GET['chucvu']=="")
        {

            
                 $danhsach_khachhang = KhachHang::where('HoTen','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')->paginate(9);
           

             if($_GET['sapxep'] == 2)
            {
                 $danhsach_khachhang = KhachHang::where('HoTen','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')->orderBy('id','desc')->paginate(10);
            }
            
           
        }

        if(isset($_GET['chucvu']) && $_GET['chucvu'] !="" && isset($_GET['sapxep']) && $_GET['sapxep'] !="" && isset($_GET['key']) && $_GET['key'] !="")
        {

            if($_GET['sapxep'] == 1)
            {
                 $danhsach_khachhang = KhachHang::where(function ($query) use ($chucvu) {
                                                $query->where('idTaiKhoan', $chucvu);
                                            })->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%');
                                            })->paginate(3);
            }

             else if($_GET['sapxep'] == 2)
            {
                 $danhsach_khachhang = KhachHang::where(function ($query) use ($chucvu) {
                                                $query->where('idTaiKhoan', $chucvu);
                                            })->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%');
                                            })->orderBy('id','desc')->paginate(4);
            }
            
           
        }


        return view('admin.khachhang.danhsach',['danhsach_khachhang' => $danhsach_khachhang, 'khachhhang_sort_NguoiTao'=> $khachhhang_sort_NguoiTao]) ;
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
        

        $kh ->save();
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
        return redirect('admin/khachhang/danhsach')->with('thongbao', 'Thêm thành công');
        
    }

    
}
