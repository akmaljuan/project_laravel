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
    Schema::create('pasien_poli', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pasien_id');
        $table->unsignedBigInteger('poli_id');
        $table->timestamps();

        $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
        $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');

        $table->unique(['pasien_id', 'poli_id']); // Hindari duplikat
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_poli');
    }
};
