<?php 
$I = new FunctionalTester($scenario);
$I->am('player');
$I->wantTo('start a new game');

$I->amOnPage('/');
$I->click('Start a new game!');
$I->seeCurrentUrlEquals('/startNewGame');

$I->fillField('Name:', 'FooBar');
$I->click('Start!');

$I->seeCurrentUrlEquals('/menu');
$I->see('FooBar');
$I->see('1500000 €');
$I->see('New movie');