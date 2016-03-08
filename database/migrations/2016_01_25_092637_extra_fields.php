<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExtraFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->text('content')->change();
            $table->string('code', 20);
            $table->boolean('hidden');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->text('content')->change();
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->text('content')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->string('content')->change();
            $table->dropColumn('code');
            $table->dropColumn('hidden');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->string('content')->change();
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->string('content')->change();
        });
    }
}
