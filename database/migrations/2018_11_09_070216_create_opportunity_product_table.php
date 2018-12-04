<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpportunityProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunity_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->foreign('opportunity_id')->references('id')->on('opportunity');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product');
            $table->decimal('expected_volume', 9, 2)->nullable();
            $table->string('frequency')->nullable();
            $table->decimal('gross_revenue', 9, 2)->nullable();
            $table->decimal('net_profit', 9, 2)->nullable();
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
        Schema::dropIfExists('opportunity_product');
    }
}
