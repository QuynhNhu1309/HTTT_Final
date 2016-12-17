<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BaoCaoController extends Controller
{
    //

    public function get_baocao_doanhthu ()
    {
         //$ThongKe_DoanhThu_BanHang_Thang = DB::select("EXEC ThongKe_DoanhThu_BanHang_Thang 12");
        // $rs =  $ThongKe_DoanhThu_BanHang_Thang[0]->TongTien;
        $sort_year = DB::select("EXEC ThongKe_DoanhThu_GetYear");
        $thongbao_loi = "";

         if((isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_year']== "" && $_GET['day']=="" && $_GET['s_month']== "") 
         || (isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_year']== "" && $_GET['s_month']!= "") 
         || (isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['day']!="" && ($_GET['s_year']== "" || $_GET['s_month']== "") )
        
         )
         {
             $thongbao_loi = "Vui lòng xem lại thông tin lọc";
         }
            
        $baocao_doanhthu_thang = array();

        if(isset($_GET['s_year']) && $_GET['s_year']!="")
        {
            $year = $_GET['s_year'];
        
            for($i = 1; $i <= 12; $i++)
            {
                $ThongKe_DoanhThu_BanHang_Thang = DB::select("EXEC ThongKe_DoanhThu_BanHang_Thang @year = ".$year.", @month = ".$i."");
                array_push($baocao_doanhthu_thang, $ThongKe_DoanhThu_BanHang_Thang[0]->TongTien);

                
                
            }
            if(isset($_GET['s_year']) && isset($_GET['s_month']) && $_GET['s_month']!= "")
            {
                $baocao_doanhthu_thang = [];
                $sort_month = DB::select("EXEC ThongKe_DoanhThu_GetWeek @year = ".$year."");
                $s_month = $_GET['s_month'];
                $number_week_per_month = $sort_month[$s_month-1]->NumberOfWeeks;
                $rs =  DB::select("EXEC ThongKe_DoanhThu_Week @year = ".$year.", @month = ".$s_month.", @first_day =''");
                //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                array_push($baocao_doanhthu_thang, $rs[0]->TongTien);
                for($i = 2; $i <= $number_week_per_month; $i++)
                {
                    //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                    $rs_firstday= $rs[0]->{'next_week'};
                    $rs =  DB::select("EXEC ThongKe_DoanhThu_Week @year = ".$year.", @month = ".$s_month.", @first_day ='".$rs_firstday."'");
                    $rs_tongtien = $rs[0]->TongTien;
                    array_push($baocao_doanhthu_thang, $rs_tongtien);
                }
            }


            if(isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_month']!= "" && $_GET['day']!="")
            {
                $baocao_doanhthu_thang =[];
                $day = $_GET['day'];
                $rs =  DB::select("EXEC ThongKe_DoanhThu_Day @year = ".$year.", @month = ".$s_month.", @day =".$day."");
                $rs_Ngaygiao= $rs[0]->{'Ngaygiao'};
                array_push($baocao_doanhthu_thang, $rs_Ngaygiao);
                $rs_tongtien = $rs[0]->{'TongTien'};
                array_push($baocao_doanhthu_thang, $rs_tongtien);
                 
                
            }
        }
        else
        {

            $year = date("Y");
            for($i = 1; $i <= 12; $i++)
            {
                $ThongKe_DoanhThu_BanHang_Thang = DB::select("EXEC ThongKe_DoanhThu_BanHang_Thang @year = ".$year.", @month = ".$i."");
                array_push($baocao_doanhthu_thang, $ThongKe_DoanhThu_BanHang_Thang[0]->TongTien);
            }
        }


        return view('admin.baocao.doanhthu',['baocao_doanhthu_thang' => $baocao_doanhthu_thang,
        'sort_year' => $sort_year, 'thongbao_loi'=>$thongbao_loi, 
        'baocao_doanhthu_thang_json' => json_encode($baocao_doanhthu_thang)]);
    }


    public function get_baocao_khohang ()
    {
         //$ThongKe_DoanhThu_BanHang_Thang = DB::select("EXEC ThongKe_DoanhThu_BanHang_Thang 12");
        // $rs =  $ThongKe_DoanhThu_BanHang_Thang[0]->TongTien;
        $sort_year = DB::select("EXEC ThongKe_KhoHang_GetYear");
        $thongbao_loi = "";

         if((isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_year']== "" && $_GET['day']=="" && $_GET['s_month']== "") 
         || (isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_year']== "" && $_GET['s_month']!= "") 
         || (isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['day']!="" && ($_GET['s_year']== "" || $_GET['s_month']== "") )
        
         )
         {
             $thongbao_loi = "Vui lòng xem lại thông tin lọc";
         }
            
        $baocao_khohang_thang = array();

        if(isset($_GET['s_year']) && $_GET['s_year']!="")
        {
            $year = $_GET['s_year'];
        
            for($i = 1; $i <= 12; $i++)
            {
                $ThongKe_KhoHang_Thang = DB::select("EXEC ThongKe_KhoHang_Thang @year = ".$year.", @month = ".$i."");
                array_push($baocao_khohang_thang, $ThongKe_KhoHang_Thang[0]->TongSoLuong);

                
                
            }

            if(isset($_GET['s_year']) && isset($_GET['s_month']) && $_GET['s_month']!= "")
            {
                $baocao_khohang_thang = [];
                $sort_month = DB::select("EXEC ThongKe_DoanhThu_GetWeek @year = ".$year."");
                $s_month = $_GET['s_month'];
                $number_week_per_month = $sort_month[$s_month-1]->NumberOfWeeks;
                $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day =''");
                //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                array_push($baocao_khohang_thang, $rs[0]->TongSoLuong);
                for($i = 2; $i <= $number_week_per_month; $i++)
                {
                    //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                    $rs_firstday= $rs[0]->{'next_week'};
                    $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day ='".$rs_firstday."'");
                    $rs_tongtien = $rs[0]->TongSoLuong;
                    array_push($baocao_khohang_thang, $rs_tongtien);
                }
            }

            if(isset($_GET['s_year']) && isset($_GET['s_month']) && $_GET['s_month']!= "")
            {
                $baocao_khohang_thang = [];
                $sort_month = DB::select("EXEC ThongKe_DoanhThu_GetWeek @year = ".$year."");
                $s_month = $_GET['s_month'];
                $number_week_per_month = $sort_month[$s_month-1]->NumberOfWeeks;
                $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day =''");
                //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                array_push($baocao_khohang_thang, $rs[0]->TongSoLuong);
                for($i = 2; $i <= $number_week_per_month; $i++)
                {
                    //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                    $rs_firstday= $rs[0]->{'next_week'};
                    $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day ='".$rs_firstday."'");
                    $rs_tongtien = $rs[0]->TongSoLuong;
                    array_push($baocao_khohang_thang, $rs_tongtien);
                }
            }


            if(isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_month']!= "" && $_GET['day']!="")
            {
                $baocao_khohang_thang =[];
                $day = $_GET['day'];
                $rs =  DB::select("EXEC ThongKe_KhoHang_Day @year = ".$year.", @month = ".$s_month.", @day =".$day."");
                $rs_Ngaygiao= $rs[0]->{'NgayXuatHoaDon'};
                array_push($baocao_khohang_thang, $rs_Ngaygiao);
                $rs_tongtien = $rs[0]->{'TongSoLuong'};
                array_push($baocao_khohang_thang, $rs_tongtien);
                 
                
            }


           
            
        }
        else
        {

            $year = date("Y");
            for($i = 1; $i <= 12; $i++)
            {
                $ThongKe_KhoHang_Thang = DB::select("EXEC ThongKe_KhoHang_Thang @year = ".$year.", @month = ".$i."");
                array_push($baocao_khohang_thang, $ThongKe_KhoHang_Thang[0]->TongSoLuong);//Lấy tổng số lượng sản phẩm nhập trong 1 năm
            }
        }

  
            

        return view('admin.baocao.khohang',['baocao_khohang_thang' => $baocao_khohang_thang,'sort_year' => $sort_year, 'thongbao_loi'=>$thongbao_loi]);
    }


     public function get_baocao_chiphinhap ()
    {
         //$ThongKe_DoanhThu_BanHang_Thang = DB::select("EXEC ThongKe_DoanhThu_BanHang_Thang 12");
        // $rs =  $ThongKe_DoanhThu_BanHang_Thang[0]->TongTien;
        $sort_year = DB::select("EXEC ThongKe_KhoHang_GetYear");
        $thongbao_loi = "";

         if((isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_year']== "" && $_GET['day']=="" && $_GET['s_month']== "") 
         || (isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_year']== "" && $_GET['s_month']!= "") 
         || (isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['day']!="" && ($_GET['s_year']== "" || $_GET['s_month']== "") )
        
         )
         {
             $thongbao_loi = "Vui lòng xem lại thông tin lọc";
         }
            
        $baocao_chiphinhap_thang = array();

        if(isset($_GET['s_year']) && $_GET['s_year']!="")
        {
            $year = $_GET['s_year'];
        
            for($i = 1; $i <= 12; $i++)
            {
                $ThongKe_KhoHang_Thang = DB::select("EXEC ThongKe_KhoHang_Thang @year = ".$year.", @month = ".$i."");
                array_push($baocao_chiphinhap_thang, $ThongKe_KhoHang_Thang[0]->TongTien);

                
                
            }

            if(isset($_GET['s_year']) && isset($_GET['s_month']) && $_GET['s_month']!= "")
            {
                $baocao_chiphinhap_thang = [];
                $sort_month = DB::select("EXEC ThongKe_DoanhThu_GetWeek @year = ".$year."");
                $s_month = $_GET['s_month'];
                $number_week_per_month = $sort_month[$s_month-1]->NumberOfWeeks;
                $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day =''");
                //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                $rs_firstday= $rs[0]->{'first_day'};
            
                array_push($baocao_chiphinhap_thang, $rs[0]->TongTien);
                
                for($i = 2; $i <= $number_week_per_month; $i++)
                {
                    //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                    $rs_firstday= $rs[0]->{'the_next'};
                  
                    
                    $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day ='".$rs_firstday."'");
                    $rs_tongtien = $rs[0]->TongTien;
                   
                    array_push($baocao_chiphinhap_thang, $rs_tongtien);
                }
               
            }

            if(isset($_GET['s_year']) && isset($_GET['s_month']) && $_GET['s_month']!= "")
            {
                $baocao_chiphinhap_thang = [];
                $sort_month = DB::select("EXEC ThongKe_DoanhThu_GetWeek @year = ".$year."");
                $s_month = $_GET['s_month'];
                $number_week_per_month = $sort_month[$s_month-1]->NumberOfWeeks;
                $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day =''");
                //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                array_push($baocao_chiphinhap_thang, $rs[0]->TongTien);
                for($i = 2; $i <= $number_week_per_month; $i++)
                {
                    //array_push($baocao_doanhthu_thang,$rs[0]->{'next_week'});
                    $rs_firstday= $rs[0]->{'next_week'};
                    $rs =  DB::select("EXEC ThongKe_KhoHang_Week @year = ".$year.", @month = ".$s_month.", @first_day ='".$rs_firstday."'");
                    $rs_tongtien = $rs[0]->TongTien;
                    array_push($baocao_chiphinhap_thang, $rs_tongtien);
                }
            }


            if(isset($_GET['s_year']) && isset($_GET['s_month']) && isset($_GET['day']) && $_GET['s_month']!= "" && $_GET['day']!="")
            {
                $baocao_chiphinhap_thang =[];
                $day = $_GET['day'];
                $rs =  DB::select("EXEC ThongKe_KhoHang_Day @year = ".$year.", @month = ".$s_month.", @day =".$day."");
                $rs_Ngaygiao= $rs[0]->{'NgayXuatHoaDon'};
                array_push($baocao_chiphinhap_thang, $rs_Ngaygiao);
                $rs_tongtien = $rs[0]->{'TongTien'};
                array_push($baocao_chiphinhap_thang, $rs_tongtien);
                 
                
            }


           
            
        }
        else
        {

            $year = date("Y");
            for($i = 1; $i <= 12; $i++)
            {
                $ThongKe_KhoHang_Thang = DB::select("EXEC ThongKe_KhoHang_Thang @year = ".$year.", @month = ".$i."");
                array_push($baocao_chiphinhap_thang, $ThongKe_KhoHang_Thang[0]->TongTien);//Lấy tổng số lượng sản phẩm nhập trong 1 năm
            }
        }

  
            

        return view('admin.baocao.chiphinhap',['baocao_chiphinhap_thang' => $baocao_chiphinhap_thang,'sort_year' => $sort_year, 'thongbao_loi'=>$thongbao_loi]);
    }

    public function excel_doanhthu(Request $request)
    {   
        $baocao_doanhthu_thang = json_decode($request->baocao_doanhthu_thang_json);
        $data = $baocao_doanhthu_thang;
        // Tạo file excel với tên là Báo cáo doanh thu
        Excel::create('Báo cáo doanh thu', function($excel) use ($data) {
            // Đặt tiêu đề
            $excel->setTitle('Báo cáo doanh thu');
            // Đặt tên người tạo và công ty
            $excel->setCreator('Xuan Huynh')
                ->setCompany('Minx Corp');
            // Đặt mô tả
            $excel->setDescription('Bản báo cáo doanh thu của doanh nghiệp trong xxx tháng');

            $excel->sheet('Sheet 1', function($sheet) use ($data) {
                $sheet->setOrientation('landscape');
                // Nhập dữ liệu vào file Excel
                foreach($data as $key=>$value)
                {
                    $sheet->row($key+1, array(
                        $key+1, $value
                    ));
                }
            });

        })->export('xls');
        return back();
    }

}
