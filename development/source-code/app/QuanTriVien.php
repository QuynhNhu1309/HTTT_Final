<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuanTriVien extends Authenticatable
{
    use Notifiable;
    //
    protected $table='quan_tri_vien';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ten_dang_nhap', 'email', 'mat_khau',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'mat_khau', 'remember_token',
    ];

    public function getAuthPassword() {
        return $this->mat_khau;
    }
}
