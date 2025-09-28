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
        Schema::create('nos', function (Blueprint $table) {
            $table->id();
            $table->string('ten_no');
            $table->string('ma_tai_khoan');
            $table->string('ma_TVGD');
            $table->decimal('tien_no_goc');
            $table->decimal('du_no');
            $table->date('ngay_vay');
            $table->date('ky_han');
            $table->decimal('lai_suat');
            $table->string('ghi_chu')->nullable();
            $table->string('ma_loai_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nos');
    }
};
