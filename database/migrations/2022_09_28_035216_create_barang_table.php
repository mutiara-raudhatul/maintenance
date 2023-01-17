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
            $table->unsignedBigInteger('id_barang')->autoIncrement();
            $table->string('id_serial_number', 10)->unique();
            $table->string('asset_tag', 23)->unique();
            $table->string('hostname', 8)->unique()->nullable($value=true);
        });

        Schema::table('barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_model_barang');
            $table->unsignedBigInteger('id_status_barang');
            $table->foreign('id_model_barang')->references('id_model_barang')->on('model_barang');
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
