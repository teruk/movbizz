<?php

use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller {

	use CommanderTrait;

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}

		if (Session::has('player.name'))
			View::share('playerName', Session::get('player.name'));

		if (Session::has('player.money'))
			View::share('playerMoney', Session::get('player.money'));

		if (Session::has('game.round'))
			View::share('round', Session::get('game.round'));

		if (Session::has('game'))
			View::share('game', true);
		else
			View::share('game', false);
	}

}
