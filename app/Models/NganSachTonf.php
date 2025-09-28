<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganSachTonf extends Model
{
    protected $table = 'ngan_sach_tonfs';
    
    protected $fillable = [
        'ma_tai_khoan',
        'ma_TVGD',
        'so_tien'
    ];
    public $timestamps = true;
}
