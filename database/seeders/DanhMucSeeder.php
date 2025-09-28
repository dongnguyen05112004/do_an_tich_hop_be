<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhMucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('danh_mucs')->insert([
            [
                'ten_danh_muc' => 'Lương',
                'ma_tai_khoan' => '1',
                'ma_gia_dinh' => '3',
                'mo_ta' => 'Tiền lương hàng tháng',
                'ma_loai_GD' => '2',
            ],
            [
                'ten_danh_muc' => 'Thưởng',
                'ma_tai_khoan' => '2',
                'ma_gia_dinh' => '1',
                'mo_ta' => 'Tiền thưởng từ công ty',
                'ma_loai_GD' => '1',
            ],
            [
                'ten_danh_muc' => 'Ăn uống',
                'ma_tai_khoan' => '4',
                'ma_gia_dinh' => '1',
                'mo_ta' => 'Chi phí ăn uống hàng ngày',
                'ma_loai_GD' => '2',
            ],
            [
                'ten_danh_muc' => 'Giải trí',
                'ma_tai_khoan' => '3',
                'ma_gia_dinh' => '1',
                'mo_ta' => 'Chi phí cho các hoạt động giải trí',
                'ma_loai_GD' => '1',
            ],
        ]);
    }
}
