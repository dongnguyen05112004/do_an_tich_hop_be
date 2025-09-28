<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HinhThucVayNo extends Model
{
    protected $table = 'hinh_thuc_vay_nos';

    protected $fillable = [
        'ten_hinh_thuc_vay_no',
    ];
    public $timestamps = true;
}
