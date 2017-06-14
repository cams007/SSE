<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Evaluacion';

	/**
	* Get the pregunta that owns the evaluacion.
	*/
    public function pregunta()
    {
        return $this->belongsTo('App\CatalogoPregunta');
    }
}
