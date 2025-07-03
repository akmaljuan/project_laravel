<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_add_status_to_jadwal_periksas_table.php

public function up()
{
    Schema::table('jadwal_periksas', function (Blueprint $table) {
        $table->boolean('status')->default(0); // 0 = tidak aktif, 1 = aktif
    });
}

public function down()
{
    Schema::table('jadwal_periksas', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

};
