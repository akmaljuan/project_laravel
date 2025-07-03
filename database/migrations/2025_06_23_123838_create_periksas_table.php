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
        Schema::create('periksas', function (Blueprint $table) {
    $table->id();
    $table->foreignId('daftar_poli_id')->constrained('daftar_polis')->onDelete('cascade');
    $table->dateTime('tgl_periksa');
    $table->text('catatan')->nullable();
    $table->integer('biaya_periksa')->default(0);
    $table->integer('total_biaya')->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periksas');
    }
};
