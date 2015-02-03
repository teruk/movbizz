<?php

use MovBizz\Turn\CalculateAwardsCommand;
use MovBizz\Turn\CalculateChartsCommand;
use MovBizz\Turn\CalculateIncomeCommand;
use MovBizz\Turn\ClearSessionItemsCommand;
use MovBizz\Turn\IncreaseAwardCounterCommand;
use MovBizz\Turn\IncreaseRoundCounterCommand;
use MovBizz\Turn\IncreaseMovieRoundCommand;
use MovBizz\Turn\PayInterestCommand;
use MovBizz\Turn\PayRunningCostsCommand;
use MovBizz\Turn\RunRandomEventCommand;
use MovBizz\Movies\MovieRepository;

class TurnController extends \BaseController {

	protected $movieRepo;

	/**
	 * [__construct description]
	 * @param MovieRepository $movieRepo [description]
	 */
	function __construct(MovieRepository $movieRepo)
	{
		$this->movieRepo = $movieRepo;
	}

	/**
	 * [endTurn description]
	 * @return [type] [description]
	 */
	public function endTurn()
	{
		// increase the round counter
		$this->execute(IncreaseRoundCounterCommand::class);

		// look for random events
		$this->execute(RunRandomEventCommand::class);

		// pay the running costs if a movie is in production
		$this->execute(PayRunningCostsCommand::class);

		// increase the round count of every movie
		$this->execute(IncreaseMovieRoundCommand::class);

		// if the player has a loan, he needs to pay the interest
		if (Session::get('player.loan') > 0)
			$this->execute(PayInterestCommand::class);
		
		// calculate movie incommings
		$this->execute(CalculateIncomeCommand::class);

		// calculate new charts
		$this->execute(CalculateChartsCommand::class);

		// clear session items
		$this->execute(ClearSessionItemsCommand::class);
		
		// award ceremony every twelve turns
		$this->execute(IncreaseAwardCounterCommand::class);

		if (Session::get('awards.on')) {
			$this->execute(CalculateAwardsCommand::class);
			return Redirect::route('showAwards_path');
		}

		return Redirect::route('showTurnSummary_path');
	}

	/**
	 * [showSummary description]
	 * @return [type] [description]
	 */
	public function showSummary()
	{
		$inProductionMovies = $this->movieRepo->getInProductionMovies();
		$inChartsMovies = $this->movieRepo->getInChartsMovies();

		$loan = Session::get('player.loan');
		$interest = Session::pull('loan.interest');
		$events = Session::get('events');
		
		return View::make('turn.summary', compact('events', 'loan','interest', 'inProductionMovies', 'inChartsMovies'));
	}
}
