<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrimerEmpleo extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'PrimerEmpleo';

    /**
	* Get the evaluaciones for primerEmpleo.
	*/
    public function evaluaciones()
    {
        return $this->hasMany('App\EvaluacionPE');
    }

    /**
	* Get the habilidades for primerEmpleo.
	*/
    public function habilidades()
    {
        return $this->hasMany('App\HabilidadPE');
    }

    /**
	* Get the valores for primerEmpleo.
	*/
    public function valores()
    {
        return $this->hasMany('App\ValorPE');
    }
}
