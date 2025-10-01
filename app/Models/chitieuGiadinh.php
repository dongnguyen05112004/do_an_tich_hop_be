<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitieuGiadinh extends Model
{
    protected $table = 'chitieu_giadinhs';

    protected $fillable = [
        'id_tai_khoan',
        'ma_chi_gd',
        'ten_chi_tieu_gd',
        'danh_muc_gd',
        'so_tien_gd',
        'ngay_gd',
        'mo_ta_gd',
    ];

    public $timestamps = true;

    protected static function booted()
    {
        static::creating(function ($model) {
            if (empty($model->ma_chi_gd)) {
                $model->ma_chi_gd = 'CTGD' . time(); // ví dụ: GD1727662467
            }
        });
    }


}
