<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preparacion extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Preparacion';

	/**
	* Get the maestrias for Preparacion.
	*/
    public function maestrias()
    {
        return $this->hasMany('App\Maestria');
    }

    /**
	* Get the doctorados for Preparacion.
	*/
    public function doctorados()
    {
        return $this->hasMany('App\Doctorado');
    }
}
