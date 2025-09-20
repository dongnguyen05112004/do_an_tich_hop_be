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
            $table->string('ma_no')->unique();
            $table->string('ten_no');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->bigInteger('so_tien');
            $table->decimal('lai_suat');
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
