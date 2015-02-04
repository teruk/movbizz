<?php

use MovBizz\GameSession\StartGameCommand;
use MovBizz\GameSession\SetGameSettingsCommand;
use MovBizz\GameSession\StartAwardCounterCommand;
use MovBizz\GameSession\RegisterRandomEventsCommand;
use MovBizz\GameSession\RestartGameCommand;
use MovBizz\GameSession\SaveNumberOfPlayersCommand;
use MovBizz\Charts\GenerateChartsCommand;
use MovBizz\Statistics\CountGameStartsCommand;
use Session;

class GameController extends \BaseController {

	/**
	 * [getMenu description]
	 * @return [type] [description]
	 */
	public function getMenu()
	{
		return View::make('game.menu');
	}

	/**
	 * Show start form
	 * @return [type] [description]
	 */
	public function getStartForm()
	{
		/*
			TODO check the player is in an active game
				 if true, flash a warning message or redirect to menu
		 */
		if (Session::has('game'))
			Flash::warning('Caution! There is an active game running!');

		if (Session::has('numberOfPlayers')) {
			$numberOfPlayers = Session::get('numberOfPlayers');
			return View::make('game.start', compact('numberOfPlayers'));
		}

		Flash::error('Please choose a number of players first!');
		return Redirect::route('selectNumberOfPlayers_path');
	}

	/**
	 * start a new game
	 * @return [type] [description]
	 */
	public function startGame()
	{
		$playerNames = [];
		foreach (Input::all() as $key => $value) {
			if ($key != "_token")
				array_push($playerNames, $value);
		}
		$this->execute(StartGameCommand::class, array_add([], 'playerNames', $playerNames));
		$this->start();

		Flash::success('Game successfully started. Good Luck!');
		return Redirect::route('menu_path');
	}

	/**
	 * show the rest form
	 * @return [type] [description]
	 */
	public function getRestartForm()
	{
		return View::make('game.restart');
	}

	/**
	 * show form
	 * @return [type] [description]
	 */
	public function selectNumberOfPlayerForm()
	{
		return View::make('game.player');
	}

	/**
	 * save number of players
	 * @return [type] [description]
	 */
	public function chooseNumberOfPlayers()
	{
		$this->execute(SaveNumberOfPlayersCommand::class, Input::all());
		return Redirect::route('startNewGame_path');
	}

	/**
	 * restart the game
	 * @return [type] [description]
	 */
	public function restartGame()
	{
		$this->execute(RestartGameCommand::class);
		$this->start();

		Flash::success('Game restart was successful.');
		return Redirect::route('menu_path');
	}

	/**
	 * execute start commands
	 * @param  [type] $input [description]
	 * @return [type]        [description]
	 */
	private function start()
	{
		$this->execute(SetGameSettingsCommand::class);
		$this->execute(GenerateChartsCommand::class);
		$this->execute(CountGameStartsCommand::class);
		$this->execute(StartAwardCounterCommand::class);
	}
}
