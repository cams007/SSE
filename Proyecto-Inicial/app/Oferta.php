<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/

    public $table = 'Oferta';

    //Realiza la busqueda todo, por los campos asignados
    public function scopeTodo($query, $nombre)
    {
        if (trim($nombre) != ""){
            $query
                ->where(\DB::raw("CONCAT(titulo_empleo, ' ', ubicacion )"), 'like', '%'.$nombre.'%');
        }
    }
    
}