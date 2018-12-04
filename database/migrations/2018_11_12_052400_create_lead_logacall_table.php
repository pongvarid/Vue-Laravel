<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadLogacallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_logacall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('subject')->nullable();
            $table->string('comment')->nullable();
            $table->integer('lead_id')->unsigned();
            $table->foreign('lead_id')->references('id')->on('lead');
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
        Schema::dropIfExists('lead_logacall');
    }
}
