<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_match',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();             
            $table->dateTime('datetime');
            $table->string('journey',2);            
            $table->integer('home_team_id')->unsigned();
            $table->foreign('home_team_id')->references('id_team')->on('team_category')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('visitor_team_id')->unsigned();
            $table->foreign('visitor_team_id')->references('id_team')->on('team_category')->onDelete('cascade')->onUpdate('cascade');

            $table->string('score_home',3);            
            $table->string('score_away',3);            

            // $table->integer('referees_principal_id')->unsigned();
            // $table->foreign('referees_principal_id')->references('id_referee')->on('referees')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('referees_assistant_id')->unsigned();
            // $table->foreign('referees_assistant_id')->references('id_referee')->on('referees')->onDelete('cascade')->onUpdate('cascade');
            // $table->integer('referees_instant_replay_id')->unsigned();
            // $table->foreign('referees_instant_replay_id')->references('id_referee')->on('referees')->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
