<?php 
$I = new FunctionalTester($scenario);
$I->am('un egresado');
$I->wantTo('llenar los datos de mi perfil');

$I->amOnPage('/perfil');
// $I->fillField('Agrega tu ciudad actual','Oaxaca');

// $I->click('Estudios realizados');
// $I->amOnPage('/perfil/fpersonal');
// $I->fillField('Carrera','Ingeniería en computación');
// $I->click('Siguiente');
// $I->amOnPage('/perfil/experiencia');
// $I->click('Siguiente');
// $I->amOnPage('/perfil/dprofesional');
// $I->click('Siguiente');
// $I->amOnPage('/perfil/fprofesional');
// $I->click('Finalizar');

// $I->see('Mi Perfil');