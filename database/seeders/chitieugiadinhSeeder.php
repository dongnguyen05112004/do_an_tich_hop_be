<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class chitieugiadinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chitieu_giadinhs')->delete();
        DB::table('chitieu_giadinhs')->truncate();
        DB::table('chitieu_giadinhs')->insert([

            [
                'id_tai_khoan' => 1,
                'ma_chi_gd' => 'CTGD002',
                'ten_chi_tieu_gd' => 'Hóa đơn điện nước',
                'danh_muc_gd' => 'Tiện ích',
                'so_tien_gd' => 1500000,
                'ngay_gd' => '2025-01-10',
                'mo_ta_gd' => 'Thanh toán hóa đơn điện và nước tháng 1'
            ],
            [
                'id_tai_khoan' => 2,
                'ma_chi_gd' => 'CTGD003',
                'ten_chi_tieu_gd' => 'Xăng xe',
                'danh_muc_gd' => 'Di chuyển',
                'so_tien_gd' => 800000,
                'ngay_gd' => '2025-01-15',
                'mo_ta_gd' => 'Đổ xăng cho xe máy'
            ],
            [
                'id_tai_khoan' => 2,
                'ma_chi_gd' => 'CTGD004',
                'ten_chi_tieu_gd' => 'Ăn uống ngoài',
                'danh_muc_gd' => 'Ăn uống',
                'so_tien_gd' => 500000,
                'ngay_gd' => '2025-01-20',
                'mo_ta_gd' => 'Ăn tối cùng bạn bè'
            ],
        ]);
    }
}
