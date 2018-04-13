<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('selective_process_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('quota_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->date('payment_date')->nullable();
            $table->boolean('paid')->nullable();
            $table->timestamps();
        });

        Schema::table('subscriptions', function(Blueprint $table){
            $table->foreign('selective_process_id')
                  ->references('id')
                  ->on('selective_processes');
        });

        Schema::table('subscriptions', function(Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
        });

        Schema::table('subscriptions', function(Blueprint $table){
            $table->foreign('quota_id')
                  ->references('id')
                  ->on('quotas');
        });

        Schema::table('subscriptions', function(Blueprint $table){
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}