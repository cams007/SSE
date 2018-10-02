<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Egresado extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    public $table = 'Egresado';
    public $primaryKey = 'matricula';
    public $incrementing = false;
    // public $timestamps = false; //Si no se necesitan: created_at and updated_at

    protected $fillable = ['matricula', 'nombre', 'curp', 'genero', 'fecha_nacimiento', 'nacionalidad', 'telefono', 'lugar_origen', 'imagen_url'];
    public $carreras = array( 0 => "ingenieria en diseño", 1 => 'diseño',
                            2 => 'ingenieria en computacion', 3 => 'computacion',
                            4 => 'ingenieria en alimentos', 5 => 'alimentos',
                            6 => 'ingenieria en electronica', 7 => 'electronica',
                            8 => 'ingenieria en mecatronica', 9 => 'mecatronica',
                            10 => 'ingenieria industrial', 11 => 'industrial',
                            12 => 'ingenieria en fisica aplicada', 13 => 'fisica',
                            14 => 'licenciatura en ciencias empresariales', 15 => 'empresariales',
                            16 => 'licenciatura en matematicas aplicadas', 17 => 'matematicas',
                            18 => 'licenciatura en estudios mexicanos', 19 => 'estudios mexicanos',
                            20 => 'ingenieria en mecanica automotriz', 21 => 'mecanica automotriz', 22 => 'automotriz' );

	/**
	* Get the preparacion that owns the egresado.
	*/
    public function preparacion()
    {
        return $this->belongsTo('App\Preparacion');
    }

	/**
	* Get the primerEmpleo that owns the egresado.
	*/
    public function primerempleo()
    {
        return $this->belongsTo('App\PrimerEmpleo');
    }

	/**
	* Get the user record associated with the egresado.
	*/
    public function usuario()
    {
        return $this->hasOne('App\User');
    }

    /**
	* Get the empleos for egresado.
	*/
    public function empleos()
    {
        return $this->hasMany('App\Empleo');
    }

    /**
	* Get the calificaciones for Preparacion.
	*/
    public function calificaciones()
    {
        return $this->hasMany('App\Ranking');
    }

    public function scopeTitulo($query, $nombre){
        if (trim( $nombre ) != "")
        {
            $query
                ->where(\DB::raw("CONCAT(ap_paterno, ' ', matricula, ' ', curp)"), 'like', '%'.$nombre.'%');
        }
    }

    //Realiza la busqueda todo, por los campos asignados
    public function scopeTodo( $query, $nombre )
    {

        if (trim( $nombre ) != "")
        {
            if( in_array( $nombre, $this->carreras ) )
            {
                $index = $this->index( $nombre );

                $query
                    ->join( 'Preparacion', 'Preparacion.id', '=', 'Egresado.preparacion_id' )
                    ->where( 'carrera', '=', $index );
            }
            else if( preg_match( '/[0-9]{4}-[0-9]{4}/', $nombre, $math ) )
                $query
                    ->join( 'Preparacion', 'Preparacion.id', '=', 'Egresado.preparacion_id' )
                    ->where( 'generacion', '=', $nombre );
            else
                $query
                    ->where(\DB::raw("CONCAT(ap_paterno, ' ', ap_materno, ' ', nombres, ' ', matricula, ' ', curp )" ), 'like', '%'.$nombre.'%');
        }
    }

    protected function index( $key )
    {
        $index = array_search( $key, $this->carreras );

        switch( $index )
        {
            case 0: $value = 0; break; case 1: $value = 0; break;
            case 2: $value = 1; break; case 3: $value = 1; break;
            case 4: $value = 2; break; case 5: $value = 2; break;
            case 6: $value = 3; break; case 7: $value = 3; break;
            case 8: $value = 4; break; case 9: $value = 4; break;
            case 10: $value = 5; break; case 11: $value = 5; break;
            case 12: $value = 6; break; case 13: $value = 6; break;
            case 14: $value = 7; break; case 15: $value = 7; break;
            case 16: $value = 8; break; case 17: $value = 8; break;
            case 18: $value = 9; break; case 19: $value = 9; break;
            case 20: $value = 10; break; case 21: $value = 10; break;
            case 22: $value = 10; break;
        }

        return $value;
    }

}