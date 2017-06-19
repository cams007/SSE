<?php
namespace Models;

use App\Egresado;
use App\Preparacion;

class InsertEgresadoTest extends \Codeception\Test\Unit
{

    // tests
    public function testSomeFeature()
    {
        $egresado = new Egresado();
        $egresado->matricula = '2012020212';
        $egresado->nombre = 'Adrian Castillo Castillo';
        $egresado->curp = 'CXCA951012HOCSSD08';
        $egresado->genero = 0; //Hombre
        $egresado->fecha_nacimiento = date('Y-m-d H:i:s');
        $egresado->lugar_origen = 'Huajuapan de Leon, Oaxaca';
        $egresado->save();

        $this->assertTrue(true);
    }
}