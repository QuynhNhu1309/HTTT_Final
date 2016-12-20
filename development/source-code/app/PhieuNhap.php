<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuNhap extends Model
{
    //
    protected $table = 'phieunhap';
     public $timestamps = false;
    //const CREATED_AT = 'NgayXuatHoaDon';
   // const UPDATED_AT = 'NgayCapNhat';
    protected $guarded=[];
}
