<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInjuriesTableCustom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injuries', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_injury',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();            

            // PLAYERS 1--N INJURIES
            $table->integer('player_id')->unsigned();
            // $table->foreign('player_id')->references('id_player')->on('players')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade')->onUpdate('cascade');            
            $table->enum('type', array('muscular', 'ossy', 'bony', 'fractures', 'overload', 'respiratory'));
            $table->dateTime('injured');
            $table->dateTime('recovered');
            $table->longText('medical_part')->nullable();       // acepta null            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('injuries');
    }
}
