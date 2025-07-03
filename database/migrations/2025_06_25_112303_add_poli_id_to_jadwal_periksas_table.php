<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('jadwal_periksas', function (Blueprint $table) {
        $table->unsignedBigInteger('poli_id')->after('dokter_id');

        $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('jadwal_periksas', function (Blueprint $table) {
        $table->dropForeign(['poli_id']);
        $table->dropColumn('poli_id');
    });
}

};
