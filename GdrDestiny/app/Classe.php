<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $filliable=[
        'name','descrizione','immagine'
    ];
}
