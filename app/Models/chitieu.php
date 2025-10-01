<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitieu extends Model
{
    protected $table = 'chitieus';

    protected $fillable = [
        'id_tai_khoan',
        'ma_chi',
        'ten_chi_tieu',
        'danh_muc',
        'so_tien',
        'ngay',
        'mo_ta',
    ];

    public $timestamps = true;
}
