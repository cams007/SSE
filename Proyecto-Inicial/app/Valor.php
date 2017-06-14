<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
    protected $table = 'Valor';

    public function valor()
    {
        return $this->belongsTo('App\CatalogoValor');
    }
}
