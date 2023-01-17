<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponPermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respon_permintaan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_respon_permintaan')->autoIncrement();
            $table->date('waktu_pengadaan')->nullable($value=false);
        });

        Schema::table('respon_permintaan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permintaan_barang');
            $table->unsignedBigInteger('id_user_teknisi');
            $table->foreign('id_permintaan_barang')->references('id_permintaan_barang')->on('permintaan_barang');
            $table->foreign('id_user_teknisi')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respon_permintaan');
    }
}
