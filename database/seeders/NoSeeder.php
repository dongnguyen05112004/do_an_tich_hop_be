<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nos')->delete();

        DB::table('nos')->truncate();
        DB::table('nos')->insert([
            [
                'ma_no' => 'NO001',
                'ten_no' => 'Khoản vay cá nhân',
                'ngay_bat_dau' => '2025-01-01',
                'ngay_ket_thuc' => '2025-12-31',
                'so_tien' => 10000000,
                'lai_suat' => 5.0,
            ],
            [
                'ma_no' => 'NO002',
                'ten_no' => 'Vay mua nhà',
                'ngay_bat_dau' => '2025-02-01',
                'ngay_ket_thuc' => '2030-01-31',
                'so_tien' => 500000000,
                'lai_suat' => 3.5,
            ],
            [
                'ma_no' => 'NO003',
                'ten_no' => 'Vay kinh doanh',
                'ngay_bat_dau' => '2025-03-01',
                'ngay_ket_thuc' => '2026-02-28',
                'so_tien' => 200000000,
                'lai_suat' => 4.0,
            ],
            [
                'ma_no' => 'NO004',
                'ten_no' => 'Vay mua xe',
                'ngay_bat_dau' => '2025-04-01',
                'ngay_ket_thuc' => '2027-03-31',
                'so_tien' => 30000000,
                'lai_suat' => 6.0,
            ],
            [
                'ma_no' => 'NO005',
                'ten_no' => 'Vay học phí',
                'ngay_bat_dau' => '2025-05-01',
                'ngay_ket_thuc' => '2026-04-30',
                'so_tien' => 15000000,
                'lai_suat' => 4.5,
            ]
        ]);
    }
}
