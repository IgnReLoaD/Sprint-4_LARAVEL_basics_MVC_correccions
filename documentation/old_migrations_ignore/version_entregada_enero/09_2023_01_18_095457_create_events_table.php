<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            // $table->id();
            // $table->integer('id_event',6)->increments()->unsigned();
            $table->increments('id',10)->unsigned();
            $table->string('description',100);
            $table->enum('type', array('Goal','GameAction', 'Sanction', 'Injury'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
