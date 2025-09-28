<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThanhVienGiaDinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('thanh_vien_gia_dinhs')->insert([
            [
                'ma_gia_dinh' => '1',
                'ma_tai_khoan' => '1',
                'chu_gia_dinh' => 'true',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_gia_dinh' => '2',
                'ma_tai_khoan' => '2',
                'chu_gia_dinh' => 'false',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_gia_dinh' => '3',
                'ma_tai_khoan' => '3',
                'chu_gia_dinh' => 'true',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_gia_dinh' => '4',
                'ma_tai_khoan' => '4',
                'chu_gia_dinh' => 'false',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
