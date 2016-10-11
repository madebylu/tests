<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Draggables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('draggables', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->string('title');
            $table->string('content');
        });
        Schema::create('draggable_answers', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->integer('draggable_id');
            $table->string('title');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('draggables');
        Schema::drop('draggable_answers');
    }
}
