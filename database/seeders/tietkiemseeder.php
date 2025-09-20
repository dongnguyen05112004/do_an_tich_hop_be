<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tietkiemseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tietkiems')->delete();

        DB::table('tietkiems')->truncate();

        DB::table('tietkiems')->insert([
            [
                'ma_tiet_kiem' => 'TK001',
                'ma_tai_khoan' => 'TK001',
                'ngay_bat_dau' => '2025-01-01',
                'ngay_ket_thuc' => '2025-12-31',
                'lai_suat' => '5'
            ],
            [
                'ma_tiet_kiem' => 'TK002',
                'ma_tai_khoan' => 'TK002',
                'ngay_bat_dau' => '2025-02-01',
                'ngay_ket_thuc' => '2025-11-30',
                'lai_suat' => '4'
            ],
            [
                'ma_tiet_kiem' => 'TK003',
                'ma_tai_khoan' => 'TK003',
                'ngay_bat_dau' => '2025-03-01',
                'ngay_ket_thuc' => '2025-10-31',
                'lai_suat' => '6'
            ],
            [
                'ma_tiet_kiem' => 'TK004',
                'ma_tai_khoan' => 'TK004',
                'ngay_bat_dau' => '2025-04-01',
                'ngay_ket_thuc' => '2025-09-30',
                'lai_suat' => '3'
            ],
            [
                'ma_tiet_kiem' => 'TK005',
                'ma_tai_khoan' => 'TK005',
                'ngay_bat_dau' => '2025-05-01',
                'ngay_ket_thuc' => '2025-08-31',
                'lai_suat' => '7'
            ]
        ]);
    }
}
