<?php
namespace ORM;
use App\Egresado;

class SelectEgresadoTest extends \Codeception\Test\Unit
{
    // tests
    public function test_select_egresado()
    {
        $egresadoDB = Egresado::find('0428269059');
        $this->assertNotNull($egresadoDB->nombre);
    }
}