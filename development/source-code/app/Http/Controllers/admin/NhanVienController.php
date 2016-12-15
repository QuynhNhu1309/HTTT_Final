<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use DB;
use App\TaiKhoan;

class NhanVienController extends Controller
{
    //
    public function getDanhSach ()
    {
        //$danhsach_nhanvien = DB::select("EXEC Data_nhanvien");
        //$danhsach_nhanvien = TaiKhoan::paginate(5);
        $nhanvien_sort_gender = DB::select("EXEC Data_NV_Feature_Gender");
        $nhanvien_sort_chucvu = DB::select("EXEC Data_NV_Feature_Chucvu");
        $nhanvien_sort_tinhtrang = DB::select("EXEC Data_NV_Feature_TinhTrang");

        $search = \Request::get('search');

        $danhsach_nhanvien = TaiKhoan::where(function ($query) {
                                                $query->where('idGroup', '<', 3);
                                            })
                                            ->where(function ($query) use($search) {
                                                $query->orwhere('HoTen','like','%'.$search.'%')
                                                ->orwhere('Username','like','%'.$search.'%')
                                                ->orWhere('DiaChi','like','%'.$search.'%')
                                                ->orWhere('Email','like','%'.$search.'%');
                                            })->paginate(10);

        // $danhsach_nhanvien = TaiKhoan::where('HoTen','like','%'.$search.'%')->orwhere('Username','like','%'.$search.'%')->orWhere('DiaChi','like','%'.$search.'%')->orWhere('Email','like','%'.$search.'%')->paginate(10);

        //if(\Request::get('cb_gender') && isset($_GET['sort']))
        if(isset($_GET['gender']))
        {
            $gender = \Request::get('gender');
        }

        if(isset($_GET['chucvu']))
        {
            $chucvu = \Request::get('chucvu');
        }

        if(isset($_GET['status']))
        {
            $status = \Request::get('status');
        }

        if(isset($_GET['key']))
        {
            $key =  \Request::get('key');
        }

        //Gender
        if(isset($_GET['gender']) && $_GET['gender']!= "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('GioiTinh',$gender)->paginate(10);
        }

        //Chức vụ
        if(isset($_GET['chucvu']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
            
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->paginate(10);
        }

        //Tình trạng
        if(isset($_GET['status']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
            
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idTinhTrang', $status)->paginate(10);
        }

        //Key
         if(isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] != "")
        {

            $danhsach_nhanvien = TaiKhoan::where(function ($query) {
                                                $query->where('idGroup', '<', 3);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
            
           
        }


        //Giới tính và chức vụ
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('GioiTinh',$gender)->paginate(10);
        }

        //Giới tính và tình trạng
        if(isset($_GET['gender']) && isset($_GET['status']) &&  $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('GioiTinh',$gender)->where('idTinhTrang', $status)->paginate(10);
        }


        //Giới tính và key
        if(isset($_GET['gender']) && isset($_GET['key']) &&  $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
            
                $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($gender) {
                                                $query->where('GioiTinh', $gender);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);


            
        }

        //Chức vụ & tình trạng
        if(isset($_GET['chucvu']) && isset($_GET['status']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('idTinhTrang', $status)->paginate(10);
        }

        //Chức vụ và key
        if(isset($_GET['chucvu']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($chucvu) {
                                                $query->where('idGroup', $chucvu);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }


        //Tình trạng và key
        if(isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($status) {
                                                $query->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Gioi tính và chức vụ và tình trạng
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['status']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('GioiTinh', $gender)->where('idTinhTrang', $status)->paginate(10);
        }

        //Gioi tính và chức vụ và key
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
             
           $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($gender, $chucvu){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idGroup',$chucvu);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Gioi tính và tình trạng và key
        if(isset($_GET['gender']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($gender,                                      $chucvu, $status){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Chức vụ và tình trạng và key
        if(isset($_GET['chucvu']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
           $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($chucvu, $status){
                                                $query->where('idGroup',$chucvu)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);

        }

        //Gioi tính và chức vụ và tình trạng và key
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($gender, $chucvu, $status){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idGroup',$chucvu)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        return view('admin.nhanvien.danhsach', ['danhsach_nhanvien' => $danhsach_nhanvien, 'nhanvien_sort_gender' => $nhanvien_sort_gender, 'nhanvien_sort_chucvu' => $nhanvien_sort_chucvu, 'nhanvien_sort_tinhtrang' => $nhanvien_sort_tinhtrang]);
    }

     public function getSua ($id)
    {

        $chi_tiet_nhan_vien = DB::table('taikhoan')->where ('id',$id)->get();
        return view('admin.nhanvien.sua', ['chi_tiet_nhan_vien'=>$chi_tiet_nhan_vien]);
    }

    public function getXem ($id)
    {

        $chi_tiet_nhan_vien = DB::table('taikhoan')->where ('id',$id)->get();
        return view('admin.nhanvien.xem', ['chi_tiet_nhan_vien'=>$chi_tiet_nhan_vien]);
    }

    public function getSua_An($id)
    {
       // if(isset($_GET['']))
        $nv= TaiKhoan::find($id);
        $nv->idTinhTrang = 5;
        $nv->save();
        $danhsach_nhanvien = DB::select("EXEC Data_nhanvien");
        $nhanvien_sort_gender = DB::select("EXEC Data_NV_Feature_Gender");
        $nhanvien_sort_chucvu = DB::select("EXEC Data_NV_Feature_Chucvu");
        $nhanvien_sort_tinhtrang = DB::select("EXEC Data_NV_Feature_TinhTrang");

        $search = \Request::get('search');

        $danhsach_nhanvien = TaiKhoan::where(function ($query) {
                                                $query->where('idGroup', '<', 3);
                                            })
                                            ->where(function ($query) use($search) {
                                                $query->orwhere('HoTen','like','%'.$search.'%')
                                                ->orwhere('Username','like','%'.$search.'%')
                                                ->orWhere('DiaChi','like','%'.$search.'%')
                                                ->orWhere('Email','like','%'.$search.'%');
                                            })->paginate(10);

        // $danhsach_nhanvien = TaiKhoan::where('HoTen','like','%'.$search.'%')->orwhere('Username','like','%'.$search.'%')->orWhere('DiaChi','like','%'.$search.'%')->orWhere('Email','like','%'.$search.'%')->paginate(10);

        //if(\Request::get('cb_gender') && isset($_GET['sort']))
        if(isset($_GET['gender']))
        {
            $gender = \Request::get('gender');
        }

        if(isset($_GET['chucvu']))
        {
            $chucvu = \Request::get('chucvu');
        }

        if(isset($_GET['status']))
        {
            $status = \Request::get('status');
        }

        if(isset($_GET['key']))
        {
            $key =  \Request::get('key');
        }

        //Gender
        if(isset($_GET['gender']) && $_GET['gender']!= "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('GioiTinh',$gender)->paginate(10);
        }

        //Chức vụ
        if(isset($_GET['chucvu']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
            
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->paginate(10);
        }

        //Tình trạng
        if(isset($_GET['status']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
            
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idTinhTrang', $status)->paginate(10);
        }

        //Key
         if(isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] != "")
        {

            $danhsach_nhanvien = TaiKhoan::where(function ($query) {
                                                $query->where('idGroup', '<', 3);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
            
           
        }


        //Giới tính và chức vụ
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('GioiTinh',$gender)->paginate(10);
        }

        //Giới tính và tình trạng
        if(isset($_GET['gender']) && isset($_GET['status']) &&  $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('GioiTinh',$gender)->where('idTinhTrang', $status)->paginate(10);
        }


        //Giới tính và key
        if(isset($_GET['gender']) && isset($_GET['key']) &&  $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
            
                $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($gender) {
                                                $query->where('GioiTinh', $gender);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);


            
        }

        //Chức vụ & tình trạng
        if(isset($_GET['chucvu']) && isset($_GET['status']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('idTinhTrang', $status)->paginate(10);
        }

        //Chức vụ và key
        if(isset($_GET['chucvu']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($chucvu) {
                                                $query->where('idGroup', $chucvu);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }


        //Tình trạng và key
        if(isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($status) {
                                                $query->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Gioi tính và chức vụ và tình trạng
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['status']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('GioiTinh', $gender)->where('idTinhTrang', $status)->paginate(10);
        }

        //Gioi tính và chức vụ và key
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
             
           $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($gender, $chucvu){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idGroup',$chucvu);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Gioi tính và tình trạng và key
        if(isset($_GET['gender']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($gender,                                      $chucvu, $status){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Chức vụ và tình trạng và key
        if(isset($_GET['chucvu']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
           $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($chucvu, $status){
                                                $query->where('idGroup',$chucvu)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);

        }

        //Gioi tính và chức vụ và tình trạng và key
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($gender, $chucvu, $status){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idGroup',$chucvu)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        return view('admin.nhanvien.danhsach', ['danhsach_nhanvien' => $danhsach_nhanvien, 'nhanvien_sort_gender' => $nhanvien_sort_gender, 'nhanvien_sort_chucvu' => $nhanvien_sort_chucvu, 'nhanvien_sort_tinhtrang' => $nhanvien_sort_tinhtrang]);
    }

    public function getSua_Hien($id)
    {
        $nv= TaiKhoan::find($id);
        $nv->idTinhTrang = 4;
        $nv->save();
        $danhsach_nhanvien = DB::select("EXEC Data_nhanvien");
        $nhanvien_sort_gender = DB::select("EXEC Data_NV_Feature_Gender");
        $nhanvien_sort_chucvu = DB::select("EXEC Data_NV_Feature_Chucvu");
        $nhanvien_sort_tinhtrang = DB::select("EXEC Data_NV_Feature_TinhTrang");

        $search = \Request::get('search');

        $danhsach_nhanvien = TaiKhoan::where(function ($query) {
                                                $query->where('idGroup', '<', 3);
                                            })
                                            ->where(function ($query) use($search) {
                                                $query->orwhere('HoTen','like','%'.$search.'%')
                                                ->orwhere('Username','like','%'.$search.'%')
                                                ->orWhere('DiaChi','like','%'.$search.'%')
                                                ->orWhere('Email','like','%'.$search.'%');
                                            })->paginate(10);

        // $danhsach_nhanvien = TaiKhoan::where('HoTen','like','%'.$search.'%')->orwhere('Username','like','%'.$search.'%')->orWhere('DiaChi','like','%'.$search.'%')->orWhere('Email','like','%'.$search.'%')->paginate(10);

        //if(\Request::get('cb_gender') && isset($_GET['sort']))
        if(isset($_GET['gender']))
        {
            $gender = \Request::get('gender');
        }

        if(isset($_GET['chucvu']))
        {
            $chucvu = \Request::get('chucvu');
        }

        if(isset($_GET['status']))
        {
            $status = \Request::get('status');
        }

        if(isset($_GET['key']))
        {
            $key =  \Request::get('key');
        }

        //Gender
        if(isset($_GET['gender']) && $_GET['gender']!= "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('GioiTinh',$gender)->paginate(10);
        }

        //Chức vụ
        if(isset($_GET['chucvu']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
            
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->paginate(10);
        }

        //Tình trạng
        if(isset($_GET['status']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
            
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idTinhTrang', $status)->paginate(10);
        }

        //Key
         if(isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] != "")
        {

            $danhsach_nhanvien = TaiKhoan::where(function ($query) {
                                                $query->where('idGroup', '<', 3);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
            
           
        }


        //Giới tính và chức vụ
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('GioiTinh',$gender)->paginate(10);
        }

        //Giới tính và tình trạng
        if(isset($_GET['gender']) && isset($_GET['status']) &&  $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('GioiTinh',$gender)->where('idTinhTrang', $status)->paginate(10);
        }


        //Giới tính và key
        if(isset($_GET['gender']) && isset($_GET['key']) &&  $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
            
                $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($gender) {
                                                $query->where('GioiTinh', $gender);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);


            
        }

        //Chức vụ & tình trạng
        if(isset($_GET['chucvu']) && isset($_GET['status']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('idTinhTrang', $status)->paginate(10);
        }

        //Chức vụ và key
        if(isset($_GET['chucvu']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($chucvu) {
                                                $query->where('idGroup', $chucvu);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }


        //Tình trạng và key
        if(isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($status) {
                                                $query->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Gioi tính và chức vụ và tình trạng
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['status']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] == "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where('idGroup',$chucvu)->where('GioiTinh', $gender)->where('idTinhTrang', $status)->paginate(10);
        }

        //Gioi tính và chức vụ và key
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] =="" && $_GET['key'] != "")
        {
             
           $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($gender, $chucvu){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idGroup',$chucvu);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Gioi tính và tình trạng và key
        if(isset($_GET['gender']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] =="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where('idGroup', '<', 3)->where(function ($query) use ($gender,                                      $chucvu, $status){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        //Chức vụ và tình trạng và key
        if(isset($_GET['chucvu']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] == "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
           $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($chucvu, $status){
                                                $query->where('idGroup',$chucvu)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);

        }

        //Gioi tính và chức vụ và tình trạng và key
        if(isset($_GET['gender']) && isset($_GET['chucvu']) && isset($_GET['status']) && isset($_GET['key']) && $_GET['gender'] != "" && $_GET['chucvu'] !="" && $_GET['status'] !="" && $_GET['key'] != "")
        {
             
            $danhsach_nhanvien = TaiKhoan::where(function ($query) use ($gender, $chucvu, $status){
                                                $query->where('GioiTinh', $gender)
                                                ->where('idGroup',$chucvu)
                                                ->where('idTinhTrang', $status);
                                            })
                                            ->where(function ($query) use($key) {
                                                $query->orwhere('HoTen','like','%'.$key.'%')
                                                ->orwhere('Username','like','%'.$key.'%')
                                                ->orWhere('DiaChi','like','%'.$key.'%')
                                                ->orWhere('Email','like','%'.$key.'%');
                                            })->paginate(10);
        }

        return view('admin.nhanvien.danhsach', ['danhsach_nhanvien' => $danhsach_nhanvien, 'nhanvien_sort_gender' => $nhanvien_sort_gender, 'nhanvien_sort_chucvu' => $nhanvien_sort_chucvu, 'nhanvien_sort_tinhtrang' => $nhanvien_sort_tinhtrang]);
    }

    public function postSua(Request $request,$id)
    {
        $this ->validate($request, [
                            'txt_hoten' => 'required|max:50|min:10',
                            'txt_ten_dang_nhap' => 'required|max:20|min:5',
                            'txt_sdt' => 'required|numeric',
                            'txt_diachi' => 'required',
                            'txt_luong' => 'required|numeric|min:200000|max:10000000',
                            'txt_email' => 'required',
             


                            ],
                            ['txt_hoten.required'=>'Vui lòng nhập họ tên',
                            'txt_hoten.max'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',
                            'txt_hoten.min'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',

                             'txt_ten_dang_nhap.required'=>'Vui lòng nhập tên đăng nhập',
                             //'txt_ten_dang_nhap.unique'=>'Tên đăng nhập này đã tồn tại',
                             'txt_ten_dang_nhap.max'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',
                             'txt_ten_dang_nhap.min'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',

                             'txt_diachi.required' => 'Vui lòng nhập địa chỉ',

                             'txt_sdt.required' => 'Vui lòng nhập số điện thoại',
                             //'txt_sdt.unique'=>'Số điện thoại này đã tồn tại',
                             //'txt_sdt.max'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 số',
                             //'txt_sdt.min'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 1',
                             'txt_sdt.numeric' => 'Không phải số điện thoại',


                             'txt_luong.required' => 'Vui lòng nhập lương',
                             'txt_luong.max'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.min'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.numeric' => 'Không phải định dạng số',

                             'txt_email.required' => 'Vui lòng nhập email',
                             //'txt_email.unique' => 'Email này đã tồn tại'

              

                             


                            ]);
        $nv= TaiKhoan::find($id);
        $nv->HoTen = $request ->txt_hoten;
        $nv->Username = $request ->txt_ten_dang_nhap;
        $nv->Email = $request ->txt_email;
        $nv->GioiTinh = $request ->gender;
        $nv->DienThoai = $request ->txt_sdt;
        $nv->DiaChi = $request ->txt_diachi;
        $nv->Luong = $request ->txt_luong;
        $nv->idGroup = $request->cb_chucvu;
        $nv->NgayCapNhat = date("Y-m-d H:i:s");

        if(Input::file('upload_img'))
        {
        $name_img = Input::file('upload_img')->getClientOriginalName();
        Input::file('upload_img')->move("assets/img/", $name_img);
     
        $nv->HinhDaiDien = $name_img;
        }
        $nv ->save();
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
        return redirect('admin/nhanvien/sua/'.$id)->with('thongbao', 'Sửa thành công');

     
    }

    public function getThem ()
    {
       return view('admin.nhanvien.them');
    }

    public function postThem(Request $request)
    {
        
        //$nv= new TaiKhoan;
        
        //$MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");//Tạo mã tài khoản

        
        $this ->validate($request, [
                            'txt_hoten' => 'required|max:50|min:10',
                            'txt_ten_dang_nhap' => 'required|max:20|min:5|unique:taikhoan,Username',
                            'txt_sdt' => 'required|numeric|unique:taikhoan,DienThoai',
                            'txt_diachi' => 'required',
                            'txt_luong' => 'required|numeric|min:200000|max:10000000',
                            'txt_email' => 'required|unique:taikhoan,Email',
                            'txt_mat_khau' =>'required|min:3|max:30',
                            'txt_mat_khau_again'=>'required|same:txt_mat_khau',
                     


                            ],
                            ['txt_hoten.required'=>'Vui lòng nhập họ tên',
                            'txt_hoten.max'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',
                            'txt_hoten.min'=>'Họ tên chứa ít nhất 10 kí tự, nhiều nhất 50 kí tự',

                             'txt_ten_dang_nhap.required'=>'Vui lòng nhập tên đăng nhập',
                             'txt_ten_dang_nhap.unique'=>'Tên đăng nhập này đã tồn tại',
                             'txt_ten_dang_nhap.max'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',
                             'txt_ten_dang_nhap.min'=>'Tên đăng nhập chứa ít nhất 5 kí tự, nhiều nhất 20 kí tự',

                             'txt_diachi.required' => 'Vui lòng nhập địa chỉ',

                             'txt_sdt.required' => 'Vui lòng nhập số điện thoại',
                             'txt_sdt.unique'=>'Số điện thoại này đã tồn tại',
                             //'txt_sdt.max'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 số',
                             //'txt_sdt.min'=>'Số điện thoại chứa ít nhất 10 số, nhiều nhất 11 1',
                             'txt_sdt.numeric' => 'Không phải số điện thoại',


                             'txt_luong.required' => 'Vui lòng nhập lương',
                             'txt_luong.max'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.min'=>'Lương > 2 000 000 VNĐ và < 10 000 000 VNĐ',
                             'txt_luong.numeric' => 'Không phải định dạng số',

                             'txt_email.required' => 'Vui lòng nhập email',
                             'txt_email.unique' => 'Email này đã tồn tại',

                             'txt_mat_khau.required' => 'Vui lòng nhập mật khẩu',
                             'txt_mat_khau.min' => 'Mật khẩu chứa ít nhất 3 kí tự, tối đa 30 kí tự',
                             'txt_mat_khau.max' => 'Mật khẩu chứa ít nhất 3 kí tự, tối đa 30 kí tự',

                             'txt_mat_khau_again.required' => 'Vui lòng nhập lại mật khẩu',
                             'txt_mat_khau_again.same' => 'Mật khẩu nhập lại chưa khớp',

                            

                            
                            ]);
        $nv= new TaiKhoan;
        $MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");
        //echo $MaTaiKhoan[0]->MaTaiKhoan;
        //$MaTaiKhoan = DB::select("EXEC Them_Lay_Ma_Tai_Khoan");//Tạo mã tài khoản
        $nv->MaTaiKhoan = $MaTaiKhoan[0]->MaTaiKhoan;
        $nv->HoTen = $request ->txt_hoten;
        $nv->Username = $request ->txt_ten_dang_nhap;
        $nv->Email = $request ->txt_email;
        $nv->GioiTinh = $request ->gender;
        $nv->DienThoai = $request ->txt_sdt;
        $nv->DiaChi = $request ->txt_diachi;
        $nv->Luong = $request ->txt_luong;
        $nv->idGroup = $request->cb_chucvu;
        $nv->Pass = bcrypt($request->txt_mat_khau);
        $nv->idTinhTrang = 4;
        $nv->NgayDangKy = date("Y-m-d H:i:s");
        $nv->NgayCapNhat = date("Y-m-d H:i:s");

        if(Input::file('upload_img'))
        {
        $name_img = Input::file('upload_img')->getClientOriginalName();
        Input::file('upload_img')->move("assets/img/", $name_img);
     
        $nv->HinhDaiDien = $name_img;
        }
        $nv ->save();
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
        return redirect('admin/nhanvien/danhsach')->with('thongbao', 'Thêm thành công');
        // foreach($MaTaiKhoan as $item)
        // {
        //     $nv->MaTaiKhoan = $MaTaiKhoan;
        //     echo $nv;
        // }
        
        //return redirect('get_sua_nhanvien', $id)->with('thongbao', 'Sửa thành công');
     //return redirect('admin/nhanvien/them')->with('thongbao', $Ma);
    

     
    }
}
