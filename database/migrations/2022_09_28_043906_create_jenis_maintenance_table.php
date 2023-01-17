<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jenis_maintenance')->autoIncrement();
            $table->string('jenis_maintenance', 30)->nullable($value=false); 
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_maintenance');
    }
}
