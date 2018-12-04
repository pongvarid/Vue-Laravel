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
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('img_user')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->nullable();
            $table->string('permission')->nullable();
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('id')->on('branch');
            $table->string('status_id')->default("1");
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
