<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailKebutuhanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_kebutuhan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_detail_kebutuhan')->autoIncrement();
            $table->integer('jumlah_permintaan')->nullable($value=false);        
        });

        Schema::table('detail_kebutuhan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_barang');
            $table->unsignedBigInteger('id_permintaan_barang');
            $table->foreign('id_jenis_barang')->references('id_jenis_barang')->on('jenis_barang');
            $table->foreign('id_permintaan_barang')->references('id_permintaan_barang')->on('permintaan_barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_kebutuhan');
    }
}
