<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

  
            //return $baocao_doanhthu_thang;

        return view('admin.baocao.doanhthu',['baocao_doanhthu_thang' => $baocao_doanhthu_thang,'sort_year' => $sort_year, 'thongbao_loi'=>$thongbao_loi]);
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

  
            //return $baocao_doanhthu_thang;

        return view('admin.baocao.doanhthu',['baocao_doanhthu_thang' => $baocao_doanhthu_thang,'sort_year' => $sort_year, 'thongbao_loi'=>$thongbao_loi]);
    }
}
