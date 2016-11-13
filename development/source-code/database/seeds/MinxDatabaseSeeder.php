<?php

use Illuminate\Database\Seeder;
use App\SanPham;
use App\GiaoDich;
use App\ChiTietGiaoDich;

class MinxDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Declare variables and place them up top
        //$randomString=self::createRandomString();
        //$quantityOfSanPhamRecords=100;

        self::seedKhachHangTable();
        //self::seedTaiKhoanTable();
        self::seedDonHangTable();
        // Then we will execute functions
        // self::seedDanhMucSanPhamTable();
        // self::seedSanPhamTable($randomString, $quantityOfSanPhamRecords);
        // self::seedGiaoDichTable($randomString, $quantityOfSanPhamRecords);
        // self::seedTaiKhoanTable($randomString, $quantityOfSanPhamRecords);
        // self::seedChiTietGiaoDichTable($quantityOfSanPhamRecords);
    }

    private function seedKhachHangTable()
    {
        for($i=0;$i<40;$i++){
        DB::table('dbo.khachhang')->insert([
            // 'id' => 1,
            'MaKhachHang' => 'K01',
            'HoTen' => 'Xuan',
            'DiaChi' => '1',
            'DienThoai' => '1',
            'NgayDangKy' => '10/10/2016',
            'NgayCapNhat' => '10/10/2016',
            'idTaiKhoan' => 1,
        ]);
        }
    }

    private function seedTaiKhoanTable()
    {
        DB::table('dbo.taikhoan')->insert([
            // 'id' => 1,
            'MaTaiKhoan' => '1',
            'HoTen' => 'Nhieu',
            'GioiTinh' => 1,
            'HinhDaiDien' => 'abx',
            'Username' => 'abc',
            'Pass' => 'abc',
            'DiaChi' => 'abc',
            'DienThoai' => '1',
            'Email' => 'abc',
            'NgayDangKy' => '10/10/2016',
            'NgayCapNhat' => '10/10/2016',
            'idGroup' => 1,
            'Luong' => 1,
            'idTinhTrang' => 1,
        ]);
    }

    private function seedDonHangTable()
    {
        for($i=0;$i<40;$i++){
            DB::table('dbo.donhang')->insert([
                'MaDonHang' => 'DH01',
                'idTaiKhoan' => 1,
                'idKhachHang' => 1,
                'ThoiDiemDatHang' => '10/10/2016',
                'TenNguoiNhan' => 'abc',
                'DTNguoiNhan' => '1',
                'DiaChi' => '1',
                'Ngaygiao' => '10/10/2016',
                'TongTien' => 2,
                'idTinhTrang' => 1,
            ]);
        }
    }

    
}
