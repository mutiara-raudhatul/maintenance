<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusPermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_permintaan', function (Blueprint $table) {
            $table->string('id_status_permintaan', 1)->primary();
            $table->string('status_permintaan', 10)->nullable($value=false); 
            $table->string('keterangan', 200)->nullable($value=false); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_permintaan');
    }
}
