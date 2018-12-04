<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactLogacallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_logacall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('subject')->nullable();
            $table->string('comment')->nullable();
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contact');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('account');
            $table->string('status_id')->default("1");
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
        Schema::dropIfExists('contact_logacall');
    }
}
