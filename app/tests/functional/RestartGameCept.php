<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('restart the game');

$I->startNewGame();
$I->amOnPage('/menu');
$I->click('Restart game');

$I->seeCurrentUrlEquals('/restartGame');
$I->see('Would you like to restart the game?');
$I->click('Restart!');

$I->seeCurrentUrlEquals('/menu');
$I->see('Game restart was successful.');
