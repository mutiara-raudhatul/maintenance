<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_barang')->autoIncrement();
            $table->string('kode_barang', 2)->nullable($value=false);
            $table->string('jenis_barang', 50)->nullable($value=false);
            $table->string('template_form_maintenance', 50)->nullable($value=true);
        });

        Schema::table('jenis_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_maintenance');
            $table->foreign('id_jenis_maintenance')->references('id_jenis_maintenance')->on('jenis_maintenance');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_barang');
    }
}
