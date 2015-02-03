<?php

use MovBizz\GameSession\StartGameCommand;
use MovBizz\GameSession\SetGameSettingsCommand;
use MovBizz\GameSession\StartAwardCounterCommand;
use MovBizz\GameSession\RegisterRandomEventsCommand;
use MovBizz\Charts\GenerateChartsCommand;
use MovBizz\Statistics\CountGameStartsCommand;

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
		return View::make('game.start');
	}

	/**
	 * start a new game
	 * @return [type] [description]
	 */
	public function startGame()
	{
		$input = array_add([], 'playerName', Input::get('player_name'));
		$this->start($input);

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
	 * restart the game
	 * @return [type] [description]
	 */
	public function restartGame()
	{
		$input = array_add([], 'playerName', Session::get('player.name'));
		$this->start($input);

		Flash::success('Game restart was successful.');
		return Redirect::route('menu_path');
	}

	/**
	 * execute start commands
	 * @param  [type] $input [description]
	 * @return [type]        [description]
	 */
	private function start($input)
	{
		$this->execute(StartGameCommand::class, $input);
		$this->execute(SetGameSettingsCommand::class);
		$this->execute(GenerateChartsCommand::class);
		$this->execute(CountGameStartsCommand::class);
		$this->execute(StartAwardCounterCommand::class);
	}
}
