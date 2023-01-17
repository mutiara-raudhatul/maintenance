<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_maintenance', function (Blueprint $table) {
            $table->unsignedBigInteger('id_status_maintenance')->autoIncrement();
            $table->string('status_maintenance', 10)->nullable($value=false); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_maintenance');
    }
}
