<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Empleado';

    /**
	* Get the valores for empleado.
	*/
    public function valores()
    {
        return $this->hasMany('App\Valor');
    }

    /**
	* Get the habilidades for empleado.
	*/
    public function habilidades()
    {
        return $this->hasMany('App\Habilidad');
    }

    /**
	* Get the evaluaciones for empleado.
	*/
    public function evaluaciones()
    {
        return $this->hasMany('App\Evaluacion');
    }
}

