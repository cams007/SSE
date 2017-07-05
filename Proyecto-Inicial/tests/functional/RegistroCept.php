<?php 
$I = new FunctionalTester($scenario);
$I->am('un egresado');
$I->wantTo('registrarse en el sistema');

$I->amOnPage('/');
// $I->click('Regístrate');
// $I->amOnPage('/registro');
// $I->fillField('matricula','2012020211');
// $I->fillField('curp','LOLO951211HOCSSD08');
// $I->fillField('pass','123456');
// $I->fillField('pass2','123456');
// $I->click('Registrarse');
// $I->amOnPage('/bienvenida');
// $I->click('Continuar');
// $I->amOnPage('/perfil');
// $I->see('Mi Perfil');