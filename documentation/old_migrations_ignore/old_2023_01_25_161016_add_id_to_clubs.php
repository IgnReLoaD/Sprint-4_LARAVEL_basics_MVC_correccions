<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// ESTE ARCHIVO EN SU DIA FUE PARA CAMBIAR UNA NOMENCLATURA DE -ID-  
//  ... que luego cambié erróneamente directamente en las tablas, habría que hacer ASI siempre:

class AddIdToClubs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->id();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clubs', function (Blueprint $table) {
            $table->integer('id_club',6);
        });
    }
}
