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
                'ten_tiet_kiem' => 'Tiết kiệm 1 năm',
                'ma_tai_khoan' => '1',
                'ma_tvgd' => '1',
                'so_tien_tiet_kiem' => '10000',
                'ngang_hang' => 'Vietcombank',
                'ngay_bat_dau' => '2025-01-01',
                'ngay_ket_thuc' => '2025-12-31',
                'lai_suat' => '0.8',
                'ghi_chu' => ''
            ],
            [
                'ten_tiet_kiem' => 'Tiết kiệm 10 tháng',
                'ma_tai_khoan' => '2',
                'ma_tvgd' => '2',
                'so_tien_tiet_kiem' => '50000',
                'ngang_hang' => 'Techcombank',
                'ngay_bat_dau' => '2025-02-01',
                'ngay_ket_thuc' => '2025-11-30',
                'lai_suat' => '0.8',
                'ghi_chu' => ''
            ],
            [
                'ten_tiet_kiem' => 'Tiết kiệm 8 tháng',
                'ma_tai_khoan' => '3',
                'ma_tvgd' => '3',
                'so_tien_tiet_kiem' => '20000',
                'ngang_hang' => 'ACB',
                'ngay_bat_dau' => '2025-03-01',
                'ngay_ket_thuc' => '2025-10-31',
                'lai_suat' => '0.9',
                'ghi_chu' => ''
            ],
            [
                'ten_tiet_kiem' => 'Tiết kiệm 6 tháng',
                'ma_tai_khoan' => '4',
                'ma_tvgd' => '4',
                'so_tien_tiet_kiem' => '30000',
                'ngang_hang' => 'BIDV',
                'ngay_bat_dau' => '2025-04-01',
                'ngay_ket_thuc' => '2025-09-30',
                'lai_suat' => '0.8',
                'ghi_chu' => ''
            ],
            [
                'ten_tiet_kiem' => 'Tiết kiệm 4 tháng',
                'ma_tai_khoan' => '5',
                'ma_tvgd' => '5',
                'so_tien_tiet_kiem' => '40000',
                'ngang_hang' => 'VPBank',
                'ngay_bat_dau' => '2025-05-01',
                'ngay_ket_thuc' => '2025-08-31',
                'lai_suat' => '0.5',
                'ghi_chu' => ''
            ]
        ]);
    }
}
