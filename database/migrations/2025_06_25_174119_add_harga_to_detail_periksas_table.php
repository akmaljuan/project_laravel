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
    Schema::table('detail_periksas', function (Blueprint $table) {
        $table->integer('harga')->after('obat_id');
    });
}

public function down(): void
{
    Schema::table('detail_periksas', function (Blueprint $table) {
        $table->dropColumn('harga');
    });
}

};
