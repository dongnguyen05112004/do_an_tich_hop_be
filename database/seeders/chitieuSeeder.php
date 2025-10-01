<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chitieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chitieus')->delete();

        DB::table('chitieus')->truncate();
        DB::table('chitieus')->insert([
            [
                'id_tai_khoan' => 1,
                'ma_chi' => 'CT001',
                'ten_chi_tieu' => 'Chi tiêu tháng 1',
                'danh_muc' => 'Nhà',
                'so_tien' => 1500000,
                'ngay' => '2025-01-31',
                'mo_ta' => 'Tiền nhà tháng 1 năm 2025'
            ], [
                'id_tai_khoan' => 1,
                'ma_chi' => 'CT002',
                'ten_chi_tieu' => 'Chi tiêu tháng 1',
                'danh_muc' => 'Ô tô',
                'so_tien' => 3000000,
                'ngay' => '2025-01-31',
                'mo_ta' => 'Tiền Ô tô tháng 1 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_chi' => 'CT003',
                'ten_chi_tieu' => 'Chi tiêu tháng 1',
                'danh_muc' => 'Đồ dùng',
                'so_tien' => 1500000,
                'ngay' => '2025-01-31',
                'mo_ta' => 'Đồ dùng tháng 1 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_chi' => 'CT004',
                'ten_chi_tieu' => 'Chi tiêu tháng 1',
                'danh_muc' => 'Đồ ăn',
                'so_tien' => 1000000,
                'ngay' => '2025-02-28',
                'mo_ta' => 'Tiền đồ ăn tháng 1 năm 2025'
            ],

        ]);
    }
}
