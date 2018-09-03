<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Evento';

    public function scopeTitulo($query, $titulo){
        if (trim($titulo) != ""){
            $query
                ->where(\DB::raw("CONCAT(nombre, ' ', descripcion, ' ', lugar)"), 'like', '%'.$titulo.'%');
        }
    }

    public function scopeTodo($query, $titulo){
        if (trim($titulo) != ""){
            $query
                ->where(\DB::raw("CONCAT(nombre, ' ', descripcion, ' ', lugar, ' ',categoria, ' ',fecha)"),
                                'like', '%'.$titulo.'%');
        }
    }

}