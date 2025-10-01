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
        Schema::create('thunhap_giadinhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tai_khoan')
                ->constrained('tai_khoans')
                ->onDelete('cascade');
            $table->string('ma_thu_gd')->unique();
            $table->string('ten_thu_nhap_gd');
            $table->string('danh_muc_gd');
            $table->string('so_tien_gd');
            $table->date('ngay_gd');
            $table->text('mo_ta_gd')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thunhap_giadinhs');
    }
};
