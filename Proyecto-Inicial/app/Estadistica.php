<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabulador extends Model
{
    /**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Tabulador';

    public function scopeEmpleo($query, $empleo){
        if (trim($empleo) != ""){
            $query
                ->where('empleo', 'like', '%'.$empleo.'%');
        }
    }
}
