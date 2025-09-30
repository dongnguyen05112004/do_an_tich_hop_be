<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => fake()->unique()->safeEmail(),
        // ]);
        $this->call(ThanhVienGiaDinhSeeder::class);
        $this->call(DanhMucSeeder::class);
        $this->call(NganSachSeeder::class);
        $this->call(NganSachTongSeeder::class);
        $this->call(GiaDinhSeeder::class);
        $this->call(LoaiGDSeeder::class);
        $this->call(GiaoDichSeeder::class);
        $this->call(nogiadinhSeeder::class);
        $this->call(NganSachgiadinhSeeder::class);
        $this->call(HinhThucVayNoSeeder::class);
        $this->call(QuyenSeeder::class);
        $this->call(thunhapgiadinhSeeder::class);
        $this->call(chitieugiadinhSeeder::class);
        $this->call(tietkiemgiadinhSeeder::class);
        $this->call(TaiKhoanSeeder::class);

        $this->call(ThanhVienGiaDinhSeeder::class);
        $this->call(DanhMucSeeder::class);
        $this->call(NganSachSeeder::class);
        $this->call(NganSachTongSeeder::class);
        $this->call(GiaDinhSeeder::class);
        $this->call(LoaiGDSeeder::class);
        $this->call(GiaoDichSeeder::class);
        $this->call(nogiadinhSeeder::class);
        $this->call(NganSachgiadinhSeeder::class);
        $this->call(HinhThucVayNoSeeder::class);
        $this->call(QuyenSeeder::class);
        $this->call(thunhapgiadinhSeeder::class);
        $this->call(chitieugiadinhSeeder::class);
        $this->call(tietkiemgiadinhSeeder::class);

    }
}
