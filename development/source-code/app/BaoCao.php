<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaoCao extends Model
{
    protected $table = 'baocao';
    public $timestamps = false;
    protected $guarded=[];

    public function tinh_trang()
    {
        return $this->hasOne('App\TinhTrang','id','idTinhTrang');
    }

    public function tai_khoan()
    {
        return $this->hasOne('App\TaiKhoan','id','idTaiKhoan');
    }

    public function dsBaoCaoChiTiet()
    {
        return $this->hasMany('App\BaoCaoChiTiet','idBC','id');
    }
}
