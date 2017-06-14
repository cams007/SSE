<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    protected $table = 'Egresado';
    protected $primaryKey = 'matricula';
    protected $incrementing = false;
    // public $timestamps = false; //Si no se necesitan: created_at and updated_at

    public function preparacion()
    {
        return $this->belongsTo('App\Preparacion');
    }

    public function primerEmpleo()
    {
        return $this->belongsTo('App\PrimerEmpleo');
    }

    public function usuario()
    {
        return $this->hasOne('App\User');
    }

}
