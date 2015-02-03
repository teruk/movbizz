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
		$currentLoan = Session::get('player.loan');

		return View::make('loan.take', compact('currentLoan'));
	}

	/**
	 * take a loan
	 * @return [type] [description]
	 */
	public function takeLoan()
	{
		$input = array_add([], 'amount', Input::get('amount'));
		$this->execute(TakeLoanCommand::class, $input);

		$interest = floor( Session::get('player.loan') * Session::get('game.credit_rate') / 100);

		Flash::success('Loan successful! You have pay the amount of '.$interest.' € per round as interest.');
		return Redirect::back();
	}

	/**
	 * show the payback form
	 * @return [type] [description]
	 */
	public function getPaybackForm()
	{
		$currentLoan = Session::get('player.loan');

		if (Session::get('player.money') > 0)
			$maxPayback = (Session::get('player.loan') > Session::get('player.money')) ? (floor(Session::get('player.money')/100000) * 100000) : Session::get('player.loan');
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
		$this->execute(PayBackLoanCommand::class, $input);

		Flash::success('Pay back successful! Rest loan: '. Session::get('player.loan').' €');
		return Redirect::back();
	}

}
