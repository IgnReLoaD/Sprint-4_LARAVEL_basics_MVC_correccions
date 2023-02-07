<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\EnumCategoryName;

class CreateTeamCategoryTable extends Migration
{
    /* Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('team_category', function (Blueprint $table) {
            $table->increments('id_team',6)->unsigned();   // increments ya pone como primary y además autoincremental
            // $table->primary('id_team')->unsigned();
            // $table->foreignId('club_id')->constrained('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('club_id')->unsigned();
            $table->foreign('club_id')->references('id_club')->on('clubs')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('name', array('FirstTeam', 'SecondTeam', 'Juvenil', 'Aleví', 'Cadet', 'Infantil', 'Amateur', 'Legends'));
            // $table->unsignedInteger('name')->default(EnumCategoryName::FirstTeam->value);
            $table->enum('type', array('soccer', 'basketball', 'handball'));                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_category');
    }
}
