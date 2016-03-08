<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoreTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('topic');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quiz_id');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id');
            $table->string('title');
            $table->string('content');
            $table->boolean('correct');
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
        Schema::drop('quizzes');
        Schema::drop('questions');
        Schema::drop('answers');
    }
}
