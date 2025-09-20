<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TaiKhoan extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'tai_khoans';

    protected $fillable = [
        'ten_tai_khoan',
        'mat_khau',
        'ten_nguoi_dung',
        'sdt',
        'email',
        'avatar'
    ];
}
