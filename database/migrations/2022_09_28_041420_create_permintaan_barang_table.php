<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permintaan_barang')->autoIncrement();
            $table->date('tanggal_permintaan')->nullable($value=false);
            $table->string('surat_izin')->nullable($value=true);
        });

        Schema::table('permintaan_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_status_permintaan');
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('permintaan_barang');
    }
}
