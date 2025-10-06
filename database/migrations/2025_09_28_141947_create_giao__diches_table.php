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
        Schema::create('giao__diches', function (Blueprint $table) {
            $table->id();
            $table->string('ma_tai_khoan');
            $table->string('ma_danh_muc');
            $table->decimal('so_tien');
            $table->string('ngay_giao_dich');
            $table->string('ghi_chu')->nullable();
            $table->string('ma_TVGD')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giao__diches');
    }
};
