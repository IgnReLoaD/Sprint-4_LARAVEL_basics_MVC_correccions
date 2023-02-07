<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matchh extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['id','datetime','journey','home_team_id', 'visitor_team_id','score_home','score_away'];
    public $timestamps = false;

    // MATCHES 1--N ACTIONS (Right Join) ... hasMany()
    public function actions(){
        return $this->hasMany(Action::class, 'id_action');
    }    

    // MATCHES N--1 TEAM_CATEGORY (Left Join) ... belongsTo()
    public function team_category(){
        return $this->belongsTo(Team::class, 'id_team');
    } 

    // MATCHES N--M REFEREES (Inner Join) ... belongsToMany()
    // belongsToMany(tablaRight::class, 'tablaLeft:tablaRight')
    public function match_referee(){
        return $this->belongsToMany(match_referee::class, 'id_match_referee');
    }     
}
