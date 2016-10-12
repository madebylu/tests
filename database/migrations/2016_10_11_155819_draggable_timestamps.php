<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DraggableTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('draggables', function($table) {
            $table->timestamps();
        });
        Schema::table('draggable_answers', function($table) {
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
        //
        Schema::table('draggables', function($table) {
            $table->dropTimestamps();
        });
        Schema::table('draggable_answers', function($table) {
            $table->dropTimestamps();
        });
    }
}
