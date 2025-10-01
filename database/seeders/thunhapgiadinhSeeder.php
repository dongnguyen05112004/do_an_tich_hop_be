<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class thunhapgiadinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('thunhap_giadinhs')->delete();
        DB::table('thunhap_giadinhs')->truncate();
        DB::table('thunhap_giadinhs')->insert([
            [
                'id_tai_khoan' => 1,
                'ma_thu_gd' => 'THGD001',
                'ten_thu_nhap_gd' => 'Mẹ',
                'danh_muc_gd' => 'Lương',
                'so_tien_gd' => 10000000,
                'ngay_gd' => '2025-01-31',
                'mo_ta_gd' => 'Lương tháng 1 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu_gd' => 'THGD002',
                'ten_thu_nhap_gd' => 'Bố',
                'danh_muc_gd' => 'Kinh doanh',
                'so_tien_gd' => 12000000,
                'ngay_gd' => '2025-02-28',
                'mo_ta_gd' => 'Bán hàng online'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu_gd' => 'THGD003',
                'ten_thu_nhap_gd' => 'Anh hai',
                'danh_muc_gd' => 'Thưởng',
                'so_tien_gd' => 5000000,
                'ngay_gd' => '2025-03-15',
                'mo_ta_gd' => 'Thưởng học bổng'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu_gd' => 'THGD004',
                'ten_thu_nhap_gd' => 'Anh cả',
                'danh_muc_gd' => 'Lương',
                'so_tien_gd' => 8000000,
                'ngay_gd' => '2025-03-31',
                'mo_ta_gd' => 'Lương tháng 3 năm 2025'
            ],
            [
                'id_tai_khoan' => 1,
                'ma_thu_gd' => 'THGD005',
                'ten_thu_nhap_gd' => 'Bố',
                'danh_muc_gd' => 'Đầu tư',
                'so_tien_gd' => 3000000,
                'ngay_gd' => '2025-04-10',
                'mo_ta_gd' => 'Tiền lãi từ đầu tư chứng khoán'
            ]
        ]);
    }
}
