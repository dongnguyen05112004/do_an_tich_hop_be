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
        $this->call(tietkiemseeder::class);
        $this->call(chitieuSeeder::class);
        $this->call(thunhapSeeder::class);
        $this->call(NoSeeder::class);
        $this->call(TaiKhoanSeeder::class);
    }
}
