<?php
namespace ORM;
use App\CatalogoPregunta;

class InsertCatalogoPreguntasTest extends \Codeception\Test\Unit
{

    // tests
    public function test_insert_pregunta_a_catalogo()
    {
        $pregunta = new CatalogoPregunta();
        $pregunta->pregunta = '¿Cómo calificas las instalaciones de la UTM?';
        $pregunta->cuestionario = false;
        $pregunta->save();

        $preguntaDB = CatalogoPregunta::find($pregunta->id);
        $this->assertEquals($preguntaDB->pregunta, '¿Cómo calificas las instalaciones de la UTM?');
    }
}