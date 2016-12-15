<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\LoaiSanPham;
use App\TinhTrang;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
class SanphamController extends Controller
{
    //
    public function getDanhSach ()
    {
        //$data = SanPham::paginate(15);
        $loaisp = DB::table('loaisp')->get();
        $search = \Request::get('search');
        $data = SanPham::where('TenSP','like','%'.$search.'%')->orwhere('MoTa','like','%'.$search.'%')->paginate(10);

         if(isset($_GET['s_loaisp']))
        {
            $s_loaisp = \Request::get('s_loaisp');
        }

        if(isset($_GET['status']))
        {
            $status = \Request::get('status');
        }

        if(isset($_GET['cost_min']))
        {
            $cost_min =  \Request::get('cost_min');
        }

        if(isset($_GET['cost_max']))
        {
            $cost_max =  \Request::get('cost_max');
        }

         //Loại SP
        if(isset($_GET['s_loaisp']) && $_GET['s_loaisp']!= "" && $_GET['status'] =="" && $_GET['cost_min'] =="" && $_GET['cost_max'] == "")
        {
            $data = SanPham::where('idLoai',$s_loaisp)->paginate(10);
        }


        //Check tình trạng còn hàng

        if(isset($_GET['status']) && $_GET['status']!= "" && $_GET['s_loaisp'] =="" && $_GET['cost_min'] =="" && $_GET['cost_max'] == "")
        {

            if($_GET['status'] == 1)
            {
                $data = SanPham::where('SoLuongTonKho','>', 10)->paginate(10);
            }

            if($_GET['status'] == 2)
            {
                $data = SanPham::whereBetween('SoLuongTonKho',[1, 10])->paginate(10);
            }

            if($_GET['status'] == 3)
            {
                $data = SanPham::where('SoLuongTonKho', 0)->paginate(10);
            }
        }

        if(isset($_GET['cost_max']) && $_GET['cost_max']!= "" && isset($_GET['cost_min']) && $_GET['cost_min']!= "" &&  $_GET['s_loaisp'] =="" && $_GET['status'] =="")
        {
           if($cost_max >= $cost_min)
           {
               $data = SanPham::whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
           }

        }

        //Cost & loaisp

        if(isset($_GET['s_loaisp']) && $_GET['s_loaisp']!= "" && isset($_GET['cost_max']) && $_GET['cost_max']!= "" && isset($_GET['cost_min']) && $_GET['cost_min']!= "" && $_GET['status'] =="")
        {
           if($cost_max >= $cost_min)
           {
               $data = SanPham::where('idLoai',$s_loaisp)->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
           }

        }

        //Status & loaisp

        if(isset($_GET['s_loaisp']) && $_GET['s_loaisp']!= "" && $_GET['cost_max']== "" && $_GET['cost_min']== "" && isset($_GET['status']) && $_GET['status'] !="")
        {
               if($_GET['status'] == 1)
            {
                $data = SanPham::where('idLoai',$s_loaisp)->where('SoLuongTonKho','>', 10)->paginate(10);
            }

            if($_GET['status'] == 2)
            {
                $data = SanPham::where('idLoai',$s_loaisp)->whereBetween('SoLuongTonKho',[1, 10])->paginate(10);
            }

            if($_GET['status'] == 3)
            {
                $data = SanPham::where('idLoai',$s_loaisp)->where('SoLuongTonKho', 0)->paginate(10);
            }
           

        }

        //Status & cost

        if(isset($_GET['cost_max']) && $_GET['cost_max']!= "" && isset($_GET['cost_min']) && $_GET['cost_min']!= ""  && isset($_GET['status']) && $_GET['status'] !="" && $_GET['s_loaisp']== "")
        {
               if($cost_max >= $cost_min)
           {

               if($_GET['status'] == 1)
            {
                $data = SanPham::where('SoLuongTonKho','>', 10)->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
            }

            if($_GET['status'] == 2)
            {
                $data = SanPham::whereBetween('SoLuongTonKho',[1, 10])->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
            }

            if($_GET['status'] == 3)
            {
                $data = SanPham::where('SoLuongTonKho', 0)->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
            }
               
        }
        }

        //Status & cost

        if(isset($_GET['cost_max']) && $_GET['cost_max']!= "" && isset($_GET['cost_min']) && $_GET['cost_min']!= ""  && isset($_GET['status']) && $_GET['status'] !="" && isset($_GET['s_loaisp']) && $_GET['s_loaisp']!= "")
        {
               if($cost_max >= $cost_min)
           {

               if($_GET['status'] == 1)
            {
                $data = SanPham::where('idLoai',$s_loaisp)->where('SoLuongTonKho','>', 10)->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
            }

            if($_GET['status'] == 2)
            {
                $data = SanPham::where('idLoai',$s_loaisp)->whereBetween('SoLuongTonKho',[1, 10])->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
            }

            if($_GET['status'] == 3)
            {
                $data = SanPham::where('idLoai',$s_loaisp)->where('SoLuongTonKho', 0)->whereBetween('GiaBanHienTai', [$cost_min, $cost_max])->paginate(10);
            }
               
        }

           

        }
        

    	return view('admin.sanpham.danhsach',['sp' => $data,'loaisp' => $loaisp]);
    }


    public function getDanhSach_hethang ()
    {
        $loaisp = DB::table('loaisp')->get();
        $search = \Request::get('search');
        $data = SanPham::where('TenSP','like','%'.$search.'%')->orwhere('MaSP','like','%'.$search.'%')->paginate(2);

        $data = SanPham::whereBetween('SoLuongTonKho', [0, 10])
                                            ->where(function ($query) use($search) {
                                                $query->orwhere('TenSP','like','%'.$search.'%')->orwhere('MaSP','like','%'.$search.'%');
                                            })->paginate(10);

         if(isset($_GET['status']))
        {
            $status = \Request::get('status');
        }

         if(isset($_GET['status']) && $_GET['status']!= "")
        {
            if($_GET['status'] == 2)
            {
                $data = SanPham::whereBetween('SoLuongTonKho',[1, 10])->paginate(10);
            }

            if($_GET['status'] == 3)
            {
                $data = SanPham::where('SoLuongTonKho', 0)->paginate(10);
            }
        }



        return view('admin.sanpham.ds_hethang',['sp' => $data,'loaisp' => $loaisp]);
    }




    public function getThem(){
        $data = DB::table('loaisp')->get();

        $data1 = DB::table('TinhTrang')->where('TenBang','sanpham')->get();
        return view('admin.sanpham.them',['data'=>$data,'data1'=>$data1]);

    }

    public function postThem(Request $request){
        $sp           = new SanPham;
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
       return redirect('admin/sanpham/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getXoa($id){

       $parent = SanPham::where('id',$id)->count();
    	if ($parent == 1) {
            
    		$sp = SanPham::find($id);
			$sp->delete($id);
			echo '<script type="text/javascript">
    			alert("Xóa Thành Công !");
    			window.location = "';    			echo route('getSPList');
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

       $sp = SanPham::find($id);
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
       return redirect('admin/sanpham/sua/'.$id)->with('thongbao', 'Sửa thành công');
    }


    
}
