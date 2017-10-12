<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    public $table = 'Egresado';
    public $primaryKey = 'matricula';
    public $incrementing = false;
    // public $timestamps = false; //Si no se necesitan: created_at and updated_at

    protected $fillable = ['matricula', 'nombre', 'curp', 'genero', 'fecha_nacimiento', 'nacionalidad', 'telefono', 'lugar_origen', 'imagen_url'];

	/**
	* Get the preparacion that owns the egresado.
	*/
    public function preparacion()
    {
        return $this->belongsTo('App\Preparacion');
    }

	/**
	* Get the primerEmpleo that owns the egresado.
	*/
    public function primerempleo()
    {
        return $this->belongsTo('App\PrimerEmpleo');
    }

	/**
	* Get the user record associated with the egresado.
	*/
    public function usuario()
    {
        return $this->hasOne('App\User');
    }

    /**
	* Get the empleos for egresado.
	*/
    public function empleos()
    {
        return $this->hasMany('App\Empleo');
    }

    /**
	* Get the calificaciones for Preparacion.
	*/
    public function calificaciones()
    {
        return $this->hasMany('App\Ranking');
    }

    public function scopeTitulo($query, $nombre){
        if (trim($nombre) != ""){
            $query
                ->where(\DB::raw("CONCAT(ap_paterno, ' ', matricula, ' ', curp)"), 'like', '%'.$nombre.'%');
        }
    }

    //Realiza la busqueda todo, por los campos asignados
    public function scopeTodo($query, $nombre){
        if (trim($nombre) != ""){
            $query
                ->where(\DB::raw("CONCAT(ap_paterno, ' ', ap_materno, ' ', nombres, matricula, ' ', curp)"), 'like', '%'.$nombre.'%');
        }
    }

}