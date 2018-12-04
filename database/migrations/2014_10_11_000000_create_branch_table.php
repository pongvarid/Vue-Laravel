<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branch', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('website')->nullable();
            $table->string('fax')->nullable();
            $table->string('description')->nullable();
            $table->string('timezone')->nullable();
            $table->string('currency')->nullable();
            $table->string('remark')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('mailing_street')->nullable();
            $table->string('mailing_city')->nullable();
            $table->string('mailing_state')->nullable();
            $table->string('mailing_zipcode')->nullable();
            $table->string('mailing_country')->nullable();
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
        Schema::dropIfExists('branch');
    }
}
