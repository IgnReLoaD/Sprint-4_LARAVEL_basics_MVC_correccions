<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    // ATRIBUTS:
    protected $fillable = ['id','description'];
    public $timestamps = false;

    // EVENTS 1--N ACTIONS (Right Join) ... hasMany()
    public function actions(){
        return $this->hasMany(Action::class, 'id');
    }

}
