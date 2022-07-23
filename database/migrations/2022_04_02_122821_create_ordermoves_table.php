<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdermovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordermoves', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->integer('customer_id');
            $table->integer('order_id');
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
        Schema::dropIfExists('ordermoves');
    }
}
