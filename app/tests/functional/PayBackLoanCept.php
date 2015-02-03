<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('pay back a loan');

$I->takeALoan();

$I->seeCurrentUrlEquals('/menu');
$I->click('pay back');

$I->seeCurrentUrlEquals('/paybackLoan');
$I->see('Current loan: 300000 € (max. 2000000 €)');
$I->fillField('Pay back:', 200000);

$I->click('Pay back!');
$I->seeCurrentUrlEquals('/paybackLoan');
$I->see('Pay back successful!');
$I->see('Current loan: 100000 € (max. 2000000 €)');
$I->see('1600000 €');