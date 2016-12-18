<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    //
    protected $table = 'khachhang';
     //public $timestamps = false;
    // protected $guarded=[];
    const CREATED_AT = 'NgayDangKy';
    const UPDATED_AT = 'NgayCapNhat';
}
