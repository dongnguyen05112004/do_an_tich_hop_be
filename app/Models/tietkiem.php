<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tietkiem extends Model
{
    protected $table = 'tietkiems';

    protected $fillable = [
        'ma_tiet_kiem',
        'ten_tiet_kiem',
        'ma_tai_khoan',
        'ma_tvgd',
        'so_tien_tiet_kiem',
        'ngang_hang',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'lai_suat',
        'ghi_chu'
    ];
    public $timestamps = true;
}
