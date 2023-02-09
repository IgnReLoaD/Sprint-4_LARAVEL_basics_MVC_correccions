<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArenasTableCustom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arenas', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_arena',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();             
            $table->integer('club_id')->unsigned();
            // $table->foreign('club_id')->references('id_club')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name',45);
            $table->double('capacity',6,0);
            $table->string('address',45);
            $table->string('zip_code',8);
            $table->string('town',45);
            $table->dateTime('first_construction');
            $table->dateTime('last_remodelation');
            $table->string('architect',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arenas');
    }
}
