<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('clients', function (Blueprint $table) {
           $table->increments('id');
           $table->string('name');
           $table->string('email')->unique();
           $table->string('address')->nullable();
           $table->biginteger('mobile')->nullable();
           $table->string('social_id')->nullable();
           $table->string('avatar')->nullable();
           $table->string('password');
           $table->string('verifyToken')->nullable();
           $table->boolean('status')->default(0);
           $table->timestamp('email_verified_at')->nullable();
           $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
