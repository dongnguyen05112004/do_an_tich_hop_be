<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoaiGD extends Model
{
    protected $table = 'loai_g_d_s';

    protected $fillable = [
        'ten_loai_gd',
    ];
    public $timestamps = true;
}
