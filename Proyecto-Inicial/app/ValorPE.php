<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValorPE extends Model
{
    protected $table = 'ValorPE';

    public function valor()
    {
        return $this->belongsTo('App\CatalogoValor');
    }
}
