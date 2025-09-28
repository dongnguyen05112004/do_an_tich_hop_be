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
                'ten_no' => 'Vay mua xe máy',
                'ma_tai_khoan' => '1',
                'ma_TVGD' => '1',
                'tien_no_goc' => 15000,
                'du_no' => 50000,
                'ngay_vay' => '2023-01-15',
                'ky_han' => '2024-01-15',
                'lai_suat' => 0.12,
                'ghi_chu' => 'Vay để mua xe chở ghệ ',
                'ma_loai_no' => '1',
            ],
            [
                'ten_no' => 'Vay kinh doanh',
                'ma_tai_khoan' => '2',
                'ma_TVGD' => '2',
                'tien_no_goc' => 50000,
                'du_no' => 20000,
                'ngay_vay' => '2023-03-10',
                'ky_han' => '2025-03-10',
                'lai_suat' => 0.15,
                'ghi_chu' => 'Vay để mở cửa hàng thời trang',
                'ma_loai_no' => '1',
            ],
            [
                'ten_no' => 'Vay sửa nhà',
                'ma_tai_khoan' => '2',
                'ma_TVGD' => '2',
                'tien_no_goc' => 30000,
                'du_no' => 10000,
                'ngay_vay' => '2023-05-20',
                'ky_han' => '2024-11-20',
                'lai_suat' => 0.10,
                'ghi_chu' => null,
                'ma_loai_no' => '1',
            ],
        ]);
    }
}
