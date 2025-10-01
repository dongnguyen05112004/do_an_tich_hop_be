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
        Schema::create('chitieu_giadinhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_tai_khoan')
                ->constrained('tai_khoans')
                ->onDelete('cascade');
            $table->string('ma_chi_gd');
            $table->string('ten_chi_tieu_gd');
            $table->string('danh_muc_gd');
            $table->double('so_tien_gd');
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
        Schema::dropIfExists('chitieu_giadinhs');
    }
};
