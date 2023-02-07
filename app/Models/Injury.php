<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    use HasFactory;
    protected $fillable = ['id','player_id','type','injured','recovered','medical_part'];
    public $timestamps = false;

    // INJURIES N--1 PLAYERS (Left Join) ... belongsTo()
    public function player(){
        return $this->belongsTo(Player::class, 'id');
    }    
}
