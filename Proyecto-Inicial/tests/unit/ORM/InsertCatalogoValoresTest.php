<?php
namespace ORM;
use App\CatalogoValor;

class InsertCatalogoValoresTest extends \Codeception\Test\Unit
{

    // tests
    public function test_insert_and_update_valor_of_catalogo()
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