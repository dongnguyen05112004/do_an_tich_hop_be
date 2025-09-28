<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giao_Dich extends Model
{
    protected $table = 'giao__diches';

    protected $fillable = [
        'ma_tai_khoan',
        'ma_danh_muc',
        'so_tien',
        'ngay_giao_dich',
        'ghi_chu',
        'ma_TVGD',
    ];
    public $timestamps = true;
}
