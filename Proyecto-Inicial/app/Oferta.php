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
    protected $table = 'Oferta';

    public function empresa(){
    	return $this->belongsTo('App\Empresa');
    }

    public function scopePuesto($query, $puesto){
        if (trim($puesto) != ""){
            $query->where(\DB::raw("CONCAT(titulo_empleo, ' ', descripcion)"), 'like', '%'.$puesto.'%');
        }
    }
}