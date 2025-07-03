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
        Schema::create('daftar_polis', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('pasien_id');
    $table->unsignedBigInteger('jadwal_id');
    $table->text('keluhan')->nullable();
    $table->integer('no_antrian')->nullable();
    $table->timestamps();

    $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
    $table->foreign('jadwal_id')->references('id')->on('jadwal_periksas')->onDelete('cascade');
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_polis');
    }
};
