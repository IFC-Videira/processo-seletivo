<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotaSelectiveProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quota_selective_process', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('selective_process_id')->unsigned();
            $table->integer('quota_id')->unsigned();
            $table->integer('vacancy');
            $table->timestamps();
        });

        Schema::table('quota_selective_process', function(Blueprint $table){
            $table->foreign('selective_process_id')
                  ->references('id')
                  ->on('selective_processes');
        });

        Schema::table('quota_selective_process', function(Blueprint $table){
            $table->foreign('quota_id')
                  ->references('id')
                  ->on('quotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quota_selective_process');
    }
}
