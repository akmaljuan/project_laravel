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
        Schema::create('pasiens', function (Blueprint $table) {
    $table->id();
    $table->string('nama', 255);
    $table->string('alamat', 255);
    $table->string('no_ktp', 25);
    $table->string('no_hp', 50);
    $table->string('no_rm', 25); // nomor rekam medis
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
