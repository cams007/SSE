<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
    protected $table = 'Habilidad';

    public function habilidad()
    {
        return $this->belongsTo('App\CatalogoHabilidad');
    }
}
