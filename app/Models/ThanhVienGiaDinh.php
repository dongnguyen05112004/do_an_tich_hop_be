<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ThanhVienGiaDinh extends Model
{
    protected $table = 'thanh_vien_gia_dinhs';

    protected $fillable = [
        'ma_gia_dinh',
        'ma_tai_khoan',
        'chu_gia_dinh',
    ];
    public $timestamps = true;
}
