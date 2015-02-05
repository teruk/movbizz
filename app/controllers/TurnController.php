<?php

use MovBizz\Turn\AnalyseChartsCommand;
use MovBizz\Turn\CalculateAwardsCommand;
use MovBizz\Turn\CalculateChartsCommand;
use MovBizz\Turn\CalculateIncomeCommand;
use MovBizz\Turn\ClearSessionItemsCommand;
use MovBizz\Turn\DetermLoansCommand;
use MovBizz\Turn\IncreaseAwardCounterCommand;
use MovBizz\Turn\IncreaseRoundCounterCommand;
use MovBizz\Turn\IncreaseMovieRoundCommand;
use MovBizz\Turn\PayInterestCommand;
use MovBizz\Turn\PayRunningCostsCommand;
use MovBizz\Turn\ResetAvailablePlayersCommand;
use MovBizz\Turn\RunRandomEventCommand;
use MovBizz\Turn\SelectNextPlayerCommand;
use MovBizz\Movies\MovieRepository;
use MovBizz\Turn\AggregateIncomeCommand;
use MovBizz\Movies\GetInProductionMoviesCommand;

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
		$input = array_add([], 'players', Session::get('game.players'));

		// increase the round counter
		$this->execute(IncreaseRoundCounterCommand::class);

		// reset available players
		$this->execute(ResetAvailablePlayersCommand::class, $input);

		// select next player
		$this->execute(SelectNextPlayerCommand::class);

		// look for random events
		$this->execute(RunRandomEventCommand::class, $input);

		// pay the running costs if a movie is in production
		$this->execute(PayRunningCostsCommand::class, $input);

		// increase the round count of every movie
		$this->execute(IncreaseMovieRoundCommand::class, $input);

		// if the player has a loan, he needs to pay the interest
		$this->execute(PayInterestCommand::class, $input);
		
		// calculate movie incommings
		$this->execute(CalculateIncomeCommand::class, $input);

		// calculate new charts
		$this->execute(CalculateChartsCommand::class, $input);

		// analyse charts
		$this->execute(AnalyseChartsCommand::class);

		// clear session items
		$this->execute(ClearSessionItemsCommand::class);
		
		// award ceremony every twelve turns
		$this->execute(IncreaseAwardCounterCommand::class);

		if (Session::get('awards.on')) {
			$this->execute(CalculateAwardsCommand::class, $input);
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
		$players = Session::get('game.players');
		$input = array_add([], 'players', $players);

		$inProductionMovies = $this->execute(GetInProductionMoviesCommand::class, $input);
		$income = $this->execute(AggregateIncomeCommand::class, $input);
		$hasLoans = $this->execute(DetermLoansCommand::class, $input);

		$interestRate = Session::get('game.creditRate');
		
		return View::make('turn.summary', compact('interestRate', 'inProductionMovies', 'income', 'players', 'hasLoans'));
	}

	/**
	 * select next player
	 * @return [type] [description]
	 */
	public function selectNextPlayer()
	{
		$this->execute(SelectNextPlayerCommand::class);
		return Redirect::route('menu_path');
	}
}
