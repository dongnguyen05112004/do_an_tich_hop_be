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
        Schema::create('ngan_saches', function (Blueprint $table) {
            $table->id();
            $table->string('ma_tai_khoan');
            $table->string('ma_danh_muc');
            $table->double('han_muc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ngan_saches');
    }
};
