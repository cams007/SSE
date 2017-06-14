<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    protected $table = 'Evaluacion';

    public function pregunta()
    {
        return $this->belongsTo('App\CatalogoPregunta');
    }
}
