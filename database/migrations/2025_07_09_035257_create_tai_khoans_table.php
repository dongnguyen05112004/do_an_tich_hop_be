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
        Schema::create('tai_khoans', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tai_khoan')->unique();
            $table->string('mat_khau');
            $table->string('ten_nguoi_dung');
            $table->string('sdt');
            $table->string('email');
            $table->string('avatar')->default('');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('tai_khoans');
    }
};
