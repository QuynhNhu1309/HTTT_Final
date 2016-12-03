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
        $idTinhTrang = null;
        $idTaiKhoan = null;
        $query = DB::table('dbo.donhang')
                        ->join('dbo.taikhoan', 'dbo.donhang.idTaiKhoan', '=', 'dbo.taikhoan.id')
                        ->join('dbo.tinhtrang', 'dbo.donhang.idTinhTrang', '=', 'dbo.tinhtrang.id')
                        ->select('dbo.donhang.*', 'dbo.taikhoan.HoTen', 'dbo.tinhtrang.TinhTrang')
                        ->orderby('MaDonHang', 'desc');
        if($request->has('tinhtrang'))
        {
            $idTinhTrang = $request->input('tinhtrang');
            $query->where('dbo.donhang.idTinhTrang', '=', $idTinhTrang);
        }
        if($request->has('taikhoan'))
        {
            $idTaiKhoan = $request->input('taikhoan');
            $query->where('idTaiKhoan', '=', $idTaiKhoan);
        }
        $dsDonHang = $query->paginate(10);
        return view('admin.donhang.danhsach')
                    ->with('dsDonHang', $dsDonHang)
                    ->with('idTinhTrang', $idTinhTrang)
                    ->with('idTaiKhoan', $idTaiKhoan);
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
        'idTinhTrang' => 13);


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
    public function show($idDonHang)
    {
        $donHang = DB::table('donhang')
                    ->where('id', $idDonHang)
                    ->first();
        $idKhachHang = $donHang->idKhachHang;
        $thongTinKhachHang =  DB::table('khachhang')
                                ->where('id', $idKhachHang)
                                ->first();
        $dsChiTietDonHang = DB::table('donhang_chitiet')
                            ->join('sanpham', 'donhang_chitiet.idSanPham', '=', 'sanpham.id')
                            ->select('donhang_chitiet.*','sanpham.MaSP')
                            ->where('idDonHang', $idDonHang)
                            ->get();
        return view('admin.donhang.chitiet')
                ->with('thongTinKhachHang', $thongTinKhachHang)
                ->with('dsChiTietDonHang', $dsChiTietDonHang)
                ->with('donHang', $donHang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idDonHang)
    {
        $donHang = DB::table('donhang')
                    ->where('id', $idDonHang)
                    ->first();
        $idKhachHang = $donHang->idKhachHang;
        $thongTinKhachHang =  DB::table('khachhang')
                                ->where('id', $idKhachHang)
                                ->first();
        $dsChiTietDonHang = DB::table('donhang_chitiet')
                            ->join('sanpham', 'donhang_chitiet.idSanPham', '=', 'sanpham.id')
                            ->select('donhang_chitiet.*','sanpham.MaSP')
                            ->where('idDonHang', $idDonHang)
                            ->get();
        return view('admin.donhang.sua')
                ->with('thongTinKhachHang', $thongTinKhachHang)
                ->with('dsChiTietDonHang', $dsChiTietDonHang)
                ->with('donHang', $donHang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($idDonHang, $idTinhTrang)
    {
        if($idTinhTrang == "14")
        {
            DB::table('donhang')
                ->where('id', $idDonHang)
                ->update(['idTinhTrang' => $idTinhTrang]);
        }
        elseif ($idTinhTrang == "15")
        {
            $dsChiTietDonHang = DB::table('donhang_chitiet')
                                ->join('sanpham', 'donhang_chitiet.idSanPham', '=', 'sanpham.id')
                                ->select('donhang_chitiet.*','sanpham.SoLuongTonKho')
                                ->where('idDonHang', $idDonHang)
                                ->get();
            foreach($dsChiTietDonHang as $chiTietDonHang)
            {
                DB::table('sanpham')
                    ->where('id', $chiTietDonHang->idSanPham)
                    ->update(['SoLuongTonKho' => $chiTietDonHang->SoLuongTonKho + $chiTietDonHang->SoLuong]);
            }
            DB::table('donhang')
                ->where('id', $idDonHang)
                ->update(['idTinhTrang' => $idTinhTrang]);
        }
        return redirect('/admin/donhang/danhsach');
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
    
    public function removeChiTietDonHang($idDonHang, $idChiTietDonHang)
    {
        // Lay du lieu de truy van
        $chiTietDonHang = DB::table('donhang_chitiet')
                            ->where('id', '=', $idChiTietDonHang)
                            ->first();
        $soLuongSanPhamBan = $chiTietDonHang->SoLuong;
        $idSanPham = $chiTietDonHang->idSanPham;
        $sanPham = DB::table('sanpham')
                    ->where('id','=', $idSanPham)
                    ->first();
        $soLuongTonSanPhamBan = $sanPham->SoLuongTonKho;
        $donGiaSanPhamBan = $sanPham->GiaBanHienTai;

        // Cap nhat lai so luong ton cua san pham theo idSanPham trong chi tiet don hang
        $sanPhamUpdate = DB::table('sanpham')
                        ->where('id','=',$idSanPham)
                        ->update(['SoLuongTonKho' => $soLuongTonSanPhamBan + $soLuongSanPhamBan]);

        // Cap nhat tong tien moi cho don hang
        $donHang = DB::table('donhang')->where('id', '=', $idDonHang)->first();
        $tongTienDonHang = $donHang->TongTien;
        $tongTienMoi = $tongTienDonHang - ($soLuongSanPhamBan*$donGiaSanPhamBan);
        DB::table('donhang')->where('id', '=', $idDonHang)
                            ->update(['TongTien' => $tongTienMoi]);

        // Xoa chi tiet don hang
        $thanhCong = DB::table('donhang_chitiet')->where('id', '=', $idChiTietDonHang)->delete();

        // Kiem tra neu khong con chi tiet nao thi cap nhat tinh trang cua don hang thanh Huy
        $dsChiTietDonHang = DB::table('donhang_chitiet')
                            ->where('idDonHang', '=', $idDonHang)
                            ->first();
        if($dsChiTietDonHang == null)
        {
            $thanhCong = DB::table('donhang')->where('id', '=', $idDonHang)
                            ->update(['idTinhTrang' => 15]);
        }

        return json_encode($thanhCong);
    }
    
    public function danhSachChiTiet($idDonHang)
    {
        $dsChiTietDonHang = DB::table('donhang_chitiet')
                                ->join('sanpham', 'donhang_chitiet.idSanPham', '=', 'sanpham.id')
                                ->select('donhang_chitiet.*','sanpham.MaSP')
                                ->where('idDonHang','=',$idDonHang)
                                ->get();
       return json_encode($dsChiTietDonHang);
    }
}
