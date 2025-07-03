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
    Schema::table('periksas', function (Blueprint $table) {
        $table->integer('total_biaya')->nullable()->after('biaya_periksa');
    });
}

public function down(): void
{
    Schema::table('periksas', function (Blueprint $table) {
        $table->dropColumn('total_biaya');
    });
}

};
