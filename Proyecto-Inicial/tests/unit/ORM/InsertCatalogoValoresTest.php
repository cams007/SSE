<?php
namespace ORM;
use App\CatalogoValor;

class InsertCatalogoValoresTest extends \Codeception\Test\Unit
{

    // tests
    public function testSomeFeature()
    {
        $valor = new Catalogovalor();
        $valor->descripcion = 'Responsabilidad';
        $valor->save();

        $valorDB = CatalogoValor::find($valor->id);
        $this->assertEquals($valorDB->descripcion, $valor->descripcion);


        $valores = factory(Catalogovalor::class, 10)->create();
        $this->assertEquals(10, $valores->count());
    }
}