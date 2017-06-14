<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleador extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Empleador';

	/**
	* Get the contacto that owns the empleador.
	*/
    public function contacto()
    {
        return $this->belongsTo('App\Contacto');
    }

    /**
	* Get the calificaciones for empleador.
	*/
    public function calificaciones()
    {
        return $this->hasMany('App\Ranking');
    }

    /**
	* Get the ofertas for empleador.
	*/
    public function ofertas()
    {
        return $this->hasMany('App\Oferta');
    }

    /**
	* Get the empleados for empleador.
	*/
    public function empleados()
    {
        return $this->hasMany('App\Empleado');
    }
}
