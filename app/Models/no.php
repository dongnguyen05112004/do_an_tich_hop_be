<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class no extends Model
{
    protected $table = 'nos';

    protected $fillable = [
        'ma_no',
        'ten_no',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'so_tien',
        'lai_suat',
    ];

    public $timestamps = true;
}
