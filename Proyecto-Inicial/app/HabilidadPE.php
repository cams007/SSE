<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabilidadPE extends Model
{
    protected $table = 'HabilidadPE';

    public function habilidad()
    {
        return $this->belongsTo('App\CatalogoHabilidad');
    }
}
