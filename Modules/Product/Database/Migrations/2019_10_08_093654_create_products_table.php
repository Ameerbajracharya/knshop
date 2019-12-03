<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productName')->unique();
            $table->string('code')->unique();
            $table->string('qrCode')->unique();
            $table->string('barCode')->unique();
            $table->unsignedBigInteger('categoryid');
            $table->unsignedBigInteger('brandid');
            $table->unsignedBigInteger('typeid');
            $table->unsignedBigInteger('unitid');
            $table->unsignedBigInteger('schemeid');
            $table->integer('wholeSalePrice');
            $table->integer('markedPrice');
            $table->integer('sellingPrice');
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->foreign('categoryid','brandid','typeid','unitid','schemeid')
                  ->references('id','id','id','id','id')
                  ->on('categories','brands','product_types','units','schemes')
                  ->onDelete('cascade','cascade','cascade','cascade','cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
