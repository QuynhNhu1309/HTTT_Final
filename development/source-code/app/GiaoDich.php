<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiaoDich extends Model
{
    protected $table ="giao_dich";
    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';
    /**
     * Get the details for the transaction.
     */
    public function dsChiTietGiaoDich()
    {
        return $this->hasMany('App\ChiTietGiaoDich', 'id_giao_dich', 'id');
    }
}
