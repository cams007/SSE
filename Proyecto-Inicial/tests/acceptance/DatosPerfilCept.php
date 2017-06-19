<?php 
$I = new AcceptanceTester($scenario);
$I->am('un egresado');
$I->wantTo('llenar los datos de mi perfil');

$I->amOnPage('/perfil');
