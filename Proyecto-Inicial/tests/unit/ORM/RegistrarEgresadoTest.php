<?php
namespace ORM;
use App\Egresado;

class RegistrarEgresadoTest extends \Codeception\Test\Unit
{

    // tests
    public function test_insert_egresado_with_factory()
    {
        $egresado = factory(Egresado::class, 1)->create();

        $this->assertEquals(1, $egresado->count());
    }
}