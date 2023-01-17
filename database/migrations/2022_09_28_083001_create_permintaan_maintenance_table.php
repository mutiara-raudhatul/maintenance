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
            $table->string('id_permintaan_maintenance', 11)->primary();
            $table->string('id_serial_number',6);
            $table->foreign('id_serial_number')->references('id_serial_number')->on('barang');
            $table->date('tanggal_permintaan')->nullable($value=false);
            $table->string('keterangan_maintenance')->nullable($value=false);
            $table->string('nip_teknisi',4)->nullable($value=true);
            $table->foreign('nip_teknisi')->references('nip')->on('users');
            $table->date('jadwal_perbaikan')->nullable($value=true);
            $table->string('note')->nullable($value=true);
            $table->string('lokasi',30)->nullable($value=true);
            $table->date('tanggal_selesai')->nullable($value=true);
            $table->string('upload_form_maintenance')->nullable($value=true);
            $table->string('id_status_maintenance',1);
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
