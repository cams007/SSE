<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    protected $table = 'egresado';
    protected $primaryKey = 'matricula';
    protected $incrementing = false;
    // public $timestamps = false; //Si no se necesitan: created_at and updated_at
}
