<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HinhThucVayNoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hinh_thuc_vay_nos')->insert([
            ['ten_hinh_thuc_vay_no' => 'Vay tín dụng'],
            ['ten_hinh_thuc_vay_no' => 'Vay thế chấp'],
            ['ten_hinh_thuc_vay_no' => 'Vay tiêu dùng'],
            ['ten_hinh_thuc_vay_no' => 'Vay kinh doanh'],
        ]);
    }
}
