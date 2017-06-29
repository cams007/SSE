<?php
namespace ORM;

use App\CatalogoHabilidad;

class InsertCatalogoHabilidadesTest extends \Codeception\Test\Unit
{

    // tests
    public function test_insert_habilidad_a_catalogo()
    {
    	// Probando Insert y Select, de modelo CatalogoHabilidad
        $habilidad = new CatalogoHabilidad();
        $habilidad->descripcion = 'Trabajo en equipo';
        $habilidad->save();

        $habilidadDB = CatalogoHabilidad::find($habilidad->id);
        $this->assertEquals($habilidadDB->descripcion, $habilidad->descripcion);

        // Update
        $habilidadDB->descripcion = 'Trabajo en equipo update';
        $habilidadDB->save();

        $habilidadDB2 = CatalogoHabilidad::find($habilidadDB->id);
        $this->assertEquals($habilidadDB2->descripcion, 'Trabajo en equipo update');
    }

    public function test_update_habilidad_de_catalogo()
    {
        // Probando Insert y Select, de modelo CatalogoHabilidad
        $habilidad = new CatalogoHabilidad();
        $habilidad->descripcion = 'Trabajo en equipo';
        $habilidad->save();

        $habilidadDB = CatalogoHabilidad::find($habilidad->id);
        $this->assertEquals($habilidadDB->descripcion, $habilidad->descripcion);

        // Update
        $habilidadDB->descripcion = 'Trabajo en equipo update';
        $habilidadDB->save();

        $habilidadDB2 = CatalogoHabilidad::find($habilidadDB->id);
        $this->assertEquals($habilidadDB2->descripcion, 'Trabajo en equipo update');
    }
}