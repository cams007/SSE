<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Empresa';

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

    public function scopeNombre($query, $nombre){
        if (trim($nombre) != ""){
            $query
                ->where(\DB::raw("CONCAT(nombre, ' ', descripcion)"), 'like', '%'.$nombre.'%');
        }
    }

    public function scopeUbicacion($query, $ubicacion){
        if (trim($ubicacion) != ""){
            $query
                ->orWhere(\DB::raw("CONCAT(colonia, ' ', ciudad, ' ', estado)"), 'like', '%'.$ubicacion.'%');
        }
    }

    public function scopeTodo($query, $ubicacion){
        if (trim($ubicacion) != ""){
            $query
                ->orWhere(\DB::raw("CONCAT(nombre, ' ', ciudad, ' ', estado, ' ', colonia, ' ', descripcion, ' ', telefono)"), 'like', '%'.$ubicacion.'%');
        }
    }
}
