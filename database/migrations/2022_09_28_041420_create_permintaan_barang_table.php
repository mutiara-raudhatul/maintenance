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
            $table->string('id_permintaan_barang', 11)->primary();
            $table->string('nip_peminta',4);
            $table->foreign('nip_peminta')->references('nip')->on('users');
            $table->date('tanggal_permintaan')->nullable($value=false);
            $table->string('surat_izin')->nullable($value=true);
            $table->string('nip_teknisi',4)->nullable($value=true);
            $table->foreign('nip_teknisi')->references('nip')->on('users');
            $table->string('catatan')->nullable($value=true);      
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
