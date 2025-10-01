<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThuNhap extends Model
{
    protected $table = 'thunhaps';

    protected $fillable = [
        'id_tai_khoan',
        'ma_thu',
        'ten_thu_nhap',
        'danh_muc',
        'so_tien',
        'ngay',
        'mo_ta',
    ];

    public $timestamps = true;
}
