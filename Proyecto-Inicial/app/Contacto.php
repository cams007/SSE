<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    protected $table = 'Contacto';

    public function contacto()
    {
        return $this->hasOne('App\Empresa');
    }
}