<?php namespace MovBizz\GameSession;

use Laracasts\Commander\CommandHandler;
use Session;
use Event;

class StartGameCommandHandler implements CommandHandler {

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
    	
    	// player settings
    	Session::put('player.name', $command->playerName); // player name
    	Session::put('player.money', 1500000); // player money
    	Session::put('player.loan', 0); // player credit
        Session::put('player.movies', []);
        Session::put('player.awardCandidates', []);

        // increase counter for started games
        Event::fire('stats.startedGame');
    }

}