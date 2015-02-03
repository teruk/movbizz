<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('end a turn');

$I->startNewGame();
$I->seeCurrentUrlEquals('/menu');

$I->click('End Turn');
$I->seeCurrentUrlEquals('/turnSummary');
$I->see('Turn summary');

$I->click('Go to next turn');
$I->see('New Movie');
