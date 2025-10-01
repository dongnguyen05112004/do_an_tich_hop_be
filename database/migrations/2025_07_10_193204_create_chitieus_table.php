<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chitieus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tai_khoan')
                ->constrained('tai_khoans')
                ->onDelete('cascade');
            $table->string('ma_chi')->unique();
            $table->string('ten_chi_tieu');
            $table->string('danh_muc')->nullable();
            $table->decimal('so_tien', 15, 2);
            $table->date('ngay');
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitieus');
    }
};
