<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danh_mucs';
    protected $fillable = [
        'ten_danh_muc',
        'ma_tai_khoan',
        'ma_gia_dinh',
        'mo_ta',
        'ma_loai_GD',
    ];
    public $timestamps = true;
}
