<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('nip',4)->primary();
            $table->string('role', 13);
            $table->string('username', 20);
            $table->string('name', 50);
            $table->string('email', 30)->unique();
            $table->string('password');
            $table->string('unit_kerja', 30);
            $table->string('eselon',1);
            $table->string('nohp', 13);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
