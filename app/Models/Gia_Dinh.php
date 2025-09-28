<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gia_Dinh extends Model
{
    protected $table = 'gia__dinhs';

    protected $fillable = [
        'ten_gia_dinh',
        'mo_ta',
    ];
    public $timestamps = true;
}
