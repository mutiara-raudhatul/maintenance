<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPermintaanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_permintaan_barang', function (Blueprint $table) {
            $table->string('id_permintaan_barang', 11)->nullable($value=false);
            $table->string('kode_jenis', 2)->nullable($value=false);
            $table->foreign('id_permintaan_barang')->references('id_permintaan_barang')->on('permintaan_barang');
            $table->foreign('kode_jenis')->references('kode_jenis')->on('jenis_barang');
            $table->string('id_status_permintaan', 1);
            $table->foreign('id_status_permintaan')->references('id_status_permintaan')->on('status_permintaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_permintaan_barang');
    }
}
