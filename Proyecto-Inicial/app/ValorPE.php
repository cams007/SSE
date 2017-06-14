<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValorPE extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'ValorPE';

	/**
	* Get the valor that owns the agresado.
	*/
    public function valor()
    {
        return $this->belongsTo('App\CatalogoValor');
    }
}
