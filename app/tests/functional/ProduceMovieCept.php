<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('produce a movie');

// $I->amOnPage('/menu');
$I->startNewGame();
$I->click('New Movie');

$I->seeCurrentUrlEquals('/selectTitle');
$I->see('Step 1: Select movie title!');
$I->fillField('Movie Title:', 'BasketCase');
$I->click('Next Step: Select Actor!');

$I->seeCurrentUrlEquals('/selectActor');
$I->see('Step 2: Select actor!');
$I->selectOption('actor', 1);
$I->click('Next Step: Select Director!');

$I->seeCurrentUrlEquals('/selectDirector');
$I->see('Step 3: Select director!');
$I->selectOption('director', 3);
$I->click('Next Step: Select Location!');

$I->seeCurrentUrlEquals('/selectLocation');
$I->see('Step 4: Select Location!');
$I->selectOption('location', 3);
$I->click('Next Step: Summary!');

$I->seeCurrentUrlEquals('/selectionSummary');
$I->see('BasketCase');
$I->click('Begin Production!');

$I->seeCurrentUrlEquals('/menu');
$I->see('Production was started.');

// TODO check database
