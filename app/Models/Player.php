<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['id','team_id','name','number','birthdate','height','weight','position','goals','points','faults','assists','expulsions','available'];
    public $timestamps = false;

    // PLAYERS 1--N ACTIONS (Right Join) ... hasMany()
    public function actions(){
        return $this->hasMany(Action::class, 'id');
    }

    // PLAYERS 1--N INJURIES (Right Join) ... hasMany()
    public function injuries(){
        return $this->hasMany(Injury::class, 'id');
    }    

    // PLAYERS N--1 TEAM_CATEGORY (Left Join) ... belongsTo()
    public function teams(){
        // return $this->belongsTo(Team::class, 'id_team');
        return $this->belongsTo(Team::class, 'id');
    }

}
