<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionPE extends Model
{
    protected $table = 'EvaluacionPE';

    public function pregunta()
    {
        return $this->belongsTo('App\CatalogoPregunta');
    }
}
