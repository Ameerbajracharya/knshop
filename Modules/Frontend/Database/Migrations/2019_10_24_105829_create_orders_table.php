<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('productid');
            $table->string('productname');
            $table->string('quantity');
            $table->string('email');
            $table->string('fullname');
            $table->string('address');
            $table->string('contactno');
            $table->integer('price');
            $table->boolean('confirm')->default(0);
            $table->boolean('delivery')->default(0);
            $table->foreign('productid')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
