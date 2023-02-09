<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_action',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();

            // $table->timestamp('minute');   <-- ojo no, pq el manager o usuari enregistrarà l'acció potser una mica més tard
            $table->string('minute',2);     // tipo String perquè no ha de ser calculat mai             

            // MATCHES 1--N ACTIONS
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id_match')->on('matches')->onDelete('cascade')->onUpdate('cascade');
            
            // PLAYERS 1--N ACTIONS
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id_player')->on('players')->onDelete('cascade')->onUpdate('cascade');
            
            // EVENTOS 1--N ACTIONS
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id_event')->on('events')->onDelete('cascade')->onUpdate('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
