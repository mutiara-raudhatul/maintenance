<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaanMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permintaan_maintenance')->autoIncrement();
            $table->date('tanggal_permintaan')->nullable($value=false);
            $table->string('keterangan')->nullable($value=false);
        });

        Schema::table('permintaan_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_barang');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_status_maintenance');
            $table->foreign('id_jenis_barang')->references('id_jenis_barang')->on('jenis_barang');
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_status_maintenance')->references('id_status_maintenance')->on('status_maintenance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaan_maintenance');
    }
}
