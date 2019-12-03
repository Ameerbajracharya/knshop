<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productdetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('productid');
            $table->longtext('description');
            $table->string('features')->nullable();
            $table->string('services')->nullable();
            $table->string('color')->nullable();
            $table->string('capacity')->nullable();
            $table->string('size')->nullable();
            $table->string('keyword');
            $table->string('metaTags');
            $table->string('metaDescription');
            $table->foreign('productid')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');

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
        Schema::dropIfExists('productdetails');
//        Schema::dropForeign('productid');
    }
}
