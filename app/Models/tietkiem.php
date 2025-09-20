<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tietkiem extends Model
{
    protected $table = 'tietkiems';

    protected $fillable = [
        'ma_tiet_kiem',
        'ma_tai_khoan',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'lai_suat'
    ];
    public $timestamps = true;
}
