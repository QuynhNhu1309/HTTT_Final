<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoCaoChiTiet extends Model
{
    protected $table = 'baocao_chitiet';
     public $timestamps = false;
     protected $guarded=[];

     public function san_pham()
     {
         return $this->hasOne('App\SanPham','id','idSanPham');
     }

     public function loai()
     {
         return $this->hasOne('App\LoaiSanPham','id', 'idLoai');
     }
}
