<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class thunhapGiadinh extends Model
{
    protected $table = 'thunhap_giadinhs';

    protected $fillable = [
        'id_tai_khoan',
        'ma_thu_gd',
        'ten_thu_nhap_gd',
        'danh_muc_gd',
        'so_tien_gd',
        'ngay_gd',
        'mo_ta_gd',
    ];

    public $timestamps = true;

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->ma_thu_gd)) {
                $model->ma_thu_gd = 'TNGD' . time(); // ví dụ: GD1727662467
            }
        });
    }
}
