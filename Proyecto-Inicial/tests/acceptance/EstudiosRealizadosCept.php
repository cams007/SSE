<?php 
$I = new AcceptanceTester($scenario);
$I->am('un egresado');
$I->wantTo('llenar los datos de estudios realizados en UTM');

$I->amOnPage('/perfil/fpersonal');
