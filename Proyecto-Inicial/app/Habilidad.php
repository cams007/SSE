<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidad extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Habilidad';

	/**
	* Get the habilidad that owns the agresado.
	*/
    public function habilidad()
    {
        return $this->belongsTo('App\CatalogoHabilidad');
    }
}
