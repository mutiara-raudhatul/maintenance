<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->string('id_serial_number', 6)->primary();
            $table->string('nip', 4)->nullable();
            $table->foreign('nip')->references('nip')->on('users');
            $table->string('asset_tag', 11)->unique();
            $table->string('id_model_barang', 2);
            $table->foreign('id_model_barang')->references('id_model_barang')->on('model_barang');
            $table->string('id_status_barang', 1);
            $table->foreign('id_status_barang')->references('id_status_barang')->on('status_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
