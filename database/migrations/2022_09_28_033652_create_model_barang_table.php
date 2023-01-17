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
            $table->unsignedBigInteger('id_model_barang')->autoIncrement();
            $table->string('model_barang', 50)->nullable($value=false); 
            
        });

        Schema::table('model_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_barang');
            $table->foreign('id_jenis_barang')->references('id_jenis_barang')->on('jenis_barang');
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
