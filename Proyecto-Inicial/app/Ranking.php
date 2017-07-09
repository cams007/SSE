<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    /**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Ranking';

    public function empresa(){
    	return $this->belongsTo('App\Empresa');
    }

    public function egresado(){
    	return $this->belongsTo('App\Egresado');
    }


    public function scopeEmpresa($query, $puesto){
        if (trim($puesto) != ""){
            // $query
            //     ->where(\DB::raw("CONCAT(titulo_empleo, ' ', descripcion, ' ', ubicacion)"), 'like', '%'.$puesto.'%');
        }
    }
}
