<?php
namespace ORM;

use App\CatalogoHabilidad;

class InsertCatalogoHabilidadesTest extends \Codeception\Test\Unit
{

    // tests
    public function testSomeFeature()
    {
        $habilidad = new CatalogoHabilidad();
        $habilidad->descripcion = 'Trabajo en equipo';
        $habilidad->save();

        $habilidadDB = CatalogoHabilidad::find($habilidad->id);
        $this->assertEquals($habilidadDB->descripcion, $habilidad->descripcion);
    }
}