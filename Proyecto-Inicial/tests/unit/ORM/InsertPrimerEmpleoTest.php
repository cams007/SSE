<?php
namespace ORM;
use App\PrimerEmpleo;

class InsertPrimerEmpleoTest extends \Codeception\Test\Unit
{

    // tests
    public function testSomeFeature()
    {
        $primerEmpleo = factory(PrimerEmpleo::class, 5)->create();
        $this->assertEquals(5, $primerEmpleo->count());
    }
}