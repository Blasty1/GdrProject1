<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellingmechaobject extends Model
{
    
    protected $fillable= [
        'name','descrizione','prize','salute','velocita','resistenza','potenza','partmecha'
    ];
   
}
