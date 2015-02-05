<?php
use MovBizz\Loan\TakeLoanCommand;
use MovBizz\Loan\PayBackLoanCommand;

class LoanController extends \BaseController {

	/**
	 * show the loan form
	 * @return [type] [description]
	 */
	public function getLoanForm()
	{
		$currentLoan = Session::get('game.currentPlayer')->getLoanAttribute();

		return View::make('loan.take', compact('currentLoan'));
	}

	/**
	 * take a loan
	 * @return [type] [description]
	 */
	public function takeLoan()
	{
		$input = array_add([], 'amount', Input::get('amount'));
		$playerLoan = $this->execute(TakeLoanCommand::class, $input);

		$interest = floor( $playerLoan * Session::get('game.credit_rate') / 100);

		Flash::success('Loan successful! You have pay the amount of '.$interest.' € per round as interest.');
		return Redirect::back();
	}

	/**
	 * show the payback form
	 * @return [type] [description]
	 */
	public function getPaybackForm()
	{
		$currentPlayer = Session::get('game.currentPlayer'); 
		$currentLoan = $currentPlayer->getLoanAttribute();

		if ($currentPlayer->getMoneyAttribute() > 0)
			$maxPayback = ($currentLoan > $currentPlayer->getMoneyAttribute()) ? (floor($currentPlayer->getMoneyAttribute()/100000) * 100000) : $currentLoan;
		else
			$maxPayback = 0;

		return View::make('loan.payback', compact('currentLoan', 'maxPayback'));
	}

	/**
	 * pay back loan
	 * @return [type] [description]
	 */
	public function paybackLoan()
	{
		$input = array_add([], 'amount', Input::get('amount'));
		$restLoan = $this->execute(PayBackLoanCommand::class, $input);

		Flash::success('Pay back successful! Rest loan: '.$restLoan.' €');
		return Redirect::back();
	}

}
