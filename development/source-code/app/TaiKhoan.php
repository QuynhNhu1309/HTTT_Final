<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable
{
    //
    use Notifiable;
    protected $table='taikhoan';
    const CREATED_AT = 'NgayDangKy';
    const UPDATED_AT = 'NgayCapNhat';
    protected $fillable = [
        'Username', 'Pass'
    ];

    protected $hidden = [
        'Pass',
    ];

    public function getAuthPassword() {
        return $this->Pass;
    }
}
