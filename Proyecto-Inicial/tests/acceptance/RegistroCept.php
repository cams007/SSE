<?php 
$I = new AcceptanceTester($scenario);
$I->am('un egresado');
$I->wantTo('registrarse en el sistema');


$I->amOnPage('/');
