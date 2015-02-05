<?php namespace MovBizz\GameSession;

use Laracasts\Commander\CommandHandler;
use MovBizz\Players\PlayerRepository;
use Session;
use Event;

class StartGameCommandHandler implements CommandHandler {

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
    	// clear all old data
    	Session::flush();

    	/* Setting variables */
    	
        $players = $this->playerRepo->createPlayers($command->playerNames);
        Session::put('game.players', $players);

        // select next player
        $this->playerRepo->selectNextPlayer($players);

        // increase counter for started games
        Event::fire('stats.startedGame');
    }

}