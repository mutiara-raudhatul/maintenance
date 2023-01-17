<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailBarangDipenuhiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_barang_dipenuhi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_detail_barang_dipenuhi')->autoIncrement();
            $table->integer('jumlah_dipenuhi')->nullable($value=false);
        });

        Schema::table('detail_barang_dipenuhi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_respon_permintaan');
            $table->foreign('id_barang')->references('id_barang')->on('barang');
            $table->foreign('id_respon_permintaan')->references('id_respon_permintaan')->on('respon_permintaan');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_barang_dipenuhi');
    }
}
