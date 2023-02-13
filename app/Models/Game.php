<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// ******  ESTA CLASE INICIALMENTE SE LLAMABA MATCH  ******

class Game extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['id','datetime','journey','home_team_id', 'visitor_team_id','score_home','score_away'];
    public $timestamps = false;

    // GAME 1--N ACTIONS (Right Join) ... hasMany()
    public function actions(){
        // return $this->hasMany(Action::class, 'id_action');
        return $this->hasMany(Action::class, 'id');
    }    

    // GAMES N--1 TEAM (Left Join) ... belongsTo()
    // public function teams_category(){
    //     return $this->belongsTo(Team::class, 'id_team');
    // } 
    public function team(){
        return $this->belongsTo(Team::class, 'id');
    } 

    // MATCHES N--M REFEREES "PIVOT TABLE" (Inner Join) ... belongsToMany()
    // Sintaxi:  belongsToMany(tablaRight::class, 'tablaLeft:tablaRight')
    public function game_referee(){
        return $this->belongsToMany(game_referee::class, 'game_id');
    }    

    // RELACIO PER MOSTRAR EL NOM EQUIP EN EL GRID
    protected function homeTeamId(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Team::find($value),
        );
    }
    protected function visitorTeamId(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Team::find($value),
        );
    }
   
}
