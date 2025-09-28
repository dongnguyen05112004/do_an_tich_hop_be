<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuyenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quyens')->insert([
            ['tenquyen' => 'Quản lý tiết kiệm'],
            ['tenquyen' => 'Quản lý thu nhập'],
            ['tenquyen' => 'Quản lý chi tiêu'],
            ['tenquyen' => 'Quản lý nợ'],
            ['tenquyen' => 'Báo cáo thống kê'],
        ]);
    }
}
