<?php 
$I = new FunctionalTester($scenario);
$I->am('a player');
$I->wantTo('see an overview of my movies');

$I->produceMovie('FooBar', 'BasketCase');
$I->click('Overview your movies');
$I->seeCurrentUrlEquals('/showMovies');

$I->see('Overview');
//$I->see('BasketCase');