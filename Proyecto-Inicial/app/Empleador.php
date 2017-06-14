<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleador extends Model
{
    protected $table = 'Empleador';

    public function contacto()
    {
        return $this->belongsTo('App\Contacto');
    }
}
