<?php
namespace ORM;
use App\Egresado;

class SelectEgresadoTest extends \Codeception\Test\Unit
{
    // tests
    public function test_select_egresado()
    {
        $egresadoDB = Egresado::first();
        $this->assertNotNull($egresadoDB->nombre);
    }
}