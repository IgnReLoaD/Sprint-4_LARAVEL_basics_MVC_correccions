<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;
    protected $fillable = ['id','name','birthdate','collegiate_number','collegiate_center','debut','experience'];
    public $timestamps = false;

    // REFEREE N--M Referee_has_games "PIVOT TABLE" (Inner Join) ... belongsToMany()
    public function game_referee(){
        return $this->belongsToMany(game_referee::class, 'referee_id');
    }    
}
