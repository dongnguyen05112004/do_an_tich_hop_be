<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GiaDinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gia__dinhs')->insert([
            [
                'ten_gia_dinh' => 'Gia đình A',
                'mo_ta' => 'Mô tả về gia đình A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_gia_dinh' => 'Gia đình B',
                'mo_ta' => 'Mô tả về gia đình B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
