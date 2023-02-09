<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameRefereeTableCustom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_referee', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_match_referee',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();

            // INTERMEDIATE 1--N MATCHES
            // $table->integer('match_id')->unsigned();
            // $table->foreign('match_id')->references('id_match')->on('matches')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')->onUpdate('cascade');

            // INTERMEDIATE 1--N REFEREES
            $table->integer('referee_id')->unsigned();
            $table->foreign('referee_id')->references('id')->on('referees')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_referee');
    }
}
