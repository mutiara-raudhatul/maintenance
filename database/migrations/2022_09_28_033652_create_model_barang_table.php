<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_barang', function (Blueprint $table) {
            $table->string('id_model_barang', 2)->primary(); 
            $table->string('model_barang', 50)->nullable($value=false); 
            $table->string('kode_jenis', 2)->nullable($value=false); 
            $table->foreign('kode_jenis')->references('kode_jenis')->on('jenis_barang');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_barang');
    }
}
