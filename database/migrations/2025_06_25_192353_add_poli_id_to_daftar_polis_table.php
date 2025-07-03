<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            $table->unsignedBigInteger('poli_id')->after('pasien_id')->nullable(); // nullable biar aman
        });
    }

    public function down(): void
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            $table->dropColumn('poli_id');
        });
    }
};
