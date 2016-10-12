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
        $randomString=self::createRandomString();
        $quantityOfSanPhamRecords=100;

        // Then we will execute functions
        self::seedDanhMucSanPhamTable();
        self::seedSanPhamTable($randomString, $quantityOfSanPhamRecords);
        self::seedGiaoDichTable($randomString, $quantityOfSanPhamRecords);
        self::seedTaiKhoanTable($randomString, $quantityOfSanPhamRecords);
        self::seedChiTietGiaoDichTable($quantityOfSanPhamRecords);
    }

    private function createRandomString()
    {
        $randomString='';
        $randomStringArray=[];
        for($i=0;$i<100;$i++){
            array_push($randomStringArray,str_random(rand(2,8)));
        }
        $randomString=implode(' ',$randomStringArray);
        return $randomString;
    }

    private function seedDanhMucSanPhamTable()
    {
        $tenDanhMucSanPhamArray=array('Giày','Thắt lưng','Balo, túi xách','Giày bata','Giày búp bê','Giày cao gót','Thắt lưng da cá sấu','Thắt lưng da bò');
        for($i=0;$i<count($tenDanhMucSanPhamArray);$i++){
            $randomInteger= rand(1202055681,1362055681);
            $randomDate = date("Y-m-d H:i:s",$randomInteger);
            DB::table('danh_muc_san_pham')->insert([
                'ten' => $tenDanhMucSanPhamArray[$i],
                'slug' => str_slug($tenDanhMucSanPhamArray[$i]),
                'tinh_trang' => rand(0,2),
                'ngay_tao' => $randomDate,
                'ngay_cap_nhat' => $randomDate,
            ]);
        }
    }

    private function seedSanPhamTable($randomString, $quantityOfSanPhamRecords)
    {
        for($i=0;$i<$quantityOfSanPhamRecords;$i++){
            $randomInteger= rand(1202055681,1362055681);
            $randomDate = date("Y-m-d H:i:s",$randomInteger);
            $ten=substr($randomString,0,rand(20,100));

            $randomString=str_shuffle($randomString);
            DB::table('san_pham')->insert([
                'id_danh_muc_san_pham' => rand(1,9),
                'ten' => $ten,
                'anh_dai_dien' => str_random(10),
                'anh_chi_tiet_1' => str_random(10),
                'anh_chi_tiet_2' => str_random(10),
                'anh_chi_tiet_3' => str_random(10),
                'mo_ta' => $randomString,
                'so_luong_ton_kho' => rand(0,200),
                'don_gia_ban' => rand(100,700)*1000,
                'nha_san_xuat' => substr($randomString,0,rand(20,30)),
                'slug' => str_slug($ten),
                'tinh_trang' => rand(0,2),
                'ngay_tao' => $randomDate,
                'ngay_cap_nhat' => $randomDate,
            ]);
        }
    }

    private function seedGiaoDichTable($randomString, $quantityOfSanPhamRecords)
    {
        for($i=0;$i<$quantityOfSanPhamRecords;$i++){
            $randomInteger= rand(1202055681,1362055681);
            $randomDate = date("Y-m-d H:i:s",$randomInteger);
            $randomString=str_shuffle($randomString);
            $randomPhone ='0'.rand(1000000000,1290000000);
            DB::table('giao_dich')->insert([
                'id_tai_khoan' => rand(1,100000),
                'giao_dich_cod' => rand(0,1),
                'giao_dich_truc_tuyen' => rand(0,1),
                'id_giao_dich_truc_tuyen' => rand(0,20),
                'id_tai_khoan_giao_dich_truc_tuyen' => str_random(10),
                'thoi_gian_giao_dich' => $randomDate,
                'dia_chi_giao_hang' => substr($randomString,0,rand(20,30)),
                'so_dien_thoai_giao_hang' => $randomPhone,
                'ten_nguoi_nhan' => substr($randomString,0,rand(20,30)),
                'ma_khuyen_mai' => str_random(5),
                'tong_tien' => 0,
                'tinh_trang' => rand(0,2),
                'ngay_tao' => $randomDate,
                'ngay_cap_nhat' => $randomDate,
            ]);
        }
    }

    private function seedChiTietGiaoDichTable($quantityOfSanPhamRecords)
    {
        for($i=0;$i<$quantityOfSanPhamRecords;$i++){
            $idGiaoDich=rand(1,$quantityOfSanPhamRecords-1);
            $idSanPham=rand(1,$quantityOfSanPhamRecords-1);
            $sanPham=SanPham::find($idSanPham);
            $soLuong=rand(1,$sanPham->so_luong_ton_kho);
            DB::table('chi_tiet_giao_dich')->insert([
                'id_giao_dich' => $idGiaoDich,
                'id_san_pham' => $idSanPham,
                'so_luong' => $soLuong,
                'don_gia_san_pham' => $sanPham->don_gia_ban,
                'tong_tien' => $soLuong*$sanPham->don_gia_ban,
            ]);
            $sanPham->so_luong_ton_kho=$sanPham->so_luong_ton_kho-$soLuong;
            $sanPham->save();
            $giaoDich=GiaoDich::find($idGiaoDich);
            $giaoDich->tong_tien=$giaoDich->tong_tien+$soLuong*$sanPham->don_gia_ban;
            $giaoDich->save();
        }
    }

    private function seedTaiKhoanTable($randomString, $quantityOfSanPhamRecords)
    {
        for($i=0;$i<$quantityOfSanPhamRecords;$i++){
            $randomInteger= rand(1202055681,1362055681);
            $randomDate = date("Y-m-d H:i:s",$randomInteger);
            $randomString=str_shuffle($randomString);
            DB::table('tai_khoan')->insert([
                'ten_dang_nhap' => strtolower(str_random(10)),
                'anh_dai_dien' => str_random(10),
                'email' => str_random(10),
                'mat_khau' =>  bcrypt('root'),
                'gioi_tinh' => rand(0,1),
                'ho' => str_random(10),
                'ten' => str_random(10),
                'so_dien_thoai' => '0'.rand(1000000000,129000000),
                'dia_chi' => str_random(10),
                'ma_kich_hoat' => str_random(20),
                'tinh_trang' => rand(0,2),
                'ngay_tao' => $randomDate,
                'ngay_cap_nhat' => $randomDate,
            ]);
        }
    }    
}
