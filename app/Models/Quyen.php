<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table = 'quyens';

    protected $fillable = [
        'tenquyen',
    ];
    public $timestamps = true;
}
