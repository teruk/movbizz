<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('take a loan');

$I->startNewGame();
$I->amOnPage('/menu');
$I->click('Take a credit');

$I->seeCurrentUrlEquals('/takeLoan');
$I->see('Current loan: 0 € (max. 2000000 €)');
$I->fillField('Loan:', 300000);

$I->click('Take loan!');
$I->seeCurrentUrlEquals('/takeLoan');
$I->see('Loan successful!');
$I->see('Current loan: 300000 € (max. 2000000 €)');
$I->see('1800000 €');
