<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standings', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger(('position'));
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('team_name');
            $table->foreignId('stage_id')->constrained()->onDelete('cascade');

            $table->integer('games_played');
            $table->integer('won');
            $table->integer('draw');
            $table->integer('lost');
            $table->integer('goals_scored');
            $table->integer('goals_against');
            $table->integer('goal_difference');
            $table->integer('points');

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
        Schema::dropIfExists('standings');
    }
}
