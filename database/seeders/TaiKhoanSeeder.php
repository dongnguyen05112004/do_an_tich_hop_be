<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaiKhoanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tai_khoans')->insert([
            [
                'ten_tai_khoan' => 'NguyenVanA',
                'mat_khau' => '123456',
                'ten_nguoi_dung' => 'Admin',
                'sdt' => '0123456789',
                'email' => 'NguyenVanA@gmail.com',
                'avatar' => '',
            ],
            [
                'ten_tai_khoan' => 'TranVanB',
                'mat_khau' => '123456',
                'ten_nguoi_dung' => 'User B',
                'sdt' => '0987654321',
                'email' => 'TranVanB@gmail.com',
                'avatar' => '',
            ],
            [
                'ten_tai_khoan' => 'NguyenVanC',
                'mat_khau' => '123456',
                'ten_nguoi_dung' => 'User C',
                'sdt' => '0905484848',
                'email' => 'NguyenVanC@gmail.com',
                'avatar' => '',
            ],
            [
                'ten_tai_khoan' => 'NguyenVanD',
                'mat_khau' => '123456',
                'ten_nguoi_dung' => 'User D',
                'sdt' => '0123456789',
                'email' => 'NguyenVanD@gmail.com',
                'avatar' => '',
            ],
        ]);
    }
}
