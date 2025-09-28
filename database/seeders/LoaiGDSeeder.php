<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoaiGDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loai_g_d_s')->insert([
            ['ten_loai_gd' => 'Thu Nhập'],
            ['ten_loai_gd' => 'Chi Tiêu'],
            ['ten_loai_gd' => 'Khác'],
        ]);
    }
}
