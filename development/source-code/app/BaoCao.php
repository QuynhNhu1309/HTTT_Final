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
}
