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
            $table->string('ma_tiet_kiem')->unique();
            $table->string('ma_tai_khoan');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->string('lai_suat');
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
