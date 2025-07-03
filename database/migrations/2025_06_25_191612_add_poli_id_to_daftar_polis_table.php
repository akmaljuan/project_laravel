<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPoliIdToDaftarPolisTable extends Migration
{
    public function up()
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            $table->unsignedBigInteger('poli_id')->after('pasien_id');

            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('daftar_polis', function (Blueprint $table) {
            $table->dropForeign(['poli_id']);
            $table->dropColumn('poli_id');
        });
    }
}
