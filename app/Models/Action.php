<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['id','minute','match_id','event_id', 'player_id','referee_observations'];

    // ACTIONS N--1 MATCHES (Left Join) ... belongsTo()
    // public function matches(){
    //     return $this->belongsTo(Matches::class, 'id_Match');
    // }

    // ACTIONS N--1 GAMES (Left Join) ... belongsTo()    
    public function games(){
        return $this->belongsTo(Game::class, 'id');
    }    

    // ACTIONS N--1 EVENTS (Left Join) ... belongsTo()
    public function events(){
        return $this->belongsTo(Event::class, 'id');
    }

    // ACTIONS N--1 PLAYERS (Left Join) ... belongsTo()
    public function players(){
        return $this->belongsTo(Player::class, 'id');
    }

}
