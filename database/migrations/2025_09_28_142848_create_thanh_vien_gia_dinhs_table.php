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
        Schema::create('thanh_vien_gia_dinhs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_gia_dinh');
            $table->string('ma_tai_khoan');
            $table->string('chu_gia_dinh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_vien_gia_dinhs');
    }
};
