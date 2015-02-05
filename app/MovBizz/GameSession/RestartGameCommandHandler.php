<?php namespace MovBizz\GameSession;

use Laracasts\Commander\CommandHandler;
use MovBizz\Players\PlayerRepository;

class RestartGameCommandHandler implements CommandHandler {

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
    	$this->playerRepo->resetPlayers();
    }

}