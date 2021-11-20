<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpcomingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upcomings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('time');
            $table->unsignedInteger('course_id');
            $table->boolean('status')->default(true);
            $table->string('class_type');
            $table->foreign('course_id')
                  ->references('id')
                  ->on('courses')
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
        Schema::dropIfExists('upcomings');
    }
}
