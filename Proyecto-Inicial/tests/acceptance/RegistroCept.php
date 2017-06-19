<?php 
$I = new AcceptanceTester($scenario);
$I->am('un egresado');
$I->wantTo('registrarse en el sistema');
$I->amOnPage('/');
$I->click('Registro');
$I->amOnPage('/registro');
$I->click('Registrarse');
$I->amOnPage('/bienvenida');
$I->click('Continuar');
$I->amOnPage('/perfil');
$I->see('Mi Perfil');