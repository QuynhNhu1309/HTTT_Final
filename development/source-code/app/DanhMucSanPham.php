<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSanPham extends Model
{
    protected $table = 'danh_muc_san_pham';

    public function getSlugAttribute($value)
    {
        return $value.'-'.$this->id;
    }
}
