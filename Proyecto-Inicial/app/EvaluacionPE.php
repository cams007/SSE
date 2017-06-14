<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionPE extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'EvaluacionPE';

	/**
	* Get the pregunta that owns the evaluacionPE.
	*/
    public function pregunta()
    {
        return $this->belongsTo('App\CatalogoPregunta');
    }
}