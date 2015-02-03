<?php
namespace Codeception\Module;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class FunctionalHelper extends \Codeception\Module
{
	/**
	 * start a new game
	 * @param  string $playerName [description]
	 * @return [type]             [description]
	 */
	public function startNewGame($playerName = 'FooBar')
	{
		$I = $this->getModule('Laravel4');
		$I = $this->newGame($I, $playerName);
	}

	/**
	 * take a loan
	 * @return [type] [description]
	 */
	public function takeALoan($playerName = 'FooBar')
	{
		$I = $this->getModule('Laravel4');

		$I = $this->newGame($I, $playerName);

		$I = $this->loan($I, 300000);
	}

	/**
	 * produce a movie
	 * @param  string $playerName [description]
	 * @param  string $movieTitle [description]
	 * @return [type]             [description]
	 */
	public function produceMovie($playerName = 'FooBar', $movieTitle = 'BasketCase')
	{
		$I = $this->getModule('Laravel4');

		$I = $this->newGame($I, $playerName);

		$I = $this->newMovie($I, $movieTitle);
	}

	/**
	 * take a loan and produce a movie
	 * @param  string  $playerName [description]
	 * @param  integer $loan       [description]
	 * @param  string  $movieTitle [description]
	 * @return [type]              [description]
	 */
	public function takeALoanAndProduceAMovie($playerName = 'FooBar', $loan = 2000000, $movieTitle = 'BasketCase')
	{
		$I = $this->getModule('Laravel4');

		$I = $this->newGame($I, $playerName);

		$I = $this->loan($I, 2000000);

		$I = $this->newMovie($I, $movieTitle);
	}

	/**
	 * [startNewGame description]
	 * @return [type] [description]
	 */
	private function newGame($I, $playerName = 'FooBar')
	{	
		$I->amOnPage('/startNewGame');
		$I->fillField('Name:', $playerName);
		$I->click('Start!');
		$I->seeCurrentUrlEquals('/menu');
		return $I;
	}

	/**
	 * [loan description]
	 * @param  [type]  $I      [description]
	 * @param  integer $amount [description]
	 * @return [type]          [description]
	 */
	private function loan($I, $amount = 300000)
	{
		$I->click('Take a credit');
		$I->fillField('Loan:', $amount);
		$I->click('Take loan!');
		$I->click('Go back');
		$I->seeCurrentUrlEquals('/menu');
		return $I;
	}

	/**
	 * [newMovie description]
	 * @param  [type] $I     [description]
	 * @param  string $title [description]
	 * @return [type]        [description]
	 */
	private function newMovie($I, $title = 'BasketCase')
	{
		$I->click('New Movie');
		$I->fillField('Movie Title:', $title);
		$I->click('Next Step: Select Actor!');

		$I->selectOption('actor', 1);
		$I->click('Next Step: Select Director!');

		$I->selectOption('director', 3);
		$I->click('Next Step: Select Location!');

		$I->selectOption('location', 3);
		$I->click('Next Step: Summary!');

		$I->click('Begin Production!');
		$I->seeCurrentUrlEquals('/menu');
		return $I;
	}
}
