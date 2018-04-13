<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseSelectiveProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_selective_process', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('selective_process_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->integer('vacancy');
            $table->timestamps();
        });

        Schema::table('course_selective_process', function(Blueprint $table){
            $table->foreign('selective_process_id')
                  ->references('id')
                  ->on('selective_processes');
        });

        Schema::table('course_selective_process', function(Blueprint $table){
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
        Schema::dropIfExists('course_selective_process');
    }
}
