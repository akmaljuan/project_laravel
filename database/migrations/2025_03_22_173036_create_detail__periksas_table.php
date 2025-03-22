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
        Schema::create('detail__periksas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_periksa')->constrained()->onDelete('casade');
            $table->unsignedBigInteger('id_obat')->constrained()->onDelete('casade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail__periksas');
    }
};
