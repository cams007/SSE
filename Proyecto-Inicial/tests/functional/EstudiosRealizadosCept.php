<?php 
$I = new FunctionalTester($scenario);
$I->am('un egresado');
$I->wantTo('llenar los datos de estudios realizados en UTM');

$I->amOnPage('/perfil/estudiosRealizados');
// $I->fillField('Carrera','Ingeniería en computación');

// $I->selectOption('titulacion', 'tesis');

// $I->fillField('finicio','18/06/2012');
// $I->fillField('ffinal','18/06/2017');
// $I->fillField('ftitulacion','12/07/2018');
// $I->click('Siguiente');
// $I->amOnPage('/perfil/experiencia');