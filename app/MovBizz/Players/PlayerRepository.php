<?php namespace MovBizz\Players;

use Session;

/**
* 
*/
class PlayerRepository
{
	protected $colors = [
		'danger',
		'success',
		'info',
		'warning',
		'active'
		];

	/**
	 * creating players
	 * @param  [type] $playerNames [description]
	 * @return [type]              [description]
	 */
	public function createPlayers($playerNames)
	{
		$players = [];

		for ($i=0; $i < sizeof($playerNames); ++$i) { 
			$player = new Player();
			$player->initiate($playerNames[$i], $this->colors[$i]);
			array_push($players, $player);
		}

		return $players;
	}

	/**
	 * select the next player
	 * @param  [type] $availablePlayers [description]
	 * @return [type]                   [description]
	 */
	public function selectNextPlayer($availablePlayers)
	{
		Session::set('game.currentPlayer', array_pop($availablePlayers));
        Session::set('game.availablePlayers', $availablePlayers);
	}

	/**
	 * reset players to start settings
	 * @return [type] [description]
	 */
	public function resetPlayers()
	{
		foreach (Session::get('game.players') as $player) {
			$player->initiate($player->getNameAttribute(), $player->getBgColorAttribute());
		}

		$this->selectNextPlayer(Session::get('game.players'));
	}
}