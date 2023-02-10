<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTableCustom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_player',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();

            // FK - team
            $table->integer('team_id')->unsigned();
            // $table->foreign('team_id')->references('id_team')->on('team_category')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');

            // nom del jugador accepta Null, però s'hauria de controlar
            $table->string('name',45)->nullable();

            $table->double('number',2,0)->default(0);   // dorsal del jugador
            $table->dateTime('birthdate')->nullable();
            $table->double('height',3,2)->default(0);
            $table->double('weight',3,0)->default(0);
            $table->enum('position', array('Goalkeeper', 'Defense', 'Midfield', 'Forward', 'Base', 'Aler', 'Aler-Pivot', 'Pivot', 'Escort'));
            $table->boolean('available')->default(1);   // TRUE: si no està lesionat ni convocat amb la selecció

            // Es podria fer una Table STATS a part (PK id_stat i FK player_id):
            $table->double('goals',2,0)->default(0);
            $table->double('points',2,0)->default(0);
            $table->double('assists',2,0)->default(0);
            $table->double('faults',2,0)->default(0);
            $table->double('expulsions',2,0)->default(0);
            $table->double('injuries',2,0)->default(0);
            // ENUM('muscular', 'ossy', 'bony', 'fractures', 'overload', 'respiratory')
            // $table->array('goals'=>'0','points'=>'0','assists'=>'0','faults'=>'0','expulsions'=>'0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
