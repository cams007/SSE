<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HabilidadPE extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'HabilidadPE';

	/**
	* Get the habilidad that owns the agresado.
	*/
    public function habilidad()
    {
        return $this->belongsTo('App\CatalogoHabilidad');
    }
}