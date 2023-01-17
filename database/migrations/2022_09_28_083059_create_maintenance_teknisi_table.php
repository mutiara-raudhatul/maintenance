<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceTeknisiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_teknisi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_maintenance_teknisi')->autoIncrement();
            $table->integer('lama_pengerjaan')->nullable($value=false);
            $table->string('lokasi')->nullable($value=false);
            $table->string('upload_form_maintenance')->nullable($value=false);
            $table->string('note')->nullable($value=true);
        });

        Schema::table('maintenance_teknisi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permintaan_maintenance');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_permintaan_maintenance')->references('id_permintaan_maintenance')->on('permintaan_maintenance');
            $table->foreign('id_barang')->references('id_barang')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_teknisi');
    }
}
