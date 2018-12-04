<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('opportunity_name')->nullable();
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users')->onUpdate('cascade');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('account')->onUpdate('cascade');
            $table->string('status')->nullable();
            $table->decimal('probability', 8, 2)->nullable();
            $table->string('loss_reason')->nullable();
            $table->datetime('closs_date')->nullable();
            $table->string('product')->nullable();
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
        Schema::dropIfExists('opportunity');
    }
}
