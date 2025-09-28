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
        Schema::create('tietkiems', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tiet_kiem');
            $table->string('ma_tai_khoan');
            $table->string('ma_tvgd');
            $table->decimal('so_tien_tiet_kiem');
            $table->string('ngang_hang');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->decimal('lai_suat');
            $table->string('ghi_chu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tietkiems');
    }
};
