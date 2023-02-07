<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arena extends Model
{
    use HasFactory;
    protected $fillable = ['id','club_id','name','capacity','address','zipcode','town','first_construction','last_remodelation','arquitect'];
    public $timestamps = false;

    // ARENAS N--1 CLUB (Left Join) ... belongsTo()
    public function club(){
        return $this->belongsTo(Club::class, 'id');
    }    
}
