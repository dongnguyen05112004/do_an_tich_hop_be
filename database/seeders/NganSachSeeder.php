<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NganSachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ngan_saches')->insert([
            [
                'ma_tai_khoan' => '`1',
                'ma_danh_muc' => '2',
                'han_muc' => '500000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tai_khoan' => '1',
                'ma_danh_muc' => '3',
                'han_muc' => '300000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_tai_khoan' => '2',
                'ma_danh_muc' => '1',
                'han_muc' => '700000',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
