<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street'); 
            $table->integer('number');
            $table->string('cep');
            $table->string('neighborhood');
            $table->string('typeaddress');
            $table->string('city');
            $table->string('state');
            $table->integer('profile_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('addresses', function(Blueprint $table){
            $table->foreign('profile_id')
                  ->references('id')
                  ->on('profiles');
        });
   

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
