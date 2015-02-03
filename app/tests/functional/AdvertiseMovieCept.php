<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('advertise a movie');

$I->takeALoanAndProduceAMovie('FooBar', 2000000, 'BasketCase');
$I->seeCurrentUrlEquals('/menu');

$I->click('Advertisement');

$I->seeCurrentUrlEquals('/advertisement');
$I->see('BasketCase');
$I->selectOption('round', -2);
$I->click('Select Movie!');

$I->seeCurrentUrlEquals('/selectAdvertisement');
$I->fillField('poster', 1);
$I->click('Advertise!');

$I->see('Advertising was successful!');
$I->seeCurrentUrlEquals('/advertisement');
$I->dontSee('BasketCase');

$I->click('Go back');
$I->seeCurrentUrlEquals('/menu');
$I->click('End Turn');

$I->seeCurrentUrlEquals('/turnSummary');
$I->click('Go to next turn');

$I->seeCurrentUrlEquals('/menu');
$I->click('Advertisement');
$I->see('BasketCase');