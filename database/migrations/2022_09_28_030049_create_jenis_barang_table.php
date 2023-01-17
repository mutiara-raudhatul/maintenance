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
            $table->string('kode_jenis', 2)->primary();
            $table->string('nama', 50)->nullable($value=false);
            $table->string('template_form_maintenance', 50)->nullable($value=true);
            $table->string('id_jenis_maintenance', 1)->nullable($value=false);
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
