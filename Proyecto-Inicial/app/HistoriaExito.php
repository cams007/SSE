<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaExito extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'HistoriaExito';

    public function scopeTitulo($query, $titulo){
        if (trim($titulo) != ""){
            $query
                ->where(\DB::raw("CONCAT(titulo, ' ', descripcion)"), 'like', '%'.$titulo.'%');
        }
    }
}
