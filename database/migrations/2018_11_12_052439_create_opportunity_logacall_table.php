<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunityLogacallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_logacall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('subject')->nullable();
            $table->string('comment')->nullable();
            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')->references('id')->on('contact');
            $table->integer('opportunity_id')->unsigned();
            $table->foreign('opportunity_id')->references('id')->on('opportunity');
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
        Schema::dropIfExists('opportunity_logacall');
    }
}
