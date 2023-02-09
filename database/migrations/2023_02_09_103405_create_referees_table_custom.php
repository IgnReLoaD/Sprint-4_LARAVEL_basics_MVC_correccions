<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefereesTableCustom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referees', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_referee',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();            
            $table->string('name',45);
            $table->dateTime('birthdate');   
            $table->string('collegiate_number',8);   // número colegiado - millor string
            $table->string('collegiate_center',45);
            $table->dateTime('debut');
            $table->double('experience',3,0);        // número de partidos pitados
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referees');
    }
}
