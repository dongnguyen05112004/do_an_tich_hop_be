<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiaoDichSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('giao__diches')->insert([
            [
                'ma_tai_khoan' => '2',
                'ma_danh_muc' => '1',
                'so_tien' => 500000,
                'ngay_giao_dich' => '2023-10-01',
                'ghi_chu' => 'Giao dịch mua sắm',
                'ma_TVGD' => '2',
            ],
            [
                'ma_tai_khoan' => '1',
                'ma_danh_muc' => '2',
                'so_tien' => 200000,
                'ngay_giao_dich' => '2023-10-02',
                'ghi_chu' => 'Giao dịch ăn uống',
                'ma_TVGD' => '4',
            ],
            [
                'ma_tai_khoan' => '3',
                'ma_danh_muc' => '2',
                'so_tien' => 150000,
                'ngay_giao_dich' => '2023-10-03',
                'ghi_chu' => null,
                'ma_TVGD' => '1',
            ],
        ]);
    }
}
