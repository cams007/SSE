<?php
namespace ORM;

use App\Egresado;
use App\Preparacion;

class EgresadoORMTest extends \Codeception\Test\Unit
{

    // tests
    public function test_inserta_egresado_no_registrado()
    {
        $preparacion = new Preparacion();
        $preparacion->carrera = 1;
        $preparacion->generacion = '2012-2017';
        $preparacion->forma_titulacion = 'No titulado';
        $preparacion->fecha_inicio = date('Y-m-d H:i:s');
        $preparacion->fecha_fin = date('Y-m-d H:i:s');
        $preparacion->promedio = 8.5;
        $preparacion->save();

        $egresado = new Egresado();
        $egresado->matricula = '2012020212';
        $egresado->nombre = 'Adrian Castillo Castillo';
        $egresado->curp = 'CXCA951012HOCSSD08';
        $egresado->genero = "Masculino";
        $egresado->fecha_nacimiento = date('Y-m-d H:i:s');
        $egresado->lugar_origen = 'Huajuapan de Leon, Oaxaca';
        $egresado->preparacion_id = $preparacion->id;
        $egresado->habilitado = true;
        $egresado->save();

        // obtener objeto insertado de la bd
        $egresadoDB = Egresado::find($egresado->matricula);
        
        $this->assertNotNull($egresadoDB);
        $this->assertEquals($egresadoDB->nombre, 'Adrian Castillo Castillo');

        $this->assertNotNull($egresadoDB->preparacion);
        $this->assertNull($egresadoDB->primerEmpleo);
        $this->assertEquals(count($egresadoDB->empleos), 0);
        $this->assertNull($egresadoDB->usuario);

    }

    public function test_inser_egresado_registrado()
    {
        $this->assertNull(null);

    }
}