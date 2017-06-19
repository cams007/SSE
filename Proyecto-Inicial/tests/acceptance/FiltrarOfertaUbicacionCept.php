<?php 
$I = new AcceptanceTester($scenario);
$I->am('un egresado');
$I->wantTo('buscar ofertas en CDMX');

$I->amOnPage('/ofertas');
