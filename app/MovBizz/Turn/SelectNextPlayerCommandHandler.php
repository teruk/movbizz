<?php namespace MovBizz\Turn;

use Laracasts\Commander\CommandHandler;
use MovBizz\Players\PlayerRepository;
use Session;

class SelectNextPlayerCommandHandler implements CommandHandler {

	protected $playerRepo;

	function __construct(PlayerRepository $playerRepo) {
		$this->playerRepo = $playerRepo;
	}
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$this->playerRepo->selectNextPlayer(Session::get('game.availablePlayers'));
    }

}