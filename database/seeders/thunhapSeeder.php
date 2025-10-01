<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class thunhapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('thunhaps')->delete();

        DB::table('thunhaps')->truncate();
        DB::table('thunhaps')->insert([
            [
                'id_tai_khoan' => 1,
                'ma_thu' => 'TH001',
                'ten_thu_nhap' => 'Lương tháng 1',
                'danh_muc' => 'Lương',
                'so_tien' => 5000000,
                'ngay' => '2025-01-31',
                'mo_ta' => 'Lương tháng 1 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu' => 'TH002',
                'ten_thu_nhap' => 'Lương tháng 2',
                'danh_muc' => 'Lương',
                'so_tien' => 5200000,
                'ngay' => '2025-02-28',
                'mo_ta' => 'Lương tháng 2 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu' => 'TH003',
                'ten_thu_nhap' => 'Tiền thưởng',
                'danh_muc' => 'Thưởng',
                'so_tien' => 2000000,
                'ngay' => '2025-03-15',
                'mo_ta' => 'Tiền thưởng quý 1 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu' => 'TH004',
                'ten_thu_nhap' => 'Lương tháng 3',
                'danh_muc' => 'Lương',
                'so_tien' => 5300000,
                'ngay' => '2025-03-31',
                'mo_ta' => 'Lương tháng 3 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu' => 'TH005',
                'ten_thu_nhap' => 'Tiền lãi từ đầu tư',
                'danh_muc' => 'Đầu tư',
                'so_tien' => 1500000,
                'ngay' => '2025-04-10',
                'mo_ta' => 'Tiền lãi từ đầu tư chứng khoán'
            ]
        ]);
    }
}
