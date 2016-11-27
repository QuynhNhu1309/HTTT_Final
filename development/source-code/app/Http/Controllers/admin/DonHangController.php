<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trangHienTai = $request->input('trang');
        $idTinhTrang = $request->input('tinhtrang');
        $idTaiKhoan = $request->input('taikhoan');
        $dsDonHang = $this->execute_sp('dbo.sp_get_dsdonhang', ['Trang' => $trangHienTai, 
                                                    'idTinhTrang' => $idTinhTrang,
                                                    'idTaiKhoan' => $idTaiKhoan,
                                                    'SoDongMotTrang' => 10]);
        return view('admin.donhang.danhsach')
                    ->with('dsDonHang', $dsDonHang);
    }

    public function execute_sp($procedureName, $parameters)
    {
        $spParameters = '';
        foreach($parameters as $key => $parameter){
            if(isset($parameter)){
                $spParameters .= ' @'.$key.'='.$parameter;
            }
        }
        $spParameters = trim($spParameters);
        $spParameters = str_replace(' ',',',$spParameters);
        $preparedStatement = 'DECLARE	@return_value int
                                EXEC	@return_value = '.$procedureName.' '.
                                $spParameters.
                                'SELECT	\'Return Value\' = @return_value';
        $result = DB::select($preparedStatement);
        return $result;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.donhang.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donHangInsert = array('procedureName' => '[dbo].[Them_Don_Hang]',
        'idTaiKhoan' => (int)Auth::user()->id, 
        'idKhachHang' => (int)$request->thongTinKhachHang['id'], 
        'thoiDiemDatHang' => date("Y-m-d H:i:s"),
        'tenNguoiNhan' => $request->thongTinKhachHang['HoTen'], 
        'dtNguoiNhan' => $request->thongTinKhachHang['DienThoai'], 
        'diaChi' =>$request->thongTinKhachHang['DiaChi'], 
        'ngayGiao' => date("Y-m-d H:i:s", $request->thongTinKhachHang['ngayGiao']/1000), 
        'tongTien' => (int)$request->tongTien,
        'idTinhTrang' => 1);


        $result = DB::select(DB::raw('
        DECLARE	@return_value int;

        EXEC	@return_value = :procedureName
		@idTaiKhoan = :idTaiKhoan,
		@idKhachHang = :idKhachHang,
		@thoiDiemDatHang = :thoiDiemDatHang,
		@tenNguoiNhan = :tenNguoiNhan,
		@dtNguoiNhan = :dtNguoiNhan,
		@diaChi = :diaChi,
		@ngayGiao = :ngayGiao,
		@tongTien = :tongTien,
		@idTinhTrang = :idTinhTrang'),  $donHangInsert);

        $idDonHang = $result[0]->idDonHang;

        foreach($request->thongTinSanPham as $sanPham)
        {
            $ctdhinsert = array('procedureName' => '[dbo].[Them_Chi_Tiet_Don_Hang]',
            'idDonHang' => (int)$idDonHang,
            'idSanPham' => (int)$sanPham['id'],
            'TenSP' => $sanPham['TenSP'],
            'SoLuong' => (int)$sanPham['soLuong'],
            'Gia' => (int)$sanPham['GiaBanHienTai']);

            $result = DB::select(DB::raw('
            DECLARE	@return_value int;

            EXEC	@return_value = :procedureName
            @idDonHang = :idDonHang,
            @idSanPham = :idSanPham,
            @TenSP = :TenSP,
            @SoLuong = :SoLuong,
            @Gia = :Gia'),  $ctdhinsert);
        }

        return json_encode(true);

    }

    /** 
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function timkhachhang(Request $request)
    {
        $maKhachHang = $request->ma_khach_hang;
        $result = DB::select(DB::raw('select * from khachhang where MaKhachHang = :maKhachHang'),
                                array('maKhachHang' => $maKhachHang));
        return $result;
    }

    public function timsanpham(Request $request)
    {
        $maSanPham = $request->ma_san_pham;
        $result = DB::select(DB::raw('select * from sanpham where MaSP = :maSanPham'),
                                array('maSanPham' => $maSanPham));
        return $result;
    }
    
}
