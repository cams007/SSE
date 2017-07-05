<?php
namespace ORM;
use App\PrimerEmpleo;

class InsertPrimerEmpleoTest extends \Codeception\Test\Unit
{

    // tests
    public function test_insert_primer_empleo_with_factory()
    {
        $primerEmpleo = factory(PrimerEmpleo::class, 5)->create();
        $this->assertEquals(5, $primerEmpleo->count());
    }
}