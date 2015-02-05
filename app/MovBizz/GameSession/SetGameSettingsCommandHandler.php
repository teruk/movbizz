<?php namespace MovBizz\GameSession;

use Laracasts\Commander\CommandHandler;
use Session;

class SetGameSettingsCommandHandler implements CommandHandler {

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	// game settings
    	Session::put('game.round', 0); // ingame week counter
    	Session::put('game.creditRate', 10); // credit rate

    	Session::put('advertisement', []);

        Session::put('events', []);
    }

}