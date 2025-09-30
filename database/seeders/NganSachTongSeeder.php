<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NganSachTongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ngan_sach_tonfs')->insert([
            [
                'ma_tai_khoan' => '1',
                'ma_TVGD' => '1',
                'so_tien' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tai_khoan' => '2',
                'ma_TVGD' => '2',
                'so_tien' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tai_khoan' => '3',
                'ma_TVGD' => '3',
                'so_tien' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tai_khoan' => '4',
                'ma_TVGD' => '4',
                'so_tien' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tai_khoan' => '5',
                'ma_TVGD' => '5',
                'so_tien' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
