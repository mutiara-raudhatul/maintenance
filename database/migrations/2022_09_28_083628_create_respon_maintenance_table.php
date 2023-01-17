<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respon_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_respon_maintenance')->autoIncrement();
            $table->date('jadwal_perbaikan')->nullable($value=false);
        });

        Schema::table('respon_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_permintaan_maintenance');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_permintaan_maintenance')->references('id_permintaan_maintenance')->on('permintaan_maintenance');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respon_maintenance');
    }
}
